@extends('frontend.layouts.master')

@section('content')

<style>
  .breadcrumb-section {
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 450px;
    position: relative;
  }

  .breadcrumb-section::before {
    content: "";
    position: absolute;
    inset: 0;
  }

  .breadcrumb-section .container {
    position: relative;
    z-index: 2;
  }

  .breadcrumb-title {
    font-size: 2.5rem;
    font-weight: 700;
  }

  .breadcrumb a:hover {
    text-decoration: underline;
  }

  .section-title {
    text-align: center;
    margin-bottom: 40px;
  }
  .toddler-section {
    padding: 60px 0;
  }
  .toddler-section p {
    font-size: 16px;
  }
  .toddler-section ul {
    list-style: disc;
    padding-left: 20px;
  }
  .gallery-section {
    padding: 60px 0;
    background-color: #f9f9f9;
  }
  .gallery-section img {
    width: 100%;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform .3s ease;
  }
  .gallery-section img:hover {
    transform: scale(1.05);
  }

  @keyframes flyLeft {
      0% { transform: translateY(0) rotate(0deg); }
      50% { transform: translateY(-10px) rotate(-5deg); }
      100% { transform: translateY(0) rotate(0deg); }
  }

  @keyframes flyRight {
      0% { transform: translateY(0) rotate(0deg); }
      50% { transform: translateY(-10px) rotate(5deg); }
      100% { transform: translateY(0) rotate(0deg); }
  }

</style>


@php
    $bgImage = $banner && $banner->feature_image
        ? asset('images/banner/' . $banner->feature_image)
        : asset('resources/frontend/images/page-banner2.jpg');
@endphp


<section class="breadcrumb-section text-center text-white d-flex align-items-center justify-content-center"
    style="background-image: url('{{ $bgImage }}');">
  <div class="container">
    <h1 class="breadcrumb-title mb-3">{{ $agegroup->short_title }}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active text-white" aria-current="page">{{ $agegroup->short_title }}</li>
      </ol>
    </nav>
  </div>
</section>



  <!-- Butterfly top-left -->
  <img src="{{ asset('resources/frontend/images/butterfly-left.png') }}" 
       alt="Butterfly Left" 
       style="position: absolute; top: 100px; left: 100px; width: 100px; height: auto; opacity: 0.9; animation: flyLeft 6s infinite ease-in-out;">
  
  <!-- Butterfly top-right -->
  <img src="{{ asset('resources/frontend/images/butterfly-right.png') }}" 
       alt="Butterfly Right" 
       style="position: absolute; top: 50px; right: 100px; width: 100px; height: auto; opacity: 0.9; animation: flyRight 6s infinite ease-in-out;">



  <!-- Toddler Room Section -->
<section class="toddler-section container position-relative" style="overflow: hidden;">

  <div class="text-center mb-5">
    <h2>{{ $agegroup->short_title }}</h2>
  </div>

  <div class="row align-items-center">
    <div class="col-lg-6">
      
      {!! $agegroup->short_description !!}


    </div>

    <div class="col-lg-6 text-center">
      <img src="{{ asset('images/content/' . $agegroup->feature_image) }}"
           alt="{{ $agegroup->short_title }}" class="img-fluid rounded shadow">
    </div>
  </div>
</section>


  <!-- ===== Smart Full-Width Gallery ===== -->
<section id="smart-gallery" class="py-5 bg-white">
  <div class="container-fluid px-0">
    <div class="container">
      <div class="text-center mb-4">
        <div class="section-title">
          <h2>Photo Gallery</h2>
        </div>
      </div>
    </div>

    <!-- Gallery grid: full-width background but images contained -->
    <div class="gallery-wrap">
      <div class="container">
        <div id="galleryGrid" class="row g-3">

          @foreach ($agegroup->images as $image)
              <div class="col-6 col-md-3">
                <div class="gallery-item" data-index="0" tabindex="0">
                  <img src="{{asset('images/content/'. $image->image)}}" alt="{{ $agegroup->short_title }}" loading="lazy" data-full="{{asset('images/content/'. $image->image)}}">
                  <div class="thumb-overlay"><span>View</span></div>
                </div>
              </div>
          @endforeach

          


        </div> <!-- /.row -->
      </div> <!-- /.container -->
    </div> <!-- /.gallery-wrap -->

    <!-- See more button -->
    <div class="container text-center mt-4">
      {{-- <button id="galleryToggleBtn" class="btn btn-primary btn-lg rounded-pill px-4">See more</button> --}}
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