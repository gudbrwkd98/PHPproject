@extends('layout.dashboard')
@section('title', "Applications")
@section('content-title')
List of Applications

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


@endsection
@section('content')     
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ data table: course ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-dark" id="courseTable" width="100%" cellspacing="0">
                <thead>
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <tr>
                        <th scope="col">Applicant Name</th>
                        <th scope="col">Office</th>
                        <th scope="col">Status</th>
                        <th scope="col">Stage</th>
                        <th scope="col">Date Submitted</th>
                        <th scope="col">Last Update</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($application as $app)       
                    <tr>
                        <td>{{$app->firstName.' '.$app->middleName.' '.$app->lastName}}</td>
                        <td>{{$app->office}}</td>
                        <td>{{$app->app_status}}</td>
                        <td>{{$app->stage}}</td>
                        <td>{{\Carbon\Carbon::parse($app->datesubmitted)->format('M d ,Y  H:i A')}}</td>
                        <td>{{\Carbon\Carbon::parse($app->created_at)->format('M d ,Y  H:i A')}}</td>
                        <td>
                         <form id="userForm" name="userForm" class="form-horizontal">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('staff.viewApplication', $app->userid) }} "   style="text-decoration: none;">
                                <input type="text" id="userid" name="userid" value="{{$app->userid}}" hidden="">
                                <button type="button" class="btn btn-danger"><i class="fas fa-eye"></i></button>
                            </a>
                        </form>
                    </td>
                </tr>           
                @endforeach
            </tbody>
        </table>

        <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
        <!-- ~~~~~~~~~~~~~~~~~~~~ edit modal ~~~~~~~~~~~~~~~~~~~~ -->
        <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
        <form id="userForm" name="userForm" class="form-horizontal">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalHeading">
                                <i class="fas fa-fw fa-graduation-cap"></i>
                                Edit Program
                            </h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <table class="table table-borderless" style="color: black;  font-size: medium;">
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                <tr>
                                    <th>
                                        Program Code
                                    </th>
                                    <td>
                                        <input style="color: black;" type="text" name="courseCode" id="courseCode" class="form-control" required="" value="">
                                    </td>
                                </tr>
                                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <td>
                                        <input style="color: black;" type="text" name="courseName" id="courseName" class="form-control" required="" value="">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn actionBtn" data-dismiss="modal">
                                <span id="footer_action_button" class='glyphicon'> </span>
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" id="save">Save</button>
                        </div>                
                    </div>
                </div>
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
            var table = $('#courseTable').DataTable();
        });

        /* --------------- edit script --------------- */
        $('#courseTable').on('click', '#edit', function () {

            var id = $(this).attr('data-id');
            $.get("/course/edit/"+$(this).attr('data-id'), function (data) {
                $('#editModal').modal('show');
                $('input[id=id]').val(data.id);
                $('input[id=courseName]').val(data.courseName);
                $('input[id=courseCode]').val(data.courseCode);

                $('#modalHeading').html("<i class='fas fa-fw fa-graduation-cap'></i>Edit Program");
            });
        });

        /* --------------- save script --------------- */
        $('body').on('click', '#save', function (e) {
            e.preventDefault();

            $.ajax({
                data: $('#userForm').serialize(),
                url: "course/create",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#userForm').trigger("reset");
                    $('#editModal').modal('hide');
                    alert('successfully updated');
                    window.location.reload();

                },
                error: function (data) {
                    alert('Error!');
                }});
        });

        /* --------------- add script --------------- */
        $('body').on('click', '#add', function () {
            $('#editModal').modal('show');
            $('input[id=id]').val('');
            $('input[id=courseName]').val('');
            $('input[id=courseCode]').val('');
            $('#modalHeading').html("Add Program");
        });

        /* --------------- delete script --------------- */
        $('#courseTable').on('click', '#delete', function (e) {
            var c = confirm('are you sure?');
            if(c == true){
                e.preventDefault();

                $.ajax({
                    data: $('#userForm').serialize(),
                    url: "applicants/delete/"+$(this).attr('data-id'),
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
    $(document).ready(function() {
    $('#courseTable').DataTable( {
        "order": [[ 5, "asc" ]]
    } );
} );
</script>
@endsection