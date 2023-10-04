<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Notifications\PurchaseNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function index()
    {
        return view('web.checkout.plans');
    }
    public function buyCreate(Request $request)
    {
        Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'product_data' => [
                            'name' => 'create post'
                        ],
                        'unit_amount' => 500,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('post.create',),
            'cancel_url' => route('cancel'),
        ]);

//        session(['stripe_pay_id' => $session]);

        return redirect()->away($session->url);
    }
    public function checkout()
    {
        Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price' => 'price_1NudA1BGzo7T2JSzgVDuw7NG',
                    'quantity' => 1,
                ]
            ],
            'mode' => 'subscription',
            'success_url' => route('success',),
            'cancel_url' => route('cancel'),
        ]);
        session(['stripe_session_id' => $session->id]);

        return redirect()->away($session->url);
    }
    public function success()
    {
        Stripe::setApiKey(config('stripe.sk'));
        $stripeSessionId = session('stripe_session_id');
        $session = \Stripe\Checkout\Session::retrieve($stripeSessionId);


        $user = Auth::user(); // Assuming you have authenticated users
        $subscription = new Subscription();
        $subscription->user_id = $user->id;
        $subscription->stripe_subscription_id = $session->subscription;
        $subscription->status = 'active';
        $subscription->plan = 'premium'; // Adjust the path to the plan ID as needed
        $subscription->ends_at = Carbon::now()->addMonth();;
        $subscription->save();

        return view('web.checkout.success');
    }
    public function abort()
    {
        $user = auth()->user();


            Stripe::setApiKey(config('stripe.sk'));

            $subscription = \Stripe\Subscription::retrieve($user->subscription->stripe_subscription_id);
            $subscription->cancel();

            // Обновляем данные в базе данных для подписки
            $user->subscription->update([
                'status' => 'canceled', // Можете использовать свой статус подписки
            ]);

            return redirect()->back()->with('success', 'Подписка успешно отменена.');

    }
}
