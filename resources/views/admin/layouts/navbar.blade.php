<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="sidebar-brand-text align-middle">
                AdminKit
                <sup><small class="badge bg-primary text-uppercase">Pro</small></sup>
            </span>
            <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24" fill="none"
                stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF"
                style="margin-left: -3px">
                <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                <path d="M20 12L12 16L4 12"></path>
                <path d="M20 16L12 20L4 16"></path>
            </svg>
        </a>

        <div class="sidebar-user">
            <div class="d-flex justify-content-center">
                <div class="flex-shrink-0">
                    @if(auth()->user() != null)
                    <img src='{{asset(auth()->user()->image)}}' class="avatar img-fluid rounded" alt="Charles Hall" />
                    @else
                    <img src="{{asset('admin/assets/')}}/img/avatars/avatar.jpg" class="avatar img-fluid rounded" alt="Charles Hall" />
                    @endif
                </div>
                <div class="flex-grow-1 ps-2">
                    <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-start">
                        <a class="dropdown-item" href="{{route('user.profile.edit')}}"><i class="align-middle me-1"
                                data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href=""
                            onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"><i
                                class="align-middle me-1" data-feather="log-out"></i> Log out</a>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                        @csrf
                    </form>

                    <div class="sidebar-user-subtitle">Admin</div>
                </div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
                </a>

            </li>

            <li class="sidebar-item">
                <a data-bs-target="#teacherModule" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="command"></i> <span class="align-middle">Teacher Module</span>
                </a>
                <ul id="teacherModule" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('teachers.create') }}">Add
                            Teacher</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('teachers.index') }}">Manage
                            Teacher</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#userModule" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="zap"></i> <span class="align-middle">User Module</span>
                </a>
                <ul id="userModule" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.profile')}}">Add User</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.profile.index')}}">Manage Users</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#studentModule" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Student Module</span>
                </a>
                <ul id="studentModule" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('students.index')}}">Manage Students</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#course" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Course
                        Module</span>
                </a>
                <ul id="course" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{route('admin.courses.index')}}">Manage Courses</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#enroll" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Enroll
                        Module</span>
                </a>
                <ul id="enroll" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('manage.enrolls') }}">Manage Enrolls</a></li>
                </ul>
            </li>



        </ul>

    </div>
</nav>
