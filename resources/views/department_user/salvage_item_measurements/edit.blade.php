@extends('layouts.department_user')
@section('title') Edit Item @stop
@section('pageTitle') Edit Item @stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($salvage_item_measurement, array('route' => ['salvage_item_measurement.update', Crypt::encrypt($salvage_item_measurement->id)], 'id' => 'salvage_item_measurement_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('department_user.item_measurements._form')
		        <div class="col-md-12"> 
			        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
			        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
			    </div>
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection