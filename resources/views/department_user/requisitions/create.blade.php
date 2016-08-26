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
var item = 1;
$('.add_more_item').click(function(e) {
	item++;
	e.preventDefault();
	var $item = $('.item');
	var $clone = $item.clone(true).removeClass('item'); // Clone item 
	$clone.appendTo("#items_block");
	show_hide_item(item);
});

$('.remove_item').click(function(e) {
	item--;
	e.preventDefault();
	$('.material_item:last').css("background-color", "#F56E6E").remove();
	show_hide_item(item);
});

function show_hide_item( item ) {
	if(item > 1) {
		$('.remove_item').show();
	}else{
		$('.remove_item').hide();
	}
}

$('.item_measurement').change(function(e) {
	console.log('Test ');
});
</script>
@stop
