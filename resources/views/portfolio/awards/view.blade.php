@extends('layout.dashboard')
@section('title', "Awards")
@section('content-title')   
@endsection
@section('content')


@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif    

<!-- -------------------------  -----------------------  ------------------------- -->
<!-- -------------------------  Datatables table sample  ------------------------- -->
<!-- -------------------------  -----------------------  ------------------------- -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-danger">
            Awards        <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus"></i>
            </button>

            <!-- -------------------------  add modal  ------------------------- -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="POST"  action="{{ route('user.storeAwards',$user = auth()->id()) }}" enctype="multipart/form-data">
                            @CSRF
                            {{method_field('POST')}}    
                            @method('POST')
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white" id="addModalLabel">
                                    Award Details
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-white">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-borderless" style="font-size: medium;">
                                    <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                    @foreach($checkoffice as $checkoff)
                                    <input type="text" name="officenotif" value="{{$checkoff->office}}" hidden>
                                    @endforeach
                                    <!-- --------------------  --------------------  -------------------- -->
                                    <tr>
                                        <th>
                                            Type <span style="color: red;">*</span>
                                        </th>
                                        <td>
                                            <select style="color: black;" class="form-control" id="type1" name="type1" required="">
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
                                            <input style="color: black;" type="text" class="form-control" id="awardTitle" name="awardTitle" required="">
                                        </td>
                                    </tr>
                                    <!-- --------------------  --------------------  -------------------- -->
                                    <tr>
                                        <th>
                                            Conferring Organization's Name <span style="color: red;">*</span>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="text" class="form-control" id="organizationName" name="organizationName" required="">
                                        </td>
                                    </tr>
                                    <!-- --------------------  --------------------  -------------------- -->
                                    <tr>
                                        <th>
                                            Conferring Organization's Address <span style="color: red;">*</span>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="text" class="form-control" id="organizationAddress" name="organizationAddress" required="">
                                        </td>
                                    </tr>
                                    <!-- --------------------  --------------------  -------------------- -->
                                    <tr>
                                        <th>
                                            Date Received <span style="color: red;">*</span>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="date" class="form-control" id="dateReceived" name="dateReceived" required="" onchange="maxCheckDate(this)">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Attachment<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="file" id="file" name="file" required="" title="PDF files only">
                                            <br>
                                            <i style="color: red; font-size: x-small;">*Softcopy of corresponding certificate</i>
                                        </td>
                                    </tr>
                                </table>        
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger zoom"><i class="far fa-save"></i></button>

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
            <table class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    @foreach ($comm as $com) 

                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td>{{$com->type}}</td>
                        <td>{{$com->awardTitle}}</td>
                        <td>
                            {{$com->organizationName}}<br>
                            {{$com->organizationAddress}}
                        </td>
                        <td>{{\Carbon\Carbon::parse($com->dateReceived)->format('M. d, Y')}}</td>

                        <td>
                            <a target="_blank" href="/uploads/transcript/{{$com->file}}"  style="text-decoration: none;">{{$com->file}}</a>
                        </td>
                        <td>
                            <button class="btn btn-danger zoom" data-id="{{$com->formid}}" id="edit"><i class="fas fa-edit"></i></button>    
                            <button class="btn btn-secondary zoom" data-id="{{$com->formid}}" id="delete"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>


<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ edit modal ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST"  action="{{ route('user.updateAwards',$user = auth()->id()) }}" enctype="multipart/form-data">
                @CSRF
                {{method_field('POST')}}    
                @method('POST')
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="addModalLabel">
                        Award Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table class="table table-borderless" style="font-size: medium;">
                        <!-- ~~~~~~~~~~~~~~~~~~~~ hidden inputs ~~~~~~~~~~~~~~~~~~~~ -->
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="text" name="user_email" value="{{Auth::user()->email}}" hidden>
                        <input type="text" name="user_id2" value="{{Auth::user()->id}}" hidden>
                        <input type="text" name="id2" id="id2" required hidden >
                        @foreach($checkoffice as $checkoff)
                        <input type="text" name="officenotif" value="{{$checkoff->office}}" hidden>
                        @endforeach
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Type <span style="color: red;">*</span>
                            </th>
                            <td>
                                <select style="color: black;" class="form-control" id="type2" name="type2" required="">
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
                                <input style="color: black;" type="text" class="form-control" id="awardTitle2" name="awardTitle2" required="">
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Conferring Organization's Name <span style="color: red;">*</span>
                            </th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="organizationName2" name="organizationName2" required="">
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Conferring Organization's Address <span style="color: red;">*</span>
                            </th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="organizationAddress2" name="organizationAddress2" required="">
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Date Received <span style="color: red;">*</span>
                            </th>
                            <td>
                                <input style="color: black;" type="date" class="form-control" id="dateReceived2" name="dateReceived2" required="" onchange="maxCheckDate(this)">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Attachment<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="file" id="file2" name="file2"  title="PDF files only">
                                <br>
                                <i style="color: red; font-size: x-small;">*Softcopy of corresponding certificate</i>
                            </td>
                        </tr>
                    </table>        
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger zoom"><i class="far fa-save"></i></button>
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
                <form action="{{ route('user.deleteAwards',$app=Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="text" name="id3" id="id3" required hidden>

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
            $.get("/awards/editawards"+id, function (data) {
                $('#editModal').modal('show');
                $('input[id=id2]').val(data.id);
                $('input[id=user_id2]').val(data.user_id);
                $('select[id=type2]').val(data.type);
                $('input[id=awardTitle2]').val(data.awardTitle);
                $('input[id=organizationName2]').val(data.organizationName);
                $('input[id=organizationAddress2]').val(data.organizationAddress);
                $('input[id=dateReceived2]').val(data.dateReceived);

                $('#modalHeading').html("Edit Certificates");
            });
        });

        $('#dataTable').on('click', '#delete', function () {

            var id = $(this).attr('data-id');
            $.get("/awards/editawards"+id, function (data) {
                $('#deleteModal').modal('show');
                $('input[id=id3]').val(data.id);
                $('#modalHeading').html("Edit Certificates");
            });
        });




    });
</script>


@endsection