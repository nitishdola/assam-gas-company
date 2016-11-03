@extends('layouts.department_user')
@section('title') Material Requisition Edit Form @stop
@section('pageTitle') Material Requisition Edit Form @stop
@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    {!! Form::model($requisitions, array('route' => ['requisition.update', Crypt::encrypt($requisitions->id)], 'id' => 'requisition_update', 'class' => 'form-horizontal row-border')) !!}
		        @include('department_user.requisitions._form')
		        <div style="height:30px;"></div>
			        <h4> Requisition Material(s) </h4>
			        @include('department_user.requisitions._item_form')
		        <div class="col-md-12"> 
			        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
			        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
			    </div>
		    {!!form::close()!!}
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

	var url 	= '';
	var data	= '';
	var $this = $(this);
	var item_measurement_id = $this.val();
	var $parent = $this.parents('.material_item');//$this.parent(); //$('.material_item');
	if(item_measurement_id != '' || item_measurement_id != 0) {
		$.blockUI();
		url 	+= '{{ route("rest.item_values") }}';
		data 	+= '&item_measurement_id='+item_measurement_id;

		$.ajax({
			data : data,
			url  : url,
			type : 'get',
			dataType : 'json',

			error : function(resp) {
				console.log(resp);
				$.unblockUI();
			},
			success : function(resp) {
				$.unblockUI();
				$parent.find('.rate').val(resp.latest_rate);
				$parent.find('.stock_in_hand').text(resp.stock_in_hand);
			}
		});
	}
});
</script>
@stop
