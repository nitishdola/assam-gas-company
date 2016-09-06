<div class="col-lg-6">
  <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name of the role', 'autocomplete' => 'off']) !!}
    </div>
    {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

