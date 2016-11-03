<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Permission Name', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Permission Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>
<div class="form-group {{ $errors->has('display_name') ? 'has-error' : ''}}">
  {!! Form::label('display_name', 'Dispaly Name', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('display_name', null, ['class' => 'form-control required', 'id' => 'display_name', 'placeholder' => 'Dispaly Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('display_name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
  {!! Form::label('Description', 'Description', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::textarea('description', null, ['class' => 'form-control required', 'id' => 'description', 'placeholder' => 'Description of Permission', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('description', '<span class="help-inline">:message</span>') !!}
</div>