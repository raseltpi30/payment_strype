<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class TestController extends Controller
{
    public function store(Request $request)
    {
        // return $request->all();
        // Set your Stripe secret key
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $amountInDollars = $request->total_amount;

        // Convert the amount to cents (integer)
        $amountInCents = $amountInDollars * 100;
        $checkout = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $request->item_name,
                    ],
                    'unit_amount' => $amountInCents,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);
        // dd($checkout);
        return redirect()->away($checkout->url);
    }


    public function success()
    {
        return "Payment Success!";
    }
    public function cancel()
    {
        return "Payment Cancel!";
    }
}
