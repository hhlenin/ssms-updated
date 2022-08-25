<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <form class="d-none d-sm-inline-block">
        <div class="input-group input-group-navbar">
            <input type="text" class="form-control" placeholder="Search…" aria-label="Search">
            <button class="btn" type="button">
                <i class="align-middle" data-feather="search"></i>
            </button>
        </div>
    </form>



    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            
            
            <li class="nav-item dropdown">
                <a class="nav-icon pe-md-0 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    @if(auth()->user() != null)
                    <img src='{{asset(auth()->user()->image)}}' class="avatar img-fluid rounded" alt="Charles Hall" />
                    @else
                    <img src="{{asset('admin/assets/')}}/img/avatars/avatar.jpg" class="avatar img-fluid rounded" alt="Charles Hall" />
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{route('user.profile.edit')}}"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                    <a class="dropdown-item" href="" 
                    onclick="event.preventDefault(); document.getElementById('logoutForm').submit()"
                    ><i class="align-middle me-1" data-feather="log-out"></i> Log out</a>
                </div>
                <form action="{{route('logout')}}" method="POST" id="logoutForm">@csrf</form>
            </li>
        </ul>
    </div>
</nav>