@extends('layout.dashboard')
@section('title', "Welcome")
@section('content-title')
@endsection
@section('content')

<!-- --------------------  --------------------  -------------------- -->
<div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <!-- --------------------  --------------------  -------------------- -->
            <a class="nav-link active" id="v-pills-hobbies-tab" data-toggle="pill" href="#v-pills-hobbies" role="tab" aria-controls="v-pills-hobbies" aria-selected="true">Hobbies</a>
            <!-- --------------------  --------------------  -------------------- -->
            <a class="nav-link" id="v-pills-skills-tab" data-toggle="pill" href="#v-pills-skills" role="tab" aria-controls="v-pills-skills" aria-selected="false">Special Skills</a>
            <!-- --------------------  --------------------  -------------------- -->
            <a class="nav-link" id="v-pills-travels-tab" data-toggle="pill" href="#v-pills-travels" role="tab" aria-controls="v-pills-travels" aria-selected="false">Travels</a>
            <!-- --------------------  --------------------  -------------------- -->
            <a class="nav-link" id="v-pills-volunteer-tab" data-toggle="pill" href="#v-pills-volunteer" role="tab" aria-controls="v-pills-volunteer" aria-selected="false">Volunteer</a>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
            <!-- --------------------  hobbies portion  -------------------- -->
            <div class="tab-pane fade show active" id="v-pills-hobbies" role="tabpanel" aria-labelledby="v-pills-hobbies-tab">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-danger">
                            Hobbies
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addHobbyModal">
                                <i class="fas fa-plus"></i>
                            </button>

                            <!-- -------------------------  add hobby modal  ------------------------- -->
                                <div class="modal fade" id="addHobbyModal" tabindex="-1" role="dialog" aria-labelledby="addHobbyModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                @CSRF
                                                {{method_field('POST')}}    
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addHobbyModalLabel">Add Title</h5>
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
                            <table class="table table-bordered display" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>col1</th>
                                        <th>col2</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <!-- -------------------------  edit hobby button and modal  ------------------------- -->
                                            <button class="btn btn-danger zoom" data-toggle="modal" data-target="#editHobbyModal"><i class="fas fa-edit"></i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editHobbyModal" tabindex="-1" role="dialog" aria-labelledby="editHobbyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST" action="" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editHobbyModalLabel" style="color: red">Edit Title</h5>
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
                                            
                                            <!-- -------------------------  Delete button  ------------------------- -->
                                            <button class="btn btn-secondary zoom"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- --------------------  special skills portion  -------------------- -->
            <div class="tab-pane fade" id="v-pills-skills" role="tabpanel" aria-labelledby="v-pills-skills-tab">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-danger">
                            Special Skills
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addSkillModal">
                                <i class="fas fa-plus"></i>
                            </button>

                            <!-- -------------------------  add modal  ------------------------- -->
                                <div class="modal fade" id="addSkillModal" tabindex="-1" role="dialog" aria-labelledby="addSkillModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                @CSRF
                                                {{method_field('POST')}}    
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addSkillModalLabel">Add Title</h5>
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
                            <table class="table table-bordered display" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>col1</th>
                                        <th>col2</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <!-- -------------------------  edit button and modal  ------------------------- -->
                                            <button class="btn btn-danger zoom" data-toggle="modal" data-target="#editSkillsModal"><i class="fas fa-edit"></i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editSkillsModal" tabindex="-1" role="dialog" aria-labelledby="editSkillsModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST" action="" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editSkillsModalLabel" style="color: red">Edit Title</h5>
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
                                            
                                            <!-- -------------------------  Delete button  ------------------------- -->
                                            <button class="btn btn-secondary zoom"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- --------------------  travels portion  -------------------- -->
            <div class="tab-pane fade" id="v-pills-travels" role="tabpanel" aria-labelledby="v-pills-travels-tab">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-danger">
                            Travels
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addTravelModal">
                                <i class="fas fa-plus"></i>
                            </button>

                            <!-- -------------------------  add modal  ------------------------- -->
                                <div class="modal fade" id="addTravelModal" tabindex="-1" role="dialog" aria-labelledby="addTravelModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                @CSRF
                                                {{method_field('POST')}}    
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addTravelModalLabel">Add Title</h5>
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
                            <table class="display table table-bordered " id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>col1</th>
                                        <th>col2</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <!-- -------------------------  edit button and modal  ------------------------- -->
                                            <button class="btn btn-danger zoom" data-toggle="modal" data-target="#editTravelModal"><i class="fas fa-edit"></i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editTravelModal" tabindex="-1" role="dialog" aria-labelledby="editTravelModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST" action="" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editTravelModalLabel" style="color: red">Edit Title</h5>
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
                                            
                                            <!-- -------------------------  Delete button  ------------------------- -->
                                            <button class="btn btn-secondary zoom"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- --------------------  volunteer portion  -------------------- -->
            <div class="tab-pane fade" id="v-pills-volunteer" role="tabpanel" aria-labelledby="v-pills-volunteer-tab">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-danger">Volunteer
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addVolunteerModal">
                                <i class="fas fa-plus"></i>
                            </button>

                            <!-- -------------------------  add modal  ------------------------- -->
                                <div class="modal fade" id="addVolunteerModal" tabindex="-1" role="dialog" aria-labelledby="addVolunteerModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                @CSRF
                                                {{method_field('POST')}}    
                                                @method('POST')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addVolunteerModalLabel">Add Title</h5>
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
                            <table class="table table-bordered display" id="" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>col1</th>
                                        <th>col2</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <!-- -------------------------  edit button and modal  ------------------------- -->
                                            <button class="btn btn-danger zoom" data-toggle="modal" data-target="#editVolunteerModal"><i class="fas fa-edit"></i></button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editVolunteerModal" tabindex="-1" role="dialog" aria-labelledby="editVolunteerModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST" action="" enctype="multipart/form-data">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editVolunteerModalLabel" style="color: red">Edit Title</h5>
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
                                            
                                            <!-- -------------------------  Delete button  ------------------------- -->
                                            <button class="btn btn-secondary zoom"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
