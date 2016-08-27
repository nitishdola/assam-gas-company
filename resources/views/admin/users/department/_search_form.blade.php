<div class="col-lg-6">
  <div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
    {!! Form::label('department_id', 'Select Department', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('department_id', $departments, null, ['class' => 'col-md-12 select2', 'id' => 'department_id']) !!}
    {!! $errors->first('department_id', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>


  <div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
    {!! Form::label('section_id', 'Select Section', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('section_id', $sections, null, ['class' => 'col-md-12 select2', 'id' => 'section_id']) !!}
    {!! $errors->first('section_id', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>
</div>

<div class="col-lg-6">
<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
    {!! Form::label('designation_id', 'Select Designation', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('designation_id', $designations, null, ['class' => 'col-md-12 select2', 'id' => 'designation_id']) !!}
    {!! $errors->first('designation_id', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>
  <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
    {!! Form::label('username', 'Username', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('username', null, ['class' => 'form-control', 'id' => 'username', 'placeholder' => 'Employee CPF Number', 'autocomplete' => 'off']) !!}
    </div>
    {!! $errors->first('username', '<span class="help-inline">:message</span>') !!}
  </div>

</div>

