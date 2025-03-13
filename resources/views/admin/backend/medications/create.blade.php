@extends('admin.master')

@section('content')

<div class="container-fluid">
    <h2>Add New Medications</h2>
    <form action="{{ route('medications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="medication_code">Medications Code</label>
            <input type="text" class="form-control" id="medication_code" placeholder="enter medications code" name="medication_code">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" id="stock" placeholder="enter medications stock" name="stock">
        </div>
        <div class="form-group">
            <label for="type_id">Type Id</label>
            <select name="type_id" id="type_id" class="form-control" name="type_id">
                <option>Select Type</option>
                @foreach ($medications_type_data as $type )
                <option value="{{ $type->id }}">{{ $type->medication_type }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="enter medications name" name="name">
        </div>
        <div class="form-group">
            <label for="dosage">Dosage</label>
            <input type="text" class="form-control" id="dosage" placeholder="enter medications dosage" name="dosage">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" placeholder="enter medications price" name="price">
        </div>
        <div class="form-group">
            <label for="expiration_date">Expiration Date</label>
            <input type="date" class="form-control" id="expiration_date" placeholder="enter medications expiration date" name="expiration_date">
        </div>

        <button type="submit" class="btn btn-success">Add</button>
        <a href="{{ route('medications.index') }}" class="btn btn-warning">Back</a>
    </form>
</div>

@endsection