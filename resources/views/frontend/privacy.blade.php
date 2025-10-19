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



<section class="breadcrumb-section text-center text-white d-flex align-items-center justify-content-center" style="background-image: url({{ asset('resources/frontend/images/page-banner2.jpg') }});">
  <div class="container">
    <h1 class="breadcrumb-title mb-3">
        Privacy Policy
    </h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active text-white" aria-current="page">Privacy Policy</li>
      </ol>
    </nav>
  </div>
</section>


<!-- Main content -->
<main class="content-wrap">
  <div class="container">

    {!! $companyPrivacy->long_description !!}

  </div>
</main>


@endsection

