<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Applications;
use App\Profile;
use DB;
use Auth;
use App\User;
use App\Roles;
use App\Remark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RemarksStaffController extends Controller
{
    //
    public function index()
    {
         //$user2=request('userid');
         $profile2=User::find($user);
        
         $profile = User::find($user)->profiles;

         $users = User::whereHas('roles', function($q){$q->whereIn('name', ['dean','eteeap']);})->get();
       
         //$app=$request->get('appid');

      $app2=DB::table('applications')

        ->where('user_id', $user)
        ->where('handler','!=',Auth::user()->email)
        ->latest()->get();
        $app = substr($app2->pluck('id'), 1,-1);
        $handler = substr($app2->pluck('handler'), 1,-1);
        $status = substr($app2->pluck('status'), 1,-1);
        $lastupdate = substr($app2->pluck('updated_at'), 1,-1);
        $lastupdate=$lastupdate=\Carbon\Carbon::now('America/Boise')->subDay()->format('m/d/Y h:m A');

        $app3=DB::table('remarks')
        
        ->where('application_id','=', $app)
        ->get();

        $statuspercent=0;
        if($status == "INITIAL ASSESSMENT"){
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
       

        



        return view ('/applicant/remarks',compact('profile','users','profile2','app','handler','status','lastupdate','app3','statuspercent'));
    }

        public function edit($id) {
        $remarks = Remark::find($id);
        return response()->json($remarks);
    }
}
