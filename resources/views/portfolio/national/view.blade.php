@extends('layout.dashboard')
@section('title', "National / Licensure Exams")
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
            National / Licensure Exams Taken and Passed
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus"></i>
            </button>

            <!-- -------------------------  add modal  ------------------------- -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="font-size: medium; color: black;">
                        <form method="POST"  action="{{ route('user.storeLicensureExam',$user = auth()->id()) }}" enctype="multipart/form-data">
                            @CSRF
                            {{method_field('POST')}}    
                            @method('POST')
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white" id="addModalLabel">
                                    National / Licensure Exam Details
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
                                        <th width="30%">
                                            Title<i style="color: red;">*</i>
                                        </th>
                                        <td width="70%">
                                            <input style="color: black;" type="text" class="form-control" id="licenseTitle" name="licenseTitle" required="">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Expiry Date<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="date" class="form-control" id="expiryDate" name="expiryDate" onchange="minCheckDate(this)" required="">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Attachment<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input type="file" id="file" name="file" required="" title="PDF files only">
                                            <br>
                                            <i style="color: red; font-size: x-small;">*Softcopy of corresponding examination</i>
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
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="display table table-bordered" width="100%" cellspacing="0" id="dataTable">
                <thead>
                    <tr>
                        <th width="33%">Title</th>
                        <th width="33%">Upload</th>
                        <th width="33%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comm as $com) 

                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td>{{$com->licenseTitle}}</td>

                        <td><a target="_blank" href="/uploads/transcript/{{$com->file}}"  style="text-decoration: none;">{{$com->file}}

                        </a></td>

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
        <div class="modal-content" style="font-size: medium; color: black;">
            <form method="POST"  action="{{ route('user.updateLicensureExam',$user = auth()->id()) }}" enctype="multipart/form-data">
                @CSRF
                {{method_field('POST')}}    
                @method('POST')
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="addModalLabel">
                        National / Licensure Exam Details
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
                        <!-- -------------------------  -------------------------  ------------------------- -->

                        <input type="text" name="user_id2" value="{{Auth::user()->id}}" hidden>
                        @foreach($checkoffice as $checkoff)
                        <input type="text" name="officenotif" value="{{$checkoff->office}}" hidden>
                        @endforeach


                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th width="30%">
                                Title<i style="color: red;">*</i>
                            </th>
                            <td width="70%">
                                <input style="color: black;" type="text" class="form-control" id="licenseTitle2" name="licenseTitle2" required="">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Expiry Date<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="date" class="form-control" id="expiryDate2" name="expiryDate2" required="">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Attachment<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input type="file" id="file2" name="file2" title="PDF files only">
                                <br>
                                <i style="color: red; font-size: x-small;">*Softcopy of corresponding examination</i>
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
                <form action="{{ route('user.deleteLicensureExam',$app=Auth::user()->id) }}" method="POST">
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
            $.get("/licensure/editlicensureexam"+id, function (data) {
                $('#editModal').modal('show');
                $('input[id=id2]').val(data.id);
                $('input[id=user_id2]').val(data.user_id);
                $('input[id=licenseTitle2]').val(data.licenseTitle);
                $('input[id=expiryDate2]').val(data.expiryDate);
                
                $('#modalHeading').html("Edit Certificates");
            });
        });

        $('#dataTable').on('click', '#delete', function () {

            var id = $(this).attr('data-id');
            $.get("/licensure/editlicensureexam"+id, function (data) {
                $('#deleteModal').modal('show');
                $('input[id=id3]').val(data.id);
                $('#modalHeading').html("Edit Certificates");
            });
        });




        $('#dataTable').on('click', '#delete2', function (e) {
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