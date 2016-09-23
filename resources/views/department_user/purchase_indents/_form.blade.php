<div class="form-group {{ $errors->has('purchase_indent_number') ? 'has-error' : ''}}">
  {!! Form::label('purchase_indent_number', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('purchase_indent_number', null, ['class' => 'form-control required', 'id' => 'item_code', 'placeholder' => 'Purchase Indent Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('purchase_indent_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('purchase_indent_date') ? 'has-error' : ''}}">
  {!! Form::label('purchase_indent_date', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('purchase_indent_date', date('d-m-Y'), ['class' => 'datepicker form-control', 'id' => 'purchase_indent_date', 'placeholder' => 'Purchase Indent Date', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('purchase_indent_date', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('reference_number') ? 'has-error' : ''}}">
  {!! Form::label('reference_number', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('reference_number', null, ['class' => 'form-control required', 'id' => 'reference_number', 'placeholder' => 'Reference Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('reference_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('reference_date') ? 'has-error' : ''}}">
  {!! Form::label('reference_date', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-4">
    {!! Form::text('reference_date', date('d-m-Y'), ['class' => 'datepicker form-control', 'id' => 'reference_date', 'placeholder' => 'Reference Date', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('reference_date', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('budget_head_id') ? 'has-error' : ''}}">
  {!! Form::label('budget_head_id', 'Budget Head', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::select('budget_head_id', $budget_heads, null, ['class' => 'select2 col-md-12', 'id' => 'budget_head_id', 'placeholder' => 'Select Budget Head', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('budget_head_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('justification_of_the_purchase') ? 'has-error' : ''}}">
  {!! Form::label('justification_of_the_purchase', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::textarea('justification_of_the_purchase', null, ['class' => 'form-control', 'id' => 'justification_of_the_purchase', 'rows' => 3, 'placeholder' => 'Justification of the purchase', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('justification_of_the_purchase', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
  {!! Form::label('remarks', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::textarea('remarks', null, ['class' => 'form-control', 'id' => 'remarks', 'placeholder' => 'Remarks', 'rows' => 3, 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('remarks', '<span class="help-inline">:message</span>') !!}
</div>

