<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Services\BookingService;
use App\Services\PaymentService;
use App\Services\Pay;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\BookingRequest;
use App\Notifications\BookingConfirmation;



class BookingController extends Controller
{
    protected $bookingService;
    protected $paymentService;
    protected $payment;

    public function __construct(BookingService $bookingService, PaymentService $paymentService, Pay $payment)
    {
        $this->bookingService = $bookingService;
        $this->paymentService = $paymentService;
        $this->payment = $payment;
    }

    protected function getTransaction(){
        try {
            // make post request to payment api endpoint
            // 
           $transactionStatusUrl = "https://cybqa.pesapal.com/pesapalv3/api/Transactions/GetTransactionStatus";
           $getTokenUrl = "https://cybqa.pesapal.com/pesapalv3/api/Auth/RequestToken";
           
           
          
            $oid  = [
            "orderTrackingId" => "5a8b7fcb-09e0-45b9-87b9-db8a35f7e6b0",
            ];
            $status = $this->payment->getTransactionStatus($getTokenUrl,$transactionStatusUrl,$oid);

             dump($status);
            //dump($status);
            
        } catch (\Exception $e) {
            
        }
    }

    protected function makePayment()
    {
        // https://dac03618141a.ngrok-free.app
           
        try {
            // make post request to payment api endpoint
            // 
           $transactionStatusUrl = " https://cybqa.pesapal.com/pesapalv3/api/Transactions/GetTransactionStatus";
           $getIpnUrl = "https://cybqa.pesapal.com/pesapalv3/api/URLSetup/GetIpnList";
           $getTokenUrl = "https://cybqa.pesapal.com/pesapalv3/api/Auth/RequestToken";
           $registerIpnUrl = "https://cybqa.pesapal.com/pesapalv3/api/URLSetup/RegisterIPN";
           $orderUrl = "https://cybqa.pesapal.com/pesapalv3/api/Transactions/SubmitOrderRequest";
           $ipnUrl = "https://98e013836f18.ngrok-free.app/ipn";
           $orderData = [
            "id" => "AA1125-9640XX",
            "currency" => "KES",
            "amount" => 1.00,
            "description" => "Payment description goes here",
            "callback_url" => "https://98e013836f18.ngrok-free.app/confirmation",
            "redirect_mode" => "",
            "notification_id" => "dfb5ae98-0a7f-4afa-9338-db8abb3a343c",
            "branch" => "Store Name - HQ",
            "billing_address" => [
                "email_address" => "john.doe@example.com",
                "phone_number" => "0723xxxxxx",
                "country_code" => "KE",
                "first_name" => "John",
                "middle_name" => "",
                "last_name" => "Doe",
                "line_1" => "Pesapal Limited",
                "line_2" => "",
                "city" => "",
                "state" => "",
                "postal_code" => "",
                "zip_code" => ""
            ]
        ];
           $result = $this->payment->registerIpnUrl(
                $getTokenUrl,
                $registerIpnUrl,
                $ipnUrl
            );

            $ipnUrls = $this->payment->getIpnUrls(
                $getTokenUrl,
                $getIpnUrl
            );

            $order = $this->payment->submitOrder($getTokenUrl,$orderUrl,$orderData);
            $oid = "538605cf-0380-4042-a39e-db8a9f5ba21c";
            //$status = $this->payment->getTransactionStatus($getTokenUrl,$transactionStatusUrl,$oid);

             dump($order);
            //dump($status);
            
        } catch (\Exception $e) {
            
        }
    }

    protected function sendBookingConfirmation()
    {
           
        try {
            // Load required relationships
            $data = array("name" => "John","age" => 30,"city" => "New York");
            $booking = "subaru";
            //$booking = { "name": "John", "age": 30, "car": null }
            //Log::info("Sending booking confirmation to: migec17006@kissgy.com");

            // Send using reservations mailer
            //Mail::to('migec17006@kissgy.com')->send($booking);
             

            $recipientEmail = 'evolmalek04@gmail.com';
            Notification::route('mail', $recipientEmail)
                ->notify(new BookingConfirmation($booking));

           
            
        } catch (\Exception $e) {
            
        }
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
                //Auth::id(),
                $request->user_id,
                $request->room_id,
                $request->only(['check_in', 'check_out', 'guests']),
                $request->guest_details
            );

            $recipientEmail = 'evolmalek04@gmail.com';
            Notification::route('mail', $recipientEmail)
                ->notify(new BookingConfirmation($booking));
            // Create payment intent
            $paymentIntent = "pending";/*$this->paymentService->createPaymentIntent(
                $booking->total_price,
                'usd',
                ['booking_id' => $booking->id]
            );*/

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
            $test = "tests";
        
        return response()->json(['bookings' => $bookings]);
    }

    public function showUserBookings()
    {
        return view('bookings');
    }


}
