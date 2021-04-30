@extends('layout.dashboard')
@section('title', "Remarks")
@section('content-title')
@endsection
@section('content')
<!-- -------------------------  -----------------------  ------------------------- -->
<!-- -------------------------  Datatables table sample  ------------------------- -->
<!-- -------------------------  -----------------------  ------------------------- -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-danger">
            Remarks
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
                                    <h5 class="modal-title" id="addModalLabel">Add Title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-borderless" style="font-size: medium;">
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th width="30%">
                                                Input 1<i style="color: red;">*</i>
                                            </th>
                                            <td width="70%">
                                                <input type="text" class="form-control" id="" name="" required="">
                                            </td>
                                        </tr>
                                        <!-- -------------------------  -------------------------  ------------------------- -->
                                        <tr>
                                            <th>
                                                input 2<i style="color: red;">*</i>
                                            </th>
                                            <td>
                                                <input type="text" class="form-control" id="" name="" required="">
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
                        <th>Location</th>
                        <th>Stage</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Remarks</th>
                        <th>Attachment</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- -------------------------  flow example 1  ------------------------- -->
                        <tr>
                            <td>
                                Applicant
                            </td>
                            <td>
                                Submitted
                            </td>
                            <td>
                                ---
                            </td>
                            <td>
                                December 7, 2019
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    <!-- -------------------------  Flow example 2  ------------------------- -->
                        <tr>
                            <td>
                                ETEEAP
                            </td>
                            <td>
                                Initial Screening
                            </td>
                            <td>
                                Received
                            </td>
                            <td>
                                December 8, 2019
                            </td>
                            <td>
                                submit PSA Birth Certificate
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    <!-- -------------------------  Flow example  ------------------------- -->
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection