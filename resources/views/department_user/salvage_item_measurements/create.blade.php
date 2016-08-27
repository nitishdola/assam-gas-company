@extends('layouts.department_user')
@section('title') Measurement of Item @stop
@section('pageTitle') Measurement of Salvage Item @stop

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
	Measurement of Salvage Item
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-12">
			    {!! Form::open(array('route' => 'salvage_item_measurement.store', 'id' => 'salvage_item_measurement.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('department_user.salvage_item_measurements._form')

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
@section('pageJs') <script> load_sections(); </script> @stop