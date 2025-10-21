@extends('frontend.layouts.master')

@section('content')



@php
    $banner = \App\Models\Banner::where('page', 'User Dashboard')->first();
    $bgImage = $banner && $banner->feature_image
        ? asset('images/banner/' . $banner->feature_image)
        : asset('resources/frontend/images/page-banner2.jpg');
@endphp


<section class="breadcrumb-section text-center text-white d-flex align-items-center justify-content-center"
    style="background-image: url('{{ $bgImage }}');">
  <div class="container d-none">
    <h1 class="breadcrumb-title mb-3"></h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white text-decoration-none"></a></li>
        <li class="breadcrumb-item active text-white" aria-current="page"></li>
      </ol>
    </nav>
  </div>
</section>



<!-- Main content -->
<main class="content-wrap">
  <div class="container">



  </div>
</main>


@endsection

@section('script')


@endsection