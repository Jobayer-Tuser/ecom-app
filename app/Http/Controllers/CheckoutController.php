<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('frontend.checkout');
    }

    /**
     * Show the form for creating a new resource.
     * @throws ApiErrorException
     */
    public function create(): RedirectResponse|array
    {
        $stripe = new StripeClient(config('payment.stripe.secret'));
        $checkout_session = $stripe->checkout->sessions->create([
            "mode"      => "payment",
            "locale"    => "auto",
            "line_items" => [
                [
                    "price_data" => [
                        "pa currency" => "usd",
                        "unit_amount" => 2000,
                        "product_data" => [
                            "name" => "T-shirt",
                        ],
                    ],
                    "quantity" => 1,
                ]
            ],
            "success_url" => "http://127.0.0.1:8000/success",
            "cancel_url" => "http://127.0.0.1:8000/cancel",
        ]);
        return redirect()->away($checkout_session->url);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
