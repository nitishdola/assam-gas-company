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
			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-table fa-fw"></i> <span class="menu-text">Section</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('section.create') }}"><span class="sub-menu-text">Add Section</span></a></li>
					<li><a class="" href="{{ route('section.create') }}"><span class="sub-menu-text">View Sections</span></a></li>
				</ul>
			</li>
			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-pencil-square-o fa-fw"></i> <span class="menu-text">Item Group &amp; Sub-group</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('item_group.create') }}"><span class="sub-menu-text">Add Item group</span></a></li>
					<li><a class="" href="{{ route('item_group.index') }}"><span class="sub-menu-text">View Item Groups</span></a></li>
					<li><a class="" href="{{ route('item_sub_group.create') }}"><span class="sub-menu-text">Add Item Sub Group</span></a></li>
					
					<li><a class="" href="{{ route('item_sub_group.index') }}"><span class="sub-menu-text">View All Item Sub Group</span></a></li>
				</ul>
			</li>

			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-location-arrow"></i> <span class="menu-text">Location</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('location.create') }}"><span class="sub-menu-text">Add Location</span></a>
					</li>
					<li><a class="" href="{{ route('location.index') }}"><span class="sub-menu-text">View Location</span></a></li>
				</ul>
			</li>

			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-bars"></i> <span class="menu-text">Rack</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('rack.create') }}"><span class="sub-menu-text">Add Rack</span></a>
					</li>
					<li><a class="" href="{{ route('rack.index') }}"><span class="sub-menu-text">View Rack</span></a></li>
				</ul>
			</li>

			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-bars"></i> <span class="menu-text">User</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('department_user.create') }}"><span class="sub-menu-text">Add Department User</span></a>
					</li>
					<li><a class="" href="{{route('account_user.create')}}"><span class="sub-menu-text">Add Account User</span></a>
					</li>
				</ul>
				
			</li>
			
		</ul>
		<!-- /SIDEBAR MENU -->
	</div>
</div>
<!-- /SIDEBAR -->