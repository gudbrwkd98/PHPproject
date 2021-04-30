
@extends('layout.dashboard')
@section('title', "Applicant's Profile")
@section('content-title')
    <a href="{{ route('staff.applicants.show', $profile->id)}}">
        {{$profile->firstName.' '.$profile->middleName.' '.$profile->lastName.'`s '}}
    </a>
    {{'Application'}}
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sendApp" <?php
            if ($check>=1) {
                ?> hidden <?php
            }?>>
            Send Application
        </button>

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
@endsection

        <!-- ~~~~~~~~~~~~~~~~~~~~ send app button ~~~~~~~~~~~~~~~~~~~~ -->
       


@section('content')


    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ upper portion of app ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <div class="row" >
        <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
        <!-- ~~~~~~~~~~~~~~~~~~~~ user profile img (left side) ~~~~~~~~~~~~~~~~~~~~ -->
        <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
        <div class="col-sm-3">
            @if(Auth::user()->profiles->photo)
                <a href="{{asset('uploads/profilepicture/'.Auth::user()->profiles->photo)}}" target="_blank">
                    <img src="{{ asset('uploads/profilepicture/'.Auth::user()->profiles->photo)}}" class="img-thumbnail rounded-circle" alt="Image" style="height: 25rem;width:25" >
                </a>
            @else
                <a href="{{asset('uploads/profilepicture/default.jpg')}}" target="_blank">
                    <img src="{{ asset('uploads/profilepicture/default.jpg')}}" class="img-thumbnail rounded-circle" alt="Image">
                </a>
            @endif
        </div>


        <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
        <!-- ~~~~~~~~~~~~~~~~~~~~ user profile details (right side) ~~~~~~~~~~~~~~~~~~~~ -->
        <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
        <div class="col-sm-7">
            <table class="table table-borderless" id="application">
                @if($check>=1)
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <tr style="color: black">
                    <th>{{__('Last Updated: ')}}</th>
                    <td>
                        <span style="color:red">{{ \Carbon\Carbon::parse($lastupdate)->format('M-d-Y g:i A')}}</span>
                    </td>
                </tr>

                @endif
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <tr style="color: black">
                    <th>{{__('Applicaiton ID:')}}</th>

                    <td>
                        <span style="color:red">{{$app}}</span>
                        <input type="text" id="appid" name="appid" value="{{$app}}".0 class="form-control" hidden="">
                    </td>
                </tr>
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <tr style="color: black">
                    <th width="20%">{{__('Applicant')}}</th>
                    <td>{{$profile->firstName.' '.$profile->middleName.' '.$profile->lastName}}</td>
                </tr>
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <tr style="color: black">
                    <th>{{__('Email')}}</th>
                    <td>{{$profile2->email}}</td>
                </tr>
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <tr style="color: black">
                    <th>{{__('Office')}}</th>
                    <td><span style="color:red">{{$handler}}</span></td>
                </tr>
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <tr style="color: black">
                    <th>{{__('Stage')}}</th>
                    <td>                  
                        <h4 class="small font-weight-bold" style="color:red">{{$stage}}<span class="float-right">{{$statuspercent}}%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{$statuspercent}}%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="8"></div>
                        </div>
                    </td>
                </tr>
                 <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <tr style="color: black">
                    <th>{{__('Status')}}</th>
                    <td>                  
                        <h4 class="small font-weight-bold" style="color:red">{{$status}}<span class="float-right">{{$statuspercent}}%</span></h4>
                        
                    </td>
                </tr>
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                @if($check>=1)
                <tr style="color: black">
                    <td colspan="2">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" id="delete">
                            Cancel Application
                        </button>
                    </td>
                </tr>
                @endif
            </table>
        </div>
    </div>

 <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ send application modal ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <div class="modal fade" id="sendApp" tabindex="-1" role="dialog" aria-labelledby="sendAppLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-dark" style="font-size: medium;">
                <form method="POST"  action="{{ route('user.applicant.store',$user = auth()->id()) }}" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileLabel" style="color: black;">Send Application</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        @CSRF
                        {{method_field('POST')}}    
                        @method('POST')
                        <table class="table table-borderless text-dark" style="font-size: medium;">
                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                            <tr>
                                <th style="color: black;">{{__('Course')}}</th>
                                <td>
                                    <input type="text" id="user_id" name="user_id" value="{{Auth::user()->id}}" style="display: none;">
                                    <select class="form-control" id="course" name="course">
                                        @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->courseName}}</option>
                                        @endforeach
                                        
                                    </select>
                                </td>
                            </tr>
                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Application') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ remarks table ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr style="color: black;">
                        <th scope="col">Office</th>
                       <!--  <th scope="col">Status</th> -->
                        <th scope="col">Date updated</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($app3 as $com)       
                        <tr>
                            <td>{{$com->updater}}</td>
                           <!--  <td>{{$com->status}}</td> -->
                            <td>{{ \Carbon\Carbon::parse($com->created_at)->format('M-d-Y g:i A')}}</td>
                            <td>
                                <button class="btn btn-light" data-id="{{$com->id}}" id="edit">View</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
                <h5 class="modal-title" id="deleteModalLabel">Cancel Application</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                Are you sure you wish to cancel application?
            </div>
            
            <div class="modal-footer">
                <form action="{{ route('user.apply.destroy',$app=Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="text" id="userid" name="userid" value="" hidden="">
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal-->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addImageLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="userForm" name="userForm" class="form-horizontal" enctype="multipart/form-data"> 
                <div class="modal-header">
                    <h5 class="modal-title" id="addImageLabel">
                        <i class="far fa-image"></i>
                        Remarks
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="text" name="user_email" value="{{Auth::user()->email}}" hidden>
                    <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                    <table class="table table-borderless text-dark" id="" style="font-size: medium;">
                     <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <input type="text" name="id" id="id" required hidden="">
                    <input type="text" name="application_id" id="application_id" required  hidden="">
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <tr>
                        <th>
                            Updater
                        </th>
                        <td>

                           <label id="updater" name="updater"> </label>


                       </td>
                   </tr>

                   <!-- <tr>
                    <th>
                        Status
                    </th>
                    <td>

                       <label id="status" name="status"> </label>


                   </td>
               </tr> -->
               <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
               <tr>
                <th>
                    Remarks
                </th>
                <td>

                   <textarea row="3" name="remarks" id="remarks" class="form-control" required disabled=""> </textarea> 


               </td>
           </tr>
           <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
           <tr>
            <th>
                Attachment
            </th>
            <td>

               <a id="link" name="link" href="" download=""><label  id="file" name="file"></label> </a>


           </td>
       </tr>

   </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

</div>
</form>
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

            $.get("/applicationremarks/edit/"+id, function (data) {
                $('#editModal').modal('show');
                $('input[id=id]').val(data.id);
                $('input[id=application_id]').val(data.application_id);

                $('label[id=updater]').text(data.updater);
                $('label[id=status]').text(data.status);
                
                $('textarea[id=remarks]').val(data.remarks);
                $('label[id=file]').text(data.file);
                var dl = '/uploads/file/'+data.file;
                $('#link').attr('href',dl);
                $('#link').attr('download',data.file);

                $('#modalHeading').html("Edit Remarks");
            });
        });

        $('body').on('click', '#save', function (e) {
            e.preventDefault();

            $.ajax({
                data: $('#userForm').serialize(),
                url: "usercert/create/",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#userForm').trigger("reset");
                    $('#editModal').modal('hide');
                    alert('successfully updated');
                    window.location.reload();

                },
                error: function (data) {
                 alert('error; ' + eval(error));
             }});
        });

        $('body').on('click', '#add', function () {
            $('input[id=certificates]').val('');
            $('input[id=title]').val('');
            $('textarea[id=narrative_report]').val('');
        });

        $('#dataTable').on('click', '#delete', function (e) {
            var c = confirm('are you sure?');
            if(c == true){
                e.preventDefault();

                $.ajax({
                   data: $('#userForm').serialize(),
                   url: "usercert/delete/"+$(this).attr('data-id'),
                   type: "DELETE",
                   dataType: 'json',
                   success: function (data) {
                    alert('successfully deleted');
                    window.location.reload();
                },
                error: function (data) {
                    alert('Error');
                }});
            }
        });

        
    });
</script>


<script>

  $(function () {
    var data = {
        "_token": $('#token').val()
    };

    $(document).ready(function() {
        var table = $('#application').DataTable();
    });
    $('#application').on('click', '#delete', function () {

        var id = $(this).attr('data-id');
        $.get("/applicant/edit/"+id, function (data) {
            $('#deleteModal').modal('show');
            $('input[id=id]').val(data.id);
            $('#modalHeading').html("Edit Remarks");




        });
    });          
</script>


@endsection