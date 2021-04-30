<?php

namespace App\Http\Controllers\Admin;

use App\Certificates;
use App\Profile;
use App\User;
use DB;
use Validator;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CertificateStaffController extends Controller
{
      public function show($user)
    {
      
      
       
         $certificate = DB::table('users')
        ->join('certificates','users.id','=','certificates.user_id')
        ->select('certificates.id as certid','users.id as userid','certificates.title','certificates.certificates','certificates.narrative_report')
        ->where('certificates.user_id','=',$user)
        
        ->paginate(15);

        $upload = User::find($user);
         $profile2=User::find($user)->profiles;
        
       return view ('certificate/show',compact('certificate','profile2'));

    }
}
