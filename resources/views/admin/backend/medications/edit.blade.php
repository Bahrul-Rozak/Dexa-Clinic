@extends('admin.master')

@section('content')

<div class="container-fluid">
    <h2>Edit Medications Data</h2>
    <form action="{{ route('medications.update', $medications_data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="medication_code">Medications Code</label>
            <input type="text" class="form-control" id="medication_code" placeholder="enter medications code" name="medication_code" value="{{ old('medication_code',$medications_data->medication_code )}}" readonly>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" id="stock" placeholder="enter medications stock" name="stock" value="{{ old('stock',$medications_data->stock )}}">
        </div>
        <div class="form-group">
            <label for="type_id">Type Id</label>
            <select name="type_id" id="type_id" class="form-control" name="type_id">
                @foreach ($medications_type_data as $type)
               <option value="{{ $type->id }}"
                    @if ($medications_data->type_id == $type->id) 
                    selected @endif>
                    {{ $type->medication_type }}
                  </option>
               @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="enter medications name" name="name" value="{{ old('name',$medications_data->name )}}">
        </div>
        <div class="form-group">
            <label for="dosage">Dosage</label>
            <input type="text" class="form-control" id="dosage" placeholder="enter medications dosage" name="dosage" value="{{ old('dosage',$medications_data->dosage )}}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" placeholder="enter medications price" name="price" value="{{ old('price',$medications_data->price )}}">
        </div>
        <div class="form-group">
            <label for="expiration_date">Expiration Date</label>
            <input type="date" class="form-control" id="expiration_date" placeholder="enter medications expiration date" name="expiration_date" value="{{ old('expiration_date',$medications_data->expiration_date )}}">
        </div>


        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('medications.index') }}" class="btn btn-warning">Back</a>
    </form>
</div>
    
@endsection