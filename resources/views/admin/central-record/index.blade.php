@extends('admin.master')

@section('content')
<section class="content" id="newBtnSection">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <button type="button" class="btn btn-secondary my-3" id="newBtn">Add New Record</button>
            </div>
        </div>
    </div>
</section>

<section class="content pt-2" id="addThisFormContainer" style="display:none;">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="card card-outline card-secondary shadow-sm">
                    <div class="card-header bg-white">
                        <h3 class="card-title font-weight-bold" id="cardTitle">
                            <i class="fas fa-file-alt mr-2 text-secondary"></i>Angelina’s Day Care Central Record
                        </h3>
                    </div>
                    
                    <form id="createThisForm" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" id="codeid" name="codeid">
                            
                            <h5 class="text-primary mb-3 border-bottom pb-2">Identity</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date Address ID Seen</label>
                                        <input type="date" class="form-control" id="date_address_id_seen" name="date_address_id_seen">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date Photo ID Seen</label>
                                        <input type="date" class="form-control" id="date_photo_id_seen" name="date_photo_id_seen">
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-primary mb-3 border-bottom pb-2 mt-4">Recruitment & Induction</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="application_pack_completed" name="application_pack_completed" value="Yes">
                                            <label class="form-check-label" for="application_pack_completed">Application Pack Completed</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Induction Completed Date</label>
                                        <input type="date" class="form-control" id="induction_completed_date" name="induction_completed_date">
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-primary mb-3 border-bottom pb-2 mt-4">Employment</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date Started with EY Provider</label>
                                        <input type="date" class="form-control" id="date_started_with_ey_provider" name="date_started_with_ey_provider">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input type="text" class="form-control" id="job_title" name="job_title">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Employment Status</label>
                                        <input type="text" class="form-control" id="employment_status" name="employment_status" placeholder="e.g. Employee">
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-primary mb-3 border-bottom pb-2 mt-4">Qualifications & Registration</h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="qualifications_required" name="qualifications_required" value="Yes">
                                        <label class="form-check-label" for="qualifications_required">Qualifications Required</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="qualifications_evidenced" name="qualifications_evidenced" value="Yes">
                                        <label class="form-check-label" for="qualifications_evidenced">Qualifications Evidenced</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="counts_in_ratios" name="counts_in_ratios" value="Yes">
                                        <label class="form-check-label" for="counts_in_ratios">Counts in Ratios</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date Qualifications Seen</label>
                                        <input type="date" class="form-control" id="date_qualifications_seen" name="date_qualifications_seen">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Qualification Level and Date</label>
                                        <textarea class="form-control" id="qualification_level_and_date" name="qualification_level_and_date" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-primary mb-3 border-bottom pb-2 mt-4">DBS / Suitability</h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date DBS Evidenced and Checked</label>
                                        <input type="date" class="form-control" id="date_dbs_evidenced_and_checked" name="date_dbs_evidenced_and_checked">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>DBS Disclosure Number</label>
                                        <input type="text" class="form-control" id="dbs_disclosure_number" name="dbs_disclosure_number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>DBS Issue Date</label>
                                        <input type="date" class="form-control" id="dbs_issue_date" name="dbs_issue_date">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check mt-4">
                                        <input type="checkbox" class="form-check-input" id="dbs_certificate_seen" name="dbs_certificate_seen" value="Yes">
                                        <label class="form-check-label" for="dbs_certificate_seen">DBS Certificate Seen</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>On DBS Update Service</label>
                                        <input type="text" class="form-control" id="on_dbs_update_service" name="on_dbs_update_service" value="N/A">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Overseas Police Check Required</label>
                                        <input type="text" class="form-control" id="overseas_police_check_required" name="overseas_police_check_required" value="N/A">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Overseas DBS Checks Completed</label>
                                        <input type="text" class="form-control" id="overseas_dbs_checks_completed" name="overseas_dbs_checks_completed" value="N/A">
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-primary mb-3 border-bottom pb-2 mt-4">Right to Work in the UK</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Evidence Seen</label>
                                        <input type="text" class="form-control" id="evidence_seen_rtw" name="evidence_seen_rtw" placeholder="e.g. British Citizen-Passport">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Visa / Work Permit Expiry Date</label>
                                        <input type="text" class="form-control" id="visa_work_permit_expiry_date" name="visa_work_permit_expiry_date" value="N/A">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Most Recent RTW Check Date</label>
                                        <input type="text" class="form-control" id="most_recent_rtw_check_date" name="most_recent_rtw_check_date" value="N/A">
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-primary mb-3 border-bottom pb-2 mt-4">Medical & References</h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="health_declaration_form_completed" name="health_declaration_form_completed" value="Yes">
                                        <label class="form-check-label" for="health_declaration_form_completed">Health Declaration Form Completed</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="reference_one_satisfactory" name="reference_one_satisfactory" value="Yes">
                                        <label class="form-check-label" for="reference_one_satisfactory">Reference One Satisfactory</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date Reference One Completed</label>
                                        <input type="date" class="form-control" id="date_reference_one_completed" name="date_reference_one_completed">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="reference_two_satisfactory" name="reference_two_satisfactory" value="Yes">
                                        <label class="form-check-label" for="reference_two_satisfactory">Reference Two Satisfactory</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date Reference Two Completed</label>
                                        <input type="date" class="form-control" id="date_reference_two_completed" name="date_reference_two_completed">
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-primary mb-3 border-bottom pb-2 mt-4">Verification</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Evidence Checked By</label>
                                        <input type="text" class="form-control" id="evidence_checked_by" name="evidence_checked_by">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Manager Signature</label>
                                        <input type="text" class="form-control" id="manager_signature" name="manager_signature">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date Verified</label>
                                        <input type="date" class="form-control" id="date_verified" name="date_verified">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer bg-white border-top text-right">
                            <button type="button" id="FormCloseBtn" class="btn btn-default px-4 mr-2">Cancel</button>
                            <button type="submit" id="addBtn" class="btn btn-secondary px-5 shadow-sm">
                                <i class="fas fa-check-circle mr-2"></i>Save Record
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
                        <h3 class="card-title mb-0">All Central Records</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table cell-border table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Job Title</th>
                                    <th>DBS Number</th>
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
        
        var url = "{{ URL::to('/admin/central-records') }}";
        var upurl = "{{ URL::to('/admin/central-records/update') }}";

        $("#createThisForm").on('submit', function(e) {
            e.preventDefault();
            
            var btnText = $("#addBtn").html();
            var formData = new FormData(this);

            // Append codeid manually for update
            if ($("#codeid").val()) {
                formData.append("codeid", $("#codeid").val());
            }

            // Handle Checkboxes correctly for FormData
            $('input[type="checkbox"]').each(function() {
                if (!$(this).is(':checked')) {
                    formData.delete($(this).attr('name')); // Remove unchecked to let controller set 'No'
                }
            });

            var isUpdate = $("#addBtn").val() === 'Update';
            var requestUrl = isUpdate ? upurl : url;

            $.ajax({
                url: requestUrl,
                method: "POST",
                contentType: false,
                processData: false,
                data: formData,
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

        // Edit
        $("#contentContainer").on('click', '.edit', function(){
            $("#cardTitle").text('Update Central Record');
            codeid = $(this).data('id');
            info_url = url + '/' + codeid + '/edit';
            $.get(info_url, {}, function(d){
                populateForm(d);
            });
        });

        function populateForm(data) {
            $("#name").val(data.name);
            $("#address").val(data.address);
            $("#date_of_birth").val(data.date_of_birth);
            $("#date_address_id_seen").val(data.date_address_id_seen);
            $("#date_photo_id_seen").val(data.date_photo_id_seen);
            
            $("#application_pack_completed").prop('checked', data.application_pack_completed === 'Yes');
            $("#induction_completed_date").val(data.induction_completed_date);
            
            $("#date_started_with_ey_provider").val(data.date_started_with_ey_provider);
            $("#job_title").val(data.job_title);
            $("#employment_status").val(data.employment_status);
            
            $("#qualifications_required").prop('checked', data.qualifications_required === 'Yes');
            $("#qualifications_evidenced").prop('checked', data.qualifications_evidenced === 'Yes');
            $("#date_qualifications_seen").val(data.date_qualifications_seen);
            $("#qualification_level_and_date").val(data.qualification_level_and_date);
            $("#counts_in_ratios").prop('checked', data.counts_in_ratios === 'Yes');
            
            $("#date_dbs_evidenced_and_checked").val(data.date_dbs_evidenced_and_checked);
            $("#dbs_disclosure_number").val(data.dbs_disclosure_number);
            $("#dbs_issue_date").val(data.dbs_issue_date);
            $("#dbs_certificate_seen").prop('checked', data.dbs_certificate_seen === 'Yes');
            $("#on_dbs_update_service").val(data.on_dbs_update_service);
            $("#overseas_police_check_required").val(data.overseas_police_check_required);
            $("#overseas_dbs_checks_completed").val(data.overseas_dbs_checks_completed);
            
            $("#evidence_seen_rtw").val(data.evidence_seen_rtw);
            $("#visa_work_permit_expiry_date").val(data.visa_work_permit_expiry_date);
            $("#most_recent_rtw_check_date").val(data.most_recent_rtw_check_date);
            
            $("#health_declaration_form_completed").prop('checked', data.health_declaration_form_completed === 'Yes');
            
            $("#reference_one_satisfactory").prop('checked', data.reference_one_satisfactory === 'Yes');
            $("#date_reference_one_completed").val(data.date_reference_one_completed);
            $("#reference_two_satisfactory").prop('checked', data.reference_two_satisfactory === 'Yes');
            $("#date_reference_two_completed").val(data.date_reference_two_completed);
            
            $("#evidence_checked_by").val(data.evidence_checked_by);
            $("#manager_signature").val(data.manager_signature);
            $("#date_verified").val(data.date_verified);

            $("#codeid").val(data.id);
            $("#addBtn").val('Update');
            $("#addBtn").html('Update');
            $("#addThisFormContainer").show(300);
            $("#newBtn").hide(100);
        }
        
        function clearform() {
            $('#createThisForm')[0].reset();
            $('input[type="checkbox"]').prop('checked', false);
            $("#addBtn").val('Create');
            $("#addBtn").html('<i class="fas fa-check-circle mr-2"></i>Save Record');
            $("#addThisFormContainer").slideUp(200);
            $("#newBtn").slideDown(200);
            $("#cardTitle").text('Add New Central Record');
        }

        // Delete
        $("#contentContainer").on('click', '.delete', function(){
            if(!confirm('Are you sure you want to delete this record?')) return;
            codeid = $(this).data('id');
            info_url = url + '/' + codeid;
            $.ajax({
                url: info_url,
                method: "GET",
                success: function(res) {
                    success(res.message);
                    pageTop();
                    reloadTable();
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    error();
                }
            });
        });

        // DataTable
        var table = $('#example1').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('central-records.index') }}",
                type: "GET"
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'job_title', name: 'job_title' },
                { data: 'dbs_disclosure_number', name: 'dbs_disclosure_number' },
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