@extends('layouts.app')

@section('content')
    @if (!$freeSeePost)

        <div class="modal fade show d-block" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buyModalLabel">Subscription</h5>
                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                            <a href="{{ route('post.index') }}"><span aria-hidden="true">&times;</span></a>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center display-5">You must buy subscription!</p>
                        <a class="btn btn-success d-flex justify-content-center" href="{{ route('plans') }}">Buy Subscription</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-backdrop fade show"></div>
    @endif


    <div class="container">
        <div class="row g-lg-4 justify-content-center ">
            <div class="col">
                <h1 class="fw-bold display-1 my-6 text-xl-start tracking-tighter ">{{ $post->title }}</h1>
            </div>
            <div class="col">
                @if ($post->image)
                    <img class="img-thumbnail w-100 rounded-lg shadow" src="{{ asset('storage/' . $post->image) }}"
                         alt="Картинка поста">
                @endif
            </div>
        </div>
        <span class="fw-light text-black">{{ \Carbon\Carbon::parse($post->created_at)->format('F jS, Y') }}</span>
        <div class="mt-5">
            <div>{!! nl2br($post->content) !!}</div>
        </div>
        <div class="container mt-4">
            @include('web.post.comments', ['comments' => $post->comments])
        </div>
    <form method="POST" action="{{ route('comments.store') }}">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <label for="text"></label>
        <textarea name="text" id="text" class="form-control"></textarea>
        <button class="btn btn-primary mt-1" type="submit">Send</button>
    </form>
    </div>
    <div class="random-posts">
        <h1 class="mx-4 mt-5">
            Might Be Interesting</h1>
        <ul class="row justify-content-between">
            @foreach ($randomPosts as $randomPost)
                <a class="post col mb-5 text-decoration-none col-md-4 rounded my-5"
                   href="{{ route('post.show', $randomPost->id) }}">
                    <div class="card-block ">

                        @if ($randomPost->image)
                            <img
                                class="img rounded w-full mb-4 rounded-lg shadow-none transition transition-shadow duration-500 ease-in-out group-hover:shadow-lg lazyloaded "
                                src="{{ asset('storage/' . $randomPost->image) }}" alt="Картинка поста">
                        @endif
                        <span
                            class="tag inline-flex items-center px-3 py-0.5 rounded-5 text-xs fw-bold leading-5 text-white font-display mr-2 capitalize bg-brand-500 ">{{ $randomPost->tag->name }}</span>
                        <span
                            class="fw-light text-black">{{ \Carbon\Carbon::parse($randomPost->created_at)->format('F jS, Y') }}</span>

                        <h4 class="card-title p-1 text-black text-decoration-underline">{{ $randomPost->title }}</h4>
                        {{--                    <h6 class="card-subtitle text-muted">Support card subtitle</h6>--}}
                        {{--                    <p class="card-text p-y-1">{{ $post->content }}</p>--}}
                        {{--                                <p class="card-text p-y-1 text-end">Author: {{ $post->user->name }}</p>--}}

                    </div>
                </a>

            @endforeach
        </ul>
    </div>

@endsection
