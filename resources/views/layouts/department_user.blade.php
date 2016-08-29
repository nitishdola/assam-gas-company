<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Department Dashboard | @yield('pageTitle')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/admin.css') }}" >
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/themes/default.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('assets/css/responsive.css') }}" >
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animatecss/animate.min.css') }}" />
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" />
	<!-- TODO -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/jquery-todo/css/styles.css') }}" />
	<!-- FULL CALENDAR -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/fullcalendar/fullcalendar.min.css') }}" />
	<!-- GRITTER -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/gritter/css/jquery.gritter.css') }}" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/select2/select2.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/zebra/css/default.css') }}">

	@yield('pageCss')
</head>
<body>
	@include('department_user.common.header')
	<!-- PAGE -->
	<section id="page">
		@include('department_user.common.sidebar')		
		<div id="main-content">
			<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<div class="row">
						  <div class="col-sm-12">
						    <div class="page-header">
						      <!-- STYLER -->
						      
						      <!-- /STYLER -->
						      <!-- BREADCRUMBS -->
						      <ul class="breadcrumb">
						        @yield('breadcumb')
						      </ul>
						      <!-- /BREADCRUMBS -->
						      <div class="clearfix">
						        <h3 class="content-title pull-left">@yield('pageTitle')</h3>
						        <!-- DATE RANGE PICKER -->
						        <span class="date-range pull-right">
						          @yield('sorting')
						        </span>
						        <!-- /DATE RANGE PICKER -->
						      </div>
						      <div class="description">@yield('pageSubTitle')</div>
						    </div>
						  </div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								@if(Session::has('message'))
	                            <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
	                                <button type="button" class="close" data-dismiss="alert">×</button>
	                                {!! Session::get('message') !!}
	                            </div>
	                            @endif
	                        </div>
						</div>

						@yield('content')
						
					</div><!-- /CONTENT-->
				</div>
			</div>
		</div>
	</section>
	<!--/PAGE -->
	<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="{{ asset('assets/js/jquery/jquery-2.0.3.min.js') }}"></script>
	<!-- JQUERY UI-->
	<script src="{{ asset('assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js') }}"></script>
	<!-- BOOTSTRAP -->
	<script src="{{ asset('assets/bootstrap-dist/js/bootstrap.min.js') }}"></script>
	
		
	<!-- DATE RANGE PICKER -->
	<script src="{{ asset('assets/js/bootstrap-daterangepicker/moment.min.js') }}"></script>
	
	<script src="{{ asset('assets/js/bootstrap-daterangepicker/daterangepicker.min.js') }}"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="{{ asset('assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js') }}"></script>
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="{{ asset('assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js') }}"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="{{ asset('assets/js/jQuery-BlockUI/jquery.blockUI.min.js') }}"></script>
	<!-- SPARKLINES -->
	<script type="text/javascript" src="{{ asset('assets/js/sparklines/jquery.sparkline.min.js') }}"></script>
	<!-- EASY PIE CHART -->
	<script src="{{ asset('assets/js/jquery-easing/jquery.easing.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/easypiechart/jquery.easypiechart.min.js') }}"></script>
	<!-- FLOT CHARTS -->
	<script src="{{ asset('assets/js/flot/jquery.flot.min.js') }}"></script>
	<script src="{{ asset('assets/js/flot/jquery.flot.time.min.js') }}"></script>
    <script src="{{ asset('assets/js/flot/jquery.flot.selection.min.js') }}"></script>
	<script src="{{ asset('assets/js/flot/jquery.flot.resize.min.js') }}"></script>
    <script src="{{ asset('assets/js/flot/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('assets/js/flot/jquery.flot.stack.min.js') }}"></script>
    <script src="{{ asset('assets/js/flot/jquery.flot.crosshair.min.js') }}"></script>
	<!-- TODO -->
	<script type="text/javascript" src="{{ asset('assets/js/jquery-todo/js/paddystodolist.js') }}"></script>
	<!-- TIMEAGO -->
	<script type="text/javascript" src="{{ asset('assets/js/timeago/jquery.timeago.min.js') }}"></script>
	<!-- FULL CALENDAR -->
	<script type="text/javascript" src="{{ asset('assets/js/fullcalendar/fullcalendar.min.js') }}"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="{{ asset('assets/js/jQuery-Cookie/jquery.cookie.min.js') }}"></script>
	<!-- GRITTER -->
	<script type="text/javascript" src="{{ asset('assets/js/gritter/js/jquery.gritter.min.js') }}"></script>

	<script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>

	<script src="{{ asset('assets/zebra/javascript/zebra_datepicker.js') }}"></script>

	<!-- CUSTOM SCRIPT -->
	<script src="{{ asset('assets/js/script.js') }}"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("index");  //Set current page
			App.init(); //Initialise plugins and elements
			$(".select2").select2();
			$('input.datepicker').Zebra_DatePicker({ format: 'd-m-Y'});
		});
	</script>
	<script type="text/javascript">
	/****************************************Restcontroller*********************/
    /*****************************casecading drop down,block ui etc*************/
    
     function load_racks() {
        $('#location_id').on('change', function() {
          
            var locationID = $(this).val();
            var data = '';
            data += '&location_id='+locationID;
            url = "{{ route('rest.get_racks') }}";

            if(locationID ) {
                $.ajax({
                    url  : url,
                    type : "GET",
                    data : data,
                    dataType : "json",
                    
                    error : function(resp) {
                        console.log(resp);
                    },
                    success:function(data) {
                        $.blockUI();
                        
                        setTimeout($.unblockUI, 500); 
                        $('select[name="rack_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="rack_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                     }
                });
            }else{
                
                $('select[name="rack_id"]').empty();
            }
        });
    }
// for load sub groups
function load_subgroups() {
        $('#item_group_id').on('change', function() {
         
            var groupID = $(this).val();
            var data = '';
            data += '&item_group_id='+groupID;
            url = "{{ route('rest.get_sub_groups') }}";

            if(groupID ) {
                $.ajax({
                    url  : url,
                    type : "GET",
                    data : data,
                    dataType : "json",
                    
                    error : function(resp) {
                        console.log(resp);
                    },
                    success:function(data) {
                        $.blockUI();
                        setTimeout($.unblockUI, 500); 
                        $('select[name="item_sub_group_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="item_sub_group_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                     }
                });
            }else{
                
                $('select[name="item_sub_group_id"]').empty();
            }
        });
    }

    $(document).ready(function() {
   
    $('#edit').click(function() { 
        $.blockUI(); 
 
        setTimeout($.unblockUI, 2000); 
    }); 
}); 
   
	</script>



	@yield('pageJs')
	<!-- /JAVASCRIPTS -->
</body>
</html>