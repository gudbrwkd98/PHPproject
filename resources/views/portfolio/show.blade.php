@extends('layout.dashboard')
@section('title', "Personal Portfolio")
@section('content-title')
  <a href="{{ route('staff.applicants.show', $profile2->id)}}">
        {{$profile2->firstName.' '.$profile2->middleName.' '.$profile2->lastName.'`s '}} 
    </a>
    {{'Profile'}}

@endsection
@section('content')


	<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
	<!-- ~~~~~~~~~~~~~~~~~~~~ alert for changes ~~~~~~~~~~~~~~~~~~~~ -->
	<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
	@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif
	
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
	<div class="col-sm-8">
		<table class="table table-borderless text-dark">
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Application Letter
				</th>
				<td>
					@if($uploads->application_letter)
					<a href="/uploads/application_letter/{{$uploads->application_letter}}" download="{{$uploads->application_letter}}" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
					@else
					Pending for user Upload...
				@endif
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Application Form
				</th>
				<td>@if($uploads->application_form)
					<a href="/uploads/application_form/{{$uploads->application_form}}" download="{{$uploads->application_form}}" style="text-decoration: none;">

						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
					@else
					Pending for user Upload...
					@endif
				
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Resume
				</th>
				<td>
					@if($uploads->resume)
					<a href="/uploads/resume/{{$uploads->resume}}" download="{{$uploads->resume}}" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
					@else
					Pending for user Upload...
					@endif
				
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Certificate of Employment
				</th>
				<td>
					@if($uploads->cert_of_emp)
					<a href="/uploads/cert_of_emp/{{$uploads->cert_of_emp}}" download="{{$uploads->cert_of_emp}}" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
					@else
					Pending for user Upload...
					@endif
				
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Letter of Recommendation
				</th>
				<td>
					@if($uploads->letter_of_recommendation)
					<a href="/uploads/letter_of_recommendation/{{$uploads->letter_of_recommendation}}" download="{{$uploads->letter_of_recommendation}}" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
					@else
					Pending for user Upload...
					@endif
					
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Passport
				</th>
				<td>
					@if($uploads->nbi)
					<a href="/uploads/nbi/{{$uploads->nbi}}" download="{{$uploads->nbi}}" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
					@else
					Pending for user Upload...
					@endif
					
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					PSA Birth Certificate
				</th>
				<td>
					@if($uploads->psa)
					<a href="/uploads/psa/{{$uploads->psa}}" download="{{$uploads->psa}}" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
					@else
					Pending for user Upload...
					@endif
					
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Transcript of Records
				</th>
				<td>
					@if($uploads->transcript)
				<a href="/uploads/transcript/{{$uploads->transcript}}" download="{{$uploads->transcript}}" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
					@else
					Pending for user Upload...
				
					@endif
				
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					NBI Clearance
				</th>
				<td>
					@if($uploads->nbi)
					<a href="/uploads/nbi/{{$uploads->nbi}}" download="{{$uploads->nbi}}" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
					@else
					Pending for user Upload...
					@endif
						
					</a>
					
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Narrative Report Template
				</th>
				<td>
					@if($uploads->narrative)
				<a href="/uploads/narrative/{{$uploads->narrative}}" download="{{$uploads->narrative}}" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
					@else
					Pending for user Upload...
				@endif
				
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Payment Receipt
				</th>
				<td>
					@if($uploads->receipt)
					<a href="/uploads/receipt/{{$uploads->receipt}}" download="{{$uploads->receipt}}" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
					@else
					Pending for user Upload...
					@endif
				
			
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Additional Requirements
				</th>
				<td>
					@if($uploads->others)
					<a href="/uploads/others/{{$uploads->others}}" download="{{$uploads->others}}" style="text-decoration: none;">
						<input type="button" class="btn btn-danger" name="" id="" value="View">
					</a>
					@else
					Pending for user Upload...
					@endif
				
			
				</td>
			</tr>
		</table>
	</div>




	@endsection