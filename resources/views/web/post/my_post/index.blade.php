@extends('layouts.app')

@section('content')
    <div class="row container">
    @foreach($posts as $post)

        <div class="col-md-4 my-5">
            <div class="card-block">

                @if ($post->image)
                    <img  class="img w-full mb-4 rounded-lg shadow-none transition transition-shadow duration-500 ease-in-out group-hover:shadow-lg lazyloaded " src="{{ asset('storage/' . $post->image) }}" alt="Картинка поста">
                @endif

                <h4 class="card-title">{{ $post->title }}</h4>
                <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                <p class="card-text p-y-1">{{ $post->content }}</p>

                <form action="{{ route('post.delete', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('my-posts.edit', $post) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>


    @endforeach
    </div>
@endsection
