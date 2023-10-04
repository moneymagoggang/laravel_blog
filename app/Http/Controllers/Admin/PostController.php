<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    //
    public function index(): View
    {
        $posts = Post::get();
        return view('admin.posts.index', compact('posts'));
    }
}
