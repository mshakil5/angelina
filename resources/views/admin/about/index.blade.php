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
    <div class="row justify-content-center">
      <div class="col-md-11"> <div class="card card-outline card-secondary shadow-sm">
          <div class="card-header">
            <h3 class="card-title font-weight-bold" id="cardTitle">
              <i class="fas fa-edit mr-2"></i>Add New Content
            </h3>
          </div>
          
          <div class="card-body">
            <form id="createThisForm" enctype="multipart/form-data">
              @csrf
              <input type="hidden" id="codeid" name="codeid">
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="font-weight-600">Short Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control border-secondary" id="title" name="title" placeholder="Enter short title">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Long Title</label>
                    <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Enter long title">
                  </div>
                </div>

                <div class="col-12"><hr class="my-3"></div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label><i class="fas fa-align-left mr-1"></i> Short Description</label>
                    <textarea class="form-control summernote" id="short_description" name="short_description"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label><i class="fas fa-align-justify mr-1"></i> Long Description</label>
                    <textarea class="form-control summernote" id="long_description" name="long_description"></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="badge badge-info mb-2">Right Column (Top)</label>
                    <textarea class="form-control summernote" id="right_top" name="right_top"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="badge badge-info mb-2">Right Column (Bottom)</label>
                    <textarea class="form-control summernote" id="right_bottom" name="right_bottom"></textarea>
                  </div>
                </div>

                <div class="col-12"><hr class="my-3"></div>

                <div class="col-md-12 bg-light p-3 rounded mb-4">
                  <label class="text-secondary font-weight-bold mb-3">Resource Links & Call-to-Actions</label>
                  <div id="dynamicFields">
                    <div class="row align-items-end field-row mb-3">
                      <div class="col-md-5">
                        <label class="small text-muted">Link / URL</label>
                        <input type="text" name="link[]" class="form-control" placeholder="https://...">
                      </div>
                      <div class="col-md-5">
                        <label class="small text-muted">Button Label / Name</label>
                        <input type="text" name="name[]" class="form-control" placeholder="e.g. Download Now">
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="btn btn-success btn-block addRow">
                          <i class="fas fa-plus"></i> Add
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                   <label class="text-secondary font-weight-bold mb-3">Media Assets (Images)</label>
                   <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="small font-weight-bold">Primary Image</label>
                          <input type="file" class="filepond" id="image1" name="image1">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="small font-weight-bold">Secondary Image</label>
                          <input type="file" class="filepond" id="image2" name="image2">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="small font-weight-bold">Additional Asset</label>
                          <input type="file" class="filepond" id="image3" name="image3">
                        </div>
                      </div>
                   </div>
                </div>
              </div>
            </form>
          </div>
          
          <div class="card-footer bg-white text-right">
            <button type="button" id="FormCloseBtn" class="btn btn-outline-danger px-4 mr-2">
                <i class="fas fa-times mr-1"></i> Discard
            </button>
            <button type="submit" id="addBtn" class="btn btn-secondary px-5" value="Create">
                <i class="fas fa-save mr-1"></i> Save Content
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="content" id="contentContainer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">All data</h3>
          </div>
          <div class="card-body">
            <table id="example1" class="table cell-border table-striped">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('script')
<link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css" rel="stylesheet">
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function () {
    // 1. Initialize Plugins
    $(".select2").select2({ width: '100%' });
    $('.summernote').summernote({ height: 150 });
    
    FilePond.registerPlugin(FilePondPluginImagePreview);
    const pond1 = FilePond.create(document.querySelector('#image1'));
    const pond2 = FilePond.create(document.querySelector('#image2'));
    const pond3 = FilePond.create(document.querySelector('#image3'));

    // 2. Setup Variables
    let url = "{{ url('admin/about') }}";
    let upurl = "{{ url('admin/about/update') }}";
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

    // 3. DataTable
    let table = $('#example1').DataTable({
        processing: true,
        serverSide: true,
        ajax: url,
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable:false },
            { data: 'title', name: 'title' },
            { data: 'status', name: 'status', orderable:false, searchable:false },
            { data: 'action', name: 'action', orderable:false, searchable:false },
        ]
    });

    // 4. Dynamic Row Logic
    $(document).on('click', '.addRow', function () {
        let row = `
        <div class="row align-items-end field-row mb-3">
            <div class="col-md-5"><input type="text" name="link[]" class="form-control" placeholder="Link"></div>
            <div class="col-md-5"><input type="text" name="name[]" class="form-control" placeholder="Name"></div>
            <div class="col-md-2"><button type="button" class="btn btn-danger removeRow">-</button></div>
        </div>`;
        $('#dynamicFields').append(row);
    });

    $(document).on('click', '.removeRow', function () {
        $(this).closest('.field-row').remove();
    });

    // 5. Form Toggle
    $("#newBtn").click(function(){
        clearform();
        $("#newBtn").hide();
        $("#addThisFormContainer").fadeIn();
    });

    $("#FormCloseBtn").click(function(){
        $("#addThisFormContainer").hide();
        $("#newBtn").show();
        clearform();
    });

    // 6. Save/Update Action
    $("#addBtn").click(function(){
        let form_data = new FormData();
        
        // Basic Fields
        form_data.append("id", $("#codeid").val());
        form_data.append("title", $("#title").val());
        form_data.append("sub_title", $("#sub_title").val());
        
        // Summernote Content
        form_data.append("short_description", $("#short_description").val());
        form_data.append("long_description", $("#long_description").val());
        form_data.append("right_top", $("#right_top").val());
        form_data.append("right_bottom", $("#right_bottom").val());

        // Dynamic Links & Names (Arrays)
        $("input[name='link[]']").each(function() { form_data.append("link[]", $(this).val()); });
        $("input[name='name[]']").each(function() { form_data.append("name[]", $(this).val()); });

        // Images from FilePond
        if(pond1.getFiles().length > 0) form_data.append("image1", pond1.getFiles()[0].file);
        if(pond2.getFiles().length > 0) form_data.append("image2", pond2.getFiles()[0].file);
        if(pond3.getFiles().length > 0) form_data.append("image3", pond3.getFiles()[0].file);

        let actionUrl = ($(this).val() == 'Create') ? url : upurl;

        $.ajax({
            url: actionUrl,
            method: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success: function(res){
                success(res.message);
                clearform();
                table.ajax.reload(null, false);
            },
            error: function(xhr){
                let errorMsg = xhr.responseJSON?.errors ? Object.values(xhr.responseJSON.errors)[0][0] : 'Error occurred';
                error(errorMsg);
            }
        });
    });

    // 7. Edit Logic
    $("#contentContainer").on('click','.edit', function(){
        let id = $(this).data('id');
        $.get(url+'/'+id+'/edit', function(d){
            $("#codeid").val(d.id);
            $("#title").val(d.title);
            $("#sub_title").val(d.sub_title);
            
            // Set Summernote
            $('#short_description').summernote('code', d.short_description);
            $('#long_description').summernote('code', d.long_description);
            $('#right_top').summernote('code', d.right_top);
            $('#right_bottom').summernote('code', d.right_bottom);

            // Handle Dynamic Fields
            $('#dynamicFields').html(''); // Clear existing
            if(d.links && d.links.length > 0) {
                d.links.forEach((val, index) => {
                    // Logic to populate d.link[] and d.name[] based on your DB structure
                });
            }

            // Handle Images
            pond1.removeFiles(); 
            if(d.image1) pond1.addFile("{{ asset('images/about') }}/"+d.image1);
            
            $("#addBtn").val('Update').text('Update');
            $("#cardTitle").text('Update Content');
            $("#addThisFormContainer").show();
            $("#newBtn").hide();
            window.scrollTo(0,0);
        });
    });

    function clearform(){
        $('#createThisForm')[0].reset();
        $('.summernote').summernote('reset');
        pond1.removeFiles();
        pond2.removeFiles();
        pond3.removeFiles();
        $("#addBtn").val('Create').text('Create');
        $("#cardTitle").text('Add new Content');
    }
});
</script>
@endsection