<?php

namespace App\Exceptions;

use Exception;

class PaymentException extends Exception
{
    public static function initializationFailed($reason = null)
    {
        $message = 'Payment initialization failed';
        if ($reason) {
            $message .= ': ' . $reason;
        }
        return new static($message);
    }

    public static function processingFailed($reason = null)
    {
        $message = 'Payment processing failed';
        if ($reason) {
            $message .= ': ' . $reason;
        }
        return new static($message);
    }

    public static function verificationFailed($transactionId = null)
    {
        $message = 'Payment verification failed';
        if ($transactionId) {
            $message .= " for transaction {$transactionId}";
        }
        return new static($message);
    }

    public static function refundFailed($paymentId, $reason = null)
    {
        $message = "Refund failed for payment {$paymentId}";
        if ($reason) {
            $message .= ': ' . $reason;
        }
        return new static($message);
    }

    public static function paymentNotFound($transactionId)
    {
        return new static("Payment with transaction ID {$transactionId} not found");
    }

    public static function paymentNotRefundable($paymentId)
    {
        return new static("Payment {$paymentId} is not eligible for refund");
    }

    public static function invalidPaymentStatus($paymentId, $currentStatus, $requiredStatus)
    {
        return new static("Payment {$paymentId} has status '{$currentStatus}', but '{$requiredStatus}' is required");
    }

    public static function pesapalApiError($message)
    {
        return new static("Pesapal API Error: {$message}");
    }

    public static function callbackDataMissing($field)
    {
        return new static("Missing required callback data: {$field}");
    }
}
