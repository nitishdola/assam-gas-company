<div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}">
  {!! Form::label('role_id', 'Select Role', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('role_id', $roles, null, ['class' => 'col-md-12 control-label select2 required', 'id' => 'role_id','required' => 'true']) !!}
  {!! $errors->first('role_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('permission_id') ? 'has-error' : ''}}">
  {!! Form::label('permission_id', 'Select Permission', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('permission_id', $permissions, null, ['class' => 'col-md-12 control-label select2 required', 'id' => 'permission_id','required' => 'true']) !!}
  {!! $errors->first('permission_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

