@extends('layout.dashboard')
@section('title', "Formal Education")
@section('content-title')
@endsection
@section('content')




<!-- -------------------------  -----------------------  ------------------------- -->
<!-- -------------------------  Datatables table sample  ------------------------- -->
<!-- -------------------------  -----------------------  ------------------------- -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-danger">Formal Education
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
                                        Formal Education Details
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-borderless" style="font-size: medium;">
                                    
                                        <!-- --------------------  school level  -------------------- -->
                                        <tr>
                                            <th>
                                                School Level<span class="text-danger">*</span>
                                            </th>
                                            <td>
                                                <select class="form-control" id="" name="" required="">
                                                    <option value="" disabled="" selected=""></option>
                                                    <option value="Elementary Level">Elementary Level</option>
                                                    <option value="Secondary Level">Secondary Level</option>
                                                    <option value="Tertiary Level">Tertiary Level</option>
                                                    <option value="Graduate Level">Graduate Level</option>
                                                </select>
                                            </td>
                                        </tr>

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
                                                Degree
                                            </th>
                                            <td>
                                                <input type="text" class="form-control" id="" name="">
                                            </td>
                                        </tr>

                                        <!-- --------------------  --------------------  -------------------- -->
                                        <tr>
                                            <th>
                                                Uploads<span class="text-danger">*</span>
                                            </th>
                                            <td>
                                                <input type="file" id="" name="" required="" title="PDF files only">
                                                <br>
                                                <i style="font-size: x-small; color: red;">e.g. Transcript of Records, Report Card, etc.</i>
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
                        <th width="14.3%">School Level</th>
                        <th width="14.3%">School</th>
                        <th width="14.3%">Duration</th>
                        <th width="14.3%">Degree</th>
                        <th width="14.3%">Upload</th>
                        <th width="14.3%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td></td>
                        <td>
                            Name
                            <br>
                            Address
                        </td>
                        <td></td>
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
                                                    <h5 class="modal-title" id="editModalLabel" style="color: red">Formal Education Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-borderless" style="font-size: medium;">
                                    
                                                        <!-- --------------------  school level  -------------------- -->
                                                        <tr>
                                                            <th>
                                                                School Level<span class="text-danger">*</span>
                                                            </th>
                                                            <td>
                                                                <select class="form-control" id="" name="" required="">
                                                                    <option value="Elementary Level">Elementary Level</option>
                                                                    <option value="Secondary Level">Secondary Level</option>
                                                                    <option value="Tertiary Level">Tertiary Level</option>
                                                                    <option value="Graduate Level">Graduate Level</option>
                                                                </select>
                                                            </td>
                                                        </tr>

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
                                                                Degree
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" id="" name="">
                                                            </td>
                                                        </tr>

                                                        <!-- --------------------  --------------------  -------------------- -->
                                                        <tr>
                                                            <th>
                                                                Uploads<span class="text-danger">*</span>
                                                            </th>
                                                            <td>
                                                                <input type="file" id="" name="" required="" title="PDF files only">
                                                                <br>
                                                                <i style="font-size: x-small; color: red;">e.g. Transcript of Records</i>
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

