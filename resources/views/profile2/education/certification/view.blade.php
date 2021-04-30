@extends('layout.dashboard')
@section('title', "Certification Examinations")
@section('content-title')
@endsection
@section('content')




<!-- -------------------------  -----------------------  ------------------------- -->
<!-- -------------------------  Datatables table sample  ------------------------- -->
<!-- -------------------------  -----------------------  ------------------------- -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-danger">
            Certification Examinations
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus"></i>
            </button>

            <!-- -------------------------  add modal  ------------------------- -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form method="POST" action="" enctype="multipart/form-data">
                                @CSRF
                                {{method_field('POST')}}    
                                @method('POST')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addModalLabel">
                                        Certification Examination Details
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-borderless" style="font-size: medium;">
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th width="30%">
                                                Title of Certification<i style="color: red;">*</i>
                                            </th>
                                            <td width="70%">
                                                <input type="text" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th>
                                                Name of Certifying Agency<i style="color: red;">*</i>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th>
                                                Address of Certifying Agency<i style="color: red;">*</i>
                                            </th>
                                            <td>
                                                <textarea rows="2" class="form-control" id="" name="" required=""></textarea>
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th>
                                                Date Certified<i style="color: red;">*</i>
                                            </th>
                                            <td>
                                                <input type="date" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th>
                                                Rating<i style="color: red;">*</i>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th>
                                                Attachment<i style="color: red;">*</i>
                                            </th>
                                            <td>
                                                <input type="file" id="" name="" required="" title="PDF files only">
                                                <br>
                                                <i style="color: red; font-size: x-small;">*Softcopy of corresponding certificate</i>
                                            </td>
                                        </tr>
                                    </table>        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger zoom"><i class="far fa-save"></i></button>
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
            <table class="display table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Certificate</th>
                        <th>Uploads</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td></td>
                        <td>
                            <a href="" style="text-decoration: none;" class="text-danger" title="Click to download the file">
                                **Link to download file
                            </a>
                        </td>
                        <td>
                            <!-- -------------------------  edit button and modal  ------------------------- -->
                            <button class="btn btn-danger zoom" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button>

                                <!-- Modal -->
                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel" style="color: red">
                                                        Certification Examination Details
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-borderless" style="font-size: medium;">
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        <tr>
                                                            <th width="30%">
                                                                Title of Certification<i style="color: red;">*</i>
                                                            </th>
                                                            <td width="70%">
                                                                <input type="text" class="form-control" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                Name of Certifying Agency<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                Address of Certifying Agency<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <textarea rows="2" class="form-control" id="" name="" required=""></textarea>
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                Date Certified<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <input type="date" class="form-control" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                Rating<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                Attachment<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <input type="file" id="" name="" required="" title="PDF files only">
                                                                <br>
                                                                <i style="color: red; font-size: x-small;">*Softcopy of corresponding certificate</i>
                                                            </td>
                                                        </tr>
                                                    </table>        
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger zoom"><i class="far fa-save"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            
                            <!-- -------------------------  -------------------------  ------------------------- -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-light zoom" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-eye"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="color: red;">
                                                Certification Examination Details
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-borderless">
                                                <!-- -------------------------  -------------------------  ------------------------- -->
                                                <tr>
                                                    <th width="30%">
                                                        Title of Certification<i style="color: red;">*</i>
                                                    </th>
                                                    <td width="70%">
                                                        <i style="color: red;">Sample title</i>
                                                    </td>
                                                </tr>
                                                <!-- -------------------------  -------------------------  ------------------------- -->
                                                <tr>
                                                    <th>
                                                        Name of Certifying Agency<i style="color: red;">*</i>
                                                    </th>
                                                    <td>
                                                        <i style="color: red;">Sample agency name</i>
                                                    </td>
                                                </tr>
                                                <!-- -------------------------  -------------------------  ------------------------- -->
                                                <tr>
                                                    <th>
                                                        Address of Certifying Agency<i style="color: red;">*</i>
                                                    </th>
                                                    <td>
                                                        <i style="color: red;">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                        </i>
                                                    </td>
                                                </tr>
                                                <!-- -------------------------  -------------------------  ------------------------- -->
                                                <tr>
                                                    <th>
                                                        Date Certified<i style="color: red;">*</i>
                                                    </th>
                                                    <td>
                                                        <i style="color: red;">dd/mm/yyyy</i>
                                                    </td>
                                                </tr>
                                                <!-- -------------------------  -------------------------  ------------------------- -->
                                                <tr>
                                                    <th>
                                                        Rating<i style="color: red;">*</i>
                                                    </th>
                                                    <td>
                                                        <i style="color: red;">lorem ipsum</i>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- -------------------------  Delete button  ------------------------- -->
                            <button class="btn btn-secondary zoom"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection