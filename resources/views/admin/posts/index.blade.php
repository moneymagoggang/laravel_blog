@extends('layouts.app-admin')

@push('styles')

@endpush

@section('content')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Author Profile</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $post->image) }}" class="mr-75" height="20" width="20" alt="Icon">
                        <span class="font-weight-bold">{{ $post->title }}</span>
                    </td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                        <div class="avatar-group">
{{--                            @foreach($post->users as $user)--}}
                                <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" title="{{ $post->user->name }}" class="avatar pull-up my-0">
                                    <img src="" alt="Avatar" height="26" width="26">
                                </div>
{{--                            @endforeach--}}
                        </div>
                    </td>
                    <td>
                        @if ($post->status === 0)
                            <span class="badge badge-pill badge-light-warning mr-1">Review</span>
                        @elseif ($post->status === 1)
                            <span class="badge badge-pill badge-light-success mr-1" >Confirmed</span>
                        @elseif ($post->status === 2)
                            <span class="badge badge-pill badge-light-danger mr-1">Declined</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item bg-light-success" href="{{ route('admin.posts.confirm', $post) }}">
                                    <span>CONFIRM</span>
                                </a>
                                <a class="dropdown-item bg-light-danger" href="{{ route('admin.posts.decline', $post) }}">
                                    <span>DECLINE</span>
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    <span>Edit</span>
                                </a>
                                <form action="{{ route('admin.posts.delete', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  type="submit" class="dropdown-item w-100" href="javascript:void(0);">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash mr-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                            Delete

                                    </button>
                                </form>



                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
