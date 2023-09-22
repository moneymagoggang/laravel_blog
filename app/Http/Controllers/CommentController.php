<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(CommentRequest $request)
    {

        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['post_id'] = $request->input('post_id');
        $post = $request->input('post_id');
        $comments = Comment::create($validatedData);

        return to_route('post.show', $comments);


    }
    public function create()
    {

    }
    public function index()
    {

    }
    public function show($postId)
    {
//
//        $post = Post::query()->find($postId);
//        $comments = Comment::query()->where('post_id', $postId)->get();
//
//        return view('post.show', compact('post', 'comments'));
    }
}
