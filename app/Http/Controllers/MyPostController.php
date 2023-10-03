<?php

namespace App\Http\Controllers;

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
    public function update(Request $request, Post $post)
    {



        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'tag' => $request->input('tag'),
        ]);

        return redirect()->route('my-posts')->with('success', 'Пост успешно обновлен.');
    }

}
