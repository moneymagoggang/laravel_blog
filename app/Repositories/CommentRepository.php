<?php

namespace App\Repositories;

use App\Http\Requests\Post\CommentRequest;
use App\Models\Comment;

class CommentRepository
{
    public function store(CommentRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['post_id'] = $request->input('post_id');

        return $comments = Comment::create($validatedData);
    }
}
