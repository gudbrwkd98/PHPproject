<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Upload;
use App\Profile;
use Validator;
use Response;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaffProfileController extends Controller
{



	   public function index()
    {
        //
        $courses = DB::table('courses')
        ->paginate(15);
       
        return view ('profile/view',compact('courses'));
      
    }

    
    public function show($user)
    {


        //
        //$profile=User::find($user);
        $profile = User::find($user)->profiles;
        return view ('/profile/show',compact('profile'));
    }
}
