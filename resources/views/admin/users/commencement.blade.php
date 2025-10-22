@extends('admin.master')

@section('content')



<section class="content" id="contentContainer">
    <div class="container-fluid">
        <div class="card card-secondary">
            <div class="card-header"><h3 class="card-title">Commencement</h3></div>
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



    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });



});
</script>
@endsection