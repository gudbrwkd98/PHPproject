@extends('layout.dashboard')
@section('title', "Creative Works")
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
            Creative Works
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger zoom" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus"></i>
            </button>

            <!-- -------------------------  add modal  ------------------------- -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="POST"  action="{{ route('user.storeCreativeWorks',$user = auth()->id()) }}" enctype="multipart/form-data">
                            @CSRF
                            {{method_field('POST')}}    
                            @method('POST')
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white" id="addModalLabel">
                                    Creative Works Details
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
                                            <input style="color: black;" type="text" class="form-control" id="workTitle" name="workTitle" required="">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th width="30%">
                                            Description<i style="color: red;">*</i>
                                        </th>
                                        <td width="70%">
                                            <textarea style="color: black;" rows="3" class="form-control" id="workDescription" name="workDescription" required=""></textarea>
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Date Accomplished<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="date" class="form-control" id="dateAccomplished" name="dateAccomplished" required="" onchange="maxCheckDate(this)">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Publishing Agency / Sponsoring Institution<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <input style="color: black;" type="text" class="form-control" id="agencyName" name="agencyName" required="">
                                        </td>
                                    </tr>
                                    <!-- -------------------------  -------------------------  ------------------------- -->
                                    <tr>
                                        <th>
                                            Address of Agency / Institution<i style="color: red;">*</i>
                                        </th>
                                        <td>
                                            <textarea style="color: black;" rows="3" class="form-control" name="agencyAddress" id="agencyAddress" required=""></textarea>
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
            In this section, enumerate the various creative works you have accomplished and other special accomplishments. Examples of these are interventions, published and unpublished literary fiction and non-fiction, writings, musical work, products of visual performing arts, exceptional accomplishments in sports, social, cultural and leisure activities, etc. which can lead one to conclude the level of expertise you have obtained on certain fields of interest. Include also participation in competitions and prizes obtained.
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="20%">Title</th>
                        <th width="20%">Description</th>
                        <th width="20%">Date Accomplished</th>
                        <th width="20%">Publishing Agency / Sponsoring Institution</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comm as $com) 
                    <!-- -------------------------  -------------------------  ------------------------- -->
                    <tr>
                        <td>{{$com->workTitle}}</td>
                        <td>{{$com->workDescription}}</td>
                        <td>
                            {{\Carbon\Carbon::parse($com->dateAccomplished)->format('M. d, Y')}}
                        </td>
                        <td>
                            {{$com->agencyName}}
                            <br>
                            {{$com->agencyAddress}}
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST"  action="{{ route('user.updateCreativeWorks',$user = auth()->id()) }}" enctype="multipart/form-data">
                @CSRF
                {{method_field('POST')}}    
                @method('POST')
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="addModalLabel">
                        Creative Works Details
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
                            <th width="30%">
                                Title<i style="color: red;">*</i>
                            </th>
                            <td width="70%">
                                <input style="color: black;" type="text" class="form-control" id="workTitle2" name="workTitle2" required="">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th width="30%">
                                Description<i style="color: red;">*</i>
                            </th>
                            <td width="70%">
                                <textarea style="color: black;" rows="3" class="form-control" id="workDescription2" name="workDescription2" required=""></textarea>
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Date Accomplished<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="date" class="form-control" id="dateAccomplished2" name="dateAccomplished2" required="" onchange="maxCheckDate(this)">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Publishing Agency / Sponsoring Institution<i style="color: red;">*</i>
                            </th>
                            <td>
                                <input style="color: black;" type="text" class="form-control" id="agencyName2" name="agencyName2" required="">
                            </td>
                        </tr>
                        <!-- -------------------------  -------------------------  ------------------------- -->
                        <tr>
                            <th>
                                Address of Agency / Sponsoring Institution<i style="color: red;">*</i>
                            </th>
                            <td>
                                <textarea style="color: black;" rows="3" class="form-control" name="agencyAddress2" id="agencyAddress2" required=""></textarea>
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
                <form action="{{ route('user.deleteCreativeWorks',$app=Auth::user()->id) }}" method="POST">
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
            $.get("/creative-works/editcreativeworks"+id, function (data) {
                $('#editModal').modal('show');
                $('input[id=id2]').val(data.id);
                $('input[id=user_id2]').val(data.user_id);
                $('input[id=dateAccomplished2]').val(data.dateAccomplished);
                $('input[id=workTitle2]').val(data.workTitle);
                $('textarea[id=workDescription2]').val(data.workDescription);
                $('input[id=agencyName2]').val(data.agencyName);
                $('textarea[id=agencyAddress2]').val(data.agencyAddress);
                $('#modalHeading').html("Edit Creative Work Details");
            });
        });

        $('#dataTable').on('click', '#delete', function () {

            var id = $(this).attr('data-id');
            $.get("creative-works/editcreativeworks"+id, function (data) {
                $('#deleteModal').modal('show');
                $('input[id=id3]').val(data.id);
                $('#modalHeading').html("Edit Certificates");
            });
        });




    });
</script>




@endsection