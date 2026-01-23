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

<section class="content pt-4" id="addThisFormContainer">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <form id="createThisForm">
                    <div class="card card-outline card-secondary shadow-sm">
                        <div class="card-header bg-white">
                            <h3 class="card-title font-weight-bold" id="cardTitle">
                                <i class="fas fa-user-plus mr-2 text-secondary"></i>Add New Employee
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <input type="hidden" id="id" name="id">

                            <div class="row mb-3">
                                <div class="col-12 border-bottom mb-3">
                                    <h5 class="text-muted"><i class="fas fa-info-circle mr-2"></i>Personal Information</h5>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="name">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-border border-width-2" id="name" name="name" placeholder="Enter full name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" class="form-control form-control-border" id="dob" name="dob">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Employee Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control form-control-border" id="email" name="email" placeholder="email@company.com" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-border" id="phone" name="phone" placeholder="+1..." required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">Residential Address <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-border" id="address" name="address" placeholder="Street, City, State, ZIP" required>
                                    </div>
                                </div>


                                <div class="col-12 border-bottom mb-3 mt-4">
                                    <h5 class="text-muted"><i class="fas fa-briefcase mr-2"></i>Employment Details</h5>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="text" class="form-control" name="position" id="position">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Hourly Rate</label>
                                        <input type="number" step="0.01" class="form-control" name="hourly_rate" id="hourly_rate">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>NI Number</label>
                                        <input type="text" class="form-control" name="ni_number" id="ni_number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Contractual Hours</label>
                                        <input type="number" class="form-control" name="contractual_hour" id="contractual_hour">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>P45 Provided?</label>
                                        <select class="form-control" name="p45_provided" id="p45_provided">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 border-bottom mb-3 mt-4">
                                    <h5 class="text-muted"><i class="fas fa-umbrella-beach mr-2"></i>Holiday Tracking</h5>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Holiday Entitled (Hrs)</label>
                                        <input type="number" class="form-control" name="holiday_entitle" id="holiday_entitle">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Holiday Taken (Hrs)</label>
                                        <input type="number" class="form-control" name="holiday_hour_taken" id="holiday_hour_taken">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Amount Paid</label>
                                        <input type="number" step="0.01" class="form-control" name="holiday_amount_paid" id="holiday_amount_paid">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Remaining</label>
                                        <input type="number" class="form-control" name="holiday_remaining" id="holiday_remaining">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Other Comments</label>
                                        <textarea class="form-control" name="other_comments" id="other_comments" rows="2"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col-12 border-bottom mb-3 mt-2">
                                    <h5 class="text-muted"><i class="fas fa-id-card-alt mr-2"></i>Emergency Contacts</h5>
                                </div>

                                <div class="col-12 border-bottom mb-3 mt-2">
                                    <h6 class="text-muted">Contact One</h6>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="small text-uppercase"> Contact Name</label>
                                        <input type="text" class="form-control shadow-sm" id="emergency_name" name="emergency_name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="small text-uppercase"> Email</label>
                                        <input type="email" class="form-control shadow-sm" id="emergency_email" name="emergency_email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="small text-uppercase"> Phone</label>
                                        <input type="text" class="form-control shadow-sm" id="emergency_phone" name="emergency_phone">
                                    </div>
                                </div>
                                <div class="col-12 border-bottom mb-3 mt-2">
                                    <h6 class="text-muted">Contact Two</h6>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="small text-uppercase text-muted"> Contact Name</label>
                                        <input type="text" class="form-control shadow-sm" id="emergency_name2" name="emergency_name2">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="small text-uppercase text-muted"> Email</label>
                                        <input type="email" class="form-control shadow-sm" id="emergency_email2" name="emergency_email2">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="small text-uppercase text-muted"> Phone</label>
                                        <input type="text" class="form-control shadow-sm" id="emergency_phone2" name="emergency_phone2">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 border-bottom mb-3 mt-2">
                                    <h5 class="text-muted"><i class="fas fa-lock mr-2"></i>Account Security</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light text-right">
                            <button type="button" id="FormCloseBtn" class="btn btn-link text-muted mr-2">Cancel</button>
                            <button type="submit" id="addBtn" class="btn btn-secondary px-5 shadow-sm">
                                <i class="fas fa-save mr-2"></i>Create Employee
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="content" id="contentContainer">
    <div class="container-fluid">
        <div class="card card-secondary">
            <div class="card-header"><h3 class="card-title">Employee</h3></div>
            <div class="card-body">
                <table id="userTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Commencement</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
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
        clearForm();
        $("#newBtnSection").hide();
        $("#addThisFormContainer").show();
    });

    $("#FormCloseBtn").click(function(){
        clearForm();
        $("#addThisFormContainer").hide();
        $("#newBtnSection").show();
    });

    function clearForm(){
        $('#createThisForm')[0].reset();
        $("#cardTitle").text('Add new User');
        $("#addBtn").val('Create').html('Create');
        $("#addThisFormContainer").hide();  // hide the form
        $("#newBtnSection").show(); 
    }

    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

    // Initialize Yajra DataTable
    var table = $('#userTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('user.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable:false },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'status', name: 'status', orderable:false, searchable:false },
            { data: 'commencement', name: 'commencement', orderable:false, searchable:false },
            { data: 'action', name: 'action', orderable:false, searchable:false }
        ]
    });

    // Create & Update
    $("#createThisForm").on('submit', function(e){
        e.preventDefault();
        var actionUrl = $("#addBtn").val() === 'Create' ? "{{ route('user.store') }}" : "{{ route('user.update') }}";
        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: $(this).serialize(),
            success: function(res){
                clearForm();
                table.ajax.reload(null, false);
                success(res.message);
            },
            error: function(xhr){
                if(xhr.responseJSON && xhr.responseJSON.errors)
                    error(Object.values(xhr.responseJSON.errors)[0][0]);
                else error();
            }
        });
    });

    // Edit
    $('#userTable').on('click', '.edit', function(){
        var id = $(this).data('id');
        $.get("{{ url('/admin/user') }}/"+id+"/edit", function(user){
            $("#name").val(user.name);
            $("#email").val(user.email);
            $("#phone").val(user.phone);
            $("#address").val(user.address);
            $("#dob").val(user.dob);
            $("#emergency_name").val(user.emergency_name);
            $("#emergency_email").val(user.emergency_email);
            $("#emergency_phone").val(user.emergency_phone);
            $("#emergency_name2").val(user.emergency_name2);
            $("#emergency_email2").val(user.emergency_email2);
            $("#emergency_phone2").val(user.emergency_phone2);

            $("#position").val(user.position);
            $("#start_date").val(user.start_date);
            $("#end_date").val(user.end_date);
            $("#hourly_rate").val(user.hourly_rate);
            $("#ni_number").val(user.ni_number);
            $("#p45_provided").val(user.p45_provided);
            $("#contractual_hour").val(user.contractual_hour);
            $("#holiday_entitle").val(user.holiday_entitle);
            $("#holiday_hour_taken").val(user.holiday_hour_taken);
            $("#holiday_amount_paid").val(user.holiday_amount_paid);
            $("#holiday_remaining").val(user.holiday_remaining);
            $("#other_comments").val(user.other_comments);


            $("#id").val(user.id);
            $("#password, #password_confirmation").prop('required', false);
            $("#addBtn").val('Update').html('Update');
            $("#cardTitle").text('Update User');
            $("#addThisFormContainer").show();
            $("#newBtnSection").hide();
        });
    });

    // Delete
    $('#userTable').on('click', '.delete', function(){
        if(!confirm('Are you sure?')) return;
        var id = $(this).data('id');
        $.get("{{ url('/admin/user') }}/"+id+"/delete", function(res){
            table.ajax.reload(null, false);
        });
    });

    // Status toggle
    $('#userTable').on('change', '.toggle-status', function(){
        var id = $(this).data('id');
        $.post("{{ route('user.status') }}", {id:id}, function(res){
            success(res.message);
            table.ajax.reload(null, false);
        });
    });
});
</script>
@endsection