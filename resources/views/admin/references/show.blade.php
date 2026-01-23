@extends('admin.master')
@section('title', 'Full Reference Report')

@section('content')

<style>
    /* --- SCREEN DISPLAY --- */
    .report-container { 
        max-width: 1000px; margin: 20px auto; background: #fff; padding: 40px; 
        border: 1px solid #e1e5eb; border-radius: 12px; 
    }
    .header-box { border-bottom: 3px solid #1e40af; padding-bottom: 20px; margin-bottom: 30px; }
    .section-banner { 
        background: #f8fafc; color: #1e40af; padding: 10px 15px; font-weight: 700; 
        border-left: 5px solid #1e40af; margin: 25px 0 15px 0; text-transform: uppercase; font-size: 0.9rem; 
    }
    .data-row { border-bottom: 1px solid #f1f5f9; padding: 10px 0; }
    .data-label { font-weight: 600; color: #64748b; font-size: 0.85rem; }
    .data-value { color: #1e293b; font-weight: 500; }

    /* --- PRINT FIXES --- */
    @media print {
        /* 1. Hide Dashboard UI */
        .no-print, .main-sidebar, .main-footer, .navbar, .content-header, .btn { 
            display: none !important; 
        }

        /* 2. Reset Layout Constraints */
        body, .wrapper, .content-wrapper { 
            background: #fff !important; margin: 0 !important; padding: 0 !important; min-height: auto !important;
        }
        
        .report-container { 
            border: none !important; box-shadow: none !important; width: 100% !important; 
            max-width: 100% !important; margin: 0 !important; padding: 0 !important;
        }

        /* 3. Force Colors & Backgrounds */
        * { 
            -webkit-print-color-adjust: exact !important; 
            print-color-adjust: exact !important; 
            color-adjust: exact !important;
        }

        /* 4. FIX: Stop Bootstrap columns from stacking vertically */
        .row { display: flex !important; flex-wrap: wrap !important; }
        .col-md-3 { width: 25% !important; flex: 0 0 25% !important; max-width: 25% !important; }
        .col-md-4 { width: 33.333% !important; flex: 0 0 33.333% !important; max-width: 33.333% !important; }
        .col-md-6 { width: 50% !important; flex: 0 0 50% !important; max-width: 50% !important; }
        .col-md-12 { width: 100% !important; flex: 0 0 100% !important; }

        /* 5. Typography */
        .data-value { color: #000 !important; font-size: 11pt !important; }
        .data-label { color: #333 !important; font-size: 9pt !important; }
        
        /* 6. Page Settings */
        @page { size: A4; margin: 1.5cm; }
        
        /* Prevent splitting sections across pages */
        .section-banner, .data-row { page-break-inside: avoid; }
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <a href="{{ route('reference.index') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Back to List</a>
        <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Print PDF Report</button>
    </div>

    <div class="report-container shadow-sm">
        <div class="header-box d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold text-primary mb-1">{{ $company->company_name ?? 'Angelina\'s Day Care' }}</h2>
                <p class="text-muted mb-0">Employment & Character Reference Record</p>
            </div>
            <div class="text-end">
                <span class="badge bg-info text-white mb-2">ID: #{{ $reference->id }}</span><br>
                <small class="text-muted">Submitted: {{ $reference->created_at->format('d M, Y H:i') }}</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="section-banner">1. Candidate Information</div>
                <div class="px-2">
                    <div class="data-row">
                        <div class="data-label">First Name</div>
                        <div class="data-value">{{ $reference->candidate_first }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Last Name</div>
                        <div class="data-value">{{ $reference->candidate_last }}</div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="section-banner">2. Referee Details</div>
                <div class="px-2">
                    <div class="data-row">
                        <div class="data-label">Referee Name</div>
                        <div class="data-value">{{ $reference->referee_first ?? $reference->digital_signature ?? 'N/A' }} {{ $reference->referee_last }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Company</div>
                        <div class="data-value">{{ $reference->referee_company ?? 'Not Specified' }}</div>
                    </div>
                    <div class="data-row">
                        <div class="data-label">Relationship Capacity</div>
                        <div class="data-value">{{ $reference->relationship_type ?? $reference->relationship ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-banner">3. Contact & Location Details</div>
        <div class="row px-2">
            <div class="col-md-4 data-row"><div class="data-label">Email</div><div class="data-value">{{ $reference->referee_email }}</div></div>
            <div class="col-md-4 data-row"><div class="data-label">Phone</div><div class="data-value">{{ $reference->phone ?? 'N/A' }}</div></div>
            <div class="col-md-4 data-row"><div class="data-label">Country</div><div class="data-value">{{ $reference->country ?? 'N/A' }}</div></div>
            <div class="col-md-12 data-row"><div class="data-label">Address</div><div class="data-value">{{ $reference->org_address }}, {{ $reference->city }}, {{ $reference->postcode }}</div></div>
        </div>

        <div class="section-banner">4. Employment History</div>
        <div class="row px-2">
            <div class="col-md-3 data-row"><div class="data-label">Start Date</div><div class="data-value">{{ $reference->start_date ?? 'N/A' }}</div></div>
            <div class="col-md-3 data-row"><div class="data-label">End Date</div><div class="data-value">{{ $reference->end_date ?? 'N/A' }}</div></div>
            <div class="col-md-6 data-row"><div class="data-label">Position Held</div><div class="data-value">{{ $reference->position ?? 'N/A' }}</div></div>
            
            <div class="col-md-4 data-row"><div class="data-label">Timekeeping</div><div class="data-value">{{ $reference->timekeeping_standard ?? 'N/A' }}</div></div>
            <div class="col-md-4 data-row"><div class="data-label">Attendance</div><div class="data-value">{{ $reference->attendance_standard ?? 'N/A' }}</div></div>
            <div class="col-md-4 data-row"><div class="data-label">Sick Days (2 Yrs)</div><div class="data-value">{{ $reference->sick_days ?? '0' }}</div></div>
            
            <div class="col-md-12 data-row">
                <div class="data-label">Role Responsibilities</div>
                <div class="data-value">{{ $reference->role_responsibilities ?? 'None provided' }}</div>
            </div>
        </div>

        <div class="section-banner" style="background: #fff1f2; color: #be123c; border-left-color: #be123c;">5. Safeguarding & Regulatory Compliance</div>
        <div class="row px-2">
            <div class="col-md-6 data-row">
                <div class="data-label">Disciplinary Record?</div>
                <div class="data-value @if($reference->disciplinary == 'Yes') text-danger fw-bold @endif">{{ $reference->disciplinary ?? 'No' }}</div>
            </div>
            <div class="col-md-6 data-row">
                <div class="data-label">Suitability for Early Years/Children?</div>
                <div class="data-value @if($reference->suitability_children == 'Yes') text-danger fw-bold @endif">{{ $reference->suitability_children ?? 'No' }}</div>
            </div>
            <div class="col-md-12 data-row">
                <div class="data-label">Suitability Details</div>
                <div class="data-value">{{ $reference->suitability_details ?? 'No concerns disclosed' }}</div>
            </div>
            <div class="col-md-6 data-row">
                <div class="data-label">Would you re-employ?</div>
                <div class="data-value">{{ $reference->re_employ ?? 'N/A' }}</div>
            </div>
            <div class="col-md-6 data-row">
                <div class="data-label">Accuracy Confirmation</div>
                <div class="data-value">{{ $reference->accuracy ?? 'Confirmed' }}</div>
            </div>
        </div>

        @if($reference->character_assessment)
        <div class="section-banner">6. Professional Character Assessment</div>
        <div class="px-2">
            <div class="data-row">
                <div class="data-label">Assessment Details</div>
                <div class="data-value" style="white-space: pre-line;">{{ $reference->character_assessment }}</div>
            </div>
        </div>
        @endif

        <div class="mt-5 border-top pt-4">
            <div class="row">
                <div class="col-6">
                    <p class="mb-0 data-label">Digital Signature</p>
                    <h4 style="font-family: 'Brush Script MT', cursive;">{{ $reference->digital_signature ?? $reference->signature_name ?? 'Digitally Signed' }}</h4>
                </div>
                <div class="col-6 text-end">
                    <p class="mb-0 data-label">Form Status</p>
                    <span class="badge {{ $reference->status == 1 ? 'bg-success' : 'bg-warning' }}">
                        {{ $reference->status == 1 ? 'Verified' : 'Pending Review' }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection