
<!-- ===== Footer ===== -->
<footer id="siteFooter" class="site-footer">
  <!-- Decorative grass SVG strip at top of footer -->
  <div class="footer-grass" aria-hidden="true">
    <!-- Inline SVG: lightweight decorative grass -->
    <svg viewBox="0 0 1200 90" preserveAspectRatio="none" class="w-100 h-100">
      <defs>
        <linearGradient id="gGrass" x1="0" x2="1">
          <stop offset="0" stop-color="#e9f7ea"/>
          <stop offset="1" stop-color="#f7fff6"/>
        </linearGradient>
      </defs>
      <rect width="100%" height="100%" fill="url(#gGrass)"></rect>
      <!-- simple grass path (stylised) -->
      <path d="M0 80 Q40 30 80 80 T160 80 T240 80 T320 80 T400 80 T480 80 T560 80 T640 80 T720 80 T800 80 T880 80 T960 80 T1040 80 T1120 80 T1200 80 V120 H0 Z"
            fill="#dff6dc" opacity="0.95"></path>
      <!-- little blades -->
      <g fill="#c7ecc6" opacity="0.9">
        <ellipse cx="70" cy="68" rx="3" ry="8"/>
        <ellipse cx="150" cy="66" rx="2.7" ry="9"/>
        <ellipse cx="230" cy="70" rx="3.4" ry="7.5"/>
        <ellipse cx="370" cy="64" rx="3" ry="9"/>
        <ellipse cx="490" cy="66" rx="3.2" ry="8"/>
        <ellipse cx="830" cy="70" rx="2.8" ry="9"/>
        <ellipse cx="980" cy="68" rx="3.6" ry="7"/>
      </g>
    </svg>
  </div>

  <div class="footer-body container-lg pt-4 pb-5">
    <div class="row gy-4">

      <!-- 1: About us -->
      <div class="col-12 col-md-6 col-lg-3">
        <h6 class="footer-heading">Links</h6>
        <div class="footer-links d-flex flex-column gap-2">
          <a class="btn btn-sm btn-outline-secondary rounded-pill text-start" href="{{ route('aboutUs')}}#story-hero">Our story</a>
          <a class="btn btn-sm btn-outline-secondary rounded-pill text-start" href="{{ route('aboutUs')}}#values-ethos">Our values</a>
          <a class="btn btn-sm btn-outline-secondary rounded-pill text-start" href="{{ route('aboutUs')}}#parent-resources">Parent Resources</a>
          <a class="btn btn-sm btn-outline-secondary rounded-pill text-start" href="{{ route('aboutUs')}}#meals-and-menus">Meals and Menus</a>
        </div>
      </div>

      <!-- 2: Parent hub -->
      <div class="col-12 col-md-6 col-lg-3">
        <h6 class="footer-heading">Links</h6>
        <div class="footer-links d-flex flex-column gap-2">
          <a class="btn btn-sm btn-outline-secondary rounded-pill text-start" href="{{ route('aboutUs')}}#family-app">Family App</a>
          <a class="btn btn-sm btn-outline-secondary rounded-pill text-start" href="{{ route('aboutUs')}}#funding-and-fees">Funding and Fees</a>
          <a class="btn btn-sm btn-outline-secondary rounded-pill text-start" href="{{ route('aboutUs')}}#vacancies">Current Vacancies</a>
          <a class="btn btn-sm btn-outline-secondary rounded-pill text-start" href="{{ route('aboutUs')}}#our-curriculum">Our Curriculum</a>
        </div>
      </div>

      <!-- 3: Careers -->
      <div class="col-12 col-md-6 col-lg-3">
        <h6 class="footer-heading">Links</h6>
        <div class="footer-links d-flex flex-column gap-2">
          <a class="btn btn-sm btn-outline-secondary rounded-pill text-start" href="{{ route('aboutUs')}}#safeguarding-policy">Our safeguarding policy</a>
          <a class="btn btn-sm btn-outline-secondary rounded-pill text-start" href="{{ route('privacy-policy') }}">Privacy policy</a>
          <a href="{{ route('terms-and-conditions')}}" class="btn btn-sm btn-outline-secondary rounded-pill text-start">Terms & Conditions</a>
        </div>
      </div>

      <!-- 5: Contact + Social + Legal -->
      <div class="col-12 col-md-12 col-lg-3">
        <div class="d-flex flex-column h-100 justify-content-between">
          <!-- Top: Contact CTA -->
          <div class="d-flex align-items-center gap-3 mb-3">
            <button class="contact-circle btn btn-primary rounded-circle d-flex align-items-center justify-content-center shadow" aria-label="Contact Us">
              <i class="bi bi-telephone-fill fs-4"></i>
            </button>
            <div>
              <div class="fw-bold">Contact Us</div>
              <div class="small text-muted">Call or email to arrange a visit</div>
              <div class="mt-2">
                <a href="tel:{{$company->phone1}}" class="d-block text-decoration-none fw-semibold">{{$company->phone1}}</a>
                <a href="mailto:{{$company->email1}}" class="d-block text-decoration-none small text-muted">{{$company->email1}}</a>
              </div>
            </div>
          </div>

          <!-- Social icons -->
          <div class="mb-3">
            <div class="socials d-flex gap-2 align-items-center">
              <a class="social-btn btn btn-outline-secondary rounded-circle" href="https://www.facebook.com/angelinasdaycare.official" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
              <a class="social-btn btn btn-outline-secondary rounded-circle" href="https://www.instagram.com/angelinasdaycareltd" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
              <a class="social-btn btn btn-outline-secondary rounded-circle" href="https://www.linkedin.com/in/angelina-s-day-care-b1aa4a315/?originalSubdomain=uk" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <!-- Legal / site links -->
          <div class="d-flex flex-column gap-1 small text-muted">
            <a class="text-muted text-decoration-none" href="{{ route('privacy-policy') }}">Privacy policy</a>
            <a href="{{ route('terms-and-conditions')}}" class="text-muted text-decoration-none">Terms & Conditions</a>
          </div>
        </div>
      </div>

    </div><!-- .row -->

    <hr class="my-4">

    <div class="row align-items-center">
      <div class="col-md-12 text-center text-md-start small text-muted">
        {!! $company->copyright !!}
      </div>
      {{-- <div class="col-md-6 text-center text-md-end small text-muted">
        Built with care • 
      </div> --}}
    </div>
  </div>
</footer>
