<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Upload;
use App\Profile;
use App\Notification;
use Carbon\Carbon;
use Validator;
use Response;
use DB;
use Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller
{
  public function update(Request $request, $user)
    {
    //$profile = Profile::find($profile);
     $profile = User::find($user)->profiles;

        //
    

        $request->validate([
           
            'firstName'=>['required','string','max:20'],
            'lastName'=>['required','string','max:20'],
            'middleName'=>['sometimes','max:20'],
            'bday'=>['required','string'],
            'phone'=>['required','string','max:12'],
            'address'=>['required','string','max:100'],
            
            'photo' => [ 'sometimes|file|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:5048',],

            ]); 


       if (request()->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'. $extension;
            $file->move('uploads/profilepicture/',$filename);
            $profile->photo = $filename;
            $profile->firstName = request('firstName');





    
           
        }
       

        
        $profile->firstName = request('firstName');
        $profile->middleName = request('middleName');
        $profile->lastName = request('lastName');
        $profile->bday = request('bday');
        $profile->phone = request('phone');
        $profile->address = request('address');
        
        $profile->civil_status = request('civilStatus');
        $profile->citizenship = 'Filipino';
        $profile->gender = request('gender');
        $profile->language = request('language');
        $profile->birth_place = request('birthplace');


    $profile->save();
    //return redirect('success','You Have successfully Created a Profile!');
    // return redirect ()->back() ->with ('success',' Successfully Updated!');
     return redirect('/')->with('success', 'Successfully Updated!');
    }


     public function create(Request $request)
    {
        //
          if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
           return redirect ()->back() ->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect ()->back() ->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->status = 'active';
        $user->save();
    
           return redirect ()->back() ->with('success', 'Successfully Password Updated!');
    }



     public function destroy($id)
    {

    	
         $deletedRows = Notification::where('user_id',Auth::user()->id)->delete();
      
         return redirect('/applicationremarks/');
    }

       public function show($id)
    {
        
         return redirect('/');
    }



     public function adduser(Request $request)
    {

        
         $validatedData = $request->validate([
            'email' => 'unique:users,email',
           
        ]);

        $roleid = request('role');
        if($roleid != 4)
        {
         $rolecount = User::whereHas('roles', function($q){$q->whereIn('name', [request('role')]);})->get()->count();
         if($rolecount>=1)
         {
         $roleuser = User::whereHas('roles', function($q){$q->whereIn('name', [request('role')]);})->get();
           
           // $holder = $roleuser()->pluck('email');
          
           return redirect ()->back() ->with('error', substr($roleuser->pluck('email'),2,-2).' already have this role'); 
         }
        }
        
       
           $user = new User();

            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->status = 'admincreate';
            $user->save();

          
            $role = Role::select('id')->where('name', $request['role'])->first();
            $user->roles()->attach($role);


  
          
      

           return redirect ()->back() ->with ('success',' Successfully Account Created!');
    }



    
}
