<!-- SIDEBAR -->
<div id="sidebar" class="sidebar">
	<div class="sidebar-menu nav-collapse">
		<div class="divide-20"></div>
		<!-- SIDEBAR QUICK-LAUNCH -->
		<!-- <div id="quicklaunch"> -->
		<!-- /SIDEBAR QUICK-LAUNCH -->
		
		<!-- SIDEBAR MENU -->
		<ul>
			<li class="active">
				<a href="{{ route('admin.dashboard') }}">
				<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
				<span class="selected"></span>
				</a>					
			</li>
			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">Department</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('department.create') }}"><span class="sub-menu-text">Add Department</span></a>
					</li>
					<li><a class="" href="{{ route('department.index') }}"><span class="sub-menu-text">View Departments</span></a></li>
				</ul>
			</li>
		</ul>
		<!-- /SIDEBAR MENU -->
	</div>
</div>
<!-- /SIDEBAR -->