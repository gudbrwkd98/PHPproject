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
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MakeProfile extends Controller
{
    public function index()
    {
        //
        
       
        return view ('profile/createprofile');
      
    }


     public function store(Request $request)
    {
        //

    $profile = new Profile();
 


        $request->validate([
            
            'user_id'=>['required','string','max:20'],
            'firstName'=>['required','string','max:20'],
            'lastName'=>['required','string','max:20'],
            'middleName'=>['required','string','max:20'],
            'bday'=>['required','string'],
            'phone'=>['required','string','max:12'],
            'address'=>['required','string','max:100'],
       

            'photo' => [ 'sometimes|file|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:5048',],

            ]); 

            $years = Carbon::parse($request['bday'])->age;
        
        if ($years<25 ){
             return redirect ()->back() ->with ('error','Must be 25 years old!');

        }


       if (request()->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'. $extension;
            $file->move('uploads/profilepicture/',$filename);
            $profile->photo = $filename;
           
        }
       

       
        $profile->user_id = request('user_id');
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


$user = User::find($request->user_id);
        $user->status='active';
        $user->save();

    $upload = new Upload();

    $upload->user_id = request('user_id');

    $upload->save();



    $profile->save();
    //return redirect('success','You Have successfully Created a Profile!');
   //return view ('/profile/view');
    return redirect('/')->with('success', 'Successfully Profile Created!');


    }

    

   

}
