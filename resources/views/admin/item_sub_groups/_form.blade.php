<div class="form-group {{ $errors->has('item_group_id') ? 'has-error' : ''}}">
  {!! Form::label('item_group_id', 'Select Item Group', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('item_group_id', $item_groups, null, ['class' => 'select2able required', 'id' => 'item_group_id','required' => 'true']) !!}
  {!! $errors->first('item_group_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Item Sub Group Name', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Item Sub Group Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('item_sub_group_code') ? 'has-error' : ''}}">
  {!! Form::label('item_sub_group_code', 'Item Sub Group Code', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('item_sub_group_code', null, ['class' => 'form-control required', 'id' => 'item_sub_group_code', 'placeholder' => 'Item Sub Group Code', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('item_sub_group_code', '<span class="help-inline">:message</span>') !!}
</div>
