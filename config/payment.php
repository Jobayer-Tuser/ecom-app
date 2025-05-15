<?php

return [
    'payment_processor' => env('PAYMENT_PROCESSOR', 'stripe'),
    'stripe' => [
        'mode'           => env('STRIPE_PAYMENT_MODE', 'sandbox'),
        'secret'         => env('STRIPE_SECRET_KEY'),
        'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),
    ],
    'paypal' => [
        'mode'          => env('PAYPAL_MODE', 'sandbox'),
        'secret'        => env('PAYPAL_SECRET'),
        'client_id'     => env('PAYPAL_CLIENT_ID'),
    ],
];
