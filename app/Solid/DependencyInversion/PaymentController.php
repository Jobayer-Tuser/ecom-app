<?php

namespace App\Solid\DependencyInversion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(private readonly PaymentGatewayInterface $paymentGateway)
    {
        // dependency inversion means higher level controller should not depend on lower level classes directly, rather it should depend on interfaces
    }

    public function process(Request $request): array
    {
        $amount = (float) $request->input('amount');

        return $this->paymentGateway->charge($amount);
    }
}
