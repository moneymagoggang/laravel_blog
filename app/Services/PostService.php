<?php

namespace App\Services;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Rating;
use App\Notifications\AdminReviewNotification;
use App\Notifications\TestNotification;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostService
{
    protected PostRepository $repository;
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }
    public function store(StoreRequest $request)
    {

        $post = $this->repository->store($request);
        $this->storeImage($request, $post);
        $this->sendNotificationToAdmin();

    }
    public function show(Post $post)
    {
        $user = auth()->user();
        if ($user && $user->subscription && $user->subscription->ends_at > now()) {
            $freeSeePost = true;
            $randomPosts = Post::query()
                ->where('id', '!=', $post->id)
                ->inRandomOrder()
                ->limit(3)
                ->get();

            return [
                'post' => $post,
                'randomPosts' => $randomPosts,
                'freeSeePost' => $freeSeePost,
            ];
        } else {
            if (session()->has('count_post_see')) {
                $countPostSee = session()->get('count_post_see');
                session()->put('count_post_see', $countPostSee + 1);
            } else {
                session()->put('count_post_see', 1);
            }
            $freeSeePost = true;
            if (session()->get('count_post_see') > 2) {
                $freeSeePost = false;
            }
            $randomPosts = Post::query()
                ->where('id', '!=', $post->id)
                ->inRandomOrder()
                ->limit(3)
                ->get();

            return [
                'post' => $post,
                'randomPosts' => $randomPosts,
                'freeSeePost' => $freeSeePost,
            ];
        }
    }
    public function rate(Post $post)
    {
        $this->repository->rate($post);
        $this->rateNotify($post);
    }
    public function rateNotify($post)
    {
        $author = $post->user;
        $author->notify(new TestNotification(Auth::user(), $post));
    }
    private function storeImage(StoreRequest $request, Post $post)
    {
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
            $post->save();
        }

    }
    private function sendNotificationToAdmin()
    {
        $admin = Admin::first();
        $admin->notify(new AdminReviewNotification());

    }
}
