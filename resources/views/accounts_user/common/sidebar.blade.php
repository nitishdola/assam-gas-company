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
				<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">Chargeable Account</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('chargeable_account.create') }}"><span class="sub-menu-text">Add Chargeable Account</span></a>
					</li>
					<li><a class="" href="{{ route('chargeable_account.index') }}"><span class="sub-menu-text">View All Chargeable Accounts</span></a></li>
				</ul>
			</li>

			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">Budget Head</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('budget_head.create') }}"><span class="sub-menu-text">Add Budget Head</span></a>
					</li>
					<li><a class="" href="{{ route('budget_head.index') }}"><span class="sub-menu-text">View Budget Heads</span></a></li>
				</ul>
			</li>

			<li class="has-sub">
				<a href="javascript:;" class="">
				<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">Budget Head Transaction Process</span>
				<span class="arrow"></span>
				</a>
				<ul class="sub">
					<li><a class="" href="{{ route('budget_head_transaction.create') }}"><span class="sub-menu-text">Add Budget Head Transaction</span></a>
					</li>
					<li><a class="" href="{{ route('budget_head_transaction.index') }}"><span class="sub-menu-text">View Budget Heads Transactions</span></a></li>
				</ul>
			</li>

		</ul>
		<!-- /SIDEBAR MENU -->
	</div>
</div>
<!-- /SIDEBAR -->