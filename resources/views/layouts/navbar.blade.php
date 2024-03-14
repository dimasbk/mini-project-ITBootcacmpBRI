<nav class="navbar navbar-expand justify-content-between fixed-top">
    <a class="navbar-brand mb-0 h1 d-none d-md-block" href="{{ route('dashboard') }}">
        <img src="{{ asset('AdminX/demo/img/logo.png') }}" class="navbar-brand-image d-inline-block align-top mr-2"
            alt="">
        Web Absensi
    </a>

    <div class="d-flex flex-1 d-block d-md-none">
        <a href="#" class="sidebar-toggle ml-3">
            <i data-feather="menu"></i>
        </a>
    </div>

    <ul class="navbar-nav d-flex justify-content-end mr-2">
        <!-- profile -->
        <li class="nav-item dropdown">
            <a class="nav-link avatar-with-name" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">
                <img src="{{ asset('AdminX/demo/img/logo.png') }}" class="d-inline-block align-top" alt="">
            </a>
        </li>
    </ul>
</nav>
