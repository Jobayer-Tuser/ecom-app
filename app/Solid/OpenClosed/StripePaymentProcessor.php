<?php

namespace App\Solid\OpenClosed;

class StripePaymentProcessor implements PaymentProcessor
{

    public function pay(float $amount) : string
    {
        return 'Paying $' . $amount . ' with Stripe';
    }
}
