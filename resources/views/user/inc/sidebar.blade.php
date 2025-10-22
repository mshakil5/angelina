      <!-- Sidebar (Desktop) -->
      <aside class="col-lg-3 d-none d-lg-block">
        <div class="dash-aside">
          <div class="brand">
            <div class="logo">
        
                @if (Auth::user()->feature_image)
                <img src="{{asset('images/profile/'.Auth::user()->feature_image)}}" alt="avatar"  height="50" width="50" style="border-radius: 12px;">
                @else
                <img src="{{asset('resources/frontend/images/logo.png')}}" alt="avatar" height="50" width="50" style="border-radius: 12px;">
                @endif
            </div>
            <div>
              <h5>{{Auth::user()->name}}</h5>
            </div>
          </div>

          <nav class="nav flex-column nav-vertical mb-3" id="sideNav">
            <a class="nav-link active" href="#" data-target="dashboard">
              <svg width="18" height="18" fill="none" viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zM3 21h8v-6H3v6zM13 21h8V11h-8v10zM13 3v6h8V3h-8z" fill="currentColor" /></svg>
              Dashboard
            </a>

            <a class="nav-link d-none" href="#" data-target="notice">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 22c1.1 0 2-.9 2-2H10c0 1.1.9 2 2 2zM18 16v-5c0-3.07-1.63-5.64-4.5-6.32V4a1.5 1.5 0 1 0-3 0v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" fill="currentColor"/></svg>
              Notices
            </a>
            
            <a class="nav-link" href="#" data-target="commencement">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 22c1.1 0 2-.9 2-2H10c0 1.1.9 2 2 2zM18 16v-5c0-3.07-1.63-5.64-4.5-6.32V4a1.5 1.5 0 1 0-3 0v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" fill="currentColor"/></svg>
              Commencement 
            </a>

            <a class="nav-link" href="#" data-target="profile">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zM12 14c-4 0-7 3-7 7h14c0-4-3-7-7-7z" fill="currentColor"/></svg>
              Profile
            </a>

            <a class="nav-link" href="#" data-target="password">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM18 8h-1V6a5 5 0 0 0-10 0v2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2z" fill="currentColor"/></svg>
              Change Password
            </a>

            <a class="nav-link text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M16 13v-2H7V8l-5 4 5 4v-3h9zM20 3h-8v2h8v14h-8v2h8a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z" fill="currentColor"/></svg>
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </nav>

        </div>
      </aside>

      <!-- Sidebar (Mobile) -->
      <div class="col-12 d-lg-none">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <div class="d-flex align-items-center gap-2">
            <div class="logo" style="width:40px;height:40px;">
              
                @if (Auth::user()->feature_image)
                <img src="{{asset('images/profile/'.Auth::user()->feature_image)}}" alt="avatar"  height="40" width="40" style="border-radius: 12px;">
                @else
                <img src="{{asset('resources/frontend/images/logo.png')}}" alt="avatar" height="40" width="40" style="border-radius: 12px;">
                @endif
            </div>
            <div>
              <strong>{{Auth::user()->name}}</strong>
            </div>
          </div>

          <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
            ☰
          </button>

          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasMenuLabel">Menu</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <nav class="nav flex-column nav-vertical" id="offNav">
                <a class="nav-link active" href="#" data-target="dashboard">Dashboard</a>
                <a class="nav-link d-none" href="#" data-target="notice">Notices</a>
                <a class="nav-link" href="#" data-target="commencement">Commencement</a>
                <a class="nav-link" href="#" data-target="profile">Profile</a>
                <a class="nav-link" href="#" data-target="password">Change Password</a>
                <a class="nav-link text-danger" href="#" id="logoutBtnMobile">Logout</a>
              </nav>
            </div>
          </div>
        </div>
      </div>