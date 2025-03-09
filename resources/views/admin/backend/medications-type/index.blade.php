@section('title', 'master data medications type')

@extends('admin.master');

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-title">
                        <h3>Master Data Medications Type</h3>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ route('medications-type.create') }}" class="btn btn-primary">Add Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 85%;">Medications Type</th>
                        <th style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($medications_type_data as $types )
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td>{{$types->medication_type}}</td>
                        <td>
                            <div style="display: flex; align-items:center; gap: 10px;">
                                <a href="{{ route('medications-type.edit', $types->id) }}" class="btn btn-info">Edit</a>
                                <form action="" method="post"
                                    onsubmit="return confirm('Are you sure want to delete this data?')"
                                    style="margin: 0" ;>
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