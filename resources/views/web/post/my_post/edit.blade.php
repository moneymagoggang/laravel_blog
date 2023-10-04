@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Edit Post</h1>
        <form action="{{ route('my-posts.update', $post) }}" method="POST" class="needs-validation">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}">

            </div>
            <div class="form-group">
                <label for="title">STATUS</label>
                <input type="number" name="status" id="title" class="form-control @error('status') is-invalid @enderror" value="{{ $post->status }}">

            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <div id="editor">{{ $post->content }} </div>
                <textarea name="content" id="content" class="form-control d-none">
                {{ $post->content }}
                </textarea>

            </div>
            <div class="form-group">
                <label for="tag">Tag</label>
                <select name="tag" id="tag" class="form-control">
                    <option value="Developer Tools">1. Developer Tools</option>
                    <option value="News">2. News</option>
                    <option value="Packages">3. Music</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>

    </div>
@endsection
