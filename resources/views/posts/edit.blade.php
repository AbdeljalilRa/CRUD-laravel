@extends('layouts.master')
@section('title')
    Edit
@endsection
@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('posts.update',$post->id) }}">
        @csrf
        @method('PUT')
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{ $post->title }}">

        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3">{{ $post->description }}</textarea>

        <label class="form-label">Post Creator</label>
        <select name="post_Creator" id="" class="form-control">
            @foreach ($users as $user)
            <option @selected($post->user_id == $user->id) value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <input type="submit" value="Edit" class="my-2 btn btn-outline-primary" name="submit">
    </form>
@endsection
