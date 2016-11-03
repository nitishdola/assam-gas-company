

<div class="col-lg-6">
  <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
    {!! Form::label('username', 'Username', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('username', null, ['class' => 'form-control', 'id' => 'username', 'placeholder' => 'Username of employee', 'autocomplete' => 'off']) !!}
    </div>
    {!! $errors->first('username', '<span class="help-inline">:message</span>') !!}
  </div>

</div>

