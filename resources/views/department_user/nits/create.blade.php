@extends('layouts.department_user')
@section('title') NIT Create @stop
@section('pageTitle') Create NIT @stop

@section('breadcumb')
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('nit.index') }}">All NITs</a>
</li>

<li>
	Create new NIT
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-12">
			    {!! Form::open(array('route' => 'nit.store', 'id' => 'nit.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('department_user.nits._form')
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
@section('pageJs') @stop
