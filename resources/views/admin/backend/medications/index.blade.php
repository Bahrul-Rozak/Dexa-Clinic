@section('title', 'master data medications')

@extends('admin.master');

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-title">
                        <h3>Master Data Medications</h3>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ route('medications.create') }}" class="btn btn-primary">Add Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 15%;">Medications Code</th>
                        <th style="width: 10%; text-align: right;">Stock</th>
                        <th style="width: 20%;">Name</th>
                        <th style="width: 10%; text-align: right;">Dosage</th>
                        <th style="width: 10%; text-align:right;" >Price</th>
                        <th style="width: 10%; text-align:right;" >Created On</th>
                        <th style="width: 10%; text-align: right;">Expiration Date</th>
                        <th style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($medications_data as $medications )
                        <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td>{{$medications->medication_code}}</td>
                        <td style="text-align: right;">{{$medications->stock}}</td>
                        <td>{{$medications->name}}</td>
                        <td style="text-align: right;">{{$medications->dosage}} mg</td>
                        <td style="text-align: right;">Rp. {{$medications->price}}</td>
                        <td style="text-align: right;">{{$medications->created_at->format('Y-m-d')}}</td>
                        <td style="text-align: right;">{{$medications->expiration_date}}</td>
                        <td>
                       <div style="display: flex; align-items:center; gap: 10px;">
                       <a href="" class="btn btn-info">Edit</a>
                        <form action="" method="post"
                        onsubmit="return confirm('Are you sure want to delete this data?')"
                        style="margin: 0";>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                       </div>
                        </td>
                        </tr>
                            
                        @endforeach
                   

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection