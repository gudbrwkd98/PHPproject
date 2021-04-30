@extends('layout.dashboard')
@section('title', "Work Experience")
@section('content-title')
@endsection
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-danger">
                Work Experience
                <a href="work-form">
                    <button type="button" class="btn btn-danger zoom">
                        <i class="fas fa-plus"></i>
                    </button>
                </a>
            </h3>
            <p style="text-indent: 50px;" class="mb-0">
            </p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display " id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th>Company</th>
                            <th>Duration</th>
                            <th>Cetificate of Employment</th>
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
                            <!-- -------------------------  add modal  ------------------------- -->
                                <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addModal">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                @CSRF
                                                {{method_field('POST')}}    
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addModalLabel">
                                                        Add Title
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


                            <!-- -------------------------  edit button and modal  ------------------------- -->
                            <button class="btn btn-danger zoom" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button>
                                <!-- Modal -->
                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel" style="color: red">
                                                        Edit Title
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
                            
                            </td>
                            <td>
                                <a href="work-form"><button class="btn btn-light zoom"><i class="fas fa-eye"></i></button></a>
                                <a href="work/edit"><button class="btn btn-danger zoom"><i class="fas fa-edit"></i></button></a>
                                <button class="btn btn-secondary zoom"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection