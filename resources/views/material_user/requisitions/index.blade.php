@extends('layouts.material_user')
@section('title') All Items @stop
@section('pageTitle') All Items @stop
@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>
<li>
	<i class="fa fa-th"></i>
	Requisitions
</li>
@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			{!! Form::open(array('route' => 'requisition.index', 'id' => 'requisition.index', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
			@include('department_user.requisitions._search_form')
			<div class="col-md-12"> 
				{!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
			    {!! Form:: submit('Search', ['class' => 'btn btn-success']) !!}
			</div>

			{!!form::close()!!}
		</div>
	</div>
</div>

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
			            <th> Chargeable Account </th>
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
			            <td class="hidden-xs"> {{ $v->chargeable_account['name'] }} </td>
			            <td> <a href="{{ route('requisition.view', Crypt::encrypt($v->id) ) }}" title="View Requisition Details" class="btn btn-info"><i class="fa fa-sign-in" aria-hidden="true"></i> View More</a>
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