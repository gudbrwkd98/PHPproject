@extends('layout.dashboard')
@section('title', "Personal Information")
@section('content-title')
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






<form method="POST"  action="{{ route('user.edit.update',$user = auth()->id()) }}" enctype="multipart/form-data">
    <div class="modal-header bg-danger">
        <h4 class="modal-title text-white" id="addModalLabel">Personal Information</h4>
    </div>
    <div class="modal-body">
		@CSRF
		{{method_field('PUT')}}	
		@method('PUT')
		<table class="table table-borderless col-10">
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th width="10%">
					First Name<span class="text-danger">*</span>
				</th>
				<td width="40%">
					<input style="color: black;" type="text" class="form-control" name="firstName" id="firstName" required="" value="{{Auth::user()->profiles->firstName}}">
				</td>
				<th width="15%">
					Middle Name
				</th>
				<td class="row">
					<input style="color: black;" type="text" class="form-control" name="middleName" id="middleName"  value="{{Auth::user()->profiles->middleName}}">
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>
					Last Name<span class="text-danger">*</span>
				</th>
				<td>
					<input style="color: black;" type="text" class="form-control" name="lastName" id="lastName" required="" value="{{Auth::user()->profiles->lastName}}">
				</td>
				<th>
					Gender<span class="text-danger">*</span>
				</th>
				<td class="row">
					<select style="color: black;" class="form-control" id="gender" name="gender" required="">

						<option value="{{Auth::user()->profiles->gender}}">{{Auth::user()->profiles->gender}} </option>
						@if(Auth::user()->profiles->gender != 'Female')
						<option value="Female">Female </option>
						@endif
						@if(Auth::user()->profiles->gender != 'Male')
						<option value="Male">Male </option>

						@endif

					</select>
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>
					Address<span class="text-danger">*</span>
				</th>
				<td colspan="3">
					<input style="color: black;" type="text" class="form-control" name="address" id="address" required="" value="{{Auth::user()->profiles->address}}">
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>
					Birth Date<span class="text-danger" >*</span>
				</th>
				<td>
					<input style="color: black;" type="date" class="form-control" name="bday" id="bday" required="" value="{{Auth::user()->profiles->bday}}">
				</td>
				<th>
					Birth Place<span class="text-danger">*</span>
				</th>
				<td class="row">
					<input style="color: black;" type="text" class="form-control" name="birthplace" id="birthplace" required="" value="{{Auth::user()->profiles->birth_place}}">
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>
					Civil Status<span class="text-danger">*</span>
				</th>
				<td>
					<select style="color: black;" class="form-control" id="civilStatus" name="civilStatus" required="">
						<option value="{{Auth::user()->profiles->civil_status}}" >{{Auth::user()->profiles->civil_status}}</option>
						@if( Auth::user()->profiles->civil_status != 'Single')
						<option value="Single">Single </option>
						@endif

						@if(Auth::user()->profiles->civil_status != 'Married')
						<option value="Married">Married </option>
						@endif
						@if(Auth::user()->profiles->civil_status != 'Divorced')
						<option value="Divorced">Divorced </option>
						@endif
						@if(Auth::user()->profiles->civil_status != 'Separated')
						<option value="Separated">Separated </option>
						@endif
						@if(Auth::user()->profiles->civil_status != 'Widowed')
						<option value="Widowed">Widowed </option>
						@endif
					</select>
				</td>
				<th>
					Phone Number<span class="text-danger">*</span>
				</th>
				<td class="row">
                    <input type="text" style="color: black;" class="form-control col-11" id="phone" name="phone" pattern="[0][9][0-9]{9}" title="09XXXXXXXXX" placeholder="09XXXXXXXXX" required="" value="{{Auth::user()->profiles->phone}}"><span class="validity col-1 p-0 m-0" ></span>
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>
					Image
				</th>
				<td>
					<input type="file" name="image" id="image">
					<br><i>{{Auth::user()->profiles->photo}}</i>
				</td>
				<th>
					Language<span class="text-danger">*</span>
				</th>
				<td class="row">
					<input style="color: black;" type="text" class="form-control" name="language" id="language" required="" value="{{Auth::user()->profiles->language}}">
				</td>
			</tr>
		</table>
    </div>
    <div class="modal-footer">
		<a href="/" class="btn btn-secondary zoom"><i class="fas fa-backward"></i></a>
		<button type="submit" class="btn btn-danger zoom"><i class="far fa-save"></i></button>
    </div>
</form>  
@endsection