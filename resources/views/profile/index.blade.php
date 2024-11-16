@extends('layouts.master')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Create At</th>
            <th>َAction</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id}}</td>
                <td>{{ $user->name }}</td>
                <td>{{$user->email}}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="" class="btn btn-info btn-ms ">View</a>
                    <a href="" class="btn btn-primary btn-ms">Edit</a>
                    <form style="display: inline;" method="POST" action="" >
                        @csrf
                        @method('DELETE')
                        <button  href="" onclick="return confirm('are you sure you want to delete the ')" class="btn btn-danger btn-ms ">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-dropdown-link :href="route('profile.edit')">
    {{ __('Profile') }}
</x-dropdown-link>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-dropdown-link>
</form>
@endsection