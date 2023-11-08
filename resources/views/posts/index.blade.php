<!-- resources/views/posts/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Posts</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
        <hr>
        @foreach($posts as $post)
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <p class="card-text">Author: {{ $post->name }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">View Post</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
