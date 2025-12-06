@extends('admin.master')
@section('title', 'References')

@section('content')
<div class="container-fluid pt-3">
    <div class="card card-secondary">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All References</h5>
        </div>
        <div class="card-body">
            <table id="referenceTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Candidate Name</th>
                        <th>Referee Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Criteria</th>
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
    $('#referenceTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('reference.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'created_at', name: 'created_at'},
            { data: 'candidate_first', name: 'candidate_first' },
            { data: 'referee_first', name: 'referee_first' },
            { data: 'referee_email', name: 'referee_email' },
            { data: 'country', name: 'country' },
            { data: 'criteria', name: 'criteria' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endsection
