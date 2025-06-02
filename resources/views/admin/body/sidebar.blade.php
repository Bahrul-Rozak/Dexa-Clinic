<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @php
                $user = Auth::user();
                $picture = $user->picture ?? null; // asumsi kolom 'picture' di tabel users atau patients
                @endphp

                @if ($picture)
                <img src="{{ $picture }}" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px; object-fit: cover;">
                @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&color=fff&size=50" class="img-circle elevation-2" alt="User Avatar">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>



        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        @if (auth()->check() && auth()->user()->is_admin)
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <p>
                            Logout
                        </p>
                        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="logout-form">
                            @csrf
                        </form>
                    </a>
                </li>
                <li class="nav-header">Master Data Daily</li>

                <li class="nav-item">
                    <a href="{{ route('message.index') }}" class="nav-link {{ Request::is('message*') ? 'active' : ' ' }}">
                        <p>
                            📩 Message
                        </p>
                    </a>
                    <a href="{{ route('patient-queue.index') }}" class="nav-link {{ Request::is('patient-queue*') ? 'active' : ' ' }}">
                        <p>
                            🙋‍♀️ Queue
                        </p>
                    </a>
                    <a href="{{ route('medical-record.index') }}" class="nav-link {{ Request::is('medical-record*') ? 'active' : ' ' }}">
                        <p>
                            🩺 Medical Record
                        </p>
                    </a>
                    <a href="{{ route('daily-report.index') }}" class="nav-link {{ Request::is('daily-report*') ? 'active' : ' ' }}">
                        <p>
                            📝 Daily Report
                        </p>
                    </a>
                </li>

                <li class="nav-header">Master Data Doctor</li>

                <li class="nav-item">
                    <a href="{{ route('doctor.index') }}" class="nav-link {{ Request::is('doctor*') ? 'active' : ' ' }}">
                        <p>
                            👩‍⚕️ Doctor
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('clinic.index') }}" class="nav-link {{ Request::is('clinic*') ? 'active' : ' ' }}">
                        <p>
                            🩺 Clinic
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('schedule.index') }}" class="nav-link {{ Request::is('schedule*') ? 'active' : ' ' }}">
                        <p>
                            📅 Schedule
                        </p>
                    </a>
                </li>

                <li class="nav-header">Master Data Medication</li>

                <li class="nav-item">
                    <a href="{{ route('medications-type.index') }}" class="nav-link {{ Request::is('medications-type*') ? 'active' : ' ' }}">
                        <p>
                            💊 Medications Type
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('medications.index') }}" class="nav-link {{ Request::is('medications*') ? 'active' : ' ' }}">
                        <p>
                            ⚕ Medications
                        </p>
                    </a>
                </li>

                <li class="nav-header">Master Data Employees</li>

                <li class="nav-item">
                    <a href="{{ route('employees.index') }}" class="nav-link {{ Request::is('employees*') ? 'active' : ' ' }}">
                        <p>
                            💼 Employees
                        </p>
                    </a>
                </li>

                <li class="nav-header">Master Data Patient</li>

                <li class="nav-item">
                    <a href="{{ route('patients.index') }}" class="nav-link {{ Request::is('patients*') ? 'active' : ' ' }}">
                        <p>
                            😷 Patient
                        </p>
                    </a>
                </li>
                @endif

                @if (auth()->check() && auth()->user()->is_super_admin)
                <li class="nav-header">General Setting</li>

                <li class="nav-item">
                    <a href="{{ route('user-management.index') }}" class="nav-link {{ Request::is('user-management*') ? 'active' : ' ' }}"">
                    <p>
                        💻 User Management
                    </p>
                </a>
                </li>
                @endif

                @if (auth('patient')->check())

                <li class=" nav-item">
                        <a href="{{ route('patient.profile.edit') }}" class="nav-link {{ Request::is('user-management*') ? 'active' : '' }}">
                            <p>💻 My Profile</p>
                        </a>
                        <a href="{{ route('user-management.index') }}" class="nav-link {{ Request::is('user-management*') ? 'active' : '' }}">
                            <p>📩 My Message</p>
                        </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <p>
                            👉 Logout
                        </p>
                        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="logout-form">
                            @csrf
                        </form>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>