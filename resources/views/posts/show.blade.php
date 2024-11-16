@extends('layouts.master')
@section('tittle') Show @endsection
@section('content')
    <div class="mt-4 card">
        <div class="card-header">
            Post info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title : {{ $post->title }}</h5>
            <p class="card-text">Description: {{ $post->description }}</p>

        </div>
    </div>
    <div class="mt-4 card">
        <div class="card-header">
            Post
        </div>
        <div class="card-body">
            <h5 class="card-title">Name : {{$post->user ? $post->user->name :'not found' }}</h5>
            <p class="card-text">Email :{{$post->user ? $post->user->email :'not found' }}</p>
            <p class="card-text">Create at : {{$post->user ? $post->user->created_at->format('l jS \\of F Y h:i:s A')    :'not found' }}</p>

        </div>
    </div>
@endsection
