@section('title', 'master data user management')

@extends('admin.master');

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">
                            <h3>Master Data User Management</h3>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('user-management.create') }}" class="btn btn-primary">Add Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 20%;">Name</th>
                            <th style="width: 20%;">Email</th>
                            <th style="width: 10%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($user_data as $users )
                        <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>
                       <div style="display: flex; align-items:center; gap: 10px;">
                       <a href="{{ route('user-management.edit', $users->id) }}" class="btn btn-info">Edit</a>

                        <form action="" method="post"
                        onsubmit="return confirm('Are you sure want to delete this data?')"
                        style="margin: 0";>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                       </div>
                        </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

