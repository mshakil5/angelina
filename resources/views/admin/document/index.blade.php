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
                                            <option value="Employee Dashboard" @selected(request('category_filter') == 'Employee Dashboard')>Employee Dashboard</option>
                                            <option value="Policy Manuals"     @selected(request('category_filter') == 'Policy Manuals')>Policy Manuals</option>
                                            <option value="Training Material"  @selected(request('category_filter') == 'Training Material')>Training Material</option>
                                            <option value="Staff"              @selected(request('category_filter') == 'Staff')>Staff</option>
                                            <option value="Child"             @selected(request('category_filter') == 'Child')>Child</option>
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
                                        <small class="text-danger"><i class="fas fa-info-circle mr-1"></i> PDF format only. Max size 15048 KB.</small>
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
                        </div>

                        <div class="card-footer bg-white border-top text-right">
                            <button type="button" id="FormCloseBtn" class="btn btn-default px-4 mr-2">Cancel</button>
                            {{-- ✅ value="Create" is critical so $(this).val() == 'Create' on first load --}}
                            <button type="submit" id="addBtn" value="Create" class="btn btn-secondary px-5 shadow-sm">
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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">All Documents</h3>
                        <div class="d-flex align-items-center">
                            <label class="mb-0 mr-2 font-weight-bold text-sm">Filter by Category:</label>
                            <select name="category_filter" id="category_filter" class="form-control form-control-sm" style="width: 200px;">
                                <option value="">All Categories</option>
                                <option value="Employee Dashboard" @selected(request('category_filter') == 'Employee Dashboard')>Employee Dashboard</option>
                                <option value="Policy Manuals"     @selected(request('category_filter') == 'Policy Manuals')>Policy Manuals</option>
                                <option value="Training Material"  @selected(request('category_filter') == 'Training Material')>Training Material</option>
                                <option value="Staff"              @selected(request('category_filter') == 'Staff')>Staff</option>
                                <option value="Child"             @selected(request('category_filter') == 'Child')>Child</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table cell-border table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Documents</th>
                                    <th>Video Link</th>
                                    <th>Sort No.</th>
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

        var url   = "{{ URL::to('/admin/documents') }}";
        var upurl = "{{ URL::to('/admin/documents/update') }}";

        // ===================== LOADER / SPINNER HELPERS =====================
        function showLoader($btn) {
            $btn.data('original-html', $btn.html());
            $btn.prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> Saving...');
        }

        function hideLoader($btn) {
            var original = $btn.data('original-html');
            if (original) {
                $btn.html(original);
            }
            $btn.prop('disabled', false);
        }

        // ===================== ERROR MESSAGE EXTRACTOR =====================
        // Pulls the most useful message out of an XHR response
        function extractErrorMessage(xhr) {
            if (!xhr) return 'Something went wrong. Please try again.';

            // Laravel validation errors (422) -> grab the first one
            if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                var errs = xhr.responseJSON.errors;
                var firstKey = Object.keys(errs)[0];
                if (firstKey && errs[firstKey][0]) {
                    return errs[firstKey][0];
                }
            }

            // Standard JSON error with `message`
            if (xhr.responseJSON && xhr.responseJSON.message) {
                return xhr.responseJSON.message;
            }

            // Generic fallback based on status code
            if (xhr.status === 0)   return 'Network error. Please check your connection.';
            if (xhr.status === 404) return 'The requested resource was not found.';
            if (xhr.status === 419) return 'Session expired. Please reload the page.';
            if (xhr.status >= 500)  return 'Server error. Please try again later.';

            return 'Something went wrong. Please try again.';
        }

        // ===================== CREATE / UPDATE =====================
        $("#addBtn").click(function(e){
            e.preventDefault();

            var $btn    = $(this);
            var btn_val = $btn.val();  // "Create" or "Update"

            var form_data = new FormData();
            form_data.append("title",       $("#title").val());
            form_data.append("category",    $("#category").val());
            form_data.append("description", $("#description").val());
            form_data.append("sl",          $("#sl").val());
            form_data.append("link",        $("#link").val());

            var imageInput = document.getElementById('document');
            if (imageInput.files && imageInput.files[0]) {
                form_data.append("document", imageInput.files[0]);
            }

            // 🔵 Show spinner on Save button
            showLoader($btn);

            if (btn_val === 'Create') {
                $.ajax({
                    url: url,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(res) {
                        hideLoader($btn);
                        clearform();
                        success(res.message || 'Document created successfully.');
                        pageTop();
                        reloadTable();
                    },
                    error: function(xhr) {
                        hideLoader($btn);
                        console.error(xhr.responseText);
                        pageTop();
                        error(extractErrorMessage(xhr));
                    }
                });
            } else {
                form_data.append("codeid", $("#codeid").val());
                $.ajax({
                    url: upurl,
                    type: "POST",
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(res) {
                        hideLoader($btn);
                        clearform();
                        success(res.message || 'Document updated successfully.');
                        pageTop();
                        reloadTable();
                    },
                    error: function(xhr) {
                        hideLoader($btn);
                        console.error(xhr.responseText);
                        pageTop();
                        error(extractErrorMessage(xhr));
                    }
                });
            }
        });

        // ===================== EDIT =====================
        $("#contentContainer").on('click', '.edit', function(){
            $("#cardTitle").html('<i class="fas fa-edit mr-2 text-secondary"></i>Update Document');
            var codeid = $(this).data('id');
            var info_url = url + '/' + codeid + '/edit';
            $.get(info_url, {}, function(d){
                populateForm(d);
            }).fail(function(xhr){
                error(extractErrorMessage(xhr));
            });
        });

        function populateForm(data){
            $("#title").val(data.title);
            $("#category").val(data.category).trigger('change');
            $("#description").val(data.description);
            $("#sl").val(data.sl);
            $("#link").val(data.link);
            $("#codeid").val(data.id);

            $("#addBtn").val('Update');
            $("#addBtn").html('<i class="fas fa-check-circle mr-2"></i>Update');

            $("#addThisFormContainer").show(300);
            $("#newBtn").hide(100);
        }

        function clearform(){
            $('#createThisForm')[0].reset();
            var filterCat = "{{ request('category_filter') }}";
            if (filterCat) {
                $("#category").val(filterCat).trigger('change');
            } else {
                $("#category").val('').trigger('change');
            }

            $("#addBtn").val('Create');
            $("#addBtn").html('<i class="fas fa-check-circle mr-2"></i>Save Document');
            $("#addThisFormContainer").slideUp(200);
            $("#newBtn").slideDown(200);
            $("#cardTitle").html('<i class="fas fa-file-upload mr-2 text-secondary"></i>Add New Documents');
        }

        // ===================== STATUS TOGGLE =====================
        $(document).on('change', '.toggle-status', function() {
            var $switch  = $(this);
            var review_id = $(this).data('id');
            var status    = $(this).prop('checked') ? 1 : 0;
            var prevChecked = !status; // previous state for rollback

            $.ajax({
                url: '/admin/documents/status',
                method: "POST",
                data: {
                    review_id: review_id,
                    status: status,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    success(res.message || 'Status updated successfully');
                    reloadTable();
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    // rollback UI on failure
                    $switch.prop('checked', prevChecked);
                    error(extractErrorMessage(xhr) || 'Failed to update status');
                }
            });
        });

        // ===================== DELETE =====================
        $("#contentContainer").on('click', '.delete', function(){
            if (!confirm('Are you sure you want to delete this document?')) return;

            var $btn    = $(this);
            var codeid  = $(this).data('id');
            var info_url = url + '/' + codeid;

            // small loading state on delete button
            var originalHtml = $btn.html();
            $btn.prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm"></span>');

            $.ajax({
                url: info_url,
                method: "GET",
                success: function(res) {
                    $btn.prop('disabled', false).html(originalHtml);
                    clearform();
                    // ✅ controller returns { success, message } here
                    if (res.success) {
                        success(res.message || 'Data deleted successfully.');
                    } else {
                        error(res.message || 'Failed to delete document.');
                    }
                    pageTop();
                    reloadTable();
                },
                error: function(xhr) {
                    $btn.prop('disabled', false).html(originalHtml);
                    console.error(xhr.responseText);
                    pageTop();
                    error(extractErrorMessage(xhr));
                }
            });
        });

        // ===================== DATATABLE =====================
        var table = $('#example1').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('documents.index') }}",
                type: "GET",
                data: function (d) {
                    d.category_filter = $('#category_filter').val();
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'category',    name: 'category' },
                { data: 'title',       name: 'title' },
                { data: 'document',    name: 'document',  orderable: false, searchable: false },
                { data: 'link',        name: 'link',       orderable: false },
                { data: 'sl',          name: 'sl' },
                { data: 'status',      name: 'status',     orderable: false, searchable: false },
                { data: 'action',      name: 'action',     orderable: false, searchable: false },
            ],
            responsive: true,
            lengthChange: false,
            autoWidth: false
        });

        // ===================== FILTER CHANGE =====================
        $('#category_filter').on('change', function () {
            var val = $(this).val();
            $('#category').val(val).trigger('change');
            table.draw();
        });

        function reloadTable() {
            table.ajax.reload(null, false);
        }
    });
</script>
@endsection