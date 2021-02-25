<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin - Login</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ asset('admin-assets/images/favicon.ico')}}">

        <link href="{{ asset('admin-assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin-assets/css/icons.css ')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin-assets/css/style.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('admin-assets/css/toastr.min.css') }}">

    </head>


    <body class="fixed-left">
    	
        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div class="accountbg">
            <div class="content-center">
                <div class="content-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-8">
                                <div class="card">
                                    <div class="card-body">
                
                                        <h3 class="text-center mt-0 m-b-15">
                                            <a href="{{ route('admin.login')}}" class="logo logo-admin"><img src="{{ asset('admin-assets/images/logo-dark.png')}}" height="30" alt="logo"></a>
                                        </h3>
                
                                        <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>
                
                                        <div class="p-2">
                                            <form class="form-horizontal m-t-20" id="loginform" action="{{ route('admin.login')}}" method="post">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="email" name="email"  placeholder="Email">
                                                    </div>
                                                </div>
                
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control" type="password" name="password" placeholder="Password">
                                                    </div>
                                                </div>
                
                                                <div class="form-group text-center row m-t-20">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                                    </div>
                                                </div>
                
                                                <div class="form-group m-t-10 mb-0 row">
                                                   <!--  <div class="col-sm-7 m-t-20">
                                                        <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                    </div> -->
                                                   <!--  <div class="col-sm-5 m-t-20">
                                                        <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                                    </div> -->
                                                </div>
                                            </form>
                                        </div>
                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery  -->
        <script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/detect.js') }}"></script>
        <script src="{{ asset('admin-assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('admin-assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('admin-assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('admin-assets/js/waves.js') }}"></script>
        <script src="{{ asset('admin-assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('admin-assets/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/toastr.min.js') }}"></script>
        <!-- App js -->
        <script>
            var BASE_URL = "{{ config('app.url') }}";
            var appName = "{{ config('app.name') }}";
            var dashboardUrl = "{{ route('admin.dashboard') }}";
        </script>
        <script src="{{ asset('admin-assets/js/app.js') }}"></script>
        <script type="text/javascript">
            $("#loginform").validate({
                rules: {
                    password: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                },
                messages: {
                    password: {
                        required: "Please Enter a Password",
                    },
                    email: {
                        required: "Please Enter an Email",
                    },
                },
                submitHandler: function(form) {
                    $("#preloader").css("display", "inline-block");
                    $("#status").css("display", "inline-block");
                    $("#submit").attr("disabled", true);
                    var data = new FormData(form);
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('admin.login') }}",
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
                                toastr.success(response.message, appName)
                                window.location = dashboardUrl;
                            } else {
                                toastr.error(response.message, appName)
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
                                toastr.error(value, appName)
                            });
                        }
                    });
                }
            });
        </script>
    </body>
</html>