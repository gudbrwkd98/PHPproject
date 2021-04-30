<?php

namespace App\Http\Controllers\Admin;

use App\Organizations;
use App\Communities;
use App\Profile;
use App\User;
use DB;
use Validator;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CommunityStaffController extends Controller
{
        public function show($user)
    {
      
      
       
        $comm = DB::table('users')
        ->join('communities','users.id','=','communities.user_id')
        ->select('communities.id as commid','users.id as userid','communities.description','communities.narrative_report')
        ->where('communities.user_id','=',$user)
        
        ->paginate(15);

        $upload = User::find($user);
         $profile2=User::find($user)->profiles;
        
       return view ('community/show',compact('comm','profile2'));

    }
}
