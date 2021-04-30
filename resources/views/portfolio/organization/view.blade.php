@extends('layout.dashboard')
@section('title', "Organization Membership")
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
            Organization Membership
            
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus"></i>
            </button>

            <!-- -------------------------  add modal  ------------------------- -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST"  action="{{ route('user.storeOrganization',$user = auth()->id()) }}" enctype="multipart/form-data">
                            @CSRF
                            {{method_field('POST')}}    
                            @method('POST')
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="addModalLabel">
                                    Organization Membership Details
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
                                        <th>Type<i style="color: red;">*</i></th>
                                        <td>

                                            <select style="color: black;" class="form-control" id="type" name="type" required="">
                                                @if (old('type') != '')
                                                  <option value="{{old('type')}}" selected>{{old('type')}}</option>
                                            @else
                                                   <option value="" disabled="" selected="">--- Membership Type ---</option>
                                            @endif
                                              
                                                <option value="Professional">Professional</option>
                                                <option value="Non-Professional">Non-Professional</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th width="30%">Organization<i style="color: red;">*</i></th>
                                        <td width="70%">
                                            <input style="color: black;" type="text" class="form-control" id="organization" name="organization" required="" value="{{ old('organization') }}">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>Position<i style="color: red;">*</i></th>
                                        <td>
                                            <input style="color: black;" type="text" class="form-control" id="position" name="position" required=""
                                            value="{{ old('position') }}">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>Start Date<i style="color: red;">*</i></th>
                                        <td>
                                            <input style="color: black;" type="date" class="form-control" id="startYear" name="startYear" required="" value="{{ old('startYear') }}">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>End Date<i style="color: red;">*</i></th>
                                        <td>
                                            <input style="color: black;" type="date" class="form-control" id="endYear" name="endYear" required="" 
                                            value="{{ old('endYear') }}">
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
            In this section, please enumerate all memberships in either professional organizations or otherwise
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="20%">Type</th>
                        <th width="20%">Organization</th>
                        <th width="20%">Position</th>
                        <th width="20%">Duration</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comm as $com) 

                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td>{{$com->type}}</td>
                        <td>{{$com->organization}}</td>
                        <td>{{$com->position}}</td>
                        @if($com->duration<12)
                            <td>{{$com->duration}} Month(s)</td>
                        @else
                            <td>
                                {{floor($com->duration/12)}}  
                                @if( floor($com->duration/12 > 1) )
                                    Years
                                @else
                                    Year
                                @endif
                                
                                @if(($com->duration%12)>=1)
                                    And
                                    {{floor($com->duration%12)}} 
                                    @if(floor($com->duration%12 >1))
                                        Months
                                    @else
                                        Month
                                    @endif
                                @endif
                            </td> 
                        @endif
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
        <div class="modal-content">
            <form method="POST"  action="{{ route('user.updateOrganization',$user = auth()->id()) }}" enctype="multipart/form-data">
                @CSRF
                {{method_field('POST')}}    
                @method('POST')
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="addModalLabel">
                        Organization Membership Details
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
                        @foreach($checkoffice as $checkoff)
                        <input type="text" name="officenotif" value="{{$checkoff->office}}" hidden>
                        @endforeach

                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>Type<i style="color: red;">*</i></th>
                            <td>
                                <select style="color: black;" class="form-control" id="type2" name="type2" required="">
                                    <option value="" disabled="" selected="">--- Membership Type ---</option>
                                    <option value="Professional">Professional</option>
                                    <option value="Non-Professional">Non-Professional</option>
                                </select>
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th width="30%">Organization<i style="color: red;">*</i></th>
                            <td width="70%">
                                <input style="color: black;" type="text" class="form-control" id="organization2" name="organization2" required="">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>Position<i style="color: red;">*</i></th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="position2" name="position2" required="">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>Start Date<i style="color: red;">*</i></th>
                            <td>
                                <input style="color: black;" type="date" class="form-control" id="startYear2" name="startYear2" required="" onchange="maxCheckDate(this)">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>End Date<i style="color: red;">*</i></th>
                            <td>
                                <input style="color: black;" type="date" class="form-control" id="endYear2" name="endYear2" required="" onchange="maxCheckDate(this)">
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

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Delete?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">×</span>
                </button>
            </div>

            <div class="modal-body">
                <h5 class="modal-title" id="deleteModalLabel">Are you sure you want to delete this item?</h5>
            </div>

            <div class="modal-footer">
                <form action="{{ route('user.deleteOrganization',$app=Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="text" name="id3" id="id3" required hidden>

                    <button type="submit" class="btn btn-danger zoom"><i class="fas fa-trash-alt"></i></button>
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
            $.get("/organization/editorganization"+id, function (data) {
                $('#editModal').modal('show');
                $('input[id=id2]').val(data.id);
                $('input[id=user_id2]').val(data.user_id);


                $('select[id=type2]').val(data.type);
                $('input[id=organization2]').val(data.organization);
                $('input[id=position2]').val(data.position);
                $('input[id=startYear2]').val(data.startYear);
                $('input[id=endYear2]').val(data.endYear);








                $('#modalHeading').html("Edit Certificates");
            });
        });

        $('#dataTable').on('click', '#delete', function () {

            var id = $(this).attr('data-id');
            $.get("/organization/editorganization"+id, function (data) {
                $('#deleteModal').modal('show');
                $('input[id=id3]').val(data.id);
                $('#modalHeading').html("Edit Certificates");
            });
        });




    });
</script>


@endsection