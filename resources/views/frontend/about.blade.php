@extends('frontend.layouts.master')

@section('content')


<style>
  /* container tweak */
    .about-section{
      max-width:var(--max-width);
      margin:0 auto;
      background:var(--card-bg);
      border-radius:24px;
      /* box-shadow:0 10px 30px rgba(18,24,33,0.06); */
      overflow:hidden;
      position:relative;
      padding:10px;
    }

    /* layout */
    .img-box-2{
      border-radius:16px;
      overflow:hidden;
      box-shadow:0 8px 24px rgba(9,30,66,0.06);
      background:linear-gradient(180deg, #fff, #fffaf3);
    }
    .img-box-2 img{
      width:100%;
      height:auto;
      display:block;
      object-fit:cover;
      vertical-align:middle;
    }

    .sub-title{
      display:inline-block;
      font-weight:600;
      color:var(--accent);
      letter-spacing:0.2px;
      margin-bottom:8px;
      text-transform:none;
    }
    .sec-title{
      font-size:30px;
      font-weight:800;
      margin:6px 0 18px;
      line-height:1.08;
      color:#0b2546;
    }
    .fs-md{color:var(--muted);font-size:15px}


    /* button */
    .vs-btn{
    display:inline-flex;align-items:center;gap:.6rem;
    padding:10px 18px;border-radius:10px;font-weight:700;
    background:linear-gradient(90deg,var(--accent),#ff8a80);
    color:white;text-decoration:none;border:none;
    box-shadow:0 8px 18px rgba(255,107,107,0.18);
    transition:transform .18s ease,box-shadow .18s ease;
    }
    .vs-btn:hover{transform:translateY(-3px);box-shadow:0 18px 30px rgba(255,107,107,0.14)}


    /* shape mockups */
    .shape-mockup{
    position:absolute;z-index:1;pointer-events:none;opacity:0.95;transition:transform .6s ease;
    }
    .shape-mockup img{display:block;max-width:120px;height:auto}


    /* position adjustments */
    .shape-dog{bottom:6%;left:3%;}
    .shape-star{right:3%;bottom:8%;}


    /* responsive text and spacing */
    @media(min-width:992px){
    .about-section{padding:20px}
    .sec-title{font-size:40px}
    }


    @media(max-width:767.98px){
    body{padding:20px 12px}
    .sec-title{font-size:26px}
    .shape-mockup{display:none}
    }


    /* subtle entrance animations (no external libs) */
    .fadeInLeft{opacity:0;transform:translateX(-18px);animation:fadeInLeft .7s forwards}
    .fadeInRight{opacity:0;transform:translateX(18px);animation:fadeInRight .7s forwards}
    @keyframes fadeInLeft{to{opacity:1;transform:none}}
    @keyframes fadeInRight{to{opacity:1;transform:none}}


    /* accessibility: focus states */
    .vs-btn:focus{outline:3px solid rgba(255,107,107,0.16);outline-offset:3px}


    /* small utilities */
    .lead-strong{font-weight:600;color:#0b3d6b}
    .text-muted-2{color:#556b83}


    /* content list styles (if needed) */
    .about-list{margin-top:12px}
    .about-list li{margin:8px 0;color:var(--muted)}


    /* card for quote */
    .info-card{background:#fff8f6;border-radius:14px;padding:16px;margin-top:18px;border:1px solid rgba(204,64,64,0.04)}

    .process-section{margin-top:60px;text-align:center;}
    .process-area{position:relative;margin-top:40px;}
    .process-box-body{background:#fff;border-radius:20px;box-shadow:0 6px 20px rgba(0,0,0,0.05);padding:30px;min-width:220px;transition:transform .3s;}
    .process-box-body:hover{transform:translateY(-8px);}
    .process-number{font-size:22px;font-weight:700;color:var(--accent);margin-bottom:10px;display:block;}
    .process-icon img{width:70px;height:auto;margin-bottom:12px;}
    .process-name a{text-decoration:none;font-weight:600;color:#0b2546;}
    .process-name a:hover{color:var(--accent);}
    .process-line img{width:100%;max-width:700px;margin:30px auto 0;display:block;opacity:.8;}
    @media(max-width:768px){body{padding:20px;} .process-area{display:flex;flex-wrap:wrap;justify-content:center;gap:20px;} .process-line{display:none;}}



</style>


@php
    $bgImage = $banner && $banner->feature_image
        ? asset('images/banner/' . $banner->feature_image)
        : asset('resources/frontend/images/page-banner2.jpg');
@endphp


@if ($banner->status == 1)
<section class="breadcrumb-section text-center text-white d-flex align-items-center justify-content-center"
    style="background-image: url('{{ $bgImage }}');">
  <div class="container d-none">
    <h1 class="breadcrumb-title mb-3">About Us</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active text-white" aria-current="page">About Us</li>
      </ol>
    </nav>
  </div>
</section>
@endif

@if ($our_curriculamn->status == 1)
 
<section id="our-curriculum" class="curriculum-section py-5 bg-white" aria-labelledby="curriculum-heading">
  <div class="container">
    
    <div class="row mb-5">
      <div class="col-lg-8">
        <h2 id="curriculum-heading" class="display-6 fw-bold text-dark mb-3"> {{ $our_curriculamn->title}} </h2>
        <div class="accent-line mb-4" style="width: 70px; height: 4px; background-color: #6f42c1; border-radius: 2px;"></div>
      </div>
    </div>

    <div class="row g-5">
      <div class="col-lg-7">
        
        {!! $our_curriculamn->long_description !!}

      </div>

      <div class="col-lg-5">
        <div class="p-4 rounded-4" style="background-color: #f8f0ff; border-left: 6px solid #6f42c1;">
          
          {!! $our_curriculamn->right_top !!}

        </div>
        
        <div class="mt-4 px-2">

          {!! $our_curriculamn->right_bottom !!}

        </div>
      </div>
    </div>
  </div>
</section>   
@endif


<section class="about-section d-none" aria-labelledby="about-heading">
  <div class="container">
    <div class="row g-4 align-items-center">
      <!-- Right: Content -->
      <div class="col-lg-12 col-xl-12 order-0 order-lg-1">
          {!! $about1->long_title !!}
      </div>
  </div>
</section>


<section class="about-section d-none" aria-labelledby="about-heading">
  <div class="container">
    <div class="row g-4">

      <!-- Left: Image -->
      <div class="col-lg-6 order-1 order-lg-0">
        <div class="img-box-2 fadeInLeft" style="animation-delay:.15s">
          <!-- use decoding=async and loading=lazy for perf -->
          <img loading="lazy" decoding="async" src="{{ asset('images/about/'. $about1->image)}}" alt="Children playing at Angelina's Day Care — preschool nursery in Colchester">
        </div>
      </div>


      <!-- Right: Content -->
      <div class="col-lg-6 col-xl-5 order-0 order-lg-1">
        <div class="ps-lg-4 pe-lg-2 fadeInRight" style="animation-delay:.2s">
          
          {!! $about1->long_description !!}

        </div>
      </div>


    </div>
  </div>
  

</section>



<section class="about-section  d-none" aria-labelledby="about-heading">
  <div class="container">
    <div class="row g-4 align-items-center">
      <!-- Right: Content -->
      <div class="col-lg-12 col-xl-12 order-0 order-lg-1">
          {!! $about1->short_description !!}

          
          <div class="mt-3">
            <a href="{{ route('home') }}#contact" class="vs-btn" role="button" aria-label="Contact Angelina's Day Care">Contact Us
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true" style="margin-left:6px"><path d="M5 12h14M12 5l7 7-7 7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
      </div>
  </div>
</section>



<section class="process-section mb-5">
<div class="text-center mb-4">
<span class="sub-title">Work Process</span>
<h2 class="sec-title">How We Manage Our Kids Education</h2>
</div>
<div class="process-area d-flex flex-wrap justify-content-center gap-4">
  <div class="process-box-body">
    <span class="process-number">01</span>
    <div class="process-content">
      <div class="process-icon"><img src="https://wordpress.vecurosoft.com/knirpse/wp-content/uploads/2023/03/process2-1.png" alt="Find a service"></div>
      <h5 class="process-name"><a href="https://angelinasdaycare.co.uk/contact/">Find A Service Now</a></h5>
    </div>
  </div>
  <div class="process-box-body">
    <span class="process-number">02</span>
    <div class="process-content">
      <div class="process-icon"><img src="https://wordpress.vecurosoft.com/knirpse/wp-content/uploads/2023/03/process2-2.png" alt="Appointment"></div>
      <h5 class="process-name"><a href="https://angelinasdaycare.co.uk/contact/">Appointment With Us</a></h5>
    </div>
  </div>
  <div class="process-box-body">
    <span class="process-number">03</span>
    <div class="process-content">
      <div class="process-icon"><img src="https://wordpress.vecurosoft.com/knirpse/wp-content/uploads/2023/03/process2-3.png" alt="Start Learning"></div>
      <h5 class="process-name"><a href="https://angelinasdaycare.co.uk/contact/">Start Learning Your Kids</a></h5>
    </div>
  </div>
<div class="process-box-body">
  <span class="process-number">04</span>
  <div class="process-content">
    <div class="process-icon">
      <img src="https://wordpress.vecurosoft.com/knirpse/wp-content/uploads/2023/03/process2-4.png" alt="Get the establish kids">
    </div>
    <h5 class="process-name"><a href="https://angelinasdaycare.co.uk/contact/">Get The Establish Kids</a></h5>
  </div>
</div>
</div>
    <div class="process-line">
      <img src="https://wordpress.vecurosoft.com/knirpse/wp-content/uploads/2023/03/dashed-line-1.png" alt="Process line">
    </div>
</section>





@if ($galleries->isNotEmpty())
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
@endif


@if ($our_story->status == 1)
    <!--Our Story -->
<section id="story-hero" class="hero-section position-relative overflow-hidden py-2 bg-light mt-3" aria-labelledby="hero-heading">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-12 mx-auto text-center">
        <h2 id="ethos-heading" class="display-5 fw-bold text-dark mb-4" style="letter-spacing: -1px;"> {{ $our_story->title }} </h2>
        <p class="text-muted">
            {!! $our_story->short_description !!}
        </p>
      </div>
      {{-- <div class="col-lg-6">
        <div class="hero-image-wrapper">
          <img src="images/children-playing.jpg" class="img-fluid rounded-4 shadow-lg" alt="Children engaged in indoor and outdoor play activities">
        </div>
      </div> --}}
    </div>
  </div>
</section>

<section id="story-intro" class="about-section py-2" aria-labelledby="intro-heading">
  <div class="container">
    <div class="row g-4 align-items-center">
      {{-- <div class="col-lg-5 order-lg-1">
        <img src="images/practitioner-child-level.jpg" class="img-fluid rounded-circle border border-5 border-white shadow" alt="Practitioner interacting warmly with a child at their level">
      </div> --}}
      <div class="col-lg-12 order-lg-0">
        <h2 id="intro-heading" class="mb-4"> {{ $our_story->sub_title }}  </h2>
        <div class="content-text">
           {!! $our_story->long_description !!}
        </div>
      </div>
    </div>
  </div>
</section>
@endif



<hr class="container my-5 text-muted opacity-25">



@if ($our_values->status == 1)
  <section id="values-ethos" class="values-section py-2 bg-white" aria-labelledby="ethos-heading">
  <div class="container">
    
    <div class="row mb-5">
      <div class="col-lg-8 mx-auto text-center">
        <h2 id="ethos-heading" class="display-5 fw-bold text-dark mb-4" style="letter-spacing: -1px;">{{$our_values->title}}</h2>
        <div class="accent-line mx-auto mb-4" style="width: 80px; height: 4px; background-color: #ffca2c; border-radius: 2px;"></div>
      </div>
    </div>

    <div class="row g-5">
      <div class="col-lg-6">
        
        {!! $our_values->long_description !!}

      </div>

      <div class="col-lg-6">

          <p class="lead fw-normal text-secondary mb-4" style="line-height: 1.8; border-left: 4px solid #ffca2c; padding-left: 1.5rem;">
            
            {!! $our_values->right_top !!}
            
          </p>

          <p class="mb-0 fw-medium text-dark p-3" style="line-height: 1.7; font-size: 1.1rem; background-color: #f8f9fa; padding: 1.5rem; border-radius: 12px;">
            {!! $our_values->right_bottom !!}
          </p>
      </div>
    </div>

  </div>
</section>  
@endif




@if ($safeguarding->status == 1)
<section id="safeguarding-policy" class="safeguarding-section py-5 bg-white" aria-labelledby="safeguarding-heading">
  <div class="container">
    <div class="row g-5 align-items-center">
      
      <div class="col-lg-7">
        <h2 id="safeguarding-heading" class="display-6 fw-bold text-dark mb-4"> 
          {{ $safeguarding->title }} 
        </h2>
        
        <p class="lead fw-bold text-primary mb-4" style="line-height: 1.6;">
           {{ $safeguarding->sub_title }} 
        </p>

        <div class="long-description">
          {!! $safeguarding->long_description !!}
        </div>
      </div>

      <div class="col-lg-5">
        <div class="p-4 rounded-4" style="background-color: #fff9e6; border: 1px dashed #ffca2c;">
          <h3 class="h5 fw-bold mb-4 text-dark text-center text-lg-start">Important Resources</h3>
          
          <div class="d-grid gap-3">
            @php
              // Decode the JSON string into an array
              $buttons = json_decode($safeguarding->button, true);
            @endphp

            @if(!empty($buttons))
              @foreach($buttons as $index => $btn)
                <a href="{{ $btn['link'] }}" 
                   class="btn {{ $index == 0 ? 'btn-danger' : 'btn-outline-dark' }} py-3 fw-bold d-flex align-items-center justify-content-center" 
                   target="_blank">
                   {{ $btn['name'] }}
                </a>
              @endforeach
            @endif
          </div>
          
          <p class="mt-4 small text-center text-muted">
            Our safeguarding policies are reviewed annually to ensure the highest standards of protection.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>   
@endif




@if ($parent_resource->status == 1)
<section id="parent-resources" class="resources-section py-5 bg-light" aria-labelledby="resources-heading">
  <div class="container">
    
    <div class="row mb-5">
      <div class="col-lg-8 mx-auto text-center">
        <h2 id="resources-heading" class="display-6 fw-bold text-dark mb-3">
          {{ $parent_resource->title }}
        </h2>
        <div class="accent-line mx-auto mb-4" style="width: 70px; height: 4px; background-color: #f39c12; border-radius: 2px;"></div>
        
        @if($parent_resource->sub_title)
          <p class="text-muted">{{ $parent_resource->sub_title }}</p>
        @endif
      </div>
    </div>

    <div class="row justify-content-center mb-5">
      <div class="col-lg-10">
        <div class="resource-long-description">
          {!! $parent_resource->long_description !!}
        </div>
      </div>
    </div>

    @php
        $buttons = json_decode($parent_resource->button, true);
    @endphp


    <div class="row g-4 mt-2">
      @if($parent_resource->image1)
      <div class="col-md-4">
        <div class="resource-image-wrapper">
          <img src="{{ asset('images/about/' . $parent_resource->image1) }}" 
               class="img-fluid rounded-4 shadow-sm w-100" 
               alt="Parent Resource Image 1" 
               style="height: 250px; object-fit: cover;">
        </div>
      </div>
      @endif
      
      @if($parent_resource->image2)
      <div class="col-md-4">
        <div class="resource-image-wrapper">
          <img src="{{ asset('images/about/' . $parent_resource->image2) }}" 
               class="img-fluid rounded-4 shadow-sm w-100" 
               alt="Parent Resource Image 2" 
               style="height: 250px; object-fit: cover;">
        </div>
      </div>
      @endif
      
      @if($parent_resource->image3)
      <div class="col-md-4">
        <div class="resource-image-wrapper">
          <img src="{{ asset('images/about/' . $parent_resource->image3) }}" 
               class="img-fluid rounded-4 shadow-sm w-100" 
               alt="Parent Resource Image 3" 
               style="height: 250px; object-fit: cover;">
        </div>
      </div>
      @endif
    </div>

  </div>
</section> 
@endif




@if ($meals->status == 1)
<section id="meals-and-menus" class="meals-section py-5 bg-white" aria-labelledby="meals-heading">
  <div class="container">
    
    <div class="row mb-5 text-center">
      <div class="col-lg-8 mx-auto">
        <h2 id="meals-heading" class="display-6 fw-bold text-dark mb-3">
          {{ $meals->title }}
        </h2>
        <div class="accent-line mx-auto mb-4" style="width: 60px; height: 3px; background-color: #28a745;"></div>
        
        @if($meals->sub_title)
           <p class="text-muted">{{ $meals->sub_title }}</p>
        @endif
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-10">
        
        @if($meals->short_description)
        <div class="lead text-dark mb-4" style="line-height: 1.8; font-weight: 500;">
          {!! $meals->short_description !!}
        </div>
        @endif

        @if($meals->long_description)
        <div class="text-muted" style="line-height: 1.8; font-size: 1.15rem; border-left: 5px solid #28a745; padding-left: 1.5rem;">
          {!! $meals->long_description !!}
        </div>
        @endif


      </div>
    </div>

  </div>
</section>   
@endif





@if ($family_app->status == 1)
<section id="family-app" class="app-section py-5 bg-white" aria-labelledby="app-heading">
  <div class="container">
    
    <div class="row mb-5 text-center">
      <div class="col-12">
        <h2 id="app-heading" class="display-6 fw-bold text-dark">
          {{ $family_app->title }}
        </h2>
        <div class="accent-line mx-auto mt-3" style="width: 60px; height: 4px; background-color: #17a2b8; border-radius: 2px;"></div>
        
        @if($family_app->sub_title)
          <p class="text-muted mt-3">{{ $family_app->sub_title }}</p>
        @endif
      </div>
    </div>

    <div class="row g-4 mb-5">
      @if($family_app->image1)
      <div class="col-md-6">
        <div class="app-visual-wrapper">
          <img src="{{ asset('images/about/' . $family_app->image1) }}" 
               class="img-fluid rounded-4 shadow-sm w-100" 
               alt="Family App Interface 1" 
               style="height: 350px; object-fit: cover;">
        </div>
      </div>
      @endif

      @if($family_app->image2)
      <div class="col-md-6">
        <div class="app-visual-wrapper">
          <img src="{{ asset('images/about/' . $family_app->image2) }}" 
               class="img-fluid rounded-4 shadow-sm w-100" 
               alt="Family App Interface 2" 
               style="height: 350px; object-fit: cover;">
        </div>
      </div>
      @endif
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="p-4 rounded-4" style="background-color: #f0fbfc; border-left: 6px solid #17a2b8;">
          <div class="app-description-text">
            {!! $family_app->long_description !!}
          </div>
        </div>
      </div>
    </div>


  </div>
</section>   
@endif





@if ($funding_fees->status == 1)
  <section id="funding-and-fees" class="funding-section py-5 bg-light" aria-labelledby="funding-heading">
  <div class="container">
    
    <div class="row mb-5">
      <div class="col-lg-8">
        <h2 id="funding-heading" class="display-6 fw-bold text-dark mb-3">{{$funding_fees->title}}</h2>
        <div class="accent-line mb-4" style="width: 70px; height: 4px; background-color: #0d6efd; border-radius: 2px;"></div>
      </div>
    </div>

    <div class="row g-5">
      <div class="col-lg-7">
        
        {!! $funding_fees->long_description !!}


      </div>

      <div class="col-lg-5">
        <div class="p-4 rounded-4 bg-white shadow-sm border-top border-primary border-5">
          <h3 class="h5 fw-bold mb-4 text-center">Funding At A Glance</h3>
          
          <div class="funding-options">
            <div class="d-flex align-items-center mb-3">
              <div class="icon-box me-3 text-primary fs-3">🕒</div>
              <div>
                <p class="mb-0 fw-bold">15 Hours Funding</p>
                <p class="mb-0 small text-muted">Available for eligible 2, 3, and 4-year-olds.</p>
              </div>
            </div>

            <div class="d-flex align-items-center mb-3">
              <div class="icon-box me-3 text-primary fs-3">🗓️</div>
              <div>
                <p class="mb-0 fw-bold">30 Hours Funding</p>
                <p class="mb-0 small text-muted">Available for eligible working families.</p>
              </div>
            </div>

            <div class="d-flex align-items-center">
              <div class="icon-box me-3 text-primary fs-3">💎</div>
              <div>
                <p class="mb-0 fw-bold">Transparent Fees</p>
                <p class="mb-0 small text-muted">Clear breakdown of any additional charges.</p>
              </div>
            </div>
          </div>

          <div class="mt-4 pt-3 border-top text-center">
            <a href="{{ route('fees') }}" class="btn btn-primary px-4 py-2 fw-bold">View Our Fee Structure</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>  
@endif






@if ($current_values->status == 1)
   <section id="vacancies" class="vacancies-section py-5 bg-white" aria-labelledby="vacancies-heading">
  <div class="container">
    <div class="row g-5 align-items-center">
      
      <div class="col-lg-7">
        <h2 id="vacancies-heading" class="display-6 fw-bold text-dark mb-4">{{ $current_values->title }}</h2>
        
        <p class="lead text-primary fw-medium mb-4" style="line-height: 1.7;">
          {{$current_values->sub_title}}
        </p>

           {!! $current_values->long_description !!}


      </div>

      <div class="col-lg-5">
        <div class="p-4 rounded-4 shadow-sm" style="background-color: #f0f7ff; border: 1px solid #cfe2ff;">
          <h3 class="h5 fw-bold mb-3 text-dark">Join Our Team</h3>
          <p class="small text-muted mb-4">Ready to make a difference in a child's life? Explore our current openings or send us your CV for future opportunities.</p>
          
          <div class="d-grid gap-3">
            <a href="{{route('job')}}" class="btn btn-primary py-3 fw-bold" target="_blank">View Current Openings</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section> 
@endif








@php
    // Decode the social links from the button attribute
    $social_links = json_decode($social_link->button, true);
@endphp

@if ($social_link->status == 1)
<section id="social-connect" class="py-5 bg-dark text-white">
  <div class="container">
    <div class="row align-items-center">
      
      <div class="col-md-6 mb-4 mb-md-0 text-center text-md-start">
        <h3 class="fw-bold mb-2">{{ $social_link->title }}</h3>
        @if($social_link->sub_title)
            <p class="text-white-50 mb-0">{{ $social_link->sub_title }}</p>
        @endif
      </div>

      <div class="col-md-6">
        <div class="d-flex justify-content-center justify-content-md-end gap-3 flex-wrap">
          
          @if(!empty($social_links))
            @foreach($social_links as $link)
                <a href="{{ $link['link'] }}" 
                   class="btn btn-outline-light px-3 py-2 d-flex align-items-center gap-2" 
                   target="_blank" 
                   aria-label="{{ $link['name'] }}">
                   
                   {{-- Optional: Add icons based on the name --}}
                   @if(Str::contains(strtolower($link['name']), 'facebook'))
                       <i class="fab fa-facebook-f"></i>
                   @elseif(Str::contains(strtolower($link['name']), 'instagram'))
                       <i class="fab fa-instagram"></i>
                   @elseif(Str::contains(strtolower($link['name']), 'linkedin'))
                       <i class="fab fa-linkedin-in"></i>
                   @endif

                   <span class="fw-bold">{{ $link['name'] }}</span>
                </a>
            @endforeach
          @endif

        </div>
      </div>

    </div>
  </div>
</section>
@endif

@endsection

@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

});
</script>
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