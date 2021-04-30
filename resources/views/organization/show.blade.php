@extends('layout.dashboard')
@section('title', "Organizations")
@section('content-title')
{{$profile2->firstName." ".$profile2->middleName." ".$profile2->lastName."'s"}}
{{'Organizations'}}
    <!-- Button trigger modal -->
    

    <!-- Modal -->
  <div class="modal fade" id="addOrg" tabindex="-1" role="dialog" aria-labelledby="addOrgLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content text-dark" style="font-size: medium;">
				
				<form method="POST"  action="" enctype="multipart/form-data">
					<div class="modal-header">
						<h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body ">
				        @CSRF
						{{method_field('POST')}}	
				        @method('POST')
						<table class="table table-borderless text-dark" style="font-size: medium;">
						
						    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						   <tr>
	    						<th>
	    							Organization Name
	    						</th>
	    						<td>
	    							<input type="" name="org_name" id="org_name" required class="form-control">
	    						</td>
	    					</tr>
				            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				          <tr>
	    						<th>
	    							Position
	    						</th>
	    						<td>
	    							<select id="positionLvl" name="positionLvl" required class="form-control">
	    								<option>--- Please Select ---</option>
	    								<option>President</option>
	    								<option>Vide-President</option>
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
	         <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                            
                            
                            <th scope="col">Organization</th>
                            <th scope="col">Position Level</th>
                            
                    </tr>
                  </thead>
                  <tbody>
               
                        @foreach ($orgs as $org)       
                            <tr>
                            	
                                <td>{{$org->org_name}}</td>
                                <td>{{$org->positionLvl}}</td>
                                
                              
                            </tr>           
                        @endforeach
                    
                  </tbody>
                </table>
                {{ $orgs->links() }}
              </div>
            </div>
          </div>

@endsection