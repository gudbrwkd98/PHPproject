@extends('layout.full')
@section('title', "Create Profile")
@section('content')


<div class="row">
	<div class="col-md-5">
		<div style="margin-top: 30%;">
			<center>
				<img src="{{asset('img/eteeap.jpg')}}" class="p-5">
			</center>
		</div>
	</div>
	<div class="col-md-7 bg-gray-300">
		<div class="mx-2">
			
			<form method="POST"  class ="user" action="{{ route('user.editprofile.store')}}" enctype="multipart/form-data">
				 @CSRF
						{{method_field('POST')}}	
				        @method('POST')

				         @if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
				        
				<table class="table table-borderless text-dark p-5">
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<tr>
						<th colspan="2" style="text-align: center; font-size: large;">
						    Create Profile!
						</th>
					</tr>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<tr>
						<td>
	                    	<input type="text" class="form-control form-control-user" id="firstName" name="firstName" pattern="[A-Za-z\s]+" title="Must use letters only" placeholder="First Name*" required="">
						</td>
						<td>
	                    	<input type="text" class="form-control form-control-user" id="middleName" name="middleName" pattern="[A-Za-z\s]{0,}" title="Must use letters only" placeholder="Middle Name" >
						</td>
					</tr>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<tr>
						<td>
	                    	<input type="text" class="form-control form-control-user" id="lastName" name="lastName" pattern="[A-Za-z\s]+" title="Must use letters only" placeholder="Last Name*" required="">
						</td>
						<td>
                            <div class="select-style">
                                <select id="gender" name="gender" required="">
                                    <option value="" disabled="" selected="">--- Gender ---</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </td>
					</tr>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<tr>
						<td colspan="2">
							<input type="text" class="form-control form-control-user" id="address" placeholder="Complete Address*" name="address" required="">
						</td>
					</tr>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<tr>
						<td>
							<input type="date" class="form-control form-control-user" id="bday" name="bday" required="">
						</td>
						<td>
							<input type="text" style="border-color: #d8d8d8;" class="form-control form-control-user" id="birthplace" placeholder="Birthplace*" name="birthplace" required="" title="Must use letters only">
						</td>
					</tr>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<tr>
						<td>
							<div class="select-style">
								<select id="civilStatus" name="civilStatus" required="">
									<option value="" disabled="" selected="">--- Civil Status ---</option>
									<option value="Single">Single</option>
									<option value="Married">Married</option>
									<option value="Divorced">Divorced</option>
									<option value="Seprated">Seprated</option>
									<option value="Widowed">Widowed</option>
								</select>
							</div>
						</td>
						<td>
							<input type="text" style="border-color: #d8d8d8;" class="form-control form-control-user" id="phone" placeholder="Phone Number*" name="phone" required="" pattern="[0-9]{11}" title="Must be numeric only with a max of 11 digits">
						</td>
					</tr>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<tr>
						<td colspan="2">
							<input type="text" class="form-control form-control-user" id="language" placeholder="Language*" name="language" required="">
						</td>
						<td>
						</td>
					</tr>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					
					 <tr>
				               
				                <td colspan="2">Profile Picture :
				                    <input type="file" id="image" name="image">
				                    <div>{{$errors->first('image')}}</div>
				                </td>
				            </tr> 
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<tr>
						<td colspan="2">
							<input type="submit" class="btn btn-danger btn-user btn-block" name="" value="Update Profile">
						
							
						</td>
					</tr>

				</table>
			</form>
		</div>
	</div>
</div>
@endsection