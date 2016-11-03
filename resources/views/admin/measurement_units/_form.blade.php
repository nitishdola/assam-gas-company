
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Measurement Unit Name', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Measurement Unit Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('measurement_code') ? 'has-error' : ''}}">
  {!! Form::label('measurement_code', 'Measurement Unit Code', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('measurement_code', null, ['class' => 'form-control required', 'id' => 'measurement_code', 'placeholder' => 'Measurement Unit Code', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('measurement_code', '<span class="help-inline">:message</span>') !!}
</div>
