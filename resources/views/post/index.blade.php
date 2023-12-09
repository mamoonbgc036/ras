@extends('dashboard')
@section('index')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Post Table</h4>
            <a href="{{ route('post.create') }}" class="btn btn-info">Create Post</a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Post Id</th>
                            <th>Post Name</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Start date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(empty(auth()->user()->posts))
                        <tr>There is no post</tr>
                        @else
                        @foreach(auth()->user()->posts as $post)
                        <tr>
                            <td>
                                {{ $post->id }}
                            </td>
                            <td>{{ $post->name }}</td>
                            <td class="py-1">
                                <img src="{{ asset($post->image) }}" alt="image">
                            </td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route( 'post.toggle', $post->id ) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-secondary">{{ $post->toggle ? 'Off' : 'On' }}</button>
                                    </form>
                                    <a href="{{ route('post.edit', $post) }}" class="btn btn-sm btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg></a>
                                    <form action="{{ route( 'post.destroy', $post->id ) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection