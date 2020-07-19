
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="images/favicon_1.ico">

    <!-- Base Css Files -->
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Font Icons -->
    <link href="{{asset('assets/admin/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

    <!-- animate css -->
    <link href="{{asset('assets/admin/css/animate.css')}}" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="{{asset('assets/admin/css/waves-effect.css')}}" rel="stylesheet">

    <!-- Custom Files -->
    <link href="{{asset('assets/admin/css/helper.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet" type="text/css" />


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{asset('assets/admin/js/modernizr.min.js')}}"></script>

</head>
<body class="web">


    @yield('content')


    <script>
        var resizefunc = [];
    </script>
    <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/waves.js')}}"></script>
    <script src="{{asset('assets/admin/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/admin/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('assets/admin/assets/jquery-detectmobile/detect.js')}}"></script>
    <script src="{{asset('assets/admin/assets/fastclick/fastclick.js')}}"></script>
    <script src="{{asset('assets/admin/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets/admin/assets/jquery-blockui/jquery.blockUI.js')}}"></script>
    <!-- CUSTOM JS -->
    <script src="{{asset('assets/admin/js/jquery.app.js')}}"></script>

</body>
</html>

