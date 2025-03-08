@extends('admin.master')

@section('content')

<div class="container-fluid">
    <h2>Edit Schedule</h2>
    <form action="{{ route('schedule.update', $schedule_data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="practice_schedule">Practice Schedule</label>
            <input type="text" class="form-control" id="practice_schedule" placeholder="enter clinic name" name="practice_schedule" value="{{ old('practice_schedule',$schedule_data->practice_schedule )}}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('schedule.index') }}" class="btn btn-warning">Back</a>
    </form>
</div>
    
@endsection