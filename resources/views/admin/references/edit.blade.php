@extends('admin.master')
@section('title', 'Edit Reference')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1>Edit Reference Submission</h1></div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('reference.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <form action="{{ route('reference.update', $reference->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Section 1: Candidate --}}
            <div class="card card-outline card-primary">
                <div class="card-header"><h3 class="card-title">1. Candidate Details</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Candidate First Name</label>
                            <input type="text" name="candidate_first" class="form-control" value="{{ old('candidate_first', $reference->candidate_first) }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Candidate Last Name</label>
                            <input type="text" name="candidate_last" class="form-control" value="{{ old('candidate_last', $reference->candidate_last) }}" required>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 2: Referee --}}
            <div class="card card-outline card-primary">
                <div class="card-header"><h3 class="card-title">2. Referee Information</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form-group"><label>First Name</label><input type="text" name="referee_first" class="form-control" value="{{ old('referee_first', $reference->referee_first) }}"></div>
                        <div class="col-md-4 form-group"><label>Last Name</label><input type="text" name="referee_last" class="form-control" value="{{ old('referee_last', $reference->referee_last) }}"></div>
                        <div class="col-md-4 form-group"><label>Email</label><input type="email" name="referee_email" class="form-control" value="{{ old('referee_email', $reference->referee_email) }}"></div>
                        
                        <div class="col-md-6 form-group"><label>Company</label><input type="text" name="referee_company" class="form-control" value="{{ old('referee_company', $reference->referee_company) }}"></div>
                        <div class="col-md-6 form-group"><label>Telephone</label><input type="tel" name="phone" class="form-control" value="{{ old('phone', $reference->phone) }}"></div>
                        
                        <div class="col-md-12 form-group"><label>Organisation Address</label><textarea name="org_address" class="form-control" rows="2">{{ old('org_address', $reference->org_address) }}</textarea></div>
                        <div class="col-md-12 form-group"><label>Street Address</label><input type="text" name="street" class="form-control" value="{{ old('street', $reference->street) }}"></div>
                        
                        <div class="col-md-3 form-group"><label>City</label><input type="text" name="city" class="form-control" value="{{ old('city', $reference->city) }}"></div>
                        <div class="col-md-3 form-group"><label>State</label><input type="text" name="state_region" class="form-control" value="{{ old('state_region', $reference->state_region) }}"></div>
                        <div class="col-md-3 form-group"><label>Zip Code</label><input type="text" name="zip_code" class="form-control" value="{{ old('zip_code', $reference->zip_code) }}"></div>
                        <div class="col-md-3 form-group"><label>Country</label><input type="text" name="country" class="form-control" value="{{ old('country', $reference->country) }}"></div>
                    </div>
                </div>
            </div>

            {{-- Section 3: Relationship --}}
            <div class="card card-outline card-primary">
                <div class="card-header"><h3 class="card-title">3. Relationship Details</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="d-block">Capacity</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="cap_emp" name="relationship_type" value="Employer" class="custom-control-input" {{ old('relationship_type', $reference->relationship_type) == 'Employer' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="cap_emp">Former Employer</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="cap_col" name="relationship_type" value="Colleague" class="custom-control-input" {{ old('relationship_type', $reference->relationship_type) == 'Colleague' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="cap_col">Colleague</label>
                        </div>
                    </div>

                    {{-- Employer Sub-section --}}
                    <div id="employer_section" style="{{ old('relationship_type', $reference->relationship_type) == 'Colleague' ? 'display:none;' : '' }}">
                        <div class="row">
                            <div class="col-md-6 form-group"><label>Acquaintance Duration</label><input type="text" name="acquaintance_duration" class="form-control" value="{{ old('acquaintance_duration', $reference->acquaintance_duration) }}"></div>
                            <div class="col-md-6 form-group"><label>Capacity of Relationship</label><input type="text" name="relationship_capacity" class="form-control" value="{{ old('relationship_capacity', $reference->relationship_capacity) }}"></div>
                            
                            <div class="col-md-6 form-group"><label>Start Date</label><input type="date" name="start_date" class="form-control" value="{{ old('start_date', $reference->start_date) }}"></div>
                            <div class="col-md-6 form-group"><label>End Date</label><input type="date" name="end_date" class="form-control" value="{{ old('end_date', $reference->end_date) }}"></div>
                            
                            <div class="col-md-6 form-group"><label>Position Held</label><input type="text" name="position" class="form-control" value="{{ old('position', $reference->position) }}"></div>
                            <div class="col-md-6 form-group"><label>Final Salary</label><input type="text" name="final_salary" class="form-control" value="{{ old('final_salary', $reference->final_salary) }}"></div>
                            
                            <div class="col-md-12 form-group"><label>Role and Responsibilities</label><textarea name="roles_responsibilities" class="form-control" rows="2">{{ old('roles_responsibilities', $reference->roles_responsibilities) }}</textarea></div>
                            <div class="col-md-12 form-group"><label>Reason for Leaving</label><input type="text" name="reason_for_leaving" class="form-control" value="{{ old('reason_for_leaving', $reference->reason_for_leaving) }}"></div>

                            <div class="col-md-4 form-group">
                                <label>Timekeeping</label>
                                <select name="timekeeping_standard" class="form-control">
                                    @foreach(['Good', 'Yes', 'No', 'Sometimes'] as $opt)
                                        <option value="{{ $opt }}" @selected(old('timekeeping_standard', $reference->timekeeping_standard) == $opt)>{{ $opt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Attendance</label>
                                <select name="attendance_standard" class="form-control">
                                    @foreach(['Good', 'Yes', 'No'] as $opt)
                                        <option value="{{ $opt }}" @selected(old('attendance_standard', $reference->attendance_standard) == $opt)>{{ $opt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 form-group"><label>Sick Days (2yrs)</label><input type="number" name="sick_days" class="form-control" value="{{ old('sick_days', $reference->sick_days) }}"></div>
                            
                            <div class="col-md-12 form-group"><label>Job Criteria Meeting</label><textarea name="job_criteria" class="form-control" rows="2">{{ old('job_criteria', $reference->job_criteria) }}</textarea></div>
                        </div>
                    </div>

                    {{-- Colleague Sub-section --}}
                    <div id="colleague_section" style="{{ old('relationship_type', $reference->relationship_type) == 'Employer' ? 'display:none;' : '' }}">
                        <div class="row">
                            <div class="col-md-6 form-group"><label>How you know them</label><input type="text" name="how_known" class="form-control" value="{{ old('how_known', $reference->how_known) }}"></div>
                            <div class="col-md-6 form-group"><label>Capacity</label><input type="text" name="relationship_capacity_col" class="form-control" value="{{ old('relationship_capacity_col', $reference->relationship_capacity_col) }}"></div>
                            
                            <div class="col-md-12 form-group"><label>Character Assessment</label><textarea name="character_assessment" class="form-control" rows="3">{{ old('character_assessment', $reference->character_assessment) }}</textarea></div>
                            <div class="col-md-12 form-group"><label>Qualities & Characteristics</label><textarea name="qualities_characteristics" class="form-control" rows="2">{{ old('qualities_characteristics', $reference->qualities_characteristics) }}</textarea></div>
                            <div class="col-md-12 form-group"><label>Examples and Evidence</label><textarea name="examples_evidence" class="form-control" rows="2">{{ old('examples_evidence', $reference->examples_evidence) }}</textarea></div>
                            <div class="col-md-12 form-group"><label>Suitability for Role</label><textarea name="suitability_role" class="form-control" rows="2">{{ old('suitability_role', $reference->suitability_role) }}</textarea></div>
                            <div class="col-md-12 form-group"><label>Overall Recommendation</label><textarea name="overall_recommendation" class="form-control" rows="2">{{ old('overall_recommendation', $reference->overall_recommendation) }}</textarea></div>
                            
                            <div class="col-md-6 form-group"><label>Printed Name</label><input type="text" name="printed_name" class="form-control" value="{{ old('printed_name', $reference->printed_name) }}"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 4: Safeguarding --}}
            <div class="card card-outline card-danger">
                <div class="card-header"><h3 class="card-title">4. Safeguarding & Suitability</h3></div>
                <div class="card-body">
                    <div class="row">
                        {{-- Confidentiality --}}
                        <div class="col-md-6 form-group">
                            <label>Maintain Confidentiality?</label>
                            <select name="confidentiality_maintenance" id="conf_select" class="form-control">
                                <option value="Yes" @selected(old('confidentiality_maintenance', $reference->confidentiality_maintenance) == 'Yes')>Yes</option>
                                <option value="No" @selected(old('confidentiality_maintenance', $reference->confidentiality_maintenance) == 'No')>No</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group" id="conf_details" style="{{ old('confidentiality_maintenance', $reference->confidentiality_maintenance) == 'Yes' ? 'display:none;' : '' }}">
                            <label>Reasons</label>
                            <input type="text" name="confidentiality_no_reasons" class="form-control" value="{{ old('confidentiality_no_reasons', $reference->confidentiality_no_reasons) }}">
                        </div>

                        {{-- Disciplinary --}}
                        <div class="col-md-6 form-group">
                            <label>Disciplinary Procedures?</label>
                            <select name="disciplinary_procedures" id="disc_select" class="form-control">
                                <option value="No" @selected(old('disciplinary_procedures', $reference->disciplinary_procedures) == 'No')>No</option>
                                <option value="Yes" @selected(old('disciplinary_procedures', $reference->disciplinary_procedures) == 'Yes')>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group" id="disc_details" style="{{ old('disciplinary_procedures', $reference->disciplinary_procedures) == 'No' ? 'display:none;' : '' }}">
                            <label>Details</label>
                            <input type="text" name="disciplinary_details" class="form-control" value="{{ old('disciplinary_details', $reference->disciplinary_details) }}">
                        </div>

                        <div class="col-md-12 form-group"><label>Suitability for Early Years</label><textarea name="suitability_early_years" class="form-control" rows="2">{{ old('suitability_early_years', $reference->suitability_early_years) }}</textarea></div>

                        {{-- Concerns with Children --}}
                        <div class="col-md-6 form-group">
                            <label>Concerns with Children?</label>
                            <select name="suitability_children" id="suit_select" class="form-control">
                                <option value="No" @selected(old('suitability_children', $reference->suitability_children) == 'No')>No</option>
                                <option value="Yes" @selected(old('suitability_children', $reference->suitability_children) == 'Yes')>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group" id="suit_details" style="{{ old('suitability_children', $reference->suitability_children) == 'No' ? 'display:none;' : '' }}">
                            <label>Details</label>
                            <input type="text" name="suitability_details" class="form-control" value="{{ old('suitability_details', $reference->suitability_details) }}">
                        </div>

                        {{-- Should Not Work --}}
                        <div class="col-md-6 form-group">
                            <label>Should NOT work in Early Years?</label>
                            <select name="not_work_early_years" id="not_work_select" class="form-control">
                                <option value="No" @selected(old('not_work_early_years', $reference->not_work_early_years) == 'No')>No</option>
                                <option value="Yes" @selected(old('not_work_early_years', $reference->not_work_early_years) == 'Yes')>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group" id="not_work_details" style="{{ old('not_work_early_years', $reference->not_work_early_years) == 'No' ? 'display:none;' : '' }}">
                            <label>Details</label>
                            <input type="text" name="not_work_details" class="form-control" value="{{ old('not_work_details', $reference->not_work_details) }}">
                        </div>

                        {{-- Re-employ --}}
                        <div class="col-md-6 form-group">
                            <label>Willing to Re-employ?</label>
                            <select name="re_employ" id="re_employ_select" class="form-control">
                                <option value="Yes" @selected(old('re_employ', $reference->re_employ) == 'Yes')>Yes</option>
                                <option value="No" @selected(old('re_employ', $reference->re_employ) == 'No')>No</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group" id="re_employ_details" style="{{ old('re_employ', $reference->re_employ) == 'Yes' ? 'display:none;' : '' }}">
                            <label>Reasons</label>
                            <input type="text" name="re_employ_no_reasons" class="form-control" value="{{ old('re_employ_no_reasons', $reference->re_employ_no_reasons) }}">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Permission to Disclose?</label>
                            <select name="permission_disclose" class="form-control">
                                <option value="Yes" @selected(old('permission_disclose', $reference->permission_disclose) == 'Yes')>Yes</option>
                                <option value="No" @selected(old('permission_disclose', $reference->permission_disclose) == 'No')>No</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Confirm Accuracy?</label>
                            <select name="accuracy_confirmation" class="form-control">
                                <option value="Yes" @selected(old('accuracy_confirmation', $reference->accuracy_confirmation) == 'Yes')>Yes</option>
                                <option value="No" @selected(old('accuracy_confirmation', $reference->accuracy_confirmation) == 'No')>No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 5: Declaration --}}
            <div class="card card-outline card-success">
                <div class="card-header"><h3 class="card-title">5. Declaration</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Digital Signature (Full Name)</label>
                        <input type="text" name="referee_signature" class="form-control" value="{{ old('referee_signature', $reference->referee_signature) }}" required>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white pb-5">
                <button type="submit" class="btn btn-lg btn-success shadow">Update Reference Data</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Toggle Employer vs Colleague Section
        $('input[name="relationship_type"]').change(function() {
            if ($(this).val() === 'Employer') {
                $('#employer_section').fadeIn();
                $('#colleague_section').hide();
            } else {
                $('#employer_section').hide();
                $('#colleague_section').fadeIn();
            }
        });

        // Universal Toggle Function for Details Fields
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