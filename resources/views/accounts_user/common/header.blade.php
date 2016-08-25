<header class="navbar clearfix" id="header">
	<div class="container">
			<div class="navbar-brand">
				<!-- COMPANY LOGO -->
				<a href=" {{ route('admin.dashboard') }}">
					<img src="{{ asset('assets/img/logo/logo.png') }}" alt="Assam Gas Company Logo" class="img-responsive" height="30" width="180">
				</a>
				<!-- /COMPANY LOGO -->
				<!-- TEAM STATUS FOR MOBILE -->
				<div class="visible-xs">
					<a href="#" class="team-status-toggle switcher btn dropdown-toggle">
						<i class="fa fa-users"></i>
					</a>
				</div>
				<!-- /TEAM STATUS FOR MOBILE -->
				<!-- SIDEBAR COLLAPSE -->
				<div id="sidebar-collapse" class="sidebar-collapse btn">
					<i class="fa fa-bars" 
						data-icon1="fa fa-bars" 
						data-icon2="fa fa-bars" ></i>
				</div>
				<!-- /SIDEBAR COLLAPSE -->
			</div>
			<!-- BEGIN TOP NAVIGATION MENU -->					
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->	

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user"></i>
						<span class="name">{{ Auth::guard('accounts_user')->user()->name}} </span>
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu skins">
						<li><a href="{{route('chnage_accounts_user_password')}}" data-skin="default">Change Password</a></li>
						<li><a href=" {{ route('accounts_user.logout') }} " data-skin="night">Sign Out</a></li>
					 </ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
			<!-- END TOP NAVIGATION MENU -->
	</div>
</header>
	<!--/HEADER -->