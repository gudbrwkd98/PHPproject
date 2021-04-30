<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Applications;
use App\Profile;
use App\User;
use DB;
use Validator;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SubmittedApplicationsController extends Controller
{
    public function index()
    {
    	return view('course/view');
    }

      public function store(Request $request)
    {
        $id = Auth::User()->id;
        $check = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('applications.user_id')
        ->where('applications.user_id','=',$id)
        // ->where('applications.status','!=','completed')
        ->get()->count();
        if($check>=1)
        {
        return redirect ()->back() ->with ('error','You have a current Application on Progress!');

        }
         $application = new Applications();
        //Check that current user isn't editing themselves
            $request->validate([
            'user_id'=>['required','string','max:10'],
            // 'course'=>['required','string','max:50'],
            // 'handler'=>['required','string','max:20'],
            // 'status'=>['required','string','max:20'],
           
            ]); 
       

        $application->user_id=request('user_id');
        $application->course = request('course');
        $application->resubmitto = "eteeap";
        $application->handler = "eteeap";
        $application->stage= "Initial Assesement";
        $application->status = "On Process";
      
    $application->save();
  
    return redirect ()->back() ->with ('success',' Successfully Application Submitted!');
    }


     

    public function update(Request $request)
    { 
        $date=Carbon::now();
        $application=DB::table('applications')
        ->where('user_id', $request->get('user_id'))
        ->update(['handler' => $request->get('resubmit'),
                
                 'updated_at'       => $date,
                

             ]);    
   
         return redirect ()->back() ->with ('success',' Successfully Application Submitted!');
    }

      public function delete($id)
    {
        
         Applications::find($id)->delete();
        return response()->json(['success' => 'success']);
    }

     public function edit($id) {
        $application = Applications::find($id);
        return response()->json($application);
    }

    public function destroy($id)
    {

        
        Applications::destroy($id);
         return redirect ()->back() ->with ('success',' Successfully Application Deleted!');
    }

    public function show($id)
    {

        
    }



    
}
