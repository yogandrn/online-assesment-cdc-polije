<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" / " target="_blank">
            <img src="../assets/img/logo_polije_lengkap.png" class="navbar-brand-img h-100" alt="main_logo">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link {{ ($title === "Dashboard") ? 'active' : '' }}" href="{{ url('/admin/dashboard') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ ($title === "Gaya Kepribadian") ? 'active' : '' }}" href="{{ url('/admin/kepribadian') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Gaya Kepribadian</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Minat Karir</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="sidebarDropdown">
                    <li><a class="dropdown-item" href="{{ url('/admin/karir/realistic') }}">Realistic</a></li>
                    <li><a class="dropdown-item" href="{{ url('/admin/karir/investigative') }}">Investigative</a></li>
                    <li><a class="dropdown-item" href="{{ url('/admin/karir/artistic') }}">Artistic</a></li>
                    <li><a class="dropdown-item" href="{{ url('/admin/karir/social') }}">Social</a></li>
                    <li><a class="dropdown-item" href="{{ url('/admin/karir/enterprising') }}">Enterprising</a></li>
                    <li><a class="dropdown-item" href="{{ url('/admin/karir/conventional') }}">Conventional</a></li>
                </ul>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link {{ ($title === "Minat Karir") ? 'active' : '' }}" href="{{ url('/admin/karir') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Minat Karir</span>
                </a>
            </li> -->

            <li class="nav-item">
                <a class="nav-link {{ ($title === "User") ? 'active' : '' }}" href="{{ url('/admin/user') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
        </ul>
        <form action="{{url('logout')}}" method="POST" class="mx-2">
            @csrf
            <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-primary btn-sl btn-sl w-100 mt-3 mb-0"> <i class="fas fa-power-off text-white text-sm opacity-10"></i> Logout</button>
            </div>
        </form>
    </div>
</aside>