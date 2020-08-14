<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Coderthemes">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>LaraBlog - Laravel Blog System</title>

        <!-- Base Css Files -->
        <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" />
        <!-- DataTables -->
        <link href="{{asset('assets/admin/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Font Icons -->
        <link href="{{asset('assets/admin/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/admin/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.css">
        <link href="{{asset('assets/admin/css/animate.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/admin/css/waves-effect.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/assets/modal-effect/css/component.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="/assets/admin//assets/notifications/notification.css" rel="stylesheet" />
        <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet" type="text/css" />
        
        <link href="{{asset('assets/admin/css/custom.css')}}" rel="stylesheet" type="text/css" />

        <script src="{{asset('assets/admin/js/modernizr.min.js')}}"></script>
        @stack('css')
        @routes
    </head>

    <body class="fixed-left">
        
         <!-- Begin page -->
         <div id="wrapper">
        
        @include('layouts.admin.include.header')

        @include('layouts.admin.include.sidebar')

        @yield('content')

        @include('layouts.admin.include.footer')
    
        </div>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/waves.js')}}"></script>
        <script src="{{asset('assets/admin/js/wow.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/js/jquery.scrollTo.min.js')}}"></script>
    
        <script src="{{asset('assets/admin/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('assets/admin/assets/jquery-detectmobile/detect.js')}}"></script>
        <script src="{{asset('assets/admin/assets/fastclick/fastclick.js')}}"></script>
        <script src="{{asset('assets/admin/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js"></script>
        <script src="{{asset('assets/admin/assets/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/admin/assets/datatables/dataTables.bootstrap.js')}}"></script>

        <script src="{{asset('assets/admin/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <!-- CUSTOM JS -->
        <script src="{{asset('assets/admin/js/jquery.app.js')}}"></script>
        <!-- Modal-Effect -->
        <script src="{{asset('assets/admin/assets/modal-effect/js/classie.js')}}"></script>
        <script src="{{asset('assets/admin/assets/modal-effect/js/modalEffects.js')}}"></script>
        <!-- Dashboard -->
        <script src="{{asset('assets/admin/js/jquery.dashboard.js')}}"></script>
        <!-- Todo -->
        <script src="{{asset('assets/admin/js/jquery.todo.js')}}"></script>
        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "3000",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
</script>


@if (Session::has('warning'))
    <script>
        toastr.warning("{{ Session::get('warning') }}", 'Warning');
    </script>
@endif

@if (Session::has('message'))
    <script>
        toastr.info("{{ Session::get('message') }}", 'Info');
    </script>
@endif

@if (Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}", 'Success');
    </script>
@endif

@if (Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}", 'Error');
    </script>
@endif

<script>
    // add csrf token to ajax request
    $.ajaxSetup({
        headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

</script>

<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
        toastr.error('{{$error}}', 'Error', {
            closeButton:true,
            progressBar:true,
        });
        @endforeach
    @endif
</script>
        @stack('js')
    </body>
</html>