<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
  {!! Form::label('department_id', 'Select Department', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('department_id', $departments, null, ['class' => 'select2able required', 'id' => 'department_id','required' => 'true']) !!}
  {!! $errors->first('department_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Section Name', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Section Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('section_code') ? 'has-error' : ''}}">
  {!! Form::label('section_code', 'Section Code', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('section_code', null, ['class' => 'form-control required', 'id' => 'section_code', 'placeholder' => 'Section Code', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('section_code', '<span class="help-inline">:message</span>') !!}
</div>
