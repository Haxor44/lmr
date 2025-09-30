<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomAvailabilities;
use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class RoomsController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    /**
     * Get all rooms with optional filtering
     * Supports pagination, filtering by type, amenities, price range
     */

     public function index(){

        return view('rooms');
     }

      public function details($id){
        $room = Room::findOrFail($id);
        return view('room-details',['rmid'=> $room->id,'price'=> $room->base_price,'name'=>$room->name]);
     }

    public function all(Request $request)
    {
        $query = Room::query();

        // Filter by room type
        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', $request->type);
        }

        // Filter by amenities
        if ($request->has('amenities') && is_array($request->amenities)) {
            foreach ($request->amenities as $amenity) {
                $query->whereJsonContains('amenities', $amenity);
            }
        }

        // Filter by price range
        if ($request->has('min_price')) {
            $query->where('base_price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('base_price', '<=', $request->max_price);
        }

        // Filter by guest capacity
        if ($request->has('min_guests')) {
            $query->where('max_guests', '>=', $request->min_guests);
        }

        // Filter by availability status
        if ($request->has('availability')) {
            $query->where('availability', $request->availability);
        }

        // Sort options
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        
        if (in_array($sortBy, ['name', 'base_price', 'max_guests', 'type', 'created_at'])) {
            $query->orderBy($sortBy, $sortOrder);
        }

        $rooms = $query->paginate($request->get('per_page', 15));

        return response()->json([
            'rooms' => $rooms->items(),
            'pagination' => [
                'current_page' => $rooms->currentPage(),
                'last_page' => $rooms->lastPage(),
                'per_page' => $rooms->perPage(),
                'total' => $rooms->total(),
                'from' => $rooms->firstItem(),
                'to' => $rooms->lastItem()
            ]
        ]);


        
        
    }

    /**
     * Search available rooms for specific dates and requirements
     * Enhanced version with detailed availability checking
     */
    public function searchAvailable(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1|max:10',
            'amenities' => 'array',
            'room_type' => 'nullable|in:single,double,suite,deluxe',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
            'sort_by' => 'nullable|in:price,name,type,rating',
            'sort_order' => 'nullable|in:asc,desc'
        ]);

        if ($validator->fails()) {
            // For web requests, redirect back with errors
            if ($request->expectsJson()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $checkIn = $request->check_in;
        $checkOut = $request->check_out;
        $guests = $request->guests;
        $amenities = $request->amenities ?? [];

        // Create cache key for this search
        $cacheKey = 'room_search_' . md5(serialize($request->only([
            'check_in', 'check_out', 'guests', 'amenities', 'room_type', 'min_price', 'max_price'
        ])));

        // Try to get from cache first (cache for 5 minutes)
        $rooms = Cache::remember($cacheKey, 300, function () use ($request, $checkIn, $checkOut, $guests, $amenities) {
            return Room::searchAvailable($checkIn, $checkOut, $guests, $amenities);
        });

        // Apply additional filters
        if ($request->has('room_type')) {
            $rooms = $rooms->where('type', $request->room_type);
        }

        if ($request->has('min_price')) {
            $rooms = $rooms->where('base_price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $rooms = $rooms->where('base_price', '<=', $request->max_price);
        }

        // Add pricing and availability details to each room
        $roomsWithDetails = $rooms->map(function ($room) use ($checkIn, $checkOut, $guests) {
            $pricing = $this->bookingService->calculatePricing($room, $checkIn, $checkOut, $guests);
            
            return (object) [
                'id' => $room->id,
                'name' => $room->name,
                'description' => $room->description,
                'type' => $room->type,
                'max_guests' => $room->max_guests,
                'amenities' => $room->amenities,
                'images' => $room->images,
                'base_price' => $room->base_price,
                'pricing' => $pricing,
                'availability_status' => $room->availability,
                'features' => $this->getRoomFeatures($room)
            ];
        });

        // Sort results
        $sortBy = $request->get('sort_by', 'price');
        $sortOrder = $request->get('sort_order', 'asc');

        if ($sortBy === 'price') {
            $roomsWithDetails = $sortOrder === 'asc' 
                ? $roomsWithDetails->sortBy('pricing.total_price')
                : $roomsWithDetails->sortByDesc('pricing.total_price');
        } elseif ($sortBy === 'name') {
            $roomsWithDetails = $sortOrder === 'asc'
                ? $roomsWithDetails->sortBy('name')
                : $roomsWithDetails->sortByDesc('name');
        }

        $searchCriteria = [
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'guests' => $guests,
            'room_type' => $request->room_type,
            'duration' => Carbon::parse($checkOut)->diffInDays(Carbon::parse($checkIn))
        ];

        // For API requests, return JSON
        if ($request->expectsJson()) {
            return response()->json([
                'rooms' => $roomsWithDetails->values(),
                'search_criteria' => $searchCriteria,
                'total_found' => $roomsWithDetails->count()
            ]);
        }

        // For web requests, return view
        return view('rooms-search', [
            'rooms' => $roomsWithDetails->values(),
            'searchCriteria' => $searchCriteria,
            'totalFound' => $roomsWithDetails->count()
        ]);
    }

    /**
     * Get detailed information about a specific room
     */
    public function show(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $roomData = [
            'id' => $room->id,
            'name' => $room->name,
            'description' => $room->description,
            'type' => $room->type,
            'base_price' => $room->base_price,
            'max_guests' => $room->max_guests,
            'amenities' => $room->amenities,
            'images' => $room->images,
            'availability' => $room->availability,
            //'features' => $this->getRoomFeatures($room),
            'created_at' => $room->created_at,
            'updated_at' => $room->updated_at
        ];

        // If dates are provided, include pricing and availability
        if ($request->has(['check_in', 'check_out'])) {
            $validator = Validator::make($request->all(), [
                'check_in' => 'required|date|after_or_equal:today',
                'check_out' => 'required|date|after:check_in',
                'guests' => 'nullable|integer|min:1|max:10'
            ]);

            if (!$validator->fails()) {
                $guests = $request->get('guests', 1);
                $isAvailable = $room->isAvailable($request->check_in, $request->check_out);
                
                $roomData['date_specific'] = [
                    'is_available' => $isAvailable,
                    'pricing' => $isAvailable 
                        ? $this->bookingService->calculatePricing($room, $request->check_in, $request->check_out, $guests)
                        : null,
                    'unavailable_dates' => $this->getUnavailableDates($room, $request->check_in, $request->check_out)
                ];
            }
        }

        return response()->json(['room' => $roomData]);
    }

    /**
     * Get room availability calendar for a date range
     */
    public function getAvailabilityCalendar(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'months' => 'nullable|integer|min:1|max:12'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $room = Room::findOrFail($id);
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        // Limit to 12 months maximum
        if ($endDate->diffInMonths($startDate) > 12) {
            $endDate = $startDate->copy()->addMonths(12);
        }

        $calendar = [];
        $period = CarbonPeriod::create($startDate, $endDate);

        foreach ($period as $date) {
            $dateStr = $date->format('Y-m-d');
            $isAvailable = $room->isAvailable($dateStr, $date->copy()->addDay()->format('Y-m-d'));
            
            // Get specific availability record if exists
            $availabilityRecord = $room->availability()
                ->where('date', $dateStr)
                ->first();

            $calendar[] = [
                'date' => $dateStr,
                'is_available' => $isAvailable,
                'price' => $availabilityRecord && $availabilityRecord->price_override 
                    ? $availabilityRecord->price_override 
                    : $room->base_price,
                'is_weekend' => $date->isWeekend(),
                'bookings_count' => $room->bookings()
                    ->where('status', '!=', 'cancelled')
                    ->where('check_in', '<=', $dateStr)
                    ->where('check_out', '>', $dateStr)
                    ->count()
            ];
        }

        return response()->json([
            'room_id' => $room->id,
            'calendar' => $calendar,
            'period' => [
                'start_date' => $startDate->format('Y-m-d'),
                'end_date' => $endDate->format('Y-m-d'),
                'total_days' => count($calendar)
            ]
        ]);
    }

    /**
     * Get room types and their counts
     */
    public function getRoomTypes()
    {
        $types = Room::select('type')
            ->selectRaw('COUNT(*) as count')
            ->selectRaw('MIN(base_price) as min_price')
            ->selectRaw('MAX(base_price) as max_price')
            ->selectRaw('AVG(base_price) as avg_price')
            ->where('availability', '!=', 'maintenance')
            ->groupBy('type')
            ->get();

        return response()->json(['room_types' => $types]);
    }

    /**
     * Get all available amenities
     */
    public function getAmenities()
    {
        $amenities = Cache::remember('all_amenities', 3600, function () {
            $allAmenities = Room::whereNotNull('amenities')
                ->pluck('amenities')
                ->flatten()
                ->unique()
                ->sort()
                ->values();

            return $allAmenities->map(function ($amenity) {
                return [
                    'name' => $amenity,
                    'display_name' => ucwords(str_replace('_', ' ', $amenity)),
                    'rooms_count' => Room::whereJsonContains('amenities', $amenity)->count()
                ];
            });
        });

        return response()->json(['amenities' => $amenities]);
    }

    /**
     * Get price range statistics
     */
    public function getPriceRange()
    {
        $priceStats = Cache::remember('price_range_stats', 1800, function () {
            return Room::where('availability', '!=', 'maintenance')
                ->selectRaw('MIN(base_price) as min_price')
                ->selectRaw('MAX(base_price) as max_price')
                ->selectRaw('AVG(base_price) as avg_price')
                ->selectRaw('COUNT(*) as total_rooms')
                ->first();
        });

        return response()->json(['price_range' => $priceStats]);
    }

    /**
     * Get featured/recommended rooms
     */
    public function getFeaturedRooms(Request $request)
    {
        $limit = $request->get('limit', 6);
        
        $featuredRooms = Room::where('availability', 'available')
            ->whereIn('type', ['suite', 'deluxe']) // Prioritize premium rooms
            ->orderBy('base_price', 'desc')
            ->limit($limit)
            ->get()
            ->map(function ($room) {
                return [
                    'id' => $room->id,
                    'name' => $room->name,
                    'description' => $room->description,
                    'type' => $room->type,
                    'base_price' => $room->base_price,
                    'max_guests' => $room->max_guests,
                    'amenities' => $room->amenities,
                    'images' => $room->images,
                    'features' => $this->getRoomFeatures($room)
                ];
            });

        return response()->json(['featured_rooms' => $featuredRooms]);
    }

    /**
     * Compare multiple rooms
     */
    public function compareRooms(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_ids' => 'required|array|min:2|max:4',
            'room_ids.*' => 'exists:rooms,id',
            'check_in' => 'nullable|date|after_or_equal:today',
            'check_out' => 'nullable|date|after:check_in',
            'guests' => 'nullable|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $rooms = Room::whereIn('id', $request->room_ids)->get();
        
        $comparison = $rooms->map(function ($room) use ($request) {
            $roomData = [
                'id' => $room->id,
                'name' => $room->name,
                'description' => $room->description,
                'type' => $room->type,
                'base_price' => $room->base_price,
                'max_guests' => $room->max_guests,
                'amenities' => $room->amenities,
                'images' => $room->images,
                'features' => $this->getRoomFeatures($room)
            ];

            // Add pricing if dates provided
            if ($request->has(['check_in', 'check_out'])) {
                $guests = $request->get('guests', 1);
                $isAvailable = $room->isAvailable($request->check_in, $request->check_out);
                
                $roomData['availability'] = [
                    'is_available' => $isAvailable,
                    'pricing' => $isAvailable 
                        ? $this->bookingService->calculatePricing($room, $request->check_in, $request->check_out, $guests)
                        : null
                ];
            }

            return $roomData;
        });

        return response()->json(['room_comparison' => $comparison]);
    }

    /**
     * Helper method to get room features based on amenities and type
     */
    private function getRoomFeatures($room)
    {
        $features = [];
        
        // Map amenities to user-friendly features
        $amenityMap = [
            'wifi' => 'Free WiFi',
            'ac' => 'Air Conditioning',
            'tv' => 'Flat Screen TV',
            'minibar' => 'Mini Bar',
            'balcony' => 'Private Balcony',
            'ocean_view' => 'Ocean View',
            'city_view' => 'City View',
            'spa_access' => 'Spa Access',
            'gym_access' => 'Gym Access',
            'room_service' => '24/7 Room Service',
            'safe' => 'In-room Safe',
            'bathtub' => 'Bathtub',
            'shower' => 'Rain Shower',
            'coffee_machine' => 'Coffee Machine'
        ];

        foreach ($room->amenities as $amenity) {
            if (isset($amenityMap[$amenity])) {
                $features[] = $amenityMap[$amenity];
            }
        }

        // Add type-specific features
        switch ($room->type) {
            case 'suite':
                $features[] = 'Separate Living Area';
                $features[] = 'Premium Location';
                break;
            case 'deluxe':
                $features[] = 'Premium Amenities';
                $features[] = 'Enhanced Service';
                break;
        }

        return array_unique($features);
    }

    /**
     * Helper method to get unavailable dates for a room in a range
     */
    private function getUnavailableDates($room, $checkIn, $checkOut)
    {
        $unavailableDates = [];
        
        // Get dates from confirmed bookings
        $bookings = $room->bookings()
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in', [$checkIn, $checkOut])
                      ->orWhereBetween('check_out', [$checkIn, $checkOut])
                      ->orWhere(function ($q) use ($checkIn, $checkOut) {
                          $q->where('check_in', '<=', $checkIn)
                            ->where('check_out', '>=', $checkOut);
                      });
            })
            ->get(['check_in', 'check_out']);

        foreach ($bookings as $booking) {
            $period = CarbonPeriod::create($booking->check_in, $booking->check_out->subDay());
            foreach ($period as $date) {
                $unavailableDates[] = $date->format('Y-m-d');
            }
        }

        return array_unique($unavailableDates);
    }
}
