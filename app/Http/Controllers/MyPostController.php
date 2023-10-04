<?php

namespace App\Http\Controllers;

use App\Events\BookingEvent;
use App\Http\Requests\EditRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPostController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $posts = $user->posts;

        return view('web.post.my_post.index', compact('posts'));
    }
    public function edit(Post $post)
    {
        return view('web.post.my_post.edit', compact('post'));
    }
    public function update(EditRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        event(new BookingEvent(['amount' => '100', 'email' => 'hey@hey.hey']));

        return redirect()->route('my-posts')->with('success', 'Пост успешно обновлен.');
    }

}
