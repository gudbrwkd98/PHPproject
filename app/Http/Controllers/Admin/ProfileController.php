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

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   

  public function notification(){

    



  }


    public function index()
    {


  $id = Auth::User()->id;
        $not = DB::table('notifications')
        ->select('user_id')
        ->where('notify','=',Auth::user()->id)
        ->get();

        if(Auth::user()->hasAnyRole('user')){
             $id2=Auth::user()->roles()->pluck('name')->toArray();
        $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
      
        ->paginate(5);
        $countnotif=$notifications->count();
    }



        elseif(Auth::user()->hasAnyRole('admin')){
             $id=Auth::user()->roles()->pluck('name')->toArray();
        $notifications = DB::table('notifications')
        ->where('notify','=',$id)

       

        ->paginate(5);
        $countnotif=$notifications->count();
    }

      elseif(Auth::user()->hasAnyRole('eteeap')){
         $id=Auth::user()->roles()->pluck('name')->toArray();
        $notifications = DB::table('notifications')
        ->where('notify','=',$id)

        ->paginate(5);
        $countnotif=$notifications->count();
    }
  else{
         $id=Auth::user()->roles()->pluck('name')->toArray();
         $notifications = DB::table('notifications')
        ->where('notify','=',$id)

        ->paginate(5);
        $countnotif=$notifications->count();
    }



        $courses = DB::table('courses')
        ->paginate(15);

       


        
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
        
          $user=Auth::user()->id;
        
 $plans = DB::table('users')
        ->join('plans','users.id','=','plans.user_id')
        ->select('plans.id as formid','users.id as userid','plans.coreValues','priority1','priority2','priority3','sgop','timePlan','accreditationPlan','plantoComplete','essay')
        ->where('plans.user_id','=',$user)
        
        ->get();  

 $formaleduc = DB::table('users')
        ->join('formal_education','users.id','=','formal_education.user_id')
        ->select('formal_education.id as formid','users.id as userid','formal_education.schoolName','formal_education.schoolAddress'
            ,'formal_education.transcript','formal_education.degree','yearGraduated','formal_education.schoolLvl')
        ->where('formal_education.user_id','=',$user)
        
        ->get();  
$nformaleduc = DB::table('users')
        ->join('non_formal_education','users.id','=','non_formal_education.user_id')
        ->select('non_formal_education.id as formid','users.id as userid','non_formal_education.trainingProgram','non_formal_education.certificateTitle'
            ,'non_formal_education.certifyingAgency','non_formal_education.duration','non_formal_education.file')
        ->where('non_formal_education.user_id','=',$user)
        
        ->get();  
$certificationexam = DB::table('users')
        ->join('certification_exams','users.id','=','certification_exams.user_id')
        ->select('certification_exams.id as formid','users.id as userid','certification_exams.certificateTitle','certification_exams.nameofAgency','certification_exams.addressofAgency','certification_exams.startYear','certification_exams.file')
        ->where('certification_exams.user_id','=',$user)
        
        ->get();  
$licensure = DB::table('users')
        ->join('licensures','users.id','=','licensures.user_id')
        ->select('licensures.id as formid','users.id as userid','licensures.licenseTitle','licensures.file')
        ->where('licensures.user_id','=',$user)
        
        ->get(); 
$workexperience = DB::table('users')
        ->join('work_experiences','users.id','=','work_experiences.user_id')
        ->select('work_experiences.id as formid','users.id as userid','work_experiences.position','companyName','companyAddress','duration')
        ->where('work_experiences.user_id','=',$user)
        
        ->get();         

$awards = DB::table('users')
        ->join('awards','users.id','=','awards.user_id')
        ->select('awards.id as formid','users.id as userid','awards.awardTitle','awards.file','awards.organizationName','awards.organizationAddress','awards.dateReceived','awards.type')
        ->where('awards.user_id','=',$user)
        
        ->get();  
$creativeworks = DB::table('users')
        ->join('creative_works','users.id','=','creative_works.user_id')
        ->select('creative_works.id as formid','users.id as userid','creative_works.workTitle','creative_works.workDescription','creative_works.dateAccomplished','creative_works.agencyName','creative_works.dateAccomplished','creative_works.agencyAddress')
        ->where('creative_works.user_id','=',$user)
        
        ->get();  
$hobbies = DB::table('users')
        ->join('hobbies','users.id','=','hobbies.user_id')
        ->select('hobbies.id as formid','users.id as userid','hobbies.hobbyTitle','hobbies.ratingofSkill')
        ->where('hobbies.user_id','=',$user)
        
        ->get();
$specialskills = DB::table('users')
        ->join('special_skills','users.id','=','special_skills.user_id')
        ->select('special_skills.id as formid','users.id as userid','special_skills.skillName')
        ->where('special_skills.user_id','=',$user)
        
        ->get(); 
$workactivity = DB::table('users')
        ->join('work_activities','users.id','=','work_activities.user_id')
        ->select('work_activities.id as formid','users.id as userid','work_activities.activity','work_activities.description')
        ->where('work_activities.user_id','=',$user)
        
        ->get(); 
$volunteer = DB::table('users')
        ->join('volunteers','users.id','=','volunteers.user_id')
        ->select('volunteers.id as formid','users.id as userid','volunteers.title')
        ->where('volunteers.user_id','=',$user)
        
        ->get();  
$travel = DB::table('users')
        ->join('travels','users.id','=','travels.user_id')
        ->select('travels.id as formid','users.id as userid','travels.location','purpose','learningExperience')
        ->where('travels.user_id','=',$user)
        
        ->get();
$organization = DB::table('users')
        ->join('organization_memberships','users.id','=','organization_memberships.user_id')
        ->select('organization_memberships.id as formid','users.id as userid','organization_memberships.type','startYear','endYear','duration','organization','position')
        ->where('organization_memberships.user_id','=',$user)
        
        ->get();     
$engagement = DB::table('users')
        ->join('engagements','users.id','=','engagements.user_id')
        ->select('engagements.id as formid','users.id as userid','engagements.title','startYear','endYear','duration','venue','involvement','organizer')
        ->where('engagements.user_id','=',$user)
        
        ->get();   
$communityinvolvement = DB::table('users')
        ->join('community_involvements','users.id','=','community_involvements.user_id')
        ->select('community_involvements.id as formid','users.id as userid','community_involvements.title','startYear','endYear','duration','venue','organizer')
        ->where('community_involvements.user_id','=',$user)
        
        ->get(); 
$documents = DB::table('users')
        ->join('documents','users.id','=','documents.user_id')
        ->select('documents.id as formid','users.id as userid','documents.title','file')
        ->where('documents.user_id','=',$user)
        
        ->get();  

        $application = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('office','stage','app_status','applications.id as appid','applications.user_id as appuserid','applications.updated_at','applications.created_at','courseCode','datesubmitted')
        ->latest()
        ->where('applications.user_id','=',$user)
        ->limit(1)
        ->get(); 

       



       
     

       
        return view ('profile/view',compact('check','courses','notifications','countnotif','not','plans','formaleduc','nformaleduc','certificationexam','licensure','workexperience','awards','creativeworks','hobbies','specialskills','workactivity','volunteer','travel','organization','engagement','communityinvolvement','documents','application'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function show($user)
    // {
    //     //
    //     //$profile=User::find($user);
    //     $profile = User::find($user)->profiles;
    //     return view ('/profile/show',compact('profile'));
    // }

     public function show2($user)
    {
        //
        //$profile=User::find($user);
         // $user=Auth::user()->id;
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



       




         $plans = DB::table('users')
        ->join('plans','users.id','=','plans.user_id')
        ->select('plans.id as formid','users.id as userid','plans.coreValues','priority1','priority2','priority3','sgop','timePlan','accreditationPlan','plantoComplete','essay')
        ->where('plans.user_id','=',$user)
        
        ->get();  

 $formaleduc = DB::table('users')
        ->join('formal_education','users.id','=','formal_education.user_id')
        ->select('formal_education.id as formid','users.id as userid','formal_education.schoolName','formal_education.schoolAddress'
            ,'formal_education.transcript','formal_education.degree','yearGraduated','formal_education.schoolLvl')
        ->where('formal_education.user_id','=',$user)
        
        ->get();  
$nformaleduc = DB::table('users')
        ->join('non_formal_education','users.id','=','non_formal_education.user_id')
        ->select('non_formal_education.id as formid','users.id as userid','non_formal_education.trainingProgram','non_formal_education.certificateTitle'
            ,'non_formal_education.certifyingAgency','non_formal_education.duration','non_formal_education.file')
        ->where('non_formal_education.user_id','=',$user)
        
        ->get();  
$certificationexam = DB::table('users')
        ->join('certification_exams','users.id','=','certification_exams.user_id')
        ->select('certification_exams.id as formid','users.id as userid','certification_exams.certificateTitle','certification_exams.nameofAgency','certification_exams.addressofAgency','certification_exams.startYear','certification_exams.file')
        ->where('certification_exams.user_id','=',$user)
        
        ->get();  
$licensure = DB::table('users')
        ->join('licensures','users.id','=','licensures.user_id')
        ->select('licensures.id as formid','users.id as userid','licensures.licenseTitle','licensures.file')
        ->where('licensures.user_id','=',$user)
        
        ->get(); 
$workexperience = DB::table('users')
        ->join('work_experiences','users.id','=','work_experiences.user_id')
        ->select('work_experiences.id as formid','users.id as userid','work_experiences.position','companyName','companyAddress','duration')
        ->where('work_experiences.user_id','=',$user)
        
        ->get();         

$awards = DB::table('users')
        ->join('awards','users.id','=','awards.user_id')
        ->select('awards.id as formid','users.id as userid','awards.awardTitle','awards.file','awards.organizationName','awards.organizationAddress','awards.dateReceived','awards.type')
        ->where('awards.user_id','=',$user)
        
        ->get();  
$creativeworks = DB::table('users')
        ->join('creative_works','users.id','=','creative_works.user_id')
        ->select('creative_works.id as formid','users.id as userid','creative_works.workTitle','creative_works.workDescription','creative_works.dateAccomplished','creative_works.agencyName','creative_works.dateAccomplished','creative_works.agencyAddress')
        ->where('creative_works.user_id','=',$user)
        
        ->get();  
$hobbies = DB::table('users')
        ->join('hobbies','users.id','=','hobbies.user_id')
        ->select('hobbies.id as formid','users.id as userid','hobbies.hobbyTitle','hobbies.ratingofSkill')
        ->where('hobbies.user_id','=',$user)
        
        ->get();
$specialskills = DB::table('users')
        ->join('special_skills','users.id','=','special_skills.user_id')
        ->select('special_skills.id as formid','users.id as userid','special_skills.skillName')
        ->where('special_skills.user_id','=',$user)
        
        ->get(); 
$workactivity = DB::table('users')
        ->join('work_activities','users.id','=','work_activities.user_id')
        ->select('work_activities.id as formid','users.id as userid','work_activities.activity','work_activities.description')
        ->where('work_activities.user_id','=',$user)
        
        ->get(); 
$volunteer = DB::table('users')
        ->join('volunteers','users.id','=','volunteers.user_id')
        ->select('volunteers.id as formid','users.id as userid','volunteers.title')
        ->where('volunteers.user_id','=',$user)
        
        ->get();  
$travel = DB::table('users')
        ->join('travels','users.id','=','travels.user_id')
        ->select('travels.id as formid','users.id as userid','travels.location','purpose','learningExperience')
        ->where('travels.user_id','=',$user)
        
        ->get();
$organization = DB::table('users')
        ->join('organization_memberships','users.id','=','organization_memberships.user_id')
        ->select('organization_memberships.id as formid','users.id as userid','organization_memberships.type','startYear','endYear','duration','organization','position')
        ->where('organization_memberships.user_id','=',$user)
        
        ->get();     
$engagement = DB::table('users')
        ->join('engagements','users.id','=','engagements.user_id')
        ->select('engagements.id as formid','users.id as userid','engagements.title','startYear','endYear','duration','venue','involvement','organizer')
        ->where('engagements.user_id','=',$user)
        
        ->get();   
$communityinvolvement = DB::table('users')
        ->join('community_involvements','users.id','=','community_involvements.user_id')
        ->select('community_involvements.id as formid','users.id as userid','community_involvements.title','startYear','endYear','duration','venue','organizer')
        ->where('community_involvements.user_id','=',$user)
        
        ->get(); 
$documents = DB::table('users')
        ->join('documents','users.id','=','documents.user_id')
        ->select('documents.id as formid','users.id as userid','documents.title','file')
        ->where('documents.user_id','=',$user)
        
        ->get();  


        $courses = DB::table('courses')
        ->paginate(15);

         



        $profile = User::find($user)->profiles;
        // return view ('/profile/show',compact('profile'));

       
     

       
        return view ('profile/edit',compact('courses','check','notifications','countnotif','not','profile','plans','formaleduc','nformaleduc','certificationexam','licensure','workexperience','awards','creativeworks','hobbies','specialskills','workactivity','volunteer','travel','organization','engagement','communityinvolvement','documents'));
        // return view ('portfolio/view',compact('notifications','countnotif','count','not'));

       
    }


}