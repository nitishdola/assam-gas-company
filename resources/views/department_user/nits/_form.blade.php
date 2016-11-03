<div class="form-group {{ $errors->has('purchase_indent_id') ? 'has-error' : ''}}">
  {!! Form::label('purchase_indent_id', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::select('purchase_indent_id', $purchase_indents, null, ['class' => 'select2 required col-md-6', 'required' => true, 'id' => 'item_code', 'placeholder' => 'Select Purchase Indent Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('purchase_indent_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('nit_number') ? 'has-error' : ''}}">
  {!! Form::label('nit_number', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('nit_number', null, ['class' => 'form-control required', 'required' => true, 'id' => 'nit_number', 'placeholder' => 'NIT Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('nit_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
  {!! Form::label('subject', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('subject', null, ['class' => 'form-control required', 'required' => true, 'id' => 'subject', 'placeholder' => 'Subject', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('subject', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
  {!! Form::label('description', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::textarea('description', null, ['class' => 'form-control required', 'rows' => 3, 'required' => true, 'id' => 'description', 'placeholder' => 'Description', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('description', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('nit_date') ? 'has-error' : ''}}">
  {!! Form::label('nit_date', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('nit_date', date('d-m-Y'), ['class' => 'datepicker form-control', 'required' => true, 'id' => 'nit_date', 'placeholder' => 'NIT Date', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('nit_date', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('sale_period_from') ? 'has-error' : ''}}">
  {!! Form::label('sale_period_from', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('sale_period_from', date('Y-m-d H:i:s'), ['class' => 'datetimepicker form-control', 'required' => true, 'id' => 'sale_period_from', 'placeholder' => 'NIT Date', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('sale_period_from', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('sale_period_to') ? 'has-error' : ''}}">
  {!! Form::label('sale_period_to', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('sale_period_to', date('Y-m-d H:i:s'), ['class' => 'datetimepicker form-control', 'required' => true, 'id' => 'sale_period_from', 'placeholder' => 'NIT Date', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('sale_period_to', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('nit_opening_date') ? 'has-error' : ''}}">
  {!! Form::label('nit_opening_date', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('nit_opening_date', date('d-m-Y'), ['class' => 'datepicker form-control', 'required' => true, 'id' => 'nit_opening_date', 'placeholder' => 'NIT Opening Date', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('nit_opening_date', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('nit_closing_date') ? 'has-error' : ''}}">
  {!! Form::label('nit_closing_date', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('nit_closing_date', date('d-m-Y'), ['class' => 'datepicker form-control', 'required' => true, 'id' => 'nit_closing_date', 'placeholder' => 'NIT Closing Date', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('nit_closing_date', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('nit_pre_bid_date') ? 'has-error' : ''}}">
  {!! Form::label('nit_pre_bid_date', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('nit_pre_bid_date', date('d-m-Y'), ['class' => 'datepicker form-control', 'required' => true, 'id' => 'nit_pre_bid_date', 'placeholder' => 'NIT pre bid Date', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('nit_pre_bid_date', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('estimate_cost') ? 'has-error' : ''}}">
  {!! Form::label('estimate_cost', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-4">
    {!! Form::number('estimate_cost', null, ['class' => 'form-control', 'step' => '0.01', 'required' => true, 'id' => 'estimate_cost', 'placeholder' => 'Estimate Cost', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('estimate_cost', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('tender_cost') ? 'has-error' : ''}}">
  {!! Form::label('tender_cost', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-4">
    {!! Form::number('tender_cost', null, ['class' => 'form-control', 'step' => '0.01', 'required' => true, 'id' => 'tender_cost', 'placeholder' => 'Tender Cost', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('tender_cost', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('emd_cost') ? 'has-error' : ''}}">
  {!! Form::label('emd_cost', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-4">
    {!! Form::number('emd_cost', null, ['class' => 'form-control', 'step' => '0.01', 'required' => true, 'id' => 'emd_cost', 'placeholder' => 'EMD Cost', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('emd_cost', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('currency') ? 'has-error' : ''}}">
  {!! Form::label('currency', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('currency', null, ['class' => 'form-control required', 'required' => true, 'id' => 'currency', 'placeholder' => 'Currency', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('currency', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('tender_details') ? 'has-error' : ''}}">
  {!! Form::label('tender_details', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::textarea('tender_details', null, ['class' => 'form-control', 'id' => 'remarks',  'placeholder' => 'Tender Details', 'rows' => 3, 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('tender_details', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('tender_type') ? 'has-error' : ''}}">
  {!! Form::label('tender_type', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('tender_type', null, ['class' => 'form-control required', 'required' => true, 'id' => 'tender_type', 'placeholder' => 'Tender Type', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('tender_type', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
  {!! Form::label('remarks', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::textarea('remarks', null, ['class' => 'form-control', 'id' => 'remarks',  'placeholder' => 'Remarks', 'rows' => 3, 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('remarks', '<span class="help-inline">:message</span>') !!}
</div>
