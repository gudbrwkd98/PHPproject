@extends('layout.dashboard')
@section('title', "Work Experience")
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

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-danger">
            Work Experience
            <a href="{{ route('user.workexperienceform')}}">
                <button type="button" class="btn btn-danger zoom">
                    <i class="fas fa-plus"></i>
                </button>
            </a>
        </h3>
        <p style="text-indent: 50px;" class="mb-0">
            In this section, please input all past and current work experiences with appropriate certificate of employment at current company
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Company</th>
                        <th>Duration</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comm as $com) 
                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td>{{$com->position}}</td>
                        <td>{{$com->companyName}}</td>
                        @if($com->duration<12)
                            <td>{{$com->duration}} Month(s)</td>
                        @else
                            <td>
                                {{floor($com->duration/12)}}  
                                @if( floor($com->duration/12 > 1) )
                                    Years
                                @else
                                    Year
                                @endif
                                
                                @if( ($com->duration%12)>=1) And {{floor($com->duration%12)}} 
                                    @if(floor($com->duration%12 >1))
                                        Months
                                    @else
                                        Month
                                    @endif
                                @endif
                            </td> 
                        @endif
                        <!-- -------------------------  edit / delete buttons  ------------------------- -->
                        <td>
                            <a href="{{ route('user.editworkexperienceform',$id2 = $com->formid) }}">
                                <button type="button" class="btn btn-danger zoom">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>
                            <button class="btn btn-secondary zoom" data-id="{{$com->formid}}" id="delete"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>


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
                            Edit Certificate
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


    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ delete modal ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete this item?</h5>
                </div>

                <div class="modal-footer">
                    <form action="{{ route('user.deleteWorkExperience',$app=Auth::user()->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="text" name="id3" id="id3" hidden required >

                        <button type="submit" class="btn btn-danger zoom"><i class="fas fa-trash-alt"></i></button>
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
                $.get("/workexperience/editworkexperience"+id, function (data) {
                    $('#editModal').modal('show');
                    $('input[id=id2]').val(data.id);
                    $('input[id=user_id2]').val(data.user_id);



                    $('input[id=title2]').val(data.title);
                    $('input[id=venue2]').val(data.venue);
                    $('input[id=organizer2]').val(data.organizer);
                    $('select[id=involvement2]').val(data.involvement);
                    $('input[id=startYear2]').val(data.startYear);
                    $('input[id=endYear2]').val(data.endYear);








                    $('#modalHeading').html("Edit Certificates");
                });
            });

            $('#dataTable').on('click', '#delete', function () {

                var id = $(this).attr('data-id');
                $.get("/workexperience/editworkexperience"+id, function (data) {
                    $('#deleteModal').modal('show');
                    $('input[id=id3]').val(data.id);
                    $('#modalHeading').html("Edit Certificates");
                });
            });

            $('#dataTable').on('click', '#addReport', function () {

                var id = $(this).attr('data-id');
                $.get("/workexperience/editworkexperience"+id, function (data) {
                    $('#addModal').modal('show');
                    $('input[id=id4]').val(data.id);

                    $('#modalHeading').html("Edit Certificates");
                });
            });




            $('#dataTable').on('click', '#editReport', function () {


                var id = $(this).attr('data-id');
                $.get("/workexperience/editworkexperience"+id, function (data) {




                    $('input[id=id5]').val(data.id);
                    if($('input[id=id5]').val()){

                        $('#editReportModal').modal('show');

                    }
                    else{
                        $('#editReportModal').modal('hide'); 
                    }

                    $('input[id=what2]').val(data.what1);
                    $('input[id=when2]').val(data.when1);
                    $('input[id=where2]').val(data.where1);
                    $('textarea[id=overview2]').val(data.overview);




                    $('#modalHeading').html("Edit Certificates");





                });
            });

            $('#dataTable').on('click', '#viewReport', function () {


                var id = $(this).attr('data-id');
                $.get("/workexperience/editworkexperience"+id, function (data) {




                    $('input[id=id6]').val(data.id);
                    if($('input[id=id6]').val()){

                        $('#viewReportModal').modal('show');

                    }
                    else{
                        $('#viewReportModal').modal('hide'); 
                    }

                    $('#what3').text(data.what1);
                    $('#when3').text(data.when1);
                    $('#where3').text(data.where1);
                    $('#overview3').text(data.overview);



                    $('#modalHeading').html("Edit Certificates");





                });
            });


        });
    </script>        

    @endsection