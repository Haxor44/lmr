<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Services\BookingService;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PesapalPaymentController extends Controller
{
    protected $paymentService;
    protected $bookingService;

    public function __construct(PaymentService $paymentService, BookingService $bookingService)
    {
        $this->paymentService = $paymentService;
        $this->bookingService = $bookingService;
    }

    /**
     * Show payment form for a booking
     */
    public function show($bookingId)
    {
        try {
            $booking = Booking::with(['room', 'user'])->findOrFail($bookingId);
            
            // Check if booking is payable
            if ($booking->status !== 'pending') {
                return redirect()->back()->with('error', 'This booking cannot be paid for.');
            }

            return view('payments.show', compact('booking'));
            
        } catch (\Exception $e) {
            Log::error('Payment form display error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Booking not found.');
        }
    }

    /**
     * Initiate payment process
     */
    public function initiate(Request $request, $bookingId)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|string|max:15',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'country_code' => 'sometimes|string|max:5',
            'city' => 'sometimes|string|max:50',
            'address_line_1' => 'sometimes|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $booking = Booking::with(['room', 'user'])->findOrFail($bookingId);
            
            if ($booking->status !== 'pending') {
                return response()->json([
                    'success' => false,
                    'message' => 'This booking cannot be paid for.'
                ], 400);
            }

            $billingAddress = [
                'phone' => $request->phone,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'country_code' => $request->country_code ?? 'KE',
                'city' => $request->city ?? '',
                'line_1' => $request->address_line_1 ?? '',
                'line_2' => $request->address_line_2 ?? '',
                'state' => $request->state ?? '',
                'postal_code' => $request->postal_code ?? '',
                'zip_code' => $request->zip_code ?? ''
            ];

            $result = $this->paymentService->createPaymentRequest($booking, $billingAddress);

            if ($result['success']) {
                return response()->json([
                    'success' => true,
                    'redirect_url' => $result['redirect_url'],
                    'order_tracking_id' => $result['order_tracking_id']
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => $result['message']
            ], 400);

        } catch (\Exception $e) {
            Log::error('Payment initiation error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Payment initiation failed. Please try again.'
            ], 500);
        }
    }

    /**
     * Handle payment callback from Pesapal
     */
    public function callback(Request $request)
    {
        try {
            Log::info('Pesapal callback received', $request->all());
            
            $result = $this->paymentService->processPaymentCallback($request->all());
            
            if ($result['success']) {
                $booking = Booking::find($result['booking_id']);
                $message = '';
                
                switch ($result['payment_status']) {
                    case 'completed':
                        $message = 'Payment successful! Your booking has been confirmed.';
                        break;
                    case 'failed':
                    case 'cancelled':
                        $message = 'Payment was not successful. Please try again.';
                        break;
                    default:
                        $message = 'Payment is being processed. We will update you shortly.';
                }
                
                if ($booking) {
                    return redirect()->route('bookings.show', $booking->id)
                        ->with($result['payment_status'] === 'completed' ? 'success' : 'warning', $message);
                }
                
                return redirect()->route('bookings.index')->with('info', $message);
            }
            
            return redirect()->route('bookings.index')
                ->with('error', 'Payment processing failed: ' . $result['message']);
                
        } catch (\Exception $e) {
            Log::error('Payment callback error: ' . $e->getMessage());
            return redirect()->route('bookings.index')
                ->with('error', 'Payment verification failed. Please contact support.');
        }
    }

    /**
     * Handle IPN (Instant Payment Notification) from Pesapal
     */
    public function ipn(Request $request)
    {
        try {
            Log::info('Pesapal IPN received', $request->all());
            
            $result = $this->paymentService->processPaymentCallback($request->all());
            
            if ($result['success']) {
                Log::info('IPN processed successfully', ['booking_id' => $result['booking_id']]);
                return response('OK', 200);
            }
            
            Log::error('IPN processing failed', ['error' => $result['message']]);
            return response('FAILED', 400);
            
        } catch (\Exception $e) {
            Log::error('IPN processing error: ' . $e->getMessage());
            return response('ERROR', 500);
        }
    }

    /**
     * Check payment status
     */
    public function checkStatus($orderTrackingId)
    {
        try {
            $result = $this->paymentService->checkPaymentStatus($orderTrackingId);
            
            return response()->json($result);
            
        } catch (\Exception $e) {
            Log::error('Payment status check error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Status check failed'
            ], 500);
        }
    }

    /**
     * Request refund
     */
    public function requestRefund(Request $request, $paymentId)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'sometimes|numeric|min:0',
            'reason' => 'required|string|max:500'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $payment = Payment::findOrFail($paymentId);
            
            if (!$payment->canBeRefunded()) {
                return response()->json([
                    'success' => false,
                    'message' => 'This payment cannot be refunded.'
                ], 400);
            }

            $result = $this->paymentService->requestRefund(
                $payment,
                $request->amount,
                $request->reason
            );

            return response()->json($result);
            
        } catch (\Exception $e) {
            Log::error('Refund request error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Refund request failed'
            ], 500);
        }
    }

    /**
     * Show payment history for a user
     */
    public function history(Request $request)
    {
        try {
            $user = $request->user(); // Assuming authentication middleware
            
            $payments = Payment::with(['booking.room'])
                ->where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->paginate(15);

            return view('payments.history', compact('payments'));
            
        } catch (\Exception $e) {
            Log::error('Payment history error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Unable to load payment history.');
        }
    }
}
