<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CommentRequest;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected CommentService $service;
    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }
    public function store(CommentRequest $request)
    {
        $post = $request->input('post_id');
        $comments = $this->service->store($request);

        return to_route('post.show', compact('comments', 'post'));
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }


}
