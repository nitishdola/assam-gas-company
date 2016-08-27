@extends('layouts.admin')
@section('title') Edit Designation @stop
@section('pageTitle') Edit Rack @stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($designation, array('route' => ['designation.update', Crypt::encrypt($designation->id)], 'id' => 'rack_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('admin.designation._form')
		        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection