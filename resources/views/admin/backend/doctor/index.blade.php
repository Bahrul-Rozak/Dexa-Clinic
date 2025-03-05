@section('title', 'master data doctor')

@extends('admin.master');

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">
                            <h3>Master Data Doctor</h3>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('doctor.create') }}" class="btn btn-primary">Add Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 20%;">Name</th>
                            <th style="width: 20%;">Address</th>
                            <th style="width: 20%;">Clinics</th>
                            <th style="width: 20%;">Phone Number</th>
                            <th style="width:10%;">Schedule</th>
                            <th style="width: 10%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

