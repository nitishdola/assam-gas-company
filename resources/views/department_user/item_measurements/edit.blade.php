@extends('layouts.department_user')
@section('title') Edit Item @stop
@section('pageTitle') Edit Item @stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($item_measurement, array('route' => ['item_measurement.update', Crypt::encrypt($item_measurement->id)], 'id' => 'item_measurement_update', 'class' => 'form-horizontal row-border')) !!}
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
@section('pageJs') <script> load_racks(),load_subgroups(); </script> @stop