@extends('frontend.layouts.master')

@section('content')




<!-- ===== Call Back Request Section ===== -->
<section id="callback" class="py-5 position-relative">
  <!-- Decorative background (SVG + gradient) -->
  <div class="callback-bg" aria-hidden="true">
    <!-- A subtle decorative SVG of clouds / birds - keeps the nursery theme -->
    <svg viewBox="0 0 1000 400" preserveAspectRatio="xMidYMid slice" class="w-100 h-100">
      <defs>
        <linearGradient id="cbg" x1="0" x2="1">
          <stop offset="0" stop-color="#fff6f2"/>
          <stop offset="1" stop-color="#fffefc"/>
        </linearGradient>
      </defs>
      <rect width="100%" height="100%" fill="url(#cbg)"/>
      <!-- simple shapes for soft clouds & birds -->
      <g transform="translate(40,20)" fill="none" stroke="#ffd0a6" stroke-width="3" opacity="0.35">
        <path d="M10 30 q20 -22 40 0" />
        <path d="M60 26 q16 -14 32 0" />
      </g>
      <g transform="translate(800,10)" opacity="0.06" fill="#ffb87a">
        <circle cx="0" cy="0" r="120"/>
      </g>
    </svg>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-11">
        <div class="card callback-card shadow-lg overflow-hidden">
          <div class="row g-0">
            <!-- Left: form content -->
            <div class="col-lg-12">
              <div class="p-5 h-100 d-flex flex-column justify-content-center">
                <div class="mb-3">
                  <div class="small-title text-uppercase text-muted mb-1">Get in touch</div>
                  <h3 class="fw-bold">Call Back Request</h3>
                  <p class="text-muted mb-0">Enter your details and a preferred time — one of our team will call you back to discuss enrolment and answer questions.</p>
                </div>

                
                @if(session('success'))
                    <div class="alert alert-success mt-3">{{ session('success') }}</div>
                    
                @endif

                <!-- Form -->
                <form id="callbackForm" action="{{ route('contact.store') }}" method="POST" role="form" class="php-email-form">
                  @csrf
                  <div class="row g-3">
                    <div class="col-12 col-md-6">
                      <label class="form-label visually-hidden" for="first_name">First name</label>
                      <input id="first_name" name="first_name" type="text" class="form-control form-control-lg" placeholder="First name" required>
                       @error('first_name')
                          <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label visually-hidden" for="last_name">Last name</label>
                      <input id="last_name" name="last_name" type="text" class="form-control form-control-lg" placeholder="Last name">
                      @error('last_name')
                          <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label visually-hidden" for="email">Email</label>
                      <input id="email" name="email" type="email" class="form-control form-control-lg" placeholder="Email" required>
                      @error('email')
                          <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label visually-hidden" for="phone">Phone</label>
                      <input id="phone" name="phone" type="text" class="form-control form-control-lg" placeholder="Phone" pattern="[\d\s()+\-]{6,20}" required>
                      @error('phone')
                          <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label visually-hidden" for="prefTime">Preferred time</label>
                      <select id="prefTime" name="prefTime" class="form-select form-select-lg" required>
                        <option value="" disabled selected>Preferred time</option>
                        <option>Morning (9:00 - 11:00)</option>
                        <option>Midday (11:00 - 14:00)</option>
                        <option>Afternoon (14:00 - 16:00)</option>
                        <option>Evening (16:00 - 18:00)</option>
                      </select>
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label visually-hidden" for="nursery">Choose Nursery</label>
                      <select id="nursery" name="nursery" class="form-select form-select-lg" required>
                        <option value="" disabled selected>Choose nursery</option>
                        <option>SunnyNursery — Colchester</option>
                        <option>SunnyNursery — Central</option>
                        <option>SunnyNursery — North</option>
                      </select>
                    </div>

                    <div class="col-12">
                      <label class="form-label visually-hidden" for="message">Message</label>
                      <textarea id="message" name="message" rows="4" class="form-control" placeholder="Message (optional)"></textarea>

                      @error('message')
                          <span class="invalid-feedback">{{ $message }}</span>
                      @enderror

                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input id="consent" name="consent" class="form-check-input" type="checkbox" required>
                        <label class="form-check-label small" for="consent">
                          I consent to my submitted data being collected and stored in accordance with the <a href="#" target="_blank" rel="noopener">Privacy Policy</a>.
                        </label>
                      </div>
                    </div>

                    <!-- CAPTCHA placeholder -->
                    {{-- <div class="col-12" id="captchaContainer">
                      
                      <div class="col-auto d-flex align-items-center gap-2">
                          <span id="captcha-question" class="fw-bold text-dark"></span>
                          <input type="number" id="captcha-answer" class="form-control form-control-sm" style="width: 80px;" placeholder="Answer" required>
                          <div id="captcha-error" class="text-danger d-none">Incorrect</div>
                      </div>
                    </div> --}}

                    <div class="col-12 d-grid">
                      <button id="callbackSubmit" class="btn btn-primary btn-lg" type="submit">
                        <span class="btn-text">Send</span>
                        <span class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                      </button>
                    </div>

                  </div>
                </form>

                <div id="formFeedback" class="mt-3" role="status" aria-live="polite"></div>
              </div>
            </div>



          </div> <!-- /.row -->
        </div> <!-- /.card -->
      </div>
    </div>
  </div>
</section>


<!-- ===== Location & Contact Section ===== -->
<section id="location" class="py-5 position-relative bg-light">
  <div class="location-bg" aria-hidden="true">
    <svg viewBox="0 0 1000 200" preserveAspectRatio="xMidYMid slice" class="w-100 h-100">
      <defs>
        <linearGradient id="locGrad" x1="0" x2="1">
          <stop offset="0" stop-color="#fff7f2"/>
          <stop offset="1" stop-color="#fffefc"/>
        </linearGradient>
      </defs>
      <rect width="100%" height="100%" fill="url(#locGrad)"/>
      <!-- decorative birds -->
      <g transform="translate(40,20)" fill="none" stroke="#ffc188" stroke-width="2.5" opacity="0.3">
        <path d="M10 30 q20 -20 40 0" />
        <path d="M60 25 q16 -15 32 0" />
      </g>
    </svg>
  </div>

  <div class="container position-relative">
    <div class="row align-items-center gy-4">
      <!-- Left side: Info -->
      <div class="col-lg-5">
        <div class="p-4 p-lg-0">
          <div class="small-title text-uppercase text-muted mb-1">Find us</div>
          <h3 class="fw-bold mb-3">Our Location</h3>
          <p class="text-muted mb-4">
            Come visit our nursery or contact us to arrange a tour. We’d love to welcome you and show you our warm, friendly learning spaces.
          </p>

          <ul class="list-unstyled">
            <li class="d-flex align-items-start mb-3">
              <div class="icon-wrap me-3"><i class="bi bi-geo-alt-fill"></i></div>
              <div>
                <strong>Address</strong><br>
                123 Sunshine Lane, Colchester, Essex CO1 2AB
              </div>
            </li>
            <li class="d-flex align-items-start mb-3">
              <div class="icon-wrap me-3"><i class="bi bi-telephone-fill"></i></div>
              <div>
                <strong>Phone</strong><br>
                <a href="tel:+441234567890" class="text-decoration-none text-dark">+44 1234 567 890</a>
              </div>
            </li>
            <li class="d-flex align-items-start mb-3">
              <div class="icon-wrap me-3"><i class="bi bi-envelope-fill"></i></div>
              <div>
                <strong>Email</strong><br>
                <a href="mailto:info@justimagine.co.uk" class="text-decoration-none text-dark">info@justimagine.co.uk</a>
              </div>
            </li>
            <li class="d-flex align-items-start">
              <div class="icon-wrap me-3"><i class="bi bi-clock-fill"></i></div>
              <div>
                <strong>Opening Hours</strong><br>
                Mon–Fri: 7:30 AM – 6:00 PM<br>
                Sat–Sun: Closed
              </div>
            </li>
          </ul>

          <div class="mt-4">
            <a href="#callback" class="btn btn-primary btn-lg rounded-pill px-4">Request a Call Back</a>
          </div>
        </div>
      </div>

      <!-- Right side: Map -->
      <div class="col-lg-7">
        <div class="map-wrapper rounded-4 overflow-hidden shadow-sm">
          <!-- Replace src with your actual Google Map embed URL -->
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9784.759325215105!2d0.8902473330560022!3d51.88920962062537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a0a72c60b65d%3A0x33c865be3cfdf58a!2sColchester%2C%20UK!5e0!3m2!1sen!2suk!4v1696865339151!5m2!1sen!2suk"
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script')

<script>
    $(document).ready(function() {
        let num1 = Math.floor(Math.random() * 10) + 1;
        let num2 = Math.floor(Math.random() * 10) + 1;
        let correctAnswer = num1 + num2;
        $('#captcha-question').text(`What is ${num1} + ${num2}? *`);

        $('.php-email-form').on('submit', function(e) {
            let userAnswer = parseInt($('#captcha-answer').val());
            if(userAnswer !== correctAnswer) {
                e.preventDefault();
                $('#captcha-error').removeClass('d-none').text('Incorrect answer');
            } else {
                $('#captcha-error').addClass('d-none');
                $('#sending-text').removeClass('d-none');
            }
        });
    });
</script>
@endsection