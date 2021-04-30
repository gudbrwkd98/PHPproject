@extends('layout.dashboard')
@section('title', "Schools")
@section('content')
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ alert for changes ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif


<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ?? unknown ?? ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<!-- -------------------------  Table  ------------------------- -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-danger">
            Schools
            
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus"></i>
            </button>

            <!-- add Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="font-size: medium;">
                        <form method="POST"  action="{{ route('admin.addOffice',$user = auth()->id()) }}" enctype="multipart/form-data">
                            @CSRF
                            {{method_field('POST')}}    
                            @method('POST')
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white" id="addModalLabel">
                                    <i class="fas fa-building"></i> School Details
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-white">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-borderless">
                                    <!-- --------------------  --------------------  -------------------- -->
                                    <tr>
                                        <th>
                                            School Name<span class="text-danger">*</span>
                                        </th>
                                        <td>
                                <input style="color: black;" type="text" name="office" id="office" class="form-control" required="">
                                         
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger zoom"><i class="fas fa-save"></i></button>
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
        <table class="table table-bordered display" width="100%" cellspacing="0" id="dataTable">
            <thead>
                <tr>
                    <th>Schools</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>     
                <!-- -------------------------  -------------------------  ------------------------- -->
                @foreach($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>

                        <!-- Button trigger modal -->
                        <button class="btn btn-danger zoom" data-id="{{$role->id}}" id="edit"><i class="fas fa-edit"></i></button>    
                        <button class="btn btn-secondary zoom" data-id="{{$role->id}}" id="delete"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="font-size: medium;">
            <form method="POST"  action="{{ route('admin.updateOffice',$user = auth()->id()) }}" enctype="multipart/form-data">
                @CSRF
                {{method_field('POST')}}    
                @method('POST')
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="editModalLabel">
                        <i class="fas fa-building"></i> School Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="id2" id="id2" required hidden >

                    <table class="table table-borderless">
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                School Name<span class="text-danger">*</span>
                            </th>
                            <td>
                                <input style="color: black;" type="text" name="courseCodex" id="courseCodex" class="form-control" required="" hidden>
                         
                                <input style="color: black;" type="text" name="office2" id="office2" class="form-control" required="" >
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger zoom"><i class="fas fa-save"></i></button>
            </div>
        </form>
    </div>
</div>
</div>

<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ delete modal ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="deleteModalLabel">Delete?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>

            <div class="modal-body">
                <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete this item?</h5>
            </div>

            <div class="modal-footer">
                <form action="{{ route('admin.deleteOffice',$app=Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="text" name="id3" id="id3" required hidden>
                    <input type="text" name="office3" id="office3" required hidden>


                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(function () {
        var data = {
            "_token": $('#token').val()
        };

        $(document).ready(function() {
            var table = $('#dataTable').DataTable();
        });

        $('#dataTable').on('click', '#edit', function () {

            var id = $(this).attr('data-id');
            $.get("/office/editoffice"+id, function (data) {
                $('#editModal').modal('show');
                $('input[id=id2]').val(data.id);
                $('input[id=office2]').val(data.name);  
                $('input[id=courseCodex]').val(data.name);                

        



                $('#modalHeading').html("Edit Certificates");
            });
        });

        $('#dataTable').on('click', '#delete', function () {

            var id = $(this).attr('data-id');
            $.get("/office/editoffice"+id, function (data) {
                $('#deleteModal').modal('show');
                $('input[id=id3]').val(data.id);
                $('input[id=office3]').val(data.name);

                $('#modalHeading').html("Edit Certificates");
            });
        });




    });
</script>
@endsection