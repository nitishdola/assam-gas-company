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
					<li><a class="" href="{{ route('section.index') }}"><span class="sub-menu-text">View Sections</span></a></li>
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
				<i class="fa fa-arrows"></i> <span class="menu-text">Item</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('item_measurement.create') }}"><span class="sub-menu-text">Add Item</span></a></li>

					<li><a class="" href="{{ route('item_measurement.index') }}"><span class="sub-menu-text">View All Items</span></a></li>
				</ul>
			</li>


			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-cogs" aria-hidden="true"></i> <span class="menu-text">Salvage Item</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('salvage_item_measurement.create') }}"><span class="sub-menu-text">Add Salvage Item</span></a>
					</li>
					<li><a class="" href="{{ route('salvage_item_measurement.index') }}"><span class="sub-menu-text">View Salvage Items</span></a></li>
				</ul>
			</li>

			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-arrows"></i> <span class="menu-text">Measurement Unit</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('measurement_unit.create') }}"><span class="sub-menu-text">Add Measurement Unit</span></a></li>

					<li><a class="" href="{{ route('measurement_unit.index') }}"><span class="sub-menu-text">View All Item Sub Group</span></a></li>
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
				<i class="fa fa-user"></i> <span class="menu-text">Designation</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('designation.create') }}"><span class="sub-menu-text">Add Designations</span></a>
					</li>
					<li><a class="" href="{{ route('designation.index') }}"><span class="sub-menu-text">View Designations</span></a></li>
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
				<i class="fa fa-users"></i> <span class="menu-text">User</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">

					<li><a class="" href="{{ route('material_user.create') }}"><span class="sub-menu-text">Add Material Department User</span></a>
					</li>

					<li><a class="" href="{{ route('department_user.create') }}"><span class="sub-menu-text">Add Department User</span></a>
					</li>
					<li><a class="" href="{{route('department_user.index')}}"><span class="sub-menu-text">View Department Users</span></a>
					</li>
					<li><a class="" href="{{route('account_user.create')}}"><span class="sub-menu-text">Add Account User</span></a>
					</li>
					<li><a class="" href="{{route('account_user.index')}}"><span class="sub-menu-text">View Account Users</span></a>
					</li>
				</ul>
			</li>

			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-location-arrow"></i> <span class="menu-text">Requisition</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">

					<li><a class="" href="{{ route('admin.requisition.index') }}"><span class="sub-menu-text">View Requisition</span></a></li>
				</ul>
			</li>

			<!--Permission and roles-->
			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-location-arrow"></i> <span class="menu-text">Role</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('role.create') }}"><span class="sub-menu-text">Add Role</span></a></li>
					<li><a class="" href="{{ route('role.index') }}"><span class="sub-menu-text">View Role</span></a></li>

				</ul>
			</li>

			 <li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-users"></i> <span class="menu-text">Permission</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('permission.create') }}"><span class="sub-menu-text">Add Permission</span></a></li>
					<li><a class="" href="{{ route('permission.index') }}"><span class="sub-menu-text">View Permissions</span></a></li>
                </ul>
			</li>

			 <li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-location-arrow"></i> <span class="menu-text">Assign Permissions</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('assign_permission.create') }}"><span class="sub-menu-text">Assign Permission</span></a></li>
					<li><a class="" href="{{ route('assign_permission.index') }}"><span class="sub-menu-text">View Assigned Permission</span></a></li>
                </ul>
			</li>

			  <li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-user"></i> <span class="menu-text">Assign Role </span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('assign_role.create') }}"><span class="sub-menu-text">Assign Role </span></a></li>
					<li><a class="" href="{{ route('assign_role.index') }}"><span class="sub-menu-text">View Assigned Role</span></a></li>
                </ul>
			</li>
		</ul>
		<!-- /SIDEBAR MENU -->
	</div>
</div>
<!-- /SIDEBAR -->
