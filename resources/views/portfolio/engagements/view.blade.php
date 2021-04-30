@extends('layout.dashboard')
@section('title', "Engagements")
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
            Engagements
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus"></i>
            </button>

            <!-- -------------------------  add modal  ------------------------- -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST"  action="{{ route('user.storeEngagement',$user = auth()->id()) }}" enctype="multipart/form-data">
                            @CSRF
                            {{method_field('POST')}}    
                            @method('POST')
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="addModalLabel">
                                    Engagement Details
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

                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Title of Engagement<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="text" class="form-control" id="title" name="title" required="">
                                            <i style="color: red; font-size: x-small;">ex. Seminar / Conferrence / Workshop</i>
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th width="20%">
                                            Involvement<i style="color: red;">*</i>
                                        </th>
                                        <td width="%">
                                            <select style="color: black;" class="form-control" id="involvement" name="involvement" required="">
                                                <option value="" disabled="" selected="">--- Type of Involvement ---</option>
                                                <option value="Speaker">Speaker</option>
                                                <option value="Participant">Participant</option>
                                                <option value="Working Committee Member">Working Committee Member</option>
                                                <option value="Organizer">Organizer</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Start Date<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="date" class="form-control" id="startYear" name="startYear" required="" >
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            End Date<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="date" class="form-control" id="endYear" name="endYear" required="" >
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Venue<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="text" class="form-control" id="venue" name="venue" >
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Organizer<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="text" class="form-control" id="organizer" name="organizer" required="">
                                        </td>
                                    </tr>

                                    <!-- -------------------------  ------------------------  ------------------------- -->
                                    <!-- -------------------------  Narrative Report section  ------------------------- -->
                                    <!-- -------------------------  ------------------------  ------------------------- -->
                                    
                                    <!-- -------------------------  ------------------------  ------------------------- -->
                                    <tr>
                                        <th colspan="2" style="text-align: center;" class="bg-danger text-white">Narrative Report</th>
                                    </tr>
                                    <!-- -------------------------  ----------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            What?<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="text" class="form-control" id="what1" name="what1" required="">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  ----------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            When?<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="date" class="form-control" id="when1" name="when1" required="" >
                                        </td>
                                    </tr>
                                    <!-- -------------------------  ----------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Where?<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="text" class="form-control" id="where1" name="where1" required="">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  ----------------------  ------------------------- -->
                                    <tr>
                                        <th colspan="2">
                                            OVERVIEW:  What have you learned from this training?  How useful is this training to your previous or current job?<i style="color: red;">*</i>
                                            <textarea style="color: black;" rows="3" class="form-control" required="" id="overview2" name="overview1"></textarea>
                                        </th>
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
            In this section, please enumerate and describe all speaking and professional development engagements
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="16.6">Title</th>
                        <th width="16.6">Involvement</th>
                        <th width="16.6">Duration</th>
                        <th width="16.6">Venue</th>
                        <th width="16.6">Organizer</th>
                        <th width="16.6">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comm as $com) 

                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td>{{$com->title}}</td>
                        <td>{{$com->involvement}}</td>
                        <td>
                            {{$com->duration}} Day(s)
                        </td>
                        <td>{{$com->venue}}</td>
                        <td>{{$com->organizer}}</td>
                        <td>
                            <button class="btn btn-danger zoom" data-id="{{$com->formid}}" id="edit"><i class="fas fa-edit"></i></button>

                            <button class="btn btn-secondary zoom" data-id="{{$com->formid}}" id="delete"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ edit modal ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST"  action="{{ route('user.updateEngagement',$user = auth()->id()) }}" enctype="multipart/form-data">
                @CSRF
                {{method_field('POST')}}    
                @method('POST')
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="addModalLabel">
                        Engagement Details
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


                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Title of Engagement<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="title2" name="title2" required="">
                                <i style="color: red; font-size: x-small;">ex. Seminar / Conferrence / Workshop</i>
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th width="20%">
                                Involvement<i style="color: red;">*</i>
                            </th>
                            <td width="%">
                                <select style="color: black;" class="form-control" id="involvement2" name="involvement2" required="">
                                    <option value="" disabled="" selected="">--- Type of Involvement ---</option>
                                    <option value="Speaker">Speaker</option>
                                    <option value="Participant">Participant</option>
                                    <option value="Working Committee Member">Working Committee Member</option>
                                    <option value="Organizer">Organizer</option>
                                </select>
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Start Date<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="date" class="form-control" id="startYear2" name="startYear2" required=""  onchange="maxCheckDate(this)">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                End Date<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="date" class="form-control" id="endYear2" name="endYear2" required=""  onchange="maxCheckDate(this)">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Venue<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="venue2" name="venue2" required="">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Organizer<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="organizer2" name="organizer2" required="">
                            </td>
                        </tr>

                        <!-- -------------------------  ------------------------  ------------------------- -->
                        <!-- -------------------------  Narrative Report section  ------------------------- -->
                        <!-- -------------------------  ------------------------  ------------------------- -->
                        
                        <!-- -------------------------  ------------------------  ------------------------- -->
                        <tr>
                            <th colspan="2" style="text-align: center;" class="bg-danger text-white">Narrative Report</th>
                        </tr>
                        <!-- -------------------------  ----------------------  ------------------------- -->
                        <tr>
                            <th>
                                What?<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="what2" name="what2" required="">
                            </td>
                        </tr>
                        <!-- -------------------------  ----------------------  ------------------------- -->
                        <tr>
                            <th>
                                When?<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="date" class="form-control" id="when2" name="when2" required="" >
                            </td>
                        </tr>
                        <!-- -------------------------  ----------------------  ------------------------- -->
                        <tr>
                            <th>
                                Where?<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="where2" name="where2" required="">
                            </td>
                        </tr>
                        <!-- -------------------------  ----------------------  ------------------------- -->
                        <tr>
                            <th colspan="2">
                                OVERVIEW:  What have you learned from this training?  How useful is this training to your previous or current job?<i style="color: red;">*</i>
                                <textarea style="color: black;" rows="3" class="form-control" required="" id="overview2" name="overview2"></textarea>
                            </th>
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

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Delete?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>

            <div class="modal-body">
                <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to  delete this item?</h5>
            </div>

            <div class="modal-footer">
                <form action="{{ route('user.deleteEngagement',$app=Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="text" name="id3" id="id3" required hidden>

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
            $.get("/engagement/editengagement"+id, function (data) {
                $('#editModal').modal('show');
                $('input[id=id2]').val(data.id);
                $('input[id=user_id2]').val(data.user_id);



                $('input[id=title2]').val(data.title);
                $('input[id=venue2]').val(data.venue);
                $('input[id=organizer2]').val(data.organizer);
                $('select[id=involvement2]').val(data.involvement);
                $('input[id=startYear2]').val(data.startYear);
                $('input[id=endYear2]').val(data.endYear);
                                $('input[id=what2]').val(data.what1);
                $('input[id=when2]').val(data.when1);
                $('input[id=where2]').val(data.where1);
                $('textarea[id=overview2]').val(data.overview);








                $('#modalHeading').html("Edit Certificates");
            });
        });

        $('#dataTable').on('click', '#delete', function () {

            var id = $(this).attr('data-id');
            $.get("/engagement/editengagement"+id, function (data) {
                $('#deleteModal').modal('show');
                $('input[id=id3]').val(data.id);
                $('#modalHeading').html("Edit Certificates");
            });
        });




    });
</script>

@endsection