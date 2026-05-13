@extends('admin.master')
@section('title', 'DBS Report - ' . $dbs->applicant_name)

@section('content')

@php
    $group1Labels = [
        'passport' => 'Valid Passport',
        'biometric_permit' => 'Biometric Residence Permit (UK)',
        'driving_licence' => 'Current Driving Licence (Full/Provisional)',
        'birth_certificate' => 'Original UK Birth Certificate (issued at time of birth)',
    ];
    $group2aLabels = [
        'uk_paper_licence' => 'UK Driving Licence (old paper version)',
        'nonuk_licence' => 'Non-UK Valid Photo Driving Licence (valid for 12 months)',
        'gro_birth_cert' => 'Birth Certificate (issued after birth by GRO)',
        'marriage_cert' => 'Marriage/Civil Partnership Certificate',
        'adoption_cert' => 'Adoption Certificate',
        'hm_forces_id' => 'HM Forces ID Card',
        'firearms_licence' => 'Firearms Licence',
    ];
    $group2bLabels = [
        'mortgage' => 'Mortgage Statement (UK/EEA, last 12 months)',
        'bank_statement' => 'Bank/Building Society Statement (UK/EEA, last 3 months)',
        'account_confirm' => 'Account Opening Confirmation (UK)',
        'credit_card' => 'Credit Card Statement (UK/EEA, last 3 months)',
        'isa_statement' => 'Financial Statement (e.g. ISA, last 12 months)',
        'p45_p60' => 'P45 or P60 (last 12 months)',
        'council_tax' => 'Council Tax Statement (last 12 months)',
        'work_permit' => 'Work Permit/Visa (last 12 months)',
        'sponsorship_letter' => 'Sponsorship Letter (Non-UK/EEA)',
        'utility_bill' => 'Utility Bill – Not Mobile (last 3 months)',
        'benefit_statement' => 'Benefit Statement (e.g. child allowance, last 3 months)',
        'gov_letter' => 'Letter from Government Agency or Local Authority (last 3 months)',
        'eu_id_card' => 'EU National ID Card',
        'pass_card' => 'PASS Card (UK/Channel Islands)',
        'headteacher_letter' => 'Letter from Head Teacher/Principal (16–17, exceptional cases)',
    ];

    function getLabel($val, $map) {
        return $map[$val] ?? $val;
    }
@endphp

<style>
    @media print {
        .main-header { display: block !important; visibility: visible !important; border-bottom: 3px double #2c3e50 !important; }
        .logo-img { display: block !important; visibility: visible !important; margin: 0 auto 15px auto !important; }
        * { -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }
        .no-print, .main-sidebar, .main-footer, .navbar, .content-header { display: none !important; }
        body, .wrapper, .content-wrapper { background: #fff !important; margin: 0 !important; padding: 0 !important; }
        .report-wrapper { box-shadow: none !important; border: none !important; width: 100% !important; max-width: 100% !important; padding: 0 !important; margin: 0 !important; }
        .section-title { background-color: #2c3e50 !important; color: #fff !important; }
    }

    .report-container-wrapper { background-color: #fff; padding: 20px; font-family: "Segoe UI", Arial, sans-serif; }
    .report-wrapper { max-width: 850px; margin: 0 auto; padding: 50px; background: #fff; }
    .main-header { text-align: center; margin-bottom: 40px; border-bottom: 3px double #2c3e50; padding-bottom: 20px; }
    .logo-img { max-width: 120px; height: auto; margin-bottom: 15px; }
    .main-header h1 { font-size: 26px; margin: 0; color: #2c3e50; text-transform: uppercase; letter-spacing: 2px; }
    .main-header h2 { font-size: 18px; margin: 5px 0 0 0; color: #7f8c8d; font-weight: normal; }
    .section-title { font-size: 14px; color: #fff; background: #2c3e50; padding: 8px 15px; margin: 30px 0 15px 0; border-radius: 3px; text-transform: uppercase; }
    .field-stack { display: flex; flex-direction: column; }
    .field { display: flex; margin-bottom: 12px; align-items: flex-end; }
    .field label { font-weight: 600; margin-right: 15px; margin-left: 10px; min-width: 280px; color: #444; font-size: 13px; }
    .field .data-span { flex: 1; border-bottom: 1px dotted #999; padding: 3px 0; font-size: 14px; color: #000; min-height: 20px; }
    table { width: 100%; border-collapse: collapse; margin-top: 15px; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: left; font-size: 13px; }
    th { background: #f2f2f2; font-weight: bold; }
    .check-cell { text-align: center; font-weight: bold; font-size: 16px; color: #2c3e50; }
    .doc-row td { padding: 8px 15px; font-size: 13px; }
    .doc-row .check-cell { color: #198754; }
    .file-link { color: #1a73e8; text-decoration: none; font-weight: 600; }
    .file-link:hover { text-decoration: underline; }
    .report-footer { margin-top: 60px; text-align: center; font-size: 11px; color: #7f8c8d; border-top: 1px solid #eee; padding-top: 20px; }
</style>

<div class="report-container-wrapper">
    <div class="d-flex justify-content-between mb-3 no-print">
        <a href="{{ route('dbs.index') }}" class="btn btn-secondary">Back to List</a>
        <button onclick="window.print()" class="btn btn-primary">Print PDF Report</button>
    </div>

    <div class="report-wrapper">
        <header class="main-header">
            @if($company && $company->company_logo)
                <img src="{{ asset('images/company/' . $company->company_logo) }}" alt="Logo" class="logo-img">
            @endif
            <h1>{{ $company->company_name ?? "Angelina's Day Care Nursery" }}</h1>
            <h2>DBS Enhanced Check Declaration & Identification Record</h2>
        </header>

        <section>
            {{-- SECTION 1 --}}
            <h3 class="section-title">Section 1: Privacy Policy Declaration</h3>
            <div class="field-stack">
                <div class="field"><label>Full Name:</label><span class="data-span">{{ $dbs->declaration_name }}</span></div>
                <div class="field"><label>Date of Birth:</label><span class="data-span">{{ \Carbon\Carbon::parse($dbs->declaration_dob)->format('d/m/Y') }}</span></div>
                <div class="field"><label>Email Address:</label><span class="data-span">{{ $dbs->declaration_email }}</span></div>
                <div class="field"><label>Declaration Date:</label><span class="data-span">{{ \Carbon\Carbon::parse($dbs->declaration_date)->format('d/m/Y') }}</span></div>
                <div class="field"><label>Digital Signature:</label><span class="data-span" style="font-family: 'Brush Script MT', cursive; font-size: 20px;">{{ $dbs->declaration_signature }}</span></div>
            </div>

            {{-- SECTION 2 --}}
            <h3 class="section-title">Section 2: Identification Check & Record</h3>
            <div class="field-stack">
                <div class="field"><label>Applicant Name:</label><span class="data-span">{{ $dbs->applicant_name }}</span></div>
                <div class="field"><label>Post Title:</label><span class="data-span">{{ $dbs->post_title }}</span></div>
                <div class="field"><label>Form Reference Number:</label><span class="data-span">{{ $dbs->form_ref_number ?? 'N/A' }}</span></div>
                <div class="field"><label>Eligibility Annex Ref:</label><span class="data-span">{{ $dbs->eligibility_ref ?? 'N/A' }}</span></div>
            </div>

            {{-- GROUP 1 --}}
            <table>
                <thead>
                    <tr>
                        <th colspan="2" style="background: #e8f4fd; color: #0b2540;">Group 1 – Primary Trusted Identity Credentials</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($group1Labels as $val => $label)
                    <tr class="doc-row">
                        <td>{{ $label }}</td>
                        <td class="check-cell">{{ ($dbs->docs_group1 && in_array($val, $dbs->docs_group1)) ? '✔' : '' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- GROUP 2a --}}
            <table>
                <thead>
                    <tr>
                        <th colspan="2" style="background: #e8f4fd; color: #0b2540;">Group 2a – Government/State Issued Documents</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($group2aLabels as $val => $label)
                    <tr class="doc-row">
                        <td>{{ $label }}</td>
                        <td class="check-cell">{{ ($dbs->docs_group2a && in_array($val, $dbs->docs_group2a)) ? '✔' : '' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- GROUP 2b --}}
            <table>
                <thead>
                    <tr>
                        <th colspan="2" style="background: #e8f4fd; color: #0b2540;">Group 2b – Financial/Social History Documents</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($group2bLabels as $val => $label)
                    <tr class="doc-row">
                        <td>{{ $label }}</td>
                        <td class="check-cell">{{ ($dbs->docs_group2b && in_array($val, $dbs->docs_group2b)) ? '✔' : '' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- UPLOADED FILES --}}
            @if($dbs->supporting_docs && count($dbs->supporting_docs) > 0)
            <h3 class="section-title">Uploaded Supporting Documents</h3>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Original Name</th>
                        <th>Size</th>
                        <th class="no-print">Download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dbs->supporting_docs as $index => $doc)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $doc['original'] ?? '-' }}</td>
                        <td>{{ round(($doc['size'] ?? 0) / 1024, 1) }} KB</td>
                        <td class="no-print">
                            <a href="{{ asset('images/dbs/' . $doc['file']) }}" target="_blank" class="file-link"><i class="fas fa-download mr-1"></i>View/Download</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            {{-- VERIFICATION --}}
            <h3 class="section-title">Form Completion & Verification</h3>
            <div class="field-stack">
                <div class="field"><label>Form Completed By:</label><span class="data-span">{{ $dbs->completed_by ?? 'N/A' }}</span></div>
                <div class="field"><label>Completion Date:</label><span class="data-span">{{ $dbs->completion_date ?? 'N/A' }}</span></div>
                <div class="field"><label>Completion Signature:</label><span class="data-span">{{ $dbs->completion_signature ?? 'N/A' }}</span></div>
                <div class="field"><label>Verified By:</label><span class="data-span">{{ $dbs->verified_by ?? 'N/A' }}</span></div>
                <div class="field"><label>Verification Date:</label><span class="data-span">{{ $dbs->verification_date ?? 'N/A' }}</span></div>
                <div class="field"><label>Verification Signature:</label><span class="data-span">{{ $dbs->verification_signature ?? 'N/A' }}</span></div>
            </div>

            {{-- FOOTER --}}
            <h3 class="section-title">Record Info</h3>
            <div class="field-stack">
                <div class="field"><label>Accuracy Confirmed:</label><span class="data-span">{{ $dbs->accuracy_confirm ? 'Yes ✔' : 'No ✘' }}</span></div>
                <div class="field"><label>IP Address:</label><span class="data-span">{{ $dbs->ip_address ?? 'N/A' }}</span></div>
                <div class="field"><label>Submitted On:</label><span class="data-span">{{ $dbs->created_at->format('d/m/Y H:i') }}</span></div>
            </div>

            <footer class="report-footer">
                <p><strong>{{ $company->company_name ?? "Angelina's Day Care Nursery" }}</strong></p>
                <p>Ensuring a safe and nurturing environment for every child.</p>
            </footer>
        </section>
    </div>
</div>
@endsection