@extends('layouts.admin')
@section('title') Add a Role @stop



@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>



<li>
	Create a Role
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-6">
			    {!! Form::open(array('route' => 'role.store', 'id' => 'role.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('admin.role._form')
			        {!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
			        {!! Form:: submit('Add Role', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
		</div>
	</div>
</div>

@endsection
@section('pageJs') <script> load_sections(); </script> @stop
