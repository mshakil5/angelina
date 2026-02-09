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

        .gap{
            margin-top: 160px !important;
            margin-bottom: 160px !important;
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
            @if($company && $company->company_logo)
                <img src="{{ asset('images/company/' . $company->company_logo) }}" alt="Logo" class="logo-img">
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
                <div class="field"><label>First Name:</label><span class="data-span"> {{ $reference->referee_first }}</span></div>
                <div class="field"><label>Last Name:</label><span class="data-span"> {{ $reference->referee_last }}</span></div>
                <div class="field"><label>Email Address:</label><span class="data-span">{{ $reference->referee_email }}</span></div>
                <div class="field"><label>Company/Organisation:</label><span class="data-span">{{ $reference->referee_company }}</span></div>
                {{-- <div class="field"><label>Job Title / Position:</label><span class="data-span">{{ $reference->relationship_capacity }}</span></div> --}}

                <div class="field"><label>Street:</label><span class="data-span">{{ $reference->street }}</span></div>
                <div class="field"><label>City:</label><span class="data-span">{{ $reference->city }}</span></div>
                <div class="field"><label>State/Region::</label><span class="data-span">{{ $reference->state_region }}</span></div>
                <div class="field"><label>ZIP/Postal Code:</label><span class="data-span">{{ $reference->zip_code }}</span></div>
                <div class="field"><label>Country:</label><span class="data-span">{{ $reference->country }}</span></div>
                <div class="field"><label>Telephone Number:</label><span class="data-span">{{ $reference->phone }}</span></div>

            </div>

            @if($reference->relationship_type == 'Employer')
                <h3 class="section-title">Section 3: Relationship to Candidate: Employer (complete this section if you were an employer)</h3>
                <div class="field-stack">
                    <div class="field"><label>Duration of acquaintance:</label><span class="data-span">{{ $reference->acquaintance_duration }}</span></div>
                    <div class="field"><label>In what capacity do you know them?:</label><span class="data-span">{{ $reference->relationship_type }}</span></div>
                    <div class="field"><label>Employment details:</label><span class="data-span">{{ $reference->employment_details }}</span></div>
                    <div class="field"><label>Employment Start Date:</label><span class="data-span">{{ $reference->start_date }}</span></div>
                    <div class="field"><label>Employment End Date:</label><span class="data-span">{{ $reference->end_date }}</span></div>
                    <div class="field"><label>Position held by applicant:</label><span class="data-span">{{ $reference->position }}</span></div>

                    <div class="field"><label>Role and responsibilities:</label><span class="data-span">{{ $reference->roles_responsibilities }}</span></div>
                    <div class="field"><label>Reason for leaving:</label><span class="data-span">{{ $reference->reason_for_leaving }}</span></div>
                    <div class="field"><label>Final salary: </label><span class="data-span">{{ $reference->final_salary }}</span></div>
                    <div class="field"><label>Performance and conduct: </label><span class="data-span">{{ $reference->performance_and_conduct }}</span></div>
                    <div class="field"><label>Assessment of Timekeeping:</label><span class="data-span">{{ $reference->timekeeping_standard }}</span></div>
                    <div class="field"><label>Assessment of Attendance:</label><span class="data-span">{{ $reference->attendance_standard }}</span></div>

                    <div class="field"><label>Sick days in the last 2 years:</label><span class="data-span">{{ $reference->sick_days }}</span></div>
                    <div class="field"><label>Job criteria meeting:</label><span class="data-span">{{ $reference->job_criteria }}</span></div>
                </div>
            @endif

            @if($reference->relationship_type == 'Colleague')
                <div class="page-break"></div>
                <h3 class="section-title">Section 3: Relationship to Candidate: Colleague (complete this section if you are a colleague, supervisor
or line manager, teacher, or even a client) </h3>
                <div class="field-stack">
                    <div class="field"><label>How you know the individual</label><span class="data-span">{{ $reference->how_known ?? '' }}</span></div>
                    <div class="field"><label>Capacity in which you know them</label><span class="data-span">{{ $reference->relationship_capacity_col ?? '' }}</span></div>
                    <div class="field"><label>Character assessment</label><span class="data-span">{{ $reference->character_assessment ?? '' }}</span></div>
                    <div class="field"><label>Qualities and characteristics</label><span class="data-span">{{ $reference->qualities_characteristics ?? '' }}</span></div>

                    <div class="field"><label>Examples and evidence</label><span class="data-span">{{ $reference->examples_evidence ?? '' }}</span></div>
                    <div class="field"><label>Suitability for position/role</label><span class="data-span">{{ $reference->suitability_role ?? '' }}</span></div>
                    <div class="field"><label>Conclusion</label><span class="data-span">{{ $reference->extra1 ?? '' }}</span></div>
                    <div class="field"><label>Overall recommendation</label><span class="data-span">{{ $reference->overall_recommendation ?? '' }}</span></div>
                    <div class="field"><label>Willingness to provide further information</label><span class="data-span">{{ $reference->further_information ?? '' }}</span></div>
                    <div class="field"><label>Signature of the Referee</label><span class="data-span">{{ $reference->referee_signature ?? '' }}</span></div>
                    <div class="field"><label>Printed Name</label><span class="data-span">{{ $reference->printed_name ?? '' }}</span></div>
                </div>
            @endif


                <div style="margin-bottom: 40px;" class="gap"></div> <br> <br>
            <h3 class="section-title">Section 4: Insert your comments </h3>
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
                            <td>Confidentiality Maintenance (Yes/No):</td>
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
                            <td>Formal Disciplinary Procedures (Yes/No):</td>
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
                            <td>Any Concerns About Suitability to Work with Children (Yes/No):</td>
                            <td class="check-cell">{{ $reference->suitability_children == 'Yes' ? '✔' : '' }}</td>
                            <td class="check-cell">{{ $reference->suitability_children == 'No' ? '✔' : '' }}</td>
                        </tr>
                        @if($reference->suitability_details)
                        <tr class="details-row">
                            <td colspan="3"><strong>Details:</strong> {{ $reference->suitability_details }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td>Any Reason Applicant Should Not Work in Early Years Setting (Yes/No):</td>
                            <td class="check-cell">{{ $reference->not_work_early_years == 'Yes' ? '✔' : '' }}</td>
                            <td class="check-cell">{{ $reference->not_work_early_years == 'No' ? '✔' : '' }}</td>
                        </tr>
                        @if($reference->not_work_details)
                        <tr class="details-row">
                            <td colspan="3"><strong>Details:</strong> {{ $reference->not_work_details }}</td>
                        </tr>
                        @endif
                        <tr>
                            <td>Willingness to Re-employ (Yes/No):</td>
                            <td class="check-cell">{{ $reference->re_employ == 'Yes' ? '✔' : '' }}</td>
                            <td class="check-cell">{{ $reference->re_employ == 'No' ? '✔' : '' }}</td>
                        </tr>
                        @if($reference->re_employ_no_reasons)
                        <tr class="details-row">
                            <td colspan="3"><strong>Reasons:</strong> {{ $reference->re_employ_no_reasons }}</td>
                        </tr>
                        @endif
                        
                        <tr class="sub-head"><td colspan="3">Permission and Confirmation:</td></tr>
                        <tr>
                            <td>Permission to Disclose Details to Applicant (Yes/No):</td>
                            <td class="check-cell">{{ $reference->permission_disclose == 'Yes' ? '✔' : '' }}</td>
                            <td class="check-cell">{{ $reference->permission_disclose == 'No' ? '✔' : '' }}</td>
                        </tr>
                        <tr>
                            <td>Information Accuracy Confirmation (Yes/No):</td>
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
            </footer>
        </section>
    </div>
</div>
@endsection