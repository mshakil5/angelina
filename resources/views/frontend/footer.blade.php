  <footer id="footer" class="footer light-background">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget">
            <h3 class="widget-heading">{{ $company->company_name ?? '' }}</h3>
            <p class="mb-4">
              {{ $company->footer_content ?? '' }}
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="widget">
            <h3 class="widget-heading">Navigation</h3>
            <div class="d-flex flex-wrap">
              <ul class="list-unstyled me-5 mb-3">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('home') }}#about-1">About Us</a></li>
                <li><a href="{{ route('home') }}#tabs">Features</a></li>
                <li><a href="{{ route('home') }}#services-2">Services</a></li>
              </ul>
              <ul class="list-unstyled me-5 mb-3">
                <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('terms-and-conditions') }}">Terms & Conditions</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
              </ul>
              <ul class="list-unstyled mb-3">
                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                <li><a href="{{ route('content.type', ['type' => 'blog']) }}">Blogs</a></li>
                <li><a href="{{ route('content.type', ['type' => 'event']) }}">Events</a></li>
                <li><a href="{{ route('content.type', ['type' => 'news']) }}">News</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget">
            <h3 class="widget-heading">Contact</h3>
            <ul class="list-unstyled float-start me-5">
              @if ($company->email1)
              <li><a href="mailto:{{ $company->email1 }}">{{ $company->email1 }}</a></li>
              @endif
              @if ($company->phone1)
              <li><a href="tel:{{ $company->phone1 }}">{{ $company->phone1 }}</a></li>
              @endif
              @if ($company->address1)
              <li>{{ $company->address1 }}</li>
              @endif
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-lg-2">
          <div class="widget">
            <h3 class="widget-heading">Connect</h3>
            <ul class="list-unstyled social-icons light mb-3">
              @if ($company->facebook)
              <li>
                <a href="{{ $company->facebook }}"><span class="bi bi-facebook"></span></a>
              </li>
              @endif
              @if ($company->twitter)
              <li>
                <a href="{{ $company->twitter }}"><span class="bi bi-twitter-x"></span></a>
              </li>
              @endif
              @if ($company->linkedin)
              <li>
                <a href="{{ $company->linkedin }}"><span class="bi bi-linkedin"></span></a>
              </li>
              @endif
            </ul>
          </div>

          <div class="widget">
            <div class="footer-subscribe">
              <form action="{{ route('subscribe.newsletter') }}" method="POST" class="php-email-form" onsubmit="this.querySelector('.loading').style.display='block';">
                @csrf
                <div class="mb-2">
                  <input type="text" class="form-control" name="email" placeholder="Enter your email" required>
                  <button type="submit" class="btn btn-link">
                    <span class="bi bi-arrow-right"></span>
                  </button>
                </div>

                <div class="loading" style="display:none;">Loading</div>

                @if(session('success'))
                  <div class="sent-message">
                    {{ session('success') }}
                  </div>
                @endif

                @error('email')
                  <div class="error-message">
                    {{ $message }}
                  </div>
                @enderror
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="copyright d-flex flex-column flex-md-row align-items-center justify-content-md-between">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $company->company_name ?? '' }}</strong></p>
        <div class="credits">
          Developed by <a href="{{ $company->website ?? '' }}">{{ $company->company_name ?? '' }}</a>
        </div>
      </div>
    </div>
  </footer>