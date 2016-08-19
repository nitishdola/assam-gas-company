<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('item_group_id', 'Item Group', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('item_group_id', $item_groups, old('item_group_id'), ['class' => 'col-md-12 select2', 'id' => 'item_group_id']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('part_number', 'Part Number', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('part_number', old('part_number'), ['class' => 'form-control', 'id' => 'part_number', 'placeholder' => 'Part Number', 'autocomplete' => 'off']) !!}
    </div>
  </div>

</div>

<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('item_code', 'Item Code', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('item_code', old('item_code'), ['class' => 'form-control', 'id' => 'item_code', 'placeholder' => 'Item Code', 'autocomplete' => 'off']) !!}
    </div>
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

