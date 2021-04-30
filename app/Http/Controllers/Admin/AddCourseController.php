<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\Applications;
use DB;
use Redirect,Response;
use App\Role;
use Illuminate\Support\Facades\Auth;

class AddCourseController extends Controller
{
    //

    public function index()
    {
          $id = Auth::User()->id;
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
        ->where('user_id','=',$id)
        ->where('notif','!=','Your Application has been Updated!')
        ->paginate(1);
        $countnotif=$notifications->count();
    }


        $courses = Course::All();
         $rolechoices = Role::get()->whereNotIn('name', ['user','admin','eteeap']);


        return view ('courses/index2',compact('courses','countnotif','not','notifications','rolechoices'));
    }

      public function store(Request $request)
    { 
    
    $check = DB::table('courses')
       
        ->select('courseCode')
        ->where('courseCode','=',request('courseCode1'))
        // ->orwhere('courseName','=',request('courseName1'))
        // ->where('applications.status','!=','completed')
        
        ->get()->count();
        if($check>=1)
        {
        return redirect ()->back() ->with ('error','Course Code Taken!');

        }
         $check2 = DB::table('courses')
       
        ->select('courseCode')
        // ->where('courseCode','=',request('courseCode1'))
        ->where('courseName','=',request('courseName1'))
        // ->where('applications.status','!=','completed')
        
        ->get()->count();
        if($check2>=1)
        {
        return redirect ()->back() ->with ('error','Course Name Taken!');

        }
        
        Course::updateOrCreate(['id' => $request->id],
            [
                'courseCode' => $request->courseCode1,
                'officeCode' => $request->officeCode1,

                'courseName' => $request->courseName1
            ]);        
   
         return redirect ()->back() ->with ('success',' Successfully Course Added!');
    }

          public function create(Request $request)
    { 
        Course::updateOrCreate(['id' => $request->id],
            [
                'courseCode' => $request->courseCode,
                'officeCode' => $request->officeCode,

                'courseName' => $request->courseName
            ]);   

        $updateapp = DB::table('applications')->where('courseCode', '=',  $request->courseCodex)->update(array('courseCode' => $request->courseName));

  

        $applicationupdate = DB::table('applications')->where('courseCode', '=',  $request->courseCodex)->update(array('courseCode' =>  $request->courseName));
                
   
         return redirect ()->back() ->with ('success',' Successfully Course Updated!');
    
    }

      public function delete($id)
    {
        $course=request('course3');
        $check = DB::table('plans')
        //->join('applications','users.id','=','applications.user_id')
        ->select('priority1','priority2','priority3')
        ->where('priority1','=',$course)
        ->orwhere('priority2','=',$course)
        ->orwhere('priority3','=',$course)
        // ->where('applications.status','!=','completed')
        ->get()->count();

        if($check>=1)
        {
    
            return redirect ()->back() ->with('error', 'Program is enrolled by applicant!');

        }

          $idd=request('id3');
        $deletedRows = Course::where('id', $idd)->delete();
        return redirect ()->back() ->with('success', 'Successfully Program Deleted!');
    }

    public function edit($id) {
        $course = Course::find($id);
        return response()->json($course);
    }
}
