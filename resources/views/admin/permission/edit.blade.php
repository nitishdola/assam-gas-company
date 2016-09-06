@extends('layouts.admin')
@section('title') Update Role @stop


@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>



<li>
	Update your Role Information
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($permissiones, array('route' => ['permission.update', Crypt::encrypt($permissiones->id)], 'id' => 'permission_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('admin.permission._form')
		        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection
