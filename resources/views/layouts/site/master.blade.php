<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Ruft Blog</title>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700|Roboto:400,500" rel="stylesheet">


        <link href="/assets/site/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="/asstes/site/css/material-design-iconic-font.min.css" rel="stylesheet">

	<link rel="stylesheet" href="/assets/site/css/linearicons.css">
	<link rel="stylesheet" href="/assets/site/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.css">
	<link rel="stylesheet" href="/assets/site/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/site/css/magnific-popup.css">
	<link rel="stylesheet" href="/assets/site/css/nice-select.css">
	<link rel="stylesheet" href="/assets/site/css/animate.min.css">
	<link rel="stylesheet" href="/assets/site/css/owl.carousel.css">
    <link rel="stylesheet" href="/assets/site/css/main.css">
    <link rel="stylesheet" href="/assets/site/css/custom.css">
    @stack('css')
</head>

<body>

@include('layouts.site.include.header')

@yield('content')

@include('layouts.site.include.footer')

	<script src="/assets/site/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="/assets/siteassets/site/js/vendor/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="/assets/site/js/easing.min.js"></script>
	<script src="/assets/site/js/hoverIntent.js"></script>
	<script src="/assets/site/js/superfish.min.js"></script>
	<script src="/assets/site/js/jquery.ajaxchimp.min.js"></script>
	<script src="/assets/site/js/jquery.magnific-popup.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js"></script>
	<script src="/assets/site/js/owl.carousel.min.js"></script>
	<script src="/assets/site/js/jquery.nice-select.min.js"></script>
	<script src="/assets/site/js/waypoints.min.js"></script>
	<script src="/assets/site/js/mail-script.js"></script>
    <script src="/assets/site/js/main.js"></script>
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
