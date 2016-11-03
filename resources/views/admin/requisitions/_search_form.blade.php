<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('department_id', 'Department', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('department_id', $departments, old('deparetment_id'), ['class' => 'col-md-12 select2', 'id' => 'deparetment_id']) !!}
    </div>
  </div>

</div>

<div class="col-lg-6">
 <div class="form-group {{ $errors->has('chargeable_account_id') ? 'has-error' : ''}}">
  {!! Form::label('chargeable_account_id', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::select('chargeable_account_id', $chargeable_accounts, null, ['class' => 'required select2 col-md-12', 'id' => 'chargeable_account_id', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('chargeable_account_id', '<span class="help-inline">:message</span>') !!}
</div>
  
</div>
<div class="col-lg-6">
<div class="form-group {{ $errors->has('requisition_number') ? 'has-error' : ''}}">
  {!! Form::label('requisition_number', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('requisition_number', null, ['class' => 'form-control required', 'id' => 'requisition_number', 'placeholder' => 'Requisition Number', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('requisition_number', '<span class="help-inline">:message</span>') !!}
</div>
</div>

<div class="col-lg-6">
 <div class="form-group {{ $errors->has('Approval') ? 'has-error' : ''}}">
  {!! Form::label('Approval', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!!Form::select('Approval',  array('1' => 'Approved', 'NULL' => 'Not Approved'), 1, ['class' => 'form-control']) !!}
  </div>
  {!! $errors->first('Approval', '<span class="help-inline">:message</span>') !!}
</div>
  
</div>


