<div class="form-group {{ $errors->has('location_id') ? 'has-error' : ''}}">
  {!! Form::label('location_id', 'Select Location', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('location_id', $locations, null, ['class' => 'col-md-12 control-label select2 required', 'id' => 'location_id','required' => 'true']) !!}
  {!! $errors->first('location_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Rack Name', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Rack Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>
