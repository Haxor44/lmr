<?php

namespace App\Exceptions;

use Exception;

class BookingException extends Exception
{
    public static function roomNotAvailable($roomId, $checkIn, $checkOut)
    {
        return new static("Room {$roomId} is not available from {$checkIn} to {$checkOut}");
    }

    public static function bookingNotFound($bookingId)
    {
        return new static("Booking with ID {$bookingId} not found");
    }

    public static function bookingNotCancellable($bookingId)
    {
        return new static("Booking {$bookingId} cannot be cancelled");
    }

    public static function bookingAlreadyConfirmed($bookingId)
    {
        return new static("Booking {$bookingId} is already confirmed");
    }

    public static function invalidBookingStatus($bookingId, $currentStatus, $requiredStatus)
    {
        return new static("Booking {$bookingId} has status '{$currentStatus}', but '{$requiredStatus}' is required");
    }
}
