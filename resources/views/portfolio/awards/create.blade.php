@extends('layout.dashboard')
@section('title', "Award Details")
@section('content-title')
    Award Details
@endsection
@section('content')
<div class="col-10">
    <form method="POST" action="" enctype="multipart/form-data">
        @CSRF
        {{method_field('POST')}}    
        @method('POST')
		<table class="table table-borderless">
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>
					Type <span style="color: red;">*</span>
				</th>
				<td>
					<select class="form-control" required="">
						<option value="Academic">Academic</option>
						<option value="Community">Community</option>
						<option value="Work">Work</option>
					</select>
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>
					Award Title <span style="color: red;">*</span>
				</th>
				<td>
					<input type="text" class="form-control" id="" name="" required="">
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>
					Award Giving Body's Name <span style="color: red;">*</span>
				</th>
				<td>
					<input type="text" class="form-control" id="" name="" required="">
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>
					Award Giving Body's Address <span style="color: red;">*</span>
				</th>
				<td>
					<input type="text" class="form-control" id="" name="" required="">
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<th>
					Date Received <span style="color: red;">*</span>
				</th>
				<td>
					<input type="date" class="form-control" id="" name="" required="">
				</td>
			</tr>
			<!-- --------------------  --------------------  -------------------- -->
			<tr>
				<td  colspan="2">
					<button type="submit" class="btn btn-danger zoom float-right"><i class="far fa-save"></i></button>
					<a href="personal-info">
						<button class="btn btn-secondary zoom float-right mr-1"><i class="fas fa-backward"></i></button>	
					</a>
				</td>
			</tr>
		</table>	
    </form>
</div>
@endsection