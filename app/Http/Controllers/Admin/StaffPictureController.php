<?php

namespace App\Http\Controllers\Admin;


use App\Profile;
use App\User;
use DB;
use Validator;
use Response;
use App\Pictures;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class StaffPictureController extends Controller
{
       public function show($user)
    {
      
      
       
        $picture = DB::table('users')
        ->join('pictures','users.id','=','pictures.user_id')
        ->select('pictures.id as picid','users.id as userid','pictures.company','pictures.caption','pictures.pics')
        ->where('pictures.user_id','=',$user)
        ->paginate(5);

      
        	 $profile2=User::find($user)->profiles;
       return view ('picture/show',compact('picture','profile2'));

    }

    public function edit($id) {
        $picture = Pictures::find($id);
        return response()->json($picture);
    }
}
