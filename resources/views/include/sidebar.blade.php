
<!-- Sidebar -->
<ul class="navbar-nav bg-gray-700 sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
		<div class="sidebar-brand-icon ">
			<img src="{{asset('img/eteeap.jpg')}}" style="height: 40px;width: 40px; border-radius: 20%; ">
		</div>
		<div class="sidebar-brand-text mx-3">UB ETEEAP IS</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- -------------------- Profile -------------------- -->
	<li class="nav-item active">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-address-card"></i>
			<span>Profile</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="/">Personal Information</a>
				<a class="collapse-item" href="{{ route('user.education')}}">Formal Education </a>
				<a class="collapse-item" href="{{ route('user.non-formal-education')}}">Non-Formal Education </a>
				<a class="collapse-item" href="awards">Awards </a>
				<a class="collapse-item" href="work-experience">Work Experience </a>
				<a class="collapse-item" href="organization-membership">Organization Membership </a>
				<a class="collapse-item" href="community-involvement">Community Involvement </a>
				<a class="collapse-item" href="creative-works">Creative Works </a>
				<a class="collapse-item" href="hobbies">Others </a>
			</div>
		</div>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- -------------------- send Application -------------------- -->
	<li class="nav-item active">
		<input type="button" class="btn btn-danger m-3" value="Send Application">
	</li>

	<!-- -------------------- Application -------------------- -->
	<li class="nav-item active">
		<a class="nav-link" href="">
			<i class="fas fa-envelope-open-text"></i>
			<span>Application</span>
		</a>
	</li>

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->