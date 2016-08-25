<div class="form-group {{ $errors->has('requisition_number') ? 'has-error' : ''}}">
  {!! Form::label('requisition_number', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('requisition_number', null, ['class' => 'form-control required', 'id' => 'requisition_number', 'placeholder' => 'Requisition Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('requisition_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('job_number') ? 'has-error' : ''}}">
  {!! Form::label('job_number', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('job_number', null, ['class' => 'form-control', 'id' => 'job_number', 'placeholder' => 'Job Number', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('job_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('name_of_work') ? 'has-error' : ''}}">
  {!! Form::label('name_of_work', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('name_of_work', null, ['class' => 'form-control required', 'id' => 'name_of_work', 'placeholder' => 'Name of Work', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name_of_work', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('chargeable_account_id') ? 'has-error' : ''}}">
  {!! Form::label('chargeable_account_id', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::select('chargeable_account_id', $chargeable_accounts, null, ['class' => 'required select2 col-md-12', 'id' => 'chargeable_account_id', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('chargeable_account_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('financial_year') ? 'has-error' : ''}}">
  {!! Form::label('financial_year', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('financial_year', null, ['class' => 'form-control required', 'id' => 'financial_year', 'placeholder' => 'Financial year', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('financial_year', '<span class="help-inline">:message</span>') !!}
</div>