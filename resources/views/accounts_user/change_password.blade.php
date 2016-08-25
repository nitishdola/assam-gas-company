@extends('layouts.accounts_user')
@section('title') Add a Budget Head @stop


@section('breadcumb') 
<li>
  <i class="fa fa-home"></i>
  <a href="{{ route('accounts_user.dashboard') }}">Dashboard</a>
</li>
<li>
   Change your password</li>

@stop
@section('content')
<div class="col-lg-5">
    
        {!!Form::open(array('class' => '', 'id' => 'changepass-form')) !!}

        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
          {!! Form::label('current_password', 'Current Password') !!}
          <div class="controls">
            {!! Form::password('current_password', ['class' => 'form-control', 'id' => 'current_password', 'autocomplete' => 'off', 'required' => 'true']) !!}
            {!! $errors->first('current_password', '<label class="control-label" for="inputError">:message</label>') !!}
          </div>
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