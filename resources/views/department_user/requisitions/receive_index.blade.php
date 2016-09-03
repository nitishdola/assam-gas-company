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
			            <th> Issue Date </th>
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
			            <td> {{ date('d-m-Y', strtotime($v->issue_date)) }} </td>
			            <td> 

			            @if($v->hod)  
						<a onclick="return confirm('Are you sure you want to delete this item ?');"  style="color:red" href="#" title="Approved"><i class="fa fa-thumbs-up-o fa-fw"></i>Approved by HOD</a>
						@else
						
						 <a onclick="return confirm('Are you sure you want to approve this requisition ?');"  style="color:red" href="{{ route('requisition.approve', Crypt::encrypt($v->id) ) }}" title="Approve"><i class="fa fa-check-square-o fa-fw"></i>Approve</a>
						@endif
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