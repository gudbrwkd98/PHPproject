@extends('layout.dashboard')
@section('title', "Remarks")
@section('content-title')
@endsection
@section('content')



<div class="card shadow mb-4 p-3">
    <!-- --------------------  progress step bar  -------------------- -->
    <div class="row">    
        <div class="progress-container">
            <ul class="progressbar">
                <li hidden="" class="active"></li>
                <li <?php if($progressID>=2) {echo "class='active'";}?> >Initial Assessment</li>
                <li <?php if($progressID>=3) {echo "class='active'";}?> >Second Assessment</li>
                <li <?php if($progressID>=4) {echo "class='active'";}?> >Admission</li>
                <li <?php if($progressID>=5) {echo "class='active'";}?> >Third Assessment</li>
                <li <?php if($progressID>=6) {echo "class='active'";}?> >Enrollment</li>
                <li <?php if($progressID>=7) {echo "class='active'";}?> >Completion of Enhancement Program</li>
                <li <?php if($progressID>=8) {echo "class='active'";}?> >Final Assessment</li>
                <li <?php if($progressID>=9) {echo "class='active'";}?> >Process Prior Graduation</li>
                <li <?php if($progressID>=10) {echo "class='active'";}?> >Graduation Rites</li>
                <li <?php if($progressID>=11) {echo "class='active'";}?> >End of Transaction</li>
            </ul>
        </div>
    </div>


    <div class="row">
        <!-- -------------------------  nav_links  ------------------------- -->
        <div class="col-2">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-app-tab" data-toggle="pill" href="#v-pills-app" role="tab" aria-controls="v-pills-app" aria-selected="true">
                    Application
                </a>
                <a class="nav-link" id="v-pills-remarks-tab" data-toggle="pill" href="#v-pills-remarks" role="tab" aria-controls="v-pills-remarks" aria-selected="false">
                    Remarks
                </a>
                <a class="nav-link" id="v-pills-apphistory-tab" data-toggle="pill" href="#v-pills-apphistory" role="tab" aria-controls="v-pills-apphistory" aria-selected="false">
                    Application History
                </a>
            </div>
        </div>

        <!-- -------------------------  contents  ------------------------- -->
        <div class="col-10">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- -------------------------  application table  ------------------------- -->
                <div class="tab-pane fade show active" id="v-pills-app" role="tabpanel" aria-labelledby="v-pills-app-tab">  
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-danger">
                                Application

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" id="delete">
                                    Cancel Application
                                </button>
                            </h3>

                            <p style="text-indent: 50px;" class="mb-0">

                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered" width="100%" cellspacing="0" id="dataTable4">
                                    <thead>

                                        <tr>
                                            <th scope="col">Office</th>
                                            <th scope="col">Course</th>
                                            <th scope="col">Stage</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date Submitted</th>
                                            <th scope="col">Last Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($application as $app)
                                        <tr>
                                            <td>{{$app->office}}</td>
                                            <td>{{$app->courseCode}}</td>
                                            <td>{{$app->stage}}</td>
                                            <td>{{$app->app_status}}</td>
                                            <td>{{\Carbon\Carbon::parse($app->datesubmitted)->format('M d ,Y  h:i A')}}</td>

                                            <td>{{\Carbon\Carbon::parse($app->created_at)->format('M d ,Y  h:i A')}}</td>

                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- -------------------------  remarks table  ------------------------- -->
                <div class="tab-pane fade" id="v-pills-remarks" role="tabpanel" aria-labelledby="v-pills-remarks-tab">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-danger">
                                Remarks
                            </h3>
                            <p style="text-indent: 50px;" class="mb-0">
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered" id="remarksTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Office</th>
                                            <th>Stage</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- -------------------------  flow example 1  ------------------------- -->
                                        @foreach($remarks as $rem)
                                        <tr>
                                            <td>
                                                {{$rem->office}}
                                            </td>
                                            <td>
                                                {{$rem->stage}}
                                            </td>
                                            <td>
                                                {{$rem->app_status}}

                                            </td>

                                            <td>{{\Carbon\Carbon::parse($rem->created_at)->format('M d ,Y  h:i A')}}</td>



                                            <td>
                                                <button class="btn btn-light zoom" data-id="{{$rem->id}}" id="viewRemarks"><i class="fas fa-eye"></i></button>

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- -------------------------  application table  ------------------------- -->
                <div class="tab-pane fade" id="v-pills-apphistory" role="tabpanel" aria-labelledby="v-pills-apphistory-tab">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-danger">
                                Application History
                            </h3>
                            <p style="text-indent: 50px;" class="mb-0">

                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-bordered" id="datatable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Office</th>
                                            <th scope="col">Course</th>
                                            <th scope="col">Stage</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Last Update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applicationhistory as $app)
                                        <tr>
                                            <td>{{$app->office}}</td>
                                            <td>{{$app->courseCode}}</td>
                                            <td>{{$app->stage}}</td>
                                            <td>{{$app->app_status}}</td>
                                            <td>{{\Carbon\Carbon::parse($app->created_at)->format('M d ,Y  h:i A')}}</td>



                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>



<!-- -------------------------  view remarks modal  ------------------------- -->
<div class="modal fade" id="viewRemarksModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="viewModalLabel">
                    Remarks Details
                    <input type="text" name="appidremarks2" id="appidremarks2" hidden>
                        <?php
                            $test=request()->input('appidremarks2');
                        ?>
                    {{$test}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- -------------------------  Table  ------------------------- -->
                <table class="table table-borderless" style="font-size: medium;">
                    <input type="text" name="user_id3" value="{{Auth::user()->id}}" hidden>
                    <input type="text" name="id6" id="id6" required hidden>

                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <th width="15%">Remarks: </th>
                        <td>
                            <label class="text-danger" id="remarks3" name="remarks3">
                        </td>
                    </tr>
                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <th>Attachment: </th>
                        <td >
                            <a target="_blank" style="text-decoration: none;" id="remarksfile" name="remarksfile"><label name="remarksfilename" id="remarksfilename"></label></a>
                        </td>
                    </tr>
                </table>
            </div>
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
                <h5 class="modal-title" id="deleteModalLabel">Cancel Application</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
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
                    <button type="submit" class="btn btn-danger"><i class="fas fa-check"></i> Yes</button>
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
            var table = $('#remarksTable').DataTable();
        });
        $('#remarksTable').on('click', '#viewRemarks', function () {
            var id = $(this).attr('data-id');
            $.get("/userapplication/remark"+id, function (data) {
                var count = Object.keys(data).length;
                var filename = data.file;
                if(filename == null){
                    $('#remarksfilename').text("No Uploaded File");
                }
                else{
                    $('#remarksfilename').text(filename);
                }
                $('#remarksfile').attr('href', '/uploads/file/'+data.file);
                $('#appidremarks2').val(data.remarks);      
                $('#remarks3').text(data.remarks)
                $('#viewRemarksModal').modal('show');
            });
        });
    });
</script> 

<script>
    $(document).ready(function() {
        $('#datatable').DataTable( {
            "order": [[ 4, "desc" ]]
        } );
    } );
</script>
<script>
    $(document).ready(function() {
        $('#remarksTable').DataTable( {
            "order": [[ 3, "desc" ]]
        } );
    } );
</script>

        @endsection