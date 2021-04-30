@extends('layout.dashboard')
@section('title', "ETEEAP Plan Details")
@section('content-title')
    ETEEAP Plan Details
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
@endsection
@section('content')
<form method="POST"  action="{{ route('user.storePlans',$user = auth()->id()) }}" enctype="multipart/form-data">
										@CSRF
                                    {{method_field('POST')}}    
                                    @method('POST')
                                     @foreach($comm as $com)
	<table class="table table-borderless">
		<input type="text" id ="user_id" name="user_id" value="{{Auth::user()->id}}" hidden>
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
				<textarea rows="3" class="form-control" style="color:black;" id="coreValues" name="coreValues" required="">{{$com->coreValues}}</textarea>
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
				<select class="form-control" id="priority1" name="priority1">
										@foreach($courses as $course)
										
										<option {{$course->courseName == $com->priority1 ? 'selected' :''}}>{{$course->courseName}}</option>"
										

										@endforeach
										
									</select>
			</td>

				 


		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2" style="text-align: right;">
				2nd Priority<i class="text-danger">*</i>
			</th>
			<td style="text-align: left;">
				<select class="form-control" id="priority2" name="priority2">
										@foreach($courses as $course)
										
										<option {{$course->courseName == $com->priority2 ? 'selected' :''}}>{{$course->courseName}}</option>"
										
										@endforeach
										
									</select>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2" style="text-align: right;">
				3rd Priority<i class="text-danger">*</i>
			</th>
			<td style="text-align: left;">
				<select class="form-control" id="priority3" name="priority3">
										@foreach($courses as $course)
											
										<option {{$course->courseName == $com->priority3 ? 'selected' :''}}>{{$course->courseName}}</option>"
										
										@endforeach
										
									</select>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2">
				Statment of goals, objectives or purposes for applying for the degree
			</th>
			<td >
				<textarea class="form-control" style="color:black;" id="sgop" name="sgop" rows="3" required="">
{{$com->sgop}}
				</textarea>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2">
				Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program. Be specific.
			</th>
			<td>
				<textarea class="form-control" style="color:black;" id="timePlan" name="timePlan" rows="3" required="">{{$com->timePlan}}</textarea>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2">
				For overseas applicants, describe how you plan to obtain accreditation/ equivalency (e.g. when you plan to come to the Philippines)	
			</th>
			<td>
				<textarea class="form-control" style="color:black;" id="accreditationPlan" name="accreditationPlan" rows="3" required="">{{$com->accreditationPlan}}</textarea>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2">
				How soon do you need to complete accreditation / equivalency?
			</th>
			<td>
				<select class="form-control" style="color:black;" id="plantoComplete" name="plantoComplete" required="">
						 
					<option  {{$com->plantoComplete == 'less than one (1) year' ? 'selected':''}} >less than one (1) year</option>
					<option  {{$com->plantoComplete == '1 year' ? 'selected':''}} > 1 year</option>
					<option {{$com->plantoComplete == '2 year' ? 'selected':'' }}> 2 years</option>
					<option {{$com->plantoComplete == '3 year' ? 'selected':'' }}> 3 years</option>
					<option {{$com->plantoComplete == '4 year' ? 'selected':'' }}> 4 years</option>
					<option {{$com->plantoComplete == 'more than 5 years' ? 'selected':''}} >more than 5 years</option>
					 
				</select>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<th colspan="2">
				To sum up please write an essay on how your attaining a degree contributes to your personal development, your community, your workplace, society, and country?
			</th>
			<td>
				<textarea class="form-control" style="color:black;" id="essay" name="essay" rows="3" required="">{{$com->essay}}</textarea>
			</td>
		</tr>
		<!-- --------------------  --------------------  -------------------- -->
		<tr>
			<td colspan="3">
				@if (count($check) < 1)
                <button type="submit" class="btn btn-danger zoom float-right"><i class="far fa-save"></i></button>
                @endif
                <a href="/plans">
                    <button class="btn btn-secondary zoom float-right mr-1"><i class="fas fa-backward"></i></button>    
                </a>
			</td>
		</tr>
	</table>
	@endforeach
</form>
@endsection