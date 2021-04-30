@extends('layout.dashboard')
@section('title', "Personal Information")
@section('content-title')
    Personal Information
    <a href="personal-info/edit">
    	<button class="btn btn-danger zoom"><i class="fas fa-edit"></i></button>
    </a>
@endsection
@section('content')
<div class="row">
	<div class="col-3">
		<img src="{{asset('img/judalyn_rivera.jpg')}}" class="img-thumbnail" style="height: 300px; width: 300px;">
	</div>
	<div class="col-9">
		<table class="table table-borderless col-10">
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th width="15%">First Name
				<td width="35%">
					Judalyn Beth
				</td>
				<th width="20%">Middle Name</th>
				<td width="30%">
					Gelia
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>Last Name</th>
				<td>
					Rivera
				</td>
				<th>Gender</th>
				<td>
					Female
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>Address</th>
				<td colspan="3">
					62 Liteng, Pacdal, Baguio City, Philippines 2600
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>Birth Date</th>
				<td>
					Sept-21-1991
				</td>
				<th>Birth Place</th>
				<td>
					Bronx, New York, USA
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>Civil Status</th>
				<td>
					Married
				</td>
				<th>Phone Number</th>
				<td>
					09071636134
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>Citizenship</th>
				<td>
					Filipino
				</td>
				<th>Language</th>
				<td>
					Tagalog, Ilocano, English
				</td>
			</tr>
		</table>
	</div>
</div>
@endsection