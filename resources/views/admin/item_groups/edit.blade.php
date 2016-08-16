@extends('layouts.admin')
@section('title') Edit Item Group @stop
@section('pageTitle') Edit Item Group @stop
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