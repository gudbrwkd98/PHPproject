@extends('layout.dashboard')
@section('title', "Organizations")

@section('content-title')
    Organizations


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

    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ add org button modal ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addOrg">
    	Add Organization
    </button>

    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ add organization modal ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <div class="modal fade" id="addOrg" tabindex="-1" role="dialog" aria-labelledby="addOrgLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document" >
			<div class="modal-content text-dark" style="font-size: medium;">
				<form method="POST"  action="{{ route('org.userorg.store',$user = auth()->id()) }}" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="editProfileLabel" style="color: black;">
                            <i class="fas fa-fw fa-book-open"></i>
                            Organization Involvement
                        </h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body ">
				        @CSRF
						{{method_field('POST')}}	
				        @method('POST')
						<table class="table table-borderless text-dark" style="font-size: medium;">
							<input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
						    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                            <tr>
	    						<th style="color: black;">
	    							Organization Name
	    						</th>
	    						<td>
	    							<input type="" name="org_name" id="org_name" required class="form-control" placeholder="">
	    						</td>
	    					</tr>
				            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				            <!-- <tr>
	    						<th style="color: black;">
	    							Position
	    						</th>
	    						<td>
	    							<select id="positionLvl" name="positionLvl" required class="form-control">
	    								<option>--- Please Select ---</option>
	    								<option>President</option>
	    								<option>Vice-President</option>
	    								<option>Secretary</option>
	    								<option>Treasurer</option>
	    								<option>Auditor</option>
	    								<option>Public Relation Officer</option>
	    								<option>Business Manager</option>
	    								<option>Member</option>
	    							</select>
	    						</td>
	    					</tr> -->
                             <tr>
                                <th style="color: black;">
                                    Others
                                </th>
                                <td>
                                    <input type="" name="positionLvl" id="positionLvl" required class="form-control" placeholder="">
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
@endsection

@section('content')
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ orgs data table sample ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="organizationsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="color: black;">
                            <th scope="col">Organization Name</th>
                            <th scope="col">Position Level</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody  style="color: black;">
                        @foreach ($orgs as $org)       
                            <tr>
                                <td>{{$org->org_name}}</td>
                                <td>{{$org->positionLvl}}</td>
                                <td>
                                    <button class="btn btn-light" data-id="{{$org->orgid}}" id="edit">Edit</button>
                                    <button class="btn btn-danger" data-id="{{$org->orgid}}" id="delete">Delete</button>
                                                                    
                                    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
                                    <!-- ~~~~~~~~~~~~~~~~~~~~ edit organization modal ~~~~~~~~~~~~~~~~~~~~ -->
                                    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addImageLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form id="userForm" name="userForm" class="form-horizontal" enctype="multipart/form-data"> 
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addImageLabel"  style="color: black;">
                                                            <i class="fas fa-fw fa-book-open"></i>
                                                            Organization Involvement
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                        <input type="text" name="user_email" value="{{Auth::user()->email}}" hidden>
                                                        <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                                        <table class="table table-borderless text-dark" id="" style="font-size: medium;">
                                                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                                            <tr>
                                                                <th>
                                                              
                                                                </th>
                                                                <td>
                                                                    <input type="text" name="id" id="id" required hidden="">
                                                                </td>
                                                            </tr>
                                                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                                            <tr>
                                                                <th>
                                                                  
                                                                </th>
                                                                <td>
                                                                    <input type="text" name="user_id" id="user_id" required hidden="">
                                                                </td>
                                                            </tr>
                                                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                                            <tr style="color: black;">
                                                                <th>
                                                                    Organization
                                                                </th>
                                                                <td>
                                                                    <input type="text" name="orgs_name" id="orgs_name" class="form-control" required>
                                                                </td>
                                                            </tr>
                                                            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                                                            <tr style="color: black;">
                                        						<th>
                                        							Position
                                        						</th>
                                        						<td>
                                        							<select id="positionLvls" name="positionLvls" required class="form-control">
                                        								
                                        								<option>President</option>
                                        								<option>Vice-President</option>
                                        								<option>Secretary</option>
                                        								<option>Treasurer</option>
                                        								<option>Auditor</option>
                                        								<option>Public Relation Officer</option>
                                        								<option>Business Manager</option>
                                        								<option>Member</option>
                                        							</select>
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

                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ scripts ~~~~~~~~~~~~~~~~~~~~ -->
    <!-- ~~~~~~~~~~~~~~~~~~~~ ~~~~~~~ ~~~~~~~~~~~~~~~~~~~~ -->
    <script>
        $(function () {
            var data = {
                "_token": $('#token').val()
            };

            $(document).ready(function() {
                var table = $('#organizationsTable').DataTable();
            });
                
            /* ---------- edit script ----------*/
            $('#organizationsTable').on('click', '#edit', function () {
                
                var id = $(this).attr('data-id');
                $.get("/userorg/edit/"+id, function (data) {
                    $('#editModal').modal('show');
                   
                    $('input[id=id]').val(data.id);
                    $('input[id=user_id]').val(data.user_id);
                    $('input[id=orgs_name]').val(data.org_name);
                    $('select[id=positionLvls]').val(data.positionLvl);
                    $('#modalHeading').html("Edit Organization");
                });
            });

            /* ---------- save script ----------*/
            $('body').on('click', '#save', function (e) {
                e.preventDefault();
            
                $.ajax({
                data: $('#userForm').serialize(),
                url: "userorg/create/",
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


            /* ---------- delete script ----------*/
            $('#organizationsTable').on('click', '#delete', function (e) {
                var c = confirm('are you sure?');
                if(c == true){
                    e.preventDefault();
                
                    $.ajax({
                    data: $('#userForm').serialize(),
                    url: "userorg/delete/"+$(this).attr('data-id'),
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