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
        margin-bottom: .5rem;
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
        padding: 6px 9px;
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
                        <input type="text" name="candidate_first" class="form-control-custom" value="{{ old('candidate_first') }}" required>
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>Candidate Last Name <span>*</span></label>
                        <input type="text" name="candidate_last" class="form-control-custom" value="{{ old('candidate_last') }}" required>
                    </div>
                </div>

                <div class="section-title">2. Referee Information</div>
                <div class="row">
                    <div class="col-md-6 form-group-custom">
                        <label>First Name <span>*</span></label>
                        <input type="text" name="referee_first" class="form-control-custom" placeholder="First  Name" value="{{ old('referee_first') }}" required>
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>Last Name <span>*</span></label>
                        <input type="text" name="referee_last" class="form-control-custom" placeholder="Last Name" value="{{ old('referee_last') }}" required>
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>Submission Date</label>
                        <input type="date" name="submission_date" class="form-control-custom" value="{{ old('submission_date') }}">
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>Email Address <span>*</span></label>
                        <input type="email" name="referee_email" class="form-control-custom" value="{{ old('referee_email') }}" required>
                    </div>
                    <div class="col-md-12 form-group-custom">
                        <label>Company / Organisation</label>
                        <input type="text" name="referee_company" class="form-control-custom" value="{{ old('referee_company') }}">
                    </div>
                    {{-- <div class="col-md-12 form-group-custom">
                        <label>Organisation Address</label>
                        <textarea name="org_address" class="form-control-custom" rows="2">{{ old('org_address') }}</textarea>
                    </div> --}}
                    <div class="col-md-12 form-group-custom">
                        <label>Street </label>
                        <input type="text" name="street" class="form-control-custom" value="{{ old('street') }}">
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>City</label>
                        <input type="text" name="city" class="form-control-custom" value="{{ old('city') }}">
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>State / Region</label>
                        <input type="text" name="state_region" class="form-control-custom" value="{{ old('state_region') }}">
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>ZIP / Postal Code</label>
                        <input type="text" name="zip_code" class="form-control-custom" value="{{ old('zip_code') }}">
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control-custom" value="{{ old('country') }}">
                    </div>
                    <div class="col-md-12 form-group-custom">
                        <label>Telephone Number</label>
                        <input type="tel" name="phone" class="form-control-custom" value="{{ old('phone') }}">
                    </div>
                </div>

                <div class="section-title">3. Relationship to Candidate</div>
                <div class="form-group-custom">
                    <label>In what capacity do you know the candidate? <span>*</span></label>
                    <div class="capacity-toggle">
                        <input type="radio" name="relationship_type" value="Employer" id="cap_emp" {{ old('relationship_type', 'Employer') == 'Employer' ? 'checked' : '' }}>
                        <label for="cap_emp">Former Employer</label>
                        <input type="radio" name="relationship_type" value="Colleague" id="cap_col" {{ old('relationship_type', 'Employer') == 'Colleague' ? 'checked' : '' }}>
                        <label for="cap_col">Colleague / Professional</label>
                    </div>
                </div>

                <div id="employer_section">
                    <div class="row">
                        <div class="col-md-6 form-group-custom">
                            <label>Acquaintance Duration</label>
                            <input type="text" name="acquaintance_duration" class="form-control-custom" value="{{ old('acquaintance_duration') }}">
                        </div>
                        <div class="col-md-6 form-group-custom">
                            <label>Capacity of Relationship</label>
                            <input type="text" name="relationship_capacity" class="form-control-custom" value="{{ old('relationship_capacity') }}">
                        </div>
                        <div class="col-md-12 form-group-custom">
                            <label> Employment Details </label>
                            <input type="text" name="employment_details" class="form-control-custom" value="{{ old('employment_details') }}">
                        </div>
                        <div class="col-md-6 form-group-custom">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control-custom" value="{{ old('start_date') }}">
                        </div>
                        <div class="col-md-6 form-group-custom">
                            <label>End Date</label>
                            <input type="date" name="end_date" class="form-control-custom" value="{{ old('end_date') }}">
                        </div>
                        <div class="col-md-6 form-group-custom">
                            <label>Position Held</label>
                            <input type="text" name="position" class="form-control-custom" value="{{ old('position') }}">
                        </div>
                        <div class="col-md-6 form-group-custom">
                            <label>Final Salary</label>
                            <input type="text" name="final_salary" class="form-control-custom" value="{{ old('final_salary') }}">
                        </div>
                        <div class="col-md-12 form-group-custom">
                            <label>Role and Responsibilities</label>
                            <textarea name="roles_responsibilities" class="form-control-custom" rows="3">{{ old('roles_responsibilities') }}</textarea>
                        </div>
                        <div class="col-md-12 form-group-custom">
                            <label>Reason for Leaving</label>
                            <input type="text" name="reason_for_leaving" class="form-control-custom" value="{{ old('reason_for_leaving') }}">
                        </div>
                        <div class="col-md-12 form-group-custom">
                            <label>Performance and conduct</label>
                            <input type="text" name="performance_and_conduct" class="form-control-custom" value="{{ old('performance_and_conduct') }}">
                        </div>
                        <div class="col-md-4 form-group-custom">
                            <label>Timekeeping</label>
                            <select name="timekeeping_standard" class="form-control-custom">
                                <option value="Good" {{ old('timekeeping_standard') == 'Good' ? 'selected' : '' }}>Good</option>
                                <option value="Yes" {{ old('timekeeping_standard') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('timekeeping_standard') == 'No' ? 'selected' : '' }}>No</option>
                                <option value="Sometimes" {{ old('timekeeping_standard') == 'Sometimes' ? 'selected' : '' }}>Sometimes</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group-custom">
                            <label>Attendance</label>
                            <select name="attendance_standard" class="form-control-custom">
                                <option value="Good" {{ old('attendance_standard') == 'Good' ? 'selected' : '' }}>Good</option>
                                <option value="Yes" {{ old('attendance_standard') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('attendance_standard') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group-custom">
                            <label>Sick Days (2yrs)</label>
                            <input type="number" name="sick_days" class="form-control-custom" value="{{ old('sick_days') }}">
                        </div>
                        <div class="col-md-12 form-group-custom">
                            <label>Job Criteria Meeting</label>
                            <textarea name="job_criteria" class="form-control-custom" rows="2">{{ old('job_criteria') }}</textarea>
                        </div>
                    </div>
                </div>

                <div id="colleague_section" style="display:none;">
                    <div class="row">
                        <div class="col-md-6 form-group-custom">
                            <label>How you know them individual</label>
                            <input type="text" name="how_known" class="form-control-custom" value="{{ old('how_known') }}">
                        </div>
                        <div class="col-md-6 form-group-custom">
                            <label>Capacity in which you know them</label>
                            <input type="text" name="relationship_capacity_col" class="form-control-custom" value="{{ old('relationship_capacity_col') }}">
                        </div>
                        <div class="col-md-12 form-group-custom">
                            <label>Character Assessment <span>*</span></label>
                            <textarea name="character_assessment" class="form-control-custom" rows="3">{{ old('character_assessment') }}</textarea>
                        </div>
                        <div class="col-md-12 form-group-custom">
                            <label>Qualities & Characteristics</label>
                            <textarea name="qualities_characteristics" class="form-control-custom" rows="2">{{ old('qualities_characteristics') }}</textarea>
                        </div>
                        <div class="col-md-12 form-group-custom">
                            <label>Examples and Evidence</label>
                            <textarea name="examples_evidence" class="form-control-custom" rows="2">{{ old('examples_evidence') }}</textarea>
                        </div>
                        <div class="col-md-12 form-group-custom">
                            <label>Suitability for Role <span>*</span></label>
                            <textarea name="suitability_role" class="form-control-custom" rows="2">{{ old('suitability_role') }}</textarea>
                        </div>
                        <div class="col-md-12 form-group-custom">
                            <label>Overall Recommendation</label>
                            <textarea name="overall_recommendation" class="form-control-custom" rows="2">{{ old('overall_recommendation') }}</textarea>
                        </div>
                        <div class="col-md-12 form-group-custom">
                            <label>Willingness to provide further information</label>
                            <input type="text" name="further_information" class="form-control-custom" value="{{ old('further_information') }}">
                        </div>
                        <div class="col-md-6 form-group-custom">
                            <label>Referee Signature <span>*</span></label>
                            <input type="text" name="referee_signature" class="form-control-custom" value="{{ old('referee_signature') }}">
                        </div>
                        <div class="col-md-6 form-group-custom">
                            <label>Printed Name <span>*</span></label>
                            <input type="text" name="printed_name" class="form-control-custom" value="{{ old('printed_name') }}">
                        </div>
                    </div>
                </div>

                <div class="section-title">4. Safeguarding & Suitability</div>
                <div class="safeguarding-box">
                    <div class="row">
                        <div class="col-md-6 form-group-custom">
                            <label>Maintain Confidentiality? <span>*</span></label>
                            <select name="confidentiality_maintenance" id="conf_select" class="form-control-custom">
                                <option value="Yes" {{ old('confidentiality_maintenance') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('confidentiality_maintenance') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group-custom" id="conf_details" style="display:none;">
                            <label>Reasons</label>
                            <input type="text" name="confidentiality_no_reasons" class="form-control-custom" value="{{ old('confidentiality_no_reasons') }}">
                        </div>

                        <div class="col-md-6 form-group-custom">
                            <label>Disciplinary Procedures? <span>*</span></label>
                            <select name="disciplinary_procedures" id="disc_select" class="form-control-custom">
                                <option value="No" {{ old('disciplinary_procedures') == 'No' ? 'selected' : '' }}>No</option>
                                <option value="Yes" {{ old('disciplinary_procedures') == 'Yes' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group-custom" id="disc_details" style="display:none;">
                            <label>Details</label>
                            <input type="text" name="disciplinary_details" class="form-control-custom" value="{{ old('disciplinary_details') }}">
                        </div>

                        <div class="col-md-12 form-group-custom">
                            <label>Suitability for Early Years</label>
                            <textarea name="suitability_early_years" class="form-control-custom" rows="2">{{ old('suitability_early_years') }}</textarea>
                        </div>

                        <div class="col-md-6 form-group-custom">
                            <label>Concerns with Children? <span>*</span></label>
                            <select name="suitability_children" id="suit_select" class="form-control-custom">
                                <option value="No" {{ old('suitability_children') == 'No' ? 'selected' : '' }}>No</option>
                                <option value="Yes" {{ old('suitability_children') == 'Yes' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group-custom" id="suit_details" style="display:none;">
                            <label>Details</label>
                            <input type="text" name="suitability_details" class="form-control-custom" value="{{ old('suitability_details') }}">
                        </div>

                        <div class="col-md-6 form-group-custom">
                            <label>Should NOT work in Early Years? <span>*</span></label>
                            <select name="not_work_early_years" id="not_work_select" class="form-control-custom">
                                <option value="No" {{ old('not_work_early_years') == 'No' ? 'selected' : '' }}>No</option>
                                <option value="Yes" {{ old('not_work_early_years') == 'Yes' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group-custom" id="not_work_details" style="display:none;">
                            <label>Details</label>
                            <input type="text" name="not_work_details" class="form-control-custom" value="{{ old('not_work_details') }}">
                        </div>

                        <div class="col-md-6 form-group-custom">
                            <label>Willing to Re-employ? <span>*</span></label>
                            <select name="re_employ" id="re_employ_select" class="form-control-custom">
                                <option value="Yes" {{ old('re_employ') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('re_employ') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group-custom" id="re_employ_details" style="display:none;">
                            <label>Reasons</label>
                            <input type="text" name="re_employ_no_reasons" class="form-control-custom" value="{{ old('re_employ_no_reasons') }}">
                        </div>

                        <div class="col-md-6 form-group-custom">
                            <label>Permission to Disclose? <span>*</span></label>
                            <select name="permission_disclose" class="form-control-custom">
                                <option value="Yes" {{ old('permission_disclose') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('permission_disclose') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group-custom">
                            <label>Confirm Accuracy? <span>*</span></label>
                            <select name="accuracy_confirmation" class="form-control-custom">
                                <option value="Yes" {{ old('accuracy_confirmation') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('accuracy_confirmation') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="section-title">5. Declaration</div>
                <div class="signature-area">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="sig_tick" id="confirm_tick" {{ old('sig_tick') ? 'checked' : '' }} required>
                        <label class="form-check-label" for="confirm_tick">I confirm information is accurate.</label>
                    </div>
                    <div class="form-group-custom mb-0">
                        <label>Digital Signature (Full Name) <span>*</span></label>
                        <input type="text" name="referee_signature" class="form-control-custom" value="{{ old('referee_signature') }}" required>
                    </div>
                </div>

                <button type="submit" class="btn-submit-pro">Submit Reference</button>
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
        // Section Toggle
        $('input[name="relationship_type"]').change(function() {
            if ($(this).val() === 'Employer') {
                $('#employer_section').fadeIn();
                $('#colleague_section').hide();
            } else {
                $('#employer_section').hide();
                $('#colleague_section').fadeIn();
            }
        });

        // Universal Toggle Function
        function toggleDetail(selectId, detailId, triggerValue) {
            $(selectId).change(function() {
                if ($(this).val() === triggerValue) {
                    $(detailId).fadeIn();
                } else {
                    $(detailId).fadeOut();
                }
            });
        }

        toggleDetail('#conf_select', '#conf_details', 'No');
        toggleDetail('#disc_select', '#disc_details', 'Yes');
        toggleDetail('#suit_select', '#suit_details', 'Yes');
        toggleDetail('#not_work_select', '#not_work_details', 'Yes');
        toggleDetail('#re_employ_select', '#re_employ_details', 'No');
    });
    
</script>
@endsection