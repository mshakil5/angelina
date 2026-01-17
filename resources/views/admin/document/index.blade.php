@extends('admin.master')

@section('content')
<!-- Main content -->
<section class="content" id="newBtnSection">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <button type="button" class="btn btn-secondary my-3" id="newBtn">Add new</button>
            </div>
        </div>
    </div>
</section>

<section class="content pt-4" id="addThisFormContainer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="card card-outline card-secondary shadow-sm">
                    <div class="card-header bg-white">
                        <h3 class="card-title font-weight-bold" id="cardTitle">
                            <i class="fas fa-file-upload mr-2 text-secondary"></i>Add New Documents
                        </h3>
                    </div>
                    
                    <form id="createThisForm" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" id="codeid" name="codeid">
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="category">Category <span class="text-danger">*</span></label>
                                        <select name="category" id="category" class="form-control select2 custom-select">
                                            <option value="Employee Dashboard">Employee Dashboard</option>
                                            <option value="Policy Manuals">Policy Manuals</option>
                                            <option value="Training Material">Training Material</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="title">Document Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="e.g. Q3 Security Guidelines">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="sl">Sort Order</label>
                                        <input type="number" class="form-control" id="sl" name="sl" value="0" min="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Note / Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Provide a brief context for this document..."></textarea>
                            </div>

                            <div class="row bg-light p-3 rounded border">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="document">Upload PDF</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="document" name="document" accept=".pdf">
                                                <label class="custom-file-label" for="document">Choose file</label>
                                            </div>
                                        </div>
                                        <small class="text-muted"><i class="fas fa-info-circle mr-1"></i> PDF format only</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="link">YouTube Reference Link</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-danger text-white border-danger">
                                                    <i class="fab fa-youtube"></i>
                                                </span>
                                            </div>
                                            <input type="url" class="form-control" id="link" name="link" placeholder="https://youtube.com/watch?v=...">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                
                            </div>
                        </div>

                        <div class="card-footer bg-white border-top text-right">
                            <button type="button" id="FormCloseBtn" class="btn btn-default px-4 mr-2">Cancel</button>
                            <button type="submit" id="addBtn" class="btn btn-secondary px-5 shadow-sm">
                                <i class="fas fa-check-circle mr-2"></i>Save Document
                            </button>
                        </div>
                    </form>
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
                        <h3 class="card-title">All Documents</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table cell-border table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Documents</th>
                                    <th>Video Link</th> <th>Sort No.</th>
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
<script>
    $(document).ready(function () {
        $("#addThisFormContainer").hide();
        $("#newBtn").click(function(){
            clearform();
            $("#newBtn").hide(100);
            $("#addThisFormContainer").show(300);
        });
        $("#FormCloseBtn").click(function(){
            $("#addThisFormContainer").hide(200);
            $("#newBtn").show(100);
            clearform();
        });

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        
        var url = "{{URL::to('/admin/documents')}}";
        var upurl = "{{URL::to('/admin/documents/update')}}";

        $("#addBtn").click(function(){
            var form_data = new FormData();
            form_data.append("title", $("#title").val());
            form_data.append("category", $("#category").val());
            form_data.append("description", $("#description").val());
            form_data.append("sl", $("#sl").val());
            form_data.append("link", $("#link").val());

            // Handle pdf upload
            var imageInput = document.getElementById('document');
            if(imageInput.files && imageInput.files[0]) {
                form_data.append("document", imageInput.files[0]);
            }

            if($(this).val() == 'Create') {
                // Create
                $.ajax({
                    url: url,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(res) {
                      clearform();
                      success(res.message);
                      pageTop();
                      reloadTable();
                    },
                    error: function(xhr) {
                      console.error(xhr.responseText);
                      pageTop();
                      if (xhr.responseJSON && xhr.responseJSON.errors)
                        error(Object.values(xhr.responseJSON.errors)[0][0]);
                      else
                        error();
                    }
                });
            } else {
                // Update
                form_data.append("codeid", $("#codeid").val());
                
                $.ajax({
                    url: upurl,
                    type: "POST",
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(res) {
                      clearform();
                      success(res.message);
                      pageTop();
                      reloadTable();
                    },
                    error: function(xhr) {
                      console.error(xhr.responseText);
                      pageTop();
                      if (xhr.responseJSON && xhr.responseJSON.errors)
                        error(Object.values(xhr.responseJSON.errors)[0][0]);
                      else
                        error();
                    }
                });
            }
        });

        //Edit
        $("#contentContainer").on('click','.edit', function(){
            $("#cardTitle").text('Update this documents');
            codeid = $(this).data('id');
            info_url = url + '/'+codeid+'/edit';
            $.get(info_url,{},function(d){
                populateForm(d);
            });
        });

        function populateForm(data){
            $("#title").val(data.title);
            $("#category").val(data.category);
            $("#description").val(data.description);
            $("#sl").val(data.sl);
            $("#codeid").val(data.id);
            
            // Set preview image
            if (data.image) {
                $("#preview-image").attr("src", '/images/documents/' + data.image).show();
            }

            $("#addBtn").val('Update');
            $("#addBtn").html('Update');
            $("#addThisFormContainer").show(300);
            $("#newBtn").hide(100);
        }
        
        function clearform(){
            $('#createThisForm')[0].reset();
            $("#addBtn").val('Create');
            $("#addBtn").html('Create');
            $("#addThisFormContainer").slideUp(200);
            $("#newBtn").slideDown(200);
            $('#preview-image').attr('src', '#');
            $("#cardTitle").text('Add new document');
        }
        
        previewImage('#image', '#preview-image');

        // Status toggle
        $(document).on('change', '.toggle-status', function() {
            var review_id = $(this).data('id');
            var status = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                url: '/admin/documents/status',
                method: "POST",
                data: {
                    review_id: review_id,
                    status: status,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                  success(res.message);
                  reloadTable();
                },
                error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                  error('Failed to update status');
                }
            });
        });

        //Delete
        $("#contentContainer").on('click','.delete', function(){
            if(!confirm('Are you sure you want to delete this document ?')) return;
            codeid = $(this).data('id');
            info_url = url + '/'+codeid;
            $.ajax({
                url: info_url,
                method: "GET",
                success: function(res) {
                  clearform();
                  success(res.message);
                  pageTop();
                  reloadTable();
                },
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

        var table = $('#example1').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('documents.index') }}",
                type: "GET",
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'category', name: 'category' },
                { data: 'title', name: 'title' },
                { data: 'document', name: 'document', orderable: false, searchable: false },
                { data: 'link', name: 'link', orderable: false }, // New Link Column
                { data: 'sl', name: 'sl' },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            responsive: true,
            lengthChange: false,
            autoWidth: false,
        });

        function reloadTable() {
          table.ajax.reload(null, false);
        }
    });
</script>
@endsection