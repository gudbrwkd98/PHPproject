@extends('layout.dashboard')
@section('title', "Work Experience Details")
@section('content-title')
    Work Experience Details
@endsection
@section('content')
<form method="POST" action="" enctype="multipart/form-data">
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
                <input type="text" class="form-control" id="" name="" required="">
            </td>
            <th  width="20%">
                Terms / Status of Employment <span style="color: red">*</span>
            </th>
            <td  width="30%">
                <input type="text" class="form-control" id="" name="" required="">
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th>
                Date Start <span style="color: red">*</span>
            </th>
            <td>
                <input type="date" class="form-control" id="" name="" required="">
            </td>
            <th>
                Date End <span style="color: red">*</span>
            </th>
            <td>
                <input type="date" class="form-control" id="" name="" required="">
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th>
                Company Name <span style="color: red">*</span>
            </th>
            <td>
                <input type="text" class="form-control" id="" name="" required="">
            </td>
            <th>
                Company Address <span style="color: red">*</span>
            </th>
            <td>
                <textarea rows="2" class="form-control" id="" name="" required=""></textarea>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th>
                Supervisor's Name<span style="color: red">*</span>
            </th>
            <td>
                <input type="text" class="form-control" id="" name="" required="">
            </td>
            <th>
                Supervisor's Designation<span style="color: red">*</span>
            </th>
            <td>
                <input type="text" class="form-control" id="" name="" required="">
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th>
                Reason(s) for moving on to the next job <span style="color: red">*</span>
            </th>
            <td>
                <textarea rows="3" class="form-control" id="" name="" required=""></textarea>
            </td>
            <th>
                Describe actual functions and responsibilities in position occupied <span style="color: red">*</span>
            </th>
            <td>
                <textarea rows="3" class="form-control" id="" name="" required=""></textarea>
            </td>
        </tr>
        <!-- --------------------  --------------------  -------------------- -->
        <tr>
            <th>
                Certificate of Employment (optional)
            </th>
            <td >
                <input type="file" id="" name="" title="PDF files only">
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
                                <input type="text" class="form-control" id="" name="" required="">
                            </td>
                            <td>
                                <input type="text" class="form-control" id="" name="" required="">
                            </td>
                            <td>
                                <input type="text" class="form-control" id="" name="" required="">
                            </td>
                            <td>
                                <input type="text" class="form-control" id="" name="" required="">
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <td>
                                <input type="text" class="form-control" id="" name="" required="">
                            </td>
                            <td>
                                <input type="text" class="form-control" id="" name="" required="">
                            </td>
                            <td>
                                <input type="text" class="form-control" id="" name="" required="">
                            </td>
                            <td>
                                <input type="text" class="form-control" id="" name="" required="">
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <td>
                                <input type="text" class="form-control" id="" name="" required="">
                            </td>
                            <td>
                                <input type="text" class="form-control" id="" name="" required="">
                            </td>
                            <td>
                                <input type="text" class="form-control" id="" name="" required="">
                            </td>
                            <td>
                                <input type="text" class="form-control" id="" name="" required="">
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