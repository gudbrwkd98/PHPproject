@extends('layout.dashboard')
@section('title', "Formal Education Details")
@section('content')
    <form method="POST"  action="{{ route('user.storeFormalEducation',$user = auth()->id()) }}" enctype="multipart/form-data">
        <div class="modal-header bg-danger">
            <h4 class="modal-title text-white" id="addModalLabel" >Formal Education Details</h4>
        </div>
        <div class="modal-body">
            @CSRF
            {{method_field('POST')}}    
            @method('POST')
            <table width="100%" class="table table-borderless">
                <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                @foreach($checkoffice as $checkoff)
                    <input type="text" name="officenotif" value="{{$checkoff->office}}" hidden>
                @endforeach

                <!-- --------------------  school level  -------------------- -->
                    <tr>
                        <th width="25%">
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
                                <th width="25%">
                                    School Level<span class="text-danger">*</span>
                                </th>
                                <td width="">
                                    <input style="color: black;" type="text" class="form-control" id="gradSchoolLvl" name="gradSchoolLvl" value="Graduate Level" disabled="">
                                </td>
                            </tr>
                        <!-- --------------------  gradSchoolName  -------------------- -->
                            <tr>
                                <th>
                                    School Name <span class="text-danger">*</span>
                                </th>
                                <td>
                                    <input style="color: black;" type="text" class="form-control" id="gradSchoolName" name="gradSchoolName">

                                </td>
                            </tr>
                        <!-- --------------------  gradSchoolAddress  -------------------- -->
                            <tr>
                                <th>
                                    School Address <span class="text-danger">*</span>
                                </th>
                                <td>
                                    <input style="color: black;" type="text" class="form-control" id="gradSchoolAddress" name="gradSchoolAddress">

                                </td>
                            </tr>
                        <!-- --------------------  gradYearGraduated  -------------------- -->
                            <tr>
                                <th>
                                    Last Year Attended <span class="text-danger">*</span>
                                </th>
                                <td>
                                    <select style="color: black;" class="form-control" id="gradYearGraduated" name="gradYearGraduated">
                                        @for($date=now()->year; $date>=1950;$date--)
                                        <option value="{{$date}}">{{$date}}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                        <!-- --------------------  gradDegree  -------------------- -->
                            <tr>
                                <th>
                                    Degree<span class="text-danger">*</span>
                                </th>
                                <td>
                                    <input style="color: black;" type="text" class="form-control" id="gradDegree" name="degree" >

                                </td>
                            </tr>
                    </table>

                <!-- --------------------  tertiary_level_table  -------------------- -->
                    <table id="tert" name="tert" class="table table-borderless" style="font-size: medium">
                        <!-- --------------------  tertSchoolLvl  -------------------- -->
                            <tr style="border-top: 2px solid black;">
                                <th width="25%">
                                    School Level<span class="text-danger">*</span>
                                </th>
                                <td width="">
                                    <input style="color: black;" type="text" class="form-control" id="tertSchoolLvl" name="tertSchoolLvl" required="" value="Tertiary Level" disabled="">
                                </td>
                            </tr>
                        <!-- --------------------  tertSchoolName  -------------------- -->
                            <tr>
                                <th>
                                    School Name <span class="text-danger">*</span>
                                </th>
                                <td>
                                    <input style="color: black;" type="text" class="form-control" id="tertSchoolName" name="tertSchoolName" required="">

                                </td>
                            </tr>
                        <!-- --------------------  tertSchoolAddress  -------------------- -->
                            <tr>
                                <th>
                                    School Address <span class="text-danger">*</span>
                                </th>
                                <td>
                                    <input style="color: black;" type="text" class="form-control" id="tertSchoolAddress" name="tertSchoolAddress" required="">

                                </td>
                            </tr>
                        <!-- --------------------  tertYearGraduated  -------------------- -->
                            <tr>
                                <th>
                                    Last Year Attended <span class="text-danger">*</span>
                                </th>
                                <td>
                                    <select style="color: black;" class="form-control" id="tertYearGraduated" name="tertYearGraduated" required="">
                                        @for($date=now()->year; $date>=1950;$date--)
                                        <option value="{{$date}}">{{$date}}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                        <!-- --------------------  tertDegree  -------------------- -->
                            <tr>
                                <th>
                                    Degree<span class="text-danger">*</span>
                                </th>
                                <td>
                                    <input style="color: black;" type="text" class="form-control" id="tertDegree" name="tertDegree" >

                                </td>
                            </tr>
                    </table>

                <!-- --------------------  secondary_level_table  -------------------- -->
                    <table id="second" name="second" class="table table-borderless" style="font-size: medium">
                        <!-- --------------------  secondSchoolLvl  -------------------- -->
                            <tr style="border-top: 2px solid black;">
                                <th width="25%">
                                    School Level<span class="text-danger">*</span>
                                </th>
                                <td width="">
                                    <input style="color: black;" type="text" class="form-control" id="secondSchoolLvl" name="secondSchoolLvl" required="" value="Secondary Level" disabled="">
                                </td>
                            </tr>
                        <!-- --------------------  secondSchoolName  -------------------- -->
                            <tr>
                                <th>
                                    School Name <span class="text-danger">*</span>
                                </th>
                                <td>
                                    <input style="color: black;" type="text" class="form-control" id="secondSchoolName" name="secondSchoolName" required="">

                                </td>
                            </tr>
                        <!-- --------------------  secondSchoolAddress  -------------------- -->
                            <tr>
                                <th>
                                    School Address <span class="text-danger">*</span>
                                </th>
                                <td>
                                    <input style="color: black;" type="text" class="form-control" id="secondSchoolAddress" name="secondSchoolAddress" required="">

                                </td>
                            </tr>
                    </table>

                <!-- --------------------  elementart_level_table  -------------------- -->
                    <table id="elem" name="elem" class="table table-borderless" style="font-size: medium">
                        <!-- --------------------  elemSchoolLvl  -------------------- -->
                            <tr style="border-top: 2px solid black;">
                                <th width="25%">
                                    School Level<span class="text-danger">*</span>
                                </th>
                                <td width="">
                                    <input style="color: black;" type="text" class="form-control" id="elemSchoolLvl" name="elemSchoolLvl" required="" value="Elementary Level" disabled="">
                                </td>
                            </tr>
                        <!-- --------------------  elemSchoolName  -------------------- -->
                            <tr>
                                <th>
                                    School Name <span class="text-danger">*</span>
                                </th>
                                <td>
                                    <input style="color: black;" type="text" class="form-control" id="elemSchoolName" name="elemSchoolName" required="">

                                </td>
                            </tr>
                        <!-- --------------------  elemSchoolAddress  -------------------- -->
                            <tr>
                                <th>
                                    School Address <span class="text-danger">*</span>
                                </th>
                                <td>
                                    <input style="color: black;" type="text" class="form-control" id="elemSchoolAddress" name="elemSchoolAddress" required="">

                                </td>
                            </tr>
                    </table>
            </table>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger zoom"><i class="far fa-save"></i></button>
        </div>
    </form>       


<!-- --------------------  ---------------------  -------------------- -->
<!-- --------------------  scripts for hide/show  -------------------- -->
<!-- --------------------  ---------------------  -------------------- -->
<script type="text/javascript">
    //line of codes for initial hiding of all tables until highest level of education attained is chosen
    $('#grad1').hide();
    $('#tert').hide();
    $('#second').hide();
    $('#elem').hide();
    $('#deg').hide();

    $(function () {
        $("#schoolLvl").change(function () {
            //if highest level attained is "Graduate Level" display: graduate, tertiary, secondary and elementary level tables
            if ($(this).val() == "Graduate Level") {
                //details for graduate level inputs
                    $('#grad1').show();
                    document.getElementById("gradSchoolLvl").value = "Graduate Level";
                    document.getElementById("gradSchoolLvl").required = true;
                    document.getElementById("gradSchoolName").required = true;
                    document.getElementById("gradSchoolAddress").required = true;
                    document.getElementById("gradYearGraduated").required = true;
                    document.getElementById("gradDegree").required = true;
                
                //details for tertiary level inputs
                    $('#tert').show();
                    document.getElementById("tertSchoolLvl").value = "Tertiary Level";
                    document.getElementById("tertSchoolLvl").required = true;
                    document.getElementById("tertSchoolName").required = true;
                    document.getElementById("tertSchoolAddress").required = true;
                    document.getElementById("tertYearGraduated").required = true;
                    document.getElementById("tertDegree").required = true;
                
                //details for secondary level inputs
                    $('#second').show();
                    document.getElementById("secondSchoolLvl").value = "Secondary Level";
                    document.getElementById("secondSchoolLvl").required = true;
                    document.getElementById("secondSchoolName").required = true;
                    document.getElementById("secondSchoolAddress").required = true;
                
                //details for elementary level inputs
                    $('#elem').show();
                    document.getElementById("elemSchoolLvl").value = "Elementary Level";
                    document.getElementById("elemSchoolLvl").required = true;
                    document.getElementById("elemSchoolName").required = true;
                    document.getElementById("elemSchoolAddress").required = true;
            }
            
            //if highest level attained is "Tertiary Level" display: tertiary, secondary and elementary level tables
            else if ($(this).val() == "Tertiary Level") {
                //details for graduate level inputs
                    $('#grad1').hide();
                    document.getElementById("gradSchoolLvl").required = false;
                    document.getElementById("gradSchoolName").required = false;
                    document.getElementById("gradSchoolAddress").required = false;
                    document.getElementById("gradYearGraduated").required = false;
                    document.getElementById("gradDegree").required = false;
                
                //details for tertiary level inputs
                    $('#tert').show();
                    document.getElementById("tertSchoolLvl").value = "Tertiary Level";
                    document.getElementById("tertSchoolLvl").required = true;
                    document.getElementById("tertSchoolName").required = true;
                    document.getElementById("tertSchoolAddress").required = true;
                    document.getElementById("tertYearGraduated").required = true;
                    document.getElementById("tertDegree").required = true;
                
                //details for secondary level inputs
                    $('#second').show();
                    document.getElementById("secondSchoolLvl").value = "Secondary Level";
                    document.getElementById("secondSchoolLvl").required = true;
                    document.getElementById("secondSchoolName").required = true;
                    document.getElementById("secondSchoolAddress").required = true;
                
                //details for elementary level inputs
                    $('#elem').show();
                    document.getElementById("elemSchoolLvl").value = "Elementary Level";
                    document.getElementById("elemSchoolLvl").required = true;
                    document.getElementById("elemSchoolName").required = true;
                    document.getElementById("elemSchoolAddress").required = true;
            }
            
            //if highest level attained is "Secondary Level" display: secondary and elementary level tables
            else if ($(this).val() == "Secondary Level") {
                //details for graduate level inputs
                    $('#grad1').hide();
                    document.getElementById("gradSchoolLvl").required = false;
                    document.getElementById("gradSchoolName").required = false;
                    document.getElementById("gradSchoolAddress").required = false;
                    document.getElementById("gradYearGraduated").required = false;
                    document.getElementById("gradDegree").required = false;
                
                //details for tertiary level inputs
                    $('#tert').hide();
                    document.getElementById("tertSchoolLvl").required = false;
                    document.getElementById("tertSchoolName").required = false;
                    document.getElementById("tertSchoolAddress").required = false;
                    document.getElementById("tertYearGraduated").required = false;
                    document.getElementById("tertDegree").required = false;
                
                //details for secondary level inputs
                    $('#second').show();
                    document.getElementById("secondSchoolLvl").value = "Secondary Level";
                    document.getElementById("secondSchoolLvl").required = true;
                    document.getElementById("secondSchoolName").required = true;
                    document.getElementById("secondSchoolAddress").required = true;
                
                //details for elementary level inputs
                    $('#elem').show();
                    document.getElementById("elemSchoolLvl").value = "Elementary Level";
                    document.getElementById("elemSchoolLvl").required = true;
                    document.getElementById("elemSchoolName").required = true;
                    document.getElementById("elemSchoolAddress").required = true;
            }

            //if highest level attained is "Elementary Level" display: elementary level tables
            else {
                //details for graduate level inputs
                    $('#grad1').hide();
                    document.getElementById("gradSchoolLvl").required = false;
                    document.getElementById("gradSchoolName").required = false;
                    document.getElementById("gradSchoolAddress").required = false;
                    document.getElementById("gradYearGraduated").required = false;
                    document.getElementById("gradDegree").required = false;
                
                //details for tertiary level inputs
                    $('#tert').hide();
                    document.getElementById("tertSchoolLvl").required = false;
                    document.getElementById("tertSchoolName").required = false;
                    document.getElementById("tertSchoolAddress").required = false;
                    document.getElementById("tertYearGraduated").required = false;
                    document.getElementById("tertDegree").required = false;
                
                //details for secondary level inputs
                    $('#second').hide();
                    document.getElementById("secondSchoolLvl").required = false;
                    document.getElementById("secondSchoolName").required = false;
                    document.getElementById("secondSchoolAddress").required = false;
                
                //details for elementary level inputs
                    $('#elem').show();
                    document.getElementById("elemSchoolLvl").value = "Elementary Level";
                    document.getElementById("elemSchoolLvl").required = true;
                    document.getElementById("elemSchoolName").required = true;
                    document.getElementById("elemSchoolAddress").required = true;
            }
        });
    });
</script>
@endsection