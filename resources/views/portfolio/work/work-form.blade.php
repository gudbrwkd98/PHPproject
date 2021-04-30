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
        <input type="text" id ="user_id" name="user_id" value="{{Auth::user()->id}}" hidden>
        <input type="text" id ="id2" name="id2" value="" hidden>
        @foreach($checkoffice as $checkoff)
            <input type="text" name="officenotif" value="{{$checkoff->office}}" hidden>
        @endforeach
        <!-- --------------------  position_and_status  -------------------- -->
        <tr>
            <th  width="20%">
                Position <span style="color: red">*</span>
            </th>
            <td  width="30%">
                <input style="color: black;" type="text" class="form-control" id="position" name="position" pattern="[A-Za-z\s]+" required="">
            </td>
            <th  width="20%">
                Terms / Status of Employment <span style="color: red">*</span>
            </th>
            <td  width="30%">
                <input style="color: black;" type="text" class="form-control" id="terms" name="terms" pattern="[A-Za-z\s]+" required="">
            </td>
        </tr>
        <!-- --------------------  start_and_end_date  -------------------- -->
        <tr>
            <th>
                Start Date<span style="color: red">*</span>
            </th>
            <td>
                <input type="date" style="color: black;" class="form-control" id="startYear" name="startYear" onchange="maxCheckDate(this)" required="">
            </td>
            <th>
                End Date<span style="color: red">*</span>
            </th>
            <td>    
                <input type="date" style="color: black;" class="form-control" id="endYear" name="endYear" onchange="maxCheckDate(this)" required="">
            </td>
        </tr>
        <!-- --------------------  company_details  -------------------- -->
        <tr>
            <th>
                Company Name <span style="color: red">*</span>
            </th>
            <td>
                <input type="text" style="color: black;" class="form-control" id="companyName" name="companyName" required="">
            </td>
            <th>
                Company Address <span style="color: red">*</span>
            </th>
            <td>
                <textarea rows="2" style="color: black;" class="form-control" id="companyAddress" name="companyAddress" required=""></textarea>
            </td>
        </tr>
        <!-- --------------------  supervisor_details  -------------------- -->
        <tr>
            <th>
                Supervisor's Name<span style="color: red">*</span>
            </th>
            <td>
                <input type="text" style="color: black;" class="form-control" id="supervisorName" name="supervisorName" pattern="[A-Za-z\s]+" required="">
            </td>
            <th>
                Supervisor's Designation<span style="color: red">*</span>
            </th>
            <td>
                <input type="text" style="color: black;" class="form-control" id="supervisorDesignation" name="supervisorDesignation" pattern="[A-Za-z\s]+" required="">
            </td>
        </tr>
        <!-- --------------------  reasons_and_functions  -------------------- -->
        <tr>
            <th>
                Reason(s) for moving on to the next job <span style="color: red">*</span>
            </th>
            <td>
                <textarea rows="3" style="color: black;" class="form-control" id="reason" name="reason" required="" ></textarea>
            </td>
            <th>
                Describe actual functions and responsibilities in position occupied <span style="color: red">*</span>
            </th>
            <td>
                <textarea rows="3" style="color: black;" class="form-control" id="functions" name="functions" required="" ></textarea>
            </td>
        </tr>
        <!-- --------------------  cert_of_emp_or_service  -------------------- -->
        <tr>
            <th colspan="4">
                <div class="row">
                    <div class="col-3">
                        Certificate of Employment/Service <span style="color: red">*</span>
                    </div>
                    <div class="col-8">
                        <input type="file" id="file" name="file" title="PDF files only" required="">
                        <br><i style="color: red; font-size: x-small;">*PDF files only</i>
                    </div>
                </div>
            </th>
        </tr>
        <!-- --------------------  References  -------------------- -->
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
                        <!-- --------------------  reference_name  -------------------- -->
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="ref1" name="ref1" pattern="[A-Za-z\s]+" title="Must use letters only" required="">
                        </td>
                        <!-- --------------------  reference_position  -------------------- -->
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="position1" name="position1" pattern="[A-Za-z\s]+" title="Must use letters only" required="" >
                        </td>
                        <!-- --------------------  reference_contact  -------------------- -->
                        <td class="row">
                            <input type="tel" style="color: black;" class="form-control col-11" id="contact1" name="contact1" pattern="[0][9][0-9]{2}-[0-9]{3}-[0-9]{4}" title="09XX-XXX-XXXX" placeholder="09XX-XXX-XXXX" required="" ><span class="validity col-1 p-0 m-0" ></span>
                        </td>
                        <!-- --------------------  reference_email  -------------------- -->
                        <td>
                            <input type="email" style="color: black;" class="form-control" id="email1" name="email1" required="">
                        </td>
                    </tr>
                    <!-- --------------------  ref2  -------------------- -->
                    <tr>
                        <!-- --------------------  reference_name  -------------------- -->
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="ref2" name="ref2" pattern="[A-Za-z\s]+" title="Must use letters only" required="">
                        </td>
                        <!-- --------------------  reference_position  -------------------- -->
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="position2" name="position2" pattern="[A-Za-z\s]+" title="Must use letters only" required="">
                        </td>
                        <!-- --------------------  reference_contact  -------------------- -->
                        <td class="row">
                            <input type="tel" style="color: black;" class="form-control col-11" id="contact2" name="contact2" pattern="[0][9][0-9]{2}-[0-9]{3}-[0-9]{4}" title="09XX-XXX-XXXX" placeholder="09XX-XXX-XXXX" required=""><span class="validity col-1 p-0 m-0"></span>
                        </td>
                        <!-- --------------------  reference_email  -------------------- -->
                        <td>
                            <input type="email" style="color: black;" class="form-control" id="email2" name="email2" required="">
                        </td>
                    </tr>
                    <!-- --------------------  ref3  -------------------- -->
                    <tr>
                        <!-- --------------------  reference_name  -------------------- -->
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="ref3" name="ref3" pattern="[A-Za-z\s]+" title="Must use letters only" required="">
                        </td>
                        <!-- --------------------  reference_position  -------------------- -->
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="position3" name="position3" pattern="[A-Za-z\s]+" title="Must use letters only" required="">
                        </td>
                        <!-- --------------------  reference_contact  -------------------- -->
                        <td class="row">
                            <input type="tel" style="color: black;" class="form-control col-11" id="contact3" name="contact3" pattern="[0][9][0-9]{2}-[0-9]{3}-[0-9]{4}" title="09XX-XXX-XXXX" placeholder="09XX-XXX-XXXX" required="" ><span class="validity col-1 p-0 m-0"></span>
                        </td>
                        <!-- --------------------  reference_email  -------------------- -->
                        <td>
                            <input type="email" style="color: black;" class="form-control" id="email3" name="email3" required="">
                        </td>
                    </tr>
                </tbody>
            </table>
        </tr>
    </table>
    </div>
    <div class="modal-footer">
        <a href="">
            <button class="btn btn-secondary zoom float-right mr-1"><i class="fas fa-backward"></i></button>    
        </a>
        <button type="submit" onclick="compareDates()" class="btn btn-danger zoom float-right"><i class="far fa-save"></i></button>
    </div>
</form>  



<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ scripts ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<script type="text/javascript">

    //compares date inputs
    function compareDates(){
        var date1 = document.getElementById("startYear").value;
        var date2 = document.getElementById("endYear").value;
        if (date1 > date2) {
            alert('Please check your dates. Start date should not be after end date.');
        }
        else if (date1 === date2) {
            alert('Please check your dates. Start date should not be the same with expiry date.');
        }
    }
</script>

@endsection