<div class="col-md-6 col-md-offset-3">
	<div class="login-box-plain">
		<h2 class="bigintro">Login as Admin</h2>
		<div class="divide-40"></div>
		<form role="form" method="POST" action="{{ url('/admin/login') }}">
        {{ csrf_field() }}
		  <div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<i class="fa fa-user"></i>
			<input type="username" class="form-control" name="username" value="{{ old('username') }}">
		  </div>
		  <div class="form-group"> 
			<label for="exampleInputPassword1">Password</label>
			<i class="fa fa-lock"></i>
			<input type="password" class="form-control" name="password">
		  </div>
		  <div class="form-actions">
			
			<button type="submit" class="btn btn-danger">Login as Admin</button>
		  </div>
		</form>
		<!-- SOCIAL LOGIN -->
		<div class="divide-20"></div>
		<div class="center">
			<strong>Or login as user</strong>
		</div>
		<div class="divide-20"></div>
		<div class=" center">
			<a class="btn btn-primary btn-lg">
				Department User
			</a>
			<a class="btn btn-info btn-lg">
				Account User
			</a>
		</div>
	</div>
</div>