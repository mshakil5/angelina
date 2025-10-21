@extends('frontend.layouts.master')

@section('content')

<style>
  
    /* Layout */
    .dash-shell {
      min-height: 100vh;
      padding: 28px 20px;
    }

    /* Sidebar */
    .dash-aside {
      background: linear-gradient(180deg, #fff, #fff);
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 6px 18px rgba(18, 38, 63, 0.06);
      height: 100%;
      position: sticky;
      top: 24px;
    }

    .brand {
      display:flex;
      gap:12px;
      align-items:center;
      margin-bottom:18px;
    }
    .brand .logo {
      width:48px;
      height:48px;
      border-radius:10px;
      background: linear-gradient(135deg,var(--accent), #ff7ab6);
      display:inline-flex;
      align-items:center;
      justify-content:center;
      color:#fff;
      font-weight:700;
      font-size:18px;
      box-shadow:0 6px 16px rgba(233,30,99,0.12);
    }
    .brand h5 { margin:0; font-weight:700; font-size:16px; }
    .brand p { margin:0; font-size:12px; color:var(--muted); }

    .nav-vertical .nav-link {
      border-radius:8px;
      color:#444;
      padding:10px 12px;
      margin-bottom:8px;
      display:flex;
      align-items:center;
      gap:10px;
      transition:all .18s;
    }
    .nav-vertical .nav-link:hover {
      transform: translateY(-2px);
      background: rgba(233,30,99,0.06);
      color:var(--accent);
    }
    .nav-vertical .nav-link.active {
      background: linear-gradient(90deg, rgba(233,30,99,0.08), rgba(255,122,182,0.03));
      color: var(--accent);
      box-shadow: inset 0 0 0 1px rgba(233,30,99,0.06);
    }

    /* Right content */
    .dash-content .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(18,38,63,0.06);
    }

    .stat-card {
      padding:18px;
      border-radius:12px;
      background:var(--card-bg);
    }
    .stat-card .value { font-weight:700; font-size:20px; }
    .stat-card .label { color:var(--muted); font-size:13px; }

    /* Profile avatar preview */
    .avatar-preview {
      width:84px;
      height:84px;
      border-radius:12px;
      background:#f1f3f5;
      display:inline-flex;
      align-items:center;
      justify-content:center;
      overflow:hidden;
      border:1px solid rgba(0,0,0,0.04);
    }
    .avatar-preview img { width:100%; height:100%; object-fit:cover; }

    /* Footer small */
    .small-muted { color:var(--muted); font-size:13px; }

    /* responsive tweaks */
    @media (max-width: 991.98px) {
      .dash-aside { position:relative; top:auto; margin-bottom:18px; }
    }
</style>

@php
    $banner = \App\Models\Banner::where('page', 'User Dashboard')->first();
    $bgImage = $banner && $banner->feature_image
        ? asset('images/banner/' . $banner->feature_image)
        : asset('resources/frontend/images/page-banner2.jpg');
@endphp


<section class="breadcrumb-section text-center text-white d-flex align-items-center justify-content-center"
    style="background-image: url('{{ $bgImage }}');">
  <div class="container d-none">
    <h1 class="breadcrumb-title mb-3"></h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white text-decoration-none"></a></li>
        <li class="breadcrumb-item active text-white" aria-current="page"></li>
      </ol>
    </nav>
  </div>
</section>



  <div class="container dash-shell">
    <div class="row g-4">
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

            <a class="nav-link" href="#" data-target="notice">
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
                <a class="nav-link" href="#" data-target="notice">Notices</a>
                <a class="nav-link" href="#" data-target="commencement">Commencement</a>
                <a class="nav-link" href="#" data-target="profile">Profile</a>
                <a class="nav-link" href="#" data-target="password">Change Password</a>
                <a class="nav-link text-danger" href="#" id="logoutBtnMobile">Logout</a>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <!-- Right content -->
      <main class="col-lg-9 col-12">
        <div class="dash-content">

          <!-- Dashboard view -->
          <section id="dashboard" class="content-pane">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="mb-0">Dashboard</h3>
              <small class="small-muted">Welcome back — here's what's happening</small>
            </div>

            <div class="row g-3 mb-3">
              <div class="col-sm-6 col-md-4">
                <div class="stat-card">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="value">12</div>
                      <div class="label">Active Campaigns</div>
                    </div>
                    <div class="text-end">
                      <small class="small-muted">Updated today</small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-4">
                <div class="stat-card">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="value">5</div>
                      <div class="label">New Notices</div>
                    </div>
                    <div class="text-end">
                      <small class="small-muted">2 unread</small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-4">
                <div class="stat-card">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <div class="value">£1,240</div>
                      <div class="label">Pending Balance</div>
                    </div>
                    <div class="text-end">
                      <small class="small-muted">Last 7 days</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">Recent activity</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">You updated your profile — Oct 15, 2025</li>
                  <li class="list-group-item">New notice published: "Holiday Schedule" — Oct 12, 2025</li>
                  <li class="list-group-item">Payment received — Oct 10, 2025</li>
                </ul>
              </div>
            </div>
          </section>

          <!-- Notice view -->
          <section id="notice" class="content-pane d-none">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="mb-0">Notices</h3>
              <small class="small-muted">All site notices & announcements</small>
            </div>

            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">Holiday Schedule</h5>
                <p class="mb-1 small-muted">Published Oct 12, 2025</p>
                <p>We will be closed on December 25 — normal operations resume December 26.</p>
                <a href="#" class="btn btn-sm btn-outline-primary">Read more</a>
              </div>
            </div>

            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">Maintenance Notice</h5>
                <p class="mb-1 small-muted">Published Oct 5, 2025</p>
                <p>Scheduled maintenance on Oct 22, 2025 from 01:00 to 03:00 UTC.</p>
                <a href="#" class="btn btn-sm btn-outline-primary">Read more</a>
              </div>
            </div>
          </section>

                    <!-- Notice view -->
          <section id="commencement" class="content-pane d-none">

                @include('user.inc.commencement')



          </section>

          <!-- Profile view -->
          <section id="profile" class="content-pane d-none">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="mb-0">Profile</h3>
              <small class="small-muted">Update your personal details</small>
            </div>

            <div class="card mb-3">
              <div class="card-body">
                <form id="profileForm" class="row g-3 needs-validation" >
                  @csrf
                  <div class="col-12 d-flex align-items-center gap-3">
                    <div class="avatar-preview" id="avatarPreview">
                      @if (Auth::user()->feature_image)
                      <img src="{{asset('images/profile/'.Auth::user()->feature_image)}}" alt="avatar" id="avatarImg">
                      @else
                      <img src="{{asset('resources/frontend/images/logo.png')}}" alt="avatar" id="avatarImg">
                          
                      @endif
                    </div>
                    <div>
                      <label class="form-label mb-1">Profile photo</label><br>
                      <input class="form-control form-control-sm" type="file" id="avatarInput" accept="image/*">
                      <div class="small-muted mt-1">PNG or JPG — max 2MB</div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Full name</label>
                    <input type="text" class="form-control" id="fullName" required value="{{Auth::user()->name}}">
                    <div class="invalid-feedback">Please enter your name.</div>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required value="{{Auth::user()->email}}">
                    <div class="invalid-feedback">Enter a valid email.</div>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" pattern="^\+?[0-9\s\-]{7,20}$" value="{{Auth::user()->phone}}">
                    <div class="invalid-feedback">Enter a valid phone number.</div>
                  </div>

                  <div class="col-12 d-none">
                    <label class="form-label">About</label>
                    <textarea class="form-control" id="about" rows="3"></textarea>
                  </div>

                  <div class="col-12 d-flex gap-2 justify-content-end">
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </section>

          <!-- Change password -->
          <section id="password" class="content-pane d-none">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="mb-0">Change Password</h3>
              <small class="small-muted">Create a strong password</small>
            </div>

            <div class="card">
              <div class="card-body">
                <form id="passwordForm" class="row g-3 needs-validation" novalidate>
                  <div class="col-12">
                    <label class="form-label">Current password</label>
                    <input type="password" class="form-control" id="currentPassword" required>
                    <div class="invalid-feedback">Current password is required.</div>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">New password</label>
                    <input type="password" class="form-control" id="newPassword" minlength="6" required>
                    <div class="invalid-feedback">Password must be at least 6 characters.</div>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Confirm password</label>
                    <input type="password" class="form-control" id="confirmPassword" minlength="6" required>
                    <div class="invalid-feedback">Passwords must match.</div>
                  </div>

                  <div class="col-12 d-flex justify-content-end gap-2">
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Change password</button>
                  </div>
                </form>
              </div>
            </div>
          </section>

        </div>
      </main>
    </div>
  </div>

@endsection

@section('script')


<script src="{{ asset('resources/admin/js/jquery.min.js')}}"></script>

  <script>
    // Simple client-side navigation between panes
    (function(){
      const sideLinks = document.querySelectorAll('[data-target]');
      const panes = document.querySelectorAll('.content-pane');

      function showPane(name){
        panes.forEach(p => {
          if (p.id === name) p.classList.remove('d-none');
          else p.classList.add('d-none');
        });

        // active class for side navs (desktop and offcanvas)
        document.querySelectorAll('.nav-vertical .nav-link').forEach(a => {
          a.classList.toggle('active', a.getAttribute('data-target') === name);
        });
      }

      sideLinks.forEach(a => {
        a.addEventListener('click', function(e){
          e.preventDefault();
          const target = this.dataset.target;
          if (target) showPane(target);

          // if offcanvas is open, close it (mobile)
          const off = document.querySelector('.offcanvas.show');
          if (off) {
            bootstrap.Offcanvas.getInstance(off).hide();
          }
        });
      });

      // initial show
      showPane('dashboard');


      // Profile avatar preview
      const avatarInput = document.getElementById('avatarInput');
      const avatarImg = document.getElementById('avatarImg');
      avatarInput.addEventListener('change', function(){
        const file = this.files[0];
        if (!file) return;
        if (!file.type.startsWith('image/')) { alert('Please select an image.'); return; }
        if (file.size > 2 * 1024 * 1024) { alert('Image too large. Max 2MB.'); return; }
        const reader = new FileReader();
        reader.onload = e => avatarImg.src = e.target.result;
        reader.readAsDataURL(file);
      });

      



    })();
  </script>


<script>
  $(document).ready(function() {
    
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

    // Form validation and submission
    $('#profileForm').on('submit', function(e) {
        e.preventDefault();
        
        // Get form and clear previous validation states
        const form = $(this);
        form[0].checkValidity();
        form.addClass('was-validated');

        // Validate file size (max 2MB)
        const avatarInput = $('#avatarInput')[0];
        if (avatarInput.files.length > 0) {
            const fileSize = avatarInput.files[0].size / 1024 / 1024; // Convert to MB
            if (fileSize > 2) {
                showMessage('error', 'Profile photo must be less than 2MB');
                return;
            }
        }

        // Create FormData object for file upload
        const formData = new FormData();
        formData.append('image', avatarInput.files[0] || null);
        formData.append('name', $('#fullName').val());
        formData.append('email', $('#email').val());
        formData.append('phone', $('#phone').val());
        formData.append('about', $('#about').val());

        // AJAX request
        $.ajax({
            url: '{{ route("user.updateProfile") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                showMessage('success', 'Profile updated successfully!');
                
                // Update avatar preview if new image was uploaded
                if (response.avatarUrl) {
                    $('#avatarImg').attr('src', response.avatarUrl);
                }
            },
            error: function(xhr) {
                let errorMessage = 'Failed to update profile';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                showMessage('error', errorMessage);
            }
        });
    });


        // Form validation and submission
    $('#passwordForm').on('submit', function(e) {
        e.preventDefault();
        
        // Get form and clear previous validation states
        const form = $(this);
        form[0].checkValidity();
        form.addClass('was-validated');

        const np = document.getElementById('newPassword');
        const cp = document.getElementById('confirmPassword');
        if (np.value !== cp.value) {
          cp.setCustomValidity('Passwords do not match');
        } else {
          cp.setCustomValidity('');
        }
        if (!passwordForm.checkValidity()) {
          passwordForm.classList.add('was-validated');
          return;
        }

        // Create FormData object for file upload
        const formData = new FormData();
        formData.append('currentPassword', $('#currentPassword').val());
        formData.append('newPassword', $('#newPassword').val());
        formData.append('confirmPassword', $('#confirmPassword').val());

        // AJAX request
        $.ajax({
            url: '{{ route("user.updatePassword") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
              console.log(response);
                showMessage('success', 'Password updated successfully!');

            },
            error: function(xhr) {
                console.log(xhr.responseJSON.message);
                let errorMessage = 'Failed to update Password';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                showMessage('error', errorMessage);
            }
        });
    });



    // Reset form
    $('#profileForm').on('reset', function() {
        const form = $(this);
        form.removeClass('was-validated');
        $('#avatarInput').val('');
        $('#avatarImg').attr('src', 'https://via.placeholder.com/150');
        clearMessages();
    });

    // Preview avatar image
    $('#avatarInput').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#avatarImg').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    // Function to show messages
    function showMessage(type, message) {
        clearMessages();
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const alert = $(
            `<div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`
        );
        $('#profileForm, #passwordForm').prepend(alert);
        setTimeout(() => alert.alert('close'), 5000);
    }

    // Function to clear messages
    function clearMessages() {
        $('.alert').alert('close');
    }
});
</script>



@endsection