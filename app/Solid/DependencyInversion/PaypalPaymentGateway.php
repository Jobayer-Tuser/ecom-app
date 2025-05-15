<?php

namespace App\Solid\DependencyInversion;

class PaypalPaymentGateway implements PaymentGatewayInterface
{
    public function charge(float $amount): array
    {
        return [
            "status" => "success",
            "amount" => $amount,
            "message" => "Payment successful with Paypal",
        ];
    }
}
