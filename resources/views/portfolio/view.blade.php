@extends('layout.dashboard')
@section('title', "Personal Portfolio")
@section('content-title')
    Personal Portfolio


    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ upload portfolio btn ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#uploadModal">
		Upload Requirements
	</button>
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
    <!-- ~~~~~~~~~~~~~~~~~~~~  content of page  ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->

  

	<div class="col-sm-8">
		<table class="table table-borderless text-dark">
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
			<tr>
				<th>
					Application Letter
				</th>
				<td>
					@if(Auth::user()->uploads->application_letter)
					<a href="/uploads/application_letter/{{Auth::user()->uploads->application_letter}}" download="{{Auth::user()->uploads->application_letter}}" style="text-decoration: none;">
						<input type="button" class="btn btn-secondary" name="" id="" value="View">
					</a>
					@endif
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Application Form
				</th>
				<td>
					@if(Auth::user()->uploads->application_form)
					<a href="/uploads/application_form/{{Auth::user()->uploads->application_form}}" download="{{Auth::user()->uploads->application_form}}" style="text-decoration: none;">
						<input type="button" class="btn btn-secondary" name="" id="" value="View">
					</a>
					@endif	
					<a href="{{asset('files/ETEEAP_Application_Form.docx')}}" target="/_blank">
						<input type="button" class="btn btn-primary" name="" id="" value="Download Template">
					</a>
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Resume
				</th>
				<td>
					@if(Auth::user()->uploads->resume)
					<a href="/uploads/resume/{{Auth::user()->uploads->resume}}" download="{{Auth::user()->uploads->resume}}" style="text-decoration: none;">
						<input type="button" class="btn btn-secondary" name="" id="" value="View">
					</a>
					@endif
					<a href="{{asset('files/ETEEAP_CV.docx')}}" target="/_blank">
						<input type="button" class="btn btn-primary" name="" id="" value="Download Template">
					</a>
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Certificate of Employment
				</th>
				<td>
					@if(Auth::user()->uploads->cert_of_emp)
					<a href="/uploads/cert_of_emp/{{Auth::user()->uploads->cert_of_emp}}" download="{{Auth::user()->uploads->cert_of_emp}}" style="text-decoration: none;">
						<input type="button" class="btn btn-secondary" name="" id="" value="View">
					</a>
					@endif
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Letter of Recommendation
				</th>
				<td>
					@if(Auth::user()->uploads->letter_of_recommendation)
					<a href="/uploads/letter_of_recommendation/{{Auth::user()->uploads->letter_of_recommendation}}" download="{{Auth::user()->uploads->letter_of_recommendation}}" style="text-decoration: none;">
						<input type="button" class="btn btn-secondary" name="" id="" value="View">
					</a>
					@endif
					
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Passport
				</th>
				<td>
					@if(Auth::user()->uploads->nbi)
					<a href="/uploads/nbi/{{Auth::user()->uploads->nbi}}" download="{{Auth::user()->uploads->nbi}}" style="text-decoration: none;">
						<input type="button" class="btn btn-secondary" name="" id="" value="View">
					</a>
					@endif
					
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					PSA Birth Certificate
				</th>
				<td>
					@if(Auth::user()->uploads->psa)
						<a href="/uploads/psa/{{Auth::user()->uploads->psa}}" download="{{Auth::user()->uploads->psa}}" style="text-decoration: none;">
							<input type="button" class="btn btn-secondary" name="" id="" value="View">
						</a>
					@endif
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Transcript of Records
				</th>
				<td>
					@if(Auth::user()->uploads->transcript)
						<a href="/uploads/transcript/{{Auth::user()->uploads->transcript}}" download="{{Auth::user()->uploads->transcript}}" style="text-decoration: none;">
							<input type="button" class="btn btn-secondary" name="" id="" value="View">
						</a>
					@endif
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					NBI Clearance
				</th>
				<td>
					@if(Auth::user()->uploads->nbi)
					<a href="/uploads/nbi/{{Auth::user()->uploads->nbi}}" download="{{Auth::user()->uploads->nbi}}" style="text-decoration: none;">
						<input type="button" class="btn btn-secondary" name="" id="" value="View">
					</a>
					@endif
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Narrative Report Template
				</th>
				<td>
					@if(Auth::user()->uploads->narrative)
				<a href="/uploads/narrative/{{Auth::user()->uploads->narrative}}" download="{{Auth::user()->uploads->narrative}}" style="text-decoration: none;">
						<input type="button" class="btn btn-secondary" name="" id="" value="View">
					</a>
					@endif
				
					
					<a href="{{asset('files/ETEEAP_Narrative_Report.docx')}}" target="/_blank">
						<input type="button" class="btn btn-primary" name="" id="" value="Download Template">
					</a>
				</td>
			</tr>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Payment Receipt
				</th>
				<td>
					@if(Auth::user()->uploads->receipt)
					<a href="/uploads/receipt/{{Auth::user()->uploads->receipt}}" download="{{Auth::user()->uploads->receipt}}" style="text-decoration: none;">
						<input type="button" class="btn btn-secondary" name="" id="" value="View">
					</a>
					@endif
					
				</td>
			</tr>
	
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<tr>
				<th>
					Additional Requirements
				</th>
				<td>
					@if(Auth::user()->uploads->others)
					<a href="/uploads/others/{{Auth::user()->uploads->others}}" download="{{Auth::user()->uploads->others}}" style="text-decoration: none;">
						<input type="button" class="btn btn-secondary" name="" id="" value="View">
					</a>
					@endif
					<a href="{{asset('files/ETEEAP_Additional_Requirement.docx')}}" target="/_blank">
						<input type="button" class="btn btn-primary" name="" id="" value="Download Template">
					</a>
				</td>
			</tr>
		</table>
	</div>

    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~    upload modal   ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
	<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content" style="font-size: medium;">
				<form method="POST"  action="{{ route('user.port.store',$user=Auth::user()->id) }}" enctype="multipart/form-data">
					<div class="modal-header">


						  @foreach ($not as $c)
									<input type="text" id="not" name="not" value="{{$c->notify}}" hidden>
									
									@endforeach

									
						<h5 class="modal-title" id="uploadModallabel" style="color: black;">
							Upload Portfolio
						</h5>
						

						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body ">
	                    <medium class="form-text"><i>**Please input file with extn type .pdf, .doc etc.</i></medium>
				        @CSRF
						{{method_field('POST')}}	
				        @method('POST')
						<table class="table table-borderless text-dark" style="font-size: medium;">
    						<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
							<tr>
								<input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
								<input type="text" name="user_email" value="{{Auth::user()->email}}" hidden>
						    	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						       	<th width="30%">{{__('Application Letter')}}</th>
				                <td>
				                    <input type="file" id="application_letter" name="application_letter">
				                    <a>{{Auth::user()->uploads->application_letter}}</a>
				                    <div>{{$errors->first('image')}}</div>
				                </td>
				            </tr>
    						<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    						<tr>
				                <th>{{__('Application Form')}}</th>
				                <td>
				                    <input type="file" id="application_form" name="application_form">
				                    <a>{{Auth::user()->uploads->application_form}}</a>
				                    <div>{{$errors->first('image')}}</div>
				                </td>
				            </tr>
    						<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
				            <tr>
				                <th>{{__('Resume')}}</th>
				                <td>
				                    <input type="file" id="resume" name="resume">
				                    <a>{{Auth::user()->uploads->resume}}</a>
				                    <div>{{$errors->first('image')}}</div>
				                </td>
				            </tr>
    						<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    						<tr>
				                <th>{{__('Certificate of Employement')}}</th>
				                <td>
				                    <input type="file" id="cert_of_emp" name="cert_of_emp">
				                    <a>{{Auth::user()->uploads->cert_of_emp}}</a>
				                    <div>{{$errors->first('image')}}</div>
				                </td>
				            </tr>
    						<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
				            <tr>
				                <th>{{__('Letter of Recommendation')}}</th>
				                <td>
				                    <input type="file" id="letter_of_recommendation" name="letter_of_recommendation">
				                    <a>{{Auth::user()->uploads->letter_of_recommendation}}</a>
				                    <div>{{$errors->first('image')}}</div>
				                </td>
				            </tr>
    						<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
				            <tr>
				                <th>{{__('Passport')}}</th>
				                <td>
				                    <input type="file" id="passport" name="passport">
				                    <a>{{Auth::user()->uploads->passport}}</a>
				                    <div>{{$errors->first('image')}}</div>
				                </td>
				            </tr>
    						<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
				              <tr>
				                <th>{{__('PSA Birth Certificate')}}</th>
				                <td>
				                    <input type="file" id="psa" name="psa">
				                    <a>{{Auth::user()->uploads->psa}}</a>
				                    <div>{{$errors->first('image')}}</div>
				                </td>
				            </tr>
    						<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
				            <tr>
				                <th>{{__('Transcript of Records')}}</th>
				                <td>
				                    <input type="file" id="transcript" name="transcript">
				                    <a>{{Auth::user()->uploads->transcript}}</a>
				                    <div>{{$errors->first('image')}}</div>
				                </td>
				            </tr>
    						<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
				            <tr>
				                <th>{{__('NBI Clearance')}}</th>
				                <td>
				                    <input type="file" id="nbi" name="nbi">
				                    <a>{{Auth::user()->uploads->nbi}}</a>
				                    <div>{{$errors->first('image')}}</div>
				                </td>
				            </tr>
    						<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
				             <tr>
				                <th>{{__('Narrative Report')}}</th>
				                <td>
				                    <input type="file" id="narrative" name="narrative">
				                    <a>{{Auth::user()->uploads->narrative}}</a>
				                    <div>{{$errors->first('image')}}</div>
				                </td>
				            </tr>
				            <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
				             <tr>
				                <th>{{__('Payment Receipt')}}</th>
				                <td>
				                    <input type="file" id="receipt" name="receipt">
				                    <a>{{Auth::user()->uploads->receipt}}</a>
				                    <div>{{$errors->first('image')}}</div>
				                </td>
				            </tr>
    						<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
				            <tr>
				                <th>{{__('Other Requirements')}}</th>
				                <td>
				                    <input type="file" id="others" name="others">
				                    <a>{{Auth::user()->uploads->others}}</a>
				                    <div>{{$errors->first('image')}}</div>
				                </td>
				            </tr>
		                    <input type="text" id="userID" name="userID" value="" style="display: none;">
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save Changes') }}
                        </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@endsection