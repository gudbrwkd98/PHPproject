
@extends('layout.dashboard')
@section('title', "User Application ")
@section('content-title')
     <a href="{{ route('staff.applicants.show', $profile->id)}}">
        {{$profile->firstName.' '.$profile->middleName.' '.$profile->lastName.'`s '}} 
    </a>
    {{'Profile'}}

<!-- Button trigger modal -->
@if(!$app)
<script>window.location = "/";</script>
@endif
<!--
@foreach($app2 as $appp)
@if($appp->office!=Auth::user()->email)
<script>window.location = "/";</script>
@endif

@endforeach
-->


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




    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ update app button ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#forward">
      Update Application
    </button>

     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#remarks">
      Add Remarks
    </button>


@endsection
@section('content')

<div class="row" >
    <div class="col-sm-4">
        @if($profile->photo)
            <a href="{{ asset('uploads/profilepicture/'.$profile->photo)}}" target="_blank">
                <img src="{{ asset('uploads/profilepicture/'.$profile->photo))}}" class="img-thumbnail rounded-circle" alt="Image" style="height: 13rem;width:13rem" >
            </a>
        @else
            <a href="{{asset('uploads/profilepicture/default.jpg')}}" target="_blank">
                <img src="{{ asset('uploads/profilepicture/default.jpg')}}" class="img-thumbnail rounded-circle" alt="Image">
            </a>
        @endif
    </div>
    <div class="col-sm-7">
        <table class="table table-borderless text-dark">
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__('Last Updated: ')}}</th>
                <td>
                    <a style="color:red">{{ \Carbon\Carbon::parse($lastupdate)->format('M-d-Y g:i A')}}</a>
                </td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__('Applicaiton ID:')}}</th>
                <td>
                    <a style="color:red">{{$app}}</a>
                    <input type="text" id="appid" name="appid" value="{{$app}}".0 class="form-control" hidden="">
                </td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th width="20%">{{__('Full Name')}}</th>
                <td>{{$profile->firstName.' '.$profile->middleName.' '.$profile->lastName}}</td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__('Email')}}</th>
                <td>{{$profile2->email}}</td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__('Age')}}</th>
                <td>{{$profile->age }}</td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__('Contact Number')}}</th>
                <td>{{$profile->phone }}</td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__('Address')}}</th>
                <td>{{$profile->address }}</td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__('Zip Code')}}</th>
                <td>{{$profile->zipcode }}</td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__('Portfolio')}}</th>
                <td>
                    <a href="{{ route('staffportfolio.portfolios.show', $profile->user_id) }}" >
                        <button type="button" class="btn btn-primary btn-sm">View</button>
                    </a>
                </td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
           <!--  <tr>
                <th>{{__('Organizations')}}</th>
                <td>
                    <a href="{{ route('staff.userorgs.show', $profile->user_id) }}" >
                        <button type="button" class="btn btn-primary btn-sm">View</button>
                    </a>
                </td>
            </tr> -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <!--     <tr>
                <th>{{__('Community Involvement')}}</th>
                <td>
                    <a href="{{ route('staff.usercomm.show', $profile->user_id) }}" >
                        <button type="button" class="btn btn-primary btn-sm">View</button>
                    </a>
                </td>
            </tr> -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- <tr>
                <th>{{__('Pictures ')}}</th>
                <td>
                    <a href="{{ route('staff.userpics.show', $profile->user_id) }}" >
                        <button type="button" class="btn btn-primary btn-sm">View</button>
                    </a>
                </td>
            </tr> -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__('Certificates/Pictures ')}}</th>
                <td>
                    <a href="{{ route('staff.usercerts.show', $profile->user_id) }}" >
                        <button type="button" class="btn btn-primary btn-sm">View</button>
                    </a>
                </td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__(' Office')}}</th>
                <td><a style="color:red">{{$office}}</a></td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__('Stage')}}</th>
                <td>                  
                    <h4 class="small font-weight-bold" style="color:red">{{$stage}}<span class="float-right">{{$statuspercent}}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{$statuspercent}}%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="8"></div>
                    </div>
                </td>
            </tr>
              <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__('Status')}}</th>
                <td><a style="color:red">{{$status}}</a></td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        </table>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="forward" tabindex="-1" role="dialog" aria-labelledby="addOrgLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content text-dark" style="font-size: medium;">

        <form method="POST"  action="{{ route('staff.applicants.store',$profile->user_id) }}" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title" id="editProfileLabel">Update Application</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body ">
        @CSRF
        {{method_field('POST')}}  
        @method('POST')
        <tr>
            <th>
                {{__('Last Updated    :    ')}}<a style="color:black">{{ \Carbon\Carbon::parse($lastupdate)->format('M-d-Y g:i A')}}

                </a>

            </th>

            <tr>


                <table class="table table-borderless text-dark" style="font-size: medium;">


                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <tr>
                        <th>
                            {{__('Applicantion ID     :    ')}}<a style="color:red">{{$app}}
                                <input type="text" id="appid" name="appid" value="{{$app}}".0 class="form-control" hidden="">

                            </a>

                        </th>

                        <tr>
                           @if($profile->photo)
                           <img  src="{{ asset('uploads/profilepicture/'.$profile->photo)}}" class="img-thumbnail rounded-circle float-right" width="250px;" height="250px;" alt="Image">
                           @endif
                       </tr>




                       <input type="text" id="user_id" name="user_id" value="{{$profile->user_id}}" class="form-control" hidden="">

                   </tr>



                   <th>
                    {{__('Applicant     :    ')}}<a style="color:red">{{$profile->firstName.' '.$profile->middleName.' '.$profile->lastName}}</a>
                </th>
                

                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

                
                <tr>
                  <th>
                    {{__('Handled by     :    ')}}<a style="color:red">{{$office}}</a>
                </th>
                <th>
                    {{__('Stage     :    ')}}<a style="color:red">{{$stage}}

                       


                    </a>
                </th>
                
            </tr>
            <tr>
              <th>
                    {{__('Status     :    ')}}<a style="color:red">{{$status}}

                        <input type="text" id="user_email" name="user_email" value="{{Auth::user()->email}}" style="display: none;">


                    </a>
                </th>
            </tr>

            <tr>
              <th>
                Office 

            </th>

            <td>
                <select id="office" name="office" required class="form-control">

                  <option value='{{$office = substr($office,1,-1)}}'>- - - - - - - - - - - - - CHOOSE OFFICE - - - - - - - - - - - - -</option>
                  @foreach($users as $user)

                  <option   
                  value='{{ $user->email}}''>{{ $user->email}}<a>(</a>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}<a>)</a></option>
                  @endforeach
                  <!-- <option value='{{$profile2->email}}'>Return to Applicant</option> -->

              </select>
          </td>
      </tr>

      <tr>
          <th>

            Progress
        </th>
        <td>
         <select id="stage" name="stage" required class="form-control">

            <option value='{{$stage= substr($stage,1,-1)}}'>- - - - - - - - - - - - - CHOOSE PROGRESS - - - - - - - - - - - - -</option>

            <option>INITIAL ASSESSMENT</option>
            <option>SECOND ASSESSMENT</option>
            <option>ADMISSION</option>
            <option>THIRD ASSESSMENT</option>
            <option>ENROLLMENT</option>
            <option>COMPLETION OF ENHANCEMENT PROGRAM</option>
            <option>FINAL ASSESSMENT</option>
            <option>PROCESS PRIOR GRADUATION</option>
            <option>COMPLETED</option>





        </select>
    </td>
</tr>
 
<tr>

  <tr>
          <th>

            Progress
        </th>
        <td>
         <select id="status" name="status" required class="form-control">

            <option value='{{$status= substr($status,1,-1)}}'>- - - - - - - - - - - - - CHOOSE STATUS - - - - - - - - - - - - -</option>

            <option>not qualified</option>
            <option>passed</option>
            <option>ongoing</option>
         





        </select>
    </td>
</tr>
 
<tr>
    <!-- <th >Remarks</th>
    <td>
      <textarea rows="3" id="remarks" name="remarks" required="" class="form-control" =""></textarea> 
      <br>

  </td>
</tr>
<tr>
    <th>{{__('Upload File')}}</th>
    <td>
        <input type="file" id="file" name="file">

        <div>{{$errors->first('image')}}</div>
    </td>
</tr> -->


 


</table>

</div>
<div class="modal-footer">

    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">
        {{ __('Save Changes') }}
    </button>
</div>
</form>
</div>
</div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>




               <th scope="col">Office</th>
              <!--  <th scope="col">Status</th> -->
               <th scope="col">Date updated</th>
               <th scope="col">Remarks</th>


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





              @endforeach

          </tbody>
      </table>
      {{ $app3->links() }}
  </div>
</div>
</div>

<!-- Remarks Modal -->
<div class="modal fade" id="remarks" tabindex="-1" role="dialog" aria-labelledby="addOrgLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content text-dark" style="font-size: medium;">

        <form method="POST"  action="{{ route('staff.applicants.addremarks',$profile->user_id) }}" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title" id="editProfileLabel">Remarks</h5>
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
                        <th>
                            {{__('Applicantion ID     :    ')}}<a style="color:red">{{$app}}
                                <input type="text" id="appid" name="appid" value="{{$app}}".0 class="form-control" hidden="">

                            </a>

                        </th>

                     




                       <input type="text" id="user_id" name="user_id" value="{{$profile->user_id}}" class="form-control" hidden="">

                   </tr>



                   <th>
                    {{__('Applicant     :    ')}}<a style="color:red">{{$profile->firstName.' '.$profile->middleName.' '.$profile->lastName}}</a>
                </th>
                

               
 
<tr>
    <th >Remarks</th>
    <td>
      <textarea rows="3" id="remarks" name="remarks" required="" class="form-control" =""></textarea> 
      <br>

  </td>
</tr>
<tr>
    <th>{{__('Upload File')}}</th>
    <td>
        <input type="file" id="file" name="file">

        <div>{{$errors->first('image')}}</div>
    </td>
</tr>


 


</table>

</div>
<div class="modal-footer">

    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">
        {{ __('Save Changes') }}
    </button>
</div>
</form>
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

                     <th>

                     </th>
                     <td>
                        <input type="text" name="id" id="id" required hidden="">
                    </td>

                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

                    <th>

                    </th>
                    <td>
                        <input type="text" name="application_id" id="application_id" required  hidden="">



                    </td>

                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <tr>
                        <th>
                            Office
                        </th>
                        <td>

                           <label id="updater" name="updater"> </label>


                       </td>
                   </tr>

                  
               <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
               <tr>
                <th>
                    Remarks
                </th>
                <td>

                   <textarea row="5" col="5" name="remarks" id="remarks" class="form-control" required disabled=""> </textarea> 


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
            $.get("/remarks/edit/"+id, function (data) {
                $('#editModal').modal('show');
                $('input[id=id]').val(data.id);
                $('input[id=application_id]').val(data.application_id);

                $('label[id=updater]').text(data.updater);
                // $('label[id=status]').text(data.status);
                
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
@endsection