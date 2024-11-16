@extends('layouts.master')
@section('title')
    Create
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
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title') }}">

        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>

        <input type="hidden" name="post_Creator" value="{{ Auth::user()->id}}">
        
        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image" value="{{ old('image') }}">

        <input type="submit" value="Submit" class="my-2 btn btn-outline-primary" >
    </form>
@endsection
