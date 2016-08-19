<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('item_group_id', 'Item Group', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('item_group_id', $item_groups, null, ['class' => 'col-md-12 select2', 'id' => 'item_group_id']) !!}
    </div>
  </div>

  <div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
    {!! Form::label('item_sub_group_id', 'Item Sub Group', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('item_sub_group_id', $item_sub_groups, null, ['class' => 'col-md-12 select2', 'id' => 'item_sub_group_id']) !!}
    {!! $errors->first('item_sub_group_id', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>
</div>

<div class="col-lg-6">
  <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
    {!! Form::label('username', 'Username', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('username', null, ['class' => 'form-control', 'id' => 'username', 'placeholder' => 'Employee CPF Number', 'autocomplete' => 'off']) !!}
    </div>
    {!! $errors->first('username', '<span class="help-inline">:message</span>') !!}
  </div>

  <?php

  $status[1] = 'Active';
  $status[0] = 'Deactive';

  ?>

  <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Employee Status', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('status', $status, 1, ['class' => 'control-label', 'id' => 'status']) !!}
    {!! $errors->first('status', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>
</div>

