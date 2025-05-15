<?php

namespace App\Solid\DependencyInversion;

interface PaymentGatewayInterface
{
    public function charge(float $amount) : array;
}
