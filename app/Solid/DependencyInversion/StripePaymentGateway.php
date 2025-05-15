<?php

namespace App\Solid\DependencyInversion;

class StripePaymentGateway implements PaymentGatewayInterface
{
    public function charge(float $amount): array
    {
        return [
            "status" => "success",
            "amount" => $amount,
            "message" => "Payment successful with Stripe",
        ];
    }
}
