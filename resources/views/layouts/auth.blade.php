<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>@yield('login_name') Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/cloud-admin.min.css') }}" >
	
	<link href="{{ asset('public/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/js/uniform/css/uniform.default.min.css') }}" />
	
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>
<body class="login">	
	<!-- PAGE -->
	<section id="page">
			<!-- LOGIN -->
			<section id="login" class="visible">
				<div class="container">
					<div class="row" style="font-family: Tahoma,Verdana,Segoe,sans-serif !important">
						@yield('content')
					</div>
				</div>
			</section>
			<!--/LOGIN -->
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="{{ asset('public/assets/js/jquery/jquery-2.0.3.min.js') }}"></script>
	<!-- JQUERY UI-->
	<script src="{{ asset('public/assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js') }}"></script>
	<!-- BOOTSTRAP -->
	<script src="{{ asset('public/assets/bootstrap-dist/js/bootstrap.min.js') }}"></script>
	
	
	<!-- UNIFORM -->
	<script type="text/javascript" src="{{ asset('public/assets/js/uniform/jquery.uniform.min.js') }}"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="{{ asset('public/assets/js/script.js') }}"></script>
	
</body>
</html>