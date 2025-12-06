@extends('admin.master')
@section('title', 'Reference Details')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .report-card {
        max-width: 1000px;
        margin: 40px auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .card-header {
        background: linear-gradient(135deg, #0d6efd, #1e40af);
        color: #fff;
        padding: 30px 40px;
    }
    .section-title {
        text-transform: uppercase;
        font-size: 1rem;
        font-weight: 700;
        color: #0d6efd;
        border-bottom: 2px solid #0d6efd20;
        padding-bottom: 5px;
        margin-bottom: 20px;
    }
    .info-row strong { display:block; color:#495057; }
    .info-row p { margin-bottom:10px; color:#212529; }
    .footer-note { font-size:0.85rem; color:#6c757d; margin-top:15px; border-top:1px solid #dee2e6; padding-top:10px; }

    @media print {
        #backBtn, #printBtn { display: none !important; }
        body {
            font-size: 13px !important;
            line-height: 1.3;
        }
        .report-card {
            box-shadow: none !important;
            margin: 0 !important;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
        }
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .col-md-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .info-row p {
            margin-bottom: 4px !important;
            font-size: 13px !important;
        }
        h4, h6 {
            font-size: 14px !important;
        }
        small {
            font-size: 11px !important;
        }
    }
</style>

<div class="container py-4">
    <div class="text-start mb-3">
        <a href="{{ route('reference.index') }}" id="backBtn" class="btn btn-secondary">Back</a>
        <button onclick="window.print()" id="printBtn" class="btn btn-primary">Print</button>
    </div>

    <div class="report-card" id="printArea">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">{{ $company->company_name ?? 'Company Name' }}</h4>
                <small>Reference Report</small>
            </div>
            @if(isset($company->company_logo))
                <img src="{{ asset('images/company/'.$company->company_logo) }}" width="75" height="75" class="rounded-circle bg-white p-1">
            @endif
        </div>

        <div class="report-section p-4">
            <h6 class="section-title">Candidate Information</h6>
            <div class="row info-row mb-3">
                <div class="col-md-6"><strong>First Name:</strong><p>{{ $reference->candidate_first }}</p></div>
                <div class="col-md-6"><strong>Last Name:</strong><p>{{ $reference->candidate_last }}</p></div>
            </div>

            <h6 class="section-title">Referee Information</h6>
            <div class="row info-row mb-3">
                <div class="col-md-6"><strong>First Name:</strong><p>{{ $reference->referee_first }}</p></div>
                <div class="col-md-6"><strong>Last Name:</strong><p>{{ $reference->referee_last }}</p></div>
                <div class="col-md-6"><strong>Email:</strong><p>{{ $reference->referee_email }}</p></div>
                <div class="col-md-6"><strong>Company:</strong><p>{{ $reference->referee_company }}</p></div>
                <div class="col-md-6"><strong>Address:</strong><p>{{ $reference->org_address }}</p></div>
                <div class="col-md-6"><strong>City:</strong><p>{{ $reference->city }}</p></div>
                <div class="col-md-6"><strong>County:</strong><p>{{ $reference->county }}</p></div>
                <div class="col-md-6"><strong>Postcode:</strong><p>{{ $reference->postcode }}</p></div>
                <div class="col-md-6"><strong>Country:</strong><p>{{ $reference->country }}</p></div>
                <div class="col-md-6"><strong>Phone:</strong><p>{{ $reference->phone }}</p></div>
                <div class="col-md-6"><strong>Relationship:</strong><p>{{ $reference->relationship }}</p></div>
            </div>

            <h6 class="section-title">Employment Information</h6>
            <div class="row info-row mb-3">
                <div class="col-md-6"><strong>Start Date:</strong>
                    <p>{{ $reference->start_date ? \Carbon\Carbon::parse($reference->start_date)->format('d-m-y') : '' }}</p>
                </div>
                <div class="col-md-6"><strong>End Date:</strong>
                    <p>{{ $reference->end_date ? \Carbon\Carbon::parse($reference->end_date)->format('d-m-y') : '' }}</p>
                </div>
                <div class="col-md-6"><strong>Position:</strong><p>{{ $reference->position }}</p></div>
                <div class="col-md-12"><strong>Role & Responsibilities:</strong><p>{{ $reference->role_responsibilities }}</p></div>
                <div class="col-md-12"><strong>Reason for Leaving:</strong><p>{{ $reference->reason_leaving }}</p></div>
            </div>

            <h6 class="section-title">Reference Assessment</h6>
            <div class="row info-row mb-3">
                <div class="col-md-12"><strong>Criteria:</strong><p>{{ $reference->criteria }}</p></div>
                <div class="col-md-6"><strong>Sick Days:</strong><p>{{ $reference->sick_days }}</p></div>
                <div class="col-md-6"><strong>Permission to Disclose:</strong><p>{{ $reference->permission_disclose }}</p></div>
                <div class="col-md-6"><strong>Disciplinary Record:</strong><p>{{ $reference->disciplinary }}</p></div>
                <div class="col-md-6"><strong>Re-employable:</strong><p>{{ $reference->re_employ }}</p></div>
                <div class="col-md-6"><strong>Suitability:</strong><p>{{ $reference->suitability }}</p></div>
                <div class="col-md-12"><strong>Suitability Details:</strong><p>{{ $reference->suitability_details }}</p></div>
                <div class="col-md-12"><strong>Accuracy Confirmation:</strong><p>{{ $reference->accuracy }}</p></div>
            </div>

            <div class="footer-note">
                <small>Submitted on: {{ \Carbon\Carbon::parse($reference->created_at)->format('d-m-y') }}</small>
            </div>
        </div>
    </div>
</div>
@endsection
