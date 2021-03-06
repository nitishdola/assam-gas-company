@extends('layouts.admin')
@section('title') Measurement of Item @stop
@section('pageTitle') Measurement of Item @stop

@section('breadcumb')
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('item_sub_group.index') }}">Items</a>
</li>

<li>
	Measurement of Item
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-10">
			    {!! Form::open(array('route' => 'item_measurement.store', 'id' => 'item_measurement.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('admin.item_measurements._form')

			        <div class="col-md-12">
			        	{!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
			        	{!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			        </div>
			    {!!form::close()!!}
			</div>
		</div>
	</div>
</div>
@endsection
@section('pageJs') <script> load_racks(),load_subgroups(); </script> @stop
