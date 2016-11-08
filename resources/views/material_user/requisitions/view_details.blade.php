@extends('layouts.material_user')

@section('title') Material Requisition Form Details @stop
@section('pageTitle') Material Requisition Form Details @stop

@section('breadcumb')
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('requisition.index') }}"> View All Requisitions</a>
</li>

<li>
	Material Requisition Details
</li>
@stop

@section('content')
<div class="widget-container fluid-height clearfix">
	<div class="widget-content padded">
			<div class="col-md-12">
				@include('material_user.requisitions._view_details')
			</div>
		</div>
	</div>

@stop
