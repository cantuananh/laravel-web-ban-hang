@extends('admin.layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="card">

        @if(session('message'))
            <div>{{ session('message') }}</div>
        @endif

        <h1>Category list</h1>
        <div>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Create category</a>
        </div>
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Parent name</th>
                <th>Action</th>
            </tr>
            @foreach($categories as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->parent_name }}</td>
                    <td>
                        <a href="{{route('categories.edit', $item->id)}}" class="btn btn-warning btn-edit-user">Edit</a>
                        <form method="post" action="{{route('categories.destroy', $item->id)}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-delete-user" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$categories->links()}}
    </div>
@endsection
