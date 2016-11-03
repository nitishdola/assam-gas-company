<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Department Name', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Department Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('department_code') ? 'has-error' : ''}}">
  {!! Form::label('department_code', 'Department Code', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('department_code', null, ['class' => 'form-control required', 'id' => 'department_code', 'placeholder' => 'Department Code', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('department_code', '<span class="help-inline">:message</span>') !!}
</div>
