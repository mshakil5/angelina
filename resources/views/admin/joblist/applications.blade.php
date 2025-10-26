@extends('admin.master')

@section('content')
<section class=" pt-3">
  <div class="container-fluid">
    <div class="card card-secondary">
      <div class="card-header">
        <h3 class="card-title">Job Applications</h3>
      </div>
      <div class="card-body">
        <table id="applicationsTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sl</th>
              <th>Applied At</th>
              <th>Job Title</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Resume</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script>
$(function() {
    let table = $('#applicationsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("job.applications") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable:false },
            { data: 'applied_at', name: 'applied_at' },
            { data: 'job_title', name: 'job_title' },
            { data: 'full_name', name: 'full_name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'resume', name: 'resume', orderable:false, searchable:false },
        ]
    });
});
</script>
@endsection