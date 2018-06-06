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
    <link href="{{ asset('dashboard/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- This is Sidebar menu CSS -->
    <link href="{{ asset('dashboard/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="{{ asset('dashboard/css/animate.css') }}" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/colors/default.css') }}" id="theme" rel="stylesheet">
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
		<!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
			<div class="navbar-header">
				{{--  <div class="top-left-part">  --}}
                    <!-- Logo -->
                    {{--  <a class="logo" href="{{ route('home') }}">
					{{ config('app.name', 'Laravel') }}
                    </a>  --}}
                {{--  </div>  --}}
                <!-- This is the message dropdown -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
                            <i class="icon-info"></i>
                            <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                        </a>
                    </li>
                </ul>
			</div>
		</nav>

		{{--  <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <!-- .User Profile -->
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"></div>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Steave Gection <span class="caret"></span></a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
                <!-- .User Profile -->
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- / Search input-group this is only view in mobile-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                        <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                        </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li><a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Link type </span></a> </li>
                    <li>
                        <a href="javascript:void(0)" class="waves-effect active"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Dropdown Link<span class="fa arrow"></span><span class="label label-rouded label-purple pull-right">2</span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="javascript:void(0)">Link one</a></li>
                            <li><a href="javascript:void(0)">Link Two</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Multi Dropdown<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="javascript:void(0)">Second Level Item</a> </li>
                            <li> <a href="javascript:void(0)">Second Level Item</a> </li>
                            <li>
                                <a href="javascript:void(0)" class="waves-effect">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li> <a href="javascript:void(0)">Third Level Item</a> </li>
                                    <li> <a href="javascript:void(0)">Third Level Item</a> </li>
                                    <li> <a href="javascript:void(0)">Third Level Item</a> </li>
                                    <li> <a href="javascript:void(0)">Third Level Item</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>  --}}

		<div id="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> <?= @date('Y'); ?> &copy; Ministry of Health </footer>
        </div>
	</div>
	<script src="{{ asset('dashboard/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('dashboard/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('dashboard/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
	<script src="{{ asset('dashboard/js/jquery.slimscroll.js') }}"></script>
	<script src="{{ asset('dashboard/js/waves.js') }}"></script>
	<script src="{{ asset('dashboard/js/custom.min.js') }}"></script>
</body>
</html>