@extends('layouts.admin')
@section('title') Add a User @stop


@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>



<li>
	Create a Account user
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-6">
			    {!! Form::open(array('route' => 'account_user.store', 'id' => 'account_user.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('admin.users.account._form')
			        {!! Form::label('', '', array('class' => 'col-md-4 control-label')) !!}
			        {!! Form:: submit('Add User', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
		</div>
	</div>
</div>

@endsection
@section('pageJs') <script> load_sections(); </script> @stop
