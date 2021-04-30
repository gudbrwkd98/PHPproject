@extends('layout.dashboard')
@section('title', "Community Page")
@section('content-title')
{{$profile2->firstName." ".$profile2->middleName." ".$profile2->lastName."'s"}}
{{'Community Involvement'}}
    @if(count($errors)>0)
         <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        @endif

   

    <!-- Modal -->
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
	        				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	        				<tr>
	        					<th width="70%">Description</th>
	        					<td>
	        						<textarea rows="3" id="desc" name="desc" required="" class="form-control"></textarea>
	        					</td>
	        				</tr>
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
<div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                <td> <a href="/uploads/narrative/{{$com->narrative_report}}" 
                                          download="{{$com->narrative_report}}" 
                                          style="text-decoration: none;">{{$com->narrative_report}}</a></td>
                                

                                                                <td>




                                    <form action="{{ route('user.usercom.destroy',$com->commid) }}" method="POST">
                                       
                                         <a href="/uploads/narrative/{{$com->narrative_report}}" 
                                         	download="{{$com->narrative_report}}" 
                                         	style="text-decoration: none;">

											<input type="button" class="btn btn-secondary btn-sm" name="" id="" value="View">
											</a>

                      


                                       
                                    
                                    </form>
                                </td>
                              
                            </tr>           
                        @endforeach
                    
                  </tbody>
                </table>
                {{ $comm->links() }}
              </div>
            </div>
          </div>
@endsection