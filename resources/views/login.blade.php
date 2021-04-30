@extends('layout.full')
@section('title', "Welcome")
@section('content-title')
    Welcome Page
    <a href=""><input type="button" class="btn btn-primary" value="Create"></a>
@endsection
@section('content')
<div class="row">
	<div class="col-md-4">
		<div class="my-5">
			<center>
				<img src="{{asset('img/eteeap.jpg')}}" class="p-5">
			</center>
		</div>
	</div>
	<div class="col-md-8 bg-gray-300 p-5">
		<form class="user" method="POST" action="">
			<table class="table table-borderless text-dark">
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<th style="text-align: center; font-size: large; color: black;">
						Welcome!
					</th>
				</tr>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<td>
						<input type="email" class="form-control form-control-user" id="email" placeholder="Enter Email Address...">
					</td>
				</tr>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<td>
						<input type="password" class="form-control form-control-user" id="password" placeholder="Password">
					</td>
				</tr>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<td>
						<div class="custom-control custom-checkbox small">
							<input type="checkbox" class="custom-control-input" id="customCheck">
							<label class="custom-control-label" for="customCheck">Remember Me</label>
						</div>
                    </td>
				</tr>

				<tr>
					<td>
						<a href="index.html" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register">Create an Account!</a>
                  </div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
@endsection