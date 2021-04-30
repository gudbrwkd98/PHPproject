@extends('layout.dashboard')
@section('title', "Travels")
@section('content')



<!-- -------------------------  -----------------------  ------------------------- -->
<!-- -------------------------  Datatables table sample  ------------------------- -->
<!-- -------------------------  -----------------------  ------------------------- -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-danger">
            Travels
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus"></i>
            </button>

            <!-- -------------------------  add modal  ------------------------- -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="POST" action="" enctype="multipart/form-data">
                                @CSRF
                                {{method_field('POST')}}    
                                @method('POST')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addModalLabel">
                                        Travel Information
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
												Location<i style="color: red;">*</i>
											</th>
											<td width="70%">
												<input type="text" class="form-control" id="" name="" required="">
											</td>
										</tr>
										<!-- -------------------------  -------------------------  ------------------------- -->
										<tr>
											<th>
												Purpose<i style="color: red;">*</i>
											</th>
											<td>
												<input type="text" class="form-control" id="" name="" required="">
											</td>
										</tr>
										<!-- -------------------------  -------------------------  ------------------------- -->
										<tr>
											<th>
												Learning Experience<i style="color: red;">*</i>
											</th>
											<td>
												<textarea  class="form-control" rows="3" required=""></textarea>
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
        	Include a write-up of the nature of travel undertaken, whether for leisure, employment, business or other purposes. State in clear terms what new learning experience was obtained from these travels and how it helped you become a better person.
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="display table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
	                    <th>Location</th>
	                    <th>Purpose</th>
	                    <th>Experience</th>
	                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <!-- -------------------------  edit button and modal  ------------------------- -->
                            <button class="btn btn-danger zoom" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button>
                                <!-- Modal -->
                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel" style="color: red">
                                                        Travel Information
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
																Location<i style="color: red;">*</i>
															</th>
															<td width="70%">
																<input type="text" class="form-control" id="" name="" required="">
															</td>
														</tr>
														<!-- -------------------------  -------------------------  ------------------------- -->
														<tr>
															<th>
																Purpose<i style="color: red;">*</i>
															</th>
															<td>
																<input type="text" class="form-control" id="" name="" required="">
															</td>
														</tr>
														<!-- -------------------------  -------------------------  ------------------------- -->
														<tr>
															<th>
																Learning Experience<i style="color: red;">*</i>
															</th>
															<td>
																<textarea  class="form-control" rows="3" required=""></textarea>
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