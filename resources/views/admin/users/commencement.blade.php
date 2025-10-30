@extends('admin.master')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .report-card {
        max-width: 950px;
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
        border-bottom: 5px solid #0b5ed7;
    }

    .card-header h4 {
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .card-header small {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    .report-section {
        padding: 35px 45px;
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

    .info-row strong {
        display: block;
        color: #495057;
        font-size: 0.95rem;
    }

    .info-row p {
        margin-bottom: 10px;
        color: #212529;
    }

    ul.list-group {
        border: 1px solid #dee2e6;
        border-radius: 5px;
    }

    ul.list-group li {
        font-size: 0.95rem;
        padding: 10px 15px;
        border: none;
        border-bottom: 1px solid #f1f1f1;
    }

    ul.list-group li:last-child {
        border-bottom: none;
    }

    .signature-img {
        border: 1px solid #dee2e6;
        padding: 10px;
        border-radius: 5px;
        width: 250px;
        height: auto;
    }

    .footer-note {
        font-size: 0.85rem;
        color: #6c757d;
        margin-top: 15px;
        border-top: 1px solid #dee2e6;
        padding-top: 10px;
    }

    .btn-print {
        border-radius: 50px;
        padding: 10px 25px;
        font-weight: 500;
    }

    /* PRINT STYLING */
    @media print {
        body {
            background: #fff;
            margin: 0;
            padding: 0;
        }
        #printArea {
            box-shadow: none !important;
            border: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        #newBtnSection, .btn-print {
            display: none !important;
        }
        body * {
            visibility: hidden;
        }
        #printArea, #printArea * {
            visibility: visible;
        }
        #printArea {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
    }
</style>

<section class="content" id="newBtnSection">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <a href="{{route('user.index')}}" class="btn btn-secondary my-3">Back</a>
            </div>
        </div>
    </div>
</section>

<div class="container py-4">
    <div class="report-card" id="printArea">
        <!-- Header -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">Angelina's Day Care</h4>
                <small>Employee Commencement Report</small>
            </div>
            <div>
                @if(isset($company->company_logo))
                    <img src="{{ asset('images/company/'.$company->company_logo) }}" alt="Logo" width="75" height="75" class="rounded-circle bg-white p-1">
                @endif
            </div>
        </div>

        <div class="report-section">
            <div class="text-center mb-4">
                <h5 class="fw-bold text-uppercase mb-1">Employee Commencement Details</h5>
                <p class="text-muted small mb-0">Secure & Confidential</p>
            </div>

            <!-- Employee Info -->
            <h6 class="section-title">Employee Information</h6>
            <div class="row info-row mb-4">
                <div class="col-md-6">
                    <strong>Full Name:</strong>
                    <p>{{ $employee->name ?? '—' }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Phone Number:</strong>
                    <p>{{ $employee->phone ?? '—' }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Email Address:</strong>
                    <p>{{ $employee->email ?? '—' }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Date of Birth:</strong>
                    <p>{{ \Carbon\Carbon::parse($employee->dob ?? now())->format('d M, Y') }}</p>
                </div>
            </div>

            <!-- Acknowledgement Section -->
            <h6 class="section-title">Acknowledgement of Receipt</h6>
            <p class="small text-muted">The employee has received and reviewed the following documents:</p>
            <ul class="list-group mb-3">
                @foreach ($employee->documents as $key => $item)
                    <li class="list-group-item">
                        <span class="text-primary fw-semibold">{{ $key + 1 }}.</span> {{ $item->document->title ?? '' }}
                    </li>
                @endforeach
            </ul>
            <div>
                <strong>Acknowledged:</strong>
                <span class="badge bg-{{ ($employee->documents && $employee->documents->count() > 0) ? 'success' : 'danger' }}">
                    {{ ($employee->documents && $employee->documents->count() > 0) ? 'Yes' : 'No' }}
                </span>
            </div>

            <!-- Signature Section -->
            <h6 class="section-title mt-4">Signature</h6>
            <div class="row align-items-center">
                <div class="col-md-6 mb-3">
                    <p class="small text-muted mb-1">Employee Signature:</p>
                    @if(!empty($employee->sign))
                        <img src="{{ asset('images/profile/'.$employee->sign) }}" alt="Signature" class="signature-img">
                    @else
                        <p>—</p>
                    @endif
                </div>
                <div class="col-md-6 mb-3">
                    <p class="small text-muted mb-1">Signed Date:</p>
                    <p class="mb-0">
                        {{ optional($employee->documents->first())->completed_at
                            ? \Carbon\Carbon::parse(optional($employee->documents->first())->completed_at)->format('d M, Y')
                            : '-' }}
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer-note">
                <em>By signing this document, the employee confirms that all information provided is true and correct to the best of their knowledge.</em>
                <br>
                <small>Generated on: {{ now()->format('d M, Y h:i A') }}</small>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <button onclick="printReport()" class="btn btn-outline-primary btn-print">
            <i class="bi bi-printer me-2"></i> Print Report
        </button>
    </div>
</div>

@endsection

@section('script')
<script>
function printReport() {
    window.print();
}
</script>
@endsection
