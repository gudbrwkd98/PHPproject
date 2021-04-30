@extends('layout.dashboard')
@section('title', "Formal Education")
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

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-danger">Formal Education
            <a href="{{ route('user.addeducation')}}">
            <!-- Button trigger modal -->
           <!--  <button type="button" class="btn btn-danger zoom">
                <i class="fas fa-plus"></i>
            </button> -->
            </a>

            <!-- Button trigger modal -->
               @if (count($formaleduc) < 1 )
            <button type="button" class="btn btn-success zoom" data-toggle="modal" data-target="#addModal" >
                <i class="fas fa-plus"></i>
            </button>
            @endif

                        @if (count($formaleduc) >= 1 )
            <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addModal" >
                <i class="fas fa-edit"></i>
            </button>
            @endif
           
          

            <!-- -------------------------  modal start  ------------------------- -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="POST"  action="{{ route('user.storeFormalEducation',$user = auth()->id()) }}" enctype="multipart/form-data">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white" id="addModalLabel">Formal Education Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="text-white">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="font-size: medium">
                                @CSRF
                                {{method_field('POST')}}    
                                @method('POST')
                                <table class="table table-borderless">
                                    <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                    @foreach($checkoffice as $checkoff)
                                        <input type="text" name="officenotif" value="{{$checkoff->office}}" hidden>
                                    @endforeach

                                    <!-- --------------------  school level  -------------------- -->
                                        <tr>
                                            <th width="45%">
                                                Highest Level of Educational Attainment<span class="text-danger">*</span>
                                            </th>
                                            <td>
                                                <select style="color: black;" class="form-control" id="schoolLvl" name="schoolLvl" required="">

                                                    <option value="" disabled="" selected="">--- Choose a School Level ---</option>
                                                    <option value="Graduate Level">Graduate Level</option>
                                                    <option value="Tertiary Level">Tertiary Level</option>
                                                    <option value="Secondary Level">Secondary Level</option>
                                                    <option value="Elementary Level">Elementary Level</option>
                                                    
                                                </select>
                                            </td>
                                        </tr>
                                   
                                    <!-- --------------------  proof_of_completion  -------------------- -->
                                        <tr>
                                            <th>
                                                Proof of Completion<span class="text-danger">*</span>
                                            </th>
                                            <td>
                                                <input type="file" id="transcript" name="transcript" title="PDF files only!" required="">
                                                <br>
                                                <i style="font-size: x-small; color: red;">e.g. Transcript of Records, Report Card, etc. of highest level of education attained</i>
                                            </td>
                                        </tr>

                                    <!-- --------------------  graduate_level_table  -------------------- -->
                                        <table id="grad1" class="table table-borderless" style="font-size: medium">
                                            <!-- --------------------  gradSchoolLvl  -------------------- -->
                                                <tr  style="border-top: 2px solid black;" id="grad">
                                                    <th width="45%">
                                                        School Level<span class="text-danger">*</span>
                                                    </th>
                                                    <td width="">
                                                        <input style="color: black;" type="text" class="form-control" id="gradSchoolLvl" name="gradSchoolLvl" value="Graduate Level" readonly>
                                                    </td>
                                                </tr>
                                            <!-- --------------------  gradSchoolName  -------------------- -->
                                                <tr>
                                                    <th>
                                                        School Name <span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <input style="color: black;" type="text" class="form-control" id="gradSchoolName" name="gradSchoolName" value="{{ old('gradSchoolName') }}">

                                                    </td>
                                                </tr>
                                            <!-- --------------------  gradSchoolAddress  -------------------- -->
                                                <tr>
                                                    <th>
                                                        School Address <span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <input style="color: black;" type="text" class="form-control" id="gradSchoolAddress" name="gradSchoolAddress" value="{{ old('gradSchoolAddress') }}">

                                                    </td>
                                                </tr>
                                            <!-- --------------------  gradYearGraduated  -------------------- -->
                                                <tr>
                                                    <th>
                                                        Last Year Attended <span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <select style="color: black;" class="form-control" id="gradYearGraduated" name="gradYearGraduated" >
                                                               @if (old('gradYearGraduated') != '')
                                                  <option value="{{old('gradYearGraduated')}}" selected>{{old('gradYearGraduated')}}</option>
                                                         @else

                                                            @for($date=now()->year; $date>=1950;$date--)
                                                            <option value="{{$date}}">{{$date}}</option>
                                                            @endfor
                                                            @endif
                                                        </select>
                                                    </td>
                                                </tr>

                                            <!-- --------------------  gradDegree  -------------------- -->
                                                <tr>
                                                    <th>
                                                        Degree<span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <input style="color: black;" type="text" class="form-control" id="gradDegree" name="gradDegree" value="{{old('gradDegree')}}" >

                                                    </td>
                                                </tr>
                                        </table>

                                    <!-- --------------------  tertiary_level_table  -------------------- -->
                                        <table id="tert" name="tert" class="table table-borderless" style="font-size: medium">
                                            <!-- --------------------  tertSchoolLvl  -------------------- -->
                                                <tr style="border-top: 2px solid black;">
                                                    <th width="45%">
                                                        School Level<span class="text-danger">*</span>
                                                    </th>
                                                    <td width="">
                                                        <input style="color: black;" type="text" class="form-control" id="tertSchoolLvl" name="tertSchoolLvl"  value="Tertiary Level" readonly>
                                                    </td>
                                                </tr>
                                            <!-- --------------------  tertSchoolName  -------------------- -->
                                                <tr>
                                                    <th>
                                                        School Name <span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <input style="color: black;" type="text" class="form-control" id="tertSchoolName" name="tertSchoolName" value="{{old('tertSchoolName')}}"  >

                                                    </td>
                                                </tr>
                                            <!-- --------------------  tertSchoolAddress  -------------------- -->
                                                <tr>
                                                    <th>
                                                        School Address <span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <input style="color: black;" type="text" class="form-control" id="tertSchoolAddress" name="tertSchoolAddress" value="{{old('tertSchoolAddress')}}" >

                                                    </td>
                                                </tr>
                                            <!-- --------------------  tertYearGraduated  -------------------- -->
                                                <tr>
                                                    <th>
                                                        Last Year Attended <span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <select style="color: black;" class="form-control" id="tertYearGraduated" name="tertYearGraduated" required="">
                                                             @if (old('tertYearGraduated') != '')
                                                  <option value="{{old('tertYearGraduated')}}" selected>{{old('tertYearGraduated')}}</option>
                                                         @else

                                                            @for($date=now()->year; $date>=1950;$date--)
                                                            <option value="{{$date}}">{{$date}}</option>
                                                            @endfor
                                                            @endif
                                                        </select>
                                                    </td>
                                                </tr>

                                            <!-- --------------------  tertDegree  -------------------- -->
                                                <tr>
                                                    <th>
                                                        Degree<span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <input style="color: black;" type="text" class="form-control" id="tertDegree" name="tertDegree" value="{{old('tertDegree')}}" >

                                                    </td>
                                                </tr>
                                        </table>

                                    <!-- --------------------  secondary_level_table  -------------------- -->
                                        <table id="second" name="second" class="table table-borderless" style="font-size: medium">
                                            <!-- --------------------  secondSchoolLvl  -------------------- -->
                                                <tr style="border-top: 2px solid black;">
                                                    <th width="45%">
                                                        School Level<span class="text-danger">*</span>
                                                    </th>
                                                    <td width="">
                                                        <input style="color: black;" type="text" class="form-control" id="secondSchoolLvl" name="secondSchoolLvl"  value="Secondary Level" readonly>
                                                    </td>
                                                </tr>
                                            <!-- --------------------  secondSchoolName  -------------------- -->
                                                <tr>
                                                    <th>
                                                        School Name <span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <input style="color: black;" type="text" class="form-control" id="secondSchoolName" name="secondSchoolName" value="{{old('secondSchoolName')}}" >

                                                    </td>
                                                </tr>
                                            <!-- --------------------  secondSchoolAddress  -------------------- -->
                                                <tr>
                                                    <th>
                                                        School Address <span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <input style="color: black;" type="text" class="form-control" id="secondSchoolAddress" name="secondSchoolAddress" value="{{old('secondSchoolAddress')}}" >

                                                    </td>
                                                </tr>
                                                 <!-- --------------------  secondYearGraduated  -------------------- -->
                                                <tr>
                                                    <th>
                                                        Last Year Attended <span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <select style="color: black;" class="form-control" id="secondYearGraduated" name="secondYearGraduated">
                                                           @if (old('secondYearGraduated') != '')
                                                  <option value="{{old('secondYearGraduated')}}" selected>{{old('secondYearGraduated')}}</option>
                                                         @else

                                                            @for($date=now()->year; $date>=1950;$date--)
                                                            <option value="{{$date}}">{{$date}}</option>
                                                            @endfor
                                                            @endif
                                                        </select>
                                                    </td>
                                                </tr>
                                        </table>
                                       

                                    <!-- --------------------  elementart_level_table  -------------------- -->
                                        <table id="elem" name="elem" class="table table-borderless" style="font-size: medium">
                                            <!-- --------------------  elemSchoolLvl  -------------------- -->
                                                <tr style="border-top: 2px solid black;">
                                                    <th width="45%">
                                                        School Level<span class="text-danger">*</span>
                                                    </th>
                                                    <td width="">
                                                        <input style="color: black;" type="text" class="form-control" id="elemSchoolLvl" name="elemSchoolLvl" required="" value="Elementary Level" readonly>
                                                    </td>
                                                </tr>
                                            <!-- --------------------  elemSchoolName  -------------------- -->
                                                <tr>
                                                    <th>
                                                        School Name <span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <input style="color: black;" type="text" class="form-control" id="elemSchoolName" name="elemSchoolName" value="{{old('elemSchoolName')}}" >

                                                    </td>
                                                </tr>
                                            <!-- --------------------  elemSchoolAddress  -------------------- -->
                                                <tr>
                                                    <th>
                                                        School Address <span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <input style="color: black;" type="text" class="form-control" id="elemSchoolAddress" name="elemSchoolAddress" value="{{old('elemSchoolAddress')}}" >

                                                    </td>
                                                </tr>
                                                <!-- --------------------  elemYearGraduated  -------------------- -->
                                                <tr>
                                                    <th>
                                                        Last Year Attended <span class="text-danger">*</span>
                                                    </th>
                                                    <td>
                                                        <select style="color: black;" class="form-control" id="elemYearGraduated" name="elemYearGraduated">
                                                            @if (old('elemYearGraduated') != '')
                                                  <option value="{{old('elemYearGraduated')}}" selected>{{old('elemYearGraduated')}}</option>
                                                         @else

                                                            @for($date=now()->year; $date>=1950;$date--)
                                                            <option value="{{$date}}">{{$date}}</option>
                                                            @endfor
                                                            @endif
                                                        </select>
                                                    </td>
                                                </tr>
                                        </table>
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
            <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>School Level</th>
                        <th>School</th>
                        <th>Year Graduated</th>
                        <th>Degree</th>
                        <th>Attachment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comm as $com)       
                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td>{{$com->schoolLvl}}</td>
                        <td>{{$com->schoolName}}<br>{{$com->schoolAddress}}</td>
                        <td>{{$com->yearGraduated}}</td>
                        <td>{{$com->degree}}</td>
                        <td><a target="_blank" href="/uploads/transcript/{{$com->transcript}}" style="text-decoration: none;">{{$com->transcript}}</a></td>
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
            <form id="userForm" name="userForm" method="POST"  action="{{ route('user.updateFormalEducation',$user = auth()->id()) }}" enctype="multipart/form-data">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="addModalLabel">Formal Education Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @CSRF
                    {{method_field('POST')}}    
                    @method('POST')
                    <table class="table table-borderless text-dark" id="" style="font-size: medium;">
                        <!-- ~~~~~~~~~~~~~~~~~~~~ hidden inputs ~~~~~~~~~~~~~~~~~~~~ -->
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="text" name="user_email" value="{{Auth::user()->email}}" hidden>
                        <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                        <input type="text" name="id" id="id" required hidden >
                        <input type="text" name="user_id" id="user_id" required hidden>
                        @foreach($checkoffice as $checkoff)
                            <input type="text" name="officenotif" value="{{$checkoff->office}}" hidden>
                        @endforeach
                        <!-- --------------------  school level  -------------------- -->
                        <tr>
                            <th>
                                School Level<span class="text-danger">*</span>
                            </th>
                            <td>
                                <select style="color: black;" class="form-control" id="schoolLvl2" name="schoolLvl2" required="">
                                    <option value="Elementary Level">Elementary Level</option>
                                    <option value="Secondary Level">Secondary Level</option>
                                    <option value="Tertiary Level">Tertiary Level</option>
                                    <option value="Graduate Level">Graduate Level</option>
                                </select>
                            </td>
                        </tr>

                        <tr>

                            <th>
                                School Name <span class="text-danger">*</span>
                            </th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="schoolName2" name="schoolName2" required="">
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                School Address <span class="text-danger">*</span>
                            </th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="schoolAddress2" name="schoolAddress2" required="">
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Year Graduated <span class="text-danger">*</span>
                            </th>
                            <td>
                                <select style="color: black;" class="form-control" id="yearGraduated2" name="yearGraduated2" required="">

                                    @for($date=now()->year; $date>=1950;$date--)
                                    <option value="{{$date}}">{{$date}}</option>
                                    @endfor

                                </select>

                            </td>
                        </tr>
                            <!-- --------------------  --------------------  -------------------- -->
                        <tr id="deg2">
                            <th>
                                Degree 
                            </th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="degree2" name="degree2" >
                            </td>
                        </tr>
                        <!-- --------------------  --------------------  -------------------- -->
                        <tr>
                            <th>
                                Transcript of Record <span class="text-danger">*</span>
                            </th>
                            <td>
                                <input type="file" id="transcript" name="transcript" title="PDF files only!">
                                <br>
                                <i style="font-size: x-small; color: red;">e.g. Transcript of Records, Report Card, etc.</i>
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
                <form action="{{ route('user.deleteFormalEducation',$app=Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="text" name="id" id="id" required  hidden >
                    <input type="text" id="userid" name="userid" value="" hidden="">
                    <button type="submit" class="btn btn-danger zoom"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">

        $(function () {
            var data = {
                "_token": $('#token').val()
            };

            $(document).ready(function() {
                var table = $('#dataTable').DataTable();
            });

            $('#dataTable').on('click', '#edit', function () {

                var id = $(this).attr('data-id');
                $.get("/education/editformaleducation/"+id, function (data) {
                    $('#editModal').modal('show');
                    $('input[id=id]').val(data.id);
                    $('input[id=user_id]').val(data.user_id);
                    $('input[id=schoolName2]').val(data.schoolName);
                    $('input[id=schoolAddress2]').val(data.schoolAddress);
                    $('select[id=yearGraduated2]').val(data.yearGraduated);
                    $('input[id=degree2]').val(data.degree);
                    $('select[id=schoolLvl2]').val(data.schoolLvl);
                    $('#modalHeading').html("Edit Certificates");
                });
            });

            $('#dataTable').on('click', '#delete', function () {
                var id = $(this).attr('data-id');
                $.get("/education/editformaleducation/"+id, function (data) {
                    $('#deleteModal').modal('show');
                    $('input[id=id]').val(data.id);
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


<script type="text/javascript">
        $('#grad1').hide();
        $('#tert').hide();
        $('#second').hide();
        $('#elem').hide();
        $('#deg').hide();
    $(function () {
        $("#schoolLvl").change(function () {
            if ($(this).val() == "Graduate Level") {
                $('#grad1').show();
                $('#tert').show();
                $('#second').show();
                $('#elem').show();
            }
            else if ($(this).val() == "Tertiary Level") {
                $('#grad1').hide();
                $('#tert').show();
                $('#second').show();
                $('#elem').show();
            }
            else if ($(this).val() == "Secondary Level") {
                $('#grad1').hide();
                $('#tert').hide();
                $('#second').show();
                $('#elem').show();
            }

            else {
                $('#grad1').hide();
                $('#tert').hide();
                $('#second').hide();
                $('#elem').show();
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#schoolLvl2").change(function () {
            if ($(this).val() == "Tertiary Level" || $(this).val() == "Graduate Level") {
                $("#deg2").show();
            }
            else {
                $("#deg2").hide();
                $('#degree2').val('');

            }
        });
    });
</script>
<script>
    $(document).ready(function() {
    $('#dataTable').DataTable( {
        "order": [[ 1, "desc" ]]
    } );
} );
</script>



    @endsection



