@extends('admin.master')

@section('content')

<div class="container-fluid">
    <h2>Edit Medications Type</h2>
    <form action="{{ route('medications-type.update', $medications_type_data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="medication_type">Medications Type</label>
            <input type="text" class="form-control" id="medication_type" placeholder="enter medication type name" name="medication_type" value="{{ old('medication_type',$medications_type_data->medication_type )}}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('medications-type.index') }}" class="btn btn-warning">Back</a>
    </form>
</div>
    
@endsection