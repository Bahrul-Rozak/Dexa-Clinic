@extends('admin.master')

@section('content')

<div class="container-fluid">
    <h2>Edit Stock Data</h2>
    <form action="{{ route('medications.add_stock', $medications_data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="stock">Stock Before</label>
            <input type="text" class="form-control" id="stock" placeholder="enter medications stock" name="stock" value="{{ old('stock',$medications_data->stock )}}" readonly>
        </div>
        <div class="form-group">
            <label for="add_stock">Stock New</label>
            <input type="text" class="form-control" id="add_stock" placeholder="enter medications stock" name="add_stock">
        </div>
       
        <div class="form-group">
            <label for="expiration_date">Expiration Date Before</label>
            <input type="date" class="form-control" id="expiration_date" placeholder="enter medications expiration date" name="expiration_date" value="{{ old('expiration_date',$medications_data->expiration_date )}}" readonly>
        </div>

        <div class="form-group">
            <label for="expiration_date">Expiration Date New</label>
            <input type="date" class="form-control" id="expiration_date" placeholder="enter medications expiration date" name="expiration_date">
        </div>


        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('medications.index') }}" class="btn btn-warning">Back</a>
    </form>
</div>
    
@endsection