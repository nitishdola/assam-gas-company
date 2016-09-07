@extends('layouts.department_user')
@section('content')
<div class="row">
	<div class="col-md-12">
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
</div>
@include('department_user.requisitions._view_requisition_details')
@stop