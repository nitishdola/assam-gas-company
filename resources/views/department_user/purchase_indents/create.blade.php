@extends('layouts.department_user')
@section('title') Material Purchase Indent @stop
@section('pageTitle') Material Purchase Indent @stop

@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>

<li>
	<i class="fa fa-th"></i>
	<a href="{{ route('item_sub_group.index') }}">Items</a>
</li>

<li>
	Material Purchase Indent
</li>

@stop

@section('content')
<div class="col-lg-12">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
		    <div class="col-xs-8">
			    {!! Form::open(array('route' => 'purchase_indent.store', 'id' => 'purchase_indent.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('department_user.purchase_indents._form')

			        @foreach($requisition_items as $k => $v)
			        <input type="hidden" name="requisition_item_ids[]" value="{{ $v->id }}">
			        @endforeach
			        <input type="hidden" name="requisition_id" value="{{ $requisition_id }} ">
			        <div class="col-md-12"> 
			        	{!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
			        	{!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			        </div>
			    {!!form::close()!!}
			</div>

			<div class="col-md-4" style="height: 500px; overflow: scroll;">
				<h3> Description of Goods </h3>
				<ul>
					@foreach($requisition_items as $k => $v)
					<li> <strong>{{ $v->item_measurement['item_name']}}</strong> <br>
					<strong>Qty :</strong> {{ $v->quantity_demanded}} <strong>Unit</strong> {{ $v->measurement_unit['name']}}
					<p> <strong>Store Description</strong> : {{ $v->store_description }} </p></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
@section('pageJs') @stop
