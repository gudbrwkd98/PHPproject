@extends('layout.dashboard')
@section('title', "Non Formal Education")
@section('content')




<!-- -------------------------  -----------------------  ------------------------- -->
<!-- -------------------------  Datatables table sample  ------------------------- -->
<!-- -------------------------  -----------------------  ------------------------- -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-danger">Non-Formal Education
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
                                		Non-Formal Education Details
                                	</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-borderless" style="font-size: medium;">
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th colspan="1">
                                                Training Program<i style="color: red;">*</i>
                                            </th>
                                            <td colspan="3">
                                                <input type="text" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th colspan="1">
                                                Certificate<i style="color: red;">*</i>
                                            </th>
                                            <td colspan="3">
                                                <input type="text" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th>
                                                Date Start<i style="color: red;">*</i>
                                            </th>
                                            <td>
                                                <input type="date" class="form-control" id="" name="" required="">
                                            </td>
                                            <th>
                                                Date End<i style="color: red;">*</i>
                                            </th>
                                            <td>
                                                <input type="date" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th colspan="1">
                                                Attachment<i style="color: red;">*</i>
                                            </th>
                                            <td colspan="3">
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
        	Non-formal education refers to structured and shorten-term training programs conducted for a particular purpose such as skills development, values orientation, and the like.
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="display table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="16.6%">Program</th>
                        <th width="16.6%">Certificate</th>
                        <th width="16.6%">Duration</th>
                        <th width="16.6%">Upload</th>
                        <th width="16.6%">Narrative Report</th>
                        <th width="16.6%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" style="text-decoration: none;" class="text-danger" title="Click to download the file">
                                **Link to download file
                            </a>
                        </td>
                        <!-- -------------------------  Narrative report buttons  ------------------------- -->
                        <td>  
                            <!-- -------------------------  --------------------------  ------------------------- -->
                            <!-- -------------------------  add Narrative Report modal  ------------------------- -->
                            <!-- -------------------------  --------------------------  ------------------------- -->
                                <!-- add button shows only if narrative report doesnt exist -->
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addNarrModal">
                                    <i class="fas fa-plus"></i>
                                </button>

                                <!-- add narrative report modal -->
                                <div class="modal fade" id="addNarrModal" tabindex="-1" role="dialog" aria-labelledby="addNarrModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                @CSRF
                                                {{method_field('POST')}}    
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNarrModalLabel">
                                                        Create Narrative Report Details
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-borderless">
                                                        <input type="text" id="nonformalID" name="nonformalID" value="nonformalID" required="" hidden>
                                                        <!-- -------------------------  ----------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                What?<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  ----------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                When?<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <input type="date" class="form-control" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  ----------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                Where?<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  ----------------------  ------------------------- -->
                                                        <tr>
                                                            <th colspan="2">
                                                                OVERVIEW:  What have you learned from this training?  How useful is this training to your previous or current job?<i style="color: red;">*</i>
                                                                <textarea rows="3" class="form-control" required=""></textarea>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="" class="btn btn-danger zoom float-right"><i class="far fa-save"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            
                            <!-- -------------------------  ---------------------------  ------------------------- -->
                            <!-- -------------------------  edit Narrative Report modal  ------------------------- -->
                            <!-- -------------------------  ---------------------------  ------------------------- -->
                                <!-- edit button only shows if narrative report already exists -->
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#editNarrModal"><i class="fas fa-edit"></i></button>

                                <!-- edit narrative report Modal -->
                                    <div class="modal fade" id="editNarrModal" tabindex="-1" role="dialog" aria-labelledby="editNarrModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editNarrModalLabel">
                                                        Edit Narrative Report Details
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-borderless">
                                                        <input type="text" id="nonformalID" name="nonformalID" value="nonformalID" required="" hidden>
                                                        <input type="text" id="narrRepID" name="narrRepID" value="narrRepID" required="" hidden>
                                                        <!-- -------------------------  ----------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                What?<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  ----------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                When?<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <input type="date" class="form-control" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  ----------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                Where?<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  ----------------------  ------------------------- -->
                                                        <tr>
                                                            <th colspan="2">
                                                                OVERVIEW:  What have you learned from this training?  How useful is this training to your previous or current job?<i style="color: red;">*</i>
                                                                <textarea rows="3" class="form-control" required=""></textarea>
                                                            </th>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="" class="btn btn-danger zoom float-right"><i class="far fa-save"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            
                            <!-- -------------------------  ---------------------------  ------------------------- -->
                            <!-- -------------------------  view Narrative Report modal  ------------------------- -->
                            <!-- -------------------------  ---------------------------  ------------------------- -->
                            <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#viewNarrModal"><i class="fas fa-eye"></i></button>

                            <!-- Modal -->
                            <div class="modal fade" id="viewNarrModal" tabindex="-1" role="dialog" aria-labelledby="viewNarrModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewNarrModalLabel">
                                                Narrative Report
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-borderless">
                                                <!-- -------------------------  ----------------------  ------------------------- -->
                                                <tr>
                                                    <th>
                                                        What?<i style="color: red;">*</i>
                                                    </th>
                                                    <td>
                                                        <i style="color: red">Lorem Ipsum Dolor</i>
                                                    </td>
                                                </tr>
                                                <!-- -------------------------  ----------------------  ------------------------- -->
                                                <tr>
                                                    <th>
                                                        When?<i style="color: red;">*</i>
                                                    </th>
                                                    <td>
                                                        <i style="color: red">mm/dd/yyyy</i>
                                                    </td>
                                                </tr>
                                                <!-- -------------------------  ----------------------  ------------------------- -->
                                                <tr>
                                                    <th>
                                                        Where?<i style="color: red;">*</i>
                                                    </th>
                                                    <td>
                                                        <i style="color: red">Lorem Ipsum Dolor</i>
                                                    </td>
                                                </tr>
                                                <!-- -------------------------  ----------------------  ------------------------- -->
                                                <tr>
                                                    <td colspan="2">
                                                        <h6><strong>OVERVIEW:  What have you learned from this training?  How useful is this training to your previous or current job?<i style="color: red;">*</i></strong></h6>
                                                        <p style="color: red; text-indent: 50px; text-align: justify;">
                                                            Lorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum DolorLorem Ipsum Dolor
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                    	Non-Formal Education Details
                                                	</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-borderless" style="font-size: medium;">
				                                        <!-- -------------------------  -------------------------  ------------------------- -->
				                                        <tr>
				                                            <th colspan="1">
				                                                Training Program<i style="color: red;">*</i>
				                                            </th>
				                                            <td colspan="3">
				                                                <input type="text" class="form-control" id="" name="" required="">
				                                            </td>
				                                        </tr>
				                                        <!-- -------------------------  -------------------------  ------------------------- -->
				                                        <tr>
				                                            <th colspan="1">
				                                                Certificate<i style="color: red;">*</i>
				                                            </th>
				                                            <td colspan="3">
				                                                <input type="text" class="form-control" id="" name="" required="">
				                                            </td>
				                                        </tr>
				                                        <!-- -------------------------  -------------------------  ------------------------- -->
				                                        <tr>
				                                            <th>
				                                                Date Start<i style="color: red;">*</i>
				                                            </th>
				                                            <td>
				                                                <input type="date" class="form-control" id="" name="" required="">
				                                            </td>
				                                            <th>
				                                                Date End<i style="color: red;">*</i>
				                                            </th>
				                                            <td>
				                                                <input type="date" class="form-control" id="" name="" required="">
				                                            </td>
				                                        </tr>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        <tr>
                                                            <th colspan="1">
                                                                Attachment<i style="color: red;">*</i>
                                                            </th>
                                                            <td colspan="3">
                                                                <input type="file" id="" name="" required="" title="PDF files only">
                                                                <br>
                                                                <i style="color: red; font-size: x-small;">*filename of existing file</i>
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