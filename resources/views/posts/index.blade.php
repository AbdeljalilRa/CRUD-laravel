@extends('layouts.master')
@section('title')
    Index
@endsection
@section('content')
    <a class="btn btn-primary " href="{{ route('posts.create') }}">Create Post</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>image</th>
                <th>Posted by</th>
                <th>Create At</th>
                <th>َAction</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td>{{ $post['title'] }}</td>
                    <td><img width="50px" src=" image/{{$post->image}}" alt=""></td>
                    <td>{{$post->user ? $post->user->name :'not found'}}</td>
                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-info btn-ms ">View</a>
                        <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-primary btn-ms">Edit</a>
                        <form style="display: inline;" method="POST" action="{{ route('posts.destroy', $post['id']) }}" >
                            @csrf
                            @method('DELETE')
                            <button  href="{{ route('posts.edit', $post['id']) }}" onclick="return confirm('are you sure you want to delete the {{ $post['title'] }}')" class="btn btn-danger btn-ms ">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
