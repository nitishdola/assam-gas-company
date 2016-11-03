@extends('layouts.department_user')
@section('title') Add Quotation Values @stop
@section('pageTitle') Add Quotation Values @stop

@section('breadcumb')
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('purchase_indent.index') }}">Purchase Indents</a>
</li>

<li>
	Add Qutation Values
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
        <h4> Quotation Value for Item {{ $info->requisition_item->item_measurement['item_name'] }} : NIT Number <span class="oblique">{{ $nit_details->nit_number }} </span></h4>
		    <div class="col-xs-12">
			    {!! Form::open(array('route' => 'quotation_values.store', 'id' => 'quotation_values.store', 'class' => 'form-horizontal row-border')) !!}
          <div  style="background:#d9d9d9; padding:15px;" class="col-md-12">
              <div class="col-md-12">
              @include('department_user.purchase_indents.qoutation._form')
              <p> * <i>Leave field blank if number of vendor is less than shown in the form</i></p>
              </div>
              <div class="col-md-2 col-md-offset-5">
                <buttun id="add_more_quote_value" type="button" class="btn btn-info"> <i class="fa fa-plus-square" aria-hidden="true"></i> Add More </div>
                <buttun style="display:none;" id="remove_quote_value" type="button" class="btn btn-danger"> <i class="fa fa-plus-square" aria-hidden="true"></i> Remove </div>
              </div>
			        <input type="hidden" name="nit_id" value="{{ $nit_details->id }} ">
          </div>
	        <div class="col-md-12" style="margin-top:30px;">
	        	{!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
	        	{!! Form:: submit('Add Quotation', ['class' => 'btn btn-success']) !!}
	        </div>
			    {!!form::close()!!}
			</div>
		</div>
	</div>
</div>
@endsection
@section('pageJs')
<script>
var count = 1;
$('#add_more_quote_value').click(function(e) {
    e.preventDefault();
    $('#parentQoute').clone().appendTo("#subQoute");
    count++;
    if(count > 1) {
      $('#remove_quote_value').show();
    }else{
      $('#remove_quote_value').hide();
    }
});

$('#remove_quote_value').click(function(e) {
  e.preventDefault();
  $last = $('.qte').last();
  $last.remove();
  count--;
  if(count > 1) {
    $('#remove_quote_value').show();
  }else{
    $('#remove_quote_value').hide();
  }
});
</script>
@stop
