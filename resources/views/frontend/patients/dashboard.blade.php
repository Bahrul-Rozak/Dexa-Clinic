@section('title', 'master data clinic')

@extends('admin.master');

@section('content')

<!-- Tambahkan ini di <head> kalau belum ada Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .welcome-card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 8px 24px rgba(0, 123, 255, 0.2);
    }

    .welcome-header {
        color: #0d6efd;
    }
</style>

<div class="container mt-5 d-flex justify-content-center">
    <div class="welcome-card p-4 text-center" style="width: 100%; max-width: 500px;">
        <h2>Welcome, {{ Auth::guard('patient')->user()->name }}</h2>
        <p class="text-muted">You're logged in to the Patient Portal.</p>

        <form id="logout-form" action="{{ route('patient.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <button class="btn btn-danger mt-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            🚪 Logout
        </button>
    </div>

</div>

@endsection