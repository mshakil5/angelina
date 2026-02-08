@extends('admin.master')
@section('title', 'Reference Report - ' . $reference->candidate_first)

@section('content')


<style>


    /* --- PRINT FIXES --- */
    @media print {
        /* 1. Ensure the header and logo are visible */
        .main-header { 
            display: block !important; 
            visibility: visible !important; 
            border-bottom: 3px double #2c3e50 !important;
        }
        
        .logo-img { 
            display: block !important; 
            visibility: visible !important;
            margin: 0 auto 15px auto !important;
        }

        /* 2. Force browser to render colors and images */
        * {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        /* 3. Hide dashboard UI but keep report content */
        .no-print, .main-sidebar, .main-footer, .navbar, .content-header { 
            display: none !important; 
        }

        /* 4. Reset layout for A4 */
        body, .wrapper, .content-wrapper { 
            background: #fff !important; 
            margin: 0 !important; 
            padding: 0 !important; 
        }

        .report-wrapper { 
            box-shadow: none !important; 
            border: none !important; 
            width: 100% !important; 
            max-width: 100% !important; 
            padding: 0 !important;
            margin: 0 !important;
        }

        .section-title {
            background-color: #2c3e50 !important;
            color: #fff !important;
        }
    }
</style>


<style>
    /* --- INTEGRATED NEW DESIGN CSS --- */
    .report-container-wrapper {
        background-color: #fff;
        padding: 20px;
        font-family: "Segoe UI", Arial, sans-serif;
    }

    .report-wrapper {
        max-width: 850px;
        margin: 0 auto;
        padding: 50px;
        background: #fff;
    }

    .main-header {
        text-align: center;
        margin-bottom: 40px;
        border-bottom: 3px double #2c3e50;
        padding-bottom: 20px;
    }

    .logo-img {
        max-width: 120px;
        height: auto;
        margin-bottom: 15px;
    }

    .main-header h1 {
        font-size: 26px;
        margin: 0;
        color: #2c3e50;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .main-header h2 {
        font-size: 18px;
        margin: 5px 0 0 0;
        color: #7f8c8d;
        font-weight: normal;
    }

    .section-title {
        font-size: 14px;
        color: #fff;
        background: #2c3e50;
        padding: 8px 15px;
        margin: 30px 0 15px 0;
        border-radius: 3px;
        text-transform: uppercase;
    }

    .field-stack {
        display: flex;
        flex-direction: column;
    }

    .field {
        display: flex;
        margin-bottom: 12px;
        align-items: flex-end;
    }

    .field label {
        font-weight: 600;
        margin-right: 15px;
        margin-left: 10px;
        min-width: 280px;
        color: #444;
        font-size: 13px;
    }

    .field .data-span {
        flex: 1;
        border-bottom: 1px dotted #999;
        padding: 3px 0;
        font-size: 14px;
        color: #000;
        min-height: 20px;
    }

    /* Professional Table */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
        font-size: 13px;
    }

    th {
        background: #f2f2f2;
        font-weight: bold;
    }

    .yn-th { width: 60px; text-align: center; }
    .check-cell { text-align: center; font-weight: bold; font-size: 16px; color: #2c3e50; }

    .sub-head {
        background: #fcfcfc;
        font-weight: bold;
        color: #2c3e50;
    }

    .details-row td {
        background: #fff9f9;
        font-style: italic;
        font-size: 12px;
        padding-left: 30px;
    }

    .report-footer {
        margin-top: 60px;
        text-align: center;
        font-size: 11px;
        color: #7f8c8d;
        border-top: 1px solid #eee;
        padding-top: 20px;
    }


</style>

<div class="report-container-wrapper">
    <div class="d-flex justify-content-between mb-3 no-print">
        <a href="{{ route('reference.index') }}" class="btn btn-secondary">Back to List</a>
        <button onclick="window.print()" class="btn btn-primary">Print PDF Report</button>
    </div>

    <div class="report-wrapper">
        <header class="main-header">
            @if($company && $company->logo)
                <img src="{{ asset('uploads/company/' . $company->logo) }}" alt="Logo" class="logo-img">
            @endif
            <h1>{{ $company->company_name ?? "Angelina's Day Care" }}</h1>
            <h2>Employee Reference Request Form</h2>
        </header>

        <section>
            <h3 class="section-title">Section 1: Candidate Details</h3>
            <div class="field-stack">
                <div class="field"><label>Candidate First Name:</label><span class="data-span">{{ $reference->candidate_first }}</span></div>
                <div class="field"><label>Candidate Last Name:</label><span class="data-span">{{ $reference->candidate_last }}</span></div>
            </div>

            <h3 class="section-title">Section 2: Referee Information</h3>
            <div class="field-stack">
                <div class="field"><label>Referee Full Name:</label><span class="data-span">{{ $reference->referee_first }} {{ $reference->referee_last }}</span></div>
                <div class="field"><label>Job Title / Position:</label><span class="data-span">{{ $reference->relationship_capacity }}</span></div>
                <div class="field"><label>Company/Organisation:</label><span class="data-span">{{ $reference->referee_company }}</span></div>
                <div class="field"><label>Email Address:</label><span class="data-span">{{ $reference->referee_email }}</span></div>
                <div class="field"><label>Telephone Number:</label><span class="data-span">{{ $reference->phone }}</span></div>
                <div class="field"><label>Street Address:</label><span class="data-span">{{ $reference->street }}</span></div>
                <div class="field"><label>City, State, ZIP:</label><span class="data-span">{{ $reference->city }}, {{ $reference->state_region }}, {{ $reference->zip_code }}</span></div>
            </div>

            <h3 class="section-title">Section 3: Employment History & Relationship</h3>
            <div class="field-stack">
                <div class="field"><label>Duration of acquaintance:</label><span class="data-span">{{ $reference->acquaintance_duration }}</span></div>
                <div class="field"><label>In what capacity do you know them?:</label><span class="data-span">{{ $reference->relationship_type }}</span></div>
                <div class="field"><label>Employment Start Date:</label><span class="data-span">{{ $reference->start_date }}</span></div>
                <div class="field"><label>Employment End Date:</label><span class="data-span">{{ $reference->end_date }}</span></div>
                <div class="field"><label>Position held by applicant:</label><span class="data-span">{{ $reference->position }}</span></div>
                <div class="field"><label>Reason for leaving:</label><span class="data-span">{{ $reference->reason_for_leaving }}</span></div>
                <div class="field"><label>Assessment of Timekeeping:</label><span class="data-span">{{ $reference->timekeeping_standard }}</span></div>
                <div class="field"><label>Assessment of Attendance:</label><span class="data-span">{{ $reference->attendance_standard }}</span></div>
            </div>

            <div class="page-break"></div>

            <h3 class="section-title">Section 4: Professional Competency & Character</h3>
            <div class="field-stack">
                <div class="field"><label>How do you describe their professional character?:</label><span class="data-span">{{ $reference->character_assessment ?? 'N/A' }}</span></div>
                <div class="field"><label>Suitability for the specific role applied for:</label><span class="data-span">{{ $reference->suitability_role }}</span></div>
                <div class="field"><label>Key strengths and areas for development:</label><span class="data-span">{{ $reference->qualities_characteristics ?? 'N/A' }}</span></div>
                <div class="field"><label>Overall recommendation for employment:</label><span class="data-span">{{ $reference->overall_recommendation ?? 'N/A' }}</span></div>
            </div>

            <h3 class="section-title">Section 5: Formal Regulatory Declarations</h3>
            <div class="table-section">
                <table>
                    <thead>
                        <tr>
                            <th class="main-th">Declaration Query</th>
                            <th class="yn-th">Yes</th>
                            <th class="yn-th">No</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Confidentiality --}}
                        <tr>
                            <td>Did the applicant maintain strict confidentiality?</td>
                            <td class="check-cell">{{ $reference->confidentiality_maintenance == 'Yes' ? '✔' : '' }}</td>
                            <td class="check-cell">{{ $reference->confidentiality_maintenance == 'No' ? '✔' : '' }}</td>
                        </tr>
                        @if($reference->confidentiality_no_reasons)
                        <tr class="details-row">
                            <td colspan="3"><strong>Reason:</strong> {{ $reference->confidentiality_no_reasons }}</td>
                        </tr>
                        @endif
                        
                        {{-- Disciplinary --}}
                        <tr>
                            <td>Was the applicant subject to any formal disciplinary procedures?</td>
                            <td class="check-cell">{{ $reference->disciplinary_procedures == 'Yes' ? '✔' : '' }}</td>
                            <td class="check-cell">{{ $reference->disciplinary_procedures == 'No' ? '✔' : '' }}</td>
                        </tr>
                        @if($reference->disciplinary_details)
                        <tr class="details-row">
                            <td colspan="3"><strong>Details:</strong> {{ $reference->disciplinary_details }}</td>
                        </tr>
                        @endif

                        <tr class="sub-head"><td colspan="3">Suitability for Early Years (Children's Safeguarding)</td></tr>
                        <tr>
                            <td>Do you have any concerns about their suitability to work with children?</td>
                            <td class="check-cell">{{ $reference->suitability_children == 'Yes' ? '✔' : '' }}</td>
                            <td class="check-cell">{{ $reference->suitability_children == 'No' ? '✔' : '' }}</td>
                        </tr>
                        <tr>
                            <td>Is there any reason why they should not work in an Early Years setting?</td>
                            <td class="check-cell">{{ $reference->not_work_early_years == 'Yes' ? '✔' : '' }}</td>
                            <td class="check-cell">{{ $reference->not_work_early_years == 'No' ? '✔' : '' }}</td>
                        </tr>
                        <tr>
                            <td>Would you be willing to re-employ this person?</td>
                            <td class="check-cell">{{ $reference->re_employ == 'Yes' ? '✔' : '' }}</td>
                            <td class="check-cell">{{ $reference->re_employ == 'No' ? '✔' : '' }}</td>
                        </tr>
                        
                        <tr class="sub-head"><td colspan="3">Consent and Data Protection</td></tr>
                        <tr>
                            <td>Permission to disclose this reference to the applicant if requested?</td>
                            <td class="check-cell">{{ $reference->permission_disclose == 'Yes' ? '✔' : '' }}</td>
                            <td class="check-cell">{{ $reference->permission_disclose == 'No' ? '✔' : '' }}</td>
                        </tr>
                        <tr>
                            <td>I confirm the information provided is accurate and true.</td>
                            <td class="check-cell">{{ $reference->accuracy_confirmation == 'Yes' ? '✔' : '' }}</td>
                            <td class="check-cell">{{ $reference->accuracy_confirmation == 'No' ? '✔' : '' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h3 class="section-title">Section 6: Authorization</h3>
            <div class="signature-block">
                <div class="field">
                    <label>Signature of Referee:</label>
                    <span class="data-span" style="font-family: 'Brush Script MT', cursive; font-size: 20px;">
                        {{ $reference->referee_signature }}
                    </span>
                </div>
                <div class="field">
                    <label>Printed Name:</label>
                    <span class="data-span">{{ $reference->referee_first }} {{ $reference->referee_last }}</span>
                </div>
                <div class="field">
                    <label>Date of Signing:</label>
                    <span class="data-span">{{ $reference->created_at->format('d/m/Y') }}</span>
                </div>
            </div>

            <footer class="report-footer">
                <p><strong>{{ $company->company_name ?? "Angelina's Day Care Limited" }}</strong></p>
                <p>Ensuring a safe and nurturing environment for every child.</p>
                <p>Confidential Document &copy; {{ date('Y') }}</p>
            </footer>
        </section>
    </div>
</div>
@endsection