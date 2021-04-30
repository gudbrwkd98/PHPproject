@extends('layout.dashboard')
@section('title', "Personal Information")
@section('content-title')

	@hasRole('user')
	<div class="alert alert-success" style="font-size: medium;">
		Before proceeding make sure all documents to be uploaded are in PDF format
	</div>
	@endhasRole

    Personal Information
    <a  href="{{ route('user.profile', $user=Auth::user()->id) }}">
    	<button class="btn btn-danger zoom"><i class="fas fa-edit"></i></button>
    </a>
	@hasRole('user')

		@if (
			count($plans) >= 1 
			&
			count($formaleduc) >= 1 
			& 
			count($workexperience) >= 1 )


		<a href="{{ url('/appForm/Application_Form') }}" class="btn btn-danger" target="_blank">
			<i class="fas fa-file-pdf"></i> 	
			Application Form
		</a>
		@endif
			@if (
			count($plans) >= 1 )
		<a href="{{ url('/appForm/ETEEAP_Additional_Requirement') }}" class="btn btn-danger" target="_blank">
			<i class="fas fa-file-pdf"></i> 	
			ETEEAP Additional Requirement
		</a>
		@endif
			@if (
			 count($engagement) >= 1 
			&& count($communityinvolvement) >= 1 )

		<a href="{{ url('/appForm/Narrative_Report') }}" class="btn btn-danger" target="_blank">
			<i class="fas fa-file-pdf"></i> 	
			Narrative Report
		</a>
		@endif
    	@if (
		
			 count($formaleduc) >= 1 
			&& count($workexperience) >= 1 
			&& count($engagement) >= 1 
			&& count($communityinvolvement) >= 1 
		)
		<a href="{{ url('/appForm/Curriculum_Vitae') }}" class="btn btn-danger" target="_blank">
			<i class="fas fa-file-pdf"></i> 	
			Curriculum Vitae
		</a>
		@endif
	@endhasRole

@endsection
@section('content')
        <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ alert for session error ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
	@if (session('error'))
		<div class="alert alert-danger">
			{{ session('error') }}
		</div>
	@endif


    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ alert for changes ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
	@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif
<div class="row">
	<div class="col-4">
		@if(Auth::user()->profiles->photo)<a href="{{asset('uploads/profilepicture/'.Auth::user()->profiles->photo)}}" target="_blank">
			<img src="{{ asset('uploads/profilepicture/'.Auth::user()->profiles->photo)}}" class="img-thumbnail rounded-circle" alt="Image" style="height: 20rem;width:20rem" ></a>
			@else
			<a href="{{asset('uploads/profilepicture/default.jpg')}}" target="_blank">
			<img src="{{ asset('uploads/profilepicture/default.jpg')}}" class="img-thumbnail rounded-circle" alt="Image"
			style="height: 20rem;width:20rem"></a>
			@endif
	</div>
	<div class="col-8">
		<table class="table table-borderless col-10">
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th width="15%">Name
				<td >
					
					{{Auth::user()->profiles->lastName}}, {{Auth::user()->profiles->firstName}} {{Auth::user()->profiles->middleName}}
				</td>
				<th>Gender</th>
				<td>
					{{Auth::user()->profiles->gender}}
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>Address</th>
				<td>
					{{Auth::user()->profiles->address }}
				</td>
				<th>Phone Number</th>
				<td>
					{{Auth::user()->profiles->phone}}
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>Birth Date</th>
				<td>
					{{Auth::user()->profiles->bday }}
				</td>
				<th>Birth Place</th>
				<td>
					{{Auth::user()->profiles->birth_place }}
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>Civil Status</th>
				<td>
					{{Auth::user()->profiles->civil_status }}
				</td>
				<th>Language</th>
				<td>
					{{Auth::user()->profiles->language }}
				</td>
			</tr>
		</table>
	</div>
</div>
@endsection