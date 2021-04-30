@extends('layout.dashboard')
@section('title', "Personal Information")
@section('content-title')
    Personal Information
@endsection
@section('content')
<form method="POST" action="" enctype="multipart/form-data">
	<table class="table table-borderless col-10">
		<!-- --------------------  --------------------  -------------------- -->
        <input type="text" name="user_id" value="" hidden>
        <!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th width="10%">
				First Name <span class="text-danger">*</span>
			</th>
			<td width="40%">
				<input type="text" class="form-control" name="firstname" id="firstname" required="">
			</td>
			<th width="15%">
				Middle Name
			</th>
			<td width="35%">
				<input type="text" class="form-control" name="middlename" id="middlename" >
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th>
				Last Name<span class="text-danger">*</span>
			</th>
			<td>
				<input type="text" class="form-control" name="lastname" id="lastname" required="">
			</td>
			<th>
				Gender<span class="text-danger">*</span>
			</th>
			<td>
				<select class="form-control" id="gender" name="gender" required="">
					<option value="Male">Male </option>
					<option value="Female">Female </option>
				</select>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th>
				Address<span class="text-danger">*</span>
			</th>
			<td colspan="3">
				<input type="text" class="form-control" name="address" id="address" required="">
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th>
				Birth Date<span class="text-danger">*</span>
			</th>
			<td>
				<input type="date" class="form-control" name="bday" id="bday" required="">
			</td>
			<th>
				Birth Place<span class="text-danger">*</span>
			</th>
			<td>
				<input type="text" class="form-control" name="birthplace" id="birthplace" required="">
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th>
				Civil Status<span class="text-danger">*</span>
			</th>
			<td>
				<select class="form-control" id="civilStatus" name="civilStatus" required="">
					<option value="Single">Single </option>
					<option value="Married">Married </option>
					<option value="Divorced">Divorced </option>
					<option value="Separated">Separated </option>
					<option value="Widowed">Widowed </option>
				</select>
			</td>
			<th>
				Phone Number<span class="text-danger">*</span>
			</th>
			<td>
				<input type="text" class="form-control" name="phone" id="phone" required="">
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th>
				Citizenship<span class="text-danger">*</span>
			</th>
			<td>
				<input type="text" class="form-control" name="" id="" required="" disabled="">
			</td>
			<th>
				Language<span class="text-danger">*</span>
			</th>
			<td>
				<input type="text" class="form-control" name="phone" id="phone" required="">
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th>
			Image
		</th>
			<td>
				<input type="file" name="" id="">
				<br><i>filename of last uploaded image</i>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td>
				<button type="submit" class="btn btn-danger zoom float-right"><i class="far fa-save"></i></button>
				<a href="personal-info">
					<button class="btn btn-secondary zoom float-right mr-1"><i class="fas fa-backward"></i></button>	
				</a>
			</td>
		</tr>
	</table>
</form>
@endsection