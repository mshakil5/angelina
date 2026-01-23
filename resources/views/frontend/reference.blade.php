@extends('frontend.layouts.master')

@section('content')
<style>
    :root {
        --primary-color: #0b2540;
        --accent-color: #1a73e8;
        --error-color: #dc3545;
        --bg-light: #f8fbff;
        --border-color: #e0e6ed;
    }

    .breadcrumb-section {
        background-size: cover;
        background-position: center;
        min-height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        background-image: url('{{ asset("resources/frontend/images/page-banner2.jpg") }}');
    }

    .page-hero {
        background: var(--bg-light);
        padding: 60px 0;
    }

    .reference-container {
        max-width: 900px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.05);
        padding: 40px;
        border: 1px solid var(--border-color);
    }

    .form-header {
        border-bottom: 2px solid #f0f0f0;
        margin-bottom: 35px;
        padding-bottom: 20px;
    }

    .form-header h1 {
        color: var(--primary-color);
        font-weight: 800;
        font-size: 1.8rem;
        margin-bottom: 5px;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--accent-color);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
        margin: 30px 0 20px 0;
    }

    .section-title::after {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .form-group-custom {
        margin-bottom: 1.5rem;
    }

    .form-group-custom label {
        display: block;
        font-weight: 600;
        color: #444;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }

    .form-group-custom label span {
        color: var(--error-color);
    }

    .form-control-custom {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        transition: all 0.2s;
        background-color: #fff;
    }

    .form-control-custom:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 4px rgba(26, 115, 232, 0.1);
        outline: none;
    }

    .capacity-toggle {
        background: #f1f3f5;
        padding: 5px;
        border-radius: 10px;
        display: inline-flex;
        width: 100%;
    }

    .capacity-toggle input[type="radio"] {
        display: none;
    }

    .capacity-toggle label {
        flex: 1;
        text-align: center;
        padding: 10px;
        cursor: pointer;
        border-radius: 8px;
        margin-bottom: 0;
        transition: 0.3s;
        font-weight: 600;
        color: #666;
    }

    .capacity-toggle input[type="radio"]:checked + label {
        background: #fff;
        color: var(--accent-color);
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .safeguarding-box {
        background: #fff5f5;
        border: 1px solid #ffe3e3;
        padding: 20px;
        border-radius: 12px;
        margin-top: 20px;
    }

    .btn-submit-pro {
        background: var(--primary-color);
        color: #fff;
        border: none;
        padding: 16px;
        border-radius: 8px;
        font-weight: 700;
        width: 100%;
        transition: transform 0.2s, background 0.2s;
        margin-top: 20px;
    }

    .btn-submit-pro:hover {
        background: #143a63;
        transform: translateY(-2px);
    }

    .signature-area {
        border: 1px dashed #cbd5e0;
        padding: 20px;
        border-radius: 8px;
        background: #fcfcfc;
    }
</style>

<section class="breadcrumb-section text-center text-white">
    <div class="container">
        <h2 class="fw-bold">Employee Reference</h2>
        <p>Angelina's Day Care Limited</p>
    </div>
</section>

<div class="page-hero">
    <div class="container">
        <div class="reference-container">
            <div class="form-header">
                <h1>Reference Request Form</h1>
                <p class="text-muted">Ensuring a safe and nurturing environment for every child.</p>
            </div>

            {{-- @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4">{{ session('success') }}</div>
            @endif --}}

            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4 d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2"></i> 
                    <div>
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger shadow-sm mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('referenceStore') }}" method="POST" id="mainRefForm">
                @csrf

                <div class="section-title">1. Candidate Details</div>
                <div class="row">
                    <div class="col-md-6 form-group-custom">
                        <label>Candidate First Name <span>*</span></label>
                        <input type="text" name="candidate_first" class="form-control-custom" required>
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>Candidate Last Name <span>*</span></label>
                        <input type="text" name="candidate_last" class="form-control-custom" required>
                    </div>
                </div>

                <div class="section-title">2. Referee Information</div>
                <div class="row">
                    <div class="col-md-6 form-group-custom">
                        <label>Your Full Name <span>*</span></label>
                        <input type="text" name="referee_name" class="form-control-custom" placeholder="First & Last Name" required>
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>Email Address <span>*</span></label>
                        <input type="email" name="referee_email" class="form-control-custom" required>
                    </div>
                    <div class="col-md-12 form-group-custom">
                        <label>Company / Organisation</label>
                        <input type="text" name="referee_company" class="form-control-custom">
                    </div>
                    <div class="col-md-12 form-group-custom">
                        <label>Organisation Address</label>
                        <textarea name="org_address" class="form-control-custom" rows="2"></textarea>
                    </div>
                </div>

                <div class="section-title">3. Relationship to Candidate</div>
                <div class="form-group-custom">
                    <label>In what capacity do you know the candidate? <span>*</span></label>
                    <div class="capacity-toggle">
                        <input type="radio" name="relationship_type" value="Employer" id="cap_emp" checked>
                        <label for="cap_emp">Former Employer</label>
                        
                        <input type="radio" name="relationship_type" value="Colleague" id="cap_col">
                        <label for="cap_col">Colleague / Professional</label>
                    </div>
                </div>

                <div id="employer_section">
                    <div class="row">
                        <div class="col-md-6 form-group-custom">
                            <label>Employment Start Date</label>
                            <input type="date" name="start_date" class="form-control-custom">
                        </div>
                        <div class="col-md-6 form-group-custom">
                            <label>Employment End Date</label>
                            <input type="date" name="end_date" class="form-control-custom">
                        </div>
                        <div class="col-md-12 form-group-custom">
                            <label>Position Held</label>
                            <input type="text" name="position" class="form-control-custom">
                        </div>
                        <div class="col-md-4 form-group-custom">
                            <label>Timekeeping</label>
                            <select name="timekeeping_standard" class="form-control-custom">
                                <option value="Good">Good</option>
                                <option value="Average">Average</option>
                                <option value="Poor">Poor</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group-custom">
                            <label>Attendance</label>
                            <select name="attendance_standard" class="form-control-custom">
                                <option value="Good">Good</option>
                                <option value="Average">Average</option>
                                <option value="Poor">Poor</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group-custom">
                            <label>Sick Days (Last 2yrs)</label>
                            <input type="number" name="sick_days" class="form-control-custom">
                        </div>
                    </div>
                </div>

                <div id="colleague_section" style="display:none;">
                    <div class="form-group-custom">
                        <label>Character Assessment <span>*</span></label>
                        <textarea name="character_assessment" class="form-control-custom" rows="3" placeholder="Describe their professional character..."></textarea>
                    </div>
                </div>

                <div class="section-title">4. Safeguarding & Suitability</div>
                <div class="safeguarding-box">
                    <div class="row">
                        <div class="col-md-12 form-group-custom">
                            <label>Do you have any concerns about their suitability to work with children? <span>*</span></label>
                            <select name="suitability_children" id="suit_select" class="form-control-custom" required>
                                <option value="No">No - I have no concerns</option>
                                <option value="Yes">Yes - I have concerns</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group-custom" id="suit_details" style="display:none;">
                            <label>Please provide details of concerns <span>*</span></label>
                            <textarea name="suitability_details" class="form-control-custom" rows="3"></textarea>
                        </div>
                        <div class="col-md-12 form-group-custom">
                            <label>Would you re-employ this person? <span>*</span></label>
                            <select name="re_employ" class="form-control-custom" required>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="section-title">5. Declaration</div>
                <div class="signature-area">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="sig_tick" id="confirm_tick" required>
                        <label class="form-check-label small fw-bold" for="confirm_tick">
                            I confirm that the information provided is accurate to the best of my knowledge.
                        </label>
                    </div>
                    <div class="form-group-custom mb-0">
                        <label>Digital Signature (Type Full Name) <span>*</span></label>
                        <input type="text" name="digital_signature" class="form-control-custom" placeholder="E-Signature" required>
                    </div>
                </div>

                <button type="submit" class="btn-submit-pro">Submit Secure Reference</button>
                <p class="text-center mt-3 small text-muted">Protected by Data Privacy Regulations</p>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Toggle Relationship Sections: Employer vs Colleague
        $('input[name="relationship_type"]').change(function() {
            if ($(this).val() === 'Employer') {
                $('#employer_section').fadeIn();
                $('#colleague_section').hide();
            } else {
                $('#employer_section').hide();
                $('#colleague_section').fadeIn();
            }
        });

        // Toggle Safeguarding Details based on 'Yes' selection
        $('#suit_select').change(function() {
            if ($(this).val() === 'Yes') {
                $('#suit_details').fadeIn();
                $('#suit_details textarea').attr('required', true);
            } else {
                $('#suit_details').hide();
                $('#suit_details textarea').removeAttr('required');
            }
        });

        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    });
</script>
@endsection