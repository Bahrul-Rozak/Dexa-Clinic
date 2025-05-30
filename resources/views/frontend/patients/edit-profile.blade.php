@extends('admin.master')

@section('content')

<div class="container-fluid">
    <h2 class="mb-4">Edit My Profile</h2>

    <form action="{{ route('patient.profile.update') }}" method="POST">
        @csrf

        <div class="row">
            <!-- Kiri -->
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name', $patient->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email', $patient->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" 
                           id="address" name="address" value="{{ old('address', $patient->address) }}" required>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="gender">Gender</label>
                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                        <option value="male" {{ old('gender', $patient->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $patient->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Kanan -->
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="birth_date">Birth Date</label>
                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" 
                           id="birth_date" name="birth_date" value="{{ old('birth_date', \Carbon\Carbon::parse($patient->birth_date)->format('Y-m-d')) }}" required>
                    @error('birth_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                           id="phone" name="phone" value="{{ old('phone', $patient->phone) }}" required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password">New Password (optional)</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                </div>
            </div>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>

@endsection
