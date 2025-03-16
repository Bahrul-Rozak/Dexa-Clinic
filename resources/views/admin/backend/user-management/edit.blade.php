@extends('admin.master')

@section('content')

<div class="container-fluid">
    <h2>Edit User</h2>
    <form action="{{ route('user-management.update', $user_data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="enter user name" name="name" value="{{ old('name',$user_data->name )}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="enter user email" name="email" value="{{ old('email',$user_data->email )}}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="enter user password" name="password" value="{{ old('password',$user_data->password )}}">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" placeholder="enter user password_confirmation" name="password_confirmation">
        </div>

        <div class="form-group">
            <label for="is_super_admin">Is Super Admin</label>
            <select name="is_super_admin" id="is_super_admin" class="form-control" name="is_super_admin">
                <option value="0" @if($user_data->is_super_admin == 0) selected @endif>No</option>
                <option value="1" @if($user_data->is_super_admin == 1) selected @endif>Yes</option>
            </select>
        </div>

        <div class="form-group">
            <label for="is_admin">Is Admin</label>
            <select name="is_admin" id="is_admin" class="form-control" name="is_admin">
                <option value="0" @if($user_data->is_admin == 0) selected @endif>No</option>
                <option value="1" @if($user_data->is_admin == 1) selected @endif>Yes</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('user-management.index') }}" class="btn btn-warning">Back</a>
    </form>
</div>

@endsection