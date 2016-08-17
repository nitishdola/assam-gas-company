@extends('layouts.admin')
@section('title') Edit Location @stop
@section('pageTitle') Edit Location @stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($location, array('route' => ['location.update', Crypt::encrypt($location->id)], 'id' => 'location_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('admin.locations._form')
		        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection