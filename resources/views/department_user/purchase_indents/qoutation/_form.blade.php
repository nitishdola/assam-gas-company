<div id="parentQoute">
  <div class="qte">
    <div class="col-md-6">
      <div class="form-group {{ $errors->has('vendor_id') ? 'has-error' : ''}}">
      {!! Form::label('vendor_id', 'Select Vendor', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-9">
        {!! Form::select('vendor_id[]', $vendors, null, ['class' => 'form-control col-md-8 required', 'required' => true, 'id' => 'vendor_id', 'placeholder' => 'Select Vendor', 'required' => 'true']) !!}
      </div>
      {!! $errors->first('vendor_id', '<span class="help-inline">:message</span>') !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
      {!! Form::label('value', '', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-9">
        {!! Form::number('value[]', null, ['class' => 'col-md-8 form-control required', 'step' => 0.01, 'required' => true, 'id' => 'value', 'placeholder' => 'Enter Value/Price', 'required' => 'true']) !!}
      </div>
      {!! $errors->first('value', '<span class="help-inline">:message</span>') !!}
      </div>
    </div>
  </div>
</div>

<?php for($i = 0; $i < 3; $i++): ?>
<div class="qte">
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('vendor_id') ? 'has-error' : ''}}">
    {!! Form::label('vendor_id', 'Select Vendor', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::select('vendor_id[]', $vendors, null, ['class' => 'form-control col-md-8', 'id' => 'vendor_id', 'placeholder' => 'Select Vendor']) !!}
    </div>
    {!! $errors->first('vendor_id', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
    {!! Form::label('value', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::number('value[]', null, ['class' => 'col-md-8 form-control', 'step' => 0.01, 'id' => 'value', 'placeholder' => 'Enter Value/Price']) !!}
    </div>
    {!! $errors->first('value', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>
</div>
<?php endfor; ?>

<div id="subQoute"></div>
