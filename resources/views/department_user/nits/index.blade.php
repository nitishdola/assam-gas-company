@extends('layouts.department_user')
@section('title') Purchase Indents @stop
@section('pageTitle') Purchase Indents @stop
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
<div class="col-lg-12">
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
			            <th> NIT Number </th>
			            <th> Purchase Indent Number </th>
			            <th> Subject </th>
			            <th> NIT Date </th>
			            <th> NIT Opening Date </th>
			            <th> NIT Closing Date </th>
			            <th> Tender Type </th>
                  <th> Created By </th>
                  <th> View </th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($results as $k => $v)
			        <tr>
			            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                  <td> DEPT </td>
			            <td class="hidden-xs"> {{ $v->nit_number }} </td>
			            <td> {{ $v->purchase_indent['purchase_indent_number'] }} </td>
			            <td class="hidden-xs"> {{ $v->subject }} </td>
			            <td> {{ date('d-m-Y', strtotime($v->nit_date)) }} </td>
			            <td> {{ date('d-m-Y', strtotime($v->nit_opening_date)) }} </td>
			            <td> {{ date('d-m-Y', strtotime($v->nit_closing_date)) }} </td>
			            <td class="hidden-xs"> {{ $v->tender_type }} </td>
                  <td class="hidden-xs"> {{ $v->creator['name'] }} </td>
			            <td> <a href="{{ route('nit.details', Crypt::encrypt($v->id) ) }}" class="btn btn-info">View</a> </td>
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
