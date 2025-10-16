<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        <h1 class="sitename">{{ $company->company_name ?? '' }}</h1>
        </a>
        <nav id="navmenu" class="navmenu">
        <ul>
            <li>
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            </li>
            <li>
                <a href="{{ route('home') }}#about-1" class="">About Us</a>
            </li>
            <li>
                <a href="{{ route('home') }}#tabs" class="">Features</a>
            </li>
            <li>
                <a href="{{ route('home') }}#services-2" class="">Services</a>
            </li>
            <li>
                <a href="{{ route('team') }}" class="{{ request()->routeIs('team') ? 'active' : '' }}">Team</a>
            </li>
            <li>
                <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Gallery</a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
            </li>
            @if (Auth::check())
            <li class="dropdown">
                <a href="#"><span>{{Auth::user()->name ?? ''}}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
            @else
            <li class="dropdown d-none">
                <a href="#"><span>Login/Register</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            </li>
            @endif
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>