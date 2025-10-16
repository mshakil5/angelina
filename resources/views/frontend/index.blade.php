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
                    {{-- <h1 class="display-5 fw-bold">A Brighter Future For All</h1>
                    <p class="lead">A safe, playful and caring environment where little learners thrive.</p>
                    <p><a class="btn btn-primary btn-lg" href="#about">Learn more</a></p> --}}
                </div>
            </div>
        @endforeach


        

        {{-- <div class="carousel-item">
          <img src="https://picsum.photos/seed/nursery2/1600/700" class="d-block w-100" alt="Indoor play">
          <div class="carousel-caption text-white">
            <h2 class="fw-bold">Play-based Learning</h2>
            <p>Exploration, creativity and early social development through play.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="https://picsum.photos/seed/nursery3/1600/700" class="d-block w-100" alt="Outdoor time">
          <div class="carousel-caption text-white">
            <h2 class="fw-bold">Confidence & Independence</h2>
            <p>Preparing children for their next big step — school readiness with care.</p>
          </div>
        </div> --}}
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
    <svg class="waves" xmlns="http://www.w3.org/2000/svg"
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
    </svg>
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
      <div class="row g-4 align-items-center">

        <!-- LEFT: Images area (no header title as requested) -->
        <div class="col-lg-6">
          <div class="about-images" aria-hidden="true">
            <div class="about-left">
              <!-- large left image -->
              <div class="single">
                <img src="https://picsum.photos/seed/left1/800/800" alt="Nursery photo 1">
              </div>

              <!-- stacked two images on the right -->
              <div class="stack">
                <img src="https://picsum.photos/seed/right1/800/400" alt="Nursery photo 2">
                <img src="https://picsum.photos/seed/right2/800/400" alt="Nursery photo 3">
              </div>
            </div>
          </div>
        </div>

        <!-- RIGHT: Text + small title + big title + centered tabs -->
        <div class="col-lg-6">
          <div class="px-md-3">
            <div class="small-title">Our Age Groups</div>
            <h2 class="big-title">Child-centred care for every stage</h2>

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
                <h5 class="mt-2">Welcome to Angelina’s Day Care – Toddler Room (3 to 12 Months)</h5>
                <p>
                  Our Toddler Room offers a warm, caring space tailored for babies aged 3 to 12 months.
                  We support each child’s rapid development with gentle care and meaningful play.
                </p>

                <h6 class="mt-3">Nurturing Early Development</h6>
                <p>With close and trusting relationships, our experienced team supports your baby’s wellbeing and growth in key areas:</p>
                <ul>
                  <li>Physical movement</li>
                  <li>Language and communication</li>
                  <li>Social-emotional bonding</li>
                  <li>Creative play</li>
                </ul>

                <h6 class="mt-3">Learning Through Exploration</h6>
                <p>Your child will enjoy soft toys, music, sensory play and nature-based materials—all designed to spark curiosity and early learning.</p>

                <h6 class="mt-3">A Calm Transition</h6>
                <p>We partner with families to create a smooth, happy start to nursery life, respecting your child’s routines and needs.</p>
              </div>

              <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                <h5 class="mt-2">Welcome to Angelina’s Day Care – Two to Three’s Room</h5>
                <p>
                  In this room, we support your child’s growing independence. With gentle guidance, they’ll explore toilet training,
                  self-feeding and dressing themselves. Please pack extra clothes—just in case!
                </p>

                <h6 class="mt-3">Learning Through Play</h6>
                <p>Children enjoy:</p>
                <ul>
                  <li>Role play in our home corner</li>
                  <li>Building with big blocks</li>
                  <li>Creative sand and water play</li>
                  <li>A cozy reading nook</li>
                  <li>Outdoor fun for movement and balance</li>
                </ul>
                <p>Your child will gain confidence, curiosity, and key self-care skills—all through play!</p>
              </div>

              <div class="tab-pane fade" id="preschool" role="tabpanel" aria-labelledby="preschool-tab">
                <h5 class="mt-2">Welcome to Angelina’s Day Care – Preschool Room</h5>
                <p>
                  Our Preschool Room nurtures your child’s growing confidence and school readiness. Children practice independence
                  through activities like dressing, toileting, and making simple choices during the day.
                </p>

                <h6 class="mt-3">Learning Through Play</h6>
                <p>Preschoolers enjoy:</p>
                <ul>
                  <li>Imaginative role play and storytelling</li>
                  <li>Early writing and number games</li>
                  <li>Creative arts and crafts</li>
                  <li>Science and nature exploration</li>
                  <li>Active outdoor play to build coordination and teamwork</li>
                </ul>
                <p>We help your child grow into a curious, capable, and confident learner—ready for the next big step!</p>
              </div>
            </div>

            <!-- CTA -->
            <div class="mt-4">
              <a href="#visit" class="btn btn-outline-primary">Arrange a Visit</a>
              <a href="#contact" class="btn btn-link">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class=" py-5 position-relative">
      <div class="container">
        <h2 class="menu-title">Weekly Food Menu</h2>

      <div class="menu-grid">
        <div class="menu-card bg1">
          <img src="https://angelinasdaycare.co.uk/wp-content/uploads/2023/08/3-Peanut-butter-and-jelly-sandwich.jpg" alt="Week 1">
          <div class="week-title">Week 1</div>
        </div>

        <div class="menu-card bg2">
          <img src="https://angelinasdaycare.co.uk/wp-content/uploads/2023/08/5-pizza.jpg" alt="Week 2">
          <div class="week-title">Week 2</div>
        </div>

        <div class="menu-card bg3">
          <img src="https://angelinasdaycare.co.uk/wp-content/uploads/2023/08/4-tacos.jpg" alt="Week 3">
          <div class="week-title">Week 3</div>
        </div>

        <div class="menu-card bg4">
          <img src="https://angelinasdaycare.co.uk/wp-content/uploads/2023/08/6-Chicken-nuggets.jpg" alt="Week 4">
          <div class="week-title">Week 4</div>
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
          <h2 class="fw-bold mb-4">Nursery Facilities at SunnyNursery</h2>

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
          <img src="https://picsum.photos/seed/facility/900/600" alt="Nursery facilities" class="img-fluid rounded-3 w-100 shadow-sm">

          <!-- optional overlay cards for a more "catalog" feel -->
          <div class="facility-overlay d-none d-md-flex flex-column gap-3 position-absolute" style="right:1rem; bottom:1rem; width:220px;">
            <div class="overlay-card p-2 rounded-3 bg-white shadow-sm">
              <div class="fw-semibold small mb-1">Smart Board</div>
              <small class="text-muted">Interactive learning tools in rooms.</small>
            </div>

            <div class="overlay-card p-2 rounded-3 bg-white shadow-sm">
              <div class="fw-semibold small mb-1">Sensory Room</div>
              <small class="text-muted">Calm space with sensory activities.</small>
            </div>
          </div>
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

        <!-- Room card 1 -->
        <div class="swiper-slide">
          <div class="room-card">
            <div class="room-img">
              <img src="https://picsum.photos/seed/toddler/500/350" alt="Toddler Room">
            </div>
            <div class="room-icon">
              🐻
            </div>
            <div class="room-content text-center">
              <h4 class="fw-bold mb-2">Toddler Room</h4>
              <p class="text-muted mb-3">
                A cozy space for the youngest explorers to learn through gentle play and care.
              </p>
              <a href="#" class="btn btn-outline-primary">Read More</a>
            </div>
          </div>
        </div>

        <!-- Room card 2 -->
        <div class="swiper-slide">
          <div class="room-card">
            <div class="room-img">
              <img src="https://picsum.photos/seed/twotothree/500/350" alt="Two to Three’s">
            </div>
            <div class="room-icon">
              🐰
            </div>
            <div class="room-content text-center">
              <h4 class="fw-bold mb-2">Two to Three’s</h4>
              <p class="text-muted mb-3">
                Encouraging independence through fun, creative play and gentle guidance.
              </p>
              <a href="#" class="btn btn-outline-primary">Read More</a>
            </div>
          </div>
        </div>

        <!-- Room card 3 -->
        <div class="swiper-slide">
          <div class="room-card">
            <div class="room-img">
              <img src="https://picsum.photos/seed/preschool/500/350" alt="Preschool Room">
            </div>
            <div class="room-icon">
              🦁
            </div>
            <div class="room-content text-center">
              <h4 class="fw-bold mb-2">Preschool Room</h4>
              <p class="text-muted mb-3">
                Building confidence and curiosity to prepare for the big school journey.
              </p>
              <a href="#" class="btn btn-outline-primary">Read More</a>
            </div>
          </div>
        </div>

        <!-- Room card 4 -->
        <div class="swiper-slide">
          <div class="room-card">
            <div class="room-img">
              <img src="https://picsum.photos/seed/outdoor/500/350" alt="Outdoor Play">
            </div>
            <div class="room-icon">
              🐦
            </div>
            <div class="room-content text-center">
              <h4 class="fw-bold mb-2">Outdoor Play</h4>
              <p class="text-muted mb-3">
                Safe outdoor fun that develops balance, teamwork, and imagination.
              </p>
              <a href="#" class="btn btn-outline-primary">Read More</a>
            </div>
          </div>
        </div>

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
          <div class="small-title text-uppercase text-muted mb-2">What parents say</div>
          <h2 class="big-title mb-3">Excellent Nursery Environment</h2>
          <p class="lead text-muted">
            We pride ourselves on creating a nurturing and stimulating environment where children feel safe, grow in confidence and discover their interests.
            Below are a few words from the families who trust us each day.
          </p>
        </div>
      </div>

      <!-- RIGHT: Reviews Carousel -->
      <div class="col-lg-7">
        <!-- Swiper (single-slide text carousel) -->
        <div class="swiper reviewsSwiper">
          <div class="swiper-wrapper">

            <!-- Slide 1 -->
            <div class="swiper-slide">
              <div class="review-card p-4 text-center">
                <div class="review-icon mb-3" aria-hidden="true">💬</div>
                <blockquote class="review-quote mb-3">
                  “The staff are incredibly caring — our child’s confidence has blossomed in just a few months. We love the daily updates and photos.”
                </blockquote>
                <div class="fw-semibold review-author">— Sarah &amp; Tom, Colchester</div>
              </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
              <div class="review-card p-4 text-center">
                <div class="review-icon mb-3" aria-hidden="true">🌟</div>
                <blockquote class="review-quote mb-3">
                  “A beautiful balance of structure and play. Teachers take time to understand every child's needs — highly recommended.”
                </blockquote>
                <div class="fw-semibold review-author">— Louise P.</div>
              </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide">
              <div class="review-card p-4 text-center">
                <div class="review-icon mb-3" aria-hidden="true">🧸</div>
                <blockquote class="review-quote mb-3">
                  “Lovely outdoor spaces and creative indoor activities. My son comes home excited every day — what more could you ask for?”
                </blockquote>
                <div class="fw-semibold review-author">— Ahmed K.</div>
              </div>
            </div>

            <!-- Slide 4 -->
            <div class="swiper-slide">
              <div class="review-card p-4 text-center">
                <div class="review-icon mb-3" aria-hidden="true">🏅</div>
                <blockquote class="review-quote mb-3">
                  “Organised, friendly and reliable team. The care here gives us peace of mind while we’re at work.”
                </blockquote>
                <div class="fw-semibold review-author">— Emma R.</div>
              </div>
            </div>

          </div>

          <!-- pagination small dots -->
          <div class="swiper-pagination mt-3"></div>
        </div>
      </div>

    </div>
  </div>
</section>


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

          <!-- Each item: data-full holds full-size image -->
          <!-- We'll render 8 visible images initially (index 0..7) -->
          <div class="col-6 col-md-3">
            <div class="gallery-item" data-index="0" tabindex="0">
              <img src="https://picsum.photos/seed/g1/800/600" alt="Gallery 1" loading="lazy" data-full="https://picsum.photos/seed/g1/1600/1200">
              <div class="thumb-overlay"><span>View</span></div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="gallery-item" data-index="1" tabindex="0">
              <img src="https://picsum.photos/seed/g2/800/600" alt="Gallery 2" loading="lazy" data-full="https://picsum.photos/seed/g2/1600/1200">
              <div class="thumb-overlay"><span>View</span></div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="gallery-item" data-index="2" tabindex="0">
              <img src="https://picsum.photos/seed/g3/800/600" alt="Gallery 3" loading="lazy" data-full="https://picsum.photos/seed/g3/1600/1200">
              <div class="thumb-overlay"><span>View</span></div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="gallery-item" data-index="3" tabindex="0">
              <img src="https://picsum.photos/seed/g4/800/600" alt="Gallery 4" loading="lazy" data-full="https://picsum.photos/seed/g4/1600/1200">
              <div class="thumb-overlay"><span>View</span></div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="gallery-item" data-index="4" tabindex="0">
              <img src="https://picsum.photos/seed/g5/800/600" alt="Gallery 5" loading="lazy" data-full="https://picsum.photos/seed/g5/1600/1200">
              <div class="thumb-overlay"><span>View</span></div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="gallery-item" data-index="5" tabindex="0">
              <img src="https://picsum.photos/seed/g6/800/600" alt="Gallery 6" loading="lazy" data-full="https://picsum.photos/seed/g6/1600/1200">
              <div class="thumb-overlay"><span>View</span></div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="gallery-item" data-index="6" tabindex="0">
              <img src="https://picsum.photos/seed/g7/800/600" alt="Gallery 7" loading="lazy" data-full="https://picsum.photos/seed/g7/1600/1200">
              <div class="thumb-overlay"><span>View</span></div>
            </div>
          </div>

          <div class="col-6 col-md-3">
            <div class="gallery-item" data-index="7" tabindex="0">
              <img src="https://picsum.photos/seed/g8/800/600" alt="Gallery 8" loading="lazy" data-full="https://picsum.photos/seed/g8/1600/1200">
              <div class="thumb-overlay"><span>View</span></div>
            </div>
          </div>

          <!-- Hidden additional images (revealed by See more) -->
          <div class="col-6 col-md-3 more-item d-none">
            <div class="gallery-item" data-index="8" tabindex="0">
              <img src="https://picsum.photos/seed/g9/800/600" alt="Gallery 9" loading="lazy" data-full="https://picsum.photos/seed/g9/1600/1200">
              <div class="thumb-overlay"><span>View</span></div>
            </div>
          </div>

          <div class="col-6 col-md-3 more-item d-none">
            <div class="gallery-item" data-index="9" tabindex="0">
              <img src="https://picsum.photos/seed/g10/800/600" alt="Gallery 10" loading="lazy" data-full="https://picsum.photos/seed/g10/1600/1200">
              <div class="thumb-overlay"><span>View</span></div>
            </div>
          </div>

          <div class="col-6 col-md-3 more-item d-none">
            <div class="gallery-item" data-index="10" tabindex="0">
              <img src="https://picsum.photos/seed/g11/800/600" alt="Gallery 11" loading="lazy" data-full="https://picsum.photos/seed/g11/1600/1200">
              <div class="thumb-overlay"><span>View</span></div>
            </div>
          </div>

          <div class="col-6 col-md-3 more-item d-none">
            <div class="gallery-item" data-index="11" tabindex="0">
              <img src="https://picsum.photos/seed/g12/800/600" alt="Gallery 12" loading="lazy" data-full="https://picsum.photos/seed/g12/1600/1200">
              <div class="thumb-overlay"><span>View</span></div>
            </div>
          </div>

        </div> <!-- /.row -->
      </div> <!-- /.container -->
    </div> <!-- /.gallery-wrap -->

    <!-- See more button -->
    <div class="container text-center mt-4">
      <button id="galleryToggleBtn" class="btn btn-outline-primary">See more</button>
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
          <img src="images/faq.jpg" alt="Nursery FAQ illustration" class="img-fluid mt-4" >
        </div>
      </div>

      <!-- RIGHT: Accordion -->
      <div class="col-lg-7">
        <div class="accordion faq-accordion" id="faqAccordion">

          <!-- Item 1 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq1">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                What are your nursery opening hours?
              </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Our nursery is open <strong>Monday to Friday, 7:30 AM to 6:00 PM</strong>, excluding public holidays. We offer both full-day and half-day sessions for your convenience.
              </div>
            </div>
          </div>

          <!-- Item 2 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq2">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                Do you provide meals and snacks?
              </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Yes! We provide <strong>healthy, balanced meals and snacks</strong> freshly prepared daily. Our menus are designed to meet nutritional guidelines and cater to allergies or dietary needs.
              </div>
            </div>
          </div>

          <!-- Item 3 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq3">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                How do you ensure children’s safety?
              </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Safety is our top priority. We maintain <strong>secure entry systems, CCTV monitoring</strong>, and <strong>qualified first-aid trained staff</strong> at all times. Regular health and safety checks are conducted daily.
              </div>
            </div>
          </div>

          <!-- Item 4 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq4">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                What should I pack for my child each day?
              </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Please send a <strong>change of clothes, nappies, wipes, and any comfort items</strong> your child enjoys. For older children, include indoor shoes and weather-appropriate outdoor gear.
              </div>
            </div>
          </div>

          <!-- Item 5 -->
          <div class="accordion-item">
            <h2 class="accordion-header" id="faq5">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                How can I register my child?
              </button>
            </h2>
            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="faq5" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Simply complete our online registration form or visit us in person. Our team will guide you through every step and provide a tour of our nursery environment.
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>


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

                <!-- Form -->
                <form id="callbackForm" novalidate>
                  <div class="row g-3">
                    <div class="col-12 col-md-6">
                      <label class="form-label visually-hidden" for="firstName">First name</label>
                      <input id="firstName" name="firstName" type="text" class="form-control form-control-lg" placeholder="First name" required>
                      <div class="invalid-feedback">Please enter your first name.</div>
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label visually-hidden" for="lastName">Last name</label>
                      <input id="lastName" name="lastName" type="text" class="form-control form-control-lg" placeholder="Last name">
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label visually-hidden" for="email">Email</label>
                      <input id="email" name="email" type="email" class="form-control form-control-lg" placeholder="Email" required>
                      <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label visually-hidden" for="phone">Phone</label>
                      <input id="phone" name="phone" type="tel" class="form-control form-control-lg" placeholder="Phone" pattern="[\d\s()+\-]{6,20}" required>
                      <div class="invalid-feedback">Please enter a valid phone number.</div>
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
                      <div class="invalid-feedback">Please choose a preferred time.</div>
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label visually-hidden" for="nursery">Choose Nursery</label>
                      <select id="nursery" name="nursery" class="form-select form-select-lg" required>
                        <option value="" disabled selected>Choose nursery</option>
                        <option>SunnyNursery — Colchester</option>
                        <option>SunnyNursery — Central</option>
                        <option>SunnyNursery — North</option>
                      </select>
                      <div class="invalid-feedback">Please select a nursery.</div>
                    </div>

                    <div class="col-12">
                      <label class="form-label visually-hidden" for="message">Message</label>
                      <textarea id="message" name="message" rows="4" class="form-control" placeholder="Message (optional)"></textarea>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input id="consent" name="consent" class="form-check-input" type="checkbox" required>
                        <label class="form-check-label small" for="consent">
                          I consent to my submitted data being collected and stored in accordance with the <a href="#" target="_blank" rel="noopener">Just Imagine Privacy Policy</a>.
                        </label>
                        <div class="invalid-feedback">You must consent before submitting.</div>
                      </div>
                    </div>

                    <!-- CAPTCHA placeholder -->
                    <div class="col-12" id="captchaContainer">
                      <!-- If you use Google reCAPTCHA v2 (checkbox), replace the placeholder below with:
                        <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
                        and include the reCAPTCHA script:
                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

                        Or use hCaptcha or other provider. For demo, a simple checkbox is shown.
                      -->
                      <div class="form-check captcha-demo">
                        <input class="form-check-input" type="checkbox" id="captchaDemo" required>
                        <label class="form-check-label small" for="captchaDemo">I am not a robot (demo)</label>
                        <div class="invalid-feedback">Please confirm the CAPTCHA.</div>
                      </div>
                    </div>

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

@endsection