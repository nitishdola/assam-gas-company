@extends('layouts.admin')
@section('title') Measurement of Item @stop
@section('pageTitle') Measurement of Salvage Item @stop

@section('breadcumb')
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('salvage_item_measurement.index') }}">Items</a>
</li>

<li>
	Measurement of Salvage Item
</li>

@stop


@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-10">
			    {!! Form::open(array('route' => 'department.store', 'id' => 'department.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('admin.salvage_item_measurements._form')
			        {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
			        {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
		</div>
	</div>
</div>
@endsection
