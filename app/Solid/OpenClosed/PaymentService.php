<?php

namespace App\Solid\OpenClosed;

readonly class PaymentService
{
    public function __construct(private PaymentProcessor $paymentProcessor)
    {
    }

    /**
     *
     * @param float $amount
     * @return mixed
     */
    public function process(float $amount): mixed
    {
        return $this->paymentProcessor->pay($amount);
    }
}
