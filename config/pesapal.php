<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Pesapal Environment
    |--------------------------------------------------------------------------
    | Set to 'sandbox' for testing or 'live' for production
    */
    'pesapal_env' => env('PESAPAL_ENV', 'sandbox'),

    /*
    |--------------------------------------------------------------------------
    | Pesapal Consumer Key
    |--------------------------------------------------------------------------
    | Your Pesapal consumer key from the developer portal
    */
    'consumer_key' => env('PESAPAL_CONSUMER_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Pesapal Consumer Secret
    |--------------------------------------------------------------------------
    | Your Pesapal consumer secret from the developer portal
    */
    'consumer_secret' => env('PESAPAL_CONSUMER_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Pesapal Guard
    |--------------------------------------------------------------------------
    | Used for additional security (if needed)
    */
    'pesapal_guard' => env('PESAPAL_GUARD', ''),

    /*
    |--------------------------------------------------------------------------
    | Pesapal IPN ID
    |--------------------------------------------------------------------------
    | The IPN ID obtained after registering your IPN URL
    */
    'pesapal_ipn_id' => env('PESAPAL_IPN_ID'),

    /*
    |--------------------------------------------------------------------------
    | Callback URLs
    |--------------------------------------------------------------------------
    | URLs for handling payment responses
    */
    'callback_url' => env('APP_URL') . '/payment/callback',
    'ipn_url' => env('APP_URL') . '/payment/ipn',
    'notification_url' => env('APP_URL') . '/payment/notification',

    /*
    |--------------------------------------------------------------------------
    | Payment Settings
    |--------------------------------------------------------------------------
    */
    'currency' => env('PESAPAL_CURRENCY', 'KES'),
    'language' => env('PESAPAL_LANGUAGE', 'EN'),
];
