<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function index()
    {
        return view('web.checkout.plans');
    }
    public function checkout()
    {
        Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'subscription'
                        ],
                        'unit_amount' => 500,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);
        return redirect()->away($session->url);
    }
    public function success()
    {
        return view('web.checkout.success');
    }
}
