@extends('layouts.admin')
@section('title') All Items @stop
@section('pageTitle') All Items @stop
@section('breadcumb')
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	Items|<a class="btn btn-info" href="{{ route('measurement-items.download') }}"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
</li>

@stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			{!! Form::open(array('route' => 'item_measurement.index', 'id' => 'item_measurement.index', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
			@include('admin.item_measurements._search_form')
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
			            <th class="hidden-xs">Item Name</th>
			            <th> Item Code </th>
			            <th> Part Number </th>
			            <th> Minimum Stock Level </th>

			            <th> Action </th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($results as $k => $v)
			        <tr @if(!$v->status) class="danger" @endif>
			            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
			            <td class="hidden-xs"> {{ $v->item_name }} </td>
			            <td class="hidden-xs"> {{ $v->item_code }} </td>
			            <td> {{ $v->part_number }} </td>
			            <td> {{ $v->minimum_stock_level }} </td>
			             <td> <a href="{{ route('item_measurement.view', Crypt::encrypt($v->id) ) }}" title="View Item"><i class="fa fa-view" aria-hidden="true"></i>View more</a>| <a href="{{ route('item_measurement.edit', Crypt::encrypt($v->id) ) }}" title="Edit Item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
			            @if($v->status) |
						<a onclick="return confirm('Are you sure you want to delete this item ?');"  style="color:red" href="{{ route('item_measurement.disable', Crypt::encrypt($v->id) ) }}" title="Remove Item"><i class="fa fa-trash-o fa-fw"></i>Remove</a>
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
