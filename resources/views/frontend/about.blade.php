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

</style>

<style>
  /* container tweak */
/* container tweak */
    .about-section{
      max-width:var(--max-width);
      margin:0 auto;
      background:var(--card-bg);
      border-radius:24px;
      box-shadow:0 10px 30px rgba(18,24,33,0.06);
      overflow:hidden;
      position:relative;
      padding:30px;
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
.about-section{padding:48px}
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

<section class="breadcrumb-section text-center text-white d-flex align-items-center justify-content-center" style="background-image: url({{ asset('resources/frontend/images/page-banner2.jpg') }});">
  <div class="container">
    <h1 class="breadcrumb-title mb-3">About Us</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active text-white" aria-current="page">About Us</li>
      </ol>
    </nav>
  </div>
</section>


<section class="about-section" aria-labelledby="about-heading">
  <div class="container">
    <div class="row g-4 align-items-center">
      
      <div class="text-center mb-5">
        {{-- <h2>Enroll Now</h2> --}}
        <a href="https://app.famly.co/#/customInquiryForm/c6ae31a7-6348-4f58-89df-fd12ca88e5d7/to/eb08598d-c195-4399-acdf-9ed715df343e/submit" class="vs-btn" role="button" aria-label="Contact Angelina's Day Care" target="blank">Enroll Now
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true" style="margin-left:6px"><path d="M5 12h14M12 5l7 7-7 7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </a>
      </div>



      <!-- Left: Image -->
      <div class="col-lg-6 order-1 order-lg-0">
        <div class="img-box-2 fadeInLeft" style="animation-delay:.15s">
          <!-- use decoding=async and loading=lazy for perf -->
          <img loading="lazy" decoding="async" src="https://angelinasdaycare.co.uk/wp-content/uploads/2024/04/7-care.png" alt="Children playing at Angelina's Day Care — preschool nursery in Colchester">
        </div>
      </div>


      <!-- Right: Content -->
      <div class="col-lg-6 col-xl-5 ms-lg-auto order-0 order-lg-1">
        <div class="ps-lg-4 pe-lg-2 fadeInRight" style="animation-delay:.2s">
          <span class="sub-title">Angelina's Day Care nursery school</span>
          <h1 id="about-heading" class="sec-title big-title">Special Care For Your Children</h1>


          <p class="lead-strong">Welcome to Angelina’s Day Care – A Trusted Nursery in Colchester</p>


          <p class="fs-md text-muted-2">Angelina’s Day Care was proudly registered in 2024. From the beginning, we have welcomed <strong>every child</strong>, whether they have <strong>special educational needs</strong>, a <strong>disability</strong> or speak <strong>English as an additional language</strong>. As a leading preschool nursery in Colchester, we believe in creating an inclusive environment where each child feels valued and supported.</p>


          <p class="fs-md text-muted-2">Choosing the right nursery is one of the most important decisions a parent can make. <strong><a href="https://angelinasdaycare.co.uk" target="_blank" rel="noopener noreferrer">At Angelina’s Day Care</a>, we strive to be the best preschool nursery in Colchester</strong>, offering a safe, welcoming and enriching space for your child to grow. Our team delivers high-quality, professional childcare while building strong, lasting relationships with both parents and children.</p>


          <div class="info-card">
          <p class="mb-0 fs-md text-muted-2">To support individual learning, we carry out <strong>weekly observations</strong> and include children in planning activities. This way, every child benefits from experiences that match their needs and interests. We encourage parents and carers to get involved—your input is incredibly valuable to your child’s learning journey.</p>
          </div>


          <p class="mt-3 fs-md text-muted-2">When you leave your child with us, you can be confident that they’re thriving in a <strong>safe, friendly, and stimulating environment</strong>. Not only are they learning, but they’re also enjoying every moment through play, exploration, and discovery.</p>


          <p class="fs-md text-muted-2">We are proud to be known as one of the <strong>best preschool nurseries in Colchester</strong>. If you’d like to know more, <a href="https://www.instagram.com/angelinasdaycareltd" target="_blank" rel="noopener noreferrer">follow us on Instagram</a> or contact us directly—we’d love to welcome you for a visit.</p>


          <div class="mt-3">
            <a href="{{ route('home') }}#contact" class="vs-btn" role="button" aria-label="Contact Angelina's Day Care">Contact Us
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true" style="margin-left:6px"><path d="M5 12h14M12 5l7 7-7 7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>


        </div>
      </div>
    </div>
  </div>


  
  <div class="shape-mockup shape-dog d-none d-lg-block" aria-hidden="true" style="left:6%;bottom:28%;">
  <img decoding="async" loading="lazy" src="https://angelinasdaycare.co.uk/wp-content/uploads/2022/01/dog.png" alt="playful dog illustration">
  </div>


  <div class="shape-mockup shape-star d-none d-md-block" aria-hidden="true" style="right:5%;bottom:28%;">
  <img decoding="async" loading="lazy" src="https://angelinasdaycare.co.uk/wp-content/uploads/2022/01/star.png" alt="star illustration">
  </div>


</section>



<section class="process-section">
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