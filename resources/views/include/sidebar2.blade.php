
<!-- Sidebar -->
<ul class="navbar-nav bg-gray-700 sidebar sidebar-dark accordion" id="accordionSidebar" >

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
		<div class="sidebar-brand-icon ">
			<img src="{{asset('img/eteeap.jpg')}}" style="height: 40px;width: 40px; border-radius: 20%; ">
		</div>
		<div class="sidebar-brand-text mx-3">UB ETEEAP IS</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">




	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<!-- -------------------- Profile -------------------- -->
	<div class="sidebar-heading">
		Profile
	</div>

	<!-- -------------------- personal information -------------------- -->
	<li class="nav-item active">
		<a class="nav-link " href="/">
			<i class="fas fa-fw fa-address-card"></i>
			<span>Personal Information</span>
		</a>
	</li>
	@hasRole('user')
	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- -------------------- Application -------------------- -->
	<div class="sidebar-heading">
		Application
	</div>

	<!-- will only show if user has not sent an application AND only if all requirements in the profile are complete-->
	<!-- -------------------- Send Application modal button -------------------- -->
	<li class="nav-item active">

		@if (
			count($plans) >= 1 
			&& count($formaleduc) >= 1 
			&& count($workexperience) >= 1 
			&& count($engagement) >= 1 
			&& count($communityinvolvement) >= 1 
		)
			
			@if (count($check) < 1)
				<button class="btn btn-danger m-3" data-toggle="modal" data-target="#exampleModal">
					<i class="fas fa-envelope-open-text m-1"></i> Submit Application
				</button>
			@else
				<a class="btn btn-danger m-3" href="{{ route('user.userapplication')}}">
					Application Status
				</a>
			@endif


		@endif

		<!-- dapat mag hhide lahat ng others items hanggat ndi pa ito na gagawa ng user 
		so parang if others where userID="__" is null then hide all elements maliban sa personal info-->
		<!-- -------------------- Others -------------------- -->
		<li class="nav-item active">
			<a class="nav-link " href="{{ route('user.plans')}}">
				<i class="fas fa-ellipsis-h"></i>
				<span>
					ETEEAP Plans
				</span>
				<span class="badge">
					@if (count($plans) == 1)
					&#9989
					@else 
					&#10071
					@endif
				</span>

			</a>
		</li>
		@if (count($plans) == 1)
		<!-- -------------------- Education -------------------- -->
		<li class="nav-item active">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#educationCollapse" aria-expanded="true" aria-controls="educationCollapse">
				<i class="fas fa-chalkboard"></i>
				<span>
					Education
				</span>
				<span class="badge">
					@if (count($formaleduc) >= 1 && count($nformaleduc) >= 1 )
						&#9989
					@else 
						&#10071
					@endif
				</span>

			</a>
			<div id="educationCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<!-- ---------------  FORMAL EDUCATION  --------------- -->
					<a class="collapse-item" href="{{ route('user.education')}}">
						Formal Education
						<span class="badge">
							@if (count($formaleduc) >= 1)
							&#9989
							@else 
							&#10071
							@endif
						</span>
					</a>

					<!-- ---------------  NON-FORMAL EDUCATION  --------------- -->
					<a class="collapse-item" href="{{ route('user.non-formal-education')}}">
						Non-Formal Education
					</a>

					<!-- ---------------  CETIFICATION EXAMS  --------------- -->
					<a class="collapse-item" href="{{ route('user.certificationexam')}}">
						Certification Exams	
					</a>

					<!-- ---------------  NATIONAL/LICENSURE EXAMS  --------------- -->
					<a class="collapse-item" href="{{ route('user.licensure')}}">
						National/License Exams
					</a>
				</div>
			</div>
		</li>

		<!-- references is incorporated into each input of work experience -->
		<!-- -------------------- work experience -------------------- -->
		<li class="nav-item active">
			<a class="nav-link " href="{{ route('user.workexperience')}}">
				<i class="fas fa-briefcase"></i>
				<span>
					Work Experience
				</span>
				<span class="badge">
					@if (count($workexperience) >= 1)
					&#9989
					@else 
					&#10071
					@endif
				</span>
			</a>
		</li>

		<!-- -------------------- awards -------------------- -->
		<li class="nav-item active">
			<a class="nav-link " href="{{ route('user.awards')}}">
				<i class="fas fa-award"></i>
				<span>
					Awards
				</span>
			</a>
		</li>

		<!-- -------------------- creative works -------------------- -->
		<li class="nav-item active">
			<a class="nav-link " href="{{ route('user.creative-works')}}">
				<i class="fas fa-lightbulb"></i>
				<span>
					Creative Works
				</span>
			</a>
		</li>

		<!-- -------------------- Education -------------------- -->
		<li class="nav-item active">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#lifelongCollapse" aria-expanded="true" aria-controls="lifelongCollapse">
				<i class="fas fa-chalkboard-teacher"></i>
				<span>Lifelong Learning</span>
				<span class="badge">
					
				</span>
			</a>
			<div id="lifelongCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="{{ route('user.hobbies')}}">
						Hobbies	
					</a>
					<a class="collapse-item" href="{{ route('user.specialskills')}}">
						Special Skills	
					</a>
					<a class="collapse-item" href="{{ route('user.workactivity')}}">
						Work Activities	
					</a>
					<a class="collapse-item" href="{{ route('user.volunteer')}}">
						Volunteer	
					</a>
					<a class="collapse-item" href="{{ route('user.travels')}}">
						Travels	
					</a>
				</div>
			</div>
		</li>

		<!-- -------------------- organization membership -------------------- -->
		<li class="nav-item active">
			<a class="nav-link " href="{{ route('user.organization')}}">
				<img src="{{asset('img/org-icon.png')}}" style="width: 1rem;height: 1rem;">
				<span>Organization </span>
			</a>
		</li>

		<!-- -------------------- engagements -------------------- -->
		<li class="nav-item active">
			<a class="nav-link " href="{{ route('user.engagement')}}">
				<img src="{{asset('img/speech-white.png')}}" style="width: 1rem;height: 1rem;">
				<span>Engagements</span>
				<span class="badge">@if (count($engagement) >= 1)
				&#9989
				@else 
				&#10071
				@endif</span>
			</a>
		</li>

		<!-- -------------------- community involvement -------------------- -->
		<li class="nav-item active">
			<a class="nav-link " href="{{ route('user.community')}}">
				<i class="fas fa-user-friends"></i>
				<span>Community </span>
				<span class="badge">@if (count($communityinvolvement) >= 1)
				&#9989
				@else 
				&#10071
				@endif</span>
			</a>
		</li>



		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form method="POST"  action="{{ route('user.storeApplication',$user = auth()->id()) }}" enctype="multipart/form-data">
						@CSRF
						{{method_field('POST')}}    
						@method('POST')	
						<input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
						@foreach($plans as $plan)
						<input name="course" id="course"  value="{{$plan->priority1}}" hidden>
						@endforeach

						<div class="modal-header bg-danger">
							<h5 class="modal-title text-white" id="exampleModalLabel" style="color: red;">
								You have completed all requirements!!
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" class="text-white">&times;</span>
							</button>
						</div>
						<div class="modal-body" style="color: black;">
							<p>
								Do you wish to submit your application?
								<br>
								<i style="font-size: x-small; color: red;">
									* Please note you will not be able to edit your ETEEAP Plans anymore after submission
								</i>
							</p>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger"><i class="fas fa-check"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</li>
<!-- Divider -->
<hr class="sidebar-divider mb-0">


<!-- -------------------- Additional Documents -------------------- -->
<li class="nav-item active">
	<a class="nav-link " href="{{ route('user.documents')}}">
		<i class="fas fa-folder-plus"></i>
		<span>Additional Docs</span>
	</a>
</li>
@endif
@endhasRole


@hasRole('admin')

<li class="nav-item active">
	<a class="nav-link" href="{{route('admin.users.index')}}">
		<i class="fas fa-fw fa-users"></i>
		<span>Users</span>
	</a>
</li>

<li class="nav-item active">
	<a class="nav-link" href="{{route('admin.office')}}">
		<i class="fas fa-building"></i>
		<span>Schools</span>
	</a>
</li>

<li class="nav-item active">
	<a class="nav-link" href="{{route('admin.course.index')}}">
		<i class="fas fa-fw fa-graduation-cap"></i>
		<span>Programs</span>
	</a>
</li>

<li class="nav-item active">
	<a class="nav-link" href="{{route('staff.applicants.index')}}">
		<i class="fas fa-fw fa-users"></i>
		<span>Applicants</span>
	</a>
</li>
<li class="nav-item active">
	<a class="nav-link" href="{{route('admin.reports.index')}}">
		<i class="fas fa-fw fa-book-open"></i>

		<span>Generate Report</span>
	</a>
</li>

@elsehasRole('user')
@else
<li class="nav-item active">
	<a class="nav-link" href="{{route('staff.applicants.index')}}">
		<i class="fas fa-fw fa-users"></i>
		<span>Applicants</span>
	</a>
</li>


<li class="nav-item active">
	<a class="nav-link" href="{{route('admin.reports.index')}}">
		<i class="fas fa-fw fa-book-open"></i>

		<span>Generate Report</span>
	</a>
</li>
@endhasRole






<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
	<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->