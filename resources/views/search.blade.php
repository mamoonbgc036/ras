@extends('home_layout')
@section('blog')
<div class="d-flex justify-content-around">
    <p>Author: <span class="text-success">{{ $user->name ?? '' }}</span></p>
    <p>Date : {{ $date ?? '' }}</p>
</div>
<div class="list-group">
    <!-- Blog List -->
    <!-- var_dump($user->posts->count()) -->
    @if($posts->count()>0)
    @foreach($posts as $post)
    <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ $post->name }}</h5>
            <small>{{ $post->user->name }} - {{ $post->created_at }}</small>
        </div>
    </a>
    @endforeach
    @else
    <h1>There is no post</h1>
    @endif
    <!-- Add more blogs in a similar fashion -->
</div>
@endsection