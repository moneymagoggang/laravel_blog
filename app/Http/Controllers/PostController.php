<?php

namespace App\Http\Controllers;

use App\Console\Commands\Test\SendNotification;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Rating;
use App\Models\Tag;
use App\Notifications\AdminReviewNotification;
use App\Notifications\TestNotification;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPUnit\Util\Test;
use Stripe\Stripe;


class PostController extends Controller
{
    protected PostService $service;
    public function __construct(PostService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $posts = Post::query()
            ->where('status', 1)
            ->orderBy('created_at', 'asc')
            ->paginate(6);

        return view('web.post.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $data = $this->service->show($post);

        return view('web.post.show', $data);
    }
    public function create()
    {
        $tags = Tag::all();

        return view('web.post.create', compact('tags'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('my-posts');

    }
    public function store(StoreRequest $request)
    {
       $this->service->store($request);
        return to_route('post.index')
            ->with('success', 'You need wait before admin confirm your post and you will see you post here! Good Luck!');


    }
    public function postsByTag($tag)
    {
        $tagModel = Tag::query()
            ->where('name', $tag)
            ->first();
        $posts = $tagModel->posts()->paginate(6);

        return view('web.post.index', compact('posts'));
    }
    public function rate(Post $post)
    {
        $this->service->rate($post);

        return redirect()->back()->with('success', '!!!!!!!!!');
    }



}
