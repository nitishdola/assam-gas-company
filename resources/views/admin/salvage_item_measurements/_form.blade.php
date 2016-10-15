<div class="col-md-6">
  <div class="form-group {{ $errors->has('item_code') ? 'has-error' : ''}}">
    {!! Form::label('item_code', 'Item Code', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('item_code', null, ['class' => 'form-control required', 'id' => 'item_code', 'placeholder' => 'Item Code', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('item_code', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('barcode') ? 'has-error' : ''}}">
    {!! Form::label('barcode', 'Barcode', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('barcode', null, ['class' => 'form-control', 'id' => 'barcode', 'placeholder' => 'Barcode', 'autocomplete' => 'off']) !!}
    </div>
    {!! $errors->first('barcode', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('item_name') ? 'has-error' : ''}}">
    {!! Form::label('item_name', 'Item Name', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('item_name', null, ['class' => 'form-control required', 'id' => 'item_name', 'placeholder' => 'Item Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('item_name', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('item_description') ? 'has-error' : ''}}">
    {!! Form::label('item_description', 'Item Description', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::textarea('item_description', null, ['class' => 'form-control required', 'id' => 'item_description', 'placeholder' => 'Item Description', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('item_description', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('part_number') ? 'has-error' : ''}}">
    {!! Form::label('part_number', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('part_number', null, ['class' => 'form-control required', 'id' => 'part_number', 'placeholder' => 'Part Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('part_number', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('manufacturer') ? 'has-error' : ''}}">
    {!! Form::label('manufacturer', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('manufacturer', null, ['class' => 'form-control required', 'id' => 'manufacturer', 'placeholder' => 'Manufacturer', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('manufacturer', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('expiry_date') ? 'has-error' : ''}}">
    {!! Form::label('expiry_date', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('expiry_date', null, ['class' => 'datepicker form-control required', 'id' => 'expiry_date', 'placeholder' => 'Expiry Date', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('expiry_date', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('item_group_id') ? 'has-error' : ''}}">
    {!! Form::label('item_group_id', 'Select Item Group', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('item_group_id', $item_groups, null, ['class' => 'col-md-12 select2 required', 'id' => 'item_group_id','required' => 'true']) !!}
    {!! $errors->first('item_group_id', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>

  <div class="form-group {{ $errors->has('item_sub_group_id') ? 'has-error' : ''}}">
    {!! Form::label('item_sub_group_id', 'Select Item Sub Group', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('item_sub_group_id', $item_sub_groups, null, ['class' => 'col-md-12 select2 required', 'id' => 'item_sub_group_id','required' => 'true']) !!}
    {!! $errors->first('item_sub_group_id', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>

  <div class="form-group {{ $errors->has('measurement_unit_id') ? 'has-error' : ''}}">
    {!! Form::label('measurement_unit_id', 'Unit of Measurement', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('measurement_unit_id', $measurement_units, null, ['class' => 'col-md-12 select2 required', 'id' => 'measurement_unit_id','required' => 'true']) !!}
    {!! $errors->first('measurement_unit_id', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>

  <div class="form-group {{ $errors->has('asset_type') ? 'has-error' : ''}}">
    <label class="col-md-3 control-label" for="radios">Asset Type</label>
    <div class="col-md-9">
      <label class="radio-inline" for="radios-0">
        <input name="asset_type" id="radios-0" value="capital" checked="checked" type="radio">
        Capital
      </label>
      <label class="radio-inline" for="radios-1">
        <input name="asset_type" id="radios-1" value="revenue" type="radio">
        Revenue
      </label>
    </div>
  </div>


  <div class="form-group {{ $errors->has('insured') ? 'has-error' : ''}}">
    <label class="col-md-3 control-label" for="radios">Insured</label>
    <div class="col-md-9">
      <label class="radio-inline" for="radios-0">
        <input name="insured" id="radios-0" value="yes" checked="checked" type="radio">
        Insured
      </label>
      <label class="radio-inline" for="radios-1">
        <input name="insured" id="radios-1" value="no" type="radio">
        Not-Insured
      </label>
    </div>
  </div>

  <div class="form-group {{ $errors->has('review') ? 'has-error' : ''}}">
    <label class="col-md-3 control-label" for="radios">Review</label>
    <div class="col-md-9">
      <label class="radio-inline" for="radios-0">
        <input name="review" id="radios-0" value="yes" checked="checked" type="radio">
        Review
      </label>
      <label class="radio-inline" for="radios-1">
        <input name="review" id="radios-1" value="no" type="radio">
        Non-Review
      </label>
    </div>
  </div>

  <div class="form-group {{ $errors->has('product_preference') ? 'has-error' : ''}}">
    <label class="col-md-3 control-label" for="radios">Product Preference</label>
    <div class="col-md-9">
      <label class="radio-inline" for="radios-0">
        <input name="product_preference" id="radios-v" value="vital" checked="checked" type="radio">
        Vital
      </label>
      <label class="radio-inline" for="radios-1">
        <input name="product_preference" id="radios-e" value="essential" type="radio">
        Essential
      </label>
      <label class="radio-inline" for="radios-1">
        <input name="product_preference" id="radios-d" value="desirable" type="radio">
        Desirable
      </label>
    </div>
  </div>
</div>

<div class="col-md-6">

  <div class="form-group {{ $errors->has('minimum_stock_level') ? 'has-error' : ''}}">
    {!! Form::label('minimum_stock_level', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::number('minimum_stock_level', null, ['class' => 'form-control required', 'id' => 'minimum_stock_level', 'step' => '0.01', 'placeholder' => 'Minimum Stock Level', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('minimum_stock_level', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('maximum_stock_level') ? 'has-error' : ''}}">
    {!! Form::label('maximum_stock_level', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::number('maximum_stock_level', null, ['class' => 'form-control required', 'id' => 'maximum_stock_level', 'step' => '0.01', 'placeholder' => 'Maximum Stock Level', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('maximum_stock_level', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('reorder_stock_level') ? 'has-error' : ''}}">
    {!! Form::label('reorder_stock_level', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::number('reorder_stock_level', null, ['class' => 'form-control required', 'id' => 'reorder_stock_level', 'step' => '0.01', 'placeholder' => 'Reorder Stock Level', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('reorder_stock_level', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('abc') ? 'has-error' : ''}}">
    <label class="col-md-3 control-label" for="radios">ABC</label>
    <div class="col-md-9">
      <label class="radio-inline" for="radios-0">
        <input name="abc" id="radios-0" value="1" checked="checked" type="radio">
        Yes
      </label>
      <label class="radio-inline" for="radios-1">
        <input name="abc" id="radios-1" value="0" type="radio">
        No
      </label>
    </div>
  </div>

  <div class="form-group {{ $errors->has('xyz') ? 'has-error' : ''}}">
    <label class="col-md-3 control-label" for="radios">XYZ</label>
    <div class="col-md-9">
      <label class="radio-inline" for="radios-0">
        <input name="xyz" id="radios-0" value="1" checked="checked" type="radio">
        Yes
      </label>
      <label class="radio-inline" for="radios-1">
        <input name="xyz" id="radios-1" value="0" type="radio">
        No
      </label>
    </div>
  </div>

  <div class="form-group {{ $errors->has('fsn') ? 'has-error' : ''}}">
    <label class="col-md-3 control-label" for="radios">FSN</label>
    <div class="col-md-9">
      <label class="radio-inline" for="radios-0">
        <input name="fsn" id="radios-0" value="1" checked="checked" type="radio">
        Yes
      </label>
      <label class="radio-inline" for="radios-1">
        <input name="fsn" id="radios-1" value="0" type="radio">
        No
      </label>
    </div>
  </div>

  <div class="form-group {{ $errors->has('location_id') ? 'has-error' : ''}}">
    {!! Form::label('location_id', 'Location', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('location_id', $locations, null, ['class' => 'col-md-12 select2 required', 'id' => 'location_id','required' => 'true']) !!}
    {!! $errors->first('location_id', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>


  <div class="form-group {{ $errors->has('rack_id') ? 'has-error' : ''}}">
    {!! Form::label('rack_id', 'Rack', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('rack_id', $racks, null, ['class' => 'col-md-12 select2 required', 'id' => 'rack_id','required' => 'true']) !!}
    {!! $errors->first('rack_id', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>

  <div class="form-group {{ $errors->has('bin_number') ? 'has-error' : ''}}">
    {!! Form::label('bin_number', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('bin_number', null, ['class' => 'form-control required', 'id' => 'bin_number', 'placeholder' => 'Bin Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('bin_number', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('kardex_number') ? 'has-error' : ''}}">
    {!! Form::label('kardex_number', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('kardex_number', null, ['class' => 'form-control required', 'id' => 'kardex_number', 'placeholder' => 'Kardex Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('kardex_number', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('store_code') ? 'has-error' : ''}}">
    {!! Form::label('store_code', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('store_code', null, ['class' => 'form-control required', 'id' => 'store_code', 'placeholder' => 'Store Code', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('store_code', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('latest_rate') ? 'has-error' : ''}}">
    {!! Form::label('latest_rate', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::number('latest_rate', null, ['class' => 'form-control required', 'id' => 'latest_rate', 'step' => '0.01', 'placeholder' => 'Latest Rate', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('latest_rate', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('weighted_average_rate') ? 'has-error' : ''}}">
    {!! Form::label('weighted_average_rate', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::number('weighted_average_rate', null, ['class' => 'form-control required', 'id' => 'weighted_average_rate', 'step' => '0.01', 'placeholder' => 'Weighted Averge Rate', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('weighted_average_rate', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('opening_stock') ? 'has-error' : ''}}">
    {!! Form::label('opening_stock', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::number('opening_stock', null, ['class' => 'form-control required', 'id' => 'opening_stock', 'placeholder' => 'Opening Stock', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('opening_stock', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('wef') ? 'has-error' : ''}}">
    {!! Form::label('WEF', 'WEF', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('wef', null, ['class' => 'datepicker form-control required', 'id' => 'wef', 'placeholder' => 'WEF', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('wef', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('stock_in_hand') ? 'has-error' : ''}}">
    {!! Form::label('stock_in_hand', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::number('stock_in_hand', null, ['class' => 'form-control required', 'id' => 'stock_in_hand', 'placeholder' => 'Stock in hand', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('stock_in_hand', '<span class="help-inline">:message</span>') !!}
  </div>

</div>
