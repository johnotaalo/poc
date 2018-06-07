<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="POC Dashboard">
    <meta name="author" content="CHAI Kenya">
	<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
	<!-- Bootstrap Core CSS -->
    <?php
        $secure = (env('APP_ENV') == "local") ? false : true;
    ?>
    <link href="{{ my_asset('dashboard/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- This is Sidebar menu CSS -->
    <link href="{{ my_asset('dashboard/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="{{ my_asset('dashboard/css/animate.css') }}" rel="stylesheet">
    @yield('page_css')
    <!-- This is a Custom CSS -->
    <link href="{{ my_asset('dashboard/css/style.css') }}" rel="stylesheet">
    <link href="{{ my_asset('dashboard/css/colors/default.css') }}" id="theme" rel="stylesheet">
	<title></title>

	<style>
		#page-wrapper{
			margin-left: 0px !important;
		}

		.footer{
			left: 0px !important;
		}
	</style>
</head>
<body class="">
	<!-- Preloader -->
	<div class="preloader">
		<div class="cssload-speeding-wheel"></div>
	</div>

	<div id="wrapper">

		<div id="page-wrapper">
            <div class="text-center">
                <h2>POC SURVEY ANALYSIS</h2>
            </div>
            
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> <?= @date('Y'); ?> &copy; Ministry of Health </footer>
        </div>
	</div>
	<script src="{{ my_asset('dashboard/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ my_asset('dashboard/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ my_asset('dashboard/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
	<script src="{{ my_asset('dashboard/js/jquery.slimscroll.js') }}"></script>
	<script src="{{ my_asset('dashboard/js/waves.js') }}"></script>
	<script src="{{ my_asset('dashboard/js/custom.min.js') }}"></script>

    @yield('page_js')
</body>
</html>