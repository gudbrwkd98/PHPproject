<?php

namespace App\Http\Controllers\Admin;

use App\Organizations;
use App\Profile;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrganizationStaffController extends Controller
{
    //
      public function show($user)
    {
        //
  		
        $orgs = DB::table('users')
        ->join('organizations','users.id','=','organizations.user_id')
        ->select('organizations.id as orgid','users.id','organizations.org_name','organizations.positionLvl')
        ->where('organizations.user_id','=',$user)
        ->paginate(10);

        //$profile2=User::find($user);
        $profile2 = User::find($user)->profiles;
       return view ('organization/show',compact('orgs','profile2'));
    }
}
