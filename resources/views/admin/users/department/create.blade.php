@extends('layouts.admin')
@section('title') Add a Section @stop
@section('pageTitle') Add a Section @stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('section.index') }}">Sections</a>
</li>

<li>
	Create a Section
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-6">
			    {!! Form::open(array('route' => 'department_user.store', 'id' => 'department_user.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('admin.users.department._form')
			        {!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
			        {!! Form:: submit('Add User', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
		</div>
	</div>
</div>
@endsection