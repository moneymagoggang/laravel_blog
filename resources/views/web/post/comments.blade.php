@foreach ($comments as $comment)
    <div class="card mb-3 {{ $comment->parent_id ? 'comment-tree ' : '' }}">
        <div class="card-header">
            <strong>{{ $comment->user->name }}</strong> - {{ $comment->created_at->format('d/m/Y H:i') }}
        </div>
        <div class="card-body d-flex justify-content-between">
            <p class="d-inline card-text ">{{ $comment->text }}</p>
            @if(auth()->user()->name == $comment->user->name)
                <form method="POST" action="{{ route('comments.destroy', [$comment, $post]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif


            <a href="#" class="btn btn-primary reply-button">Reply</a>
            <div class="reply-form" style="display: none;">
                <form method="POST" action="{{ route('comments.store') }}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <div class="form-group">
                        <label for="text">Reply:</label>
                        <textarea id="text" name="text" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Reply</button>
                </form>
            </div>


        </div>
        @include('web.post.comments',  ['comments' => $comment->replies])
    </div>
@endforeach
