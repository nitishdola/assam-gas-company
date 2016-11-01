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
	Previous Rate/Vendor Rate for  {{ $info->requisition_item->item_measurement['name'] }}
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
        <h2> Previous Rate/Vendor Rate for  {{ $info->requisition_item->item_measurement['name'] }} </h2>
		    <div class="col-xs-12">
			    {!! Form::open(array('route' => [ 'store.previous_rates', Crypt::encrypt($info->id)], 'id' => 'store.previous_rates', 'class' => 'form-horizontal row-border')) !!}
          <div  style="background:#d9d9d9; padding:15px;" class="col-md-12">
              <div class="col-md-12">
              @include('department_user.purchase_indents.qoutation._previous_form')
              </div>

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
