
@extends('layout.dashboard')
@section('title', "User Application")
@section('content-title')
<a href="">
    Judalyn Beth G. Rivera's
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


<!-- --------------------  --------------------  -------------------- -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#forwardAppModal">
    Forward Application
</button>

<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#progressModal">
    Update Progress
</button>

<!-- --------------------  Update progress modal  -------------------- -->
<div class="modal fade" id="progressModal" tabindex="-1" role="dialog" aria-labelledby="progressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="progressModalLabel">Change Progress of Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless" style="font-size: medium;">
                    <!-- --------------------  --------------------  -------------------- -->
                    <tr>
                        <th>Stage</th>
                        <td>
                            <select class="form-control" id="" name="" required="">
                                <option value="" selected="" disabled="">--- Select a Stage ---</option>
                                <!-- list all stages here from initial assessment to last -->
                                <!--    test for current stage and hide from current until previous
                                        example: if current stage = "second assessment" options to be displayed is everything AFTER second assessment
                                 -->
                                <option>Inital Assessment</option>
                                <option>Second Assessment</option>
                            </select>
                        </td>
                    </tr>
                    <!-- --------------------  --------------------  -------------------- -->
                    <tr>
                        <th>Status</th>
                        <td>
                            <select class="form-control" id="" name="" required="">
                                <option value="" selected="" disabled="">--- Select a Status ---</option>
                                <option>On going</option>
                                <option>Passed</option>
                                <option>Rejected</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger zoom"><i class="far fa-save"></i></button>
            </div>
        </div>
    </div>
</div>

<!-- --------------------  forward application modal  -------------------- -->
<div class="modal fade" id="forwardAppModal" tabindex="-1" role="dialog" aria-labelledby="forwardAppModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forwardAppModalLabel">Forward Application</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size: medium">
                <table class="table table-borderless" style="font-size: medium;">
                    <!-- --------------------  --------------------  -------------------- -->
                    <tr>
                        <th>
                            Forward to:
                        </th>
                        <td>
                            <select class="form-control" id="" name="" required="">
                                <option value="" selected="" disabled=""> --- Select an office ---</option>
                                <option value="">ETEEAP</option>
                                <option value="">SIT</option>
                                <option value="">SBAA</option>
                                <option value="">SEA</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"><i class="fas fa-share-square"></i></button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('content')

<!-- --------------------  User Profile  -------------------- -->
<div class="row pb-4" >
    <div class="col-sm-2">
            <a href="{{ asset('img/judalyn_rivera.jpg')}}" target="_blank">
                <img src="{{ asset('img/judalyn_rivera.jpg')}}" class="img-thumbnail rounded-circle" alt="Image" style="height: 13rem;width:13rem" >
            </a>
    </div>
    <div class="col-sm-9">
        <table class="table table-borderless col-10">
            <!-- --------------------  --------------------  -------------------- -->
            <tr>
                <th width="15%">Name
                    <td >

                        Judalyn Beth G. Rivera
                    </td>
                    <th>Gender</th>
                    <td>
                        Female
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th>Address</th>
                    <td>
                        62 Liteng Pacdal, Baguio City
                    </td>
                    <th>Phone Number</th>
                    <td>
                        09071636134
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th>Birth Date</th>
                    <td>
                        September 21, 1991
                    </td>
                    <th>Birth Place</th>
                    <td>
                        Bronx, NY, USA
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th>Civil Status</th>
                    <td>
                        Married
                    </td>
                    <th>Language</th>
                    <td>
                        English, Filipino
                    </td>
                </tr>
        </table>
    </div>
</div>

<!-- --------------------  bootstrap tables  -------------------- -->
<div class="card shadow mb-4 p-3">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <!-- -------------------------  -------------  ------------------------- -->
        <li class="nav-item">
            <a class="nav-link active" id="pill-remarks" data-toggle="pill" href="#tab-remarks" role="tab" aria-controls="tab-remarks" aria-selected="false">
                Remarks
            </a>
        </li>
        <!-- -------------------------  -------------  ------------------------- -->
        <li class="nav-item">
            <a class="nav-link" id="pill-plans" data-toggle="pill" href="#tab-plans" role="tab" aria-controls="tab-plans" aria-selected="true">
                ETEEAP Plans
            </a>
        </li>
        <!-- -------------------------  -------------  ------------------------- -->
        <li class="nav-item">
            <a class="nav-link" id="pill-education" data-toggle="pill" href="#tab-education" role="tab" aria-controls="tab-education" aria-selected="false">
                Education
            </a>
        </li>
        <!-- -------------------------  -------------  ------------------------- -->
        <li class="nav-item">
            <a class="nav-link" id="pill-workexp" data-toggle="pill" href="#tab-workexp" role="tab" aria-controls="tab-workexp" aria-selected="false">
                Work Experience
            </a>
        </li>
        <li class="nav-item">
        <!-- -------------------------  -------------  ------------------------- -->
            <a class="nav-link" id="pill-awards" data-toggle="pill" href="#tab-awards" role="tab" aria-controls="tab-awards" aria-selected="false">
                Awards
            </a>
        </li>
        <li class="nav-item">
        <!-- -------------------------  -------------  ------------------------- -->
            <a class="nav-link" id="pill-creative" data-toggle="pill" href="#tab-creative" role="tab" aria-controls="tab-creative" aria-selected="false">
                Creative Works
            </a>
        </li>
        <li class="nav-item">
        <!-- -------------------------  -------------  ------------------------- -->
            <a class="nav-link" id="pill-lifelong" data-toggle="pill" href="#tab-lifelong" role="tab" aria-controls="tab-lifelong" aria-selected="false">
                Lifelong Learnings
            </a>
        </li>
        <li class="nav-item">
        <!-- -------------------------  -------------  ------------------------- -->
            <a class="nav-link" id="pill-organization" data-toggle="pill" href="#tab-organization" role="tab" aria-controls="tab-organization" aria-selected="false">
                Organization
            </a>
        </li>
        <li class="nav-item">
        <!-- -------------------------  -------------  ------------------------- -->
            <a class="nav-link" id="pill-engagements" data-toggle="pill" href="#tab-engagements" role="tab" aria-controls="tab-engagements" aria-selected="false">
                Engagements
            </a>
        </li>
        <li class="nav-item">
        <!-- -------------------------  -------------  ------------------------- -->
            <a class="nav-link" id="pill-community" data-toggle="pill" href="#tab-community" role="tab" aria-controls="tab-community" aria-selected="false">
                Community
            </a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <!-- -------------------------  Remarks  ------------------------- -->
        <div class="tab-pane fade show active" id="tab-remarks" role="tabpanel" aria-labelledby="tab-remarks">
            <!-- -------------------------  remarks table  ------------------------- -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-danger">
                        Remarks
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addModal">
                            <i class="fas fa-plus"></i>
                        </button>

                        <!-- -------------------------  add modal  ------------------------- -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="POST"  action="" enctype="multipart/form-data">
                                        @CSRF
                                        {{method_field('POST')}}    
                                        @method('POST')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addModalLabel">
                                                Remarks Details
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-borderless" style="font-size: medium;">
                                                <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                                <!-- -------------------------  -------------------------  ------------------------- -->
                                                <tr>
                                                    <th width="30%">
                                                        Remarks<i style="color: red;">*</i>
                                                    </th>
                                                    <td width="70%">
                                                        <input style="color: black" type="text" class="form-control" id="remarks" name="remarks" required="">
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
                    </h3>
                    <p style="text-indent: 50px;" class="mb-0">

                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Location</th>
                                    <th scope="col">Stage</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Attachment</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
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
                <tr>
                    <th colspan="2">
                        <img src="{{asset('img/core-values.png')}}" style="height: 10rem;">
                        <br>
                    </th>
                    <td>
                        <strong>In 300 words – explain how you were able to apply the Core Values of the University of Baguio to your current work.</strong>
                        <p style="color: red; text-indent: 50px; text-align: justify;">
                            lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum 
                        </p>
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
                    <td>
                        <i style="color: red;">
                            lorem ipsum lorem ipsum lorem ipsum 
                        </i>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th style="text-align: right;">
                        2nd Priority
                    </th>
                    <td>
                        <i style="color: red;">
                            lorem ipsum lorem ipsum lorem ipsum 
                        </i>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th style="text-align: right;">
                        3rd Priority
                    </th>
                    <td>
                        <i style="color: red;">
                            lorem ipsum lorem ipsum lorem ipsum 
                        </i>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th colspan="2" width="30%">
                        Statment of goals, objectives or purposes for applying for the degree
                    </th>
                    <td>
                        <p style="color: red; text-indent: 50px; text-align: justify;">
                            lorem ipsum lorem ipsum lorem ipsum lorem ipsum 
                        </p>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th colspan="2">
                        Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program. Be specific.
                    </th>
                    <td>
                        <p style="color: red; text-indent: 50px; text-align: justify;">
                            lorem ipsum lorem ipsum lorem ipsum lorem ipsum 
                        </p>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th colspan="2">
                        For overseas applicants, describe how you plan to obtain accreditation / equivalency (e.g. when you plan to come to the Philippines) 
                    </th>
                    <td>
                        <p style="color: red; text-indent: 50px; text-align: justify;">
                            lorem ipsum lorem ipsum lorem ipsum lorem ipsum 
                        </p>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th colspan="2">
                        How soon do you need to complete accreditation / equivalency?
                    </th>
                    <td>
                        <i style="color: red;">
                            lorem ipsum lorem ipsum lorem ipsum lorem ipsum 
                        </i>
                    </td>
                </tr>
                <!-- --------------------  --------------------  -------------------- -->
                <tr>
                    <th colspan="2">
                        To sum up please write an essay on how your attaining a degree contributes to your personal development, your community, your workplace, society, and country?
                    </th>
                    <td>
                        <p style="color: red; text-indent: 50px; text-align: justify;">
                            lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum 
                        </p>
                    </td>
                </tr>
            </table>
        </div>
        <!-- -------------------------  Education  ------------------------- -->
        <div class="tab-pane fade" id="tab-education" role="tabpanel" aria-labelledby="tab-education">
            <div class="row">
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
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-formal" role="tabpanel" aria-labelledby="v-pills-formal-tab">
                            <!-- -------------------------  Formal Education Table  ------------------------- -->
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
                                                    <th width="20%">Duration</th>
                                                    <th width="20%">Degree</th>
                                                    <th width="20%">Upload</th>
                                                </tr>
                                            </thead>
                                            <tbody>     
                                                <!-- -------------------------  -------------------------  ------------------------- -->
                                                <tr>
                                                    <td>School Level</td>
                                                    <td>
                                                        School Name<br>
                                                        School Address
                                                    </td>
                                                    <td>
                                                        Duration
                                                    </td>
                                                    <td>
                                                        Degree
                                                    </td>
                                                    <td>
                                                        Transcript
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-nonformal" role="tabpanel" aria-labelledby="v-pills-nonformal-tab">
                            <!-- -------------------------  Non Formal Education Table  ------------------------- -->
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
                                                <tr>
                                                    <td>
                                                        Program
                                                    </td>
                                                    <td>
                                                        Certificate
                                                    </td>
                                                    <td>
                                                        Certifying Agency
                                                    </td>
                                                    <td>
                                                        Duration
                                                    </td>
                                                    <td>
                                                        Transcript
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-certification" role="tabpanel" aria-labelledby="v-pills-certification-tab">
                            <!-- -------------------------  Certification Exams  ------------------------- -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h3 class="m-0 font-weight-bold text-danger">
                                        Certification Examinations
                                    </h3>
                                    <p style="text-indent: 50px;" class="mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered display" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Title</th>
                                                    <th width="20%">Certifying Agent</th>
                                                    <th width="20%">Date</th>
                                                    <th width="20%">Rating</th>
                                                    <th width="20%">Uploads</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- -------------------------  -------------------------  ------------------------- -->
                                                <tr>
                                                    <td>
                                                        Certificate Title
                                                    </td>
                                                    <td>
                                                        Agent<br>
                                                        Address
                                                    </td>
                                                    <td>
                                                        Timestamp
                                                    </td>
                                                    <td>
                                                        Rating
                                                    </td>
                                                    <td>
                                                        File Name
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="v-pills-national" role="tabpanel" aria-labelledby="v-pills-national-tab">
                            <!-- -------------------------  National / Licensure Exams  ------------------------- -->
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
                                                    <th width="33%">Upload</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- -------------------------  -------------------------  ------------------------- -->
                                                <tr>
                                                    <td>
                                                        Title
                                                    </td>
                                                    <td>
                                                        file name
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
                        <table class="table table-bordered display " width="100%" cellspacing="0">
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
                                <tr>
                                    <td>Position</td>
                                    <td>Company Name<br>Company Address</td>
                                    <td>Duration</td>

                                    <!-- -------------------------  view buttons  ------------------------- -->
                                    <td>
                                        <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#workExpModal" id="view">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------  awards  ------------------------- -->
        <div class="tab-pane fade" id="tab-awards" role="tabpanel" aria-labelledby="tab-awards">

            <!-- -------------------------  Work Experience table  ------------------------- -->
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
                                <tr>
                                    <td>Type</td>
                                    <td>Award Title</td>
                                    <td>
                                        Organization Name<br>
                                        Organization address
                                    </td>
                                    <td>Date Received</td>
                                    <td>Attachment</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
        </div>
        <!-- -------------------------  Creative works  ------------------------- -->
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
                                <tr>
                                    <td>
                                        work title
                                    </td>
                                    <td>
                                        work description
                                    </td>
                                    <td>
                                        date accomplished
                                    </td>
                                    <td>
                                        agency name<br>
                                        agency address
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------  Lifelong Learnings  ------------------------- -->
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
                <div class="col-9">
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- -------------------------  -------------------------  ------------------------- -->
                                                <tr>
                                                    <td>Hobby</td>
                                                    <td>Rating</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <!-- -------------------------  work activity  ------------------------- -->
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- -------------------------  -------------------------  ------------------------- -->
                                                <tr>
                                                    <td>Activity</td>
                                                    <td>Description</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -------------------------  -----------------------  ------------------------- -->
                        <div class="tab-pane fade" id="v-pills-volunteer" role="tabpanel" aria-labelledby="v-pills-volunteer-tab">
                            <!-- -------------------------  -----------------------  ------------------------- -->
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- -------------------------  -------------------------  ------------------------- -->
                                                <tr>
                                                    <td>
                                                        Title
                                                    </td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -------------------------  -----------------------  ------------------------- -->
                        <div class="tab-pane fade" id="v-pills-travels" role="tabpanel" aria-labelledby="v-pills-travels-tab">
                            <!-- -------------------------  -----------------------  ------------------------- -->
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- -------------------------  -------------------------  ------------------------- -->
                                                <tr>
                                                    <td>Location</td>
                                                    <td>Purpose</td>
                                                    <td>Learning Experience</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------  Organization  ------------------------- -->
        <div class="tab-pane fade" id="tab-organization" role="tabpanel" aria-labelledby="tab-organization">
            <!-- -------------------------  -----------------------  ------------------------- -->
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
                                <tr>
                                    <td>Type</td>
                                    <td>Organization</td>
                                    <td>Position</td>
                                    <td>Duration</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------  Engagements  ------------------------- -->
        <div class="tab-pane fade" id="tab-engagements" role="tabpanel" aria-labelledby="tab-engagements">
            <!-- -------------------------  -----------------------  ------------------------- -->
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
                        <table class="display table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Involvement</th>
                                    <th>Duration</th>
                                    <th>Venue</th>
                                    <th>Organizer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- -------------------------  -------------------------  ------------------------- -->
                                <tr>
                                    <td>Title</td>
                                    <td>Involvement</td>
                                    <td>Duration</td>
                                    <td>Venue</td>
                                    <td>Organizer</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------  Community involvement  ------------------------- -->
        <div class="tab-pane fade" id="tab-community" role="tabpanel" aria-labelledby="tab-community">
            <!-- -------------------------  -----------------------  ------------------------- -->
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
                        <table class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                <tr>
                                    <td>Title</td>
                                    <td>Duration</td>
                                    <td>Venue</td>
                                    <td>Organizer</td>
                                    <!-- -------------------------  Narrative report buttons  ------------------------- -->
                                    <td>  

                                        <!-- -------------------------  ---------------------------  ------------------------- -->
                                        <!-- -------------------------  VIEW Narrative Report modal  ------------------------- -->
                                        <!-- -------------------------  ---------------------------  ------------------------- -->
                                        <!-- VIEW button only shows if narrative report already exists -->
                                        <button class="btn btn-light zoom" data-toggle="modal" data-target="#viewReportModal" id="viewReport"><i class="fas fa-eye"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
            <div class="modal-header">
                <h5 class="modal-title" id="workExpModalLabel">Work Experience</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th width="25%">
                                Position
                            </th>
                            <td width="25%">
                                <label class="text-danger" id="" name="">Lorem ipsum</label>
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th width="25%">
                                Terms / Status of Employment
                            </th>
                            <td width="25%">
                                <label class="text-danger" id="" name="">Lorem ipsum</label>
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Duration
                            </th>
                            <td>
                                <label class="text-danger" id="" name="">mm/dd/yyyy</label> - 
                                <label class="text-danger" id="" name="">mm/dd/yyyy</label>
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Company
                            </th>
                            <td>
                                <label class="text-danger" id="" name="">
                                    Company Name <br>
                                    Company Address
                                </label>
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Supervisor
                            </th>
                            <td>
                                <label class="text-danger" id="" name="">
                                    Supervisor's Name <br>
                                    Supervisor's Designation
                                </label>
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Reason(s) for moving on to the next job
                            </th>
                            <td>
                                <label class="text-danger" id="" name="">
                                    Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum 
                                </label>
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>            
                            <th>
                                Describe actual functions and responsibilities in position occupied
                            </th>
                            <td>
                                <label class="text-danger" id="" name="">
                                    Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum 
                                </label>
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Certificate of Employment (optional)
                            </th>
                            <td >
                                <label class="text-danger" id="" name=""><i>filename.pdf</i></label>
                                <br>
                                <i style="color: red; font-size: x-small;">*PDF files only</i>
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
                                            <label class="text-danger" id="" name="">Reference Name 1</label>
                                        </td>
                                        <td>
                                            <label class="text-danger" id="" name="">Position 1</label>
                                        </td>
                                        <td>
                                            <label class="text-danger" id="" name="">Phone Number 1</label>
                                        </td>
                                        <td>
                                            <label class="text-danger" id="" name="">Email 1</label>
                                        </td>
                                    </tr>
                                    <!-- --------------------  --------------------  -------------------- -->
                                    <tr>
                                        <td>
                                            <label class="text-danger" id="" name="">Reference Name 2</label>
                                        </td>
                                        <td>
                                            <label class="text-danger" id="" name="">Position 2</label>
                                        </td>
                                        <td>
                                            <label class="text-danger" id="" name="">Phone Number 2</label>
                                        </td>
                                        <td>
                                            <label class="text-danger" id="" name="">Email 2</label>
                                        </td>
                                    </tr>
                                    <!-- --------------------  --------------------  -------------------- -->
                                    <tr>
                                        <td>
                                            <label class="text-danger" id="" name="">Reference Name 3</label>
                                        </td>
                                        <td>
                                            <label class="text-danger" id="" name="">Position 3</label>
                                        </td>
                                        <td>
                                            <label class="text-danger" id="" name="">Phone Number 3</label>
                                        </td>
                                        <td>
                                            <label class="text-danger" id="" name="">Email 3</label>
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
            <div class="modal-header">
                <h5 class="modal-title" id="viewReportModalLabel">Narrative Report Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
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
                            <i style="color: red;"><label id="what3" name="what3"></label> </i>
                        </td>
                    </tr>
                    <!-- -------------------------  ----------------------  ------------------------- -->
                    <tr>
                        <th>
                            When?<i style="color: red;">*</i>
                        </th>
                        <td>
                            <i style="color: red;"><label id="when3" name="when3"></i>
                        </td>
                    </tr>
                    <!-- -------------------------  ----------------------  ------------------------- -->
                    <tr>
                        <th>
                            Where?<i style="color: red;">*</i>
                        </th>
                        <td>
                            <i style="color: red;"><label id="where3" name="where3"></i>
                        </td>
                    </tr>
                    <!-- -------------------------  ----------------------  ------------------------- -->
                    <tr>
                        <td colspan="2">
                            <strong>
                                OVERVIEW:  What have you learned from this training?  How useful is this training to your previous or current job?<i style="color: red;">*</i>
                            </strong>

                            <p style="color: red; text-indent: 50px;"><label id="overview3" name="overview3"> </p>
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

</script>
@endsection