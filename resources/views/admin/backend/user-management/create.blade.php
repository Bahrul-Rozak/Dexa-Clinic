@extends('admin.master')

@section('content')

<div class="container-fluid">
    <h2>Add New User</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="enter user name" name="name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="enter user email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="enter user password" name="password">
        </div>

        <div class="form-group">
            <label for="is_super_admin">Is Super Admin?</label>
            <select name="is_super_admin" id="is_super_admin" class="form-control" name="is_super_admin">
                <option>Select</option>
                <option value="is_admin">Admin</option>
                <option value="is_super_admin">Super Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="is_admin">Is Admin?</label>
            <select name="is_admin" id="is_admin" class="form-control" name="is_admin">
                <option>Select</option>
                <option value="is_admin">Admin</option>
                <option value="is_super_admin">Super Admin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add</button>
        <a href="{{ route('user-management.index') }}" class="btn btn-warning">Back</a>
    </form>
</div>
    
@endsection