<header class="navbar clearfix" id="header">
	<div class="container">
		<div class="navbar-brand">
			<!-- COMPANY LOGO -->
			<a href=" {{ route('admin.dashboard') }}">
				<img src="{{ asset('public/assets/img/logo/assam-gas-company-logo.JPG') }}" alt="Assam Gas Company Logo" class="img-responsive" height="30" width="180">
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

		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-bars"></i>
					<span class="name"> Requisition</span>
					<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu skins">
					<li><a href="{{route('requisition.create')}}" data-skin="default">Raise</a></li>
					<li><a href=" {{ route('requisition.index') }} " data-skin="night">View All Requisitions</a></li>
				 </ul>
			</li>

			<li>
				<a href="{{ route('requisition.approve.view_all') }}">
					<i class="fa fa-check-square"></i>
					<span class="name"> Approve Requisition (HOD)</span>
				</a>
			</li>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-bars"></i>
					<span class="name"> Purchase Indent</span>
					<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu skins">
					<li><a href="{{route('requisition.view_approved')}}" data-skin="default">Generate</a></li>

					<li><a href="{{route('purchase_indent.view_indents')}}" data-skin="default">Check Purchase Indent</a></li>
					<li><a href="{{route('purchase_indent.view_checked')}}" data-skin="default">Approve Purchase Indent by HOD</a></li>
					<li><a href="{{route('purchase_indent.view_all_approved_indents')}}" data-skin="default">Generate NIT/Add Vendor Rates</a></li>

				 </ul>
			</li>

		</ul>

		<ul class="nav navbar-nav pull-right">
			@include('department_user.common.notifications')
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-user"></i>
					<span class="name">{{ Auth::guard('department_user')->user()->name}} </span>
					<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu skins">
					<li><a href="{{route('chnage_department_user_password')}}" data-skin="default">Change Password</a></li>
					<li><a href=" {{ route('department_user.logout') }} " data-skin="night">Sign Out</a></li>
				 </ul>
			</li>
			<!-- END USER LOGIN DROPDOWN -->
		</ul>
		<!-- END TOP NAVIGATION MENU -->
	</div>
</header>
	<!--/HEADER -->
