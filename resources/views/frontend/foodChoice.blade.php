@extends('frontend.layouts.master')

@section('content')

<style>
  .week1 .table-week-title { background:#5e50a1; } /* purple */
  .week2 .table-week-title { background:#1da77a; } /* green */
  .week3 .table-week-title { background:#6f3ea6; } /* purple darker */
  .week4 .table-week-title { background:#f39c12; } /* orange */
  /* ---------- Main content ---------- */
  .content-wrap{ padding: 48px 0; }
  .content h3{ font-weight:700; margin-top:18px; color:var(--deep-blue) }
  .muted { color:var(--muted-text) }

  /* Weekly menu cards row */
  .menu-card img{ width:100%; height:140px; object-fit:cover; border-radius:6px; }
  .menu-card .label-week{ font-size:13px; font-weight:700; margin-top:8px; color:#333; }


  .menu-table {
    border-collapse: collapse;
    table-layout: fixed;
    word-wrap: break-word;
    width: 100% !important;
    font-size:13px;
  }

  .table-week-title { font-weight:700; padding:8px; color:#fff; text-align:center; }

  @media print {
    .table-responsive {
        overflow: visible !important;
        display: block !important;
    }
}



/* Update this section in your <style> tag */
.week1, .week2, .week3, .week4 {
    /* Remove page-break-after: always; */
    margin-bottom: 30px; 
    padding: 10px;
    background: #fff; /* Ensures no transparency issues */
}

/* Use this only if you want to force a break manually */
.html2pdf__page-break {
    page-break-before: always;
}

/* This is the clean way to tell the PDF engine to break */
.pdf-page-break {
    page-break-after: always !important;
    display: block;
}

/* Ensure tables don't get split in the middle of a row */
.table-responsive {
    page-break-inside: avoid !important;
}


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
    <h1 class="breadcrumb-title mb-3">Food Choice</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item">
          <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a>
        </li>
        <li class="breadcrumb-item active text-white" aria-current="page">Food Choice</li>
      </ol>
    </nav>
  </div>
</section>
@endif


  <section class=" py-5 position-relative">
      <div class="container">
        <h2 class="menu-title">Weekly Food Menu</h2>
        <div class="menu-grid">
          @foreach ($features as $key => $feature)

              <div class="menu-card {{ ['bg1','bg2','bg3','bg4'][array_rand(['bg1','bg2','bg3','bg4'])] }}">
                <img src="{{asset('images/service/' .$feature->image )}}" alt="{{ $feature->title }}">
                <div class="week-title">{{ $feature->title }}</div>
              </div>

          @endforeach
        </div>
      </div>
  </section>


<section class="food-choice py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">

          {!! $foodChoice->long_description !!}

      </div>
    </div>
  </div>
</section>

@if ($foodChoice->short_title == 'Active' )
    
<!-- Main content -->
<main class="content-wrap">
  <div class="container">

    <!-- Detailed weekly tables -->
    <div class="row mt-4 food-choice-content">
        <div class="col-lg-12 mx-auto">
            <h1 class="text-center my-4">4-Week Healthy Meal Plan</h1>
        </div>
        <div class="pdf-page-break"></div>


        {!! $foodChoice->short_description !!}


    </div>
  </div>
</main>

<div class="container text-end mt-3">
<button id="download-pdf" class="btn btn-primary">
    <i class="fas fa-download"></i> Download Menu as PDF
</button>
</div>


@endif


@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
  document.getElementById('download-pdf').addEventListener('click', function () {
      const element = document.querySelector('.food-choice-content');
      
      const opt = {
          margin:       [10, 10, 10, 10],
          filename:     'Weekly-Meal-Plan.pdf',
          image:        { type: 'jpeg', quality: 0.98 },
          html2canvas:  { 
              scale: 2, 
              useCORS: true, 
              scrollY: 0 
          },
          jsPDF:        { unit: 'mm', format: 'a4', orientation: 'landscape' },
          // This setting ensures it only breaks where you put .pdf-page-break
          pagebreak:    { mode: 'css' } 
      };

      html2pdf().set(opt).from(element).save();
  });
</script>
@endsection