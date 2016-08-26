<div class="col-lg-6">
  <div class="form-group">
    {!! Form::label('deparetment_id', 'Department', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
    {!! Form::select('deparetment_id', $departments, old('deparetment_id'), ['class' => 'col-md-12 select2', 'id' => 'deparetment_id']) !!}
    </div>
  </div>
</div>

<div class="col-lg-6">
  
</div>

