@extends('layouts.admin')
@section('title') Edit Item Sub Group @stop
@section('pageTitle') Edit Item Sub Group @stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($item_sub_group, array('route' => ['item_sub_group.update', Crypt::encrypt($item_sub_group->id)], 'id' => 'section_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('admin.item_sub_groups._form')
		        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
		        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection