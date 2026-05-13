@extends('admin.master')
@section('title', 'Edit DBS Submission')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1>Edit DBS Submission</h1></div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('dbs.index') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ route('dbs.show', $dbs->id) }}" class="btn btn-info text-white">View Report</a>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                <h5 class="mb-2"><i class="fas fa-exclamation-triangle mr-2"></i> Whoops! There were some problems:</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('dbs.update', $dbs->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Section 1 --}}
            <div class="card card-outline card-primary mb-3">
                <div class="card-header"><h3 class="card-title">Section 1: Privacy Policy Declaration</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="declaration_name" class="form-control" value="{{ old('declaration_name', $dbs->declaration_name) }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" name="declaration_dob" class="form-control" value="{{ old('declaration_dob', $dbs->declaration_dob) }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="declaration_email" class="form-control" value="{{ old('declaration_email', $dbs->declaration_email) }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Declaration Date <span class="text-danger">*</span></label>
                            <input type="date" name="declaration_date" class="form-control" value="{{ old('declaration_date', $dbs->declaration_date) }}" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Digital Signature <span class="text-danger">*</span></label>
                            <input type="text" name="declaration_signature" class="form-control" value="{{ old('declaration_signature', $dbs->declaration_signature) }}" required>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section 2 --}}
            <div class="card card-outline card-primary mb-3">
                <div class="card-header"><h3 class="card-title">Section 2: Identification Check & Record</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Applicant Name <span class="text-danger">*</span></label>
                            <input type="text" name="applicant_name" class="form-control" value="{{ old('applicant_name', $dbs->applicant_name) }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Post Title <span class="text-danger">*</span></label>
                            <input type="text" name="post_title" class="form-control" value="{{ old('post_title', $dbs->post_title) }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Form Reference Number</label>
                            <input type="text" name="form_ref_number" class="form-control" value="{{ old('form_ref_number', $dbs->form_ref_number) }}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Eligibility – Annex Reference</label>
                            <input type="text" name="eligibility_ref" class="form-control" value="{{ old('eligibility_ref', $dbs->eligibility_ref) }}">
                        </div>
                    </div>

                    {{-- Group 1 Checkboxes --}}
                    <h5 class="mt-4 mb-3 text-primary"><i class="fas fa-shield-alt mr-1"></i> Group 1 – Primary Trusted Identity Credentials <span class="badge bg-danger">Required</span></h5>
                    <div class="row">
                        @foreach([
                            'Valid Passport' => 'passport',
                            'Biometric Residence Permit (UK)' => 'biometric_permit',
                            'Current Driving Licence (Full/Provisional)' => 'driving_licence',
                            'Original UK Birth Certificate (issued at time of birth)' => 'birth_certificate'
                        ] as $label => $val)
                        <div class="col-md-6">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="docs_group1[]" value="{{ $val }}" id="eg1_{{ $val }}" {{ in_array($val, old('docs_group1', $dbs->docs_group1 ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eg1_{{ $val }}">{{ $label }}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Group 2a Checkboxes --}}
                    <h5 class="mt-4 mb-3 text-primary"><i class="fas fa-file-alt mr-1"></i> Group 2a – Government/State Issued</h5>
                    <div class="row">
                        @foreach([
                            'UK Driving Licence (old paper version)' => 'uk_paper_licence',
                            'Non-UK Valid Photo Driving Licence' => 'nonuk_licence',
                            'Birth Certificate (issued after birth by GRO)' => 'gro_birth_cert',
                            'Marriage/Civil Partnership Certificate' => 'marriage_cert',
                            'Adoption Certificate' => 'adoption_cert',
                            'HM Forces ID Card' => 'hm_forces_id',
                            'Firearms Licence' => 'firearms_licence'
                        ] as $label => $val)
                        <div class="col-md-6">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="docs_group2a[]" value="{{ $val }}" id="eg2a_{{ $val }}" {{ in_array($val, old('docs_group2a', $dbs->docs_group2a ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eg2a_{{ $val }}">{{ $label }}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Group 2b Checkboxes --}}
                    <h5 class="mt-4 mb-3 text-primary"><i class="fas fa-wallet mr-1"></i> Group 2b – Financial/Social History</h5>
                    <div class="row">
                        @foreach([
                            'Mortgage Statement (UK/EEA, last 12 months)' => 'mortgage',
                            'Bank/Building Society Statement (last 3 months)' => 'bank_statement',
                            'Account Opening Confirmation (UK)' => 'account_confirm',
                            'Credit Card Statement (last 3 months)' => 'credit_card',
                            'Financial Statement (e.g. ISA, last 12 months)' => 'isa_statement',
                            'P45 or P60 (last 12 months)' => 'p45_p60',
                            'Council Tax Statement (last 12 months)' => 'council_tax',
                            'Work Permit/Visa (last 12 months)' => 'work_permit',
                            'Sponsorship Letter (Non-UK/EEA)' => 'sponsorship_letter',
                            'Utility Bill – Not Mobile (last 3 months)' => 'utility_bill',
                            'Benefit Statement (last 3 months)' => 'benefit_statement',
                            'Letter from Government Agency (last 3 months)' => 'gov_letter',
                            'EU National ID Card' => 'eu_id_card',
                            'PASS Card (UK/Channel Islands)' => 'pass_card',
                            'Letter from Head Teacher/Principal (16–17)' => 'headteacher_letter'
                        ] as $label => $val)
                        <div class="col-md-6">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="docs_group2b[]" value="{{ $val }}" id="eg2b_{{ $val }}" {{ in_array($val, old('docs_group2b', $dbs->docs_group2b ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eg2b_{{ $val }}">{{ $label }}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Uploaded Files --}}
            <div class="card card-outline card-success mb-3">
                <div class="card-header"><h3 class="card-title">Uploaded Supporting Documents</h3></div>
                <div class="card-body">
                    @if($dbs->supporting_docs && count($dbs->supporting_docs) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="bg-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Original Name</th>
                                        <th>Saved As</th>
                                        <th>Size</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dbs->supporting_docs as $index => $doc)
                                    <tr id="file_row_{{ $index }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $doc['original'] ?? '-' }}</td>
                                        <td><code>{{ $doc['file'] ?? '-' }}</code></td>
                                        <td>{{ round(($doc['size'] ?? 0) / 1024, 1) }} KB</td>
                                        <td>
                                            <a href="{{ asset('images/dbs/' . $doc['file']) }}" target="_blank" class="btn btn-sm btn-info" title="Download"><i class="fas fa-download"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger btn-remove-file" data-index="{{ $index }}" data-id="{{ $dbs->id }}" title="Delete"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="remove_files" id="removeFilesInput" value="">
                    @else
                        <p class="text-muted mb-0">No documents uploaded.</p>
                    @endif

                    <hr>
                    <div class="form-group">
                        <label>Upload Additional Documents</label>
                        <input type="file" name="supporting_docs[]" class="form-control" multiple accept=".jpg,.jpeg,.png,.pdf">
                        <small class="text-muted">JPG, PNG, PDF — Max 5 MB each</small>
                    </div>
                </div>
            </div>

            {{-- Verification --}}
            <div class="card card-outline card-secondary mb-3">
                <div class="card-header"><h3 class="card-title">Form Completion & Verification</h3></div>
                <div class="card-body">
                    <h6 class="text-muted">Completed By</h6>
                    <div class="row">
                        <div class="col-md-4 form-group"><label>Name</label><input type="text" name="completed_by" class="form-control" value="{{ old('completed_by', $dbs->completed_by) }}"></div>
                        <div class="col-md-4 form-group"><label>Date</label><input type="date" name="completion_date" class="form-control" value="{{ old('completion_date', $dbs->completion_date) }}"></div>
                        <div class="col-md-4 form-group"><label>Signature</label><input type="text" name="completion_signature" class="form-control" value="{{ old('completion_signature', $dbs->completion_signature) }}"></div>
                    </div>
                    <h6 class="text-muted mt-3">Verified By</h6>
                    <div class="row">
                        <div class="col-md-4 form-group"><label>Name</label><input type="text" name="verified_by" class="form-control" value="{{ old('verified_by', $dbs->verified_by) }}"></div>
                        <div class="col-md-4 form-group"><label>Date</label><input type="date" name="verification_date" class="form-control" value="{{ old('verification_date', $dbs->verification_date) }}"></div>
                        <div class="col-md-4 form-group"><label>Signature</label><input type="text" name="verification_signature" class="form-control" value="{{ old('verification_signature', $dbs->verification_signature) }}"></div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white pb-5">
                <button type="submit" class="btn btn-lg btn-success shadow">Update DBS Form</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('script')
<script>
 $(document).ready(function() {
    let removedFiles = [];

    $('.btn-remove-file').click(function() {
        if (!confirm('Are you sure you want to delete this file?')) return;

        const index = $(this).data('index');
        const id = $(this).data('id');
        const $row = $(this).closest('tr');

        $.ajax({
            url: '/admin/dbs/' + id + '/delete-file',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                index: index
            },
            success: function(res) {
                $row.fadeOut(300, function() { $(this).remove(); });
            },
            error: function() {
                alert('Failed to delete file. Please try again.');
            }
        });
    });
});
</script>
@endsection