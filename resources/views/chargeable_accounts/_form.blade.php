<div class="form-group {{ $errors->has('chargeable_accounting_code') ? 'has-error' : ''}}">
    {!! Form::label('chargeable_accounting_code', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('chargeable_accounting_code', null, ['class' => 'form-control required', 'id' => 'chargeable_accounting_code', 'placeholder' => 'Chargeable Account Code', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('chargeable_accounting_code', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Chargeable Account Name', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Chargeable Account Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
  {!! Form::label('department_id', 'Select Department', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('department_id', $departments, null, ['class' => 'col-md-12 select2 required', 'id' => 'department_id','required' => 'true']) !!}
  {!! $errors->first('department_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('section_id') ? 'has-error' : ''}}">
  {!! Form::label('section_id', 'Select Section', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('section_id', $sections, null, ['class' => 'col-md-12 select2 required', 'id' => 'section_id','required' => 'true']) !!}
  {!! $errors->first('section_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>