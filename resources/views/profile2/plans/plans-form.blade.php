@extends('layout.dashboard')
@section('title', "ETEEAP Plan Details")
@section('content-title')
    ETEEAP Plan Details
@endsection
@section('content')
<form method="POST" action="">
	<table class="table table-borderless">
		<input type="text" id="userID" name="userID" value="userID" required hidden>
		<input type="text" id="planID" name="planID" value="planID" required hidden>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2">
				<img src="{{asset('img/core-values.png')}}" style="height: 10rem;">
				<br>
			</th>
			<td>
				<strong>In 300 words – explain how you were able to apply the Core Values of the University of Baguio to your current work.
				<i class="text-danger">*</i></strong>
				<br>
				<textarea rows="3" class="form-control" style="color:black;" id="" name="" required=""></textarea>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th width="20%">
				Degree Program applied for:
			</th>
			<th width="10%" style="text-align: right;">
				1st Priority<i class="text-danger">*</i>
			</th>
			<td style="text-align: left;">
				<select class="form-control" style="color:black;" id="" name="" required="">
					<option></option>
				</select>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2" style="text-align: right;">
				2nd Priority<i class="text-danger">*</i>
			</th>
			<td style="text-align: left;">
				<select class="form-control" style="color:black;" id="" name="" required="">
					<option></option>
				</select>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2" style="text-align: right;">
				3rd Priority<i class="text-danger">*</i>
			</th>
			<td style="text-align: left;">
				<select class="form-control" style="color:black;" id="" name="" required="">
					<option></option>
				</select>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2">
				Statment of goals, objectives or purposes for applying for the degree
			</th>
			<td >
				<textarea class="form-control" style="color:black;" id="" name="" rows="3" required=""></textarea>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2">
				Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program. Be specific.
			</th>
			<td>
				<textarea class="form-control" style="color:black;" id="" name="" rows="3" required=""></textarea>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2">
				For overseas applicants, describe how you plan to obtain accreditation/ equivalency (e.g. when you plan to come to the Philippines)	
			</th>
			<td>
				<textarea class="form-control" style="color:black;" id="" name="" rows="3" required=""></textarea>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2">
				How soon do you need to complete accreditation / equivalency?
			</th>
			<td>
				<select class="form-control" style="color:black;" id="" name="" required="">
					<option value="less than one (1) year">less than one (1) year</option>
					<option value="1 year"> 1 year</option>
					<option value="2 year"> 2 year</option>
					<option value="3 year"> 3 year</option>
					<option value="4 year"> 4 year</option>
					<option value="more than 5 years">more than 5 years</option>
				</select>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2">
				To sum up please write an essay on how your attaining a degree contributes to your personal development, your community, your workplace, society, and country?
			</th>
			<td>
				<textarea class="form-control" style="color:black;" id="" name="" rows="3" required=""></textarea>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<td colspan="3">
                <button type="submit" class="btn btn-danger zoom float-right"><i class="far fa-save"></i></button>
                <a href="/plans">
                    <button class="btn btn-secondary zoom float-right mr-1"><i class="fas fa-backward"></i></button>    
                </a>
			</td>
		</tr>
	</table>
</form>
@endsection