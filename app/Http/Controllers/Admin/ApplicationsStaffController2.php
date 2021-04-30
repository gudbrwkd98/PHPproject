<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Applications;
use App\Profile;
use App\User;
use App\Course;
use App\Role;
use App\Remark;
use App\Notification;
use DB;
use eloq;
use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Mail\SendMailable;

use Mail;

use App\Mail\DemoEmail;

use App\Mail\ReceivedEmail;


class ApplicationsStaffController2 extends Controller
{
  public function index()
    {

         $not = DB::table('notifications')
        ->select('user_id')
        ->where('notify','=',Auth::user()->id)
        ->get();

        if(Auth::user()->hasAnyRole('user')){
        $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
        ->where('notif','=','Your Application has been Updated!')
        ->paginate(1);
        $countnotif=$notifications->count();
    }



        elseif(Auth::user()->hasAnyRole('admin')){
             $id=Auth::user()->roles()->pluck('name')->toArray();
        $notifications = DB::table('notifications')
        ->where('notify','=',$id)
        ->where('notif','!=','Your Application has been Updated!')
       

        ->paginate(5);
        $countnotif=$notifications->count();
    }

      elseif(Auth::user()->hasAnyRole('eteeap')){
         $id=Auth::user()->roles()->pluck('name')->toArray();
        $notifications = DB::table('notifications')
        ->where('notify','=',$id)
        ->where('notif','!=','Your Application has been Updated!')
        ->paginate(5);
        $countnotif=$notifications->count();
    }
    else{
         $id=Auth::user()->roles()->pluck('name')->toArray();
         $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
        ->where('notif','!=','Your Application has been Updated!')
        ->paginate(1);
        $countnotif=$notifications->count();
    }
      
   
      

        
       
    return view ('applicant/view',compact('application','countnotif','not','notifications'));

    }

    public function show(Request $request, $user2)
    {

          

        
          $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$user2)
          ->where('notify','=',$rolenotif)
          ->delete();
          

          $app2=DB::table('applications')

        ->where('user_id', $user2)
        ->limit(1)

        ->latest()->get();

        $app = substr($app2->pluck('id'), 1,-1);
        $office = substr($app2->pluck('office'), 2,-2);
        $course = substr($app2->pluck('courseCode'), 2,-2);
        $datesubmitted = substr($app2->pluck('datesubmitted'), 2,-2);
        $status = substr($app2->pluck('app_status'), 2,-2);


        if($status == 'Submitted'){

        $application2 = new Applications();
        $application2->user_id=$user2;
        $application2->office = $office;
        $application2->stage='Initial Assessment';
        $application2->app_status = 'Received';
        $application2->datesubmitted = $datesubmitted;
        
        $application2->courseCode = $course;

        $application2->save(); 

        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();

        $useremail=DB::table('users')
         ->select('email')
        ->where('id', $user2)
        ->get();
        $email = substr($useremail->pluck('email'), 2,-2);


        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        
        Mail::to($email)->send(new ReceivedEmail($objDemo));
            }
        



         $id = Auth::User()->id;
        $not = DB::table('notifications')
        ->select('user_id')
        ->where('notify','=',Auth::user()->id)
        ->get();

        if(Auth::user()->hasAnyRole('user')){
        $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
        ->where('notif','=','Your Application has been Updated!')
        ->paginate(1);
        $countnotif=$notifications->count();
    }



        elseif(Auth::user()->hasAnyRole('admin')){
             $id=Auth::user()->roles()->pluck('name')->toArray();
        $notifications = DB::table('notifications')
        ->where('notify','=',$id)
        ->where('notif','!=','Your Application has been Updated!')
       

        ->paginate(5);
        $countnotif=$notifications->count();
    }

      elseif(Auth::user()->hasAnyRole('eteeap')){
         $id=Auth::user()->roles()->pluck('name')->toArray();
        $notifications = DB::table('notifications')
        ->where('notify','=',$id)
        ->where('notif','!=','Your Application has been Updated!')
        ->paginate(5);
        $countnotif=$notifications->count();
    }
    else{
         $id=Auth::user()->roles()->pluck('name')->toArray();
         $notifications = DB::table('notifications')
        ->where('notify','=',$id)
        ->where('notif','!=','Your Application has been Updated!')
        ->paginate(1);
        $countnotif=$notifications->count();
    }


        $check = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('applications.user_id')
        ->where('applications.user_id','=',$id)
        // ->where('applications.status','!=','completed')
        ->get();
        //  $count = DB::table('applications')
        // ->select('resubmitto','office')
        // ->where('user_id','=',$id)
        // ->get();


        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('licensures','users.id','=','licensures.user_id')
        ->select('licensures.id as formid','users.id as userid','licensures.licenseTitle','licensures.file')
        ->where('licensures.user_id','=',$user)
        
        ->get();  

 $plans = DB::table('users')
        ->join('plans','users.id','=','plans.user_id')
        ->select('plans.id as formid','users.id as userid','coreValues','priority1','priority2','priority3','sgop','timePlan','accreditationPlan','plantoComplete','essay')
        ->where('plans.user_id','=',$user2)
        
        ->get();  

 $formaleduc = DB::table('users')
        ->join('formal_education','users.id','=','formal_education.user_id')
        ->select('formal_education.id as formid','users.id as userid','formal_education.schoolName','formal_education.schoolAddress'
            ,'formal_education.transcript','formal_education.degree','yearGraduated','formal_education.schoolLvl')
        ->where('formal_education.user_id','=',$user2)
        
        ->paginate(5);  
$nformaleduc = DB::table('users')
        ->join('non_formal_education','users.id','=','non_formal_education.user_id')
        ->select('non_formal_education.id as formid','users.id as userid','non_formal_education.trainingProgram','non_formal_education.certificateTitle'
            ,'non_formal_education.certifyingAgency','non_formal_education.duration','non_formal_education.file')
        ->where('non_formal_education.user_id','=',$user2)
        
        ->paginate(5);  
$certificationexam = DB::table('users')
        ->join('certification_exams','users.id','=','certification_exams.user_id')
        ->select('certification_exams.id as formid','users.id as userid','certification_exams.certificateTitle','certification_exams.nameofAgency','certification_exams.addressofAgency','certification_exams.startYear','certification_exams.file','rating','expiryDate')
        ->where('certification_exams.user_id','=',$user2)
        
        ->paginate(5); 
$licensure = DB::table('users')
        ->join('licensures','users.id','=','licensures.user_id')
        ->select('licensures.id as formid','users.id as userid','licensures.licenseTitle','licensures.file','expiryDate')
        ->where('licensures.user_id','=',$user2)
        
        ->paginate(5); 
$workexperience = DB::table('users')
        ->join('work_experiences','users.id','=','work_experiences.user_id')
        ->select('work_experiences.id as formid','users.id as userid','work_experiences.position','companyName','duration','companyAddress')
        ->where('work_experiences.user_id','=',$user2)
        
        ->paginate(5);        

$awards = DB::table('users')
        ->join('awards','users.id','=','awards.user_id')
        ->select('awards.id as formid','users.id as userid','awards.awardTitle','awards.file','awards.organizationName','awards.organizationAddress','awards.dateReceived','awards.type')
        ->where('awards.user_id','=',$user2)
        
        ->paginate(5);  
$creativeworks = DB::table('users')
        ->join('creative_works','users.id','=','creative_works.user_id')
        ->select('creative_works.id as formid','users.id as userid','creative_works.workTitle','creative_works.workDescription','dateAccomplished','creative_works.agencyName','creative_works.dateAccomplished','creative_works.agencyAddress')
        ->where('creative_works.user_id','=',$user2)
        
        ->paginate(5);  
$hobbies = DB::table('users')
        ->join('hobbies','users.id','=','hobbies.user_id')
        ->select('hobbies.id as formid','users.id as userid','hobbies.hobbyTitle','hobbies.ratingofSkill')
        ->where('hobbies.user_id','=',$user2)
        
        ->paginate(5);
$specialskills = DB::table('users')
        ->join('special_skills','users.id','=','special_skills.user_id')
        ->select('special_skills.id as formid','users.id as userid','special_skills.skillName')
        ->where('special_skills.user_id','=',$user2)
        
        ->paginate(5); 
$workactivity = DB::table('users')
        ->join('work_activities','users.id','=','work_activities.user_id')
        ->select('work_activities.id as formid','users.id as userid','work_activities.activity','work_activities.description')
        ->where('work_activities.user_id','=',$user2)
        
        ->paginate(5); 
$volunteer = DB::table('users')
        ->join('volunteers','users.id','=','volunteers.user_id')
        ->select('volunteers.id as formid','users.id as userid','volunteers.title')
        ->where('volunteers.user_id','=',$user2)
        
        ->paginate(5);  
$travel = DB::table('users')
        ->join('travels','users.id','=','travels.user_id')
        ->select('travels.id as formid','users.id as userid','travels.location','purpose','learningExperience')
        ->where('travels.user_id','=',$user2)
        
        ->paginate(5);
$organization = DB::table('users')
        ->join('organization_memberships','users.id','=','organization_memberships.user_id')
        ->select('organization_memberships.id as formid','users.id as userid','organization_memberships.type','startYear','endYear','duration','organization','position')
        ->where('organization_memberships.user_id','=',$user2)
        ->paginate(5);    
$engagement = DB::table('users')
        ->join('engagements','users.id','=','engagements.user_id')
        ->select('engagements.id as formid','users.id as userid','engagements.title','startYear','endYear','duration','venue','involvement','organizer')
        ->where('engagements.user_id','=',$user2)
        
        ->paginate(5);   
$communityinvolvement = DB::table('users')
        ->join('community_involvements','users.id','=','community_involvements.user_id')
        ->select('community_involvements.id as formid','users.id as userid','community_involvements.title','startYear','endYear','duration','venue','organizer')
        ->where('community_involvements.user_id','=',$user2)
        
        ->paginate(5);
$documents = DB::table('users')
        ->join('documents','users.id','=','documents.user_id')
        ->select('documents.id as formid','users.id as userid','documents.title','file')
        ->where('documents.user_id','=',$user2)
        
        ->paginate(5); 

$application = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('office','stage','app_status','applications.id as appid','applications.user_id as appuserid','applications.updated_at','applications.created_at','courseCode','datesubmitted')
        ->latest()
        ->where('applications.user_id','=',$user2)
        ->limit(1)
        ->get(); 
         $useremail=DB::table('users')
         ->select('email')
        ->where('id', $user2)
        ->get();

$checkapplication = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('office')
        ->where('applications.user_id','=',$user2)
        ->get();  
$checkapplicationauth = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('office')

        ->where('applications.user_id','=',$user2)
        ->limit(1)
        ->get(); 

      
        // if($authrole != 'admin'){
        // // if($checkapplicationauth != Auth::user()->roles()->pluck('name')->toArray()){
        //     return redirect('/');
        // // }
        //  }

        $applicationhistory = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('office','stage','app_status','applications.id as appid','applications.user_id as appuserid','applications.updated_at','applications.created_at','courseCode')
        ->latest()
        ->where('applications.user_id','=',$user2)
  
        ->paginate(10);  

         $app2=DB::table('applications')
        ->where('user_id', $user2)
        ->latest()
        ->limit(1)
        ->get();

        $remarks = DB::table('applications')
        ->join('remarks','applications.id','=','remarks.app_id')
        ->join('users','applications.user_id','=','users.id')
        ->select('remarks.id','remarks.office','remarks.file','remarks.remarks','applications.app_status','applications.stage','remarks.created_at')
        ->where('applications.user_id','=',$user2)
        ->orderBy('created_at','desc')
        ->paginate(10); 

        // $app = substr($app2->pluck('id'), 1,-1);
        // $office = substr($app2->pluck('office'), 1,-1);
        // $resubmitto = substr($app2->pluck('resubmitto'), 1,-1);
        // $status = substr($app2->pluck('status'), 1,-1);
        // $stage = substr($app2->pluck('stage'), 1,-1);
        // $lastupdate = substr($app2->pluck('updated_at'), 2,-2);
       
        // $updater = substr($app2->pluck('updater'), 1,-1);


        // $app3=DB::table('remarks')
        // ->where('application_id','=', $app)
        // ->paginate(10);

          $authrole = Auth::user()->roles()->pluck('name')->toArray();
        foreach($authrole as $auth){
            foreach($app2 as $app){
                if($auth != 'admin'){
            if($auth != $office){

                return redirect('/');
            }
        }
        }

        }
       

    $profile = User::findOrFail($user2)->profiles;
    $users = User::whereHas('roles', function($q){$q->whereIn('name', ['dean','eteeap']);})->get();

     $roles  = Role::get()->whereNotIn('name', ['user','admin']);


     // if($checkapplication != 'dean'){
     //    return redirect ()->back() ->with('error', 'Application not assigned to you!');

     // }
         
         
       
        return view ('portfolio/application/portfolio',compact('check','notifications','countnotif','not','comm','plans','formaleduc','nformaleduc','certificationexam','licensure','workexperience','awards','creativeworks','hobbies','specialskills','workactivity','volunteer','travel','organization','engagement','communityinvolvement','documents','profile','application','applicationhistory','users','office','remarks','checkapplication','roles','authrole','app2','useremail'));

       
    }  

  
   
  

     public function store(Request $request)
    {
    		
    	  


       $request->validate([
            
             
             'handler'=>['required','string','max:200'],
            'status'=>['required','string','max:100'],
            'stage'=>['required','string','max:100'],
            // 'remarks'=>['required','string','max:300'],
           
            // 'file' => ['mimes:docx,pdf,txt,odt,ott,sxw,stw,png,jpg,jpeg,bmp|max:10048',],
           
            ]); 
      
        $date=Carbon::now();
         $application=DB::table('applications')
        ->where('user_id', $request->get('user_id'))
        ->update(['handler' => $request->get('handler'),
                 'status'       => $request->get('status'),
                 'stage'       => $request->get('stage'),
                 'updated_at'       => $date,
                 'resubmitto'           =>$request->get('user_email'),


             ]);

         $read=DB::table('notifications')
        ->where('user_id', $user)
        ->update(['notif' => 'Application has been Updated!',
                
             ]);  

        //  $deletedRows = Notification::where('user_id',$request->get('user_id'));
       
        // $notifications = new Notification();
        // $notifications->user_id=$request->get('user_id');
        // $notifications->notify=Auth::user()->id;
        // $notifications->notif='Your Application has been Updated!';
        // $notifications->save();

       // if (request()->has('file')) {

       //      $user=request('user_email');
       //      $file = $request->file('file');
       //      $extension = $file->getClientOriginalExtension();
       //      $filename = $user.time().'.'. $extension;
       //      $file->move('uploads/file/',$filename);
       //      $remarks->file = $filename;
        
       //  }

       //   $remarks->application_id = request('appid');
       //   $remarks->remarks = request('remarks');
       //    $remarks->status = request('status');

       //    $remarks->updater = Auth::user()->email;
       //    $remarks->save();

    // return redirect ()->back() ->with ('success',' Successfully Application Updated!');
        return redirect('staff.applicants.show')->with('status', 'Successfully Application Updated!');


 	}

        public function destroy($id)
    {
        
        Applications::destroy($id);
         return redirect ()->back() ->with ('success',' Successfully Application Deleted!');
    }

     public function delete($id)
    {
        
      
         Applications::find($id)->delete();
        return response()->json(['success' => 'success']);
    }


        public function addremarks(Request $request)
    {
            
          

       $request->validate([
            
      
            'remarks'=>['required','string','max:300'],
           
            'file' => ['mimes:pdf,'],
           
            ]); 
      
        $date=Carbon::now();
        

        $remarks = new Remark();
        $notifications = new Notification();
        $notifications->user_id=$request->get('user_id');
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();

       if (request()->has('file')) {

            $user=request('user_email');
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/file/',$filename);
            $remarks->file = $filename;
        
        }

         $remarks->application_id = request('appid');
         $remarks->remarks = request('remarks');
          $remarks->status = request('status');

          $remarks->updater = Auth::user()->email;
          $remarks->save();

    return redirect ()->back() ->with ('success',' Successfully Application Updated!');


    }


}
