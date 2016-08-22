@extends('layouts.admin')
@section('title') Search view suppliers/vendors @stop
@section('pageTitle') Search view suppliers/vendors @stop
@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	Vendors
</li>

@stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			{!! Form::open(array('route' => 'admin.vendor.index', 'id' => 'admin.vendor.index', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
			@include('vendors._search_form')
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
			            <th class="hidden-xs">Supplier/Vendor Name</th>
			            <th> Supplier/Vendor Code </th>
			            <th> Supplier/Vendor Phone </th>
			            <th> Supplier/Vendor Mobile </th>
			            <th> Supplier/Vendor Contact Person </th>
			            <th> Details </th>
			            <th> Action</th>
			        </tr>
			    </thead>
			    <tbody>
			        @foreach($results as $k => $v)
			        <tr @if(!$v->status) class="danger" @endif>
			            <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
			            <td class="hidden-xs"> {{ $v->name }} </td>
			            <td class="hidden-xs"> {{ $v->vendor_code }} </td>
			            <td> {{ $v->vendor_phone }} </td>
			            <td> {{ $v->vendor_mobile }} </td>
			            <td> {{ $v->contact_person }} </td>
			            <td> <a href="#"> Details </a> </td>
			            <td> <a href="{{ route('admin.vendor.edit', Crypt::encrypt($v->id) ) }}" title="Edit Item"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>
			            @if($v->status) | 
						<a onclick="return confirm('Are you sure you want to delete this vendor ?');"  style="color:red" href="{{ route('admin.vendor.disable', Crypt::encrypt($v->id) ) }}" title="Remove vendor"><i class="fa fa-trash" aria-hidden="true"></i>Remove</a>
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