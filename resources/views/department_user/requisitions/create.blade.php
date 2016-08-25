@extends('layouts.department_user')
@section('title') Material Requisition Form @stop
@section('pageTitle') Material Requisition Form @stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('requisition.index') }}">All Material Requisitions</a>
</li>

<li>
	Material Requisition Form
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-12">
			    {!! Form::open(array('route' => 'requisition.store', 'id' => 'requisition.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('department_user.requisitions._form')
			        <div style="height:30px;"></div>
			        <h4> Requisition Material(s) </h4>
			        @include('department_user.requisitions._item_form')

			        <div class="col-xs-12" style="margin-top:30px;">
			        {!! Form::label('', '', array('class' => 'col-md-5 control-label')) !!}
			        {!! Form:: submit('Create Requisition', ['class' => 'btn btn-success']) !!}
			        </div>
			    {!!form::close()!!}
			</div>
		</div>
	</div>
</div>

@endsection
@section('pageJs') 
<script> 
//load_sections();
$('.add_more_item').click(function(e) {
	e.preventDefault();
	var $item = $('.item');
	var $clone = $item.clone().removeClass('item'); // Clone item 
	$clone.appendTo("#items_block");
});
</script>
@stop
