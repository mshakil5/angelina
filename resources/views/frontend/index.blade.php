@extends('frontend.master')

@section('content')

@foreach($sections as $section)

    @if($section->name == 'Slider')

    @if($sliders)

    <section id="about" class="about section">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2" data-aos="fade-up" data-aos-delay="400">
            <div class="swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 40
                    },
                    "1200": {
                      "slidesPerView": 1,
                      "spaceBetween": 1
                    }
                  }
                }
              </script>
              <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                  <div class="swiper-slide">
                    <img src="{{ asset('images/slider/' . $slider->image) }}" alt="Image" class="img-fluid">
                  </div>
                @endforeach
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
          <div class="col-lg-4 order-lg-1">
            <span class="section-subtitle" data-aos="fade-up">{{ $welcome->short_title ?? '' }}</span>
            <h1 class="mb-4" data-aos="fade-up">
              {{ $welcome->long_title ?? '' }}
            </h1>
            <p data-aos="fade-up">
              {!! $welcome->long_description ?? '' !!}
            </p>
            <p class="mt-5 d-none" data-aos="fade-up">
              <a href="#" class="btn btn-get-started">Get Started</a>
            </p>
          </div>
        </div>
      </div>
    </section>
    
    @endif

    @elseif($section->name == 'About1')

    <section id="about-1" class="about-2 section light-background">
      <div class="container">
        <div class="content">
          <div class="row justify-content-center">
            <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 order-lg-2 offset-xl-1 mb-4">
              <div class="img-wrap text-center text-md-left" data-aos="fade-up" data-aos-delay="100">
                <div class="img">
                  <img src="{{ asset('images/meta_image/' . $about1->meta_image) }}" class="img-fluid">
                </div>
              </div>
            </div>

            <div class="offset-md-0 offset-lg-1 col-sm-12 col-md-5 col-lg-5 col-xl-4" data-aos="fade-up">
              <div class="px-3">
                <span class="content-subtitle">{{ $about1->short_title ?? '' }}</span>
                <h2 class="content-title text-start">
                  {{ $about1->long_title ?? '' }}
                </h2>
                <p class="lead">
                  {!! $about1->short_description ?? '' !!}
                </p>
                <p class="mb-5">
                  {!! $about1->long_description ?? '' !!}
                </p>
                <p>
                  <a href="#" class="btn-get-started d-none">Get Started</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @elseif($section->name == 'About2')

    <section id="stats" class="stats section  light-background">
      <div class="container">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-5">
            <div class="images-overlap">
              <img src="{{ asset('images/meta_image/' . $about2->meta_image) }}" class="img-fluid" data-aos="fade-up">
            </div>
          </div>
          <div class="col-lg-4 ps-lg-5">
            <span class="content-subtitle">{{ $about2->short_title ?? '' }}</span>
            <h2 class="content-title">{{ $about2->long_title ?? '' }}</h2>
            <p class="lead">
              {!! $about2->short_description ?? '' !!}
            </p>
            <p class="mb-5">
              {!! $about2->long_description ?? '' !!}
            </p>
            <div class="row mb-5 count-numbers">
              @php
                  $stats = [
                      ['count' => $about2->coffee_count ?? 3919, 'label' => 'Coffee', 'delay' => 100],
                      ['count' => $about2->codes_count ?? 2831, 'label' => 'Codes', 'delay' => 200],
                      ['count' => $about2->projects_count ?? 1914, 'label' => 'Projects', 'delay' => 300],
                  ];
              @endphp

              @foreach($stats as $stat)
              <div class="col-4 counter" data-aos="fade-up" data-aos-delay="{{ $stat['delay'] }}">
                  <span data-purecounter-separator="true" data-purecounter-start="0" data-purecounter-end="{{ $stat['count'] }}" data-purecounter-duration="1" class="purecounter number"></span>
                  <span class="d-block">{{ $stat['label'] }}</span>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

    @elseif($section->name == 'Blog')

    @if($blogs)

    <section id="blog-posts" class="blog-posts section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Blog Posts</h2>
      </div>
      <div class="container">
        <div class="row gy-4">
          @foreach($blogs as $blog)
          <div class="col-md-6 col-lg-4">
            <div class="post-entry" data-aos="fade-up" data-aos-delay="100">
              <a href="{{ route('content.show', ['type' => 'blog', 'slug' => $blog->slug]) }}" class="thumb d-block">
                <img src="{{ asset('images/content/'.$blog->feature_image) }}" 
                    alt="{{ $blog->short_title ?? '' }}" 
                    class="img-fluid rounded">
              </a>

              <div class="post-content">
                <div class="meta">
                  <a href="{{ route('content.category', ['type' => 'blog', 'slug' => $blog->category->slug ?? '']) }}" class="cat">{{ $blog->category->name ?? '' }}</a> •
                  <span class="date">{{ date('F d, Y', strtotime($blog->publishing_date)) }}</span>
                </div>

                <h3>
                  <a href="{{ route('content.show', ['type' => 'blog', 'slug' => $blog->slug]) }}">{{ $blog->short_title ?? '' }}</a>
                </h3>

                <p>{{ $blog->long_title ?? '' }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    @endif

    @elseif($section->name == 'Features')

    <section id="tabs" class="tabs section light-background">
      <div class="container">
        <div class="row gap-x-lg-4 justify-content-between">
          <div class="col-lg-4 js-custom-dots">
            @foreach($features as $key => $feature)
            <a href="#" class="service-item link horizontal d-flex {{ $key == 0 ? 'active' : '' }}" 
              data-aos="fade-left" data-aos-delay="{{ $key * 100 }}">
              <div class="service-icon color-{{ $key + 1 }} mb-4">
                <i class="bi {{ $feature->icon ?? '' }}"></i>
              </div>
              <div class="service-contents">
                <h3>{{ $feature->title ?? '' }}</h3>
                <p>{{ $feature->short_desc ?? '' }}</p>
              </div>
            </a>
            @endforeach
          </div>

          <div class="col-lg-8">
            <div class="swiper init-swiper-tabs">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoHeight": true,
                  "autoplay": { "delay": 5000 },
                  "slidesPerView": "auto",
                  "pagination": { "el": ".swiper-pagination", "type": "bullets", "clickable": true },
                  "breakpoints": { "320": { "slidesPerView": 1, "spaceBetween": 40 }, "1200": { "slidesPerView": 1, "spaceBetween": 1 } }
                }
              </script>
              <div class="swiper-wrapper">
                @foreach($features as $key => $feature)
                <div class="swiper-slide">
                  <img src="{{ asset('images/service/'.$feature->image) }}" alt="{{ $feature->title ?? '' }}" class="img-fluid">
                  @if(!empty($feature->long_desc))
                  <div class="p-4">
                    <h3 class="text-black h5 mb-3">{{ $feature->title ?? '' }}</h3>
                    <div class="row">
                      <div class="col-lg-8">
                        <p>{!! $feature->long_desc !!}</p>
                      </div>
                      <div class="col-lg-4">
                        @if(!empty($feature->extra_list)) 
                          <ul class="list-unstyled list-check">
                            @foreach($feature->extra_list as $item)
                            <li>{{ $item }}</li>
                            @endforeach
                          </ul>
                        @endif
                      </div>
                    </div>
                  </div>
                  @endif
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @elseif($section->name == 'Services')

    @if($services)

    <section id="services-2" class="services-2 section">
      <div class="container">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-md-6 col-lg-4">
            <span class="content-subtitle">{{ $service->short_title ?? '' }}</span>
            <h2 class="content-title">
              {{ $service->long_title ?? '' }}
            </h2>
            <p class="lead">
              {{ $service->short_description ?? '' }}
            </p>
            <p class="mb-5">
              {!! $service->long_description ?? '' !!}
            </p>
            <p>
              <a href="#" class="btn btn-get-started d-none">Get Started</a>
            </p>
          </div>
          <div class="col-md-6 col-lg-6 ps-lg-5">
            <div class="row">
                @foreach($services as $key => $service)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="services-item" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                            <div class="services-icon">
                                <i class="bi {{ $service->icon ?? '' }}"></i>
                            </div>
                            <div>
                                <h3>{{ $service->title ?? '' }}</h3>
                                <p>{{ $service->short_desc ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

    @endif

    @elseif($section->name == 'Plans')

    @if($plans)

    <section id="pricing" class="pricing section light-background">

      <div class="container section-title" data-aos="fade-up">
        <p>Plans</p>
        <h2>Pricing Table</h2>
      </div>

      <div class="container">
        <div class="row gy-4">
          @foreach($plans as $index => $plan)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
              <div class="pricing-item {{ $plan->is_recommended ? 'recommended' : '' }}">
                @if($plan->is_recommended)
                  <span class="recommended-badge">Recommended</span>
                @endif
                <h3>{{ $plan->name }}</h3>
                <h4><sup>£</sup>{{ $plan->amount }}<span> / month</span></h4>

                <ul>
                  @foreach($plan->included_features ?? [] as $feature)
                    <li>{{ $feature }}</li>
                  @endforeach

                  @foreach($plan->excluded_features ?? [] as $feature)
                    <li class="na">{{ $feature }}</li>
                  @endforeach
                </ul>

                <div class="btn-wrap">
                    <a href="{{ route('checkout', $plan->id) }}" class="btn-buy">Buy Now</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

    </section>

    @endif
    
    @elseif($section->name == 'Testimonial')

    @if($reviews)

    <section id="testimonials" class="testimonials section">
      <div class="container section-title" data-aos="fade-up">
        <p>Happy Customers</p>
        <h2>Testimonials</h2>
      </div>

      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 40
                    },
                    "1200": {
                      "slidesPerView": 1,
                      "spaceBetween": 1
                    }
                  }
                }
              </script>
              <div class="swiper-wrapper">
                  @foreach($reviews as $review)
                  <div class="swiper-slide">
                      <div class="testimonial mx-auto">
                          <figure class="img-wrap">
                              <img src="{{ asset('images/client-reviews/'.$review->image) }}" 
                                  alt="{{ $review->name ?? '' }}" class="img-fluid">
                          </figure>
                          <h3 class="name">{{ $review->name ?? '' }}</h3>
                          <blockquote>
                              <p>{{ $review->review ?? '' }}</p>
                          </blockquote>
                      </div>
                  </div>
                  @endforeach
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @endif

    @endif

    @endforeach

@endsection

@section('script')
  @if(session('subscription_success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Subscription Successful',
        text: 'Your subscription request has been sent. Thank you!',
        confirmButtonText: 'OK'
      });
    </script>
  @endif
  @if(session('subscription_cancel'))
    <script>
      Swal.fire({
        icon: 'warning',
        title: 'Payment Cancelled',
        text: 'Your payment was not completed. Please try again.',
        confirmButtonText: 'OK'
      });
    </script>
  @endif
@endsection