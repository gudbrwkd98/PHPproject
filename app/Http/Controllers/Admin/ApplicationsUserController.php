<?php

namespace App\Http\Controllers\Admin;

use App\Applications;
use App\Profile;
use App\User;
use App\FormalEducation;
use Carbon\Carbon;
use DB;
use eloq;
use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ApplicationsUserController extends Controller
{
    public function index()
    {
      
      
        $id=Auth::user()->id;
        $application = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->join('profiles','users.id','=','profiles.user_id')
        ->join('courses','applications.course','=','courses.id')
        ->select('applications.id as appid','users.id as userid','applications.course','applications.handler','applications.app_status','profiles.firstName','profiles.lastName','profiles.middleName','courses.courseName','applications.stage')
        ->where('applications.user_id','=',$id)
        
        ->paginate(15);

        
       
       return view ('userapplicant/myapplications',compact('application'));

    }

     public function destroy($id)
    {

        $deletedRows = Applications::where('user_id', $id)->delete();

         return redirect('/')->with('success', 'Successfully Application Deleted!');
    }


   


   
     


}
