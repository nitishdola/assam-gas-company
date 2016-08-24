<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
  {!! Form::label('department_id', 'Select Department', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('department_id', $departments, null, ['class' => 'col-md-12 select2 required', 'id' => 'department_id','required' => 'true']) !!}
  {!! $errors->first('department_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
  {!! Form::label('section_id', 'Select Section', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('section_id', $sections, null, ['class' => 'col-md-12 select2 required', 'id' => 'section_id','required' => 'true']) !!}
  {!! $errors->first('section_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>

<div class="form-group {{ $errors->has('budget_head_id') ? 'has-error' : ''}}">
    {!! Form::label('budget_head_id', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::select('budget_head_id', $budget_heads, null, ['class' => 'col-md-12 select2 required', 'id' => 'budget_head_id', 'placeholder' => 'Budget Head Code', 'autocomplete' => 'off', 'required' => 'true']) !!}
    </div>
    {!! $errors->first('budget_head_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('budget_head_amount') ? 'has-error' : ''}}">
  {!! Form::label('budget_head_amount', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::number('budget_head_amount', null, ['class' => 'form-control required', 'id' => 'budget_head_amount', 'placeholder' => 'Budget Head Amount', 'autocomplete' => 'off', 'step' => '0.01', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('budget_head_amount', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('budget_head_reserve_amount') ? 'has-error' : ''}}">
  {!! Form::label('budget_head_reserve_amount', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::number('budget_head_reserve_amount', null, ['class' => 'form-control required', 'id' => 'budget_head_reserve_amount', 'placeholder' => 'Budget Head Reserve Amount', 'autocomplete' => 'off', 'step' => '0.01', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('budget_head_reserve_amount', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('budget_head_utilized_amount') ? 'has-error' : ''}}">
  {!! Form::label('budget_head_utilized_amount', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::number('budget_head_utilized_amount', null, ['class' => 'form-control required', 'id' => 'budget_head_utilized_amount', 'placeholder' => 'Budget Head Utilized Amount', 'autocomplete' => 'off', 'step' => '0.01', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('budget_head_utilized_amount', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
  {!! Form::label('section_id', 'Select Section', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
  {!! Form::select('section_id', $sections, null, ['class' => 'col-md-12 select2 required', 'id' => 'section_id','required' => 'true']) !!}
  {!! $errors->first('section_id', '<span class="help-inline">:message</span>') !!}
  </div>
</div>