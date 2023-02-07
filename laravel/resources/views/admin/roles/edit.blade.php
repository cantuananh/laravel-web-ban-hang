@extends('admin.layouts.app')
@section('title', 'Edit Roles '.$role->name)
@section('content')
    <div class="cart">
        <h1>Create Roles</h1>
        <div>
            <form action="{{ route('roles.update', $role->id) }}" method="post">
                @csrf
                @method('PUT')


                <div class="p-4 card">
                    <form>
                        <div class="input-group input-group-dynamic mb-4">
                            <label class="form-label">Name</label>
                            <input type="text" value="{{ old('name') ?? $role->name }}" name="name" class="form-control">
                        </div>
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="input-group input-group-dynamic mb-4">
                            <label class="form-label">Display name</label>
                            <input type="text" value="{{ old('display_name') ?? $role->display_name }}" name="display_name"
                                   class="form-control">
                        </div>
                        @error('display_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="input-group input-group-static mb-4">
                            <label class="ms-0">Group</label>
                            <select class="form-control" name="group"  value="{{$role->group}}">
                                <option value="system">System</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        @error('group')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label>Permission</label>
                            <div class="row">
                                @foreach($permissions as $groupName => $permission)
                                    <div class="col-5">
                                        <h4>{{$groupName}}</h4>
                                        <div>
                                            @foreach($permission as $item)
                                                <div class="form-check">
                                                    <input class="form-check-input" name="permission_ids[]"
                                                           type="checkbox" {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}
                                                           value="{{$item->id}}">
                                                    <label class="custom-control-label"
                                                           for="customCheck1">{{$item->display_name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="m-auto">
                            <button type="submit" class="btn-primary btn-submit" style="border: none;">Submit</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>
@endsection
