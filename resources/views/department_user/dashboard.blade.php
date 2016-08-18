@extends('layouts.department_user')
@section('pageTitle') Dashboard @stop
@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>
@stop

@section('content')
<div class="row">
	<!-- COLUMN 1 -->
	<div class="col-md-6">
		<div class="row">
		  <div class="col-lg-6">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left red">
						<i class="fa fa-instagram fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number">6718</div>
						<div class="title">Likes</div>
						<span class="label label-success">
							26% <i class="fa fa-arrow-up"></i>
						</span>
				   </div>
				</div>
			 </div>
		  </div>
		  <div class="col-lg-6">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left blue">
						<i class="fa fa-twitter fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number">2724</div>
						<div class="title">Followers</div>
						<span class="label label-warning">
							5% <i class="fa fa-arrow-down"></i>
						</span>
				   </div>
				</div>
			 </div>
		  </div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="quick-pie panel panel-default">
					<div class="panel-body">
						<div class="col-md-4 text-center">
							<div id="dash_pie_1" class="piechart" data-percent="59">
								<span class="percent"></span>
							</div>
							<a href="#" class="title">New Visitors <i class="fa fa-angle-right"></i></a>
						</div>
						<div class="col-md-4 text-center">
							<div id="dash_pie_2" class="piechart" data-percent="73">
								<span class="percent"></span>
							</div>
							<a href="#" class="title">Bounce Rate <i class="fa fa-angle-right"></i></a>
						</div>
						<div class="col-md-4 text-center">
							<div id="dash_pie_3" class="piechart" data-percent="90">
								<span class="percent"></span>
							</div>
							<a href="#" class="title">Brand Popularity <i class="fa fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
	   </div>
	</div>
	<!-- /COLUMN 1 -->
	
	<!-- COLUMN 2 -->
	<div class="col-md-6">
		<div class="box solid grey">
			<div class="box-title">
				<h4><i class="fa fa-dollar"></i>Revenue</h4>
				<div class="tools">
					<span class="label label-danger">
						20% <i class="fa fa-arrow-up"></i>
					</span>
					<a href="#box-config" data-toggle="modal" class="config">
						<i class="fa fa-cog"></i>
					</a>
					
					<a href="javascript:;" class="reload">
						<i class="fa fa-refresh"></i>
					</a>
					<a href="javascript:;" class="collapse">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a href="javascript:;" class="remove">
						<i class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<div class="box-body">
				<div id="chart-revenue" style="height:240px"></div>
			</div>
		</div>
	</div>
	<!-- /COLUMN 2 -->
</div>
<!-- /DASHBOARD CONTENT -->
<div class="row">
	<div class="col-md-12">
		<!-- BOX -->
		<div class="box border green">
			<div class="box-title">
				<h4><i class="fa fa-bars"></i> <span class="hidden-inline-mobile">Traffic & Sales</span></h4>
			</div>
			<div class="box-body">
				<div class="tabbable header-tabs">
					<ul class="nav nav-tabs">
						 <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-search-plus"></i> <span class="hidden-inline-mobile">Select & Zoom Sales Chart</span></a></li>
						 <li class="active"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> <span class="hidden-inline-mobile">Traffic Statistics</span></a></li>
					 </ul>
					 <div class="tab-content">
						 <div class="tab-pane fade in active" id="box_tab1">
							<!-- TAB 1 -->
							<div id="chart-dash" class="chart"></div>
							<hr class="margin-bottom-0">
						   <!-- /TAB 1 -->
						 </div>
						 <div class="tab-pane fade" id="box_tab2">
							<div class="row">
								<div class="col-md-8">
									<div class="demo-container">
										<div id="placeholder" class="demo-placeholder"></div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="demo-container" style="height:100px;">
										<div id="overview" class="demo-placeholder"></div>
									</div>
									<div class="well well-bottom">
										<h4>Month over Month Analysis</h4>
										<ol>
											<li>Selection support makes it easy to construct flexible zooming schemes.</li>
											<li>With a few lines of code, the small overview plot to the right has been connected to the large plot.</li>
											<li>Try selecting a rectangle on either of them.</li>
										</ol>
									</div>
								</div>
							</div>
						</div>
					 </div>
				</div>
			</div>
		</div>
		<!-- /BOX -->
	</div>
</div>
@endsection