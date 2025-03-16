@section('title', 'master data patients')

@extends('admin.master');

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">
                            <h3>Master Data Patients</h3>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('patients.create') }}" class="btn btn-primary">Add Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 10%;">Patient Code</th>
                            <th style="width: 10%;">Name</th>
                            <th style="width: 10%;">Address</th>
                            <th style="width: 10%;">Birth Date</th>
                            <th style="width: 5%;">Gender</th>
                            <th style="width: 10%;">Phone</th>
                            <th style="width: 10%;">Religion</th>
                            <th style="width: 10%;">Education</th>
                            <th style="width: 10%;">NIK</th>
                            <th style="width: 10%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($patient_data as $patients )
                        <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td>{{$patients->patient_code}}</td>
                        <td>{{$patients->name}}</td>
                        <td>{{$patients->address}}</td>
                        <td>{{$patients->birth_date}}</td>
                        <td>{{$patients->gender}}</td>
                        <td>{{$patients->phone}}</td>
                        <td>{{$patients->education}}</td>
                        <td>{{$patients->occupation}}</td>
                        <td>{{$patients->national_id}}</td>
                        <td>
                       <div style="display: flex; align-items:center; gap: 10px;">
                       <a href="" class="btn btn-info">Edit</a>
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

