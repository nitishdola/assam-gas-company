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

@section('content')
<div class="col-lg-12" style="margin-top:20px;">
	<div class="widget-container fluid-height clearfix">
		<div class="widget-content padded">
			<div class="row">
				<div class="col-md-12">
					<!-- BOX -->
					<div class="box border inverse">
						<div class="box-title">
							<h4><i class="fa fa-info-circle" aria-hidden="true"></i> {{ $item->item_code }}</h4>
							<div class="tools hidden-xs">
								<a href="javascript:;" class="collapse">
									<i class="fa fa-chevron-up"></i>
								</a>
								<a href="javascript:;" class="remove">
									<i class="fa fa-times"></i>
								</a>
							</div>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-3"> Item Code </div> 
										<div class="col-md-9"> {{ $item->item_code }} </div>
									</div>

									<div class="row">
										<div class="col-md-3"> Item Name </div> 
										<div class="col-md-9"> {{ $item->item_name }} </div>
									</div>

									<div class="row">
										<div class="col-md-3"> Description </div> 
										<div class="col-md-9"> {{ $item->item_description }} </div>
									</div>

									<div class="row">
										<div class="col-md-3"> Part Number </div> 
										<div class="col-md-9"> {{ $item->item_description }} </div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /BOX -->
				</div>
			</div>
			<div class="col-xs-12">
			{!! Form::open(array('route' => 'requisition.store', 'id' => 'requisition.store', 'class' => 'form-horizontal row-border')) !!}
			<div class="form-group {{ $errors->has('requisition_number') ? 'has-error' : ''}}">
			  {!! Form::label('quantity_demanded', '', array('class' => 'col-md-3 control-label')) !!}
			  <div class="col-md-9">
			    {!! Form::text('requisition_number', $item->quantity_demanded, ['class' => 'form-control required', 'id' => 'requisition_number', 'placeholder' => 'Quantity Demanded', 'readonly' => true, 'autocomplete' => 'off', 'required' => 'true']) !!}
			  </div>
			  {!! $errors->first('requisition_number', '<span class="help-inline">:message</span>') !!}
			</div>

			<div class="form-group {{ $errors->has('issue') ? 'has-error' : ''}}">
			  {!! Form::label('issue', '', array('class' => 'col-md-3 control-label')) !!}
			  <div class="col-md-9">
			    {!! Form::text('issue', $item->quantity_demanded, ['class' => 'form-control required', 'id' => 'issue', 'placeholder' => 'Quantity Issued', 'autocomplete' => 'off', 'required' => 'true']) !!}
			  </div>
			  {!! $errors->first('issue', '<span class="help-inline">:message</span>') !!}
			</div>
			{!!form::close()!!}
		</div>
	</div>
</div>
@endsection