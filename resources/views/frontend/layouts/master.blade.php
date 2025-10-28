<!doctype html>
<html lang="en">
<head>

    @php
        $company = App\Models\CompanyDetails::select('company_name', 'fav_icon', 'google_site_verification', 'footer_content', 'facebook', 'twitter', 'linkedin', 'website', 'phone1', 'email1', 'address1','company_logo','copyright','google_map')->first();
    @endphp


    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ $company->meta_title ?? $company->company_name }}</title>
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
    <!-- SEO Meta Tags -->
    <meta name="description" content="Angelinas Day Care offers outstanding childcare and early years education in Colchester. OFSTED rated, qualified staff, and age-specific learning programmes for 3 months to 5 years.">
    <meta name="keywords" content="nursery, childcare, early years, preschool, daycare, Colchester, Essex">
    
    
    @if($company->google_site_verification)
    <meta name="google-site-verification" content="{{ $company->google_site_verification }}">
    @endif



    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Angelinas Day Care - Top Rated Childcare in Colchester">
    <meta property="og:description" content="Outstanding childcare and early years education in Colchester. OFSTED rated with qualified staff.">
    <meta property="og:image" content="{{ asset('images/company/' . $company->fav_icon) }}">
    <meta property="og:url" content="https://Angelinas Day Care.co.uk">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Angelinas Day Care Colchester">
    <meta name="twitter:description" content="Outstanding childcare and early years education in Colchester. OFSTED rated.">
    <meta name="twitter:image" content="{{ asset('images/company/' . $company->fav_icon) }}">

    <!-- Favicon -->
    <link href="{{ asset('images/company/' . $company->fav_icon) }}" rel="icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/company/' . $company->fav_icon) }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link href="{{ asset('resources/frontend/css/main.css') }}" rel="stylesheet">

</head>
<body>




    @include('frontend.inc.header')

    <main class="main">
        @yield('content')
    </main>

    @include('frontend.cookies')

    @include('frontend.inc.footer')


<!-- ===== Back to Top button (centered) ===== -->
<!-- <button id="backToTop" class="back-to-top" aria-label="Back to top" title="Back to top">
  <i class="bi bi-chevron-up"></i>
</button> -->

<a
  href="https://wa.me/447392597296"
  class="whatsapp-float"
  target="_blank"
  aria-label="Chat on WhatsApp"
>
  <i class="bi bi-whatsapp"></i>
</a>



<style>
  .whatsapp-float {
    position: fixed;
    bottom: 50px;
    right: 25px;
    width: 60px;
    height: 60px;
    background-color: #ff708a;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 30px;
    z-index: 9999;
    box-shadow: 0 6px 15px #ff708a;
    transition: all 0.3s ease-in-out;
  }

  .whatsapp-float:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 25px #ff708a;
    color: #fff;
  }

  /* Glow animation for attention */
  @keyframes pulse {
    0% {
      box-shadow: 0 0 0 0 #ff708a;
    }
    70% {
      box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
    }
    100% {
      box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
    }
  }

  .whatsapp-float {
    animation: pulse 2s infinite;
  }

  /* Mobile responsive adjustments */
  @media (max-width: 576px) {
    .whatsapp-float {
      width: 50px;
      height: 50px;
      font-size: 24px;
      bottom: 20px;
      right: 20px;
    }
  }
</style>





  <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Bootstrap JS bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // small nicety
    document.getElementById('yr').textContent = new Date().getFullYear();

    // Activate keyboard accessible carousel pause on focus
    const carouselEl = document.querySelector('#heroCarousel');
    if (carouselEl) {
      carouselEl.addEventListener('mouseenter', () => bootstrap.Carousel.getInstance(carouselEl).pause());
      carouselEl.addEventListener('mouseleave', () => bootstrap.Carousel.getInstance(carouselEl).cycle());
    }
  </script>


<script>
  const swiper = new Swiper(".roomSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    grabCursor: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    breakpoints: {
      768: { slidesPerView: 2 },
      992: { slidesPerView: 3 },
    },
  });
</script>

<script>
  // Initialize Swiper for the reviews carousel (one slide at a time)
  const reviewsSwiper = new Swiper('.reviewsSwiper', {
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,
    grabCursor: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.reviewsSwiper .swiper-pagination',
      clickable: true,
    },
    // accessibility
    a11y: {
      prevSlideMessage: 'Previous review',
      nextSlideMessage: 'Next review',
      slideLabelMessage: 'Review'
    }
  });
</script>


<script>
(function(){
  // gather images in the grid
  const items = Array.from(document.querySelectorAll('#galleryGrid .gallery-item'));
  const lightbox = document.getElementById('galleryLightbox');
  const lbImage = document.getElementById('lbImage');
  const lbClose = document.querySelector('.lb-close');
  const lbPrev = document.querySelector('.lb-prev');
  const lbNext = document.querySelector('.lb-next');
  const toggleBtn = document.getElementById('galleryToggleBtn');

  // build an array of full image URLs
  const images = items.map((el) => el.querySelector('img').getAttribute('data-full') || el.querySelector('img').src);

  let currentIndex = 0;

  function openLightbox(index) {
    currentIndex = index;
    lbImage.src = images[currentIndex];
    lightbox.classList.remove('d-none');
    lightbox.classList.add('fade-in');
    lightbox.setAttribute('aria-hidden','false');
    document.body.style.overflow = 'hidden'; // prevent background scroll
    // set focus for accessibility
    lbClose.focus();
  }

  function closeLightbox() {
    lightbox.classList.add('d-none');
    lightbox.classList.remove('fade-in');
    lightbox.setAttribute('aria-hidden','true');
    document.body.style.overflow = '';
    lbImage.src = '';
  }

  function showNext() {
    currentIndex = (currentIndex + 1) % images.length;
    lbImage.src = images[currentIndex];
  }
  function showPrev() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    lbImage.src = images[currentIndex];
  }

  // click thumbnail to open
  items.forEach((item, idx) => {
    item.addEventListener('click', () => openLightbox(parseInt(item.dataset.index || idx)));
    item.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        openLightbox(parseInt(item.dataset.index || idx));
      }
    });
  });

  // lightbox controls
  lbClose.addEventListener('click', closeLightbox);
  lbNext.addEventListener('click', showNext);
  lbPrev.addEventListener('click', showPrev);

  // click overlay outside image to close
  lightbox.addEventListener('click', function(e){
    if (e.target === lightbox) closeLightbox();
  });

  // keyboard controls
  document.addEventListener('keydown', function(e){
    if (lightbox.classList.contains('d-none')) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowRight') showNext();
    if (e.key === 'ArrowLeft') showPrev();
  });


})();
</script>
<!-- ===== JS: Back to top show/hide + smooth scroll + set year ===== -->
<script>
(function(){
  const backBtn = document.getElementById('backToTop');
  const footerYear = document.getElementById('footerYear');
  const SHOW_AFTER = 240; // px scrolled down before show

  // Set year
  footerYear.textContent = new Date().getFullYear();

  // Show/hide on scroll
  function handleScroll() {
    if (window.scrollY > SHOW_AFTER) {
      backBtn.classList.add('show');
    } else {
      backBtn.classList.remove('show');
    }
  }
  window.addEventListener('scroll', handleScroll, { passive: true });

  // Smooth scroll to top when clicked
  backBtn.addEventListener('click', function(){
    window.scrollTo({ top: 0, behavior: 'smooth' });
    this.blur(); // remove focus
  });

  // keyboard accessible: space/enter activation
  backBtn.addEventListener('keydown', function(e){
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      this.click();
    }
  });

  // initialize show state
  handleScroll();
})();
</script>

@yield('script')

</body>
</html>
