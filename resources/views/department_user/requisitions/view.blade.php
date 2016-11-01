@extends('layouts.department_user')

@section('title') Material Requisition Form Details @stop
@section('pageTitle') Material Requisition Form Details
<div class="col-xs-12">
	<a class="btn btn-info" href="{{ route('requisition.edit', Crypt::encrypt($info->id) ) }}">
		<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
	</a>
	<a class="btn btn-danger" href="{{ route('requisition.index', Crypt::encrypt($info->id) ) }}">
		<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
	</a>
	@if($info->hod)
		<a class="btn btn-primary disabled">Approved</a>
	@else
		<a class="btn btn-primary active" href="{{ route('requisition.approve', Crypt::encrypt($info->id) ) }}"><i class="glyphicon glyphicon-ok" aria-hidden="true"></i>Approve</a>
	@endif
</div>
@stop

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
				@include('department_user.requisitions._view_requisition_details')
			</div>
		</div>
	</div>

@stop
