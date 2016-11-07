@extends('layouts.department_user')
@section('title') Requisition Raise Form @stop
@section('pageTitle') Requisition Raise Form @stop
@section('formNumber') (<span class="form-number">Form Number : {{ config('globals.req_form') }}</span>) @stop
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
	Requisition Raise Form
</li>
@stop
@section('pageCss') <style>.item_code { font-weight:500; } </style>
@section('content')
<div class="widget-container fluid-height clearfix">
	<div class="widget-content padded">
	    <div class="col-xs-12">
		    {!! Form::open(array('route' => 'requisition.store', 'id' => 'requisition.store', 'class' => 'form-horizontal row-border')) !!}
		        @include('department_user.requisitions._form')
						<hr>
		        <div class="col-xs-12" style="padding-bottom: 10px;"> <h3> Add Items </h3></div>

		        @include('department_user.requisitions._item_form2')
		        <div class="col-xs-12" style="margin-top:30px;">
		        {!! Form::label('', '', array('class' => 'col-md-5 control-label')) !!}
		        {!! Form:: submit('Create Requisition', ['class' => 'btn btn-success']) !!}
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
$(".select2").select2();
$('.add_more_item').click(function(e) {
	$latest_tr 	= $('#req_table tr:last');
  $('select.select2').select2('destroy');
	$clone 			= $latest_tr.clone(true, true);
	$latest_tr.after($clone);// console.log($clone.html());
	$('select.select2').select2();
	$clone.find(':text').val('');
	$clone.find('.quantity_demanded').val('');
	$clone.find('.stock_in_hand').text('');
	$clone.find('.item_code').text('');
	item++;
	show_hide_item(item);
});

$('.remove_item').click(function(e) {
	item--;
  $latest_tr.remove();
	e.preventDefault();
	show_hide_item(item);
});

function show_hide_item( item ) {
	if(item > 1) {
		$('.remove_item').show();
	}else{
		$('.remove_item').hide();
	}
}

//$('.item_measurement').change(function(e) {
$(".item_measurement").on("change", function() { console.log('Change');
	var url 	= '';
	var data	= '';
	var $this = $(this);
	var item_measurement_id = $this.val();
	var $parent = $this.parents('.material_item');
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
				$latest_tr 	= $('#req_table tr:last');
				$latest_tr.find('.rate').val(resp.latest_rate);
				$latest_tr.find('.stock_in_hand').text(resp.stock_in_hand);
				$latest_tr.find('.item_code').text(resp.item_code);
			}
		});
	}
});
</script>
@stop
