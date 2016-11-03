@extends('layouts.department_user')
@section('title') Check Purchase Indents @stop
@section('pageTitle') Check Purchase Indents @stop
@section('breadcumb')
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>
<li>
	<i class="fa fa-bookmark"></i>
	<a href="">Indents</a>
</li>
@stop

@section('content')
<!-- <div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			{!! Form::open(array('route' => 'purchase_indent.index', 'id' => 'purchase_indent.index', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
			@include('department_user.purchase_indents._search_form')
			<div class="col-md-12">
				{!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
			    {!! Form:: submit('Search', ['class' => 'btn btn-success']) !!}
			</div>

			{!!form::close()!!}
		</div>
	</div>
</div> -->

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
			            <th> Purchase Indent Number </th>
			            <th> Purchase Indent Date </th>
			            <th> Reference Number </th>
			            <th> Reference Date </th>
			            <th> Budget Head </th>
			            <th> View </th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($results as $k => $v)
			        <tr>
			            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
			            <td class="hidden-xs"> {{ $v->requisition['department']['name'] }} </td>
			            <td> {{ $v->requisition['requisition_number'] }} </td>
			            <td class="hidden-xs"> {{ $v->purchase_indent_number }} </td>
			            <td> {{ date('d-m-Y', strtotime($v->purchase_indent_date)) }} </td>
			            <td class="hidden-xs"> {{ $v->reference_number }} </td>
			            <td> {{ date('d-m-Y', strtotime($v->reference_date)) }} </td>
			            <td> {{ $v->budget_head['name'] }} </td>
			            <td> <a href="{{ route('purchase_indent.details', Crypt::encrypt($v->id) ) }}" class="btn btn-success">Generate Tende/Add vendor ratesr</a> </td>
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
