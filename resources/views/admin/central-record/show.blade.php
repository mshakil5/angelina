@extends('admin.master')

@section('title', 'Central Record - ' . $record->name)

@section('content')

<style>
    @media print {
        .main-header { display: block !important; visibility: visible !important; border-bottom: 3px double #2c3e50 !important; }
        .logo-img { display: block !important; visibility: visible !important; margin: 0 auto 15px auto !important; }
        * { -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }
        .no-print, .main-sidebar, .main-footer, .navbar, .content-header { display: none !important; }
        body, .wrapper, .content-wrapper { background: #fff !important; margin: 0 !important; padding: 0 !important; }
        .report-wrapper { box-shadow: none !important; border: none !important; width: 100% !important; max-width: 100% !important; padding: 0 !important; margin: 0 !important; }
        .section-title { background-color: #2c3e50 !important; color: #fff !important; }
        .category-cell { background-color: #f2f2f2 !important; font-weight: bold !important; }
    }

    .report-container-wrapper { background-color: #fff; padding: 20px; font-family: "Segoe UI", Arial, sans-serif; }
    .report-wrapper { max-width: 950px; margin: 0 auto; padding: 50px; background: #fff; }
    .main-header { text-align: center; margin-bottom: 40px; border-bottom: 3px double #2c3e50; padding-bottom: 20px; }
    .logo-img { max-width: 120px; height: auto; margin-bottom: 15px; }
    .main-header h1 { font-size: 26px; margin: 0; color: #2c3e50; text-transform: uppercase; letter-spacing: 2px; }
    .main-header h2 { font-size: 18px; margin: 5px 0 0 0; color: #7f8c8d; font-weight: normal; }
    .main-header h3 { font-size: 16px; margin: 10px 0 0 0; color: #555; font-weight: 600; }
    
    table.record-table { width: 100%; border-collapse: collapse; margin-top: 30px; }
    table.record-table th, table.record-table td { border: 1px solid #ccc; padding: 10px 15px; font-size: 13px; text-align: left; vertical-align: middle; }
    table.record-table th { background: #f2f2f2; font-weight: bold; text-align: center; }
    
    .category-cell { background-color: #f9f9f9; font-weight: 600; text-align: center; vertical-align: middle; color: #2c3e50; width: 15%; }
    .field-cell { font-weight: 600; color: #444; width: 35%; background-color: #fff; }
    .entry-cell { color: #000; width: 50%; background-color: #fff; }
    
    .report-footer { margin-top: 60px; text-align: center; font-size: 11px; color: #7f8c8d; border-top: 1px solid #eee; padding-top: 20px; }
</style>

<div class="report-container-wrapper">
    <div class="d-flex justify-content-between mb-3 no-print">
        <a href="{{ route('central-records.index') }}" class="btn btn-secondary">Back to List</a>
        <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print mr-1"></i> Print Record</button>
    </div>

    <div class="report-wrapper">
        <header class="main-header">
            @if($company && $company->company_logo)
                <img src="{{ asset('images/company/' . $company->company_logo) }}" alt="Logo" class="logo-img">
            @endif
            <h1>{{ $company->company_name ?? "Angelina's Day Care Nursery" }}</h1>
            <h2>Central Record</h2>
            <h3>Early Years Number: 2780625</h3>
        </header>

        {{-- Applicant Name Header --}}
        <h4 class="mb-4" style="font-size: 20px; color: #2c3e50; font-weight: 700;">{{ $record->name }}</h4>

        <table class="record-table">
            <thead>
                <tr>
                    <th style="width: 15%;">Category</th>
                    <th style="width: 35%;">Field</th>
                    <th style="width: 50%;">Entry</th>
                </tr>
            </thead>
            <tbody>
                {{-- IDENTITY --}}
                <tr>
                    <td class="category-cell" rowspan="5">Identity</td>
                    <td class="field-cell">Name</td>
                    <td class="entry-cell">{{ $record->name }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Address</td>
                    <td class="entry-cell">{{ $record->address ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Date of Birth</td>
                    <td class="entry-cell">{{ $record->date_of_birth ? \Carbon\Carbon::parse($record->date_of_birth)->format('d/m/Y') : '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Date Address ID Seen</td>
                    <td class="entry-cell">{{ $record->date_address_id_seen ? \Carbon\Carbon::parse($record->date_address_id_seen)->format('d/m/Y') : '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Date Photo ID Seen</td>
                    <td class="entry-cell">{{ $record->date_photo_id_seen ? \Carbon\Carbon::parse($record->date_photo_id_seen)->format('d/m/Y') : '-' }}</td>
                </tr>

                {{-- RECRUITMENT --}}
                <tr>
                    <td class="category-cell" rowspan="1">Recruitment</td>
                    <td class="field-cell">Application Pack Completed</td>
                    <td class="entry-cell">{{ $record->application_pack_completed }}</td>
                </tr>

                {{-- INDUCTION --}}
                <tr>
                    <td class="category-cell" rowspan="1">Induction</td>
                    <td class="field-cell">Induction Completed Date</td>
                    <td class="entry-cell">{{ $record->induction_completed_date ? \Carbon\Carbon::parse($record->induction_completed_date)->format('d/m/Y') : '-' }}</td>
                </tr>

                {{-- EMPLOYMENT --}}
                <tr>
                    <td class="category-cell" rowspan="3">Employment</td>
                    <td class="field-cell">Date Started with EY Provider</td>
                    <td class="entry-cell">{{ $record->date_started_with_ey_provider ? \Carbon\Carbon::parse($record->date_started_with_ey_provider)->format('d/m/Y') : '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Job Title</td>
                    <td class="entry-cell">{{ $record->job_title ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Employment Status</td>
                    <td class="entry-cell">{{ $record->employment_status ?? '-' }}</td>
                </tr>

                {{-- QUALIFICATIONS & REGISTRATION --}}
                <tr>
                    <td class="category-cell" rowspan="5">Qualifications & Registration</td>
                    <td class="field-cell">Qualifications Required</td>
                    <td class="entry-cell">{{ $record->qualifications_required }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Qualifications Evidenced</td>
                    <td class="entry-cell">{{ $record->qualifications_evidenced }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Date Qualifications Seen</td>
                    <td class="entry-cell">{{ $record->date_qualifications_seen ? \Carbon\Carbon::parse($record->date_qualifications_seen)->format('d/m/Y') : '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Qualification Level and Date</td>
                    <td class="entry-cell">{{ $record->qualification_level_and_date ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Counts in Ratios</td>
                    <td class="entry-cell">{{ $record->counts_in_ratios }}</td>
                </tr>

                {{-- DBS / SUITABILITY --}}
                <tr>
                    <td class="category-cell" rowspan="7">DBS / Suitability</td>
                    <td class="field-cell">Date DBS Evidenced and Checked</td>
                    <td class="entry-cell">{{ $record->date_dbs_evidenced_and_checked ? \Carbon\Carbon::parse($record->date_dbs_evidenced_and_checked)->format('d/m/Y') : '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">DBS Disclosure Number</td>
                    <td class="entry-cell">{{ $record->dbs_disclosure_number ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">DBS Issue Date</td>
                    <td class="entry-cell">{{ $record->dbs_issue_date ? \Carbon\Carbon::parse($record->dbs_issue_date)->format('d/m/Y') : '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">DBS Certificate Seen</td>
                    <td class="entry-cell">{{ $record->dbs_certificate_seen }}</td>
                </tr>
                <tr>
                    <td class="field-cell">On DBS Update Service</td>
                    <td class="entry-cell">{{ $record->on_dbs_update_service ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Overseas Police Check Required</td>
                    <td class="entry-cell">{{ $record->overseas_police_check_required ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Overseas DBS Checks Completed</td>
                    <td class="entry-cell">{{ $record->overseas_dbs_checks_completed ?? 'N/A' }}</td>
                </tr>

                {{-- RIGHT TO WORK IN THE UK --}}
                <tr>
                    <td class="category-cell" rowspan="3">Right to Work in the UK</td>
                    <td class="field-cell">Evidence Seen</td>
                    <td class="entry-cell">{{ $record->evidence_seen_rtw ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Visa / Work Permit Expiry Date</td>
                    <td class="entry-cell">{{ $record->visa_work_permit_expiry_date ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Most Recent RTW Check Date</td>
                    <td class="entry-cell">{{ $record->most_recent_rtw_check_date ?? 'N/A' }}</td>
                </tr>

                {{-- MEDICAL --}}
                <tr>
                    <td class="category-cell" rowspan="1">Medical</td>
                    <td class="field-cell">Health Declaration Form Completed</td>
                    <td class="entry-cell">{{ $record->health_declaration_form_completed }}</td>
                </tr>

                {{-- REFERENCES --}}
                <tr>
                    <td class="category-cell" rowspan="4">References</td>
                    <td class="field-cell">Reference One Satisfactory</td>
                    <td class="entry-cell">{{ $record->reference_one_satisfactory }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Date Reference One Completed</td>
                    <td class="entry-cell">{{ $record->date_reference_one_completed ? \Carbon\Carbon::parse($record->date_reference_one_completed)->format('d/m/Y') : '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Reference Two Satisfactory</td>
                    <td class="entry-cell">{{ $record->reference_two_satisfactory }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Date Reference Two Completed</td>
                    <td class="entry-cell">{{ $record->date_reference_two_completed ? \Carbon\Carbon::parse($record->date_reference_two_completed)->format('d/m/Y') : '-' }}</td>
                </tr>

                {{-- VERIFICATION --}}
                <tr>
                    <td class="category-cell" rowspan="3">Verification</td>
                    <td class="field-cell">Evidence Checked By</td>
                    <td class="entry-cell">{{ $record->evidence_checked_by ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Manager Signature</td>
                    <td class="entry-cell" style="font-family: 'Brush Script MT', cursive; font-size: 18px;">{{ $record->manager_signature ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="field-cell">Date Verified</td>
                    <td class="entry-cell">{{ $record->date_verified ? \Carbon\Carbon::parse($record->date_verified)->format('d/m/Y') : '-' }}</td>
                </tr>
            </tbody>
        </table>

        <footer class="report-footer">
            <p><strong>{{ $company->company_name ?? "Angelina's Day Care Nursery" }}</strong></p>
            <p>Ensuring a safe and nurturing environment for every child.</p>
        </footer>
    </div>
</div>
@endsection