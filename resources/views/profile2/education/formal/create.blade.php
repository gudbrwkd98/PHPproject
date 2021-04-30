@extends('layout.dashboard')
@section('title', "Formal Education")
@section('content-title')
Formal Education Details
@endsection
@section('content')
<div class="col-10">
    <form method="POST" action="" enctype="multipart/form-data">
        @CSRF
        {{method_field('POST')}}    
        @method('POST')
        <table class="table table-borderless" style="font-size: medium">
            <!-- --------------------  --------------------  -------------------- -->
            <tr>
                <th>
                    School Name <span class="text-danger">*</span>
                </th>
                <td>
                    <input type="text" class="form-control" id="" name="" required="">
                </td>
            </tr>
            <!-- --------------------  --------------------  -------------------- -->
            <tr>
                <th>
                    School Address <span class="text-danger">*</span>
                </th>
                <td>
                    <input type="text" class="form-control" id="" name="" required="">
                </td>
            </tr>
            <!-- --------------------  --------------------  -------------------- -->
            <tr>
                <th>
                    Start Year <span class="text-danger">*</span>
                </th>
                <td>
                    <input type="date" class="form-control" id="" name="" required="">
                </td>
            </tr>
            <!-- --------------------  --------------------  -------------------- -->
            <tr>
                <th>
                    End Year <span class="text-danger">*</span>
                </th>
                <td>
                    <input type="date" class="form-control" id="" name="" required="">
                </td>
            </tr>
            <!-- --------------------  --------------------  -------------------- -->
            <tr>
                <th>
                    Degree <span class="text-danger">*</span>
                </th>
                <td>
                    <input type="text" class="form-control" id="" name="" required="">
                </td>
            </tr>
            <!-- --------------------  --------------------  -------------------- -->
            <tr>
                <th>
                    Transcript of Record <span class="text-danger">*</span>
                </th>
                <td>
                    <input type="file" id="" name="" required="">
                </td>
            </tr>
            <!-- --------------------  --------------------  -------------------- -->
            <tr>
                <td></td>
                <td>
                    <button type="button" class="btn btn-danger zoom float-right"><i class="far fa-save"></i></button>
                    <a href="">
                        <button class="btn btn-secondary zoom float-right mr-1"><i class="fas fa-backward"></i></button>    
                    </a>
                </td>
            </tr>
        </table>
    </form>
</div>

@endsection

