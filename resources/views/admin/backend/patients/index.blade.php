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
                        <a href="" class="btn btn-primary">Add Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 10%;">patient_code</th>
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
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

