<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Moltran - Responsive Admin Dashboard Template</title>

        <!-- Base Css Files -->
        <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" />
        <!-- DataTables -->
        <link href="{{asset('assets/admin/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Font Icons -->
        <link href="{{asset('assets/admin/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/admin/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/admin/css/material-design-iconic-font.min.css')}}" rel="stylesheet">
    
        <!-- animate css -->
        <link href="{{asset('assets/admin/css/animate.css')}}" rel="stylesheet" />
       
        <!-- Waves-effect -->
        <link href="{{asset('assets/admin/css/waves-effect.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/assets/modal-effect/css/component.css')}}" rel="stylesheet">
     
        <!-- Custom Files -->
        <link href="{{asset('assets/admin/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet" type="text/css" />

        <script src="{{asset('assets/admin/js/modernizr.min.js')}}"></script>
        @stack('css')
    </head>

    <body class="fixed-left">
        
         <!-- Begin page -->
         <div id="wrapper">
        
        @include('layouts.admin.include.header')

        @include('layouts.admin.include.sidebar')

        @yield('content')

        @include('layouts.admin.include.footer')
        </div>
        <!-- END wrapper -->



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
       
      

        <script src="{{asset('assets/admin/assets/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/admin/assets/datatables/dataTables.bootstrap.js')}}"></script>
        <!-- Counter-up -->
        <script src="{{asset('assets/admin/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <!-- CUSTOM JS -->
        <script src="{{asset('assets/admin/js/jquery.app.js')}}"></script>
        <!-- Modal-Effect -->
        <script src="{{asset('assets/admin/assets/modal-effect/js/classie.js')}}"></script>
        <script src="{{asset('assets/admin/assets/modal-effect/js/modalEffects.js')}}"></script>
        <!-- Dashboard -->
        <script src="{{asset('assets/admin/js/jquery.dashboard.js')}}"></script>
        <!-- Chat -->
        <script src="{{asset('assets/admin/js/jquery.chat.js')}}"></script>
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
        @include('sweetalert::alert')
        @stack('js')
    </body>
</html>