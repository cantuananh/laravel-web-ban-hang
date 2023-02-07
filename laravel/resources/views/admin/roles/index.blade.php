@extends('admin.layouts.app')
@section('title', 'Roles')
@section('content')
    <div class="card">

        @if(session('massage'))
            <div>{{ session('massage') }}</div>
        @endif

        <h1>Role list</h1>
        <div>
            <a href="{{ route('roles.create') }}" class="btn btn-primary">Create role</a>
        </div>
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Display name</th>
                <th>Action</th>
            </tr>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->display_name }}</td>
                    <td>
                        <a href="{{route('roles.edit', $role->id)}}" class="btn btn-warning btn-edit-role">Edit</a>
                        <form method="post" action="{{route('roles.destroy', $role->id)}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-delete-role">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$roles->links()}}
    </div>
@endsection
