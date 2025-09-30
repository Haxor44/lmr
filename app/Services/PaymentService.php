<?php
namespace App\Services;

use Nyawach\LaravelPesapal\LaravelPesapal;
use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentService
{
    protected $pesapal;

    public function __construct()
    {
        // Initialize lazily to avoid configuration errors on app boot
    }

    protected function getPesapal()
    {
        if (!$this->pesapal) {
            try {
                $this->pesapal = new LaravelPesapal();
            } catch (\Exception $e) {
                throw new \Exception('Pesapal configuration error: ' . $e->getMessage());
            }
        }
        return $this->pesapal;
    }

    /**
     * Create a payment request with Pesapal
     * 
     * @param Booking $booking
     * @param array $billingAddress
     * @return array
     */
    public function createPaymentRequest(Booking $booking, array $billingAddress = [])
    {
        try {
            $orderTrackingId = 'ORD-' . strtoupper(Str::random(10)) . '-' . $booking->id;
            
            $postData = [
                'id' => $orderTrackingId,
                'currency' => config('pesapal.currency', 'KES'),
                'amount' => $booking->total_price,
                'description' => "Room booking payment for booking #{$booking->confirmation_code}",
                'callback_url' => config('pesapal.callback_url'),
                'notification_id' => config('pesapal.pesapal_ipn_id'),
                'branch' => 'MatFam Resort',
                'billing_address' => array_merge([
                    'email_address' => $booking->user->email,
                    'phone_number' => $billingAddress['phone'] ?? '',
                    'country_code' => $billingAddress['country_code'] ?? 'KE',
                    'first_name' => $booking->user->name ?? $billingAddress['first_name'] ?? '',
                    'middle_name' => $billingAddress['middle_name'] ?? '',
                    'last_name' => $billingAddress['last_name'] ?? '',
                    'line_1' => $billingAddress['line_1'] ?? '',
                    'line_2' => $billingAddress['line_2'] ?? '',
                    'city' => $billingAddress['city'] ?? '',
                    'state' => $billingAddress['state'] ?? '',
                    'postal_code' => $billingAddress['postal_code'] ?? '',
                    'zip_code' => $billingAddress['zip_code'] ?? ''
                ], $billingAddress)
            ];

            $response = $this->getPesapal()->getMerchantOrderURL($postData);

            if (isset($response->order_tracking_id)) {
                // Create payment record
                Payment::create([
                    'transaction_id' => $response->order_tracking_id,
                    'booking_id' => $booking->id,
                    'user_id' => $booking->user_id,
                    'amount' => $booking->total_price,
                    'currency' => config('pesapal.currency', 'KES'),
                    'payment_method' => 'pesapal',
                    'status' => 'pending',
                    'pesapal_merchant_reference' => $response->merchant_reference ?? null,
                    'pesapal_redirect_url' => $response->redirect_url ?? null,
                    'details' => json_encode($postData)
                ]);

                return [
                    'success' => true,
                    'order_tracking_id' => $response->order_tracking_id,
                    'redirect_url' => $response->redirect_url,
                    'merchant_reference' => $response->merchant_reference ?? null
                ];
            }

            throw new \Exception('Invalid response from Pesapal API');

        } catch (\Exception $e) {
            Log::error('Pesapal Payment Creation Error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Payment initialization failed: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Check payment status
     * 
     * @param string $orderTrackingId
     * @return array
     */
    public function checkPaymentStatus($orderTrackingId)
    {
        try {
            $response = $this->getPesapal()->getTransactionStatus($orderTrackingId);
            
            if ($response) {
                return [
                    'success' => true,
                    'status' => $response->payment_status_description ?? 'unknown',
                    'amount' => $response->amount ?? 0,
                    'currency' => $response->currency ?? config('pesapal.currency'),
                    'confirmation_code' => $response->confirmation_code ?? null,
                    'payment_method' => $response->payment_method ?? 'pesapal',
                    'created_date' => $response->created_date ?? null,
                    'merchant_reference' => $response->merchant_reference ?? null
                ];
            }

            return [
                'success' => false,
                'message' => 'Transaction not found'
            ];

        } catch (\Exception $e) {
            Log::error('Pesapal Status Check Error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Status check failed: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Process payment callback/confirmation
     * 
     * @param array $callbackData
     * @return array
     */
    public function processPaymentCallback($callbackData)
    {
        try {
            $orderTrackingId = $callbackData['OrderTrackingId'] ?? null;
            $merchantReference = $callbackData['OrderMerchantReference'] ?? null;

            if (!$orderTrackingId) {
                throw new \Exception('Order tracking ID missing from callback');
            }

            // Get payment status from Pesapal
            $statusResult = $this->checkPaymentStatus($orderTrackingId);

            if (!$statusResult['success']) {
                throw new \Exception('Failed to verify payment status');
            }

            // Update payment record
            $payment = Payment::where('transaction_id', $orderTrackingId)->first();
            
            if (!$payment) {
                throw new \Exception('Payment record not found');
            }

            $payment->update([
                'status' => strtolower($statusResult['status']),
                'pesapal_confirmation_code' => $statusResult['confirmation_code'],
                'pesapal_payment_method' => $statusResult['payment_method'],
                'completed_at' => $statusResult['status'] === 'COMPLETED' ? now() : null
            ]);

            // If payment is successful, update booking
            if (strtolower($statusResult['status']) === 'completed') {
                $booking = $payment->booking;
                if ($booking && $booking->status === 'pending') {
                    $booking->update([
                        'status' => 'confirmed',
                        'payment_method' => 'pesapal',
                        'payment_id' => $payment->id
                    ]);
                }
            }

            return [
                'success' => true,
                'payment_status' => strtolower($statusResult['status']),
                'booking_id' => $payment->booking_id ?? null
            ];

        } catch (\Exception $e) {
            Log::error('Pesapal Callback Processing Error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Callback processing failed: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Request refund for a transaction
     * 
     * @param Payment $payment
     * @param float $amount
     * @param string $reason
     * @return array
     */
    public function requestRefund(Payment $payment, $amount = null, $reason = 'Customer request')
    {
        try {
            $refundAmount = $amount ?? $payment->amount;
            
            $postData = [
                'confirmation_code' => $payment->pesapal_confirmation_code,
                'amount' => $refundAmount,
                'username' => config('app.name'),
                'remarks' => $reason
            ];

            $response = $this->getPesapal()->refundTransaction($postData);

            if ($response && isset($response->status)) {
                $payment->update([
                    'refund_status' => 'requested',
                    'refund_amount' => $refundAmount,
                    'refund_reason' => $reason,
                    'refunded_at' => now()
                ]);

                return [
                    'success' => true,
                    'refund_status' => $response->status,
                    'message' => 'Refund request submitted successfully'
                ];
            }

            throw new \Exception('Invalid refund response');

        } catch (\Exception $e) {
            Log::error('Pesapal Refund Error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Refund request failed: ' . $e->getMessage()
            ];
        }
    }
}
