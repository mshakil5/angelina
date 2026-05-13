@extends('admin.master')
@section('title', 'DBS Submissions List')

@section('content')
<div class="container-fluid pt-3">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-3" role="alert">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">All DBS Submissions</h5>
        </div>
        <div class="card-body">
            <table id="dbsTable" class="table table-hover table-bordered w-100">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Applicant</th>
                        <th>Post Title</th>
                        <th>Email</th>
                        <th>Documents</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
 $(function () {
    $('#dbsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('dbs.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'created_at', name: 'created_at' },
            { data: 'applicant_name', name: 'applicant_name' },
            { data: 'post_title', name: 'post_title' },
            { data: 'declaration_email', name: 'declaration_email' },
            { data: 'docs_count', name: 'docs_count', orderable: false, searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endsection