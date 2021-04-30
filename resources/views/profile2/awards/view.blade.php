@extends('layout.dashboard')
@section('title', "Awards")
@section('content-title')   
@endsection
@section('content')



<!-- -------------------------  -----------------------  ------------------------- -->
<!-- -------------------------  Datatables table sample  ------------------------- -->
<!-- -------------------------  -----------------------  ------------------------- -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-danger">
            Awards
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
                                        Award Details
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-borderless" style="font-size: medium;">
                                        <!-- --------------------  --------------------  -------------------- -->
                                        <tr>
                                            <th>
                                                Type <span style="color: red;">*</span>
                                            </th>
                                            <td>
                                                <select class="form-control" id="" name="" required="">
                                                    <option value="" disabled="" selected=""></option>
                                                    <option value="Academic">Academic</option>
                                                    <option value="Community">Community</option>
                                                    <option value="Civic">Civic</option>
                                                    <option value="Work">Work</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <!-- --------------------  --------------------  -------------------- -->
                                        <tr>
                                            <th>
                                                Award Title <span style="color: red;">*</span>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- --------------------  --------------------  -------------------- -->
                                        <tr>
                                            <th>
                                                Conferring Organization's Name <span style="color: red;">*</span>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- --------------------  --------------------  -------------------- -->
                                        <tr>
                                            <th>
                                                Conferring Organization's Address <span style="color: red;">*</span>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- --------------------  --------------------  -------------------- -->
                                        <tr>
                                            <th>
                                                Date Received <span style="color: red;">*</span>
                                            </th>
                                            <td>
                                                <input type="date" class="form-control" id="" name="" required="">
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
            In this section, please describe all the awards you have received from schools, community and civic organizations, as well as citations for work excellence, outstanding accomplishments, community service, etc.
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="display table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Award Title</th>
                        <th>Conferring Organization</th>
                        <th>Date Received</th>
                        <th>Attachment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            Name <br>Address
                        </td>
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
                                                        Award Details
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-borderless" style="font-size: medium;">
                                                        <!-- --------------------  --------------------  -------------------- -->
                                                        <tr>
                                                            <th>
                                                                Type <span style="color: red;">*</span>
                                                            </th>
                                                            <td>
                                                                <select class="form-control" style="color: black;" id="" name="" required="">
                                                                    <option value="Academic">Academic</option>
                                                                    <option value="Community">Community</option>
                                                                    <option value="Civic">Civic</option>
                                                                    <option value="Work">Work</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <!-- --------------------  --------------------  -------------------- -->
                                                        <tr>
                                                            <th>
                                                                Award Title <span style="color: red;">*</span>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" style="color: black;" value="afsdnb " id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- --------------------  --------------------  -------------------- -->
                                                        <tr>
                                                            <th>
                                                                Award Giving Body's Name <span style="color: red;">*</span>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" style="color: black;" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- --------------------  --------------------  -------------------- -->
                                                        <tr>
                                                            <th>
                                                                Award Giving Body's Address <span style="color: red;">*</span>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" style="color: black;" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- --------------------  --------------------  -------------------- -->
                                                        <tr>
                                                            <th>
                                                                Date Received <span style="color: red;">*</span>
                                                            </th>
                                                            <td>
                                                                <input type="date" class="form-control" style="color: black;" id="" name="" required="">
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