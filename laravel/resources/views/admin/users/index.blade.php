@extends('admin.layouts.app')
@section('title', 'Users')
@section('content')
    <div class="card">

        @if(session('message'))
            <div>{{ session('message') }}</div>
        @endif

        <h1>User list</h1>
        <div>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
        </div>
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            @foreach($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <img
                            src="{{ $item->images->count() > 0 ? asset('upload/users/' . $item->images->first()->url) : 'default.png'}}"
                            width="50px" height="50px" alt="image_error"></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        <a href="{{route('users.edit', $item->id)}}" class="btn btn-warning btn-edit-user">Edit</a>
                        <form method="post" action="{{route('users.destroy', $item->id)}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-delete-user" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$users->links()}}
    </div>
@endsection
