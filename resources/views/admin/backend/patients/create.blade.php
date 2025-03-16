@extends('admin.master')

@section('content')

<div class="container-fluid">
    <h2>Add New Patient</h2>
    <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="patient_code">Patient Code</label>
            <input type="text" class="form-control" id="patient_code" placeholder="enter patient patient_code" name="patient_code">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="enter patient name" name="name">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="enter patient address" name="address">
        </div>

        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" class="form-control" id="birth_date" placeholder="enter patient birth_date" name="birth_date">
        </div>

        <div class="form-group">
            <label for="national_id">National ID</label>
            <input type="text" class="form-control" id="national_id" placeholder="enter patient national_id" name="national_id">
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" name="gender">
                <option>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="education">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="enter patient phone" name="phone">
        </div>

        <div class="form-group">
            <label for="religion">Religion</label>
            <select name="religion" id="religion" class="form-control" name="religion">
                <option>Select Religion</option>
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="hindu">Hindu</option>
                <option value="budha">Budha</option>
                <option value="konghucu">Konghucu</option>
            </select>
        </div>

        <div class="form-group">
            <label for="education">Education</label>
            <select name="education" id="education" class="form-control" name="education">
                <option>Select Education</option>
                <option value="sd">SD</option>
                <option value="smp">SMP</option>
                <option value="sma">SMA</option>
                <option value="sarjana">S1</option>
                <option value="master">S2</option>
                <option value="doctor">S3</option>
            </select>
        </div>

        <div class="form-group">
            <label for="occupation">Occupation</label>
            <select name="occupation" id="occupation" class="form-control" name="occupation">
                <option>Select Status</option>
                <option value="employed">Employed</option>
                <option value="unemployed">Unemployed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="complaint">Complaint</label>
            <input type="text" class="form-control" id="complaint" placeholder="enter patient complaint" name="complaint">
        </div>

        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" id="doctors" class="form-control" name="doctor_id">
                <option>Select Doctors</option>
                @foreach ($doctors as $doctor )
                    <option value="{{ $doctor->id }}">{{ $doctor->name }} - {{ $doctor->clinic->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add</button>
        <a href="{{ route('patients.index') }}" class="btn btn-warning">Back</a>
    </form>
</div>
    
@endsection