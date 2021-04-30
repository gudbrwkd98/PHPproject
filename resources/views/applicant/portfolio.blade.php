@extends('layout.dashboard')
@section('title', "Applicant's Portfolio")
@section('content-title')
    Applicant's Portfolio
@endsection
@section('content')
	<div class="col-sm-8">
		<table class="table table-borderless text-dark">
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th width="1%"></th>
				<th>Category</th>
				<th>Action</th>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					<!-- if data is null use fa-times-circle else fa-check-circle -->
					<i class="fas fa-check-circle"></i>
				</th>
				<th>
					Application Letter
				</th>
				<td>
					<a href="{{route('blank.html')}}" target="/_blank" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					<!-- if data is null use fa-times-circle else fa-check-circle -->
					<i class="fas fa-check-circle"></i>
				</th>
				<th>
					Application Form
				</th>
				<td>
					<a href="{{route('blank.html')}}" target="/_blank" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					<!-- if data is null use fa-times-circle else fa-check-circle -->
					<i class="fas fa-check-circle"></i>
				</th>
				<th>
					Resume
				</th>
				<td>
					<a href="{{route('blank.html')}}" target="/_blank" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					<!-- if data is null use fa-times-circle else fa-check-circle -->
					<i class="fas fa-times-circle"></i>
				</th>
				<th>
					Certificate of Employment
				</th>
				<td>
					<a href="{{route('blank.html')}}" target="/_blank" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					
				</th>
				<th>
					Letter of Recommendation
				</th>
				<td>
					<a href="{{route('blank.html')}}" target="/_blank" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					
				</th>
				<th>
					Passport
				</th>
				<td>
					<a href="{{route('blank.html')}}" target="/_blank" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					
				</th>
				<th>
					PSA Birth Certificate
				</th>
				<td>
					<a href="{{route('blank.html')}}" target="/_blank" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					
				</th>
				<th>
					Transcript of Records
				</th>
				<td>
					<a href="{{route('blank.html')}}" target="/_blank" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					
				</th>
				<th>
					NBI Clearance
				</th>
				<td>
					<a href="{{route('blank.html')}}" target="/_blank" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					
				</th>
				<th>
					Remarks
				</th>
				<td>
					<a href="{{route('blank.html')}}" target="/_blank" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
				</td>
			</tr>
		</table>
	</div>
@endsection