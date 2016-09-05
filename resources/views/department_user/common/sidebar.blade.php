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
				<a href="{{ route('department_user.dashboard') }}">
				<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
				<span class="selected"></span>
				</a>					
			</li>
			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-puzzle-piece" aria-hidden="true"></i> <span class="menu-text">Measurement of Item</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('item_measurement.create') }}"><span class="sub-menu-text">Add Item</span></a>
					</li>
					<li><a class="" href="{{ route('item_measurement.index') }}"><span class="sub-menu-text">View Items</span></a></li>
				</ul>
			</li>

			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-cogs" aria-hidden="true"></i> <span class="menu-text">Measurement of Salvage Item</span>
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
				<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">Requisition</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('requisition.create') }}"><span class="sub-menu-text">Add Requisition</span></a>
					</li>
					<li><a class="" href="{{ route('requisition.index') }}"><span class="sub-menu-text">View Requisition</span></a></li>
					
					<li><a class="" href="{{ route('requisition.approve_index') }}"><span class="sub-menu-text">Approve Requisition</span></a></li>
				</ul>
			</li>
           
			<li class="has-sub">
				<a href="{{ route('requisitions.issue.view_all') }}" class="">
				<i class="fa fa-newspaper-o"></i> <span class="menu-text">Issue Requisition</span>
				</a>
			</li>

			<li class="has-sub">
				<a href="{{ route('requisition.view_approved') }}" class="">
				<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">View Approved Requisitions( Material Department )</span>
				</a>
			</li>

			
		</ul>
		<!-- /SIDEBAR MENU -->
	</div>
</div>
<!-- /SIDEBAR -->