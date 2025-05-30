<!-- Tambahkan ini di <head> kalau belum ada Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #e9f7f9;
        font-family: 'Segoe UI', sans-serif;
    }
    .login-card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 8px 24px rgba(0, 123, 255, 0.2);
    }
    .login-header {
        color: #0d6efd;
    }
</style>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="login-card p-4" style="width: 100%; max-width: 420px;">
        <h3 class="text-center login-header mb-4">🏥 Patient Portal Login</h3>
        <form method="POST" action="{{ route('patient.login.post') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">📧 Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="you@example.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">🔐 Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">🩺 Login</button>
            </div>

        </form>
    </div>
</div>
