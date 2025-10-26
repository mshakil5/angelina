@extends('admin.master')

@section('content')
<section class="content" id="newBtnSection">
  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
        <button type="button" class="btn btn-secondary my-3" id="newBtn">Add new</button>
      </div>
    </div>
  </div>
</section>

<section class="content mt-3" id="addThisFormContainer">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col-md-10">
        <div class="card card-secondary">
          <div class="card-header"><h3 class="card-title" id="cardTitle">Add new job</h3></div>
          <div class="card-body">
            <form id="createThisForm">@csrf
              <input type="hidden" id="codeid" name="codeid">
              <div class="form-group">
                <label>Title <span class="text-danger">*</span></label>
                <input type="text" id="title" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Category <span class="text-danger">*</span></label>
                <input type="text" id="category" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Location <span class="text-danger">*</span></label>
                <input type="text" id="location" class="form-control" required>
              </div>
              <div class="form-group"><label>Description</label><textarea id="description" class="form-control summernote" rows="4"></textarea></div>
            </form>
          </div>
          <div class="card-footer">
            <button type="submit" id="addBtn" class="btn btn-secondary" value="Create">Create</button>
            <button type="button" id="FormCloseBtn" class="btn btn-default">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content" id="contentContainer">
  <div class="container-fluid">
    <div class="card card-secondary">
      <div class="card-header"><h3 class="card-title">All Jobs</h3></div>
      <div class="card-body">
        <table id="example1" class="table cell-border table-striped">
          <thead><tr><th>Sl</th><th>Title</th><th>Category</th><th>Location</th><th>Status</th><th>Action</th></tr></thead>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script>
$(function(){

  $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
  $("#addThisFormContainer").hide();
  $("#newBtn").click(()=>{ clearform(); $("#newBtn").hide(); $("#addThisFormContainer").show(300); });
  $("#FormCloseBtn").click(()=>{ $("#addThisFormContainer").hide(200); $("#newBtn").show(100); clearform(); });

  var url = "{{ url('/admin/joblist') }}";
  var upurl = "{{ url('/admin/joblist-update') }}";

  let table = $('#example1').DataTable({
      processing:true, serverSide:true, ajax:'{{ route("alljoblist") }}',
      columns:[
        { data:'DT_RowIndex', name:'DT_RowIndex', orderable:false, searchable:false },
        { data:'title', name:'title' },
        { data:'category', name:'category' },
        { data:'location', name:'location' },
        { data:'status', name:'status', orderable:false, searchable:false },
        { data:'action', name:'action', orderable:false, searchable:false },
      ]
  });

  function reloadTable(){ table.ajax.reload(null,false); }

  $("#addBtn").click(function(){
    let action = $(this).val();
    let form_data = new FormData();
    form_data.append("title", $("#title").val());
    form_data.append("category", $("#category").val());
    form_data.append("location", $("#location").val());
    form_data.append("description", $("#description").val());
    if(action=='Update') form_data.append("codeid", $("#codeid").val());
    $.ajax({
      url: action=='Create'?url:upurl, method:"POST", data:form_data, processData:false, contentType:false,
      success: res=>{ success(res.message); clearform(); reloadTable(); },
      error: function(xhr) {
        console.error(xhr.responseText);
        pageTop();
        if (xhr.responseJSON && xhr.responseJSON.errors)
          error(Object.values(xhr.responseJSON.errors)[0][0]);
        else
          error();
      }
    });
  });

  $("#contentContainer").on('click','.edit',function(){
    let id=$(this).data('id');
    $.get(url+'/'+id+'/edit',{},d=>{ populateForm(d); });
  });

  $("#contentContainer").on('click','.delete',function(){
    if(!confirm('Sure?')) return;
    let id=$(this).data('id');
    $.ajax({url:url+'/'+id,method:"GET",success:r=>{success(r.message);reloadTable();}});
  });

  $(document).on('change','.toggle-status',function(){
    let id=$(this).data('id'),status=$(this).prop('checked')?1:0;
    $.post('{{ url("/admin/joblist-status") }}',{job_id:id,status:status,_token:'{{ csrf_token() }}'},res=>{success(res.message);reloadTable();});
  });

  function populateForm(d){
    $("#title").val(d.title); $("#category").val(d.category);
    $("#location").val(d.location); $("#description").summernote('code', d.description ?? '');
    $("#codeid").val(d.id); $("#addBtn").val('Update').html('Update');
    $("#addThisFormContainer").show(300); $("#newBtn").hide();
  }
  function clearform(){
    $('#createThisForm')[0].reset();
    $("#addBtn").val('Create').html('Create');
    $("#description").summernote('code', '');
    $("#addThisFormContainer").slideUp(200); $("#newBtn").slideDown(200);
  }
});
</script>
@endsection