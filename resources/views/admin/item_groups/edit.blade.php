@extends('layouts.admin')
@section('title') Edit Item Group @stop
@section('pageTitle') Edit Item Group @stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('item_group.index') }}">Item Groups</a>
</li>

<li>
	Edit a Item group
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($item_group, array('route' => ['item_group.update', Crypt::encrypt($item_group->id)], 'id' => 'item_group_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('admin.item_groups._form')
		        {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
		        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection