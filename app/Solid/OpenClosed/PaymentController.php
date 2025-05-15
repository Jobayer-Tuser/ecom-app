<?php

namespace App\Solid\OpenClosed;

class PaymentController
{
    public function processPayment()
    {
        match(config('payment.payment_processor')){
            'stripe' => $paymentProcessor = new StripePaymentProcessor(),
            'paypal' => $paymentProcessor = new PaypalPaymentProcessor(),
        };

        $paymentService = new PaymentService($paymentProcessor);
        $paymentService->process(100);
    }
}
