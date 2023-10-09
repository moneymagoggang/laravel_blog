<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $query = $request->input('search');
        $posts = Post::query()->where('title', 'like', '%' . $query . '%')->paginate();

        return view(('web.post.index'), compact('posts'));
    }
}
