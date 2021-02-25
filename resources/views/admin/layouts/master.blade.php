<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin - @yield('title')</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('admin-assets/images/favicon.ico')}}">
        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{ asset('admin-assets/plugins/morris/morris.css')}}">
        <link href="{{ asset('admin-assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin-assets/css/icons.css ')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin-assets/css/style.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin-assets/css/toastr.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"  rel="stylesheet">
        <link href="{{ asset('admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" >
        <link href="{{ asset('admin-assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">

        @yield('css')
    </head>

    <body class="fixed-left">
        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.layouts.include.sidebar')

            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">

                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    @include('admin.layouts.include.header')
                    <!-- Top Bar End -->

                    <!-- Page Content -->
                    <div class="page-content-wrapper ">
                         @yield('content')
                    </div>
                    <!-- End Page Content -->
                </div>
                <!-- End content -->

                <!-- Footer -->
                @include('admin.layouts.include.footer')
                <!-- Footer -->
            </div>

            <!-- End Right content here -->
        </div>

        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('admin-assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('admin-assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('admin-assets/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/additional-methods.min.js') }}"></script>
        <script src="{{ asset('admin-assets/js/toastr.min.js') }}"></script>        
        <!--Morris Chart-->
        <script src="{{ asset('admin-assets/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('admin-assets/plugins/raphael/raphael-min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('admin-assets/js/app.js') }}"></script>
        <script src="{{ asset('admin-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin-assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
        <script src="{{ asset('admin-assets/plugins/ckeditor/ckeditor.js')}}"></script> 
        <script>
            var BASE_URL = "{{ config('app.url') }}";
            var appName = "{{ config('app.name') }}";
            <?php if(Session::has('message')) { ?>
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}",appName);
                        break;
                    
                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}",appName);
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}",appName);
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}",appName);
                        break;
                }
            <?php } ?>
        </script>
        
        @yield('js')
    </body>
</html>