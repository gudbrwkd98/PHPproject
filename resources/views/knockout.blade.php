@extends('layout.full')
@section('title', "Pre - Assement Questions")
@section('content-title')
    Create Account
@endsection
@section('content')
<div class="row">
	<div class="col-md-4">
		<center>
			<img src="{{asset('img/eteeap.jpg')}}" class="p-5">
		</center>
	</div>
	<div class="col-md-8 bg-gray-300">

		<i>
			
		</i>
			@if (session('error'))
		<div class="alert alert-danger">
			{{ session('error') }}
		</div>
	@endif

		<form method="POST"  action="{{ route('user.create.store') }}" enctype="multipart/form-data">
			@CSRF
					{{method_field('POST')}}	
				    @method('POST')
			<table class="table table-borderless p-5" style="color: black;">
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<th colspan="3" style="font-size: large;">
						<center>
							Pre Assessment
						</center>
					</th>
				</tr>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<th style="">
						Are you a Filipino citizen?
					</th>
					<td>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="citizen" id="yes" value="yes">
							<label class="form-check-label" for="yes">Yes</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="citizen" id="no" value="no">
							<label class="form-check-label" for="no">No</label>
						</div>
					</td>
				</tr>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<th style="">
						Birthday
					</th>
					<td colspan="2">
						<input type="date" class="form-control form-control-user" name="bdate" id="bdate">
					</td>
				</tr>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<th style="">
						How many years of work experience?
					</th>
					<td colspan="2">
						<input type="number" class="form-control form-control-user" name="exp" id="exp">
					</td>
				</tr>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<tr>
					<td colspan="3">
						 <button  type="submit" class="btn btn-danger">
                                    {{ __('Submit') }}
                                </button>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
@endsection