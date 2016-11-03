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
				   <div class="panel-left blue">
						<i class="fa fa-money fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number"><a href="{{ route('rack.index')}}">{{$total_rack}}</a></div>
						<div class="title"> Racks</div>
				   </div>
				</div>
			 </div>
		  </div>

		  <div class="col-lg-4">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left blue">
						<i class="fa fa-flag fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number"><a href="{{ route('section.index')}}">{{$total_section}}</a></div>
						<div class="title">Sections</div>
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
						<div class="number"><a href="{{ route('location.index')}}">{{$total_location}}</a></div>
						<div class="title">Locations</div>
				   </div>
				</div>
			 </div>
		  </div>

		    <div class="col-lg-4">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left red">
						<i class="fa fa-users fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number"><a href="{{ route('department_user.index')}}">{{$total_department_user}}</a></div>
						<div class="title"> Department Users</div>
				   </div>
				</div>
			 </div>
		  </div>

		  <div class="col-lg-4">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left red">
						<i class="fa fa-briefcase fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number"><a href="{{ route('department.index')}}">{{$total_department}}</a>
						</div>
						<div class="title">Departments</div>
				   </div>
				</div>
			 </div>
		  </div>

		  <div class="col-lg-4">
			 <div class="dashbox panel panel-default">
				<div class="panel-body">
				   <div class="panel-left red">
						<i class="fa fa-users fa-3x"></i>
				   </div>
				   <div class="panel-right">
						<div class="number"><a href="{{ route('account_user.index')}}">{{$total_account_user}}</div>
						</a><div class="title">Account Users</div>
				   </div>
				</div>
			 </div>
		  </div>

		</div>
	<!-- /COLUMN 1 -->
	</div>
</div>
@endsection
