@extends('admin.master')

@section('content')

<div class="container-fluid">
    <h2>Add New Employee</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="employee_code">Employee Code</label>
            <input type="text" class="form-control" id="employee_code" placeholder="enter employee code" name="employee_code">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="enter employee name" name="name">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="enter employee address" name="address">
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
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="enter employee phone" name="phone">
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
            <label for="position">Position</label>
            <select name="position" id="position" class="form-control" name="position">
                <option>Select Position</option>
                <option value="nurse">Nurse</option>
                <option value="pharmacist">Pharmacist</option>
                <option value="doctor">Doctor</option>
                <option value="finance">Finance</option>
                <option value="security">Security</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add</button>
        <a href="{{ route('employees.index') }}" class="btn btn-warning">Back</a>
    </form>
</div>
    
@endsection