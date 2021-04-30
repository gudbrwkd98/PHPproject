<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Role;
use App\Profile;
use App\User;
use App\Applications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function show($user)
    {
        //




         $profile2=User::find($user);
         $profile = User::find($user)->profiles;
        return view ('/profile/show',compact('profile','profile2'));
    }

    

}
