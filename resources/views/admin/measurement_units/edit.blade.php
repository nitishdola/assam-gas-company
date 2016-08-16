@extends('layouts.admin')
@section('title') Edit Unit @stop
@section('pageTitle') Edit Unit @stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($measurement_unit, array('route' => ['measurement_unit.update', Crypt::encrypt($measurement_unit->id)], 'id' => 'measurement_unit_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('admin.measurement_units._form')
		        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection