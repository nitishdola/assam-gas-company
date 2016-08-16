@extends('layouts.admin')
@section('title') Edit Department @stop
@section('pageTitle') Edit Department @stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($department, array('route' => ['department.update', Crypt::encrypt($department->id)], 'id' => 'department_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('admin.departments._form')
		        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection