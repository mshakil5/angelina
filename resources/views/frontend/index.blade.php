@extends('frontend.layouts.master')

@section('content')

  <!-- =======================
       Slider / Hero Area
       ======================= -->
  <header class="hero_area position-relative">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>

      <div class="carousel-inner">

        @foreach ($sliders as $key => $slider)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{'images/slider/'.$slider->image}}" class="d-block w-100" alt="Play area">
                <div class="carousel-caption text-start text-white">
                    @if ($slider->title)<h1 class="display-5 fw-bold">{{ $slider->title ?? '' }}</h1>@endif
                    @if($slider->description)<p class="lead">{{ $slider->description ?? '' }}</p>@endif
                    @if($slider->link)<p><a class="btn btn-primary btn-lg" href="{{ $slider->link ?? '' }}">Learn more</a></p>@endif
                </div>
            </div>
        @endforeach
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- ===== Waves ===== -->
    {{-- <svg class="waves" xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink"
      viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
      <defs>
        <path id="gentle-wave"
          d="M-160 44c30 0 58-18 88-18s58 18 88 18
           58-18 88-18 58 18 88 18v44h-352z" />
      </defs>
      <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
      </g>
    </svg> --}}
  </header>

  <!-- =======================
       About section (two-column)
       ======================= -->
  <section id="about" class="about-section py-5 position-relative">
    <!-- Top left SVG animal/bird icon -->
    <div class="position-absolute" style="top:50px;left:50px;z-index:1;">
      <!-- Bird SVG -->
      <svg width="144" height="144" viewBox="0 0 144 144" fill="none" aria-hidden="true">
        <ellipse cx="36" cy="36" rx="32" ry="32" fill="#ffe6b3" opacity="0.7"/>
        <path d="M40 38 q8 -8 16 0" stroke="#f7c873" stroke-width="3" fill="none" stroke-linecap="round"/>
        <circle cx="36" cy="36" r="12" fill="#fff"/>
        <ellipse cx="32" cy="34" rx="2.5" ry="3.5" fill="#f7c873"/>
        <ellipse cx="40" cy="34" rx="2.5" ry="3.5" fill="#f7c873"/>
        <circle cx="36" cy="38" r="2.2" fill="#fff"/>
        <circle cx="34.5" cy="36.5" r="0.8" fill="#333"/>
        <circle cx="37.5" cy="36.5" r="0.8" fill="#333"/>
      </svg>
    </div>
    <!-- Top right SVG animal/bird icon -->
    <div class="position-absolute" style="top:50px;right:50px;z-index:1;">
      <!-- Rabbit SVG -->
      <svg width="72" height="72" viewBox="0 0 72 72" fill="none" aria-hidden="true">
        <ellipse cx="36" cy="36" rx="32" ry="32" fill="#e5e5e5" opacity="0.7"/>
        <ellipse cx="28" cy="32" rx="7" ry="14" fill="#e5e5e5"/>
        <ellipse cx="44" cy="32" rx="7" ry="14" fill="#e5e5e5"/>
        <ellipse cx="24" cy="18" rx="4" ry="10" fill="#e5e5e5"/>
        <ellipse cx="48" cy="18" rx="4" ry="10" fill="#e5e5e5"/>
        <circle cx="36" cy="44" r="6" fill="#fff"/>
        <circle cx="34" cy="40" r="2" fill="#333"/>
        <circle cx="38" cy="40" r="2" fill="#333"/>
        <ellipse cx="36" cy="48" rx="2.5" ry="1.5" fill="#333"/>
      </svg>
    </div>
    <div class="container">
      <div class="row g-4 align-items-start">

        <!-- LEFT: Images area (no header title as requested) -->
          <div class="col-lg-6">

            <div class="align-items-center text-center mb-5">
              
              <h2 class="big-title">Best nursery in Colchester</h2>
              <br><br>
              {{-- <hr> --}}
            </div>


            <div class="about-images" aria-hidden="true">
              <div class="about-left">
                <!-- large left image -->
                <div class="single">
                  <img src="{{asset('images/service/' .$toddlers->image )}}" alt="{{$toddlers->title}}">
                </div>

                <!-- stacked two images on the right -->
                <div class="stack">
                  <img src="{{asset('images/service/' .$twothrees->image )}}" alt="{{$twothrees->title}}">
                  <img src="{{asset('images/service/' .$preschool->image )}}" alt="{{$preschool->title}}">
                </div>
              </div>
            </div>
          </div>

        <!-- RIGHT: Text + small title + big title + centered tabs -->
        <div class="col-lg-6">
          <div class="px-md-3">
            {{-- <div class="small-title">Our Age Groups</div> --}}
            <h2 class="big-title">Angelina's Day Care</h2>

            <!-- Centered tabs -->
            <ul class="nav nav-tabs mt-4 pb-3" id="ageTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="toddlers-tab" data-bs-toggle="tab" data-bs-target="#toddlers" type="button" role="tab" aria-controls="toddlers" aria-selected="true" style="background-color: #4af396;">
                  <!-- Bear SVG icon -->
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" class="me-1" aria-hidden="true" style="vertical-align:middle;">
                    <circle cx="12" cy="12" r="8" fill="#c9a06c"/>
                    <ellipse cx="7.5" cy="7.5" rx="3" ry="3" fill="#c9a06c"/>
                    <ellipse cx="16.5" cy="7.5" rx="3" ry="3" fill="#c9a06c"/>
                    <circle cx="12" cy="14" r="2.2" fill="#fff"/>
                    <circle cx="10.5" cy="12" r="1" fill="#333"/>
                    <circle cx="13.5" cy="12" r="1" fill="#333"/>
                    <ellipse cx="12" cy="16.2" rx="1.1" ry="0.7" fill="#333"/>
                  </svg>
                  Toddlers
                </button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link" id="two-tab" data-bs-toggle="tab" data-bs-target="#two" type="button" role="tab" aria-controls="two" aria-selected="false"  style="background-color: #f0f8ff;">
                  <!-- Rabbit SVG icon -->
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" class="me-1" aria-hidden="true" style="vertical-align:middle;">
                    <ellipse cx="8" cy="14" rx="5" ry="6" fill="#e5e5e5"/>
                    <ellipse cx="16" cy="14" rx="5" ry="6" fill="#e5e5e5"/>
                    <ellipse cx="6" cy="7" rx="2" ry="5" fill="#e5e5e5"/>
                    <ellipse cx="18" cy="7" rx="2" ry="5" fill="#e5e5e5"/>
                    <circle cx="12" cy="16" r="2.2" fill="#fff"/>
                    <circle cx="10.5" cy="14" r="0.8" fill="#333"/>
                    <circle cx="13.5" cy="14" r="0.8" fill="#333"/>
                    <ellipse cx="12" cy="17.2" rx="0.7" ry="0.4" fill="#333"/>
                  </svg>
                  Two to Three’s
                </button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link" id="preschool-tab" data-bs-toggle="tab" data-bs-target="#preschool" type="button" role="tab" aria-controls="preschool" aria-selected="false"  style="background-color: #ffc1ab;">
                  <!-- Lion SVG icon -->
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" class="me-1" aria-hidden="true" style="vertical-align:middle;">
                    <circle cx="12" cy="12" r="7" fill="#f7c873"/>
                    <ellipse cx="6" cy="12" rx="2.5" ry="3.5" fill="#f7c873"/>
                    <ellipse cx="18" cy="12" rx="2.5" ry="3.5" fill="#f7c873"/>
                    <ellipse cx="12" cy="17" rx="3" ry="2" fill="#f7c873"/>
                    <circle cx="12" cy="14" r="2.2" fill="#fff"/>
                    <circle cx="10.5" cy="12.5" r="0.8" fill="#333"/>
                    <circle cx="13.5" cy="12.5" r="0.8" fill="#333"/>
                    <ellipse cx="12" cy="15.2" rx="0.7" ry="0.4" fill="#333"/>
                  </svg>
                  Pre school
                </button>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content mt-3" id="ageTabsContent">
              <div class="tab-pane fade show active" id="toddlers" role="tabpanel" aria-labelledby="toddlers-tab">
                {!! $toddlers->long_desc !!}
              </div>

              <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                 {!! $twothrees->long_desc !!}
              </div>

              <div class="tab-pane fade" id="preschool" role="tabpanel" aria-labelledby="preschool-tab">
                {!! $preschool->long_desc !!}
              </div>
            </div>

            <!-- CTA -->
            <div class="mt-4">
              <a href="#visit" class="btn btn-primary btn-lg rounded-pill px-4">Arrange a Visit</a>
              <a href="#contact" class="btn btn-primary btn-lg rounded-pill px-4">Contact Us</a>
              <a class="btn btn-primary btn-lg rounded-pill px-4" target="_blank" href="https://app.famly.co/#/customInquiryForm/c6ae31a7-6348-4f58-89df-fd12ca88e5d7/to/eb08598d-c195-4399-acdf-9ed715df343e/submit">Enroll Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





  <!-- ===== Facilities / Features Section ===== -->
<section id="facilities" class="py-5 bg-white">
  <div class="container">
    <div class="row align-items-center g-4">
      <!-- LEFT: Title + feature list -->
      <div class="col-lg-6 position-relative">
        <!-- Butterfly background image (centered, behind content) -->
        <div style="
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          z-index: 0;
          opacity: 0.50;
          pointer-events: none;
          width: 250px;
          height: 250px;
          background: url('images/butterfly.jpg') center center/contain no-repeat;
        " aria-hidden="true"></div>
        <div class="pe-lg-4 position-relative" style="z-index:1;">
          <!-- Main heading (adapted from Busy Bees wording) -->
          <h3 class="h5 text-uppercase text-muted mb-2">Nursery Facilities</h3>
          <h2 class="fw-bold mb-4">Nursery Facilities at Angelinas Day Care</h2>

          <p class="lead text-muted mb-4">
        Here's a snapshot of some of the facilities and services we offer. Click or tap any item to learn more or ask during your visit.
          </p>

          <!-- Feature grid (icons + label + short) -->
          <div class="row g-3">
        <!-- Feature item -->
        <div class="col-6">
          <div class="feature-card p-3 rounded-3 h-100 d-flex align-items-start gap-3">
            <div class="feature-icon rounded-circle d-flex align-items-center justify-content-center">
          <!-- change to any icon you prefer -->
          <span class="bi bi-car-fill fs-5" aria-hidden="true"></span>
            </div>
            <div>
          <div class="fw-semibold">Parking</div>
          <small class="text-muted d-block">Ample on-site parking for families.</small>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="feature-card p-3 rounded-3 h-100 d-flex align-items-start gap-3">
            <div class="feature-icon rounded-circle d-flex align-items-center justify-content-center">
          <span class="bi bi-basket3-fill fs-5" aria-hidden="true"></span>
            </div>
            <div>
          <div class="fw-semibold">Meals & Snacks</div>
          <small class="text-muted d-block">NHS accredited meals prepared on-site.</small>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="feature-card p-3 rounded-3 h-100 d-flex align-items-start gap-3">
            <div class="feature-icon rounded-circle d-flex align-items-center justify-content-center">
          <span class="bi bi-droplet-fill fs-5" aria-hidden="true"></span>
            </div>
            <div>
          <div class="fw-semibold">Nappies & Wipes</div>
          <small class="text-muted d-block">Included in fees where appropriate.</small>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="feature-card p-3 rounded-3 h-100 d-flex align-items-start gap-3">
            <div class="feature-icon rounded-circle d-flex align-items-center justify-content-center">
          <span class="bi bi-shield-lock-fill fs-5" aria-hidden="true"></span>
            </div>
            <div>
          <div class="fw-semibold">Secure Access</div>
          <small class="text-muted d-block">Intercom and secure entry systems.</small>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="feature-card p-3 rounded-3 h-100 d-flex align-items-start gap-3">
            <div class="feature-icon rounded-circle d-flex align-items-center justify-content-center">
          <span class="bi bi-phone-fill fs-5" aria-hidden="true"></span>
            </div>
            <div>
          <div class="fw-semibold">Parent App</div>
          <small class="text-muted d-block">Daily updates: photos, naps, meals & messaging.</small>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="feature-card p-3 rounded-3 h-100 d-flex align-items-start gap-3">
            <div class="feature-icon rounded-circle d-flex align-items-center justify-content-center">
          <span class="bi bi-tree-fill fs-5" aria-hidden="true"></span>
            </div>
            <div>
          <div class="fw-semibold">Outdoor Play</div>
          <small class="text-muted d-block">Age-appropriate gardens and play spaces.</small>
            </div>
          </div>
        </div>
          </div>

          <!-- CTA -->
          <!-- <div class="mt-4">
        <a href="#visit" class="btn btn-outline-primary me-2">Book a Tour</a>
        <a href="#contact" class="btn btn-link">Contact Us</a>
          </div> -->
        </div>
      </div>

      <!-- RIGHT: Image / gallery -->
      <div class="col-lg-6">
        <div class="position-relative">
          <img src="{{ asset('resources/frontend/images/facilities.jpeg')}}" alt="Nursery facilities" class="img-fluid rounded-3 w-100 shadow-sm">

        </div>
      </div>
    </div> <!-- /.row -->
  </div> <!-- /.container -->
</section>


<!-- ===== Our Rooms Section ===== -->
<section id="our-rooms" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h3 class="h5 text-uppercase text-muted mb-2">Excellent Nursery Environment</h3>
      <h2 class="fw-bold">Our Rooms</h2>
    </div>

    <!-- Swiper container -->
    <div class="swiper roomSwiper">
      <div class="swiper-wrapper">

        @foreach ($rooms as $room)
            <div class="swiper-slide">
              <div class="room-card">
                <div class="room-img">
                  <img src="{{asset('images/content/'. $room->feature_image)}}" alt="{{$room->short_title}}">
                </div>
                <div class="room-icon">
                  {{ ['💬', '🌟', '🧸', '🏅', '👶', '🎨', '🌈', '🎭','🐻'][array_rand(['💬', '🌟', '🧸', '🏅', '👶', '🎨', '🌈', '🎭','🐻'])] }}
                </div>
                <div class="room-content text-center">
                  <h4 class="fw-bold mb-2">{{$room->short_title}}</h4>
                  <p class="text-muted mb-3">
                    {{$room->long_title}}
                  </p>
                  {{-- <a href="#" class="btn btn-outline-primary">Read More</a> --}}
                </div>
              </div>
            </div>
        @endforeach                

      </div>
      <!-- Swiper controls -->
      <div class="swiper-pagination mt-4"></div>
    </div>
  </div>
</section>



<!-- ===== Reviews / Testimonials Section ===== -->
<section id="reviews" class="py-5 position-relative overflow-hidden">
  <!-- Background SVG (birds in top-left on orange area) -->
  <svg class="reviews-bg" viewBox="0 0 800 400" preserveAspectRatio="xMinYMin slice" aria-hidden="true">
    <!-- orange background blob -->
    <defs>
      <linearGradient id="g1" x1="0" x2="1">
        <stop offset="0" stop-color="#ffd19a"/>
        <stop offset="1" stop-color="#ffb06b"/>
      </linearGradient>
    </defs>
    <rect x="0" y="0" width="100%" height="100%" fill="url(#g1)" rx="32" ry="32" />
    <!-- simple stylized birds as paths -->
    <g transform="translate(40,30)" fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" opacity="0.95">
      <path d="M10 20 q12 -12 24 0" />
      <path d="M40 18 q10 -9 20 0" />
      <path d="M80 24 q14 -12 28 0" />
      <path d="M130 16 q10 -8 20 0" />
    </g>
  </svg>

  <div class="container">
    <div class="row align-items-center gy-4">

      <!-- LEFT: Title + center big title + small content -->

      <div class="col-lg-5">
        <div class="pe-lg-4 text-center text-lg-start">
          <h3 class="h5 text-uppercase text-muted mb-2">What parents say</h3>
          <h2 class="fw-bold mb-3">Excellent Nursery Environment</h2> 
          <p class="text-muted">
        We take great pride in providing a nurturing, engaging environment where every child feels safe, builds confidence, and explores their unique interests. Here are a few words from the families who place their trust in us each day.
          </p>
        </div>
      </div>

      <!-- RIGHT: Reviews Carousel -->
      <div class="col-lg-7">
        <!-- Swiper (single-slide text carousel) -->
        <div class="swiper reviewsSwiper">
          <div class="swiper-wrapper">

            @foreach ($reviews as $key => $review)
                <div class="swiper-slide">
                  <div class="review-card p-4 text-center">
                      <div class="review-icon mb-3" aria-hidden="true">
                        {{ ['💬', '🌟', '🧸', '🏅', '👶', '🎨', '🌈', '🎭'][array_rand(['💬', '🌟', '🧸', '🏅', '👶', '🎨', '🌈', '🎭'])] }}
                      </div>
                    <blockquote class="review-quote mb-3">
                      {{ $review->review }}
                    </blockquote>
                    <div class="fw-semibold review-author">— {{ $review->name }}</div>
                  </div>
                </div>
            @endforeach

            

          </div>

          <!-- pagination small dots -->
          <div class="swiper-pagination mt-3"></div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ===== Smart Full-Width Gallery ===== -->
{{-- <section id="smart-gallery" class="py-5 bg-white">
  <div class="container-fluid px-0">
    <div class="container">
      <div class="text-center mb-4">
        <div class="small-title text-uppercase text-muted mb-2">Our Gallery</div>
        <h2 class="big-title">A glimpse of our nursery</h2>
        <p class="text-muted">Click any image to view it full size. Swipe or use the arrows to navigate.</p>
      </div>
    </div>

    <!-- Gallery grid: full-width background but images contained -->
    <div class="gallery-wrap">
      <div class="container">
        <div id="galleryGrid" class="row g-3">


          @foreach ($galleries as $gallery)


            @foreach ($gallery->images as $item)
                <div class="col-6 col-md-3">
                <div class="gallery-item" data-index="0" tabindex="0">
                  <img src="{{ asset('images/content/'.$item->image)}}" alt="{{$item->short_title}}" loading="lazy" data-full="{{ asset('images/content/'.$item->image)}}">
                  <div class="thumb-overlay"><span>View</span></div>
                </div>
              </div>
            @endforeach


              
          @endforeach

          


        </div> <!-- /.row -->
      </div> <!-- /.container -->
    </div> <!-- /.gallery-wrap -->

    <!-- See more button -->
    <div class="container text-center mt-4">
      <button id="galleryToggleBtn" class="btn btn-primary btn-lg rounded-pill px-4">See more</button>
    </div>
  </div>

  <!-- LIGHTBOX / OVERLAY -->
  <div id="galleryLightbox" class="gallery-lightbox d-none" aria-hidden="true">
    <button class="lb-close" aria-label="Close (Esc)">&times;</button>
    <button class="lb-prev" aria-label="Previous (Left)">&lsaquo;</button>
    <button class="lb-next" aria-label="Next (Right)">&rsaquo;</button>
    <div class="lb-content">
      <img id="lbImage" src="" alt="Full size image">
    </div>
  </div>
</section> --}}

<!-- ===== Smart Full-Width Gallery ===== -->
<section id="smart-gallery" class="py-5 bg-white">
  <div class="container-fluid px-0">
    <div class="container">
      <div class="text-center mb-4">
        <div class="small-title text-uppercase text-muted mb-2">Our Gallery</div>
        <h2 class="big-title">A glimpse of our nursery</h2>
        <p class="text-muted">Click any image to view it full size. Swipe or use the arrows to navigate.</p>
      </div>
    </div>

    <!-- Gallery grid: full-width background but images contained -->
    <div class="gallery-wrap">
      <div class="container">
        <div id="galleryGrid" class="row g-3">
          @php $index = 0; @endphp
          @foreach ($galleries as $gallery)
            @foreach ($gallery->images as $item)
              <div class="col-6 col-md-3">
                <div class="gallery-item {{ $index >= 4 ? 'hidden' : '' }}" data-index="{{ $index }}" tabindex="0">
                  <img src="{{ asset('images/content/' . $item->image) }}" alt="{{ $item->short_title }}" loading="lazy" data-full="{{ asset('images/content/' . $item->image) }}">
                  <div class="thumb-overlay"><span>View</span></div>
                </div>
              </div>
              @php $index++; @endphp
            @endforeach
          @endforeach
        </div> <!-- /.row -->
      </div> <!-- /.container -->
    </div> <!-- /.gallery-wrap -->

    <!-- See more button -->
    <div class="container text-center mt-4">
      <button id="galleryToggleBtn" class="btn btn-primary btn-lg rounded-pill px-4" style="{{ $index <= 4 ? 'display: none;' : '' }}">See more</button>
    </div>
  </div>

  <!-- LIGHTBOX / OVERLAY -->
  <div id="galleryLightbox" class="gallery-lightbox d-none" aria-hidden="true">
    <button class="lb-close" aria-label="Close (Esc)">&times;</button>
    <button class="lb-prev" aria-label="Previous (Left)">&lsaquo;</button>
    <button class="lb-next" aria-label="Next (Right)">&rsaquo;</button>
    <div class="lb-content">
      <img id="lbImage" src="" alt="Full size image">
    </div>
  </div>
</section>

<style>
  .hidden {
    display: none !important;
  }
</style>

<!-- ===== FAQ Section ===== -->
<section id="faq" class="faq-section py-5">
  <div class="container">
    <div class="row align-items-start gy-4">
      
      <!-- LEFT: Title & Intro -->
      <div class="col-lg-5">
        <div class="faq-intro text-center text-lg-start pe-lg-4">
          <!-- <div class="small-title text-uppercase text-muted mb-2">Got Questions?</div>
          <h2 class="big-title mb-3">We’ve Got Answers!</h2>
          <p class="text-muted">
            Here are some of the most common questions parents ask about our nursery environment, daily routines, and enrolment process.
          </p> -->
          <!-- <img src="https://cdn-icons-png.flaticon.com/512/3209/3209983.png" alt="Nursery FAQ illustration" class="img-fluid mt-4" style="max-width:220px;"> -->
          <img src="{{asset('resources/frontend/images/faq.jpeg')}}" alt="FAQ" class="img-fluid " >
        </div>
      </div>

      <!-- RIGHT: Accordion -->
      <div class="col-lg-7">
        <div class="accordion faq-accordion" id="faqAccordion">


          @foreach ($faqs as $key => $faq)
              
          <!-- Item 1 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq-{{ $key }}">
              <button class="{{ $key == 0 ? 'accordion-button' : 'accordion-button collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $key }}" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}" aria-controls="collapse-{{ $key }}">
                {{ $faq->question }}
              </button>
            </h2>
            <div id="collapse-{{ $key }}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="faq-{{ $key }}" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                {!! $faq->answer !!}
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>

    </div>
  </div>
</section>


<!-- ===== Call Back Request Section ===== -->
<section id="callback" class="py-5 position-relative">
  <!-- Decorative background (SVG + gradient) -->
  <div class="callback-bg" aria-hidden="true" id="contact">
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

                @if ($errors->any())
                  <div class="alert alert-danger" role="alert">
                    <h6 class="alert-heading mb-2">Please fix the following errors:</h6>
                    <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                <!-- Form -->
                <form action="{{ route('contact.store') }}" method="POST" role="form" class="php-email-form">
                    @csrf
                    <div class="row g-3">

                      <!-- First name -->
                      <div class="col-12 col-md-6">
                        <label class="form-label visually-hidden" for="first_name">First name</label>
                        <input id="first_name" 
                              name="first_name" 
                              type="text" 
                              class="form-control @error('first_name') is-invalid @enderror"
                              placeholder="First name" 
                              value="{{ old('first_name') }}" 
                              required>
                        @error('first_name')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>

                      <!-- Last name -->
                      <div class="col-12 col-md-6">
                        <label class="form-label visually-hidden" for="last_name">Last name</label>
                        <input id="last_name" 
                              name="last_name" 
                              type="text" 
                              class="form-control @error('last_name') is-invalid @enderror"
                              placeholder="Last name"
                              value="{{ old('last_name') }}">
                        @error('last_name')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>

                      <!-- Email -->
                      <div class="col-12 col-md-6">
                        <label class="form-label visually-hidden" for="email">Email</label>
                        <input id="email" 
                              name="email" 
                              type="email" 
                              class="form-control @error('email') is-invalid @enderror"
                              placeholder="Email" 
                              value="{{ old('email') }}" 
                              required>
                        @error('email')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>

                      <!-- Phone -->
                      <div class="col-12 col-md-6">
                        <label class="form-label visually-hidden" for="phone">Phone</label>
                        <input id="phone" 
                              name="phone" 
                              type="text" 
                              class="form-control  @error('phone') is-invalid @enderror"
                              placeholder="Phone" 
                              value="{{ old('phone') }}" 
                              required>
                        @error('phone')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>

                      <!-- Preferred time -->
                      <div class="col-12 col-md-12">
                        <label class="form-label visually-hidden" for="prefTime">Preferred time</label>
                        <select id="prefTime" 
                                name="prefTime" 
                                class="form-select  @error('prefTime') is-invalid @enderror" 
                                required>
                          <option value="" disabled {{ old('prefTime') ? '' : 'selected' }}>Preferred time</option>
                          <option {{ old('prefTime') == 'Morning (9:00 - 11:00)' ? 'selected' : '' }}>Morning (9:00 - 11:00)</option>
                          <option {{ old('prefTime') == 'Midday (11:00 - 14:00)' ? 'selected' : '' }}>Midday (11:00 - 14:00)</option>
                          <option {{ old('prefTime') == 'Afternoon (14:00 - 16:00)' ? 'selected' : '' }}>Afternoon (14:00 - 16:00)</option>
                          <option {{ old('prefTime') == 'Evening (16:00 - 18:00)' ? 'selected' : '' }}>Evening (16:00 - 18:00)</option>
                        </select>
                        @error('prefTime')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>

                      <!-- Message -->
                      <div class="col-12">
                        <label class="form-label visually-hidden" for="message">Message</label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="4" 
                                  class="form-control @error('message') is-invalid @enderror" 
                                  placeholder="Message (optional)">{{ old('message') }}</textarea>
                        @error('message')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                      </div>

                      <!-- Consent -->
                      <div class="col-12">
                        <div class="form-check">
                          <input id="consent" 
                                name="consent" 
                                class="form-check-input @error('consent') is-invalid @enderror" 
                                type="checkbox" 
                                {{ old('consent') ? 'checked' : '' }} 
                                required>
                          <label class="form-check-label small" for="consent">
                            I consent to my submitted data being collected and stored in accordance with the 
                            <a href="{{ route('privacy-policy') }}" target="_blank" rel="noopener">Privacy Policy</a>.
                          </label>
                        </div>
                        @error('consent')
                          <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                      </div>

                      <!-- Submit button -->
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
                {{$company->address1}}
              </div>
            </li>
            <li class="d-flex align-items-start mb-3">
              <div class="icon-wrap me-3"><i class="bi bi-telephone-fill"></i></div>
              <div>
                <strong>Phone</strong><br>
                <a href="tel:{{$company->phone1}}" class="text-decoration-none text-dark">{{$company->phone1}}</a>
              </div>
            </li>
            <li class="d-flex align-items-start mb-3">
              <div class="icon-wrap me-3"><i class="bi bi-envelope-fill"></i></div>
              <div>
                <strong>Email</strong><br>
                <a href="mailto:{{$company->email1}}" class="text-decoration-none text-dark">{{$company->email1}}</a>
              </div>
            </li>
            {{-- <li class="d-flex align-items-start">
              <div class="icon-wrap me-3"><i class="bi bi-clock-fill"></i></div>
              <div>
                <strong>Opening Hours</strong><br>
                Mon–Fri: 7:30 AM – 6:00 PM<br>
                Sat–Sun: Closed
              </div>
            </li> --}}
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
            src="{{$company->google_map}}"
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

<script>
$(document).ready(function () {
  // Handle "See more" button click
  $('#galleryToggleBtn').on('click', function () {
    // Select the next 4 hidden gallery items
    const hiddenItems = $('.gallery-item.hidden').slice(0, 4);
    
    // Show the next 4 items with a fade-in effect
    hiddenItems.removeClass('hidden').hide().fadeIn(500);
    
    // Hide the button if no more hidden items remain
    if ($('.gallery-item.hidden').length === 0) {
      $('#galleryToggleBtn').fadeOut(300);
    }
  });

  // Debugging: Log the number of hidden items on page load
  console.log('Total gallery items:', $('.gallery-item').length);
  console.log('Hidden gallery items:', $('.gallery-item.hidden').length);
});
</script>



@endsection