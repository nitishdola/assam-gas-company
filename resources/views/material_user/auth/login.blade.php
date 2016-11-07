@extends('layouts.auth')
@section('login_name') AGCL Material User Login @stop
@section('content')
<div class="col-md-6 col-md-offset-3">
    <div class="login-box-plain">
        <h2 class="bigintro">Login as Material User</h2>
        <div class="divide-40"></div>
        <form role="form" method="POST" action="{{ url('/user/material/login') }}">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <i class="fa fa-user"></i>
            <input type="username" required="required" class="form-control" name="username" value="{{ old('username') }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <i class="fa fa-lock"></i>
            <input type="password" required="required" class="form-control" name="password">
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-danger">Login</button>
          </div>
        </form>
        <!-- SOCIAL LOGIN -->
        <div class="divide-20"></div>
        <div class="center">
            <strong>Or login as</strong>
        </div>
        <div class="divide-20"></div>
        <div class=" center">
            <a class="btn btn-primary btn-lg" href="{{ url('/admin/login') }}">
                Admin
            </a>
            <a class="btn btn-info btn-lg" href="{{ url('/user/department/login') }}">
                Department User
            </a>
        </div>
    </div>
</div>
@endsection
