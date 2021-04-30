<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Applications;
use App\Profile;
use App\Notification;
use DB;
use Auth;
use App\User;
use App\Roles;
use App\Remark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RemarksUserController extends Controller
{
    //
    // public function index()
    // {

    // }
    public function destroy($id)
    {

        $deletedRows = Notification::where('user_id',Auth::user()->id)->delete();
        $id=Auth::user()->id;
         $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
        ->paginate(1);
        $countnotif=$notifications->count();

         //$user2=request('userid');
       
        $user=Auth::user()->id;
         $profile2=User::find($user);
        
         $profile = User::find($user)->profiles;

         $users = User::whereHas('roles', function($q){$q->whereIn('name', ['dean','eteeap']);})->get();
       
         //$app=$request->get('appid');

      $app2=DB::table('applications')

        ->where('user_id', $user)
        //->where('handler','!=',Auth::user()->email)
        ->latest()->get();
        $app = substr($app2->pluck('id'), 1,-1);
        $handler = substr($app2->pluck('handler'), 1,-1);
        $status = substr($app2->pluck('status'), 1,-1);
        $lastupdate = substr($app2->pluck('updated_at'), 2,-2);
        //$lastupdate=$lastupdate=\Carbon\Carbon::parse()->format('M-d-Y g:i A');
        $updater = substr($app2->pluck('updated_at'), 1,-1);

        $app3=DB::table('remarks')
        
        ->where('application_id','=', $app)
        ->get();
        $statuspercent=0;
        if($status == '"INITIAL ASSESSMENT"'){
             $statuspercent=10;
        }
        elseif($status == '"SECOND ASSESSMENT"'){
             $statuspercent=20;
        }

        elseif($status == '"ADMISSION"'){
             $statuspercent=30;
        }

         elseif($status == '"THIRD ASSESSMENT"'){
             $statuspercent=40;
        }
        elseif($status == '"ENROLLMENT"'){
             $statuspercent=50;
        }

        elseif($status == '"COMPLETION OF ENHANCEMENT PROGRAM"'){
             $statuspercent=60;
        }

        elseif($status == '"FINAL ASSESSMENT"'){
             $statuspercent=70;
        }

        elseif($status == '"PROCESS PRIOR GRADUATION"'){
             $statuspercent=90;
        }

        elseif($status == '"COMPLETED"'){
             $statuspercent=100;
        }

        
        $id=Auth::user()->id;
        $application = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->join('profiles','users.id','=','profiles.user_id')
        ->join('courses','applications.course','=','courses.id')
        ->select('applications.id as appid','users.id as userid','applications.course','applications.handler','applications.status','profiles.firstName','profiles.lastName','profiles.middleName','courses.courseName')
        ->where('applications.user_id','=',$id)
        
        ->paginate(10);


        



        return view ('/userapplicant/myremarks',compact('profile','users','profile2','app','handler','status','lastupdate','app3','statuspercent','updater','application','notifications','countnotif'));
    }
    public function index()
    {
         $deletedRows = Notification::where('user_id',Auth::user()->id)->delete();
        $id=Auth::user()->id;
         $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
        ->paginate(1);
        $countnotif=$notifications->count();

         //$user2=request('userid');
       
    	$user=Auth::user()->id;
         $profile2=User::find($user);
        
         $profile = User::find($user)->profiles;

         $users = User::whereHas('roles', function($q){$q->whereIn('name', ['dean','eteeap']);})->get();
       
        
      $app2=DB::table('applications')

        ->where('user_id', $user)

        ->latest()->get();
        $app = substr($app2->pluck('id'), 1,-1);
        $handler = substr($app2->pluck('handler'), 1,-1);
        $status = substr($app2->pluck('status'), 1,-1);
        $lastupdate = substr($app2->pluck('updated_at'), 2,-2);
        //$lastupdate=$lastupdate=\Carbon\Carbon::parse()->format('M-d-Y g:i A');
        $updater = substr($app2->pluck('updated_at'), 1,-1);

        $app3=DB::table('remarks')
        
        ->where('application_id','=', $app)
        ->paginate(10);



        $statuspercent=0;
        if($status == '"INITIAL ASSESSMENT"'){
             $statuspercent=10;
        }
        elseif($status == '"SECOND ASSESSMENT"'){
             $statuspercent=20;
        }

        elseif($status == '"ADMISSION"'){
             $statuspercent=30;
        }

         elseif($status == '"THIRD ASSESSMENT"'){
             $statuspercent=40;
        }
        elseif($status == '"ENROLLMENT"'){
             $statuspercent=50;
        }

        elseif($status == '"COMPLETION OF ENHANCEMENT PROGRAM"'){
             $statuspercent=60;
        }

        elseif($status == '"FINAL ASSESSMENT"'){
             $statuspercent=70;
        }

        elseif($status == '"PROCESS PRIOR GRADUATION"'){
             $statuspercent=90;
        }

        elseif($status == '"COMPLETED"'){
             $statuspercent=100;
        }

        
        $id=Auth::user()->id;
        $application = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->join('profiles','users.id','=','profiles.user_id')
        ->join('courses','applications.course','=','courses.id')
        ->select('applications.id as appid','users.id as userid','applications.course','applications.handler','applications.status','profiles.firstName','profiles.lastName','profiles.middleName','courses.courseName')
        ->where('applications.user_id','=',$id)
        
        ->paginate(15);


        



        return view ('/userapplicant/myremarks',compact('profile','users','profile2','app','handler','status','lastupdate','app3','statuspercent','updater','application','notifications','countnotif'));
    }

        public function edit($id) {
        $remarks = Remark::find($id);
        return response()->json($remarks);
    }

       public function delete($id)
    {
        
         Applications::find($id)->delete();
        return response()->json(['success' => 'success']);
    }

       public function show($id)
    {
        
     
    }
}
