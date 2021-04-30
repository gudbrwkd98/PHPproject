<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Upload;
use App\Profile;
use Validator;
use Response;
use DB;
use Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class CreateController extends Controller
{
   public function index()
    {
    	return view ('knockout');
    		//,compact('certificate','notifications','countnotif'));
    }


      public function store(Request $request)
    {

    	 
    	$years = Carbon::parse($request['bdate'])->age;
    	
    	if ($request['exp']>=5 AND $years>=25){
            if($request['citizen']=='yes'){

                return redirect('register');
            }
            else
    		return redirect ()->back() ->with ('error','Must be a Filipino citizen!');
            
    	}
        elseif($request['citizen']!='yes'){
            return redirect ()->back() ->with ('error','Must be a Filipino citizen!');
            
        }

    	else
    	{
    		 return redirect ()->back() ->with ('error','Must be 25 years old and have atleast 5 years of experience!');
    	}
    }



}
