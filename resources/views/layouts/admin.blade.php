<!DOCTYPE html>
<html>
  
<head>
	<title> Dashboard @yield('title')</title>
	<link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/font-awesome.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/se7en-font.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/isotope.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/jquery.fancybox.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/fullcalendar.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/wizard.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/select2.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/morris.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/datatables.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/datepicker.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/timepicker.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/colorpicker.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/bootstrap-switch.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/daterange-picker.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/typeahead.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/summernote.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/pygments.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/style.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/stylesheets/color/green.css') }}" media="all" rel="alternate stylesheet" title="green-theme" type="text/css" />
	<link href="{{ asset('assets/stylesheets/color/orange.css') }}" media="all" rel="alternate stylesheet" title="orange-theme" type="text/css" />
	<link href="{{ asset('assets/stylesheets/color/magenta.css') }}" media="all" rel="alternate stylesheet" title="magenta-theme" type="text/css" />
	<link href="{{ asset('assets/stylesheets/color/gray.css') }}" media="all" rel="alternate stylesheet" title="gray-theme" type="text/css" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

	@yield('pageCss')
</head>

<body>

<div class="modal-shiftfix">
<!--nav-->
@include('admin.common.navigation')
<!--/nav-->

	<div class="container-fluid main-content">
		<div class="row">
            <div class="col-md-8  col-offset-2 alert_msg">
                @if (Session::has('message'))
                <div class="alert alert-warning alert-dismissable alert-red">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                  {!!Session::get('message')!!}
                </div>
                @endif
            </div>
        </div>
        <div class="row">
			<div class="container-fluid main-content"><div class="page-title">
		  		<h3>@yield('pageTitle')</h3>
			</div>
			@yield('content')
		</div>
	</div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="{{ asset('assets/javascripts/bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/javascripts/jquery.mousewheel.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/javascripts/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/javascripts/fullcalendar.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets/javascripts/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/javascripts/datatable-editable.js') }}" type="text/javascript"></script>
<!-- <script src="javascripts/jquery.easy-pie-chart.js" type="text/javascript"></script> -->

<script src="{{ asset('assets/javascripts/modernizr.custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/javascripts/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/javascripts/select2.js') }}" type="text/javascript"></script>
<!-- <script src="javascripts/wysiwyg.js" type="text/javascript"></script>
<script src="javascripts/summernote.min.js" type="text/javascript"></script> -->
<script src="{{ asset('assets/javascripts/typeahead.js') }}" type="text/javascript"></script>
<!-- <script src="javascripts/morris.min.js" type="text/javascript"></script> -->
<script src="{{ asset('assets/javascripts/main.js') }}" type="text/javascript"></script>

@yield('pageJs')
    
@yield('pageSpecificScripts')
</body>
</html>