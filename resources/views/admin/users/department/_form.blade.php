
<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
  {!! Form::label('designation_id_id', 'Select Designation', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('designation_id', $designations, null, ['class' => 'col-md-12 select2 required', 'id' => 'designation_id','required' => 'true']) !!}
  {!! $errors->first('designation_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>
<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
  {!! Form::label('department_id', 'Select Department', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('department_id', $departments, null, ['class' => 'col-md-12 select2 required', 'id' => 'department_id','required' => 'true']) !!}
  {!! $errors->first('department_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
  {!! Form::label('section_id', 'Select Section', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('section_id', $sections, null, ['class' => 'col-md-12 select2 required', 'id' => 'section_id','required' => 'true']) !!}
  {!! $errors->first('section_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Employee Name', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Employee Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
  {!! Form::label('username', 'Username', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('username', null, ['class' => 'form-control required', 'id' => 'username', 'placeholder' => 'Employee CPF Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('username', '<span class="help-inline">:message</span>') !!}
</div>


