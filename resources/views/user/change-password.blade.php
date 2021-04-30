@extends('layout.full')
@section('title', "Change Password")
@section('content-title')
    
@endsection
@section('content')
<div class="row">
	<div class="col-md-6">
		<center>
			<img src="{{asset('img/eteeap.jpg')}}" class="p-5">
		</center>
	</div>
	<div class="col-md-6 bg-gray-300">
		<form class="user" method="POST" action="">
			<table class="table table-borderless p-5" style="color: black;">
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<th style="text-align: center; font-size: large;">
						Change Password
					</th>
				</tr>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<td>
						<input type="password" class="form-control form-control-user" id="oldPass" placeholder="Old Password">
					</td>
				</tr>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<td>
						<input type="password" class="form-control form-control-user" id="newPass" placeholder="New Password">
					</td>
				</tr>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<td>
						<input type="password" class="form-control form-control-user" id="rePass" placeholder="Repeat Password">
					</td>
				</tr>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<td>
						<input type="password" class="form-control form-control-user" id="rePass" placeholder="Repeat Password">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
@endsection