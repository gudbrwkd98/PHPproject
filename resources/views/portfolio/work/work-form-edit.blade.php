@extends('layout.dashboard')
@section('title', "Work Experience Details")
@section('content-title')

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
    <form method="POST"  action="{{ route('user.storeWorkExperience',$user = auth()->id()) }}" enctype="multipart/form-data">
        <div class="modal-header bg-danger">
            <h4 class="modal-title text-white" id="addModalLabel">Work Experience Details</h4>
        </div>
        <div class="modal-body">
            @CSRF
            {{method_field('POST')}}    
            @method('POST')
            <table class="table table-borderless">
                @foreach ($comm as $com)
                    <input type="text" id ="user_id" name="user_id" value="{{Auth::user()->id}}" hidden>
                    <input type="text" id ="id2" name="id2" value="{{$com->formid}}" hidden>
                    @foreach($checkoffice as $checkoff)
                        <input type="text" name="officenotif" value="{{$checkoff->office}}" hidden>
                    @endforeach

                    <!-- --------------------  position_and_status  -------------------- -->
                        <tr>
                            <th  width="20%">
                                Position <span style="color: red">*</span>
                            </th>
                            <td  width="30%">
                                <input type="text" style="color: black;" class="form-control" id="position" name="position" required="" value="{{$com->position}}">
                            </td>
                            <th  width="20%">
                                Terms / Status of Employment <span style="color: red">*</span>
                            </th>
                            <td  width="30%">
                                <input type="text" style="color: black;" class="form-control" id="terms" name="terms" required="" value="{{$com->terms}}">
                            </td>
                        </tr>

                    <!-- --------------------  start_and_end_date  -------------------- -->
                        <tr>
                            <th>
                                Date Start <span style="color: red">*</span>
                            </th>
                            <td>
                                <input type="date" style="color: black;" class="form-control" id="startYear" name="startYear" required="" value="{{$com->startYear}}" onchange="maxCheckDate(this)" >
                            </td>
                            <th>
                                Date End <span style="color: red">*</span>
                            </th>
                            <td>
                                <input type="date" style="color: black;" class="form-control" id="endYear" name="endYear" required=""  value="{{$com->endYear}}" onchange="maxCheckDate(this)" >
                            </td>
                        </tr>

                    <!-- --------------------  company_details  -------------------- -->
                        <tr>
                            <th>
                                Company Name <span style="color: red">*</span>
                            </th>
                            <td>
                                <input type="text" style="color: black;" class="form-control" id="companyName" name="companyName" required=""  value="{{$com->companyName}}">
                            </td>
                            <th>
                                Company Address <span style="color: red">*</span>
                            </th>
                            <td>
                                <textarea rows="2" style="color: black;" class="form-control" id="companyAddress" name="companyAddress" >{{$com->companyAddress}}</textarea>
                            </td>
                        </tr>

                    <!-- --------------------  supervisor_details  -------------------- -->
                        <tr>
                            <th>
                                Supervisor's Name<span style="color: red">*</span>
                            </th>
                            <td>
                                <input type="text" style="color: black;" class="form-control" id="supervisorName" name="supervisorName" required="" value="{{$com->supervisorName}}">
                            </td>
                            <th>
                                Supervisor's Designation<span style="color: red">*</span>
                            </th>
                            <td>
                                <input type="text" style="color: black;" class="form-control" id="supervisorDesignation" name="supervisorDesignation" required="" value="{{$com->supervisorDesignation}}">
                            </td>
                        </tr>

                    <!-- --------------------  reasons_and_functions  -------------------- -->
                        <tr>
                            <th>
                                Reason(s) for moving on to the next job <span style="color: red">*</span>
                            </th>
                            <td>
                                <textarea rows="3" style="color: black;" class="form-control" id="reason" name="reason" required="" >{{$com->reason}}</textarea>
                            </td>
                            <th>
                                Describe actual functions and responsibilities in position occupied <span style="color: red">*</span>
                            </th>
                            <td>
                                <textarea rows="3" style="color: black;" class="form-control" id="functions" name="functions" required=""  >{{$com->functions}}</textarea>
                            </td>
                        </tr>

                    <!-- --------------------  cert_of_emp_or_service  -------------------- -->
                        <tr>
                            <th colspan="4">
                                <div class="row">
                                    <div class="col-3">
                                        Certificate of Employment/Service
                                    </div>
                                    <div class="col-8">
                                        <input type="file" id="file" name="file" title="PDF files only">
                                        <br><i style="color: red; font-size: x-small;">*PDF files only</i>
                                    </div>
                                </div>
                            </th>
                        </tr>

                    <!-- --------------------  preview_of_certificate  -------------------- -->
                        <tr>
                            <th>
                                Preview Certificate
                            </th>
                            <td>
                                @if($com->file)
                                <a target="_blank" href="/uploads/transcript/{{$com->file}}" style="text-decoration: none;">{{$com->file}}</a>
                                @else
                                No Uploaded File.
                                @endif
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
                                            <th>Name <span style="color: red">*</span></th>
                                            <th>Position <span style="color: red">*</span></th>
                                            <th>Contact # <span style="color: red">*</span></th>
                                            <th>Email <span style="color: red">*</span></th>
                                        </tr>
                                    </thead>

                                <!-- --------------------  tbody  -------------------- -->
                                    <tbody>
                                        <!-- --------------------  ref1  -------------------- -->
                                        <tr>
                                            <!-- --------------------  name1  -------------------- -->
                                            <td>
                                                <input type="text" style="color: black;" class="form-control" id="ref1" name="ref1" required="" value="{{$com->ref1}}"  pattern="[A-Za-z\s]+" title="Must use letters only" >
                                            </td>
                                            <!-- --------------------  position1  -------------------- -->
                                            <td>
                                                <input type="text" style="color: black;" class="form-control" id="position1" name="position1" pattern="[A-Za-z\s]+" title="Must use letters only" required="" value="{{$com->position1}}">
                                            </td>
                                            <!-- --------------------  contact1  -------------------- -->
                                            <td class="row">
                                                <input type="text" style="color: black;" class="form-control col-11" id="contact1" name="contact1" value="{{$com->contact1}}" pattern="[0][9][0-9]{2}-[0-9]{3}-[0-9]{4}" title="09XX-XXX-XXXX" placeholder="09XX-XXX-XXXX" required="" ><span class="validity col-1 p-0 m-0"></span>
                                            </td>
                                            <!-- --------------------  email1  -------------------- -->
                                            <td>
                                                <input type="text" style="color: black;" class="form-control" id="email1" name="email1" required="" value="{{$com->email1}}">
                                            </td>
                                        </tr>
                                        <!-- --------------------  ref2  -------------------- -->
                                        <tr>
                                            <!-- --------------------  name2  -------------------- -->
                                            <td>
                                                <input type="text" style="color: black;" class="form-control" id="ref2" name="ref2" required="" value="{{$com->ref2}}"  pattern="[A-Za-z\s]+" title="Must use letters only" >
                                            </td>
                                            <!-- --------------------  position2  -------------------- -->
                                            <td>
                                                <input type="text" style="color: black;" class="form-control" id="position2" name="position2" pattern="[A-Za-z\s]+" title="Must use letters only" required="" value="{{$com->position2}}">
                                            </td>
                                            <!-- --------------------  contact2  -------------------- -->
                                            <td class="row">
                                                <input type="text" style="color: black;" class="form-control col-11" id="contact2" name="contact2" value="{{$com->contact2}}" pattern="[0][9][0-9]{2}-[0-9]{3}-[0-9]{4}" title="09XX-XXX-XXXX" placeholder="09XX-XXX-XXXX" required="" ><span class="validity col-1 p-0 m-0"></span>
                                            </td>
                                            <!-- --------------------  email2  -------------------- -->
                                            <td>
                                                <input type="text" style="color: black;" class="form-control" id="email2" name="email2" required="" value="{{$com->email2}}">
                                            </td>
                                        </tr>
                                        <!-- --------------------  ref3  -------------------- -->
                                        <tr>
                                            <!-- --------------------  name3  -------------------- -->
                                            <td>
                                                <input type="text" style="color: black;" class="form-control" id="ref3" name="ref3" required="" value="{{$com->ref3}}"  pattern="[A-Za-z\s]+" title="Must use letters only" >
                                            </td>
                                            <!-- --------------------  position3  -------------------- -->
                                            <td>
                                                <input type="text" style="color: black;" class="form-control" id="position3" name="position3" pattern="[A-Za-z\s]+" title="Must use letters only" required="" value="{{$com->position3}}">
                                            </td>
                                            <!-- --------------------  contact3  -------------------- -->
                                            <td class="row">
                                                <input type="text" style="color: black;" class="form-control col-11" id="contact3" name="contact3" value="{{$com->contact3}}" pattern="[0][9][0-9]{2}-[0-9]{3}-[0-9]{4}" title="09XX-XXX-XXXX" placeholder="09XX-XXX-XXXX" required="" ><span class="validity col-1 p-0 m-0"></span>
                                            </td>
                                            <!-- --------------------  email3  -------------------- -->
                                            <td>
                                                <input type="text" style="color: black;" class="form-control" id="email3" name="email3" required="" value="{{$com->email3}}">
                                            </td>
                                        </tr>
                                    </tbody>
                            </table>
                        </tr>
                @endforeach
            </table>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger zoom float-right"><i class="far fa-save"></i></button>
            <a href="">
                <button class="btn btn-secondary zoom float-right mr-1"><i class="fas fa-backward"></i></button>    
            </a>
        </div>
    </form>  
@endsection