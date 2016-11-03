@extends('layouts.admin')
@section('title') All Department Users @stop

@section('breadcumb') 
<li>
  <i class="fa fa-home"></i>
  <a href="{{ route('admin.dashboard') }}">Dashboard</a>
</li>

<li>
  <i class="fa fa-th"></i>
  Department Users
</li>

@stop
@section('content')
<div class="col-lg-5">
    
        {!!Form::open(array('class' => '', 'id' => 'changepass-form')) !!}

        <div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
          {!! Form::label('username', 'Username') !!}
          <div class="controls">
         {!! Form::text('username', $departmentuser->username, ['class' => 'form-control ', 'id' => 'username', 'placeholder' => 'Employee CPF Number', 'readonly' => true, 'autocomplete' => 'off', 'required' => 'true']) !!}
      </div>
         {!! $errors->first('username', '<span class="help-inline">:message</span>') !!}
     </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
          {!! Form::label('password_new', 'New Password') !!}
          <div class="controls">
            {!! Form::password('password_new', ['class' => 'form-control', 'id' => 'current_password', 'autocomplete' => 'off', 'required' => 'true']) !!}
            {!! $errors->first('password_new', '<label class="control-label" for="inputError">:message</label>') !!}
          </div>
        </div> 

        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
          {!! Form::label('password_new_confirmation', 'Confirm Password') !!}
          <div class="controls">
            {!! Form::password('password_new_confirmation', ['class' => 'form-control', 'id' => 'current_password', 'autocomplete' => 'off', 'required' => 'true']) !!}
            {!! $errors->first('password_new_confirmation', '<label class="control-label" for="inputError">:message</label>') !!}
          </div>
        </div>

        <button type="submit" class="btn btn-success">Change Password</button>
    </form>
</div>
@stop                               