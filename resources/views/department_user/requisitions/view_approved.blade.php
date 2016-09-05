@extends('layouts.department_user')
@section('title') All Items @stop
@section('pageTitle') All Requisition @stop
@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>
<li>
	<i class="fa fa-th"></i>
Received Condition
</li>
@stop

@section('content')


<div class="col-lg-12" style="margin-top:20px;">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			@if(count($results))
			<?php $count = 1; ?>
			<table class="table table-striped table-bordered table-advance table-hover">
			    <thead>
			        <tr>
			            <th>#</th>
			            <th class="hidden-xs">Department</th>
			            <th> Requisition Number </th>
			            <th> Job Number </th>
			            <th> Nature of Work </th>
			            <th> HOD </th>
			            <th> Approve Date </th>
			            <th> Actions </th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($results as $k => $v)
			        <tr @if(!$v->status) class="danger" @endif>
			            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
			            <td class="hidden-xs"> {{ $v->department['name'] }} </td>
			            <td> {{ $v->requisition_number }} </td>
			            <td class="hidden-xs"> {{ $v->job_number }} </td>
			            <td> {{ $v->nature_of_work }} </td>
			            <td> {{ $v->department_user['name']}} </td>
			            <td> {{ date('d-m-Y h:i A', strtotime($v->hod_approve_date)) }} </td>
			            <td>
						 <a onclick="return confirm('Are you sure you want to receive this requisition ?');" href="{{ route('requisition.receive', Crypt::encrypt($v->id) ) }}" class="btn btn-danger" title="Receive"><i class="fa fa-check-square" aria-hidden="true"></i>Receive</a>
						</td>
			        </tr>
			        @endforeach
			    </tbody>
			</table>
			<div class="pagination">
			{!! $results->render() !!}
			</div>
		    @else
		    	<div class="alert alert-danger alert-dismissable alert-red">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                  No Items Found !
                </div>
		    @endif
		</div>
	</div>
</div>
@endsection