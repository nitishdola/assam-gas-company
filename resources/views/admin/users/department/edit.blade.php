@extends('layouts.admin')
@section('title') Edit Department User Information @stop


@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>



<li>
	Update your department user information
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($departmentuser, array('route' => ['department_user.update', Crypt::encrypt($departmentuser->id)], 'id' => 'section_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('admin.users.department._form')
		        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection
@section('pageJs') <script> load_sections(); </script> @stop