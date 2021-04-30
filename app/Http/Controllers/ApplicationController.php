<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;

use App\Upload;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{

    public function index()
    {
    // //
       
        $deletedRows = Notification::where('user_id',Auth::user()->id)->delete();
        $id=Auth::user()->id;
         $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
        ->paginate(1);
        $countnotif=$notifications->count();

        return view ('portfolio/view',compact('notifications','countnotif'));
    }
   public function store(Request $request)
    {

    	 $user=request('user_id');
    	$upload = User::find($user)->uploads;
   
 
    	

        $request->validate([
            
            'user_id'=>['required','string','max:20'],
            
            

            ]); 



	

       if (request()->has('application_letter')) {

       		$user=request('user_email');
            $file = $request->file('application_letter');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/application_letter/',$filename);
            $upload->application_letter = $filename;
           
        }


         if (request()->has('application_form')) {

       		$user=request('user_email');
            $file = $request->file('application_form');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/application_form/',$filename);
            $upload->application_form = $filename;
           
        }
     
         if (request()->has('resume')) {

       		$user=request('user_email');
            $file = $request->file('resume');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/resume/',$filename);
            $upload->resume = $filename;
           
        }
         if (request()->has('cert_of_emp')) {

       		$user=request('user_email');
            $file = $request->file('cert_of_emp');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/cert_of_emp/',$filename);
            $upload->cert_of_emp = $filename;
           
        }
         if (request()->has('letter_of_recommendation')) {

       		$user=request('user_email');
            $file = $request->file('letter_of_recommendation');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/letter_of_recommendation/',$filename);
            $upload->letter_of_recommendation = $filename;
           
        }
         if (request()->has('passport')) {

       		$user=request('user_email');
            $file = $request->file('passport');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/passport/',$filename);
            $upload->passport = $filename;
           
        }
         if (request()->has('psa')) {

       		$user=request('user_email');
            $file = $request->file('psa');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/psa/',$filename);
            $upload->psa = $filename;
           
        }
         if (request()->has('nbi')) {

       		$user=request('user_email');
            $file = $request->file('nbi');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/nbi/',$filename);
            $upload->nbi = $filename;
           
        }
        if (request()->has('transcript')) {

       		$user=request('user_email');
            $file = $request->file('transcript');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
            $upload->transcript = $filename;
           
        }
        if (request()->has('narrative')) {

       		$user=request('user_email');
            $file = $request->file('narrative');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/narrative/',$filename);
            $upload->narrative = $filename;
           
        }
         if (request()->has('others')) {

       		$user=request('user_email');
            $file = $request->file('others');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/others/',$filename);
            $upload->others = $filename;
           
        }
        else
        {
        $upload->user_id = request('user_id');

        }



     


       
        $upload->user_id = request('user_id');

    





    $upload->save();



    //return ('success','You Have successfully Created a Profile!');
   //return view ('portfolio/view');
    return redirect ()->back() ->with ('success',' Successfully Updated!');



    }


     public function show($profile)
    {
        //
     
        
    }
}
