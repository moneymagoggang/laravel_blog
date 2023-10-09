<?php

namespace App\Repositories;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use App\Models\Rating;
use Illuminate\Support\Facades\Cache;

class PostRepository
{
    protected Post $model;
    public function __construct()
    {
        $this->model = new Post();
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['tag_id'] = $request->input('tag_id');
        $data['user_id'] = auth()->user()->id;

       return $this->model->create($data);
    }
    public function rate(Post $post)
    {
        $user = auth()->user();
        $validatedData = request()->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);
        $rating = new Rating([
            'rating' => $validatedData['rating'],
            'user_id' => $user->id,
        ]);
        return $post->ratings()->save($rating);
    }
    public function getPopularPost()
    {
        return Cache::rememberForever('PopularPosts', function () {
            return Post::query()
                ->where('active', true)
                ->orderBy('visits', 'asc')
                ->get();
        });
    }
}
