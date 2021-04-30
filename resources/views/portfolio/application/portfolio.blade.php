
@extends('layout.dashboard')
@section('title', "User Application")
@section('content-title')

    <div class="alert alert-success" style="font-size: medium;">
        Please print reports for ETEEAP Addt'l Requirements, Narrative Reports and Curriculum Vitae on formatted paper with proper UB header if necessary
    </div>

<a href="">
    {{$profile->firstName.' '.$profile->middleName.' '.$profile->lastName}}'s
</a>
{{'Portfolio'}}

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


<!-- --------------------  forward application  -------------------- -->
@if ($progressID <=1 )
    @hasRole('eteeap')
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#forwardAppModal">
            Forward Application
        </button>
    @elsehasRole('admin')
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#forwardAppModal">
            Forward Application
        </button>
    @endhasRole
@endif

<!-- --------------------  update progress  -------------------- -->
@if ($progressID >1 AND $progressID < 10)
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#progressModal">
        Update Progress
    </button>
@endif

<!-- --------------------  Update progress modal  -------------------- -->
<div class="modal fade" id="progressModal" tabindex="-1" role="dialog" aria-labelledby="progressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST"  action="{{ route('staff.updateApplication',$user = auth()->id()) }}" enctype="multipart/form-data">
                @CSRF
                {{method_field('POST')}}    
                @method('POST')
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="progressModalLabel">Change Progress of Application</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless" style="font-size: medium;">
                        <!-- --------------------  --------------------  -------------------- -->
                        @foreach($application as $app)
                                <input type="text" name="office" value="{{Auth::user()->roles->first()->name}}" hidden>
                                <input type="text" name="appid" value="{{$app->appid}}" hidden>
                                <input type="text" name="appuserid" value="{{$app->appuserid}}" hidden>
                                <input type="text" name="emailfname" value="{{$profile->firstName}}" hidden>
                                <input type="text" name="emailmname" value="{{$profile->middleName}}" hidden>
                                <input type="text" name="emaillname" value="{{$profile->lastName}}" hidden>
                                <input type="text" name="datesubmitted" value="{{$app->datesubmitted}}" hidden>
                                <input type="text" name="office" value="{{$app->office}}" hidden>
                           
                            <tr>
                                <th width="5%">Stage</th>
                                <td width="45%"> 
                                    <input class="form-control" id="stage" name="stage" required="" style="color: black"  value="{{$app->stage}}" readonly>
                                </td>
                                <th width="5%">Status</th>
                                <td width="45%">
                                    @hasRole('eteeap')
                                      <select class="form-control" id="status" name="status" required="" style="color: black">
                                             @if ($progressID > 2)   
                                               <option selected="" value="Passed" >Passed</option>
                                               @endif
                                             @if ($progressID <= 2)
                                            <option selected="" value="" disabled="">--- Please select a status ---</option>
                                            <option  {{$app->app_status == 'Passed' ? 'selected':''}} >Passed</option>
                                            <option  {{$app->app_status == 'Failed' ? 'selected':''}} >Failed</option>
                                            @endif
                                        </select>
                                    @elsehasRole('admin')
                                       <select class="form-control" id="status" name="status" required="" style="color: black">
                                             @if ($progressID > 2)   
                                               <option selected="" value="Passed" >Passed</option>
                                               @endif
                                             @if ($progressID <= 2)
                                            <option selected="" value="" disabled="">--- Please select a status ---</option>
                                            <option  {{$app->app_status == 'Passed' ? 'selected':''}} >Passed</option>
                                            <option  {{$app->app_status == 'Failed' ? 'selected':''}} >Failed</option>
                                            @endif
                                        </select>
                                    @else
                                        <select class="form-control" id="status" name="status" required="" style="color: black">
                                              @if ($progressID > 2)
                                               <option selected="" value="Passed" readonly >Passed</option>
                                               @endif
                                             @if ($progressID <= 2)
                                            <option selected="" value="" disabled="">--- Please select a status ---</option>
                                            <option  {{$app->app_status == 'Passed' ? 'selected':''}} >Passed</option>
                                            <option  {{$app->app_status == 'Failed' ? 'selected':''}} >Failed</option>
                                            @endif
                                        </select>
                                    @endhasRole
                                </td>
                            </tr>
                        @endforeach

                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>Course</th>
                            <td colspan="3">
                                @foreach($application as $app)
                                    <input class="form-control" id="courseCode" name="courseCode" required="" style="color: black"  value="{{$app->courseCode}}" readonly>
                                @endforeach
                            </td>
                        </tr>

                        @foreach($useremail as $mail)
                        <input type="text" name="useremail" value="{{$mail->email}}" hidden>
                        @endforeach
                        
                    </table>
                </div>
                <div class="modal-footer">
                    <table width="100%">
                        <tr>
                            <td width="20%">
                                @hasRole('eteeap')
                                    <button type="submit" class="btn btn-danger zoom" name="updateButton" value="minus">
                                        <i class="fas fa-backward"></i>
                                        Return
                                    </button>
                                @elsehasRole('admin')
                                    <button type="submit" class="btn btn-danger zoom" name="updateButton" value="minus">
                                        <i class="fas fa-backward"></i>
                                        Return
                                    </button>
                                @endhasRole
                            </td>
                            <td width="65%"></td>
                            <td width="15%">
                                <button type="submit" class="btn btn-danger zoom" name="updateButton" value="plus">
                                    Proceed
                                    <i class="fas fa-forward"></i>
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- --------------------  forward application modal  -------------------- -->
<div class="modal fade" id="forwardAppModal" tabindex="-1" role="dialog" aria-labelledby="forwardAppModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST"  action="{{ route('staff.forwardApplication',$user = auth()->id()) }}" enctype="multipart/form-data">
                @CSRF
                {{method_field('POST')}}    
                @method('POST')
                <div class="modal-header">
                    <h5 class="modal-title" id="forwardAppModalLabel">Forward Application</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="font-size: medium">
                    <table class="table table-borderless" style="font-size: medium;">
                        @foreach($application as $app)
                        <input type="text" name="status2" value="{{$app->app_status}}   " hidden >
                        <input type="text" name="stage2" value="{{$app->stage}}" hidden>
                        <input type="text" name="user_id2" value="{{$app->appuserid}}" hidden>
                        <input type="text" name="appuserid" value="{{$app->appuserid}}" hidden>
                        <input type="text" name="datesubmitted" value="{{$app->datesubmitted}}" hidden>
                        <input class="form-control" id="courseCode2" name="courseCode2" required="" style="color: black"  value="{{$app->courseCode}}" hidden>
                        @endforeach
                        <input type="text" name="emailfname" value="{{$profile->firstName}}" hidden>
                        <input type="text" name="emailmname" value="{{$profile->middleName}}" hidden>
                        <input type="text" name="emaillname" value="{{$profile->lastName}}" hidden>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Forward to:
                           

                            </th>
                            <td>
                                <select id="office2" name="office2" required class="form-control" style="color: black;">
                                   
                                    <option selected="" value="{{$location}}" >{{$location}}</option>
                              
                                 
                                </select>
                            </td>
                        </tr>
                        @foreach($useremail as $mail)
                            <input type="text" name="useremail" value="{{$mail->email}}" hidden>
                        @endforeach
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-share-square"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('content')

<!-- --------------------  User Profile  -------------------- -->
<div class="row pb-4" >
    <div class="col-sm-2">
        @if($profile->photo)
        <a href="{{ asset('uploads/profilepicture/'.$profile->photo)}}" target="_blank">
            <img src="{{ asset('uploads/profilepicture/'.$profile->photo)}}" class="img-thumbnail rounded-circle" alt="Image" style="height: 13rem;width:13rem" >
        </a>
        @else
        <a href="{{asset('uploads/profilepicture/default.jpg')}}" target="_blank">
            <img src="{{ asset('uploads/profilepicture/default.jpg')}}" class="img-thumbnail rounded-circle" alt="Image">
        </a>
        @endif
    </div>
    <div class="col-sm-9">
        <table class="table table-borderless col-10">
            <!-- --------------------  --------------------  -------------------- -->
            <tr>
                <th width="15%">Name</th>
                <td >
                    {{$profile->firstName.' '.$profile->middleName.' '.$profile->lastName}}
                </td>
                <th>Gender</th>
                <td>
                    {{$profile->gender }}
                </td>
            </tr>
            <!-- --------------------  --------------------  -------------------- -->
            <tr>
                <th>Address</th>
                <td>
                    {{$profile->address }}
                </td>
                <th>Phone Number</th>
                <td>
                    {{$profile->phone }}
                </td>
            </tr>
            <!-- --------------------  --------------------  -------------------- -->
            <tr>
                <th>Birth Date</th>
                <td>
                    {{\Carbon\Carbon::parse($profile->bday)->format('M d ,Y')}}
                </td>
                <th>Birth Place</th>
                <td>
                    {{$profile->birth_place }}
                </td>
            </tr>
            <!-- --------------------  --------------------  -------------------- -->
            <tr>
                <th>Civil Status</th>
                <td>
                    {{$profile->civil_status }}
                </td>
                <th>Language</th>
                <td>
                    {{$profile->language }}
                </td>
            </tr>
        </table>
    </div>
</div>

<!-- --------------------  report_gen_buttons  -------------------- -->
<div>
    <!--  <input type="text" name="appuserid" value="{{$app->appuserid}}" hidden> -->
    <a href="{{ route('admin.appForm.exportpdf',$user2 = $app->appuserid) }}" class="btn btn-danger" target="_blank">
        
        <i class="fas fa-file-pdf"></i>     
        Application Form
    </a>

    <a href="{{ route('admin.additionalForm.exportpdf',$user2 = $app->appuserid) }}" class="btn btn-danger" target="_blank">
        <i class="fas fa-file-pdf"></i>     
        ETEEAP Additional Requirement
    </a>

    <a href="{{ route('admin.narrative.exportpdf',$user2 = $app->appuserid) }}" class="btn btn-danger" target="_blank">
        <i class="fas fa-file-pdf"></i>     
        Narrative Report
    </a>

    <a href="{{ route('admin.curriculumV.exportpdf',$user2 = $app->appuserid) }}" class="btn btn-danger" target="_blank">
        <i class="fas fa-file-pdf"></i>     
        Curriculum Vitae
    </a>
</div>

<!-- --------------------  bootstrap tables  -------------------- -->
    <div class="card shadow mt-3 mb-4 p-3">

        <!-- --------------------  progress step bar  -------------------- -->
            <div class="row">    
                <div class="progress-container">
                    <ul class="progressbar">
                        <li hidden="" class="active"></li>
                        <li <?php if($progressID>=2) {echo "class='active'";}?> >Initial Assessment</li>
                        <li <?php if($progressID>=3) {echo "class='active'";}?> >Second Assessment</li>
                        <li <?php if($progressID>=4) {echo "class='active'";}?> >Admission</li>
                        <li <?php if($progressID>=5) {echo "class='active'";}?> >Third Assessment</li>
                        <li <?php if($progressID>=6) {echo "class='active'";}?> >Enrollment</li>
                        <li <?php if($progressID>=7) {echo "class='active'";}?> >Completion of Enhancement Program</li>
                        <li <?php if($progressID>=8) {echo "class='active'";}?> >Final Assessment</li>
                        <li <?php if($progressID>=9) {echo "class='active'";}?> >Process Prior Graduation</li>
                        <li <?php if($progressID>=10) {echo "class='active'";}?> >Graduation Rites</li>
                        <li <?php if($progressID>=11) {echo "class='active'";}?> >End of Transaction</li>
                    </ul>
                </div>
            </div>

        <!-- -------------------------  top_nav_links  ------------------------- -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <!-- -------------------------  -------------  ------------------------- -->
                <li class="nav-item">
                    <a class="nav-link active p-2" id="pill-application" data-toggle="pill" href="#tab-application" role="tab" aria-controls="tab-application" aria-selected="false">
                        Application
                    </a>
                </li>
                <!-- -------------------------  -------------  ------------------------- -->
                <li class="nav-item">
                    <a class="nav-link p-2" id="pill-plans" data-toggle="pill" href="#tab-plans" role="tab" aria-controls="tab-plans" aria-selected="true">
                        ETEEAP Plans
                    </a>
                </li>
                <!-- -------------------------  -------------  ------------------------- -->
                <li class="nav-item">
                    <a class="nav-link p-2" id="pill-education" data-toggle="pill" href="#tab-education" role="tab" aria-controls="tab-education" aria-selected="false">
                        Education
                    </a>
                </li>
                <!-- -------------------------  -------------  ------------------------- -->
                <li class="nav-item">
                    <a class="nav-link p-2" id="pill-workexp" data-toggle="pill" href="#tab-workexp" role="tab" aria-controls="tab-workexp" aria-selected="false">
                        Work Exp
                    </a>
                </li>
                <!-- -------------------------  -------------  ------------------------- -->
                <li class="nav-item">
                    <a class="nav-link p-2" id="pill-awards" data-toggle="pill" href="#tab-awards" role="tab" aria-controls="tab-awards" aria-selected="false">
                        Awards
                    </a>
                </li>
                <!-- -------------------------  -------------  ------------------------- -->
                <li class="nav-item">
                    <a class="nav-link p-2" id="pill-creative" data-toggle="pill" href="#tab-creative" role="tab" aria-controls="tab-creative" aria-selected="false">
                        Creative Works
                    </a>
                </li>
                <!-- -------------------------  -------------  ------------------------- -->
                <li class="nav-item">
                    <a class="nav-link p-2" id="pill-lifelong" data-toggle="pill" href="#tab-lifelong" role="tab" aria-controls="tab-lifelong" aria-selected="false">
                        Lifelong Learning
                    </a>
                </li>
                <!-- -------------------------  -------------  ------------------------- -->
                <li class="nav-item">
                    <a class="nav-link p-2" id="pill-organization" data-toggle="pill" href="#tab-organization" role="tab" aria-controls="tab-organization" aria-selected="false">
                        Organization
                    </a>
                </li>
                <!-- -------------------------  -------------  ------------------------- -->
                <li class="nav-item">
                    <a class="nav-link p-2" id="pill-engagements" data-toggle="pill" href="#tab-engagements" role="tab" aria-controls="tab-engagements" aria-selected="false">
                        Engagements
                    </a>
                </li>
                <!-- -------------------------  -------------  ------------------------- -->
                <li class="nav-item">
                    <a class="nav-link p-2" id="pill-community" data-toggle="pill" href="#tab-community" role="tab" aria-controls="tab-community" aria-selected="false">
                        Community
                    </a>
                </li>
                <!-- -------------------------  -------------  ------------------------- -->
                <li class="nav-item">
                    <a class="nav-link p-2" id="pill-additional" data-toggle="pill" href="#tab-additional" role="tab" aria-controls="tab-additional" aria-selected="false">
                        Additional Documents
                    </a>
                </li>
            </ul>

        <!-- -------------------------  contents  ------------------------- -->
            <div class="tab-content" id="pills-tabContent">
                <!-- -------------------------  application  ------------------------- -->
                <div class="tab-pane fade show active" id="tab-application" role="tabpanel" aria-labelledby="tab-application">
                    <div class="row">
                        <!-- -------------------------  left_nav_links  ------------------------- -->
                            <div class="col-2">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-app-tab" data-toggle="pill" href="#v-pills-app" role="tab" aria-controls="v-pills-app" aria-selected="true">
                                        Application
                                    </a>
                                    <a class="nav-link" id="v-pills-remarks-tab" data-toggle="pill" href="#v-pills-remarks" role="tab" aria-controls="v-pills-remarks" aria-selected="false">
                                        Remarks
                                    </a>
                                    <a class="nav-link" id="v-pills-apphistory-tab" data-toggle="pill" href="#v-pills-apphistory" role="tab" aria-controls="v-pills-apphistory" aria-selected="false">
                                        Application History
                                    </a>
                                </div>
                            </div>

                        <!-- -------------------------  content  ------------------------- -->
                        <div class="col-10">
                            <div class="tab-content" id="v-pills-tabContent">
                                <!-- -------------------------  application table  ------------------------- -->
                                <div class="tab-pane fade show active" id="v-pills-app" role="tabpanel" aria-labelledby="v-pills-app-tab">  
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-danger">
                                                Application

                                            </h3>
                                            <p style="text-indent: 50px;" class="mb-0">

                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="display table table-bordered" width="100%" cellspacing="0" id="dataTable4">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Office</th>
                                                            <th scope="col">Course</th>
                                                            <th scope="col">Stage</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Date Submitted</th>

                                                            <th scope="col">Last Update</th>
                                                            <th scope="col">Remarks</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($application as $app)
                                                        <tr>

                                                            <td>{{$app->office}}</td>
                                                            <td>{{$app->courseCode}}</td>
                                                            <td>{{$app->stage}}</td>
                                                            <td>{{$app->app_status}}</td>
                                                            <td>{{\Carbon\Carbon::parse($app->datesubmitted)->format('M. d, Y  h:i A')}}</td>

                                                            <td>{{\Carbon\Carbon::parse($app->created_at)->format('M. d, Y  h:i A')}}</td>
                                                            <td><button class="btn btn-danger zoom" data-id="{{$app->appid}}" id="addRemarks"> <i class="fas fa-plus"></i></button></td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- -------------------------  remarks table  ------------------------- -->
                                <div class="tab-pane fade" id="v-pills-remarks" role="tabpanel" aria-labelledby="v-pills-remarks-tab">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-danger">
                                                Remarks
                                            </h3>
                                            <p style="text-indent: 50px;" class="mb-0">

                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="display table table-bordered" id="remarksTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Office</th>
                                                            <th>Stage</th>
                                                            <th>Status</th>
                                                            <th>Date</th>
                                                            <th>Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- -------------------------  flow example 1  ------------------------- -->
                                                        @foreach($remarks as $rem)
                                                        <tr>
                                                            <td>
                                                                {{$rem->office}}
                                                            </td>
                                                            <td>
                                                                {{$rem->stage}}
                                                            </td>
                                                            <td>
                                                                {{$rem->app_status}}
                                                            </td>
                                                            <td>{{\Carbon\Carbon::parse($rem->created_at)->format('M. d, Y  h:i A')}}</td>
                                                            <td>
                                                                <button class="btn btn-light zoom" data-id="{{$rem->id}}" id="viewRemarks"><i class="fas fa-eye"></i></button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $remarks->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- -------------------------  history table  ------------------------- -->
                                <div class="tab-pane fade" id="v-pills-apphistory" role="tabpanel" aria-labelledby="v-pills-apphistory-tab">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-danger">
                                                Application History
                                            </h3>
                                            <p style="text-indent: 50px;" class="mb-0">

                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="display table table-bordered" id="datatable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Office</th>
                                                            <th scope="col">Course</th>
                                                            <th scope="col">Stage</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Last Update</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($applicationhistory as $app)
                                                        <tr>
                                                            <td>{{$app->office}}</td>
                                                            <td>{{$app->courseCode}}</td>
                                                            <td>{{$app->stage}}</td>
                                                            <td>{{$app->app_status}}</td>
                                                            <td>{{\Carbon\Carbon::parse($app->created_at)->format('M. d, Y  h:i A')}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $applicationhistory->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- -------------------------  add remarks modal  ------------------------- -->
                    <div class="modal fade" id="addRemarksModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="POST"  action="{{ route('staff.addRemarks',$user = auth()->id()) }}" enctype="multipart/form-data">
                                    @CSRF
                                    {{method_field('POST')}}    
                                    @method('POST')
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title text-white" id="addModalLabel">
                                            Remarks Details
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="text-white">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-borderless" style="font-size: medium;">
                                            @foreach($application as $app)   
                                                <input type="text" name="appuserid" value="{{$app->appuserid}}" hidden>
                                            @endforeach
                                            <input type="text" name="appidremarks1" id="appidremarks1" hidden>
                                            <input type="text" name="office" value="{{Auth::user()->roles->first()->name}}" hidden>
                                            <input type="text" name="emailfname" value="{{$profile->firstName}}" hidden>
                                            <input type="text" name="emailmname" value="{{$profile->middleName}}" hidden>
                                            <input type="text" name="emaillname" value="{{$profile->lastName}}" hidden>
                                         @foreach($useremail as $mail)
                                <input type="text" name="useremail" value="{{$mail->email}}" hidden>
                                @endforeach
                                           <!-- -------------------------  -------------------------  ------------------------- -->
                                            <tr>
                                                <th width="30%">
                                                    Remarks<i style="color: red;">*</i>
                                                </th>
                                                <td width="70%">
                                                    <textarea style="color: black" type="text" class="form-control" id="remarks" name="remarks" required=""></textarea> 
                                                </td>
                                            </tr>
                                            <!-- -------------------------  -------------------------  ------------------------- -->
                                            <tr>
                                                <th>
                                                    Attachment
                                                </th>
                                                <td>
                                                    <input type="file" id="attachment" name="attachment">
                                                </td>
                                            </tr>
                                        </table>        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger zoom"><i class="far fa-save"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- -------------------------  view remarks modal  ------------------------- -->
                    <div class="modal fade" id="viewRemarksModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title text-white" id="viewModalLabel">
                                        Remarks Details
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-white">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- -------------------------  Table  ------------------------- -->
                                    <table class="table table-borderless" style="font-size: medium;">
                                        <input type="text" name="user_id3" value="{{Auth::user()->id}}" hidden>
                                        <input type="text" name="id6" id="id6" required hidden>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th width="15%">
                                                Remarks: 
                                            </th>
                                            <td>
                                                <label id="remarks3" name="remarks3" class="text-danger"></label>
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th>
                                                Attachment: 
                                            </th>
                                            <td>
                                                <a target="_blank" style="text-decoration: none;" id="remarksfile" name="remarksfile"><label name="remarksfilename" id="remarksfilename"></label></a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- -------------------------  ETEEAP Educational Plans  ------------------------- -->
                <div class="tab-pane fade" id="tab-plans" role="tabpanel" aria-labelledby="tab-plans">  
                    <table class="table table-border">
                        <tr>
                            <th colspan="3" style="text-align: center;" class="mb-0">
                                <h4>  
                                    <strong>
                                        ETEEAP EDUCATIONAL PLANS
                                    </strong>  
                                </h4>
                            </th>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        @foreach($plans as $plan)
                            <tr>
                                <th colspan="2">
                                    <img src="{{asset('img/core-values.png')}}" style="height: 10rem;">
                                    <br>
                                    In 300 words – explain how you were able to apply the Core Values of the University of Baguio to your current work.
                                </th>
                                <td style="border: 2px solid black;">
                                    {{$plan->coreValues}} 
                                </td>
                            </tr>
                            <!-- --------------------  --------------------  -------------------- -->
                            <tr>
                                <th rowspan="3" class="p-5">
                                    Degree Program applied for:
                                </th>
                                <th style="text-align: right;">
                                    1st Priority
                                </th>
                                <td style="border: 2px solid black;">
                                    {{$plan->priority1}} 
                                </td>
                            </tr>
                            <!-- --------------------  --------------------  -------------------- -->
                            <tr>
                                <th style="text-align: right;">
                                    2nd Priority
                                </th>
                                <td style="border: 2px solid black;">
                                    {{$plan->priority2}} 
                                </td>
                            </tr>
                            <!-- --------------------  --------------------  -------------------- -->
                            <tr>
                                <th style="text-align: right;">
                                    3rd Priority
                                </th>
                                <td style="border: 2px solid black;">
                                    {{$plan->priority3}} 
                                </td>
                            </tr>
                            <!-- --------------------  --------------------  -------------------- -->
                            <tr>
                                <th colspan="2" width="30%">
                                    Statment of goals, objectives or purposes for applying for the degree
                                </th>
                                <td style="border: 2px solid black;">
                                    {{$plan->sgop}} 
                                </td>
                            </tr>
                            <!-- --------------------  --------------------  -------------------- -->
                            <tr>
                                <th colspan="2">
                                    Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program. Be specific.
                                </th>
                                <td style="border: 2px solid black;">
                                    {{$plan->timePlan}} 
                                </td>
                            </tr>
                            <!-- --------------------  --------------------  -------------------- -->
                            <tr>
                                <th colspan="2">
                                    For overseas applicants, describe how you plan to obtain accreditation / equivalency (e.g. when you plan to come to the Philippines) 
                                </th>
                                <td style="border: 2px solid black;">
                                    {{$plan->accreditationPlan}} 
                                </td>
                            </tr>
                            <!-- --------------------  --------------------  -------------------- -->
                            <tr>
                                <th colspan="2">
                                    How soon do you need to complete accreditation / equivalency?
                                </th>
                                <td style="border: 2px solid black;">
                                    {{$plan->plantoComplete}} 
                                </td>
                            </tr>
                            <!-- --------------------  --------------------  -------------------- -->
                            <tr>
                                <th colspan="2">
                                    To sum up please write an essay on how your attaining a degree contributes to your personal development, your community, your workplace, society, and country?
                                </th>
                                <td style="border: 2px solid black;">
                                    {{$plan->essay}} 
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <!-- -------------------------  Education  ------------------------- -->
                <div class="tab-pane fade" id="tab-education" role="tabpanel" aria-labelledby="tab-education">
                    <div class="row">
                        <!-- --------------------  --------------------  -------------------- -->
                        <div class="col-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-formal-tab" data-toggle="pill" href="#v-pills-formal" role="tab" aria-controls="v-pills-formal" aria-selected="true">
                                    Formal Education
                                </a>
                                <a class="nav-link" id="v-pills-nonformal-tab" data-toggle="pill" href="#v-pills-nonformal" role="tab" aria-controls="v-pills-nonformal" aria-selected="false">
                                    Non-Formal Education
                                </a>
                                <a class="nav-link" id="v-pills-certification-tab" data-toggle="pill" href="#v-pills-certification" role="tab" aria-controls="v-pills-certification" aria-selected="false">
                                    Certification Exams
                                </a>
                                <a class="nav-link" id="v-pills-national-tab" data-toggle="pill" href="#v-pills-national" role="tab" aria-controls="v-pills-national" aria-selected="false">
                                    National/License Exams
                                </a>
                            </div>
                        </div>

                        <!-- --------------------  --------------------  -------------------- -->
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <!-- -------------------------  Formal Education Table  ------------------------- -->
                                <div class="tab-pane fade show active" id="v-pills-formal" role="tabpanel" aria-labelledby="v-pills-formal-tab">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-danger">
                                                Formal Education
                                            </h3>
                                            <p style="text-indent: 50px;" class="mb-0">
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered display" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%">School Level</th>
                                                            <th width="20%">School</th>
                                                            <th width="20%">Year Graduated</th>
                                                            <th width="20%">Degree</th>
                                                            <th width="20%">Proof of Completion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        @foreach($formaleduc as $formeduc)
                                                            <tr>
                                                                <td>{{$formeduc -> schoolLvl}}</td>
                                                                <td>
                                                                    {{$formeduc -> schoolName}}<br>
                                                                    {{$formeduc -> schoolAddress}}
                                                                </td>
                                                                <td>
                                                                    {{$formeduc -> yearGraduated}}
                                                                </td>
                                                                <td>
                                                                    {{$formeduc -> degree}}
                                                                </td>
                                                                <td>
                                                                    <a  href="/uploads/transcript/{{$formeduc->transcript}}" target="_blank" style="text-decoration: none;">{{$formeduc->transcript}}</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $formaleduc->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- -------------------------  Non Formal Education   ------------------------- -->
                                <div class="tab-pane fade" id="v-pills-nonformal" role="tabpanel" aria-labelledby="v-pills-nonformal-tab">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-danger">
                                                Non-Formal Education
                                            </h3>
                                            <p style="text-indent:50px;" class="mb-0">
                                                Non-formal education refers to structured and shorten-term training programs conducted for a particular purpose such as skills development, values orientation, and the like.
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered display" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%">Program</th>
                                                            <th width="20%">Certificate</th>
                                                            <th width="20%">Certifying Agent</th>
                                                            <th width="20%">Duration</th>
                                                            <th width="20%">Attachment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- --------------------  --------------------  -------------------- -->
                                                        @foreach($nformaleduc as $nform)
                                                        <tr>
                                                            <td>
                                                                {{$nform -> trainingProgram}}
                                                            </td>
                                                            <td>
                                                                {{$nform -> certificateTitle}}
                                                            </td>
                                                            <td>
                                                                {{$nform -> certifyingAgency}} 
                                                            </td>
                                                            <td>
                                                                {{$nform -> duration}} Months
                                                            </td>
                                                            <td><a  href="/uploads/transcript/{{$nform->file}}" target="_blank" style="text-decoration: none;">{{$nform->file}}</a></td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $nformaleduc->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- -------------------------  Certification Exams  ------------------------- -->
                                <div class="tab-pane fade" id="v-pills-certification" role="tabpanel" aria-labelledby="v-pills-certification-tab">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-danger">
                                                Certification Examinations
                                            </h3>
                                            <p style="text-indent: 50px;" class="mb-0">
                                                In this section, please give detailed information on certification examinations taken for vocational and other skills
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered display" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Certifying Agent</th>
                                                            <th>Expiry Date</th>
                                                            <th>Date Certified</th>
                                                            <th>Rating</th>
                                                            <th>Attachment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        @foreach($certificationexam as $cert)
                                                        <tr>
                                                            <td>
                                                                {{$cert->certificateTitle}}
                                                            </td>
                                                            <td>
                                                                {{$cert->nameofAgency}}<br>
                                                                {{$cert->addressofAgency}}
                                                            </td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($cert->expiryDate)->format('M. d, Y')}}
                                                            </td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($cert->startYear)->format('M. d, Y')}}
                                                            </td>
                                                            <td>
                                                                {{$cert->rating}}
                                                            </td>
                                                            <td><a  href="/uploads/transcript/{{$cert->file}}" target="_blank" style="text-decoration: none;">{{$cert->file}}</a></td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $certificationexam->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- -------------------------  National / Licensure Exams  ------------------------- -->
                                <div class="tab-pane fade" id="v-pills-national" role="tabpanel" aria-labelledby="v-pills-national-tab">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-danger">
                                                National / Licensure Exams Taken and Passed
                                            </h3>
                                            <p style="text-indent: 50px;" class="mb-0">
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="display table table-bordered" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th width="33%">Title</th>
                                                            <th width="33%">Expiry Date</th>
                                                            <th width="33%">Attachment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        @foreach($licensure as $license)
                                                            <tr>
                                                                <td>
                                                                    {{$license->licenseTitle}}
                                                                </td>
                                                                <td>
                                                                    {{\Carbon\Carbon::parse($license->expiryDate)->format('M. d, Y')}}
                                                                </td>
                                                                <td>
                                                                    <a  href="/uploads/transcript/{{$license->file}}" target="_blank" style="text-decoration: none;">{{$license->file}}</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $licensure->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- -------------------------  Work Experience  ------------------------- -->
                <div class="tab-pane fade" id="tab-workexp" role="tabpanel" aria-labelledby="tab-workexp">

                    <!-- -------------------------  Work Experience table  ------------------------- -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-danger">
                                Work Experience
                            </h3>
                            <p style="text-indent: 50px;" class="mb-0">
                                In this section, please input all past and current work experiences with appropriate certificate of employment at current company
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="25%">Position</th>
                                            <th width="25%">Company</th>
                                            <th width="25%">Duration</th>
                                            <th width="25%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        @foreach($workexperience as $work)
                                        <tr>
                                            <td>{{$work->position}}</td>
                                            <td>{{$work->companyName}}<br>{{$work->companyAddress}}</td>
                                            @if($work->duration<12)
                                            <td>{{$work->duration}} Month(s)</td>

                                            @else
                                            <td>{{floor($work->duration/12)}}  @if(floor($work->duration/12>1))Years
                                                @else
                                                Year
                                                @endif
                                                @if(($work->duration%12)>=1)
                                                And
                                                {{floor($work->duration%12)}} @if(floor($work->duration%12 >1))
                                                Months
                                                @else
                                                Month
                                                @endif

                                            @endif</td> 



                                            @endif

                                            <!-- -------------------------  view buttons  ------------------------- -->
                                            <td>  

                                                <button class="btn btn-light zoom" data-id="{{$work->formid}}" id="viewReport"><i class="fas fa-eye"></i></button>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $workexperience->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- -------------------------  awards  ------------------------- -->
                <div class="tab-pane fade" id="tab-awards" role="tabpanel" aria-labelledby="tab-awards">

                    <!-- -------------------------  awards table  ------------------------- -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-danger">
                                Awards
                            </h3>
                            <p style="text-indent: 50px;" class="mb-0">
                                In this section, please describe all the awards you have received from schools, community and civic organizations, as well as citations for work excellence, outstanding accomplishments, community service, etc.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display " width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Award Title</th>
                                            <th>Conferring Organization</th>
                                            <th>Date Received</th>
                                            <th>Attachment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        @foreach($awards as $award)
                                        <tr>
                                            <td>{{$award->type}}</td>
                                            <td>{{$award->awardTitle}}</td>
                                            <td>
                                                {{$award->organizationName}}<br>
                                                {{$award->organizationAddress}}
                                            </td>

                                            <td>{{\Carbon\Carbon::parse($award->dateReceived)->format('M. d, Y')}}</td>

                                            <td><a  href="/uploads/transcript/{{$award->file}}" target="_blank" style="text-decoration: none;">{{$award->file}}</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $awards->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- -------------------------  Creative_works  ------------------------- -->
                <div class="tab-pane fade" id="tab-creative" role="tabpanel" aria-labelledby="tab-creative">

                    <!-- -------------------------  creative works table  ------------------------- -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-danger">
                                Creative Works
                            </h3>
                            <p style="text-indent: 50px;" class="mb-0">
                                In this section, enumerate the various creative works you have accomplished and other special accomplishments. Examples of these are interventions, published and unpublished literary fiction and non-fiction, writings, musical work, products of visual performing arts, exceptional accomplishments in sports, social, cultural and leisure activities, etc. which can lead one to conclude the level of expertise you have obtained on certain fields of interest. Include also participation in competitions and prizes obtained.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="20%">Title</th>
                                            <th width="20%">Description</th>
                                            <th width="20%">Date Accomplished</th>
                                            <th width="20%">Publishing Agency / Sponsoring Institution</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        @foreach($creativeworks as $cworks)
                                        <tr>
                                            <td>
                                                {{$cworks->workTitle}}
                                            </td>
                                            <td>
                                                {{$cworks->workDescription}}
                                            </td>

                                            <td>{{\Carbon\Carbon::parse($cworks->dateAccomplished)->format('M. d, Y')}}</td>

                                            <td>
                                                {{$cworks->agencyName}}<br>
                                                {{$cworks->agencyAddress}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $creativeworks->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- -------------------------  Lifelong_Learnings  ------------------------- -->
                <div class="tab-pane fade" id="tab-lifelong" role="tabpanel" aria-labelledby="tab-lifelong">
                    <div class="row">
                        <div class="col-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <!-- -------------------------  hobbies pill  ------------------------- -->
                                <a class="nav-link active" id="v-pills-hobbies-tab" data-toggle="pill" href="#v-pills-hobbies" role="tab" aria-controls="v-pills-hobbies" aria-selected="true">
                                    Hobbies
                                </a>
                                <!-- -------------------------  special skills pill  ------------------------- -->
                                <a class="nav-link" id="v-pills-special-skills-tab" data-toggle="pill" href="#v-pills-special-skills" role="tab" aria-controls="v-pills-special-skills" aria-selected="false">
                                    Special Skills
                                </a>
                                <!-- -------------------------  work activity pill  ------------------------- -->
                                <a class="nav-link" id="v-pills-work-activity-tab" data-toggle="pill" href="#v-pills-work-activity" role="tab" aria-controls="v-pills-work-activity" aria-selected="false">
                                    Work Activity
                                </a>
                                <!-- -------------------------  volunteer pill  ------------------------- -->
                                <a class="nav-link" id="v-pills-volunteer-tab" data-toggle="pill" href="#v-pills-volunteer" role="tab" aria-controls="v-pills-volunteer" aria-selected="false">
                                    Volunteer
                                </a>
                                <!-- -------------------------  travels pill  ------------------------- -->
                                <a class="nav-link" id="v-pills-travels-tab" data-toggle="pill" href="#v-pills-travels" role="tab" aria-controls="v-pills-travels" aria-selected="false">
                                    Travels
                                </a>
                            </div>
                        </div>

                        <div class="col-10">
                            <div class="tab-content" id="v-pills-tabContent">
                                <!-- -------------------------  hobbies  ------------------------- -->
                                <div class="tab-pane fade show active" id="v-pills-hobbies" role="tabpanel" aria-labelledby="v-pills-hobbies-tab">
                                    <!-- -------------------------  hobbies table  ------------------------- -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-danger">
                                                Hobbies
                                            </h3>
                                            <p style="text-indent: 50px;" class="mb-0">
                                                Leisure activities which involve rating of skills for competition and other purposes (e.g. “belt concept in Tae-kwon-do”) may also indicate your level for ease in evaluation.
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="display table table-bordered" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Hobby</th>
                                                            <th>Rating</th>
                                                            <th>Attachment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        @foreach($hobbies as $hobby)
                                                        <tr>
                                                            <td>{{$hobby->hobbyTitle}}</td>
                                                            <td>{{$hobby->ratingofSkill}}</td>
                                                             <td><a target="_blank" href="/uploads/transcript/{{$hobby->file}}" style="text-decoration: none;">{{$hobby->file}}</a></td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $hobbies->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- -------------------------  hobbies  ------------------------- -->
                                
                                <!-- -------------------------  Special skills  ------------------------- -->
                                <div class="tab-pane fade" id="v-pills-special-skills" role="tabpanel" aria-labelledby="v-pills-special-skills-tab">
                                    <!-- -------------------------  -----------------------  ------------------------- -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-danger">
                                                Special Skills
                                            </h3>
                                            <p style="text-indent: 50px;" class="mb-0">
                                                Note down those special skills which you think must be related to the field of study you want to pursue.
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <table class="display table table-bordered" width="100%" cellspacing="0">
                                                <thead>

                                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                                    <tr>
                                                        <th width="50%">
                                                            Skill Name
                                                        </th>
                                                        <th width="50%">
                                                            Attachment
                                                        </th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                                    @foreach($specialskills as $skill)
                                                    <tr>
                                                        <td>{{$skill->skillName}}</td>
                                                         <td><a target="_blank" href="/uploads/transcript/{{$skill->file}}" style="text-decoration: none;">{{$skill->file}}</a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $specialskills->links() }}
                                        </div>
                                    </div>
                                </div>
                                <!-- -------------------------  Special skills  ------------------------- -->
                                
                                <!-- -------------------------  work_activity  ------------------------- -->
                                <div class="tab-pane fade" id="v-pills-work-activity" role="tabpanel" aria-labelledby="v-pills-work-activity-tab">
                                    <!-- -------------------------  work activity table  ------------------------- -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-danger">
                                                Work Activities
                                            </h3>
                                            <p style="text-indent: 50px;" class="mb-0">
                                                Some work-related activities are occasions for you to learn something new. For example, being assigned to projects beyond your usual job description where you learned new skills and knowledge. Please do not include formal training programs you already cited. However, you may include here experiences which can be classified as on-the-job training or apprenticeship.
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="display table table-bordered" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Activity</th>
                                                            <th>Description</th>
                                                            <th>Attachment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        @foreach($workactivity as $workact)
                                                        <tr>
                                                            <td>{{$workact->activity}}</td>
                                                            <td>{{$workact->description}}</td>
                                                            <td><a target="_blank" href="/uploads/transcript/{{$workact->file}}" style="text-decoration: none;">{{$workact->file}}</a></td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $workactivity->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- -------------------------  work_activity  ------------------------- -->
                                
                                <!-- -------------------------  Volunteer  ------------------------- -->
                                <div class="tab-pane fade" id="v-pills-volunteer" role="tabpanel" aria-labelledby="v-pills-volunteer-tab">
                                    <!-- -------------------------  Volunteer_table  ------------------------- -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-danger">
                                                Volunteer
                                            </h3>
                                            <p style="text-indent: 50px;" class="mb-0">
                                                List only volunteer activities that demonstrate learning opportunities, and are related to the course you are applying for credit. (e.g. counselling programs, sports coaching, project organizing or coordination, organizational leadership, and the like).
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="display table table-bordered" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Title
                                                            </th>
                                                            <th>
                                                                Attachment
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        @foreach($volunteer as $vol)
                                                        <tr>
                                                            <td>
                                                                {{$vol->title}}
                                                            </td>
                                                            <td><a target="_blank" href="/uploads/transcript/{{$vol->file}}" style="text-decoration: none;">{{$vol->file}}</a></td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $volunteer->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- -------------------------  Volunteer  ------------------------- -->
                                
                                <!-- -------------------------  Travels  ------------------------- -->
                                <div class="tab-pane fade" id="v-pills-travels" role="tabpanel" aria-labelledby="v-pills-travels-tab">
                                    <!-- -------------------------  Travels_table  ------------------------- -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-danger">
                                                Travels
                                            </h3>
                                            <p style="text-indent: 50px;" class="mb-0">
                                                Include a write-up of the nature of travel undertaken, whether for leisure, employment, business or other purposes. State in clear terms what new learning experience was obtained from these travels and how it helped you become a better person.
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="display table table-bordered" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Location</th>
                                                            <th>Purpose</th>
                                                            <th>Learning Experience</th>
                                                            <th>Attachment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        @foreach($travel as $trav)
                                                        <tr>
                                                            <td>{{$trav->location}}</td>
                                                            <td>{{$trav->purpose}}</td>
                                                            <td>{{$trav->learningExperience}}</td>
                                                            <td><a target="_blank" href="/uploads/transcript/{{$trav->file}}" style="text-decoration: none;">{{$trav->file}}</a></td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{ $travel->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- -------------------------  Travels  ------------------------- -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- -------------------------  Organization  ------------------------- -->
                <div class="tab-pane fade" id="tab-organization" role="tabpanel" aria-labelledby="tab-organization">
                    <!-- -------------------------  Organization_table  ------------------------- -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-danger">
                                Organization Membership
                            </h3>
                            <p style="text-indent: 50px;" class="mb-0">
                                In this section, please enumerate all memberships in either professional organizations or otherwise
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Organization</th>
                                            <th>Position</th>
                                            <th>Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        @foreach($organization as $org)
                                        <tr>
                                            <td>{{$org->type}}</td>
                                            <td>{{$org->organization}}</td>
                                            <td>{{$org->position}}</td>
                                            <td>{{$org->duration}} Month(s)</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $organization->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- -------------------------  Engagements  ------------------------- -->
                <div class="tab-pane fade" id="tab-engagements" role="tabpanel" aria-labelledby="tab-engagements">
                    <!-- -------------------------  Engagements_table  ------------------------- -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-danger">
                                Engagements
                            </h3>
                            <p style="text-indent: 50px;" class="mb-0">
                                In this section, please enumerate and describe all speaking and professional development engagements
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered" id="engageTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Involvement</th>
                                            <th>Duration</th>
                                            <th>Venue</th>
                                            <th>Organizer</th>
                                            <th>Narrative Report</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        @foreach($engagement as $engage)
                                        <tr>
                                            <td>{{$engage->title}}</td>
                                            <td>{{$engage->involvement}}</td>
                                            <td>{{$engage->duration}} Day(s)</td>
                                            <td>{{$engage->venue}}</td>
                                            <td>{{$engage->organizer}}</td>
                                            <!-- -------------------------  Narrative report buttons  ------------------------- -->
                                            <td>  
                                                <button class="btn btn-light zoom" data-id="{{$engage->formid}}" id="viewReportEng"><i class="fas fa-eye"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $engagement->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- -------------------------  Community_involvement  ------------------------- -->
                <div class="tab-pane fade" id="tab-community" role="tabpanel" aria-labelledby="tab-community">
                    <!-- -------------------------  community table  ------------------------- -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-danger">
                                Community Involvement
                            </h3>
                            <p style="text-indent: 50px;" class="mb-0">
                                In this section, list and describe all forms of community involvement such as outreach programs and the like with respective narrative reports attached
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Duration</th>
                                            <th>Venue</th>
                                            <th>Organizer</th>
                                            <th>Narrative Report</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        @foreach($communityinvolvement as $comm)
                                        <tr>
                                            <td>{{$comm->title}}</td>
                                            <td>{{$comm->duration}} Day(s)</td>
                                            <td>{{$comm->venue}}</td>
                                            <td>{{$comm->organizer}}</td>
                                            <!-- -------------------------  Narrative report buttons  ------------------------- -->
                                            <td>  
                                                <button class="btn btn-light zoom" data-id="{{$comm->formid}}" id="viewReportCom"><i class="fas fa-eye"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $communityinvolvement->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- -------------------------  start_Additional_Documents  ------------------------- -->
                <div class="tab-pane fade" id="tab-additional" role="tabpanel" aria-labelledby="tab-additional">
                    <!-- -------------------------  Additional Documents Table  ------------------------- -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-danger">
                                Additional Documents
                            </h3>
                            <p style="text-indent: 50px;" class="mb-0">
                                In this section, you may upload any other documents requested by the evaluators
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="50%">Title</th>
                                            <th width="50%">Attachment</th>

                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        @foreach($documents as $doc)
                                        <tr>
                                            <td>
                                                {{$doc->title}}
                                            </td>
                                            <td><a  href="/uploads/transcript/{{$doc->file}}" target="_blank" style="text-decoration: none;">{{$doc->file}}</a></td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{$documents->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>



<!-- -------------------------  view work experience modal  ------------------------- -->
<div class="modal fade" id="workExpModal" tabindex="-1" role="dialog" aria-labelledby="workExpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="workExpModalLabel" >Work Experience Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <!-- --------------------  position  -------------------- -->
                            <tr>
                                <th width="25%">
                                    Position
                                </th>
                                <td width="25%">
                                    <label id="position" name="position"></label>
                                </td>
                            </tr>

                        <!-- --------------------  emp_status  -------------------- -->
                            <tr>
                                <th width="25%">
                                    Terms / Status of Employment
                                </th>
                                <td width="25%">
                                    <label id="terms" name="terms"></label>
                                </td>
                            </tr>

                        <!-- --------------------  duration  -------------------- -->
                            <tr>
                                <th>
                                    Duration
                                </th>
                                <td>
                                    <label id="startYear" name="startYear"></label> -
                                    <label id="endYear" name="endYear"></label>
                                </td>
                            </tr>
                        
                        <!-- --------------------  company_details  -------------------- -->
                            <tr>
                                <th>
                                    Company
                                </th>
                                <td>
                                    <label id="companyName" name="companyName"></label>
                                    <br>
                                    <label id="companyAddress" name="companyAddress"></label>
                                </td>
                            </tr>
                        
                        <!-- --------------------  supervisor_details  -------------------- -->
                            <tr>
                                <th>
                                    Supervisor
                                </th>
                                <td>
                                    <label id="supervisorName" name="supervisorName"></label>
                                    <br>
                                    <label id="supervisorDesignation" name="supervisorDesignation"></label>
                                </td>
                            </tr>
                        
                        <!-- --------------------  reasons  -------------------- -->
                            <tr>
                                <th>
                                    Reason(s) for moving on to the next job
                                </th>
                                <td>
                                    <label id="reason" name="reason"></label>
                                </td>
                            </tr>
                        
                        <!-- --------------------  functions  -------------------- -->
                            <tr>
                                <th>
                                    Describe actual functions and responsibilities in position occupied
                                </th>
                                <td>
                                    <label id="functions" name="functions"></label>
                                </td>
                            </tr>
                        
                        <!-- --------------------  cert_of_emp_or_service  -------------------- -->
                            <tr>
                                <th>
                                    Certificate of Employment/Service
                                </th>
                                <td>
                                    <a target="_blank" style="text-decoration: none;" id="file" name="file"><label name="filename" id="filename"></label></a>
                                </td>
                            </tr>
                        
                        <!-- --------------------  Reference1  -------------------- -->
                            <tr>
                                <table class="table table-striped">
                                    <!-- --------------------  thead  -------------------- -->
                                    <thead>
                                        <!-- --------------------  --------------------  -------------------- -->
                                        <tr>
                                            <th colspan="4" style="text-align: center;">
                                                <h3><strong>
                                                    Reference Table
                                                </strong></h3>
                                            </th>
                                        </tr>
                                        <!-- --------------------  --------------------  -------------------- -->
                                        <tr>
                                            <th>Name
                                            <th>Position
                                            <th>Contact #
                                            <th>Email
                                        </tr>
                                    </thead>
                                    <!-- --------------------  tbody  -------------------- -->
                                    <tbody>
                                        <!-- --------------------  --------------------  -------------------- -->
                                        <tr>
                                            <td>
                                                <label id="ref1" name="ref1">Reference Name 1</label>
                                            </td>
                                            <td>
                                                <label id="position1" name="position1">Position 1</label>
                                            </td>
                                            <td>
                                                <label id="contact1" name="contact1">Phone Number 1</label>
                                            </td>
                                            <td>
                                                <label id="email1" name="email1">Email 1</label>
                                            </td>
                                        </tr>
                                        <!-- --------------------  --------------------  -------------------- -->
                                        <tr>
                                            <td>
                                                <label id="ref2" name="ref2">Reference Name 2</label>
                                            </td>
                                            <td>
                                                <label id="position2" name="position2">Position 2</label>
                                            </td>
                                            <td>
                                                <label id="contact2" name="contact2">Phone Number 2</label>
                                            </td>
                                            <td>
                                                <label id="email2" name="email2">Email 2</label>
                                            </td>
                                        </tr>
                                        <!-- --------------------  --------------------  -------------------- -->
                                        <tr>
                                            <td>
                                                <label id="ref3" name="ref3">Reference Name 3</label>
                                            </td>
                                            <td>
                                                <label id="position3" name="position3">Position 3</label>
                                            </td>
                                            <td>
                                                <label id="contact3" name="contact3">Phone Number 3</label>
                                            </td>
                                            <td>
                                                <label id="email3" name="email3">Email 3</label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </tr>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</div>

<!-- -------------------------  View report modal  ------------------------- -->
<div class="modal fade" id="viewReportModal" tabindex="-1" role="dialog" aria-labelledby="viewReportModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="viewReportModalLabel">Narrative Report Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless" style="font-size: medium;">
                    <input type="text" name="user_id3" value="{{Auth::user()->id}}" hidden>
                    <input type="text" name="id6" id="id6" required hidden>
                    <!-- -------------------------  ----------------------  ------------------------- -->
                    <tr>
                        <th>
                            What?<i style="color: red;">*</i>
                        </th>
                        <td>
                            <label id="what3" name="what3"></label> 
                        </td>
                    </tr>
                    <!-- -------------------------  ----------------------  ------------------------- -->
                    <tr>
                        <th>
                            When?<i style="color: red;">*</i>
                        </th>
                        <td>
                            <label id="when3" name="when3">
                        </td>
                    </tr>
                    <!-- -------------------------  ----------------------  ------------------------- -->
                    <tr>
                        <th>
                            Where?<i style="color: red;">*</i>
                        </th>
                        <td>
                            <label id="where3" name="where3">
                        </td>
                    </tr>
                    <!-- -------------------------  ----------------------  ------------------------- -->
                    <tr>
                        <td colspan="2">
                            <strong>
                                OVERVIEW:  What have you learned from this training?  How useful is this training to your previous or current job?<i style="color: red;">*</i>
                            </strong>

                            <label id="overview3" name="overview3"> 
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>  

<!-- -------------------------  View report modal  ------------------------- -->
<div class="modal fade" id="viewEngagementModal" tabindex="-1" role="dialog" aria-labelledby="viewReportModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="viewReportModalLabel">Narrative Report Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless" style="font-size: medium;">
                    <input type="text" name="user_id3" value="{{Auth::user()->id}}" hidden>
                    <input type="text" name="id6" id="id6" required hidden>
                    <!-- -------------------------  ----------------------  ------------------------- -->
                    <tr>
                        <th>
                            What?<i style="color: red;">*</i>
                        </th>
                        <td>
                            <label id="what4" name="what4"></label> 
                        </td>
                    </tr>
                    <!-- -------------------------  ----------------------  ------------------------- -->
                    <tr>
                        <th>
                            When?<i style="color: red;">*</i>
                        </th>
                        <td>
                            <label id="when4" name="when4">
                        </td>
                    </tr>
                    <!-- -------------------------  ----------------------  ------------------------- -->
                    <tr>
                        <th>
                            Where?<i style="color: red;">*</i>
                        </th>
                        <td>
                            <label id="where4" name="where4">
                        </td>
                    </tr>
                    <!-- -------------------------  ----------------------  ------------------------- -->
                    <tr>
                        <td colspan="2">
                            <strong>
                                OVERVIEW:  What have you learned from this training?  How useful is this training to your previous or current job?<i style="color: red;">*</i>
                            </strong>

                            <label id="overview4" name="overview4"> 
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>  


<!-- --------------------  -------  -------------------- -->
<!-- --------------------  scripts  -------------------- -->
<!-- --------------------  -------  -------------------- -->

<script>
    $(function () {
        var data = {
            "_token": $('#token').val()
        };
        $(document).ready(function() {
            var table = $('#dataTable2').DataTable();
        });
        $('#dataTable2').on('click', '#viewReport', function () {
            var id = $(this).attr('data-id');
            $.get("/workexperience/viewworkexperience"+id, function (data) {
                $('#modalHeading').html("Edit Certificates");
                $('#position').text(data.position);
                $('#terms').text(data.terms);
                var start = new Date (data.startYear);
                var end = new Date (data.endYear);
                var filename = data.file;
                if(filename == null){
                    $('#filename').text("No Uploaded File");
                }
                else{
                    $('#filename').text(filename);
                }
                $('#startYear').text(start.toLocaleDateString());
                $('#endYear').text(end.toLocaleDateString());
                $('#reason').text(data.reason);
                $('#supervisorName').text(data.supervisorName);
                $('#supervisorDesignation').text(data.supervisorDesignation);
                $('#companyName').text(data.companyName);
                $('#companyAddress').text(data.companyAddress);
                $('#functions').text(data.functions);
                $('#file').attr('href', '/uploads/transcript/'+data.file);
                $('#ref1').text(data.ref1);
                $('#ref2').text(data.ref2);
                $('#ref3').text(data.ref3);
                $('#position1').text(data.position1);
                $('#position2').text(data.position2);
                $('#position3').text(data.position3);
                $('#contact1').text(data.contact1);
                $('#contact2').text(data.contact2);
                $('#contact3').text(data.contact3);
                $('#email1').text(data.email1);
                $('#email2').text(data.email2);
                $('#email3').text(data.email3);
                $('#workExpModal').modal('show');
            });
        });
    });
</script>  

<script>
    $(function () {
        var data = {
            "_token": $('#token').val()
        };

        $(document).ready(function() {
            var table = $('#dataTable3').DataTable();

        });

        $('#dataTable3').on('click', '#viewReportCom', function () {
            var id = $(this).attr('data-id');
            $.get("/community/viewnarrative"+id, function (data) {
                $('#modalHeading').html("Edit Certificates");
                $('#what3').text(data.what1);
                $('#when3').text(data.when1);
                $('#where3').text(data.where1);
                $('#overview3').text(data.overview);
                $('#viewReportModal').modal('show');
            });
        });
    });
</script>   

<script>
    $(function () {
        var data = {
            "_token": $('#token').val()
        };
        $(document).ready(function() {
            var table = $('#engageTable').DataTable();
        });
        $('#engageTable').on('click', '#viewReportEng', function () {
            var id = $(this).attr('data-id');
            $.get("/engagement/viewnarrativeeng"+id, function (data) {
                $('#modalHeading').html("Edit Certificates");
                $('#what4').text(data.what1);
                $('#when4').text(data.when1);
                $('#where4').text(data.where1);
                $('#overview4').text(data.overview);
                $('#viewEngagementModal').modal('show');
            });
        });
    });
</script>   


<script>
    $(function () {
        var data = {
            "_token": $('#token').val()
        };

        $(document).ready(function() {
            var table = $('#dataTable4').DataTable();
        });
        $('#dataTable4').on('click', '#addRemarks', function () {
            var id = $(this).attr('data-id');
            $.get("/applications/addremarkx"+id, function (data) {
                $('#modalHeading').html("Edit Certificates");
                $('#appidremarks1').val(data.id);      
                $('#addRemarksModal').modal('show');
            });
        });
    });
</script>  

<script>
    $(function () {
        var data = {
            "_token": $('#token').val()
        };
        $(document).ready(function() {
            var table = $('#remarksTable').DataTable();
        });
        $('#remarksTable').on('click', '#viewRemarks', function () {
            var id = $(this).attr('data-id');
            $.get("/applications/remark"+id, function (data) {
                var count = Object.keys(data).length;
                var filename = data.file;
                if(filename == null){
                    $('#remarksfilename').text("No Uploaded File");
                }
                else{
                    $('#remarksfilename').text(filename);
                }
                $('#remarksfile').attr('href', '/uploads/file/'+data.file);
                $('#appidremarks2').val(data.remarks);      
                $('#remarks3').text(data.remarks)
                $('#viewRemarksModal').modal('show');
            });
        });
    });
</script>                                
@endsection