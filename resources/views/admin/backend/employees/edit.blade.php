@extends('admin.master')

@section('content')

<div class="container-fluid">
    <h2>Edit Employee</h2>
    <form action="{{ route('employees.update', $employee_data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="employee_code">Employee Code</label>
            <input type="text" class="form-control" id="employee_code" placeholder="enter employee code" name="employee_code" value="{{ old('employee_code',$employee_data->employee_code )}}">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="enter employee name" name="name" value="{{ old('name',$employee_data->name )}}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="enter employee address" name="address" value="{{ old('address',$employee_data->address )}}">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" name="gender">
                @foreach(['male', 'female'] as $gender)

                <option value="{{ $gender }}" 
                @if ($employee_data->gender == $gender) selected @endif>{{ $gender }}
                </option>

                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="enter employee phone" name="phone" value="{{ old('phone',$employee_data->phone )}}">
        </div>
        <div class="form-group">
            <label for="religion">Religion</label>
            <select name="religion" id="religion" class="form-control" name="religion">
                @foreach(['islam', 'kristen', 'hindu', 'budha','konghucu'] as $religion)

                <option value="{{ $religion }}" 
                @if ($employee_data->religion == $religion) selected @endif>{{ $religion }}
                </option>

                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="position">Position</label>

            <select name="position" id="position" class="form-control" name="position">
                @foreach(['nurse', 'pharmacist', 'doctor', 'finance','security'] as $position)

                <option value="{{ $position }}" 
                @if ($employee_data->position == $position) selected @endif>{{ $position }}
                </option>

                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('employees.index') }}" class="btn btn-warning">Back</a>
    </form>
</div>
    
@endsection