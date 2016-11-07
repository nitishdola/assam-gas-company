<!-- SIDEBAR -->
<div id="sidebar" class="sidebar">
	<div class="sidebar-menu nav-collapse">
		<div class="divide-20"></div>
		<ul>
			<li class="active">
				<a href="{{ route('department_user.dashboard') }}">
				<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
				<span class="selected"></span>
				</a>
			</li>
			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">Chargeable Account</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('chargeable_account.create') }}"><span class="sub-menu-text">Add Chargeable Account</span></a>
					</li>
					<li><a class="" href="{{ route('chargeable_account.index') }}"><span class="sub-menu-text">View All Chargeable Accounts</span></a></li>
				</ul>
			</li>
		</ul>
		<!-- /SIDEBAR MENU -->
	</div>
</div>
<!-- /SIDEBAR -->
