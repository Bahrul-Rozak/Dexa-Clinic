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

<hr>
<h3>Medical Record History</h3>

<!-- Tombol Tambah Rekam Medis -->
<a href="javascript:void(0)" class="btn btn-primary create-medical-btn" data-patient-id="{{ $patient_data->id }}" data-name="{{ $patient_data->name }}">
    Add
</a>

<table id="example" class="table table-striped table-bordered" width="100%;">
    <thead>
        <tr>
            <th>Date</th>
            <th>Complaint</th>
            <th>Service</th>
            <th>Diagnosis</th>
            <th>Notes</th>
            <th>Blood Type</th>
            <th>Height</th>
            <th>Waist</th>
            <th>Weight</th>
            <th>Treatment</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($medical_records as $record)
        <tr>
            <td>{{ $record->created_at->format('Y-m-d') }}</td>
            <td>{{ $record->complaint }}</td>
            <td>{{ $record->service }}</td>
            <td>{{ $record->diagnosis }}</td>
            <td>{{ $record->notes }}</td>
            <td>{{ $record->blood_type }}</td>
            <td>{{ $record->height }} cm</td>
            <td>{{ $record->waist }} cm </td>
            <td>{{ $record->weight }} kg </td>
            <td>{{ $record->treatment }} </td>
            <td>
                <a href="{{ route('medical-record.edit', $record->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('medical-record.destroy', $record->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal -->

<div class="modal fade" id="createMedicalRecordModal" tabindex="-1" aria-labelledby="createMedicalRecordLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createMedicalRecordLabel">Create Medical Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createMedicalRecordForm" action="{{ route('patient.medical-record.store', $patient_data->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="patient_id" id="patient_id">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="doctor_id" class="form-label">Doctor</label>
                                <select class="form-control" name="doctor_id" required>
                                    @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">dr. {{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Patient Name</label>
                                <input type="text" class="form-control" id="patient_name" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Examination Date</label>
                                <input type="date" class="form-control" name="examination_date" value="{{ now()->format('Y-m-d') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Complaint</label>
                                <textarea class="form-control" name="complaint" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Service</label>
                                <select name="service" id="service" class="form-control">
                                    @foreach(["BPJS", "Jamkesda", "KIS", "Jampersal", "Prudential", "AXA Mandiri", "Allianz", "Manulife", "AIA", "Sinarmas MSIG", "Sequis Life", "Jasa Raharja", "BRI Life", "Puskesmas", "RSUD"] as $service)
                                    <option value="{{ $service }}">{{ $service }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Diagnosis</label>
                                <textarea class="form-control" name="diagnosis"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label">Blood Type</label>
                                <select class="form-control" name="blood_type">
                                    @foreach(["A", "B", "AB", "O"] as $blood)
                                    <option value="{{ $blood }}">{{ $blood }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Height (cm)</label>
                                <input type="number" class="form-control" name="height" min="1">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Waist (cm)</label>
                                <input type="number" class="form-control" name="waits" min="1">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Weight (kg)</label>
                                <input type="number" class="form-control" name="weight" min="1">
                            </div>

                            <div class="form-group">
                                <label>Treatment</label>
                                <select class="form-control" name="treatment">
                                @foreach(["outpatient","inpatient"] as $treatment)
                                    <option value="{{ $treatment }}">{{ $treatment }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Save Record</button>
                </form>
            </div>
        </div>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.create-medical-btn').click(function() {
            let patientId = $(this).data('patient-id');
            let patientName = $(this).data('name');

            $('#patient_id').val(patientId);
            $('#patient_name').val(patientName);
            $('#createMedicalRecordModal').modal('show');
        });
    });
</script>
    
@endsection