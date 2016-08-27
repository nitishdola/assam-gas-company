<div id="items_block" class="col-xs-12" style="margin-bottom:15px;">
	<div class="item material_item" style="border:1px solid #D9D6D6; padding:8px; background:#E7E3E3; margin:10px 0">
		<div class="form-group {{ $errors->has('item_measurement_id') ? 'has-error' : ''}}">
		  {!! Form::label('item_measurement_id', '', array('class' => 'col-md-3 control-label')) !!}
		  <div class="col-md-9">
		    {!! Form::select('item_measurement_id[]', $item_measurements, null, ['class' => 'required form-control col-md-12 item_measurement', 'id' => 'item_measurement_id', 'autocomplete' => 'off', 'required' => 'true']) !!}
		  </div>
		  {!! $errors->first('item_measurement_id', '<span class="help-inline">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('store_description') ? 'has-error' : ''}}">
		  {!! Form::label('store_description', '', array('class' => 'col-md-3 control-label')) !!}
		  <div class="col-md-9">
		    {!! Form::textarea('store_description[]', null, ['class' => 'form-control required', 'id' => 'store_description', 'rows' => 2, 'placeholder' => 'Description of Stores', 'autocomplete' => 'off', 'required' => 'true']) !!}
		  </div>
		  {!! $errors->first('store_description', '<span class="help-inline">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('measurement_unit_id') ? 'has-error' : ''}}">
		  {!! Form::label('measurement_unit_id', '', array('class' => 'col-md-3 control-label')) !!}
		  <div class="col-md-9">
		    {!! Form::select('measurement_unit_id[]', $units, null, ['class' => 'required form-control col-md-12', 'id' => 'measurement_unit_id', 'autocomplete' => 'off', 'required' => 'true']) !!}
		  </div>
		  {!! $errors->first('measurement_unit_id', '<span class="help-inline">:message</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('quantity_demanded') ? 'has-error' : ''}}">
		  {!! Form::label('quantity_demanded', '', array('class' => 'col-md-3 control-label')) !!}
		  <div class="col-md-3">
		    {!! Form::number('quantity_demanded[]', null, ['class' => 'form-control required', 'id' => 'quantity_demanded', 'step' => '0.01', 'placeholder' => 'Quantity Demanded', 'autocomplete' => 'off', 'required' => 'true']) !!}
		  </div>

		  {!! Form::label('stock_in_hand', '', array('class' => 'col-md-3 control-label')) !!}
		  <div class="col-md-3 stock_in_hand" style="margin-top:4px">
		    0
		  </div>

		  {!! $errors->first('quantity_issued', '<span class="help-inline">:message</span>') !!}
		</div>


		<div class="form-group {{ $errors->has('rate') ? 'has-error' : ''}}">
		  {!! Form::label('rate', '', array('class' => 'col-md-3 control-label')) !!}
		  <div class="col-md-3">
		    {!! Form::number('rate[]', null, ['class' => 'rate form-control required', 'id' => 'rate', 'placeholder' => 'Rate', 'readonly' => true, 'step' => '0.01', 'autocomplete' => 'off', 'required' => 'true']) !!}
		  </div>

		  <!-- 
		  {!! Form::label('value', '', array('class' => 'col-md-3 control-label')) !!}
		  <div class="col-md-3">
		    {!! Form::text('value[]', null, ['class' => 'disabled form-control', 'id' => 'value', 'disabled' => true, 'placeholder' => 'Value', 'autocomplete' => 'off',]) !!}
		  </div> -->

		  {!! $errors->first('rate', '<span class="help-inline">:message</span>') !!}
		</div>


		<div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
		  {!! Form::label('remarks', 'Remarks(If Any)', array('class' => 'col-md-3 control-label')) !!}
		  <div class="col-md-9">
		    {!! Form::textarea('remarks[]', null, ['class' => 'form-control required', 'id' => 'remarks', 'rows' => 2, 'placeholder' => 'Remarks if any', 'autocomplete' => 'off',]) !!}
		  </div>
		  {!! $errors->first('remarks', '<span class="help-inline">:message</span>') !!}
		</div>
	</div>
</div>

<div id="col-md-12">
	<a href="#" class="btn btn-warning add_more_item">Add More Item <i class="fa fa-plus-square" aria-hidden="true"></i></a>

	<a href="#" class="btn btn-danger remove_item" style="display:none">Remove <i class="fa fa-minus-square" aria-hidden="true"></i></a>
</div>

