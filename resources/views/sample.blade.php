@extends('layout.dashboard')
@section('title', "Sample Page")
@section('content-title')

Sample page

<a href="{{ url('/appForm/Application_Form') }}" class="btn btn-danger" target="\_blank">
	<i class="fas fa-file-pdf"></i> 	
	Application Form
</a>

<a href="{{ url('/appForm/ETEEAP_Additional_Requirement') }}" class="btn btn-danger" target="\_blank">
	<i class="fas fa-file-pdf"></i> 	
	ETEEAP Additional Requirement
</a>

<a href="{{ url('/appForm/Narrative_Report') }}" class="btn btn-danger" target="\_blank">
	<i class="fas fa-file-pdf"></i> 	
	Narrative Report
</a>

<a href="{{ url('/appForm/Curriculum_Vitae') }}" class="btn btn-danger" target="\_blank">
	<i class="fas fa-file-pdf"></i> 	
	Curriculum Vitae
</a>

<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ alert for session error ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
@if (session('error'))
<div class="alert alert-danger">
	{{ session('error') }}
</div>
@endif


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
@endsection
@section('content')
<div class="progress-container">

  	<ul class="progressbar">
  		<li hidden="" class="active"></li>
        <li>Initial Assessment</li>
        <li>Second Assessment</li>
        <li>Admission</li>
        <li>Third Assessment</li>
        <li>Enrollment</li>
        <li>Completion of Enhancement Program</li>
        <li>Final Assessment</li>
        <li>Process Prior Graduation</li>
        <li>Graduation Rites</li>
        <li>End of Transaction</li>
  	</ul>

</div>
@endsection