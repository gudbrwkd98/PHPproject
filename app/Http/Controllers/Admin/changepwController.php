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

class changepwController extends Controller
{


	 public function index()
    {
         
        return view ('profile/Changepass');
      
    }


    public function create(Request $request)
    {
        //
        //   if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        //     // The passwords matches
        //     return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        // }
        // if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        //     //Current password and new password are same
        //     return redirect('/')->with("error","New Password cannot be same as your current password. Please choose a different password.");
        // }
        // $validatedData = $request->validate([
        //     'current-password' => 'required',
        //     'new-password' => 'required|string|min:6|confirmed',
        // ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->status = 'inactive';
        
        $user->save();
          return redirect('/')->with('success', 'Successfully Password Updated!');
    }

    public function show(){

    }


}