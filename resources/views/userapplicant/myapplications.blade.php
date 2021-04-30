@extends('layout.dashboard')
@section('title', "Applications")
@section('content-title')
    My Applications
@endsection
@section('content')


<div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                            
                            
                            <th scope="col">Id</th>
                            <th scope="col">Applicant</th>
                             <th scope="col">Course Applied</th>
                             <th scope="col">Office</th>
                            <th scope="col">Status</th>
                            <th scope="col">Stage</th>
                            <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
               
                        @foreach ($application as $app)       
                            <tr>
                            	
                                <td>{{$app->appid}}</td>
                                <td>{{$app->firstName.' '.$app->middleName.' '.$app->lastName}}</td>
                                 <td>{{$app->courseName}}</td>
                                 <td>{{$app->handler}}</td>
                                 <td>{{$app->status}}</td>
                                 <td>{{$app->stage}}</td>
                                

                                                                



                                  <td>
                                    <form action="{{ route('user.apply.destroy',$app->appid) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                     

											
											  <a  href="{{ route('user.applicationremarks.show', $app->userid) }} "  >
                                           <input type="text" id="userid" name="userid" value="{{$app->userid}}" hidden="">


                                            <button type="button" class="btn btn-secondary btn-sm">View</button>
                                        </a>
                                       
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                              
                            </tr>           
                        @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>


   
@endsection