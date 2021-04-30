@extends('layout.dashboard')
@section('title', "Non Formal Education Details")
@section('content-title')
    Non Formal Education Details
@endsection
@section('content')
<div class="col-10">
    <form method="POST" action="" enctype="multipart/form-data">
		<table class="table table-borderless" style="font-size: medium;">
	    	<!-- --------------------  --------------------  -------------------- -->
	    	<tr>
	    		<th>
	    			Training Program <i style="color: red;">*</i>
	    		</th>
	    		<td>
	    			<input type="text" class="form-control" id="" name="" required="">
	    		</td>
	    	</tr>
	    	<!-- --------------------  --------------------  -------------------- -->
	    	<tr>
	    		<th>
	    			Title of Certificate <i style="color: red;">*</i>
	    		</th>
	    		<td>
	    			<input type="text" class="form-control" id="" name="" required="">
	    		</td>
	    	</tr>
	    	<!-- --------------------  --------------------  -------------------- -->
	    	<tr>
	    		<th>
	    			Certifying Agency <i style="color: red;">*</i>
	    		</th>
	    		<td>
	    			<input type="text" class="form-control" id="" name="" required="">
	    		</td>
	    	</tr>
	    	<!-- --------------------  --------------------  -------------------- -->
	    	<tr>
	    		<th>
	    			Date Start <i style="color: red;">*</i>
	    		</th>
	    		<td>
	    			<input type="date" class="form-control" id="" name="" required="">
	    		</td>
	    	</tr>
	    	<!-- --------------------  --------------------  -------------------- -->
	    	<tr>
	    		<th>
	    			Date End <i style="color: red;">*</i>
	    		</th>
	    		<td>
	    			<input type="date" class="form-control" id="" name="" required="">
	    		</td>
	    	</tr>
	    	<!-- --------------------  --------------------  -------------------- -->
	    	<tr>
	    		<th>
	    			Attachment <i style="color: red;">*</i>
	    		</th>
	    		<td>
	    			<input type="file" id="" name="" required="">
	    		</td>
	    	</tr>
	    	<!-- --------------------  --------------------  -------------------- -->
	    	<tr>
	    		<td colspan="2">
					<button type="" class="btn btn-danger zoom float-right"><i class="far fa-save"></i></button>
					<a href="nonformal-education">
						<button class="btn btn-secondary zoom float-right mr-1"><i class="fas fa-backward"></i></button>	
					</a>
	    		</td>
	    	</tr>

	    </table>	
	</form>
</div>
@endsection