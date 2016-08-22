<div class="col-lg-6">
  <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Supplier/Vendor Name', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('name', $_GET['name'], ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Vendor Name', 'autocomplete' => 'off',]) !!}
    </div>
    {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('vendor_code') ? 'has-error' : ''}}">
    {!! Form::label('vendor_code', 'Supplier/Vendor Code', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('vendor_code', $_GET['vendor_code'], ['class' => 'form-control required', 'id' => 'vendor_code', 'placeholder' => 'Vendor Code', 'autocomplete' => 'off', ]) !!}
    </div>
    {!! $errors->first('vendor_code', '<span class="help-inline">:message</span>') !!}
  </div>

</div>

<div class="col-lg-6">
  <div class="form-group {{ $errors->has('vendor_phone') ? 'has-error' : ''}}">
    {!! Form::label('vendor_phone', 'Supplier/Vendor Phone', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::tel('vendor_phone', $_GET['vendor_phone'], ['class' => 'form-control ', 'id' => 'vendor_phone', 'placeholder' => 'Supplier/Vendor Phone', 'autocomplete' => 'off']) !!}
    </div>
    {!! $errors->first('vendor_phone', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('vendor_mobile') ? 'has-error' : ''}}">
    {!! Form::label('vendor_mobile', 'Supplier/Vendor Mobile', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::number('vendor_mobile', $_GET['vendor_mobile'], ['class' => 'form-control ', 'id' => 'vendor_mobile', 'placeholder' => 'Vendor Mobile', 'autocomplete' => 'off',]) !!}
    </div>
    {!! $errors->first('vendor_mobile', '<span class="help-inline">:message</span>') !!}
  </div>

  <?php
  $status[1] = 'Active';
  $status[0] = 'Deactive';
  ?>

  <!-- <div class="form-group">
    {!! Form::label('status', 'Item Status', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('status', $status, 1, ['class' => 'control-label', 'id' => 'status']) !!}
    </div>
  </div> -->

</div>

