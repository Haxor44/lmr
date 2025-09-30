<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Booking;
use App\Events\BookingCreated;
use App\Events\BookingCancelled;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
//se Illuminate\Support\Facades\Log;
use App\Notifications\BookingConfirmation;

class BookingService
{
    public function calculatePricing($room, $checkIn, $checkOut, $guests)
    {
        $baseAmount = $room->getPriceForDates($checkIn, $checkOut);
        $taxRate = 0.10; // 10% tax
        $taxAmount = $baseAmount * $taxRate;
        $totalPrice = $baseAmount + $taxAmount;

        return [
            'base_amount' => $baseAmount,
            'tax_amount' => $taxAmount,
            'total_price' => $totalPrice,
            'duration' => now()->parse($checkOut)->diffInDays(now()->parse($checkIn))
        ];
    }

    public function createBooking($userId, $roomId, $bookingData, $guestDetails)
    {
        return DB::transaction(function () use ($userId, $roomId, $bookingData, $guestDetails) {
            $room = Room::lockForUpdate()->findOrFail($roomId);

            // Final availability check
            if (!$room->isAvailable($bookingData['check_in'], $bookingData['check_out'])) {
                throw new \Exception('Room is no longer available for the selected dates.');
            }

            $pricing = $this->calculatePricing(
                $room,
                $bookingData['check_in'],
                $bookingData['check_out'],
                $bookingData['guests']
            );

            $booking = Booking::create([
                'user_id' => $userId,
                'room_id' => $roomId,
                'check_in' => $bookingData['check_in'],
                'check_out' => $bookingData['check_out'],
                'guests' => $bookingData['guests'],
                'base_amount' => $pricing['base_amount'],
                'tax_amount' => $pricing['tax_amount'],
                'total_price' => $pricing['total_price'],
                'guest_details' => $guestDetails,
                'status' => 'pending'
            ]);

             

            // Clear cache for room availability
            Cache::forget("room_availability_{$roomId}");

            event(new BookingCreated($booking));
            //event(sendBookingConfirmation());
             
            return $booking;
        });
        //return null;
        
    }

    protected function sendBookingConfirmation($booking)
    {
        try {
            // Load required relationships if not already loaded
            $booking->load(['room', 'user']);
            
            // Send confirmation email to user
            $booking->user->notify(new BookingConfirmation($booking));
            
            // Log successful notification
            \Log::info('Booking confirmation sent', [
                'booking_id' => $booking->id,
                'user_email' => $booking->user->email
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Failed to send booking confirmation: ' . $e->getMessage(), [
                'booking_id' => $booking->id ?? 'unknown'
            ]);
        }
    }

    public function confirmBooking($bookingId, $paymentId, $paymentMethod)
    {
        return DB::transaction(function () use ($bookingId, $paymentId, $paymentMethod) {
            $booking = Booking::lockForUpdate()->findOrFail($bookingId);

            $booking->update([
                'status' => 'confirmed',
                'payment_id' => $paymentId,
                'payment_method' => $paymentMethod
            ]);

            // Update room availability - be more conservative with room status
            $this->updateRoomAvailabilityForBooking($booking);

            // Send confirmation notification
            $this->sendBookingConfirmation($booking);

            return $booking;
        });
    }

    /**
     * Update room availability based on booking dates
     */
    protected function updateRoomAvailabilityForBooking($booking)
    {
        $room = $booking->room;
        
        // Only mark room as booked if no other active bookings overlap
        $overlappingBookings = $room->bookings()
            ->where('id', '!=', $booking->id)
            ->whereIn('status', ['confirmed', 'pending'])
            ->where(function ($query) use ($booking) {
                $query->where(function ($q) use ($booking) {
                    $q->where('check_in', '<=', $booking->check_in)
                      ->where('check_out', '>', $booking->check_in);
                })->orWhere(function ($q) use ($booking) {
                    $q->where('check_in', '<', $booking->check_out)
                      ->where('check_out', '>=', $booking->check_out);
                })->orWhere(function ($q) use ($booking) {
                    $q->where('check_in', '>=', $booking->check_in)
                      ->where('check_out', '<=', $booking->check_out);
                });
            })
            ->exists();

        if (!$overlappingBookings && $room->availability === 'available') {
            $room->update(['availability' => 'booked']);
        }
    }

    public function cancelBooking($bookingId, $reason = null)
    {
        return DB::transaction(function () use ($bookingId, $reason) {
            $booking = Booking::lockForUpdate()->findOrFail($bookingId);

            if (!$booking->canBeCancelled()) {
                throw new \Exception('This booking cannot be cancelled.');
            }

            $booking->update(['status' => 'cancelled']);

            // Check if room can be made available again
            $room = $booking->room;
            $hasOtherBookings = $room->bookings()
                ->where('id', '!=', $booking->id)
                ->where('status', '!=', 'cancelled')
                ->where(function ($query) use ($booking) {
                    $query->whereBetween('check_in', [$booking->check_in, $booking->check_out])
                          ->orWhereBetween('check_out', [$booking->check_in, $booking->check_out]);
                })
                ->exists();

            if (!$hasOtherBookings) {
                $room->update(['availability' => 'available']);
            }

            event(new BookingCancelled($booking, $reason));

            return $booking;
        });
    }
}