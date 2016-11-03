<div class="form-group {{ $errors->has('department_user_id') ? 'has-error' : ''}}">
  {!! Form::label('department_user_id', 'Select a User', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('department_user_id', $department_users, null, ['class' => 'col-md-12 control-label select2 required', 'id' => 'department_user_id','required' => 'true']) !!}
  {!! $errors->first('department_user_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('roles') ? 'has-error' : ''}}">
  {!! Form::label('roles', 'Select Roles', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('roles[]', $roles, null, ['class' => 'col-md-12 control-label select2 required', 'multiple' => true]) !!}
  {!! $errors->first('roles', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

