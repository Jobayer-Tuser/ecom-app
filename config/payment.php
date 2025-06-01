<?php

return [
    'processor' => env('PROCESSOR', 'stripe'),
    'stripe' => [
        'mode'           => env('STRIPE_MODE', 'sandbox'),
        'api_key'        => env('STRIPE_API_KEY'),
        'secret_key'     => env('STRIPE_SECRET_KEY'),
        'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),
    ],
    'paypal' => [
        'mode'          => env('PAYPAL_MODE', 'sandbox'),
        'secret'        => env('PAYPAL_SECRET'),
        'client_id'     => env('PAYPAL_CLIENT_ID'),
    ],
];
