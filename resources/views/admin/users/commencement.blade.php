@extends('admin.master')

@section('content')

<style>
    .report-card {
        max-width: 900px;
        margin: 0 auto;
        background: #fff;
    }
    @media print {
        body * { visibility: hidden; }
        #printArea, #printArea * { visibility: visible; }
        #printArea { position: absolute; left: 0; top: 0; width: 100%; }
        button { display: none !important; }
    }
</style>

<div class="container py-5">
    <div class="report-card card shadow-sm border-0" id="printArea">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3 px-4">
            <div>
                <h4 class="mb-0 fw-bold">Angelina's Day Care</h4>
                <small>Employee Commencement Report</small>
            </div>
            <div class="text-end">
                <img src="{{ isset($company->company_logo) ? asset('images/company/'.$company->company_logo) : '' }}" alt="Logo" width="70" height="70" class="rounded-circle border bg-white p-1">
            </div>
        </div>

        <div class="card-body p-4">
            <!-- Report Header -->
            <div class="text-center mb-4">
                <h5 class="fw-bold text-uppercase mb-1">Employee Commencement Details</h5>
                <p class="text-muted small mb-0">Secure & Confidential</p>
            </div>

            <!-- Employee Info -->
            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <strong>Full Name:</strong>
                    <p class="mb-0">{{ $employee->name ?? '—' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <strong>Position:</strong>
                    <p class="mb-0">{{ $employee->position ?? '—' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <strong>Phone Number:</strong>
                    <p class="mb-0">{{ $employee->phone ?? '—' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <strong>Email Address:</strong>
                    <p class="mb-0">{{ $employee->email ?? '—' }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <strong>Date of Birth:</strong>
                    <p class="mb-0">{{ \Carbon\Carbon::parse($employee->dob ?? now())->format('d M, Y') }}</p>
                </div>
            </div>

            <hr>

            <!-- Acknowledgement Section -->
            <div class="acknowledgement-section mb-4">
                <h6 class="fw-bold mb-3 text-uppercase text-primary">Acknowledgement of Receipt</h6>
                <p class="small text-muted mb-2">The employee has received and reviewed the following documents:</p>

                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item">1. Employee Handbook</li>
                    <li class="list-group-item">2. Health and Safety Policies</li>
                    <li class="list-group-item">3. Code of Conduct</li>
                    <li class="list-group-item">4. Confidentiality Agreement</li>
                    <li class="list-group-item">5. Job Description</li>
                </ul>

                <div class="row">
                    <div class="col-md-6">
                        <strong>Acknowledged:</strong>
                        <p class="mb-0">
                            <span class="badge bg-{{ ($employee->acknowledge ?? '') == 'Yes' ? 'success' : 'danger' }}">
                                {{ $employee->acknowledge ?? 'No' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Signature Section -->
            <div class="signature-section mt-4">
                <h6 class="fw-bold mb-3 text-uppercase text-primary">Signature</h6>
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3">
                        <p class="small text-muted mb-1">Employee Signature:</p>
                        @if(!empty($employee->signature))
                            <img src="{{ asset('storage/'.$employee->signature) }}" alt="Signature" width="180" class="border p-2 rounded">
                        @else
                            <p>—</p>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <p class="small text-muted mb-1">Signed Date:</p>
                        <p class="mb-0">{{ \Carbon\Carbon::parse($employee->signedDate ?? now())->format('d M, Y') }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Footer Section -->
            <div class="mt-4">
                <p class="small text-muted mb-1">
                    <em>By signing this document, the employee confirms that all information provided is true and correct to the best of their knowledge.</em>
                </p>
                <p class="small text-muted mb-0">Generated on: {{ now()->format('d M, Y h:i A') }}</p>
            </div>
        </div>
    </div>

    <!-- Print Button -->
    <div class="text-center mt-4">
        <button onclick="printReport()" class="btn btn-outline-primary px-4">
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

