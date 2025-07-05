<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Booking;
use App\Models\Room;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Update room availability daily at midnight
        $schedule->call(function () {
            // Mark bookings as completed
            Booking::where('check_out', now()->format('Y-m-d'))
                ->where('status', 'confirmed')
                ->update(['status' => 'completed']);

            // Update room availability
            $completedBookingRoomIds = Booking::where('check_out', now()->format('Y-m-d'))
                ->where('status', 'completed')
                ->pluck('room_id')
                ->toArray();

            foreach ($completedBookingRoomIds as $roomId) {
                $room = Room::find($roomId);
                if ($room) {
                    // Check if room has other active bookings
                    $hasActiveBookings = $room->bookings()
                        ->whereIn('status', ['confirmed', 'pending'])
                        ->where('check_out', '>', now()->format('Y-m-d'))
                        ->exists();

                    if (!$hasActiveBookings) {
                        $room->update(['availability' => 'available']);
                    }
                }
            }

            \Log::info('Room availability updated for ' . count($completedBookingRoomIds) . ' rooms');

        })->dailyAt('00:01')->name('update-room-availability');

        // Clean up expired pending bookings (30 minutes)
        $schedule->call(function () {
            Booking::where('status', 'pending')
                ->where('created_at', '<', now()->subMinutes(30))
                ->update(['status' => 'cancelled']);

        })->everyFiveMinutes()->name('cleanup-expired-bookings');
    }
}
