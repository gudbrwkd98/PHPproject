<?php

namespace App\Http\Controllers\Admin;
use App\Role;
use App\User;
use App\Course;
use DB;
use App\Notification;
use App\Upload;
use Validator;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\http\Traits;

class GenerateController extends Controller {
    
    /* --------------------  -----------  -------------------- */
    /* --------------------  index codes  -------------------- */
    /* --------------------  -----------  -------------------- */
    public function index(Request $request) {
        
        $id = Auth::user()->id;
        
        /* --------------------  ----------------  -------------------- */
        /* --------------------  start noti codes  -------------------- */
        /* --------------------  ----------------  -------------------- */
  
        $not = DB::table('notifications')
        ->select('user_id')
        ->where('notify','=',Auth::user()->id)
        ->get();

        if(Auth::user()->hasAnyRole('user')){
        $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
        ->where('notif','=','Your Application has been Updated!')
        ->paginate(1);
        $countnotif=$notifications->count();
    }



        elseif(Auth::user()->hasAnyRole('admin')){
             $id=Auth::user()->roles()->pluck('name')->toArray();
        $notifications = DB::table('notifications')
        ->where('notify','=',$id)
        ->where('notif','!=','Your Application has been Updated!')
       

        ->paginate(5);
        $countnotif=$notifications->count();
    }

      elseif(Auth::user()->hasAnyRole('eteeap')){
         $id=Auth::user()->roles()->pluck('name')->toArray();
        $notifications = DB::table('notifications')
        ->where('notify','=',$id)
        ->where('notif','!=','Your Application has been Updated!')
        ->paginate(5);
        $countnotif=$notifications->count();
    }
    else{
         $id=Auth::user()->roles()->pluck('name')->toArray();
         $notifications = DB::table('notifications')
        ->where('notify','=',$id)
        ->where('notif','!=','Your Application has been Updated!')
        ->paginate(5);
        $countnotif=$notifications->count();
    }

        /* --------------------  --------------  -------------------- */
        /* --------------------  end noti codes  -------------------- */
        /* --------------------  --------------  -------------------- */
        
        if(request()->ajax()) {
            
            if(!empty($request->from_date)) {
                
             

                        $data = DB::table('users')
                ->join('applications','users.id','=','applications.user_id')
                ->join('profiles','users.id','=','profiles.user_id')
                ->select('applications.id as appid','users.id as userid','applications.office as office','applications.app_status','profiles.firstName as firstName','profiles.lastName as lastName','profiles.middleName as middleName','profiles.gender as gender',DB::raw("DATE_FORMAT(applications.datesubmitted, '%b-%d-%Y') as submitdate"),DB::raw("DATE_FORMAT(applications.datesubmitted, '%b-%d-%Y') as date"),'applications.stage as stage','applications.app_status as status','applications.courseCode as courseCode',(DB::raw('CONCAT(firstName, " ", middleName," ",lastName) AS full_name')))

                ->where('profiles.firstName','LIKE','%'.$request->fname.'%')
                ->where('profiles.lastName','LIKE','%'.$request->lname.'%')
                ->where('applications.office','LIKE','%'.$request->office.'%')
                ->where('applications.courseCode','LIKE','%'.$request->course.'%')
                ->where('applications.stage','LIKE','%'.$request->stage.'%')
                ->where('applications.app_status','LIKE','%'.$request->status.'%')
                ->whereBetween('applications.created_at', array($request->from_date, $request->to_date))
                
                ->where('applications.history','=','')
                ->get();


                 if(!empty($request->from_date2)) {
                
             

                        $data = DB::table('users')
                ->join('applications','users.id','=','applications.user_id')
                ->join('profiles','users.id','=','profiles.user_id')
                ->select('applications.id as appid','users.id as userid','applications.office as office','applications.app_status','profiles.firstName as firstName','profiles.lastName as lastName','profiles.middleName as middleName','profiles.gender as gender',DB::raw("DATE_FORMAT(applications.datesubmitted, '%b-%d-%Y') as submitdate"),DB::raw("DATE_FORMAT(applications.created_at, '%b-%d-%Y') as date"),'applications.stage as stage','applications.app_status as status','applications.courseCode as courseCode',(DB::raw('CONCAT(firstName, " ", middleName," ",lastName) AS full_name')))

                ->where('profiles.firstName','LIKE','%'.$request->fname.'%')
                ->where('profiles.lastName','LIKE','%'.$request->lname.'%')
                ->where('applications.office','LIKE','%'.$request->office.'%')
                ->where('applications.courseCode','LIKE','%'.$request->course.'%')
                ->where('applications.stage','LIKE','%'.$request->stage.'%')
                ->where('applications.app_status','LIKE','%'.$request->status.'%')
                ->whereBetween('applications.created_at', array($request->from_date, $request->to_date))
                ->whereBetween('applications.datesubmitted', array($request->from_date2, $request->to_date2))

                
                ->where('applications.history','=','')
                ->get();

                
            }

                
            }
            else {
                // $id=Auth::user()->roles()->pluck('name')->toArray();
                $data = DB::table('users')
                ->join('applications','users.id','=','applications.user_id')
                ->join('profiles','users.id','=','profiles.user_id')
                
                ->select('applications.id as appid','users.id as userid','applications.office as office','applications.app_status','profiles.firstName as firstName','profiles.lastName as lastName','profiles.middleName as middleName','profiles.gender as gender',DB::raw("DATE_FORMAT(applications.datesubmitted, '%b-%d-%Y') as submitdate"),DB::raw("DATE_FORMAT(applications.created_at, '%b-%d-%Y') as date"),'applications.stage as stage','applications.app_status as status','applications.courseCode as courseCode',(DB::raw('CONCAT(firstName, " ", middleName," ",lastName) AS full_name')))
                ->where('applications.history','=','')

                // ->where('applications.office','=',$id)
                ->orderBy('date','desc')
                ->get();
                // $data = DB::table('users')
                // ->get();
                }
            return datatables()->of($data)->make(true);
            }
            
            $courses = Course::All();
            $roles  = Role::get()->whereNotIn('name', ['user','admin']);
            
        return view ('/generatereport/view',compact('countnotif','notifications','not','roles', 'courses'));

        }   

    /* --------------------  ----------  -------------------- */
    /* --------------------  show codes  -------------------- */
    /* --------------------  ----------  -------------------- */
    public function show(Request $request) {
        $id = Auth::user()->id;
            $not = DB::table('notifications')
            ->select('user_id')
            ->where('notify','=',Auth::user()->id)
            ->get();

        if(Auth::user()->hasAnyRole('user')){
            $notifications = DB::table('notifications')
            ->where('user_id','=',$id)
            ->where('notif','=','Your Application has been Updated!')
            ->paginate(1);
            $countnotif=$notifications->count();
            }

        elseif(Auth::user()->hasAnyRole('admin')){
            $notifications = DB::table('notifications')
            ->where('notify','=',$id)
            ->where('notif','=','Application has been Updated!')
            ->paginate(5);
            $countnotif=$notifications->count();
            }

        elseif(Auth::user()->hasAnyRole('eteeap')){
            $notifications = DB::table('notifications')
            ->where('notify','=',$id)
            ->where('notif','=','Application has been Updated!')
            ->paginate(5);
            $countnotif=$notifications->count();
            }
        
        else{
            $id=Auth::user()->roles()->pluck('name')->toArray();
            $notifications = DB::table('notifications')
            ->where('notify','=',$id)
            ->where('notif','!=','Your Application has been Updated!')
            ->paginate(5);
            $countnotif=$notifications->count();
            }

        if(request()->ajax()){
        
            if(!empty($request->from_date)) {
                $data = DB::table('users')
                    ->join('applications','users.id','=','applications.user_id')
                    ->join('profiles','users.id','=','profiles.user_id')
                    ->select('applications.id as appid','users.id as userid','applications.office','applications.app_status','profiles.firstName','profiles.lastName','profiles.middleName','applications.datesubmitted as date','applications.stage','applications.user_id as appuserid','courseCode')
                     ->where('applications.history','=','')
                     ->whereBetween('date', array($request->from_date, $request->to_date))
                      // ->orderBy('created_at','desc')
                    ->get();
                }
          
            else {
            $data = DB::table('users')
                ->join('applications','users.id','=','applications.user_id')
                ->join('profiles','users.id','=','profiles.user_id')
                ->select('applications.id as appid','users.id as userid','applications.office','applications.app_status','profiles.firstName','profiles.lastName','profiles.middleName','applications.datesubmitted as date','applications.stage','applications.user_id as appuserid','courseCode')
                ->where('applications.history','=','')
                  // ->orderBy('created_at','desc')
                ->get();
            }
      
            return datatables()->of($data)->make(true);
            
            }
        
        // return view ('/generatereport/show',compact('application','countnotif','notifications','not'));
        return view('/generatereport/show',compact('countnotif','notifications','not'));
        
        }
      
    // return view ('/generatereport/show',compact('application','countnotif','notifications','not'));

    /* --------------------  -----------  -------------------- */
    /* --------------------  store codes  -------------------- */
    /* --------------------  -----------  -------------------- */
    public function store(Request $request) {
            
    
        }

    /* --------------------  -------------  -------------------- */
    /* --------------------  destroy codes  -------------------- */
    /* --------------------  -------------  -------------------- */
    public function destroy($id) {
        Applications::destroy($id);
        return redirect ()->back() ->with ('success',' Successfully Application Deleted!');
        }

    /* --------------------  ------------  -------------------- */
    /* --------------------  delete codes  -------------------- */
    /* --------------------  ------------  -------------------- */
    public function delete($id) {    
        Applications::find($id)->delete();
        return response()->json(['success' => 'success']);
        }

}
