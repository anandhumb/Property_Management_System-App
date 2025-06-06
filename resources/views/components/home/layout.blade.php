<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!--font-family-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- title of site -->
    <title>Index</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />

    <!--font-awesome.min.css') }}-->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!--linear icon css-->
    <link rel="stylesheet" href="{{ asset('assets/css/linearicons.css') }}">

    <!--animate.css') }}-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <!--flaticon.css') }}-->
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">

    <!--slick.css') }}-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">

    <!--bootstrap.min.css') }}-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- bootsnav -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootsnav.css') }}">

    <!--style.css') }}-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!--responsive.css') }}-->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <!-- HTML5 shim and Respond.js') }} for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js') }} doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
        <![endif]-->

</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!--header-top start -->
<x-home.header/>
    <!-- top-area End -->

    <!--welcome-hero start -->
    @if(session()->has('status'))
    <div class="alert alert-success">
        {{ session()->get('status') }}
    </div>
@endif
    <x-home.content>
 {{ $slot }}
    </x-home.content>
    
    <!--footer start-->
    <x-home.footer/>
    <!--/.footer-->
    <!--footer end-->

    <!-- Include all js compiled plugins (below), or include individual files as needed -->

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
        
        <!--modernizr.min.js') }}-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js') }}"></script>
		
		<!--bootstrap.min.js') }}-->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		
		<!-- bootsnav js -->
		<script src="{{ asset('assets/js/bootsnav.js') }}"></script>

        <!--feather.min.js') }}-->
        <script  src="{{ asset('assets/js/feather.min.js') }}"></script>

        <!-- counter js -->
		<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
		<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>

        <!--slick.min.js') }}-->
        <script src="{{ asset('assets/js/slick.min.js') }}"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js') }}"></script>
		     
        <!--Custom JS-->
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        
    </body>
	
</html>