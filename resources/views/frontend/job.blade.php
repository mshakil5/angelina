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


  /* ===== JOB PAGE STYLE ===== */
    .job {
      font-family: 'Poppins', sans-serif;
      color: #333;
    }

    .job .job-filter {
      background: #f9f9f9;
      padding: 40px 20px;
      border-radius: 10px;
      margin-bottom: 50px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .job .job-filter h2 {
      font-weight: 600;
      margin-bottom: 30px;
    }

    .job .job-filter select,
    .job .job-filter input {
      border-radius: 8px;
    }

    .job .job-listings {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .job .job-item {
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      text-decoration: none;
      color: #333;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
    }

    .job .job-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .job .job-item h4 {
      font-size: 18px;
      font-weight: 600;
    }

    .job .job-item .more {
      color: #e91e63;
      font-weight: 500;
      font-size: 14px;
      margin-top: 10px;
      display: inline-block;
    }

    /* ===== Join Us Section ===== */
    .job .join-section {
      padding: 60px 0;
      background-color: #fce4ec;
      border-radius: 10px;
      margin-top: 60px;
    }

    .job .join-section h2 {
      font-size: 2.2rem;
      font-weight: 700;
      color: #333;
    }

    /* ===== Footer Section ===== */
    .job .footer {
      background: #333;
      color: #fff;
      padding: 60px 0 20px;
    }

    .job .footer h4 {
      font-weight: 600;
      margin-bottom: 20px;
    }

    .job .footer a {
      color: #fff;
      text-decoration: none;
    }

    .job .footer a:hover {
      text-decoration: underline;
      color: #ffc107;
    }

    .job .footer .footer-info i {
      color: #ffc107;
      margin-right: 10px;
    }


</style>

@php
    $bgImage = $banner && $banner->feature_image
        ? asset('images/banner/' . $banner->feature_image)
        : asset('resources/frontend/images/page-banner2.jpg');
@endphp


<section class="breadcrumb-section text-center text-white d-flex align-items-center justify-content-center"
    style="background-image: url('{{ $bgImage }}');">
  <div class="container d-none">
    <h1 class="breadcrumb-title mb-3">Job</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active text-white" aria-current="page">Job</li>
      </ol>
    </nav>
  </div>
</section>


<div class="job">

  <!-- ===== Job Filter Section ===== -->
  <section class="job-filter container text-center">
    <h2>Current Job Openings</h2>

    <form id="jobFilterForm" class="row g-3 justify-content-center">
      <div class="col-md-4">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search jobs...">
      </div>

      <div class="col-md-3">
        <select name="category" id="category" class="form-select">
          <option selected>All Job Categories</option>
          @foreach($categories as $cat)
            <option>{{ $cat }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-md-3">
        <select name="location" id="location" class="form-select">
          <option selected>All Locations</option>
          @foreach($locations as $loc)
            <option>{{ $loc }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-md-2">
        <button type="submit" class="btn btn-dark w-100">Filter</button>
      </div>
    </form>
  </section>

  <!-- ===== Job Listings Section ===== -->
  <section class="container mb-5">
    <div id="jobList" class="job-listings">
      <p class="text-center">Loading jobs...</p>
    </div>
  </section>

  <!-- ===== Join Section ===== -->
  <section class="join-section text-center container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <h2>Come on,<br> join with us!</h2>
      </div>
      <div class="col-md-6">
        <img src="{{ asset('resources/frontend/images/job.png') }}"
             alt="Join Us" class="img-fluid rounded shadow">
      </div>
    </div>
  </section>
</div>





@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {

    function loadJobs(filters = {}) {
        // Build query string
        let query = Object.keys(filters).map(key => encodeURIComponent(key) + '=' + encodeURIComponent(filters[key])).join('&');
        let url = '{{ route("jobs.filter") }}' + (query ? '?' + query : '');

        // Show loading
        document.getElementById('jobList').innerHTML = '<p class="text-center">Loading jobs...</p>';

        fetch(url)
            .then(response => response.json())
            .then(data => {
                document.getElementById('jobList').innerHTML = data.html;
            })
            .catch(() => {
                document.getElementById('jobList').innerHTML = '<p class="text-center text-danger">Error loading jobs.</p>';
            });
    }

    // Initial load without filters
    loadJobs();

    // Filter form submit
    document.getElementById('jobFilterForm').addEventListener('submit', function(e) {
        e.preventDefault();
        let form = e.target;
        let filters = {};
        Array.from(form.elements).forEach(el => {
            if (el.name && el.value) {
                filters[el.name] = el.value;
            }
        });
        loadJobs(filters);
    });

});
</script>

@endsection