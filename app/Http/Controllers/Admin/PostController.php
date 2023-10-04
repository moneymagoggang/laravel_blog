<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Stripe\Stripe;

class PostController extends Controller
{
    //
    public function index(): View
    {
        $posts = Post::get();
        return view('admin.posts.index', compact('posts'));
    }
    public function delete(Post $post)
    {
        $post->delete();
        return to_route('admin.posts.index');

    }
    public function confirmPost(Post $post)
    {
        $post->update([
            'status' => '1',
        ]);
        $post->save();
        return redirect()->back()->with('massage', 'Post successfully confirmed');
    }
    public function declinePost(Post $post)
    {
        $post->update([
            'status' => '2',
        ]);
        $post->save();

//        Stripe::setApiKey(config('stripe.sk'));
//        $stripeSessionId = session('stripe_pay_id');
//        dd($stripeSessionId);
//        $session = \Stripe\Checkout\Session::retrieve($stripeSessionId);
//
//        $session = \Stripe\Checkout\Session::([
//
//        ]);
//        return redirect()->away($session->url);


        return redirect()->back();
    }
}
