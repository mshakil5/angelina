@extends('admin.master')
@section('title', 'References List')

@section('content')
<div class="container-fluid pt-3">

    {{-- Success Message Alert --}}
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
            <h5 class="mb-0">All Reference Submissions</h5>
        </div>
        <div class="card-body">
            <table id="referenceTable" class="table table-hover table-bordered w-100">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Candidate</th>
                        <th>Referee Name</th>
                        <th>Capacity</th>
                        <th>Email</th>
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
            { data: 'candidate_name', name: 'candidate_name' }, // matches addColumn
            { data: 'referee_name', name: 'referee_name' },     // matches addColumn
            { data: 'relationship_type', name: 'relationship_type' },
            { data: 'referee_email', name: 'referee_email' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endsection