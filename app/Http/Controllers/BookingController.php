<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Services\BookingService;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    protected $bookingService;
    protected $paymentService;

    public function __construct(BookingService $bookingService, PaymentService $paymentService)
    {
        $this->bookingService = $bookingService;
        $this->paymentService = $paymentService;
    }

    public function searchRooms(Request $request)
    {
        $request->validate([
            'check_in' => 'required|date|after:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
            'amenities' => 'array'
        ]);

        $rooms = Room::searchAvailable(
            $request->check_in,
            $request->check_out,
            $request->guests,
            $request->amenities ?? []
        );

        return response()->json([
            'rooms' => $rooms->map(function ($room) use ($request) {
                $pricing = $this->bookingService->calculatePricing(
                    $room,
                    $request->check_in,
                    $request->check_out,
                    $request->guests
                );

                return [
                    'id' => $room->id,
                    'name' => $room->name,
                    'description' => $room->description,
                    'type' => $room->type,
                    'max_guests' => $room->max_guests,
                    'amenities' => $room->amenities,
                    'images' => $room->images,
                    'pricing' => $pricing
                ];
            })
        ]);
    }

    public function createBooking(BookingRequest $request)
    {
        try {
            $booking = $this->bookingService->createBooking(
                Auth::id(),
                $request->room_id,
                $request->only(['check_in', 'check_out', 'guests']),
                $request->guest_details
            );

            // Create payment intent
            $paymentIntent = $this->paymentService->createPaymentIntent(
                $booking->total_price,
                'usd',
                ['booking_id' => $booking->id]
            );

            return response()->json([
                'booking' => $booking,
                'payment_intent' => $paymentIntent
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function confirmBooking(Request $request, $bookingId)
    {
        $request->validate([
            'payment_intent_id' => 'required|string',
            'payment_method' => 'required|string'
        ]);

        try {
            $paymentIntent = $this->paymentService->confirmPayment($request->payment_intent_id);

            if ($paymentIntent->status === 'succeeded') {
                $booking = $this->bookingService->confirmBooking(
                    $bookingId,
                    $paymentIntent->id,
                    $request->payment_method
                );

                return response()->json([
                    'booking' => $booking,
                    'message' => 'Booking confirmed successfully!'
                ]);
            }

            return response()->json(['error' => 'Payment failed'], 400);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function cancelBooking(Request $request, $bookingId)
    {
        try {
            $booking = $this->bookingService->cancelBooking(
                $bookingId,
                $request->cancellation_reason
            );

            return response()->json([
                'booking' => $booking,
                'message' => 'Booking cancelled successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function getUserBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with('room')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json(['bookings' => $bookings]);
    }
}
