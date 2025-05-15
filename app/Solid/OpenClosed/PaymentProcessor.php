<?php

namespace App\Solid\OpenClosed;

interface PaymentProcessor
{
    public function pay(float $amount);
}
