{{ dump($errors)}}<div class="qte">
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('vendor_id') ? 'has-error' : ''}}">
    {!! Form::label('vendor_id', 'Select Vendor', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::select('vendor_id', $vendors, null, ['class' => 'form-control col-md-8 required', 'required' => true, 'id' => 'vendor_id', 'placeholder' => 'Select Vendor', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('vendor_id', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('rate') ? 'has-error' : ''}}">
    {!! Form::label('rate', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::number('rate', $info['requisition_item']->rate, ['class' => 'col-md-8 form-control required', 'step' => 0.01, 'required' => true, 'id' => 'value', 'placeholder' => 'Enter Value/Price', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('rate', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>
</div>
