@extends('admin.layouts.master')
    
@section('title')
    Change Password
@endsection   

@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Profile</a></li>
                        <li class="breadcrumb-item"><a href="#">Change Password</a></li>
                    </ol>
                </div>
                <h5 class="page-title">Change Password</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <form id="change_password" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="old_password" value="" id="old_password" placeholder="Current Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="new_password" value="" id="new_password" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" value="" id="confirm_password">
                                        </div>
                                    </div>
                                    <div class="form-group pull-right">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Submit
                                            </button>
                                            <a href="{{ route('admin.dashboard')}}" class="btn btn-secondary waves-effect m-l-5">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>

@endsection

@section('js')
	<script type="text/javascript">
         var logoutUrl = "{{ route('admin.logout') }}";
		 $("#change_password").validate({
            rules: {
                old_password: {
                    required: true,
                },
                new_password: {
                    required: true,
                    minlength : 6,
                },
                confirm_password:{
                	required: true,	
                	equalTo : "#new_password",
                	minlength : 6,
                }
            },
            messages: {
                old_password: {
                    required: "Please Enter a current password",
                },
                new_password: {
                    required: "Please Enter a new password",
                },
                confirm_password:{
                	required: "Please confirm a password",	
                }
            },
            submitHandler: function(form) {
                $("#preloader").css("display", "inline-block");
                $("#status").css("display", "inline-block");
                $("#submit").attr("disabled", true);
                var data = new FormData(form);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.change-password.post') }}",
                    dataType: 'json',
                    data: data,
                    async: true,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#preloader").css("display", "none");
                        $("#status").css("display", "none");
                        $("#submit").attr("disabled", false);
                        if (response.success == true) {
                            toastr.success(response.message);
                            window.location = logoutUrl;
                        } else {
                            toastr.error(response.message)
                            return false;
                        }
                    },
                    error: function(response) {
                        $("#preloader").css("display", "none");
                        $("#status").css("display", "none");
                        $("#submit").attr("disabled", false);
                        var i;
                        var res = response.responseJSON.errors;
                        $.each(res, function(key, value) {
                            toastr.error(value)
                        });
                    }
                });
            }
        });
	</script>
@endsection