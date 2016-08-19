@extends('layouts.department_user')
@section('title') All Items @stop
@section('pageTitle') All Items @stop
@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	Items
</li>

@stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			{!! Form::open(array('route' => 'item_measurement.index', 'id' => 'item_measurement.index', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
			@include('department_user.item_measurements._search_form')
			{!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		    {!! Form:: submit('Search', ['class' => 'btn btn-success']) !!}

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
			            <th class="hidden-xs">Item Name</th>
			            <th> Item Code </th>
			            <th> Part Number </th>
			            <th> Latest rate </th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($results as $k => $v)
			        <tr>
			            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
			            <td class="hidden-xs"> {{ $v->item_name }} </td>
			            <td class="hidden-xs"> {{ $v->item_code }} </td>
			            <td> {{ $v->part_number }} </td>
			            <td> {{ $v->username }} </td>
			            <td class="hidden-xs"> {{ $v->latest_rate }} </td>
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
                  No Users Found !
                </div>
		    @endif
		</div>
	</div>
</div>
@endsection