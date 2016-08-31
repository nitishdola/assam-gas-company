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
	<div class="col-md-12">
		<div class="row">
		  <div class="col-lg-4">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left red">
						<i class="fa fa-bolt fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number"> <a href="{{ route('item_measurement.index')}}">{{$total_item_measurement}}</a></div>
						<div class="title">Total Measurements(Item)</div>
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
						<div class="number"><a href="{{ route('salvage_item_measurement.index')}}">{{$total_salvage_measurement}}</a></div>
						<div class="title">Total Salvage(Item)</div>
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
						<div class="number"><a href="{{ route('requisition.index')}}">{{$total_requisition}}</a></div>
						<div class="title">Total Requisition</div>
				   </div>
				</div>
			 </div>
		  </div>

		</div>
	<!-- /COLUMN 1 -->
	</div>
</div>
@endsection