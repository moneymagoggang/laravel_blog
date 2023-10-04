@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
    @endif

<h1>Posts</h1>
@if(auth()->check())
    <a class="btn w-100 btn-primary w-full  text-decoration-none text-white" href="{{ route('buyCreate') }}">Create Post</a>
@else
    <a class="btn w-100 btn-primary w-full text-decoration-none text-white" href="{{ route('register') }}">Register to Create New Post</a>
@endif
<div class="mt-2 ">
    <a class="text-decoration-none" href="{{ route('post.index') }}"><span class="tag bg-black text-white inline-flex items-center px-3 py-0.5 rounded-5 text-xs fw-bold leading-5 font-display mr-2 capitalize bg-brand-500 ">All</span></a>
    <a class="text-decoration-none" href="{{ route('posts.by.tag', 'Developer Tools') }}"><span class="tag bg-success text-white inline-flex items-center px-3 py-0.5 rounded-5 text-xs fw-bold leading-5 font-display mr-2 capitalize bg-brand-500 ">Developer Tools</span></a>
    <a class="text-decoration-none" href="{{ route('posts.by.tag', 'News') }}"><span class="tag bg-danger text-white inline-flex items-center px-3 py-0.5 rounded-5 text-xs fw-bold leading-5 font-display mr-2 capitalize bg-brand-500 ">News</span></a>
    <a class="text-decoration-none" href="{{ route('posts.by.tag', 'Others') }}"><span class="tag bg-warning text-white inline-flex items-center px-3 py-0.5 rounded-5 text-xs fw-bold leading-5 font-display mr-2 capitalize bg-brand-500 ql-bg-orange">Others</span></a>
</div>
<div class="row cont-post mx-auto w-100">






    @foreach($posts as $post)
{{--                        <div class="col-md-4">--}}
    @if($post->status == '1')
        <a class="post mb-5 text-decoration-none col-md-4 rounded my-5" href="{{ route('post.show', $post) }}">


                <div class="card-block ">

                    @if ($post->image)
                        <img
                            class="img rounded w-full mb-4 rounded-lg shadow-none transition transition-shadow duration-500 ease-in-out group-hover:shadow-lg lazyloaded "
                            src="{{ asset('storage/' . $post->image) }}" alt="Картинка поста">
                    @endif

                        <span class="{{ $post->tag_id == '1' ? 'bg-success' : ($post->tag_id == '2' ? 'bg-danger' : ($post->tag_id == '3' ? 'bg-warning' : '')) }} inline-flex items-center px-3 py-0.5 rounded-5 text-xs fw-bold leading-5 text-white font-display mr-2 capitalize bg-brand-500 ">{{ $post->tag->name }}</span>
                        <span class="fw-light text-black">{{ \Carbon\Carbon::parse($post->created_at)->format('F jS, Y') }}</span>
                        <h4 class="card-title p-1 text-black text-decoration-underline">{{ $post->title }}</h4>
{{--                    <h6 class="card-subtitle text-muted">Support card subtitle</h6>--}}
                        {{--                    <p class="card-text p-y-1">{{ $post->content }}</p>--}}
                        {{--                                <p class="card-text p-y-1 text-end">Author: {{ $post->user->name }}</p>--}}

                </div>


        </a>
        @endif
    @endforeach


            <div>
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>





@endsection
