@extends('layouts.admin')
@section('title') Edit Section @stop
@section('pageTitle') Edit Section @stop

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
	Edit a Section
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($section, array('route' => ['section.update', Crypt::encrypt($section->id)], 'id' => 'section_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('admin.sections._form')
		        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection