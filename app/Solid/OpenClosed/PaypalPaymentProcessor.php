<?php

namespace App\Solid\OpenClosed;

class PaypalPaymentProcessor implements PaymentProcessor
{
    public function pay(float $amount) : string
    {
        return "Paid $amount via Paypal";
    }
}
