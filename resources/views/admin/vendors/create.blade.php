@extends('layouts.admin')
@section('title') Add a Supplier/Vendor @stop
@section('pageTitle') Add a Supplier/Vendor @stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('admin.vendor.index') }}">Vendors</a>
</li>

<li>
	Create a Supplier/Vendor
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::open(array('route' => 'admin.vendor.store', 'id' => 'admin.vendor.store', 'class' => 'form-horizontal row-border')) !!}
		        @include('vendors._form')
		        {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
		        {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@stop