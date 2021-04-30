@extends('layout.dashboard')
@section('title', "Creative Works")
@section('content')





<!-- -------------------------  -----------------------  ------------------------- -->
<!-- -------------------------  Datatables table sample  ------------------------- -->
<!-- -------------------------  -----------------------  ------------------------- -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-danger">
            Creative Works
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
                                        Creative Works Details
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
                                                Title<i style="color: red;">*</i>
                                            </th>
                                            <td width="70%">
                                                <input type="text" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th width="30%">
                                                Description<i style="color: red;">*</i>
                                            </th>
                                            <td width="70%">
                                                <textarea rows="3" class="form-control" required=""></textarea>
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th>
                                                Date Accomplished<i style="color: red;">*</i>
                                            </th>
                                            <td>
                                                <input type="date" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th>
                                                Publishing Agency / Sponsoring Institution<i style="color: red;">*</i>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th>
                                                Address of Agency / Institution<i style="color: red;">*</i>
                                            </th>
                                            <td>
                                                <textarea rows="3" class="form-control" required=""></textarea>
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
            In this section, enumerate the various creative works you have accomplished and other special accomplishments. Examples of these are interventions, published and unpublished literary fiction and non-fiction, writings, musical work, products of visual performing arts, exceptional accomplishments in sports, social, cultural and leisure activities, etc. which can lead one to conclude the level of expertise you have obtained on certain fields of interest. Include also participation in competitions and prizes obtained.
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="display table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="16.5%">Title</th>
                        <th width="16.5%">Description</th>
                        <th width="16.5%">Date Accomplished</th>
                        <th width="16.5%">Publishing Agency / Sponsoring Institution</th>
                        <th width="16.5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            Name
                            <br>
                            Address
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
                                                        Creative Work Details
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
                                                                Title<i style="color: red;">*</i>
                                                            </th>
                                                            <td width="70%">
                                                                <input type="text" class="form-control" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        <tr>
                                                            <th width="30%">
                                                                Description<i style="color: red;">*</i>
                                                            </th>
                                                            <td width="70%">
                                                                <textarea rows="3" class="form-control" required=""></textarea>
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                Date Accomplished<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <input type="date" class="form-control" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                Publishing Agency<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" id="" name="" required="">
                                                            </td>
                                                        </tr>
                                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                                        <tr>
                                                            <th>
                                                                Address of Publishing Agency<i style="color: red;">*</i>
                                                            </th>
                                                            <td>
                                                                <textarea rows="3" class="form-control" required=""></textarea>
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