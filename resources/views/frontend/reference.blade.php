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


  
    /* page background image + soft overlay */
    .page-hero {
      background-image:
        linear-gradient(0deg, rgba(255,255,255,0.65), rgba(255,255,255,0.65));
      background-size: cover;
      background-position: center;
      padding: 60px 0;
      border-radius: 18px;
      box-shadow: 0 10px 30px rgba(16, 42, 67, 0.08);
      margin-bottom: 30px;
    }

    .page-inner {
      max-width: 1100px;
      margin: 0 auto;
      padding: 30px;
    }

    /* dotted card like demo */
    .reference-card {
      background: var(--card-bg);
      border-radius: 14px;
      padding: 26px;
      position: relative;
      overflow: visible;
      border: 3px dotted rgba(16,42,67,0.07);
      box-shadow: 0 8px 30px rgba(16,42,67,0.06);
    }

    /* decorative corner dots: produces a subtle "dot dot" look */
    .reference-card::before,
    .reference-card::after{
      content: "";
      position: absolute;
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: var(--accent);
      opacity: 0.08;
      transform: rotate(15deg);
    }
    .reference-card::before{ top: -8px; left: -8px; }
    .reference-card::after { bottom: -8px; right: -8px; }

    /* Section header */
    .ref-header {
      display:flex;
      gap:18px;
      align-items:center;
      margin-bottom:18px;
    }
    .ref-title{
      font-size:1.5rem;
      font-weight:700;
      margin:0;
      color:#0b2540;
    }
    .ref-sub {
      color:var(--muted);
      font-size:.95rem;
      margin:0;
    }

    /* Floating labels style */
    .form-floating-custom {
      position: relative;
      margin-bottom: 1rem;
    }
    .form-floating-custom input,
    .form-floating-custom textarea,
    .form-floating-custom select{
      padding: 1.05rem .9rem .35rem .9rem;
      border-radius: 8px;
      border: 1px solid rgba(16,42,67,0.08);
      background: #fff;
      width:100%;
      transition: border-color .18s, box-shadow .18s;
      box-shadow: none;
    }
    .form-floating-custom label {
      position: absolute;
      left: 12px;
      top: 10px;
      font-size: .92rem;
      color: var(--muted);
      transition: transform .16s ease, font-size .16s ease, top .16s ease;
      pointer-events: none;
      background: transparent;
      padding: 0 6px;
    }
    .form-floating-custom input:focus,
    .form-floating-custom textarea:focus,
    .form-floating-custom select:focus{
      outline: none;
      border-color: #72d672;
      box-shadow: 0 6px 18px rgba(233,30,99,0.06);
    }
    .form-floating-custom input:not(:placeholder-shown) + label,
    .form-floating-custom textarea:not(:placeholder-shown) + label,
    .form-floating-custom select:not([value=""]) + label,
    .form-floating-custom input:focus + label,
    .form-floating-custom textarea:focus + label,
    .form-floating-custom select:focus + label {
      transform: translateY(-48%) scale(.92);
      top: 6px;
      font-size: .78rem;
      color: rgba(11,37,64,0.8);
      background: var(--card-bg);
    }

    /* textarea autosize look */
    textarea.form-control { min-height:110px; max-height:420px; resize: vertical; }

    /* two column subtle divider */
    .two-col {
      display:flex;
      gap:22px;
    }
    @media (max-width: 767px){ .two-col { flex-direction: column; } }

    /* small helper */
    .muted { color:var(--muted); font-size:.95rem; }

    /* submit button with spinner */
    .btn-submit{
      background: linear-gradient(90deg,var(--accent), #d81b60);
      border: none;
      color:white;
      padding: 0.8rem 1.2rem;
      border-radius: 10px;
      font-weight:600;
      box-shadow: 0 8px 18px rgba(233,30,99,0.12);
    }

    .btn-submit:disabled{ opacity:.7; cursor:not-allowed; }

    /* small responsiveness tweaks */
    .small-note { font-size:.9rem; color:var(--muted); margin-top:10px; }

    .is-invalid {
      border-color: #dc3545 !important;
      box-shadow: 0 0 0 .1rem rgba(220,53,69,.25);
    }

 

</style>


<section class="breadcrumb-section text-center text-white d-flex align-items-center justify-content-center" style="background-image: url({{ asset('resources/frontend/images/page-banner2.jpg') }});">
  <div class="container">
    <h1 class="breadcrumb-title mb-3">Job</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active text-white" aria-current="page">Job</li>
      </ol>
    </nav>
  </div>
</section>


<section>
  <div class="page-hero">
    <div class="page-inner">
      <div class="reference-card">
        <div class="ref-header">
          <div>
            <h1 class="ref-title">Reference Request Form</h1>
            <p class="ref-sub">Please complete the form below. All fields with * are required.</p>
          </div>
        </div>

        <form id="referenceForm">
          @csrf
          <div class="row g-3">
            <!-- Candidate -->
            <div class="col-md-6">
              <div class="form-floating-custom">
                <input type="text" id="candidate_first" name="candidate_first" class="form-control" placeholder=" " required>
                <label for="candidate_first">Candidate First Name *</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating-custom">
                <input type="text" id="candidate_last" name="candidate_last" class="form-control" placeholder=" " required>
                <label for="candidate_last">Candidate Last Name *</label>
              </div>
            </div>

            <!-- Referee name -->
            <div class="col-md-6">
              <div class="form-floating-custom">
                <input type="text" id="referee_first" name="referee_first" class="form-control" placeholder=" " required>
                <label for="referee_first">Referee First Name *</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating-custom">
                <input type="text" id="referee_last" name="referee_last" class="form-control" placeholder=" " required>
                <label for="referee_last">Referee Last Name *</label>
              </div>
            </div>

            <!-- email + company -->
            <div class="col-md-6">
              <div class="form-floating-custom">
                <input type="email" id="referee_email" name="referee_email" class="form-control" placeholder=" " required>
                <label for="referee_email">Referee Email *</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating-custom">
                <input type="text" id="referee_company" name="referee_company" class="form-control" placeholder=" ">
                <label for="referee_company">Company / Organisation</label>
              </div>
            </div>

            <!-- address split -->
            <div class="col-12">
              <div class="form-floating-custom">
                <input type="text" id="org_address" name="org_address" class="form-control" placeholder=" ">
                <label for="org_address">Organisation Address</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating-custom">
                <input type="text" id="city" name="city" class="form-control" placeholder=" ">
                <label for="city">City</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating-custom">
                <input type="text" id="county" name="county" class="form-control" placeholder=" ">
                <label for="county">County</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating-custom">
                <input type="text" id="postcode" name="postcode" class="form-control" placeholder=" ">
                <label for="postcode">Post Code</label>
              </div>
            </div>

            <!-- country + phone -->
            <div class="col-md-6">
              <div class="form-floating-custom">
                <select id="country" name="country" class="form-control" required>
                  <option value=""> </option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="United States">United States</option>
                  <option value="Other">Other</option>
                </select>
                <label for="country">Country *</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating-custom">
                <input type="tel" id="phone" name="phone" class="form-control" placeholder=" ">
                <label for="phone">Telephone Number</label>
              </div>
            </div>

            <!-- relationship and textareas (two column on larger screens) -->
            <div class="col-12">
              <div class="form-floating-custom">
                <input type="text" id="relationship" name="relationship" class="form-control" placeholder=" ">
                <label for="relationship">What is/was your relationship to the applicant? *</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating-custom">
                <input type="date" id="start_date" name="start_date" class="form-control" placeholder=" ">
                <label for="start_date">Employment Start Date</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating-custom">
                <input type="date" id="end_date" name="end_date" class="form-control" placeholder=" ">
                <label for="end_date">Employment End Date</label>
              </div>
            </div>

            <div class="col-12">
              <div class="form-floating-custom">
                <input type="text" id="position" name="position" class="form-control" placeholder=" ">
                <label for="position">Position Held</label>
              </div>
            </div>

            <div class="col-12">
              <div class="form-floating-custom">
                <textarea id="role_responsibilities" name="role_responsibilities" class="form-control" placeholder=" " rows="4"></textarea>
                <label for="role_responsibilities">Role and Responsibilities</label>
              </div>
            </div>

            <div class="col-12">
              <div class="form-floating-custom">
                <textarea id="reason_leaving" name="reason_leaving" class="form-control" placeholder=" " rows="3"></textarea>
                <label for="reason_leaving">Reason for leaving and final salary</label>
              </div>
            </div>

            <div class="col-12">
              <div class="form-floating-custom">
                <textarea id="criteria" name="criteria" class="form-control" placeholder=" " rows="4" required></textarea>
                <label for="criteria">How well does the candidate meet the criteria? *</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating-custom">
                <input type="text" id="sick_days" name="sick_days" class="form-control" placeholder=" ">
                <label for="sick_days">Sick Days in Last 2 Years</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating-custom">
                <select id="permission_disclose" name="permission_disclose" class="form-control" required>
                  <option value=""> </option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
                <label for="permission_disclose">Permission to disclose details to applicant? *</label>
              </div>
            </div>

            <!-- suitability and disciplinary -->
            <div class="col-md-6">
              <div class="form-floating-custom">
                <select id="disciplinary" name="disciplinary" class="form-control" required>
                  <option value=""> </option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
                <label for="disciplinary">Formal disciplinary procedures? *</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating-custom">
                <select id="suitability" name="suitability" class="form-control" required>
                  <option value=""> </option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
                <label for="suitability">Any concerns about suitability to work with children? *</label>
              </div>
            </div>

            <div class="col-12">
              <div class="form-floating-custom">
                <textarea id="suitability_details" name="suitability_details" class="form-control" placeholder=" " rows="3"></textarea>
                <label for="suitability_details">If yes, please provide details</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating-custom">
                <select id="re_employ" name="re_employ" class="form-control" required>
                  <option value=""> </option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
                <label for="re_employ">Would you re-employ the applicant? *</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating-custom">
                <select id="accuracy" name="accuracy" class="form-control" required>
                  <option value=""> </option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
                <label for="accuracy">Information accuracy confirmation *</label>
              </div>
            </div>

            <!-- submit row -->
            <div class="col-12 d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
              <div>
                <small class="small-note">All personal data will be handled in accordance with our privacy policy.</small>
              </div>

              <div>
                <button type="button" class="btn btn-submit" id="submitBtn">
                  <span id="btnLabel">Submit Reference</span>
                  <span id="btnSpinner" class="spinner-border spinner-border-sm ms-2" role="status" style="display:none" aria-hidden="true"></span>
                </button>
              </div>
            </div>
          </div><!-- row -->
        </form>

      </div><!-- card -->
    </div><!-- inner -->
  </div><!-- hero -->
</section>

@endsection

@section('script')
<script src="{{ asset('resources/admin/js/jquery.min.js')}}"></script>
<script>
$(document).ready(function () {

  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
  });

  $('#submitBtn').on('click', function(e){
    e.preventDefault();

    // 🔹 Step 1: Clear old alerts
    $('.alert').remove();

    // 🔹 Step 2: Client-side validation
    let isValid = true;
    let firstError = null;

    // List of required fields
    const requiredFields = [
      '#candidate_first',
      '#candidate_last',
      '#referee_first',
      '#referee_last',
      '#referee_email',
      '#country',
      '#relationship',
      '#criteria',
      '#permission_disclose',
      '#disciplinary',
      '#suitability',
      '#re_employ',
      '#accuracy'
    ];

    requiredFields.forEach(function(selector) {
      const field = $(selector);
      const value = field.val()?.trim();

      // Reset any previous error state
      field.removeClass('is-invalid');

      if (!value) {
        isValid = false;
        field.addClass('is-invalid');

        // Store first invalid field for focus/scroll
        if (!firstError) firstError = field;
      }
    });

    // Email format validation
    const emailField = $('#referee_email');
    const emailValue = emailField.val()?.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailValue && !emailPattern.test(emailValue)) {
      isValid = false;
      emailField.addClass('is-invalid');
      if (!firstError) firstError = emailField;
    }

    if (!isValid) {
      $('.reference-card').prepend(`
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Please fill in all required fields correctly before submitting.
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      `);
      // Smooth scroll to first invalid field
      $('html, body').animate({
        scrollTop: firstError.offset().top - 120
      }, 600);
      return; // stop ajax submission
    }

    // 🔹 Step 3: AJAX submission
    var form_data = new FormData($('#referenceForm')[0]);

    $.ajax({
      url: "{{ route('referenceStore') }}",
      method: "POST",
      data: form_data,
      processData: false,
      contentType: false,
      beforeSend: function() {
        $('#submitBtn').prop('disabled', true);
        $('#btnSpinner').show();
        $('#btnLabel').text('Submitting...');
      },
      success: function(res){
        console.log(res);
        $('.reference-card').prepend(`
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            ${res.message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        `);
        $('#referenceForm')[0].reset();
        pageTop();
      },
      error: function(err){
        $('.reference-card').prepend(`
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Error submitting form. Please try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        `);
        pageTop();
      },
      complete: function() {
        $('#submitBtn').prop('disabled', false);
        $('#btnSpinner').hide();
        $('#btnLabel').text('Submit Reference');
      }
    });
  });

  // 🔹 Smooth scroll helper
  function pageTop() {
    window.scrollTo({
      top: 130,
      behavior: 'smooth',
    });
  }


  const requiredFields = [
    '#candidate_first',
    '#candidate_last',
    '#referee_first',
    '#referee_last',
    '#referee_email',
    '#country',
    '#relationship',
    '#criteria',
    '#permission_disclose',
    '#disciplinary',
    '#suitability',
    '#re_employ',
    '#accuracy'
  ];

  // Remove 'is-invalid' class when user starts typing or changes field value
  requiredFields.forEach(function(selector) {
    $(document).on('input change', selector, function() {
      if ($(this).val().trim() !== '') {
        $(this).removeClass('is-invalid');
      }
    });
  });

});
</script>
@endsection
