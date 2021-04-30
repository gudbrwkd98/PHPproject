@extends('layout.dashboard')
@section('title', "Community Page")
@section('content-title')
Community Involvement

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
    <!-- ~~~~~~~~~~~~~~~~~~~~ add comm button   ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addCom">
       Add Community
    </button>

    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ add comm modal    ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <div class="modal fade" id="addCom" tabindex="-1" role="dialog" aria-labelledby="addComLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST"  action="{{ route('user.usercom.store',$user = auth()->id()) }}" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCommunityLabel">
                            <i class="fas fa-fw fa-users"></i>
                            Add Community Involvement
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @CSRF
                        {{method_field('POST')}}	
                        @method('POST')
                        <input type="text" name="user_email" value="{{Auth::user()->email}}" hidden>
                        <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                        <table class="table table-borderless text-dark" style="font-size: medium;">
                            <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
                            <tr>
                                <th width="70%">Description</th>
                                <td>
                                    <textarea style="color: black;" rows="3" id="desc" name="desc" required="" class="form-control"></textarea>
                                </td>
                            </tr>
                            <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
                            <tr>
                                <th>{{__('Narrative Report')}}</th>
                                <td>
                                    <input type="file" id="narrative" name="narrative">
                                    <div>{{$errors->first('image')}}</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"> {{ __('Save Changes') }} </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ community data table ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Description</th>
                            <th scope="col">Narrative Report</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comm as $com)       
                            <tr>
                                <td>{{$com->description}}</td>
                                <td> 
                                    <a href="/uploads/narrative/{{$com->narrative_report}}" download="{{$com->narrative_report}}" style="text-decoration: none;">{{$com->narrative_report}}</a>
                                </td>
                                <td>
                                    <a href="/uploads/narrative/{{$com->narrative_report}}" download="{{$com->narrative_report}}" style="text-decoration: none;">
                                        <input type="button" class="btn btn-secondary"value="View">
                                    </a>
                                    <button class="btn btn-danger" data-id="{{$com->commid}}" id="delete">Delete</button>

                                    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
                                    <!-- ~~~~~~~~~~~~~~~~~~~~ edit modal ~~~~~~~~~~~~~~~~~~~~ -->
                                    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addImageLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form id="userForm" name="userForm" class="form-horizontal" enctype="multipart/form-data"> 
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addImageLabel">
                                                            <i class="far fa-image"></i>
                                                            Edit Certificate
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-borderless text-dark" id="" style="font-size: medium;">
                                                            <!-- ~~~~~~~~~~~~~~~~~~~~ hidden inputs ~~~~~~~~~~~~~~~~~~~~ -->
                                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                            <input type="text" name="user_email" value="{{Auth::user()->email}}" hidden>
                                                            <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                                            <input type="text" name="id" id="id" required hidden>
                                                            <input type="text" name="user_id" id="user_id" required hidden>
                                                            <input type="text" name="certificates" id="certificates" required hidden="">
                                                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                                            <tr>
                                                                <th>
                                                                    Picture
                                                                </th>
                                                                <td>
                                                                    <a href="" name="link" id="link" target="blank">
                                                                        <img src="" data-toggle="modal" class="rounded-circle" style="height: 7rem;width:7rem ;" alt="Image" id="Image" name="Image" >
                                                                    </a>
                                                                    <input type="file" id="picture" name="picture" hidden="">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" id="save">{{ __('Save Changes') }}</button>
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
                                                    <h5 class="modal-title" id="deleteModalLabel">Delete Course</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you wish to delete this community involvement?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('user.usercom.destroy',$com->commid) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger" value="Delete">
                                                    </form>
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>           
                        @endforeach
                    </tbody>
                </table>
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
            $.get("/usercom/edit/"+id, function (data) {
                $('#editModal').modal('show');
                $('input[id=id]').val(data.id);
                 $('input[id=user_id]').val(data.user_id);
                  
                 $('#Image').attr('src', 'uploads/certificates/'+data.certificates);
                 $('#link').attr('href', 'uploads/certificates/'+data.certificates);

                $('#modalHeading').html("Edit Certificates");
            });
        });

        $('body').on('click', '#save', function (e) {
            e.preventDefault();
        
            $.ajax({
            data: $('#userForm').serialize(),
            url: "usercom/create/",
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
                url: "usercom/delete/"+$(this).attr('data-id'),
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