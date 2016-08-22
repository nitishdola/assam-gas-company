<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Supplier/Vendor Name', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Vendor Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vendor_code') ? 'has-error' : ''}}">
  {!! Form::label('vendor_code', 'Supplier/Vendor Code', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('vendor_code', null, ['class' => 'form-control required', 'id' => 'vendor_code', 'placeholder' => 'Vendor Code', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('vendor_code', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vendor_address') ? 'has-error' : ''}}">
  {!! Form::label('vendor_address', 'Supplier/Vendor Address', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::textarea('vendor_address', null, ['class' => 'form-control required', 'id' => 'vendor_address', 'rows' => 3, 'placeholder' => 'Vendor Address', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('vendor_address', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vendor_phone') ? 'has-error' : ''}}">
  {!! Form::label('vendor_phone', 'Supplier/Vendor Phone', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::tel('vendor_phone', null, ['class' => 'form-control ', 'id' => 'vendor_phone', 'placeholder' => 'Supplier/Vendor Phone', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('vendor_phone', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vendor_email') ? 'has-error' : ''}}">
  {!! Form::label('vendor_email', 'Supplier/Vendor Email', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::email('vendor_email', null, ['class' => 'form-control ', 'id' => 'vendor_email', 'placeholder' => 'Supplier/Vendor Email', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('vendor_email', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('vendor_mobile') ? 'has-error' : ''}}">
  {!! Form::label('vendor_mobile', 'Supplier/Vendor Mobile', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::number('vendor_mobile', null, ['class' => 'form-control ', 'id' => 'vendor_mobile', 'placeholder' => 'Vendor Mobile', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('vendor_mobile', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('contact_person') ? 'has-error' : ''}}">
  {!! Form::label('contact_person', 'Supplier/Vendor Contact Person', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('contact_person', null, ['class' => 'form-control required', 'id' => 'contact_person', 'placeholder' => 'Supplier/Vendor Contact Person', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('contact_person', '<span class="help-inline">:message</span>') !!}
</div>

<?php
$rating = [
  '1' => '1',
  '2' => '2',
  '3' => '3',
  '4' => '4',
  '5' => '5',
  '6' => '6',
  '7' => '7',
  '8' => '8',
  '9' => '9',
  '10' => '10',
];
?>
<div class="form-group {{ $errors->has('cost_rating') ? 'has-error' : ''}}">
  {!! Form::label('cost_rating', 'Rating by Cost', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-3">
    {!! Form::select('cost_rating', $rating, null, ['class' => 'form-control required', 'id' => 'cost_rating', 'placeholder' => 'Select Rating', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('cost_rating', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('quality_rating') ? 'has-error' : ''}}">
  {!! Form::label('quality_rating', 'Rating by Quality', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-3">
    {!! Form::select('quality_rating', $rating, null, ['class' => 'form-control required', 'id' => 'quality_rating', 'placeholder' => 'Select Rating', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('quality_rating', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('delivery_rating') ? 'has-error' : ''}}">
  {!! Form::label('delivery_rating', 'Rating by Delivery', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-3">
    {!! Form::select('delivery_rating', $rating, null, ['class' => 'form-control required', 'id' => 'delivery_rating', 'placeholder' => 'Select Rating', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('delivery_rating', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('latest_po_awarded') ? 'has-error' : ''}}">
  {!! Form::label('latest_po_awarded', 'Latest PO Awarded', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('latest_po_awarded', null, ['class' => 'form-control required', 'id' => 'latest_po_awarded', 'placeholder' => 'Latest PO Awarded', 'autocomplete' => 'off',]) !!}
  </div>
  {!! $errors->first('latest_po_awarded', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('latest_po_date') ? 'has-error' : ''}}">
  {!! Form::label('latest_po_date', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('latest_po_date', null, ['class' => 'datepicker form-control required', 'id' => 'latest_po_date', 'placeholder' => 'Latest PO Date', 'autocomplete' => 'off',]) !!}
  </div>
  {!! $errors->first('latest_po_date', '<span class="help-inline">:message</span>') !!}
</div>
