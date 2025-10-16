@extends('frontend.master')

@section('content')
  <div class="page-title light-background">
    <div class="container">
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li class="current">Gallery</li>
        </ol>
      </nav>
    </div>
  </div>

  <section id="portfolio" class="portfolio section">
    <div class="container">
      <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
        <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
          <li data-filter="*" class="filter-active">All</li>
          @foreach($contents as $content)
            <li data-filter=".filter-{{ $content->id }}">{{ $content->short_title }}</li>
          @endforeach
        </ul>
        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
          @foreach($contents as $content)
            @foreach($content->images as $image)
              <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $content->id }}">
                <img src="{{ asset('images/content/'.$image->image) }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>{{ $content->short_title }}</h4>
                  <a href="{{ asset('images/content/'.$image->image) }}" 
                    title="{{ $content->short_title }}" 
                    data-gallery="portfolio-gallery-{{ $content->id }}" 
                    class="glightbox preview-link">
                    <i class="bi bi-zoom-in"></i>
                  </a>
                </div>
              </div>
            @endforeach
          @endforeach
        </div>
      </div>
    </div>
  </section>

@endsection