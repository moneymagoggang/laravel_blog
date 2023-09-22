<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    //

    public function index()
    {
//        $posts = Post::all();
        $posts = Post::query()->orderBy('created_at', 'asc')->paginate(6);


        return view('web.post.index', compact('posts'));
    }

    public function show(Post $post)
    {
//        \session()->forget('count_post_see');
        if(session()->has('count_post_see')){
           $countPostSee = session()->get('count_post_see');
            session()->put('count_post_see',$countPostSee++);
        } else {
            session()->put('count_post_see', 1);
        }
        // add post id check
        $freeSeePost = true;
        if(\session()->get('count_post_see') > 2){
            $freeSeePost = false;
        }


        $randomPosts = Post::query()->where('id', '!=', $post->id)->inRandomOrder()->limit(3)->get();


        return view('web.post.show', compact('post', 'randomPosts'));
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
//        return redirect()->route('my-posts');
    }

    public function store(StoreRequest $request)
    {

        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['tag_id'] = $request->input('tag_id');



        $post = Post::create($validatedData);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }
        $post->save();


        return redirect()->route('post.index')->with('success', 'Post created successfully')->with('post', $post);

    }

    public function postsByTag($tag)
    {
//        $posts = Post::where('tag', 'like', '%' . $post . '%')->paginate();
//        return view('web.post.index', compact('posts'));
        $tagModel = Tag::query()->where('name', $tag)->first();
        $posts = $tagModel->posts()->paginate(6);
        return view('web.post.index', compact('posts'));
    }




//    public function test()
//    {
//        Post::all();
//        Post::query()->where('tag', 'like', '%' . 'hi' . '%')->paginate();
//    }


}
