@extends('layouts.department_user')
@section('title') Issue Item @stop
@section('pageTitle') Issue Item @stop
@section('breadcumb') 
<li>
	<i class="fa fa-home"></i>
	<a href="{{ route('department_user.dashboard') }}">Dashboard</a>
</li>
<li>
	<i class="fa fa-th"></i>
	Requisitions
</li>
@stop
@section('pageCss') <style>.item-info{ padding: 2px 0; border-bottom: 1px solid #f9f9f9; }</style> @stop
@section('content')
<div class="col-lg-12" style="margin-top:20px;">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			<div class="row">
				<div class="col-md-12">
					<!-- BOX -->
					<div class="box border purple">
						<div class="box-title">
							<h4>
								<i class="fa fa-info-circle" aria-hidden="true"></i> 
								{{ $item->item_code }}
							</h4>
							<div class="tools hidden-xs">
								<a href="javascript:;" class="collapse">
									<i class="fa fa-chevron-up"></i>
								</a>
								<!-- <a href="javascript:;" class="remove">
									<i class="fa fa-times"></i>
								</a> -->
							</div>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-6">
									
									<div class="row item-info">
										<div class="col-md-3"> Item Group </div> 
										<div class="col-md-9"> {{ $item->item_group['name'] }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Item Sub Group </div> 
										<div class="col-md-9"> {{ $item->item_sub_group['name'] }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Measurement Unit </div> 
										<div class="col-md-9"> {{ $item->measurement_unit['name'] }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Item Code </div> 
										<div class="col-md-9"> {{ $item->item_code }} </div>
									</div>

									<div class="row item-info">
										<div class="col-md-3"> Item Name </div> 
										<div class="col-md-9"> {{ $item->item_name }} </div>
									</div>

									<div class="row item-info">
										<div class="col-md-3"> Description </div> 
										<div class="col-md-9"> {{ $item->item_description }} </div>
									</div>

									<div class="row item-info">
										<div class="col-md-3"> Part Number </div> 
										<div class="col-md-9"> {{ $item->item_description }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Manufacturer </div> 
										<div class="col-md-9"> {{ $item->manufacturer }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Expiry Date </div> 
										<div class="col-md-9"> {{ $item->expiry_date }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Asset Type</div> 
										<div class="col-md-9"> {{ $item->asset_type }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Insured</div> 
										<div class="col-md-9"> {{ $item->insured }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Review</div> 
										<div class="col-md-9"> {{ $item->review }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Product Preference</div> 
										<div class="col-md-9"> {{ $item->product_preference }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Minimum Stock</div> 
										<div class="col-md-9"> {{ $item->minimum_stock_level }} </div>
									</div>
									
								</div>

								<div class="col-md-6">
									<div class="row item-info">
										<div class="col-md-3"> Reorder Stock</div> 
										<div class="col-md-9"> {{ $item->reorder_stock_level }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> ABC</div> 
										<div class="col-md-9"> {{ $item->abc }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> XYZ</div> 
										<div class="col-md-9"> {{ $item->xyz }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> FSN</div> 
										<div class="col-md-9"> {{ $item->fsn }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Location</div> 
										<div class="col-md-9"> {{ $item->location['name'] }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Rack</div> 
										<div class="col-md-9"> {{ $item->rack['name'] }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> BIN</div> 
										<div class="col-md-9"> {{ $item->bin_number }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Store</div> 
										<div class="col-md-9"> {{ $item->store_code }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Kardex Number</div> 
										<div class="col-md-9"> {{ $item->kardex_number }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Latest Rate</div> 
										<div class="col-md-9"> {{ $item->latest_rate }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Weighted Average Rate</div> 
										<div class="col-md-9"> {{ $item->weighted_average_rate }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Opening Stock</div> 
										<div class="col-md-9"> {{ $item->opening_stock }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> WEF</div> 
										<div class="col-md-9"> {{ $item->wef }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Stock In Hand</div> 
										<div class="col-md-9"> {{ $item->stock_in_hand }} </div>
									</div>
									<div class="row item-info">
										<div class="col-md-3"> Created By</div> 
										<div class="col-md-9"> {{ $item->creator['name'] }} </div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /BOX -->
				</div>
			</div>
			<div class="col-xs-12">
			{!! Form::open(array('route' => 'requisition.issue', 'id' => 'requisition.issue', 'class' => 'form-horizontal row-border')) !!}
			<div class="form-group {{ $errors->has('requisition_number') ? 'has-error' : ''}}">
			  {!! Form::label('quantity_demanded', '', array('class' => 'col-md-3 control-label')) !!}
			  <div class="col-md-9">
			    {!! Form::text('quantity_demanded', $requisition_item->quantity_demanded, ['class' => 'form-control required', 'id' => 'quantity_demanded', 'placeholder' => 'Quantity Demanded', 'readonly' => true, 'autocomplete' => 'off', 'required' => 'true']) !!}
			  </div>
			  {!! $errors->first('requisition_number', '<span class="help-inline">:message</span>') !!}
			</div>

			<div class="form-group {{ $errors->has('quantity_issued') ? 'has-error' : ''}}">
			  {!! Form::label('issue', '', array('class' => 'col-md-3 control-label')) !!}
			  <div class="col-md-9">
			    {!! Form::text('quantity_issued', $requisition_item->quantity_demanded, ['class' => 'form-control required', 'id' => 'quantity_issued', 'placeholder' => 'Quantity Issued', 'autocomplete' => 'off', 'required' => 'true']) !!}
			  </div>
			  {!! $errors->first('quantity_issued', '<span class="help-inline">:message</span>') !!}
			</div>

			<div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
			  {!! Form::label('remarks', '', array('class' => 'col-md-3 control-label')) !!}
			  <div class="col-md-9">
			    {!! Form::textarea('remarks', $requisition_item->remarks, ['class' => 'form-control required', 'id' => 'remarks', 'placeholder' => 'Remarks(if any)', 'autocomplete' => 'off', 'rows' => 3]) !!}
			  </div>
			  {!! $errors->first('remarks', '<span class="help-inline">:message</span>') !!}
			</div>
			<input type="hidden" name="requisition_item_id" value="{{ $requisition_item->id }}">
			<div class="form-group">
				{!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
				<div class="col-md-9"> 
			        {!! Form::label('', '', array('class' => 'col-md-2 control-label')) !!}
			        {!! Form:: submit('ISSUE', ['class' => 'btn btn-success']) !!}
			    </div>
		    </div>
			{!!form::close()!!}
		</div>
	</div>
</div>
@endsection