<?php
namespace App\Services;

//use Stripe\Stripe;
//use Stripe\PaymentIntent;

class PaymentService
{
    public function __construct()
    {
        //Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function createPaymentIntent($amount, $currency = 'usd', $metadata = [])
    {
        return "Payment processing";/*PaymentIntent::create([
            'amount' => $amount * 100, // Convert to cents
            'currency' => $currency,
            'metadata' => $metadata,
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);*/
    }

    public function confirmPayment($paymentIntentId)
    {
        return "Success!!!";/*PaymentIntent::retrieve($paymentIntentId);*/
    }
}