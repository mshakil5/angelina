  <!-- =======================
       Header / Navbar
       ======================= -->
<!-- Header Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
      <img src="{{ asset('images/company/' . $company->company_logo) }}" alt="SunnyNursery Colchester Logo" height="60">
    </a>

    <!-- Mobile Menu Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-lg-center text-center text-lg-start">

        <li class="nav-item mx-2">
          <a class="nav-link d-flex flex-column align-items-center" href="{{ route('home') }}">
            <i class="fas fa-home" style="color: #ffa500; font-size: 28px;"></i>
            <span>Home</span>
          </a>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link d-flex flex-column align-items-center" href="{{ route('foodChoice') }}">
            <i class="fas fa-book" style="color: #e74c3c; font-size: 28px;"></i>
            <span>Food & Choice</span>
          </a>
        </li>

        <li class="nav-item dropdown mx-2">
          <a class="nav-link dropdown-toggle d-flex flex-column align-items-center" href="#" id="ageDropdown" data-bs-toggle="dropdown">
            <i class="fas fa-baby" style="color: #9b59b6; font-size: 28px;"></i>
            <span>Age Groups</span>
          </a>
          <ul class="dropdown-menu text-center">
            <li><a class="dropdown-item" href="#tabs-toddlers">Toddlers</a></li>
            <li><a class="dropdown-item" href="#tabs-two">Two to Three’s</a></li>
            <li><a class="dropdown-item" href="#tabs-preschool">Pre School</a></li>
          </ul>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link d-flex flex-column align-items-center" href="{{ route('fees') }}">
            <i class="fas fa-coins" style="color: #f39c12; font-size: 28px;"></i>
            <span>Fees & Terms</span>
          </a>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link d-flex flex-column align-items-center" href="{{ route('home') }}#about">
            <i class="fas fa-info-circle" style="color: #3498db; font-size: 28px;"></i>
            <span>About</span>
          </a>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link d-flex flex-column align-items-center " href="{{ route('home') }}#contact">
            <i class="fas fa-phone-alt" style="color: #2ecc71; font-size: 28px;"></i>
            <span>Contact</span>
          </a>
        </li>

        <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
          <a class="btn btn-primary rounded-pill px-4" href="{{ route('home') }}#visit">
            <i class="fas fa-briefcase me-2"></i> Job
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>
