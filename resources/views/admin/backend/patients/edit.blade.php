@extends('admin.master')

@section('content')

<div class="container-fluid">
    <h2>Edit Patient</h2>
    <form action="{{ route('patients.update', $patient_data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="patient_code">Patient Code</label>
            <input type="text" class="form-control" id="patient_code" placeholder="enter patient patient_code" name="patient_code" readonly value="{{ old('patient_code',$patient_data->patient_code )}}">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="enter clinic name" name="name" value="{{ old('name',$patient_data->name )}}">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="enter patient address" name="address" value="{{ old('address',$patient_data->address )}}">
        </div>

        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" class="form-control" id="birth_date" placeholder="enter patient birth_date" name="birth_date" value="{{ old('birth_date',$patient_data->birth_date )}}">
        </div>

        <div class="form-group">
            <label for="national_id">National ID</label>
            <input type="text" class="form-control" id="national_id" placeholder="enter patient national_id" name="national_id" value="{{ old('national_id',$patient_data->national_id )}}">
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" name="gender">
                @foreach(['male', 'female'] as $gender)

                <option value="{{ $gender }}" 
                @if ($patient_data->gender == $gender) selected @endif>{{ $gender }}
                </option>

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="education">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="enter patient phone" name="phone" value="{{ old('phone',$patient_data->phone )}}">
        </div>

        <div class="form-group">
            <label for="religion">Religion</label>
            <select name="religion" id="religion" class="form-control" name="religion">
                @foreach(['islam', 'kristen', 'hindu', 'budha','konghucu'] as $religion)

                <option value="{{ $religion }}" 
                @if ($patient_data->religion == $religion) selected @endif>{{ $religion }}
                </option>

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="education">Education</label>
            <select name="education" id="education" class="form-control" name="education">
                @foreach(['sd', 'smp', 'sma', 'sarjana', 'master', 'doctor'] as $education)
                <option value="{{ $education }}" 
                @if ($patient_data->education == $education) selected @endif>{{ $education }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="occupation">Occupation</label>
            <select name="occupation" id="occupation" class="form-control" name="occupation">
                @foreach(['employed', 'unemployed'] as $occupation)

                <option value="{{ $occupation }}" 
                @if ($patient_data->occupation == $occupation) selected @endif>{{ $occupation }}
                </option>

                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="complaint">Complaint</label>
            <input type="text" class="form-control" id="complaint" placeholder="enter patient complaint" name="complaint">
        </div>

        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control" name="doctor_id">
            @foreach ($doctors as $doctor)
                  <option value="{{ $doctor->id }}"
                    @if ($patient_data->doctor_id == $doctor->id) 
                    selected @endif>
                    dr. {{ $doctor->name }} - {{ $doctor->clinic->name }}
                  </option>
               @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('patients.index') }}" class="btn btn-warning">Back</a>
    </form>
</div>
    
@endsection