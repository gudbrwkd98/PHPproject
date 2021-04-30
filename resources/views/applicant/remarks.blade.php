
@extends('layout.dashboard')
@section('title', "Profile")
@section('content-title')
<a href="{{ route('staff.applicants.show', $profile->id)}}">
    {{$profile->firstName.' '.$profile->middleName.' '.$profile->lastName.'`s '}}

</a>
{{'Application'}}

<!-- Button trigger modal -->



@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif




<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#forward">
    Update Application
</button>


@endsection
@section('content')

<div class="row" >
    <div class="col-sm-3">
        @if($profile->photo)
        <img src="{{ asset('uploads/profilepicture/'.$profile->photo)}}" class="img-thumbnail rounded-circle" width="300px;" height="250px;" alt="Image">
        @endif
    </div>
    <div class="col-sm-7">
        <table class="table table-borderless text-dark">

            <tr>
                <th>{{__('Last Update: ')}}</th>
                <td><a style="color:black">{{$lastupdate}}

                </a></td>
            </tr>
            <tr>
                <th>{{__('Applicaiton ID:')}}</th>

                <td><a style="color:red">{{$app}}
                    <input type="text" id="appid" name="appid" value="{{$app}}".0 class="form-control" hidden=""></td>
                </tr></td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th width="20%">{{__('Applicant')}}</th>
                <td>{{$profile->firstName.' '.$profile->middleName.' '.$profile->lastName}}</td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__('Email')}}</th>
                <td>{{$profile2->email}}</td>
            </tr>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <tr>
                <th>{{__('Handler')}}</th>
                <td><a style="color:red">{{$handler}}</a></td>
            </tr>
            <tr>
                <th>{{__('Status')}}</th>
                <td><a style="color:red">{{$status}}
                </a></td>
            </tr>



        </tr>


        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <tr>
            <th>{{__('Status')}}</th>
            <td>                  
                <h4 class="small font-weight-bold" style="color:red">{{$status}}<span class="float-right">{{$statuspercent}}%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$statuspercent}}%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="8"></div>
                </div>
            </td>
        </tr>

        <tr>
            <th>{{__('Portfolio')}}</th>
            <td>
                <a href="{{ route('staffportfolio.portfolios.show', $profile->user_id) }}" >
                    <button type="button" class="btn btn-primary btn-sm">View</button>
                </a>
            </td>
        </tr>
        <tr>
            <th>{{__('Organizations')}}</th>
            <td>
                <a href="{{ route('staff.userorgs.show', $profile->user_id) }}" >
                    <button type="button" class="btn btn-primary btn-sm">View</button>
                </a>
            </td>
        </tr>

        <tr>
            <th>{{__('Community Involvement')}}</th>
            <td>
                <a href="{{ route('staff.usercomm.show', $profile->user_id) }}" >
                    <button type="button" class="btn btn-primary btn-sm">View</button>
                </a>
            </td>
        </tr>
        <tr>
            <th>{{__('Pictures ')}}</th>
            <td>
                <a href="{{ route('staff.userpics.show', $profile->user_id) }}" >
                    <button type="button" class="btn btn-primary btn-sm">View</button>
                </a>
            </td>
        </tr>

        <tr>
            <th>{{__('Certificates ')}}</th>
            <td>
                <a href="{{ route('staff.usercerts.show', $profile->user_id) }}" >
                    <button type="button" class="btn btn-primary btn-sm">View</button>
                </a>
            </td>
        </tr>

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
                            {{__('Last Updated    :    ')}}<a style="color:black">{{$lastupdate}}

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
                                        {{__('Handler     :    ')}}<a style="color:red">{{$handler}}</a>
                                    </th>
                                    <th>
                                        {{__('Status     :    ')}}<a style="color:red">{{$status}}


                                        </a>
                                    </th>
                                </tr>

                                <tr>
                                    <th>
                                        Handler
                                    </th>

                                    <td>
                                        <select id="handler" name="handler" required class="form-control">

                                            <option value='{{$handler = substr($handler,1,-1)}}'>- - - - - - - - - - - - - CHOOSE HANDLER - - - - - - - - - - - - -</option>
                                            @foreach($users as $user)

                                            <option 






                                            value='{{ $user->email}}''>{{ $user->email}}<a>(</a>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}<a>)</a></option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <th>

                                        Progress
                                    </th>
                                    <td>
                                        <select id="status" name="status" required class="form-control">

                                            <option value='{{$status= substr($status,1,-1)}}'>- - - - - - - - - - - - - CHOOSE PROGRESS - - - - - - - - - - - - -</option>

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
                                    <th >Remarks</th>
                                    <td>
                                        <textarea rows="3" id="remarks" name="remarks" required="" class="form-control"></textarea> 
                                        <br>
                                        <a  href="{{ route('staff.remarks.show', $app) }} "  >
                                            <input type="text" id="userid" name="userid" value="{{$app}}" hidden="">


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

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>


                                    <th scope="col">ID</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date created</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($app3 as $com)       
                                <tr>

                                    <td>{{$com->id}}</td>
                                    <td>{{$com->remarks}}</td>

                                    <td> <a href="" 
                                        download="{{$com->file}}" 
                                        style="text-decoration: none;">{{$com->file}}</a></td>
                                        <td>{{$com->status}}</td>
                                        <td>{{$com->created_at}}</td>


                                    </tr>           
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endsection

                <script>
                      $(document).ready(function(){

     $('#courseTable').DataTable( {
        "order": [[ 5, "asc" ]]
    } );
                </script>