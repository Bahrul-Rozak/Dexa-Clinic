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
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
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
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
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
                            💊 Medications
                        </p>
                    </a>
                </li>

                <li class="nav-header">Master Data Employees</li>

                <li class="nav-item">
                    <a href="{{ route('employees.index') }}" class="nav-link {{ Request::is('employees*') ? 'active' : ' ' }}">
                        <p>
                            😎 Employees
                        </p>
                    </a>
                </li>

                <li class="nav-header">Master Data Patient</li>

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <p>
                            😷 Patient
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>