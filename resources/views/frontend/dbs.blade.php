@extends('frontend.layouts.master')

@section('content')
<style>
    :root {
        --primary-color: #0b2540;
        --accent-color: #1a73e8;
        --error-color: #dc3545;
        --bg-light: #f8fbff;
        --border-color: #e0e6ed;
        --success-color: #198754;
        --warning-bg: #fffbeb;
        --warning-border: #fde68a;
        --info-bg: #eff6ff;
        --info-border: #bfdbfe;
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

    .breadcrumb-section .logo-top-right {
        position: absolute;
        top: 20px;
        right: 30px;
        z-index: 10;
    }

    .breadcrumb-section .logo-top-right img {
        max-height: 60px;
        filter: brightness(0) invert(1);
    }

    .page-hero {
        background: var(--bg-light);
        padding: 60px 0 80px;
    }

    .dbs-container {
        max-width: 920px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.05);
        padding: 40px;
        border: 1px solid var(--border-color);
    }

    .form-header {
        border-bottom: 2px solid #f0f0f0;
        margin-bottom: 30px;
        padding-bottom: 20px;
    }

    .form-header h1 {
        color: var(--primary-color);
        font-weight: 800;
        font-size: 1.7rem;
        margin-bottom: 4px;
        line-height: 1.3;
    }

    .form-header .subtitle {
        color: #64748b;
        font-size: 0.92rem;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--accent-color);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.82rem;
        letter-spacing: 1px;
        margin: 35px 0 20px 0;
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
        margin-bottom: 7px;
        font-size: 0.88rem;
    }

    .form-group-custom label span {
        color: var(--error-color);
    }

    .form-control-custom {
        width: 100%;
        padding: 7px 10px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        transition: all 0.2s;
        background-color: #fff;
        font-size: 0.9rem;
    }

    .form-control-custom:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 4px rgba(26, 115, 232, 0.1);
        outline: none;
    }

    .privacy-box {
        background: var(--info-bg);
        border: 1px solid var(--info-border);
        padding: 20px 24px;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .privacy-box p {
        font-size: 0.88rem;
        color: #334155;
        margin-bottom: 12px;
        line-height: 1.7;
    }

    .privacy-box a {
        color: var(--accent-color);
        font-weight: 600;
        word-break: break-all;
    }

    .privacy-box a:hover {
        text-decoration: underline;
    }

    .declaration-text {
        font-size: 0.88rem;
        color: #334155;
        line-height: 1.75;
        padding: 16px 20px;
        border-left: 3px solid var(--accent-color);
        background: #f9fafb;
        border-radius: 0 8px 8px 0;
        margin-bottom: 20px;
    }

    .doc-group-card {
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 16px;
        background: #fff;
        transition: box-shadow 0.2s;
    }

    .doc-group-card:hover {
        box-shadow: 0 4px 16px rgba(0,0,0,0.04);
    }

    .doc-group-card h6 {
        font-weight: 700;
        color: var(--primary-color);
        font-size: 0.88rem;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .doc-group-card h6 .badge-count {
        background: var(--accent-color);
        color: #fff;
        font-size: 0.7rem;
        padding: 2px 8px;
        border-radius: 20px;
        font-weight: 600;
    }

    .doc-check-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 7px 0;
        border-bottom: 1px solid #f5f5f5;
        font-size: 0.87rem;
        color: #475569;
    }

    .doc-check-item:last-child {
        border-bottom: none;
    }

    .doc-check-item .form-check-input {
        width: 16px;
        height: 16px;
        margin-top: 0;
        flex-shrink: 0;
    }

    .doc-check-item .form-check-input:checked {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
    }

    .doc-check-item small {
        color: #94a3b8;
        font-size: 0.78rem;
        margin-left: 4px;
    }

    .doc-note {
        background: var(--warning-bg);
        border: 1px solid var(--warning-border);
        border-radius: 8px;
        padding: 14px 18px;
        margin-bottom: 20px;
        font-size: 0.84rem;
        color: #92400e;
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }

    .doc-note i {
        font-size: 1.1rem;
        margin-top: 1px;
    }

    .upload-area {
        border: 2px dashed var(--border-color);
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        transition: all 0.2s;
        cursor: pointer;
        background: #fcfcfc;
        position: relative;
    }

    .upload-area:hover,
    .upload-area.drag-over {
        border-color: var(--accent-color);
        background: var(--info-bg);
    }

    .upload-area i {
        font-size: 2rem;
        color: var(--accent-color);
        margin-bottom: 8px;
    }

    .upload-area p {
        color: #64748b;
        font-size: 0.88rem;
        margin-bottom: 4px;
    }

    .upload-area small {
        color: #94a3b8;
        font-size: 0.78rem;
    }

    .upload-area input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
    }

    .file-list {
        margin-top: 14px;
    }

    .file-list .file-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #f8fafc;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 10px 14px;
        margin-bottom: 8px;
        font-size: 0.85rem;
    }

    .file-list .file-item .file-info {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #334155;
    }

    .file-list .file-item .file-info i {
        color: var(--accent-color);
    }

    .file-list .file-item .remove-file {
        background: none;
        border: none;
        color: var(--error-color);
        cursor: pointer;
        font-size: 1rem;
        padding: 0 4px;
    }

    .file-list .file-item .file-size {
        color: #94a3b8;
        font-size: 0.78rem;
    }

    .signature-area {
        border: 1px dashed #cbd5e0;
        padding: 20px;
        border-radius: 8px;
        background: #fcfcfc;
    }

    .verification-block {
        background: #f8fafc;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 24px;
        margin-top: 20px;
    }

    .verification-block h6 {
        font-weight: 700;
        color: var(--primary-color);
        font-size: 0.88rem;
        margin-bottom: 16px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
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
        margin-top: 25px;
        font-size: 0.95rem;
    }

    .btn-submit-pro:hover {
        background: #143a63;
        transform: translateY(-2px);
    }

    .btn-submit-pro:disabled {
        background: #94a3b8;
        transform: none;
        cursor: not-allowed;
    }

    @media (max-width: 768px) {
        .dbs-container {
            padding: 24px 18px;
        }
        .breadcrumb-section .logo-top-right {
            top: 12px;
            right: 14px;
        }
        .breadcrumb-section .logo-top-right img {
            max-height: 42px;
        }
    }
</style>

<section class="breadcrumb-section text-center text-white">
    <div class="logo-top-right">
        <img src="{{ asset('resources/frontend/images/logo.png') }}" alt="Angelina's Day Care Nursery">
    </div>
    <div class="container">
        <h2 class="fw-bold">DBS Enhanced Check</h2>
        <p>Angelina's Day Care Nursery</p>
    </div>
</section>

<div class="page-hero">
    <div class="container">
        <div class="dbs-container">
            <div class="form-header">
                <h1>Disclosure and Barring Service (DBS)<br>Enhanced Check Declaration &amp; Identification Record</h1>
                <p class="subtitle">Please complete all required sections and upload supporting documents.</p>
            </div>

            @if(request()->has('success'))
                <div class="alert alert-success border-0 shadow-sm mb-4 d-flex align-items-center" id="successAlert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <div>Your DBS form has been submitted successfully. Thank you.</div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div id="ajaxErrors" style="display:none;" class="alert alert-danger shadow-sm mb-4">
                <ul class="mb-0" id="ajaxErrorList"></ul>
            </div>



            <form action="{{ route('dbsStore') }}" method="POST" id="dbsForm" enctype="multipart/form-data">
                @csrf

                {{-- SECTION 1 --}}
                <div class="section-title">Section 1: Privacy Policy Declaration</div>

                <div class="privacy-box">
                    <p>The General Data Protection Regulation (GDPR) came into force on 25 May 2018. In order to process your DBS application, you must confirm that you have read and understood the DBS Privacy Policy.</p>
                    <p><i class="bi bi-link-45deg me-1"></i> Please read the policy at:<br>
                    <a href="https://www.gov.uk/government/publications/dbs-privacy-policies" target="_blank" rel="noopener noreferrer">
                        https://www.gov.uk/government/publications/dbs-privacy-policies
                    </a></p>
                </div>

                <div class="declaration-text">
                    I confirm that I have read the Enhanced Check Privacy Policy for applicants and understand how DBS will process my personal data and the options available to me for submitting an application.
                </div>

                <div class="row">
                    <div class="col-md-6 form-group-custom">
                        <label>Full Name <span>*</span></label>
                        <input type="text" name="declaration_name" class="form-control-custom" value="{{ old('declaration_name') }}" required>
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>Date of Birth <span>*</span></label>
                        <input type="date" name="declaration_dob" class="form-control-custom" value="{{ old('declaration_dob') }}" required>
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>Email Address <span>*</span></label>
                        <input type="email" name="declaration_email" class="form-control-custom" value="{{ old('declaration_email') }}" required>
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>Declaration Date <span>*</span></label>
                        <input type="date" name="declaration_date" class="form-control-custom" value="{{ old('declaration_date', date('Y-m-d')) }}" required>
                    </div>
                    <div class="col-md-12 form-group-custom">
                        <label>Digital Signature (Full Name) <span>*</span></label>
                        <input type="text" name="declaration_signature" class="form-control-custom" placeholder="Type your full name as signature" value="{{ old('declaration_signature') }}" required>
                    </div>
                </div>

                {{-- SECTION 2 --}}
                <div class="section-title">Section 2: Identification Check &amp; Record</div>

                <div class="row">
                    <div class="col-md-6 form-group-custom">
                        <label>Name of Applicant <span>*</span></label>
                        <input type="text" name="applicant_name" class="form-control-custom" value="{{ old('applicant_name') }}" required>
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>Post Title <span>*</span></label>
                        <input type="text" name="post_title" class="form-control-custom" value="{{ old('post_title') }}" required>
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>Form Reference Number</label>
                        <input type="text" name="form_ref_number" class="form-control-custom" value="{{ old('form_ref_number') }}">
                    </div>
                    <div class="col-md-6 form-group-custom">
                        <label>Eligibility – Annex Reference Number</label>
                        <input type="text" name="eligibility_ref" class="form-control-custom" value="{{ old('eligibility_ref') }}">
                    </div>
                </div>

                <div class="doc-note">
                    <i class="bi bi-info-circle-fill"></i>
                    <div>To comply with DBS requirements, the applicant must present: <strong>(1)</strong> At least one document from Group 1, and <strong>(2)</strong> Additional documents from Group 1, 2a, or 2b — including at least one document verifying current address.
                    <br><a href="https://www.gov.uk/government/uploads/system/uploads/attachment_data/file/409805/DBS_guide_eligibility_v7.pdf" target="_blank" rel="noopener noreferrer" style="color: var(--accent-color); font-weight: 600;">DBS Eligibility Guidance &rarr;</a></div>
                </div>

                {{-- GROUP 1 --}}
                <div class="doc-group-card">
                    <h6><i class="bi bi-shield-check"></i> Group 1 – Primary Trusted Identity Credentials <span class="badge-count">Required</span></h6>
                    @foreach([
                        'Valid Passport' => 'passport',
                        'Biometric Residence Permit (UK)' => 'biometric_permit',
                        'Current Driving Licence (Full/Provisional)' => 'driving_licence',
                        'Original UK Birth Certificate (issued at time of birth)' => 'birth_certificate'
                    ] as $label => $name)
                    <div class="doc-check-item">
                        <input class="form-check-input" type="checkbox" name="docs_group1[]" value="{{ $name }}" id="g1_{{ $name }}" {{ in_array($name, old('docs_group1', [])) ? 'checked' : '' }}>
                        <label class="form-check-label mb-0" for="g1_{{ $name }}">{{ $label }}</label>
                    </div>
                    @endforeach
                </div>

                {{-- GROUP 2a --}}
                <div class="doc-group-card">
                    <h6><i class="bi bi-file-earmark-text"></i> Group 2a – Trusted Government/State Issued Documents</h6>
                    @foreach([
                        'UK Driving Licence (old paper version)' => 'uk_paper_licence',
                        'Non-UK Valid Photo Driving Licence (valid for 12 months)' => 'nonuk_licence',
                        'Birth Certificate (issued after birth by GRO)' => 'gro_birth_cert',
                        'Marriage/Civil Partnership Certificate' => 'marriage_cert',
                        'Adoption Certificate' => 'adoption_cert',
                        'HM Forces ID Card' => 'hm_forces_id',
                        'Firearms Licence' => 'firearms_licence'
                    ] as $label => $name)
                    <div class="doc-check-item">
                        <input class="form-check-input" type="checkbox" name="docs_group2a[]" value="{{ $name }}" id="g2a_{{ $name }}" {{ in_array($name, old('docs_group2a', [])) ? 'checked' : '' }}>
                        <label class="form-check-label mb-0" for="g2a_{{ $name }}">{{ $label }}</label>
                    </div>
                    @endforeach
                </div>

                {{-- GROUP 2b --}}
                <div class="doc-group-card">
                    <h6><i class="bi bi-wallet2"></i> Group 2b – Financial/Social History Documents</h6>
                    @foreach([
                        'Mortgage Statement (UK/EEA, last 12 months)' => 'mortgage',
                        'Bank/Building Society Statement (UK/EEA, last 3 months)' => 'bank_statement',
                        'Account Opening Confirmation (UK)' => 'account_confirm',
                        'Credit Card Statement (UK/EEA, last 3 months)' => 'credit_card',
                        'Financial Statement (e.g. ISA, last 12 months)' => 'isa_statement',
                        'P45 or P60 (last 12 months)' => 'p45_p60',
                        'Council Tax Statement (last 12 months)' => 'council_tax',
                        'Work Permit/Visa (last 12 months)' => 'work_permit',
                        'Sponsorship Letter (Non-UK/EEA)' => 'sponsorship_letter',
                        'Utility Bill – Not Mobile (last 3 months)' => 'utility_bill',
                        'Benefit Statement (e.g. child allowance, last 3 months)' => 'benefit_statement',
                        'Letter from Government Agency or Local Authority (last 3 months)' => 'gov_letter',
                        'EU National ID Card' => 'eu_id_card',
                        'PASS Card (UK/Channel Islands)' => 'pass_card',
                        'Letter from Head Teacher/Principal (16–17, exceptional cases)' => 'headteacher_letter'
                    ] as $label => $name)
                    <div class="doc-check-item">
                        <input class="form-check-input" type="checkbox" name="docs_group2b[]" value="{{ $name }}" id="g2b_{{ $name }}" {{ in_array($name, old('docs_group2b', [])) ? 'checked' : '' }}>
                        <label class="form-check-label mb-0" for="g2b_{{ $name }}">{{ $label }}</label>
                    </div>
                    @endforeach
                </div>

                {{-- UPLOAD SECTION --}}
                <div class="section-title">Supporting Documents Upload</div>

                <div class="doc-note">
                    <i class="bi bi-paperclip"></i>
                    <div>Upload clear, legible copies of the documents you have selected above. Accepted formats: <strong>JPG, PNG, PDF</strong>. Maximum file size: <strong>5 MB</strong> per file. You may upload multiple files.</div>
                </div>

                <div class="upload-area" id="uploadArea">
                    <input type="file" name="supporting_docs[]" id="fileInput" multiple accept=".jpg,.jpeg,.png,.pdf">
                    <i class="bi bi-cloud-arrow-up d-block"></i>
                    <p>Drag &amp; drop files here, or <strong style="color: var(--accent-color);">browse</strong></p>
                    <small>JPG, PNG, PDF — Max 5 MB each</small>
                </div>

                <div class="file-list" id="fileList"></div>

                {{-- VERIFICATION BLOCK --}}
                <div class="verification-block">
                    <h6><i class="bi bi-clipboard-check me-1"></i> Form Completion &amp; Verification</h6>
                    <div class="row">
                        <div class="col-md-4 form-group-custom">
                            <label>Form Completed By</label>
                            <input type="text" name="completed_by" class="form-control-custom" value="{{ old('completed_by') }}">
                        </div>
                        <div class="col-md-4 form-group-custom">
                            <label>Completion Date</label>
                            <input type="date" name="completion_date" class="form-control-custom" value="{{ old('completion_date') }}">
                        </div>
                        <div class="col-md-4 form-group-custom">
                            <label>Completion Signature</label>
                            <input type="text" name="completion_signature" class="form-control-custom" value="{{ old('completion_signature') }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4 form-group-custom">
                            <label>Verified By</label>
                            <input type="text" name="verified_by" class="form-control-custom" value="{{ old('verified_by') }}">
                        </div>
                        <div class="col-md-4 form-group-custom">
                            <label>Verification Date</label>
                            <input type="date" name="verification_date" class="form-control-custom" value="{{ old('verification_date') }}">
                        </div>
                        <div class="col-md-4 form-group-custom">
                            <label>Verification Signature</label>
                            <input type="text" name="verification_signature" class="form-control-custom" value="{{ old('verification_signature') }}">
                        </div>
                    </div>
                </div>

                {{-- FINAL DECLARATION --}}
                <div class="section-title">Final Declaration</div>
                <div class="signature-area">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="accuracy_confirm" id="accuracy_confirm" required>
                        <label class="form-check-label" for="accuracy_confirm" style="font-size: 0.88rem;">
                            I confirm that all information provided in this form is accurate and the documents uploaded are genuine copies of the originals.
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn-submit-pro" id="submitBtn">
                    <i class="bi bi-send-fill me-2"></i> Submit DBS Form
                </button>
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

    // ---- File Upload Handling ----
    let selectedFiles = [];
    const maxFileSize = 5 * 1024 * 1024; // 5 MB
    const allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];

    function formatSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
        return (bytes / 1048576).toFixed(1) + ' MB';
    }

    function getFileIcon(type) {
        if (type === 'application/pdf') return 'bi-file-earmark-pdf-fill';
        return 'bi-file-earmark-image-fill';
    }

    function renderFileList() {
        const $list = $('#fileList');
        $list.empty();
        if (selectedFiles.length === 0) return;

        selectedFiles.forEach(function(file, index) {
            $list.append(`
                <div class="file-item">
                    <div class="file-info">
                        <i class="bi ${getFileIcon(file.type)}"></i>
                        <div>
                            <div>${file.name}</div>
                            <div class="file-size">${formatSize(file.size)}</div>
                        </div>
                    </div>
                    <button type="button" class="remove-file" data-index="${index}" title="Remove">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            `);
        });
    }

    function addFiles(files) {
        Array.from(files).forEach(function(file) {
            if (!allowedTypes.includes(file.type)) {
                alert('"' + file.name + '" is not a supported format. Please use JPG, PNG, or PDF.');
                return;
            }
            if (file.size > maxFileSize) {
                alert('"' + file.name + '" exceeds the 5 MB size limit.');
                return;
            }
            // Prevent duplicates
            const exists = selectedFiles.some(f => f.name === file.name && f.size === file.size);
            if (!exists) {
                selectedFiles.push(file);
            }
        });
        renderFileList();
    }

    // Drag & Drop
    const $uploadArea = $('#uploadArea');

    $uploadArea.on('dragover', function(e) {
        e.preventDefault();
        $(this).addClass('drag-over');
    }).on('dragleave drop', function(e) {
        e.preventDefault();
        $(this).removeClass('drag-over');
    }).on('drop', function(e) {
        const files = e.originalEvent.dataTransfer.files;
        if (files.length) addFiles(files);
    });

    // File input change
    $('#fileInput').on('change', function() {
        if (this.files.length) addFiles(this.files);
        $(this).val(''); // reset so same file can be re-selected if removed
    });

    // Remove file
    $(document).on('click', '.remove-file', function() {
        const idx = $(this).data('index');
        selectedFiles.splice(idx, 1);
        renderFileList();
    });

    // ---- Form Submit ----
    $('#dbsForm').on('submit', function(e) {
        // Create a new FormData and append files
        const formData = new FormData(this);

        // Remove any existing supporting_docs entries
        formData.delete('supporting_docs[]');

        // Append our tracked files
        selectedFiles.forEach(function(file) {
            formData.append('supporting_docs[]', file);
        });

        // Group 1 validation: at least one checked
        if ($('input[name="docs_group1[]"]:checked').length === 0) {
            e.preventDefault();
            alert('Please select at least one document from Group 1 – Primary Trusted Identity Credentials.');
            $('html, body').animate({
                scrollTop: $('input[name="docs_group1[]"]').first().closest('.doc-group-card').offset().top - 100
            }, 400);
            return;
        }

        // Submit via AJAX for file handling
        e.preventDefault();

        const $btn = $('#submitBtn');
        $btn.prop('disabled', true).html('<i class="bi bi-hourglass-split me-2"></i> Submitting...');

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.redirect) {
                    window.location.href = response.redirect;
                } else {
                    location.reload();
                }
            },
            error: function(xhr) {
                $btn.prop('disabled', false).html('<i class="bi bi-send-fill me-2"></i> Submit DBS Form');
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let msg = 'Please fix the following:\n\n';
                    $.each(errors, function(key, val) {
                        msg += '• ' + val[0] + '\n';
                    });
                    alert(msg);
                } else {
                    alert('Something went wrong. Please try again.');
                }
            }
        });
    });

});
</script>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
 $(document).ready(function() {

    // Scroll to success alert if present
    if ($('#successAlert').length) {
        $('html, body').animate({
            scrollTop: $('#successAlert').offset().top - 120
        }, 400);
    }

    // ---- File Upload Handling ----
    let selectedFiles = [];
    const maxFileSize = 5 * 1024 * 1024;
    const allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];

    function formatSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1048576) return (bytes / 1024).toFixed(1) + ' KB';
        return (bytes / 1048576).toFixed(1) + ' MB';
    }

    function getFileIcon(type) {
        if (type === 'application/pdf') return 'bi-file-earmark-pdf-fill';
        return 'bi-file-earmark-image-fill';
    }

    function renderFileList() {
        const $list = $('#fileList');
        $list.empty();
        if (selectedFiles.length === 0) return;

        selectedFiles.forEach(function(file, index) {
            $list.append(`
                <div class="file-item">
                    <div class="file-info">
                        <i class="bi ${getFileIcon(file.type)}"></i>
                        <div>
                            <div>${file.name}</div>
                            <div class="file-size">${formatSize(file.size)}</div>
                        </div>
                    </div>
                    <button type="button" class="remove-file" data-index="${index}" title="Remove">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            `);
        });
    }

    function addFiles(files) {
        Array.from(files).forEach(function(file) {
            if (!allowedTypes.includes(file.type)) {
                alert('"' + file.name + '" is not a supported format. Please use JPG, PNG, or PDF.');
                return;
            }
            if (file.size > maxFileSize) {
                alert('"' + file.name + '" exceeds the 5 MB size limit.');
                return;
            }
            const exists = selectedFiles.some(f => f.name === file.name && f.size === file.size);
            if (!exists) {
                selectedFiles.push(file);
            }
        });
        renderFileList();
    }

    const $uploadArea = $('#uploadArea');

    $uploadArea.on('dragover', function(e) {
        e.preventDefault();
        $(this).addClass('drag-over');
    }).on('dragleave drop', function(e) {
        e.preventDefault();
        $(this).removeClass('drag-over');
    }).on('drop', function(e) {
        const files = e.originalEvent.dataTransfer.files;
        if (files.length) addFiles(files);
    });

    $('#fileInput').on('change', function() {
        if (this.files.length) addFiles(this.files);
        $(this).val('');
    });

    $(document).on('click', '.remove-file', function() {
        const idx = $(this).data('index');
        selectedFiles.splice(idx, 1);
        renderFileList();
    });

    // ---- Form Submit ----
    $('#dbsForm').on('submit', function(e) {
        e.preventDefault();

        // Hide previous errors
        $('#ajaxErrors').hide();

        // Group 1 check
        if ($('input[name="docs_group1[]"]:checked').length === 0) {
            showInlineErrors({'docs_group1': ['Please select at least one document from Group 1.']});
            $('html, body').animate({
                scrollTop: $('input[name="docs_group1[]"]').first().closest('.doc-group-card').offset().top - 100
            }, 400);
            return;
        }

        // Accuracy checkbox
        if (!$('#accuracy_confirm').is(':checked')) {
            showInlineErrors({'accuracy_confirm': ['You must confirm the accuracy of all information.']});
            $('html, body').animate({
                scrollTop: $('#accuracy_confirm').closest('.signature-area').offset().top - 100
            }, 400);
            return;
        }

        const formData = new FormData(this);
        formData.delete('supporting_docs[]');
        selectedFiles.forEach(function(file) {
            formData.append('supporting_docs[]', file);
        });

        const $btn = $('#submitBtn');
        $btn.prop('disabled', true).html('<i class="bi bi-hourglass-split me-2"></i> Submitting...');

        console.log('Submitting DBS form...');
        console.log('Files to upload:', selectedFiles.length);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('Response:', response);
                if (response.redirect) {
                    window.location.href = response.redirect;
                } else {
                    location.reload();
                }
            },
            error: function(xhr) {
                console.error('AJAX Error Status:', xhr.status);
                console.error('Response Text:', xhr.responseText);

                $btn.prop('disabled', false).html('<i class="bi bi-send-fill me-2"></i> Submit DBS Form');

                if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                    showInlineErrors(xhr.responseJSON.errors);
                    $('html, body').animate({
                        scrollTop: $('#ajaxErrors').offset().top - 120
                    }, 400);
                } else if (xhr.status === 500) {
                    let msg = 'Server error. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }
                    showInlineErrors({'_general': [msg]});
                } else {
                    showInlineErrors({'_general': ['Something went wrong. Please try again.']});
                }
            }
        });
    });

    function showInlineErrors(errors) {
        const $list = $('#ajaxErrorList');
        $list.empty();
        $.each(errors, function(key, val) {
            $list.append('<li>' + val[0] + '</li>');
        });
        $('#ajaxErrors').show();
    }

});
</script>
@endsection