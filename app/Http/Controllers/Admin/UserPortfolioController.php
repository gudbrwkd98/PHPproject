<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserPortfolioController extends Controller
{
       public function show($user)
    {
        //
     
        $uploads = User::find($user)->uploads;
        $profile2=User::find($user)->profiles;
        return view ('/portfolio/show',compact('uploads','profile2'));
    }
   
}
