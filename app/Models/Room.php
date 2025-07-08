<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'type', 'base_price', 'max_guests', 
        'amenities', 'availability', 'images'
    ];

    protected $casts = [
        'base_price' => 'decimal:2'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function availability()
    {
        return $this->hasMany(RoomAvailabilities::class);
    }

    public function isAvailable($checkIn, $checkOut)
    {
        // Check if room is generally available
        if ($this->availability !== 'available') {
            return false;
        }

        // Check for conflicting bookings
        $conflictingBookings = $this->bookings()
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->where(function ($q) use ($checkIn, $checkOut) {
                    $q->where('check_in', '<=', $checkIn)
                      ->where('check_out', '>', $checkIn);
                })->orWhere(function ($q) use ($checkIn, $checkOut) {
                    $q->where('check_in', '<', $checkOut)
                      ->where('check_out', '>=', $checkOut);
                })->orWhere(function ($q) use ($checkIn, $checkOut) {
                    $q->where('check_in', '>=', $checkIn)
                      ->where('check_out', '<=', $checkOut);
                });
            })
            ->exists();

        return !$conflictingBookings;
    }

    public function getPriceForDates($checkIn, $checkOut)
    {
        $startDate = Carbon::parse($checkIn);
        $endDate = Carbon::parse($checkOut);
        $totalPrice = 0;

        while ($startDate->lt($endDate)) {
            $availability = $this->availability()
                ->where('date', $startDate->format('Y-m-d'))
                ->first();

            $dailyPrice = $availability && $availability->price_override 
                ? $availability->price_override 
                : $this->base_price;

            $totalPrice += $dailyPrice;
            $startDate->addDay();
        }

        return $totalPrice;
    }

    public static function searchAvailable($checkIn, $checkOut, $guests = 1, $amenities = [])
    {
        return self::where('availability', 'available')
            ->where('max_guests', '>=', $guests)
            ->when(!empty($amenities), function ($query) use ($amenities) {
                foreach ($amenities as $amenity) {
                    $query->whereJsonContains('amenities', $amenity);
                }
            })
            ->get()
            ->filter(function ($room) use ($checkIn, $checkOut) {
                return $room->isAvailable($checkIn, $checkOut);
            });
    }
}
