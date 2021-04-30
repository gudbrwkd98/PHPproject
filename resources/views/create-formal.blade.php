@extends('layout.dashboard')
@section('title', "Work Experience Details")
@section('content-title')
Work Experience Details
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
<form method="POST"  action="" enctype="multipart/form-data">
    @CSRF
    {{method_field('POST')}}    
    @method('POST')
    <table class="table table-borderless">
        <!-- --------------------  --------------------  -------------------- -->
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
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th>
                Date Start <span style="color: red">*</span>
            </th>
            <td>
                <input type="date" style="color: black;" class="form-control" id="startYear" name="startYear" required="">
            </td>
            <th>
                Date End <span style="color: red">*</span>
            </th>
            <td>
                <input type="date" style="color: black;" class="form-control" id="endYear" name="endYear" required="">
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
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
        <!-- --------------------  --------------------  -------------------- -->
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
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th>
                Reason(s) for moving on to the next job <span style="color: red">*</span>
            </th>
            <td>
                <textarea rows="3" style="color: black;" class="form-control" id="reason" name="reason" required=""></textarea>
            </td>
            <th>
                Describe actual functions and responsibilities in position occupied <span style="color: red">*</span>
            </th>
            <td>
                <textarea rows="3" style="color: black;" class="form-control" id="functions" name="functions" required=""></textarea>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th>
                Certificate of Employment <span style="color: red">*</span>
            </th>
            <td >
                <input type="file" id="file" name="file" title="PDF files only" required="">
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
                        <th>Name <span style="color: red">*</span></th>
                        <th>Position <span style="color: red">*</span></th>
                        <th>Contact # <span style="color: red">*</span></th>
                        <th>Email <span style="color: red">*</span></th>
                    </tr>
                </thead>
                <!-- --------------------  tbody  -------------------- -->
                <tbody>
                    <!-- --------------------  --------------------  -------------------- -->
                    <tr>
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="ref1" name="ref1" pattern="[A-Za-z\s]+" title="Must use letters only" required="">
                        </td>
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="position1" name="position1" pattern="[A-Za-z\s]+" title="Must use letters only" required="">
                        </td>
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="contact1" name="contact1" pattern="[0-9]+" title="Must be numeric" required="">
                        </td>
                        <td>
                            <input type="email" style="color: black;" class="form-control" id="email1" name="email1" required="">
                        </td>
                    </tr>
                    <!-- --------------------  --------------------  -------------------- -->
                    <tr>
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="ref2" name="ref2" pattern="[A-Za-z\s]+" title="Must use letters only" required="">
                        </td>
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="position2" name="position2" pattern="[A-Za-z\s]+" title="Must use letters only" required="">
                        </td>
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="contact2" name="contact2" pattern="[0-9]+" title="Must be numeric" required="">
                        </td>
                        <td>
                            <input type="email" style="color: black;" class="form-control" id="email2" name="email2" required="">
                        </td>
                    </tr>
                    <!-- --------------------  --------------------  -------------------- -->
                    <tr>
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="ref3" name="ref3" pattern="[A-Za-z\s]+" title="Must use letters only" equired="">
                        </td>
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="position3" name="position3" pattern="[A-Za-z\s]+" title="Must use letters only" required="">
                        </td>
                        <td>
                            <input type="text" style="color: black;" class="form-control" id="contact3" name="contact3" pattern="[0-9]+" title="Must be numeric" required="">
                        </td>
                        <td>
                            <input type="email" style="color: black;" class="form-control" id="email3" name="email3" required="">
                        </td>
                    </tr>
                </tbody>
            </table>
        </tr>

        <!--  -->
        <tr>
            <td colspan="4">
                <button type="submit" class="btn btn-danger zoom float-right"><i class="far fa-save"></i></button>
                <a href="">
                    <button class="btn btn-secondary zoom float-right mr-1"><i class="fas fa-backward"></i></button>    
                </a>
            </td>
        </tr>
    </table>
</form>

@endsection