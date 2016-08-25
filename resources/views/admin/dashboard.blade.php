@extends('layouts.admin')
@section('pageTitle') Dashboard @stop
@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>
@stop

@section('content')
<div class="row">
	<!-- COLUMN 1 -->
	<div class="col-md-12">
		<div class="row">
		  <div class="col-lg-4">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left red">
						<i class="fa fa-bolt fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number">12</div>
						<div class="title">Total Department</div>
				   </div>
				</div>
			 </div>
		  </div>
		  <div class="col-lg-4">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left blue">
						<i class="fa fa-money fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number">2724</div>
						<div class="title">Total Section</div>
				   </div>
				</div>
			 </div>
		  </div>

		  <div class="col-lg-4">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left blue">
						<i class="fa fa-retweet fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number">2724</div>
						<div class="title">Total Location</div>
				   </div>
				</div>
			 </div>
		  </div>
		  <div class="col-lg-4">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left blue">
						<i class="fa fa-money fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number">2724</div>
						<div class="title">Total Rack</div>
				   </div>
				</div>
			 </div>
		  </div>
		   <div class="col-lg-4">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left red">
						<i class="fa fa-bolt fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number">12</div>
						<div class="title">Total Item Group</div>
				   </div>
				</div>
			 </div>
		  </div>

		</div>
	<!-- /COLUMN 1 -->
	</div>
</div>
@endsection