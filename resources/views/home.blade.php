@extends('home_layout')
@section('filter')
<div class="d-flex">
    <form action="{{ route('home.search') }}" method="GET">
        <div>
            <input type="date" name="date" id="date" placeholder="Search by Date">
        </div>
        <div>
            <select name="userId" id="cars">
                <option value="">Search by author</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-sm btn-info">Search</button>
    </form>
</div>
@endsection
@section('blog')
<h2>Latest Blogs</h2>
<div class="list-group">
    <!-- Blog List -->
    @foreach($users as $user)
    <!-- var_dump($user->posts->count()) -->
    @if($user->posts->count()>0)
    @foreach($user->posts as $post)
    <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ $post->name }}</h5>
            <small>{{ $user->name }} - {{ $post->created_at }}</small>
        </div>
    </a>
    @endforeach
    @endif
    @endforeach
    <!-- Add more blogs in a similar fashion -->
</div>
@endsection