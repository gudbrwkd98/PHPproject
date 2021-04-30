@extends('layout.dashboard')
@section('title', "Certification Examinations")
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
            Certification Examinations
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus"></i>
            </button>

            <!-- -------------------------  add modal  ------------------------- -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="POST"  action="{{ route('user.storeCertificationExam',$user = auth()->id()) }}" enctype="multipart/form-data">
                            @CSRF
                            {{method_field('POST')}}    
                            @method('POST')
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white" id="addModalLabel">
                                    Certification Examination Details
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
                                            Title of Certification<i style="color: red;">*</i>
                                        </th>
                                        <td width="70%">
                                            <input style="color: black;" type="text" class="form-control" id="certificateTitle" name="certificateTitle" required=""
                                            value="{{ old('certificateTitle') }}">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Name of Certifying Agency<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="text" class="form-control" id="nameofAgency" name="nameofAgency" required=""
                                            value="{{ old('nameofAgency') }}">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Address of Certifying Agency<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <textarea style="color: black;" rows="2" class="form-control" id="addressofAgency" name="addressofAgency" required=""
                                           >{{{old('addressofAgency') }}}</textarea>
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Date Certified<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="date" class="form-control" id="startYear" name="startYear"required="" value="{{ old('startYear') }}">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Expiry Date<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="date" class="form-control" id="expiryDate" name="expiryDate"required="" value="{{ old('expiryDate') }}">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Rating<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="text" class="form-control" id="rating" name="rating" required=""
                                             value="{{ old('rating') }}">
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
                                            <i style="color: red; font-size: x-small;">*Softcopy of corresponding certificate</i>
                                        </td>
                                    </tr>
                                </table>        
                            </div>
                            <div class="modal-footer">
                                <button type="submit"  class="btn btn-danger zoom"><i class="far fa-save"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </h3>
        <p style="text-indent: 50px;" class="mb-0">
            In this section, please give detailed information on certification examinations taken for vocational and other skills
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Certificate</th>
                        <th>Attachment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comm as $com) 
                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td>
                            {{$com->certificateTitle}}
                        </td>
                        <td>
                            <a target="_blank" href="/uploads/transcript/{{$com->file}}"  style="text-decoration: none;">{{$com->file}}</a>
                        </td>
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addImageLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST"  name="userForm" id="userForm" action="{{ route('user.updateCertificationExam',$user = auth()->id()) }}" enctype="multipart/form-data">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="addModalLabel">
                        Certification Examination Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @CSRF
                    {{method_field('POST')}}    
                    @method('POST')
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
                            <th width="30%">
                                Title of Certification<i style="color: red;">*</i>
                            </th>
                            <td width="70%">
                                <input style="color: black;" type="text" class="form-control" id="certificateTitle2" name="certificateTitle2" required=""
                                >
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Name of Certifying Agency<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="nameofAgency2" name="nameofAgency2" required="">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Address of Certifying Agency<i style="color: red;">*</i>
                            </th>
                            <td>
                                <textarea style="color: black;" rows="2" class="form-control" id="addressofAgency2" name="addressofAgency2" required=""></textarea>
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Date Certified<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="date" class="form-control" id="startYear2" name="startYear2"  required="">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Expiry Date<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="date" class="form-control" id="expiryDate2" name="expiryDate2"  required="">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Rating<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="rating2" name="rating2" required="">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Attachment<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input type="file" id="file2" name="file2"  title="PDF files only">
                                <br>
                                <i style="color: red; font-size: x-small;">*Softcopy of corresponding certificate</i>
                            </td>
                        </tr>
                    </table>        
                </div>
                <div class="modal-footer">
                    <button  name="edit2" id="edit2" class="btn btn-danger zoom"><i class="far fa-save"></i></button>
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
                <form action="{{ route('user.deleteCertificationExam',$app=Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="text" name="id3" id="id3" required hidden>

                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ scripts ~~~~~~~~~~~~~~~~~~~~ -->
<!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
<script type="text/javascript">
    //compares date inputs
    function compareDates(){
        var dateCert = document.getElementById("startYear").value;
        var expDate = document.getElementById("expiryDate").value;
       
    }
    function compareDates2(){


            var dateCert2 = document.getElementById("startYear2").value;
        var expDate2 = document.getElementById("expiryDate2").value;
   
       
    }
</script>
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
            $.get("/certificationexam/editcertificationexam/"+id, function (data) {
                $('#editModal').modal('show');
                $('input[id=id2]').val(data.id);
                $('input[id=user_id2]').val(data.user_id);
                $('input[id=nameofAgency2]').val(data.nameofAgency);
                $('input[id=certificateTitle2]').val(data.certificateTitle);
                $('textarea[id=addressofAgency2]').val(data.addressofAgency);
                $('input[id=startYear2]').val(data.startYear);
                $('input[id=expiryDate2]').val(data.expiryDate);
                $('input[id=rating2]').val(data.rating);
                $('#modalHeading').html("Edit Certificates");
            });
        });

        $('#dataTable').on('click', '#delete', function () {

            var id = $(this).attr('data-id');
            $.get("/certificationexam/editcertificationexam/"+id, function (data) {
                $('#deleteModal').modal('show');
                $('input[id=id3]').val(data.id);
                $('#modalHeading').html("Edit Certificates");
            });
        });




    });
</script>



@endsection