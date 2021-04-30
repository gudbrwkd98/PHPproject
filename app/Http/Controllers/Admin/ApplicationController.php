<?php

namespace App\Http\Controllers\Admin;
use App\Role;
use App\User;
use App\FormalEducation;
use App\NonFormalEducation;
use App\CertificationExam;
use App\Award;
use App\Licensure;
use App\CreativeWork;
use App\Hobby;
use App\SpecialSkill;
use App\WorkActivity;
use App\Volunteer;
use App\Travel;
use App\OrganizationMembership;
use App\Engagement;
use App\CommunityInvolvement;
use App\CommunityNarrative;
use App\Plan;
use App\Document;
use App\WorkExperience;
use App\Applications;
use App\Remark;
use App\Mail\DemoEmail;
use App\Mail\ReceivedEmail;
use App\Mail\FailedEmail;
use Mail;
use App\Mail\StaffReceiveEmail;
use DB;
use App\Notification;
use App\Upload;
use Validator;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\http\Traits;
use Redirect;
 

class ApplicationController extends Controller
{



   

 
    public function index2()
    {
    // //
       
        $id=Auth::user()->id;
         $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
        ->paginate(1);
        $countnotif=$notifications->count();
        //   $count = DB::table('applications')
        // ->select('resubmitto','office')
        // ->where('user_id','=',$id)
        // ->get();
         $not = DB::table('notifications')
        ->select('notify')
        ->where('user_id','=',$id)
        ->get();

        // $notify = DB::table('applications')
        // ->join('users','applications.office','=','users.email')
        // ->select('applications.office','users.id as uid')
        // ->where('applications.user_id','=',$id)
        // ->get();

         


        return view ('portfolio/view',compact('notifications','countnotif','not'));
    }
   public function store(Request $request)
    {

    	 $user=request('user_id');
    	$upload = User::find($user)->uploads;
   
 
    	

        $request->validate([


            'user_id'=>['required','string','max:20'],
            'application_letter'=>['mimes:pdf,'],
            'application_form' => ['mimes:pdf,'],
            'resume' => ['mimes:pdf,'],
            'cert_of_emp' =>['mimes:pdf,'],
            'letter_of_recommendation' =>['mimes:pdf,'],
            'passport' => ['mimes:pdf,'],
            'psa' =>['mimes:pdf,'],
            'nbi' =>['mimes:pdf,'],
            'transcript' =>['mimes:pdf,'],
            'narrative' =>['mimes:pdf,'],
            'others' =>['mimes:pdf,'],
            'receipt'=>['mimes:pdf,'],


            
            

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
        if (request()->has('receipt')) {

            $user=request('user_email');
            $file = $request->file('receipt');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/receipt/',$filename);
            $upload->receipt = $filename;
           
        }
        else
        {
        $upload->user_id = request('user_id');

        }



     


       
        $upload->user_id = request('user_id');

    





    $upload->save();

     


        //    $notifications = new Notification();

         
        // // $notify = DB::table('users')
        // // ->select('id')
        // // ->where('email','=',$request['resubmit'])
        // // ->get();

        //     // $notify=User::select('id')->where('email', $request['resubmit'])->get();

        // $notifications->user_id=$request['resubmit'];
        // $notifications->notif='Application has been Updated!';
        // $notifications->notify=$request['resubmit'];
        // $notifications->save();
          $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
        $checkers=$checker->count();
        if($checkers>=1){


    

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Application has been Updated!',
               
            ]); 

           
    }



    //return ('success','You Have successfully Created a Profile!');
   //return view ('portfolio/view');
    return redirect ()->back() ->with ('success',' Successfully Updated!');



    }


     public function show($profile)
    {
        //
     
        
    }


     public function index()
    {
    // //
   

         


        return view ('portfolio/personal-info/index',compact('notifications','countnotif','count','not'));
    }
    public function codes(){
         //$profile=User::find($user);
          $user=Auth::user()->id;
     

        $id = Auth::User()->id;
        $not = DB::table('notifications')
        ->select('user_id')
        ->where('notify','=',Auth::user()->id)
        ->get();

         $id=Auth::user()->id;
                  if(Auth::user()->hasAnyRole('user')){
             $id2=Auth::user()->roles()->pluck('name')->toArray();
        $notifications = DB::table('notifications')
        
        ->where('user_id','=',$id)
        ->paginate(5);
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
        ->select('hobbies.id as formid','users.id as userid','hobbies.hobbyTitle','hobbies.ratingofSkill','file')
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

                $checkoffice = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('office','stage','app_status','applications.id as appid','applications.user_id as appuserid','applications.updated_at','applications.created_at','courseCode','datesubmitted')
        ->latest()
        ->where('applications.user_id','=',$user)
        ->limit(1)
        ->get();

        return compact('check','notifications','countnotif','not','plans','formaleduc','nformaleduc','certificationexam','licensure','workexperience','awards','creativeworks','hobbies','specialskills','workactivity','volunteer','travel','organization','engagement','communityinvolvement','documents','checkoffice');

    }
      public function education()
    
    {
       
       

        $user = Auth::user()->id;
        $comm = DB::table('users')
        ->join('formal_education','users.id','=','formal_education.user_id')
        ->select('formal_education.id as formid','users.id as userid','formal_education.schoolName','formal_education.schoolAddress'
            ,'formal_education.transcript','formal_education.degree','yearGraduated','formal_education.schoolLvl')
        ->where('formal_education.user_id','=',$user)
       
        ->get();  
       
    


        return view ('/portfolio/formal-education/view',compact('comm'))->with($this->codes());


       
    }



    public function storeFormalEducation(Request $request)
    {
         $deletedRows = FormalEducation::where('user_id',request('user_id'))
         ->delete();

    if (request('elemSchoolName')!='') {

         $request->validate([
            'elemSchoolLvl'=>['required'],
            'elemSchoolName'=>['required'],
            'elemSchoolAddress'=>['required'],
            'elemYearGraduated'=>['required'],
         
            ]);
      
             FormalEducation::Create(
            [
                'schoolLvl' => $request->elemSchoolLvl,
                'schoolName' => $request->elemSchoolName,
                'schoolAddress' => $request->elemSchoolAddress,
                'yearGraduated' => $request->elemYearGraduated,
                'degree' => $request->elemDegree,
           
                'user_id' => $request->user_id,

            ]); 
           
    }
        if (request('secondSchoolName')!='') {
             $request->validate([
            'secondSchoolLvl'=>['required'],
            'secondSchoolName'=>['required'],
            'secondSchoolAddress'=>['required'],
            'secondYearGraduated'=>['required'],
            
            ]);
      
             FormalEducation::Create(
            [
                'schoolLvl' => $request->secondSchoolLvl,
                'schoolName' => $request->secondSchoolName,
                'schoolAddress' => $request->secondSchoolAddress,
                'yearGraduated' => $request->secondYearGraduated,
                'degree' => $request->secondDegree,
           
                'user_id' => $request->user_id,

            ]); 
           
    }
    if (request('tertSchoolName')!='') {
         $request->validate([
            'tertSchoolLvl'=>['required'],
            'tertSchoolName'=>['required'],
            'tertSchoolAddress'=>['required'],
            'tertYearGraduated'=>['required'],
            'tertDegree'=>['required']
            ]);
      
             FormalEducation::Create(
            [
                'schoolLvl' => $request->tertSchoolLvl,
                'schoolName' => $request->tertSchoolName,
                'schoolAddress' => $request->tertSchoolAddress,
                'yearGraduated' => $request->tertYearGraduated,
                'degree' => $request->tertDegree,
           
                'user_id' => $request->user_id,

            ]); 
           
    }
    if (request('gradSchoolName')!='') {
         $request->validate([
            'gradSchoolLvl'=>['required'],
            'gradSchoolName'=>['required'],
            'gradSchoolAddress'=>['required'],
            'gradYearGraduated'=>['required'],
            'gradDegree'=>['required']
            ]);
      
             FormalEducation::Create(
            [
                'schoolLvl' => $request->gradSchoolLvl,
                'schoolName' => $request->gradSchoolName,
                'schoolAddress' => $request->gradSchoolAddress,
                'yearGraduated' => $request->gradYearGraduated,
                'degree' => $request->gradDegree,
                'user_id' => $request->user_id,

            ]); 
           
    }


       $request->validate([
            'transcript' =>['mimes:pdf,'],
            ]);


            $user=request('user_id');
            $file = $request->file('transcript');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);

     $applicationupdate = DB::table('formal_education')
     ->where('user_id', '=',request('user_id'))
     ->where('schoolLvl','=',request('schoolLvl'))
     ->update(['transcript' => $filename]);





           $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();

               $checkoffice = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('office','stage','app_status','applications.id as appid','applications.user_id as appuserid','applications.updated_at','applications.created_at','courseCode','datesubmitted')
        ->latest()
        ->where('applications.user_id','=',$user)
        ->limit(1)
        ->get();
    
      

        $checkers=$checker->count();
        if($checkers>=1){


    

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Formal Education has been Updated!',
                'notify' => $request->officenotif,

               
            ]); 


              $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));

     }


         return redirect ()->back() ->with ('success',' Successfully Added!');
    }

     public function updateFormalEducation(Request $request)
    {

        $request->validate([
            'transcript' =>['mimes:pdf,'],
            ]); 


        //     // $duration  = Carbon::parse($request['startYear'])->age;
        // $duration1 = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['startYear2']));
        // $duration2 = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['endYear2']));

        //  $duration = $duration1-$duration2;
        //  if($duration2>=$duration1){
        //      return redirect ()->back() ->with ('error',' Start Year should be earlier than End Year');
        //  }

        

          if (request()->has('transcript')) {

            $user=request('user_id');
            $file = $request->file('transcript');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
          

             FormalEducation::updateorCreate(['id' => $request->id],
            [
                'schoolLvl' => $request->schoolLvl2,
                'schoolName' => $request->schoolName2,
                'schoolAddress' => $request->schoolAddress2,
                'yearGraduated' => $request->yearGraduated2,
               
                'degree' => $request->degree2,
             
                 'transcript' => $filename,
                'user_id' => $request->user_id,





            ]); 
           
        }
        else{
            FormalEducation::updateorCreate(['id' => $request->id],
            [
                'schoolLvl' => $request->schoolLvl2,
                'schoolName' => $request->schoolName2,
                'schoolAddress' => $request->schoolAddress2,
                'yearGraduated' => $request->yearGraduated2,
               
                'degree' => $request->degree2,
             
          
           
               
                'user_id' => $request->user_id,





            ]); 
        }


             $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();

               $checkoffice = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('office','stage','app_status','applications.id as appid','applications.user_id as appuserid','applications.updated_at','applications.created_at','courseCode','datesubmitted')
        ->latest()
        ->where('applications.user_id','=',Auth::user()->id)
        ->limit(1)
        ->get();  
    
 
      

        $checkers=$checker->count();
        if($checkers>=1){


    

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Formal Education has been Updated!',
                'notify' => $request->officenotif,

               
            ]); 

            $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }


       

       
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }


     public function editformaleducation($id) {
        $formaleduc = FormalEducation::find($id);
        return response()->json($formaleduc);
    }

      public function deleteFormalEducation($id)
    {
        $idd=request('id');
        $deletedRows = FormalEducation::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully Formal Education Deleted!');
        
    }


     public function nformaleducation()
    {

     

    
        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('non_formal_education','users.id','=','non_formal_education.user_id')
        ->select('non_formal_education.id as formid','users.id as userid','non_formal_education.trainingProgram','non_formal_education.certificateTitle'
            ,'non_formal_education.certifyingAgency','non_formal_education.duration','non_formal_education.file')
        ->where('non_formal_education.user_id','=',$user)
        
        ->get();  

 
       
        return view ('/portfolio/nonformal-education/view',compact('comm'))->with($this->codes());
       
    }

    public function storenonFormalEducation(Request $request)
    {

         $request->validate([
            'file' =>['mimes:pdf,'],
            ]);



            // $duration  = Carbon::parse($request['startYear'])->age;
        $duration1 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['startYear']));
        $duration2 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['endYear']));
         $duration1x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['startYear']));
        $duration2x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['endYear']));

         $duration = $duration1x-$duration2x;
        

         if($duration2>=$duration1){
             return redirect ()->back() ->with ('error',' Start Year should be earlier than End Year');
         }

        

        

          if (request()->has('file')) {

            $user=request('user_id');
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
          

             NonFormalEducation::Create(
            [
                'trainingProgram' => $request->trainingProgram,
                'certificateTitle' => $request->certificateTitle,
                'certifyingAgency' => $request->certifyingAgency,
                'startYear' => $request->startYear,
                'endYear' => $request->endYear,
                
                'duration' => $duration,
                 'file' => $filename,
                'user_id' => $request->user_id,





            ]); 
           
        }

             $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();    

        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Non-Formal Education has been Updated!',
                'notify' => $request->officenotif,          
            ]); 

          $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }


       

       
   
         return redirect ()->back() ->with ('success',' Successfully Added!');
    }


         public function editnonformaleducation($id) {
        $formaleduc = NonFormalEducation::find($id);
        return response()->json($formaleduc);
    }


     public function updatenonFormalEducation(Request $request)
    {

         


        $duration1 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['startYear2']));
        $duration2 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['endYear2']));
         $duration1x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['startYear2']));
        $duration2x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['endYear2']));

         $duration = $duration1x-$duration2x;
         if($duration2>=$duration1){
             return redirect ()->back() ->with ('error',' Start Year should be earlier than End Year');
         }
        $request->validate([
            'file' =>['mimes:pdf,'],
            ]);


        

          if (request()->has('file2')) {

            $user=request('user_id2');
            $file = $request->file('file2');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
          

             NonFormalEducation::updateOrCreate(['id' => $request->id2],
            [
                'trainingProgram' => $request->trainingProgram2,
                'certificateTitle' => $request->certificateTitle2,
                'certifyingAgency' => $request->certifyingAgency2,
                'startYear' => $request->startYear2,
                'endYear' => $request->endYear2,
                
                'duration' => $duration,
                 'file' => $filename,
                'user_id' => $request->user_id2,





            ]); 
           
        }
        else{
            NonFormalEducation::updateOrCreate(['id' => $request->id2],
            [
                'trainingProgram' => $request->trainingProgram2,
                'certificateTitle' => $request->certificateTitle2,
                'certifyingAgency' => $request->certifyingAgency2,
                'startYear' => $request->startYear2,
                'endYear' => $request->endYear2,
                
                'duration' => $duration,
                 
                'user_id' => $request->user_id2,





            ]); 
        }

        $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();    

        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Non-Formal Education has been Updated!',
                'notify' => $request->officenotif,          
            ]); 

          $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }


       

       
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }


        public function deletenonFormalEducation($id)
    {
        $idd=request('id3');
        $deletedRows = NonFormalEducation::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully Deleted!');
        
    }


         public function CertificationExam()
    {
  

        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('certification_exams','users.id','=','certification_exams.user_id')
        ->select('certification_exams.id as formid','users.id as userid','certification_exams.certificateTitle','certification_exams.nameofAgency','certification_exams.addressofAgency','certification_exams.startYear','certification_exams.file')
        ->where('certification_exams.user_id','=',$user)
        
        ->get();  

         



       
        return view ('portfolio/certification/view',compact('comm'))->with($this->codes());

       
    }



     public function storeCertificationExam(Request $request)
    {

             $duration1 = (\Carbon\Carbon::parse($request['startYear']));
        $duration2 = (\Carbon\Carbon::parse($request['expiryDate']));
        $datenow = \Carbon\Carbon::now();
         if($duration2<=$duration1 ){
          return redirect()->back()->withInput()->with ('error',' Date Certified should not be same or earlier than Expiry Date');
         }
        else if($duration1>$datenow ){
          return redirect()->back()->withInput()->with ('error',' Start Year should earlier than Date Today');
         }
        

         $request->validate([
            'file' =>['mimes:pdf,'],
            ]);



       
        

        

          if (request()->has('file')) {

            $user=request('user_id');
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
          

             CertificationExam::Create(
            [
                
                'certificateTitle' => $request->certificateTitle,
                'nameofAgency' => $request->nameofAgency,
                'addressofAgency' => $request->addressofAgency,
                'expiryDate' => $request->expiryDate,


                'startYear' => $request->startYear,
                'rating' => $request->rating,
                
                 'file' => $filename,
                'user_id' => $request->user_id,





            ]); 
           
        }

        else{
             CertificationExam::Create(
            [
                
                'certificateTitle' => $request->certificateTitle,
                'nameofAgency' => $request->nameofAgency,
                'addressofAgency' => $request->addressofAgency,
               
                'expiryDate' => $request->expiryDate,

                'startYear' => $request->startYear,
                'rating' => $request->rating,
                
                 'file' => $filename,
                'user_id' => $request->user_id,





            ]); 
        }

            $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Certification Exam has been Updated!',
                'notify' => $request->officenotif,             
            ]); 

          $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }

      
          

         return redirect ()->back() ->with('success', 'Successfully Certification Exam Added!');

     
    }

     public function updateCertificationExam(Request $request)
    {

       $duration1 = (\Carbon\Carbon::parse($request['startYear2']));
        $duration2 = (\Carbon\Carbon::parse($request['expiryDate2']));
        $datenow = \Carbon\Carbon::now();
         if($duration2<=$duration1 ){
          return redirect()->back()->withInput()->with ('error',' Date Certified should not be same or earlier than Expiry Date');
         }
        else if($duration1>$datenow ){
          return redirect()->back()->withInput()->with ('error',' Start Year should earlier than Date Today');
         }

        $request->validate([
            'file' =>['mimes:pdf,'],
            ]);


        

         if (request()->has('file2')) {

            $user=request('user_id2');
            $file = $request->file('file2');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
          

             CertificationExam::updateOrCreate(['id' => $request->id2],
            [
                
                'certificateTitle' => $request->certificateTitle2,
                'nameofAgency' => $request->nameofAgency2,
                'expiryDate' => $request->expiryDate2,
                'addressofAgency' => $request->addressofAgency2,

                'startYear' => $request->startYear2,
                'rating' => $request->rating2,
                
                 'file' => $filename,
                'user_id' => $request->user_id2,





            ]); 
           
        }

        else{
             CertificationExam::updateOrCreate(['id' => $request->id2],
            [
                
                'certificateTitle' => $request->certificateTitle2,
                'nameofAgency' => $request->nameofAgency2,
                'addressofAgency' => $request->addressofAgency2,
                'expiryDate' => $request->expiryDate2,

                
                'startYear' => $request->startYear2,
                'rating' => $request->rating2,
                
                 
                'user_id' => $request->user_id2,





            ]); 
        }

            $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Certification Exam has been Updated!',
                'notify' => $request->officenotif,             
            ]); 

          $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }

        
       
  
       
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
     
    }
   

        public function editcertificationexam($id) {
        $formaleduc = CertificationExam::find($id);
        return response()->json($formaleduc);
    }


        public function deleteCertificationExam($id)
    {
        $idd=request('id3');
        $deletedRows = CertificationExam::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully  Deleted!');
        
    }


         public function licensure()
    {

     

        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('licensures','users.id','=','licensures.user_id')
        ->select('licensures.id as formid','users.id as userid','licensures.licenseTitle','licensures.file')
        ->where('licensures.user_id','=',$user)
        
        ->get();  


        return view ('portfolio/national/view',compact('comm'))->with($this->codes());
       
    }

     public function storeLicensureExam(Request $request)
    {

         $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file')) {

            $user=request('user_id');
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
          

             Licensure::Create(
            [
                'user_id' => $request->user_id,
                'licenseTitle' => $request->licenseTitle,            
                 'file' => $filename,
                'expiryDate' => $request->expiryDate,


            ]); 
           
        }

        else{
             Licensure::Create(
            [
                
                 'licenseTitle' => $request->licenseTitle,            
                
                'user_id' => $request->user_id,
                'expiryDate' => $request->expiryDate,



            ]); 
        }


      $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Licensure has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));

     }

         return redirect ()->back() ->with('success', 'Successfully Licensure Exam Added!');


    }

     public function updateLicensureExam(Request $request)
    {


        $request->validate([
            'file' =>['mimes:pdf,'],

            ]);


        

         if (request()->has('file2')) {

            $user=request('user_id2');
            $file = $request->file('file2');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
          

             Licensure::updateOrCreate(['id' => $request->id2],
            [
                
                'licenseTitle' => $request->licenseTitle2,            
                 'file' => $filename,
                'user_id' => $request->user_id2,
                'expiryDate' => $request->expiryDate2,







            ]); 
           
        }

        else{
             Licensure::updateOrCreate(['id' => $request->id2],
            [
                
                'licenseTitle' => $request->licenseTitle2,            
                'expiryDate' => $request->expiryDate2,
                
                'user_id' => $request->user_id2,

            ]); 
        }


       $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Licensure has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
          $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }

       
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }
   

        public function editlicensureexam($id) {
        $formaleduc = Licensure::find($id);
        return response()->json($formaleduc);
    }


        public function deleteLicensureExam($id)
    {
        $idd=request('id3');
        $deletedRows = Licensure::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully  Deleted!');
        
    }


      public function awards()
    {

      
        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('awards','users.id','=','awards.user_id')
        ->select('awards.id as formid','users.id as userid','awards.awardTitle','awards.file','awards.organizationName','awards.organizationAddress','awards.dateReceived','awards.type')
        ->where('awards.user_id','=',$user)
        
        ->get();  


       
        return view ('portfolio/awards/view',compact('comm'))->with($this->codes());
       
    }

     public function storeAwards(Request $request)
    {

         $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file')) {

            $user=request('user_id');
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
          

             Award::Create(
            [
                'type' => $request->type1,
                'user_id' => $request->user_id,
                'awardTitle' => $request->awardTitle,      
                'organizationName' => $request->organizationName,  
                'organizationAddress' => $request->organizationAddress,     
                'dateReceived' => $request->dateReceived,      
                 'file' => $filename,

            ]); 
           
        }

        else{
             Award::Create(
            [
                'type' => $request->type1,   
                'user_id' => $request->user_id,
                'awardTitle' => $request->awardTitle,      
                'organizationName' => $request->organizationName,  
                'organizationAddress' => $request->organizationAddress,     
                'dateReceived' => $request->dateReceived,      
                


            ]); 
        }

         $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Awards has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }

         return redirect ()->back() ->with('success', 'Successfully Awards Added!');


    }

     public function updateAwards(Request $request)
    {

        $request->validate([
            'file' =>['mimes:pdf,'],
            ]);


        

         if (request()->has('file2')) {

            $user=request('user_id2');
            $file = $request->file('file2');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
          

             Award::updateOrCreate(['id' => $request->id2],
            [
                
                  'type' => $request->type2,
                'user_id' => $request->user_id2,
                'awardTitle' => $request->awardTitle2,      
                'organizationName' => $request->organizationName2,  
                'organizationAddress' => $request->organizationAddress2,     
                'dateReceived' => $request->dateReceived2,
                 'file' => $filename,

                






            ]); 
           
        }

        else{
             Award::updateOrCreate(['id' => $request->id2],
            [
                
                   'type' => $request->type2,
                'user_id' => $request->user_id2,
                'awardTitle' => $request->awardTitle2,      
                'organizationName' => $request->organizationName2,  
                'organizationAddress' => $request->organizationAddress2,     
                'dateReceived' => $request->dateReceived2,      
                 
            ]); 
        }


        $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Awards has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }


       
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }
   

        public function editawards($id) {
        $formaleduc = Award::find($id);
        return response()->json($formaleduc);
    }


        public function deleteAwards($id)
    {
        $idd=request('id3');
        $deletedRows = Award::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully  Deleted!');
        
    }




           public function creativeworks()
    {

   

        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('creative_works','users.id','=','creative_works.user_id')
        ->select('creative_works.id as formid','users.id as userid','creative_works.workTitle','creative_works.workDescription','creative_works.dateAccomplished','creative_works.agencyName','creative_works.dateAccomplished','creative_works.agencyAddress')
        ->where('creative_works.user_id','=',$user)
        
        ->get();  


 
        return view ('portfolio/creative-works/view',compact('comm'))->with($this->codes());
       
    }

     public function storeCreativeWorks(Request $request)
    {

         $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          

       
             CreativeWork::Create(
            [
                 'workTitle' => $request->workTitle,
                'user_id' => $request->user_id,
                'workDescription' => $request->workDescription,      
                'agencyAddress' => $request->agencyAddress,  
                'dateAccomplished' => $request->dateAccomplished,     
                'agencyName' => $request->agencyName,           
                


            ]); 

             $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Creative Works has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
        

         return redirect ()->back() ->with('success', 'Successfully Added!');


    }

     public function updateCreativeWorks(Request $request)
    {

         
        $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

             CreativeWork::updateOrCreate(['id' => $request->id2],
            [
                 'workTitle' => $request->workTitle2,
                'user_id' => $request->user_id2,
                'workDescription' => $request->workDescription2,      
                'agencyAddress' => $request->agencyAddress2,  
                'dateAccomplished' => $request->dateAccomplished2,     
                'agencyName' => $request->agencyName2,    
                 
            ]); 

             $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Creative Works has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
        


       

       
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }
   

        public function editcreativeworks($id) {
        $formaleduc = CreativeWork::find($id);
        return response()->json($formaleduc);
    }


        public function deleteCreativeWorks($id)
    {
        $idd=request('id3');
        $deletedRows = CreativeWork::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully  Deleted!');
        
    }


           public function hobbies()
    {

   

        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('hobbies','users.id','=','hobbies.user_id')
        ->select('hobbies.id as formid','users.id as userid','hobbies.hobbyTitle','hobbies.ratingofSkill','file')
        ->where('hobbies.user_id','=',$user)
        
        ->get();  

        return view ('portfolio/lifelong/hobbies/view',compact('comm'))->with($this->codes());
    }

     public function storeHobbies(Request $request)
    {

         

          
            $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file')) {

            $user=request('user_id');
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
       
             Hobby::Create(
            [
                 'hobbyTitle' => $request->hobbyTitle,
                'user_id' => $request->user_id,
                'ratingofSkill' => $request->ratingofSkill,   
                'file' => $filename  
            ]); 
         }
             else{ 
                Hobby::Create(
            [
                 'hobbyTitle' => $request->hobbyTitle,
                'user_id' => $request->user_id,
                'ratingofSkill' => $request->ratingofSkill,   
            
            ]); 
         }

             $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Hobbies has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
        

         return redirect ()->back() ->with('success', 'Successfully Added!');


    }

     public function updateHobbies(Request $request)
    {
if (request()->has('file2')) {

            $user=request('user_id');
            $file = $request->file('file2');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
       
                        Hobby::updateOrCreate(['id' => $request->id2],
            [
                 'hobbyTitle' => $request->hobbyTitle2,
                'user_id' => $request->user_id2,
                'ratingofSkill' => $request->ratingofSkill2,    
                'file' => $filename  
            ]); 
         }
             else{ 
                         Hobby::updateOrCreate(['id' => $request->id2],
            [
                 'hobbyTitle' => $request->hobbyTitle2,
                'user_id' => $request->user_id2,
                'ratingofSkill' => $request->ratingofSkill2,   
            
            ]); 
         }



          
            $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get(); 

        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Hobbies has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
        
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }
   

        public function edithobbies($id) {
        $formaleduc = Hobby::find($id);
        return response()->json($formaleduc);
    }


        public function deleteHobbies($id)
    {
        $idd=request('id3');
        $deletedRows = Hobby::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully  Deleted!');
        
    }




           public function specialskills()
    {

  

        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('special_skills','users.id','=','special_skills.user_id')
        ->select('special_skills.id as formid','users.id as userid','special_skills.skillName','file')
        ->where('special_skills.user_id','=',$user)
        
        ->get();  

        return view ('portfolio/lifelong/special-skills/view',compact('comm'))->with($this->codes());
       
    }

     public function storeSpecialSkills(Request $request)
    {

         

          
         $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file')) {

            $user=request('user_id');
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
       
             SpecialSkill::Create(
            [
                 'skillName' => $request->skillName,
                'user_id' => $request->user_id,
                'file' => $filename
            ]); 
         }
         else{
             SpecialSkill::Create(
            [
                 'skillName' => $request->skillName,
                'user_id' => $request->user_id,
               
            ]); 
         }

        $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Special Skills has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
        

         return redirect ()->back() ->with('success', 'Successfully Added!');


    }

     public function updateSpecialSKills(Request $request)
    {



        $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file2')) {

            $user=request('user_id');
            $file = $request->file('file2');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);

             SpecialSkill::updateOrCreate(['id' => $request->id2],
            [
                   'skillName' => $request->skillName2,
                'user_id' => $request->user_id2,
                'file' => $filename
                 
            ]); 

         }
         else{
              SpecialSkill::updateOrCreate(['id' => $request->id2],
            [
                   'skillName' => $request->skillName2,
                'user_id' => $request->user_id2,
                 
            ]); 
         
     }
               $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Special Skills has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
        

         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }
   

        public function editspecialskills($id) {
        $formaleduc = SpecialSkill::find($id);
        return response()->json($formaleduc);
    }


        public function deleteSpecialSkills($id)
    {
        $idd=request('id3');
        $deletedRows = SpecialSkill::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully  Deleted!');
        
    }

      public function workactivity()
    {

    

        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('work_activities','users.id','=','work_activities.user_id')
        ->select('work_activities.id as formid','users.id as userid','work_activities.activity','work_activities.description','file')
        ->where('work_activities.user_id','=',$user)
 
        ->get();     

         

       
        return view ('portfolio/lifelong/work-activity/view',compact('comm'))->with($this->codes());


       
    }

     public function storeWorkActivity(Request $request)
    {

         

          

         $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file')) {

            $user=request('user_id');
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
             WorkActivity::Create(
            [
                 'activity' => $request->activity,
                 'description' => $request->description,

                'user_id' => $request->user_id,
                'file' => $filename
            ]); 
         }
         else{
              WorkActivity::Create(
                        [
                             'activity' => $request->activity,
                             'description' => $request->description,

                            'user_id' => $request->user_id,
                        ]); 
         }

             $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Work Activity has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
        

         return redirect ()->back() ->with('success', 'Successfully Added!');


    }

     public function updateWorkActivity(Request $request)
    {


            $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file2')) {

            $user=request('user_id');
            $file = $request->file('file2');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
              WorkActivity::updateOrCreate(['id' => $request->id2],
            [
                 'activity' => $request->activity2,
                 'description' => $request->description2,
                'file' => $filename
            ]); 
         }
         else{
             WorkActivity::updateOrCreate(['id' => $request->id2],
                        [
                             'activity' => $request->activity2,
                             'description' => $request->description2,
                        ]); 
         }
         

               $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Work Activity has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
       
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }
   

        public function editworkactivity($id) {
        $formaleduc = WorkActivity::find($id);
        return response()->json($formaleduc);
    }


        public function deleteWorkActivity($id)
    {
        $idd=request('id3');
        $deletedRows = WorkActivity::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully  Deleted!');
        
    }





     public function volunteer()
    {

   
        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('volunteers','users.id','=','volunteers.user_id')
        ->select('volunteers.id as formid','users.id as userid','volunteers.title','file')
        ->where('volunteers.user_id','=',$user)
        
        ->get();  

 

       
        return view ('portfolio/lifelong/volunteer/view',compact('comm'))->with($this->codes());


       
    }

     public function storeVolunteer(Request $request)
    {

         
            $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file')) {

            $user=request('user_id');
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
             Volunteer::Create(
            [
                 'title' => $request->title,
                'user_id' => $request->user_id,
                'file' => $filename
            ]); 
         }
         else{
             Volunteer::Create(
            [
                 'title' => $request->title,
                'user_id' => $request->user_id,
            ]); 
         }

                $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Volunteer has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
        

         return redirect ()->back() ->with('success', 'Successfully Added!');


    }

     public function updateVolunteer(Request $request)
    {

                     $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file2')) {

            $user=request('user_id');
            $file = $request->file('file2');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);

       
             Volunteer::updateOrCreate(['id' => $request->id2],
            [
                   'title' => $request->title2,
                'user_id' => $request->user_id2,
                'file' => $filename
                      
            ]); 
         }
         else{
             Volunteer::updateOrCreate(['id' => $request->id2],
            [
                   'title' => $request->title2,
                'user_id' => $request->user_id2,
                      
            ]);
         }
        
 $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Volunteer has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }
   

        public function editvolunteer($id) {
        $formaleduc = Volunteer::find($id);
        return response()->json($formaleduc);
    }


        public function deleteVolunteer($id)
    {
        $idd=request('id3');
        $deletedRows = Volunteer::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully  Deleted!');
        
    }


     public function travels()
    {

   
        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('travels','users.id','=','travels.user_id')
        ->select('travels.id as formid','users.id as userid','travels.location','purpose','learningExperience','file')
        ->where('travels.user_id','=',$user)
        
        ->get();  


       
        return view ('portfolio/lifelong/travels/view',compact('comm'))->with($this->codes());

       
    }

     public function storeTravels(Request $request)
    {
            $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file')) {

            $user=request('user_id');
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
             Travel::Create(
            [
                 'location' => $request->location,
                 'purpose' => $request->purpose,
                 'learningExperience' => $request->learningExperience,
                'user_id' => $request->user_id,
                'file' => $filename
            ]); 
         }
         else{
             Travel::Create(
            [
                 'location' => $request->location,
                 'purpose' => $request->purpose,
                 'learningExperience' => $request->learningExperience,
                'user_id' => $request->user_id,
            ]); 
         }


      $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Travels has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
        

         return redirect ()->back() ->with('success', 'Successfully Added!');


    }

     public function updateTravels(Request $request)
    {


            $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file2')) {

            $user=request('user_id');
            $file = $request->file('file2');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
       
             Travel::updateOrCreate(['id' => $request->id2],
            [
                    'location' => $request->location2,
                 'purpose' => $request->purpose2,
                 'learningExperience' => $request->learningExperience2,
                'user_id' => $request->user_id2,
                'file' => $filename

            ]); 
         }
         else{
               Travel::updateOrCreate(['id' => $request->id2],
            [
                    'location' => $request->location2,
                 'purpose' => $request->purpose2,
                 'learningExperience' => $request->learningExperience2,
                'user_id' => $request->user_id2,

            ]); 
         }
       $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Travels has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }
   

        public function edittravels($id) {
        $formaleduc = Travel::find($id);
        return response()->json($formaleduc);
    }


        public function deleteTravels($id)
    {
        $idd=request('id3');
        $deletedRows = Travel::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully  Deleted!');
        
    }




     public function organization()
    {

  


        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('organization_memberships','users.id','=','organization_memberships.user_id')
        ->select('organization_memberships.id as formid','users.id as userid','organization_memberships.type','startYear','endYear','duration','organization','position')
        ->where('organization_memberships.user_id','=',$user)
        
        ->get();  



       
        return view ('portfolio/organization/view',compact('comm'))->with($this->codes());

       
    }

     public function storeOrganization(Request $request)
    {



        $durationstartYear = (\Carbon\Carbon::parse($request['startYear']));
        $duration1 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['startYear']));
        $duration2 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['endYear']));
         $duration1x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['startYear']));
        $duration2x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['endYear']));
        $datenow = \Carbon\Carbon::now();

         $duration = $duration1x-$duration2x;
         if($duration2>=$duration1){
             return redirect ()->back()->withInput()->with ('error',' Start Year should be earlier than End Year');
         }
          else if($durationstartYear>$datenow ){
          return redirect()->back()->withInput()->with ('error',' Start Year should earlier than Date Today');
         }
          

       
             OrganizationMembership::Create(
            [
                 'type' => $request->type,
                 'organization' => $request->organization,
                 'position' => $request->position,
                 'startYear' => $request->startYear,
                 'endYear' => $request->endYear,
                 'duration' => $duration,           

                'user_id' => $request->user_id,
                    
            ]); 

                $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Organization has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
        

         return redirect ()->back() ->with('success', 'Successfully Added!');


    }

     public function updateOrganization(Request $request)
    {

          $durationstartYear = (\Carbon\Carbon::parse($request['startYear']));
        $duration1 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['startYear']));
        $duration2 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['endYear']));
         $duration1x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['startYear']));
        $duration2x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['endYear']));
        $datenow = \Carbon\Carbon::now();

         $duration = $duration1x-$duration2x;
         if($duration2>=$duration1){
             return redirect ()->back()->with ('error',' Start Year should be earlier than End Year');
         }
          else if($durationstartYear>$datenow ){
          return redirect()->back()->with ('error',' Start Year should earlier than Date Today');
         }
         
       
             OrganizationMembership::updateOrCreate(['id' => $request->id2],
            [
                   'type' => $request->type2,
                 'organization' => $request->organization2,
                 'position' => $request->position2,
                 'startYear' => $request->startYear2,
                 'endYear' => $request->endYear2,
                 'duration' => $duration,

                 

                'user_id' => $request->user_id2,
                    
                 
            ]); 
        


       

           $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Organization has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
        
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }
   

        public function editorganization($id) {
        $formaleduc = OrganizationMembership::find($id);
        return response()->json($formaleduc);
    }


        public function deleteOrganization($id)
    {
        $idd=request('id3');
        $deletedRows = OrganizationMembership::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully  Deleted!');
        
    }



     public function engagement()
    {


        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('engagements','users.id','=','engagements.user_id')
        ->select('engagements.id as formid','users.id as userid','engagements.title','startYear','endYear','duration','venue','involvement','organizer')
        ->where('engagements.user_id','=',$user)
        
        ->get();  

       
        return view ('portfolio/engagements/view',compact('comm'))->with($this->codes());


       
    }

     public function storeEngagement(Request $request)
    {

         
            $duration1 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['startYear']));
        $duration2 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['endYear']));
         $duration1x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['startYear']));
        $duration2x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['endYear']));

         $duration = $duration1-$duration2;
           if($duration2>=$duration1){
             return redirect ()->back() ->with ('error',' Start Year should be earlier than End Year');
         }
          

            $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file')) {

            $user=request('user_id');
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
       
       
             Engagement::Create(
            [
                 'title' => $request->title,
                 'involvement' => $request->involvement,
                 'venue' => $request->venue,
                 'startYear' => $request->startYear,
                 'endYear' => $request->endYear,
                 'organizer' => $request->organizer,
                 'duration' => $duration,
                'user_id' => $request->user_id,
                 'what1' => $request->what1,   
                 'where1' => $request->where1,
                 'when1' => $request->when1,
                 'overview' => $request->overview1,
            ]); 
         }
         else{
             Engagement::Create(
            [
                 'title' => $request->title,
                 'involvement' => $request->involvement,
                 'venue' => $request->venue,
                 'startYear' => $request->startYear,
                 'endYear' => $request->endYear,
                 'organizer' => $request->organizer,

                 'duration' => $duration,
                  'what1' => $request->what1,   
                 'where1' => $request->where1,
                 'when1' => $request->when1,
                 'overview' => $request->overview1,

                'user_id' => $request->user_id,
            ]); 
         }
                    
                $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Engagements has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }

          
        

         return redirect ()->back() ->with('success', 'Successfully Added!');


    }

     public function updateEngagement(Request $request)
    {

              $duration1 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['startYear2']));
        $duration2 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['endYear2']));
         $duration1x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['startYear2']));
        $duration2x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['endYear2']));

         $duration = $duration1-$duration2;
           if($duration2>=$duration1){
             return redirect ()->back() ->with ('error',' Start Year should be earlier than End Year');
         }
         


            $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file2')) {

            $user=request('user_id');
            $file = $request->file('file2');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
       
       
             Engagement::updateOrCreate(['id' => $request->id2],
            [
                  'title' => $request->title2,
                 'involvement' => $request->involvement2,
                 'venue' => $request->venue2,
                 'startYear' => $request->startYear2,
                 'endYear' => $request->endYear2,
                 'organizer' => $request->organizer2,
                 'duration' => $duration,
                'user_id' => $request->user_id2,
                'what1' => $request->what2,
                 'where1' => $request->where2,
                 'when1' => $request->when2,
                 'overview' => $request->overview2,

            ]); 
         }
             else{
                 Engagement::updateOrCreate(['id' => $request->id2],
            [
                  'title' => $request->title2,
                 'involvement' => $request->involvement2,
                 'venue' => $request->venue2,
                 'startYear' => $request->startYear2,
                 'endYear' => $request->endYear2,
                 'organizer' => $request->organizer2,
                 'duration' => $duration,
                'user_id' => $request->user_id2,
                'what1' => $request->what2,
                 'where1' => $request->where2,
                 'when1' => $request->when2,
                 'overview' => $request->overview2,

            ]); 
             }
        
$checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Engagements has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }
   

        public function editengagement($id) {
        $formaleduc = Engagement::find($id);
        return response()->json($formaleduc);
    }


        public function deleteEngagement($id)
    {
        $idd=request('id3');
        $deletedRows = Engagement::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully  Deleted!');
        
    }

    public function community()
    {

   
        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('community_involvements','users.id','=','community_involvements.user_id')
        ->select('community_involvements.id as formid','users.id as userid','community_involvements.title','startYear','endYear','duration','venue','organizer')
        ->where('community_involvements.user_id','=',$user)
        
        ->get();  



        return view ('portfolio/community/view',compact('comm'))->with($this->codes());


       
    }

     public function storeCommunity(Request $request)
    {

            $duration1 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['startYear']));
        $duration2 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['endYear']));
         $duration1x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['startYear']));
        $duration2x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['endYear']));

         $duration = $duration1-$duration2;
           if($duration2>=$duration1){
             return redirect ()->back() ->with ('error',' Start Year should be earlier than End Year');
         }
          

       
              CommunityInvolvement::updateOrCreate(['id' => $request->id2],
            [
                 'title' => $request->title,
                 
                 'venue' => $request->venue,
                 'startYear' => $request->startYear,
                 'endYear' => $request->endYear,
                 'organizer' => $request->organizer,
                 'duration' => $duration,
                  'what1' => $request->what1,
                 'where1' => $request->where1,
                 'when1' => $request->when1,
                 'overview' => $request->overview1,
                'user_id' => $request->user_id,
            ]); 

                 $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Community Involvement has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }


       
        

         return redirect ()->back() ->with('success', 'Successfully Added!');


    }

     public function updateCommunity(Request $request)
    {

          $duration1 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['startYear2']));
        $duration2 = \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($request['endYear2']));
         $duration1x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['startYear2']));
        $duration2x = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['endYear2']));

         $duration = $duration1-$duration2;
           if($duration2>=$duration1){
             return redirect ()->back() ->with ('error',' Start Year should be earlier than End Year');
         }
         
       
             CommunityInvolvement::updateOrCreate(['id' => $request->id2],
            [
                  'title' => $request->title2,
                
                 'venue' => $request->venue2,
                 'startYear' => $request->startYear2,
                 'endYear' => $request->endYear2,
                 'organizer' => $request->organizer2,
                 'duration' => $duration,
                'what1' => $request->what2,
                 'where1' => $request->where2,
                 'when1' => $request->when2,
                 'overview' => $request->overview2,



                 

                'user_id' => $request->user_id2,
                    
                 
            ]); 

            $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Community Involvement has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }
   

        public function editcommunity($id) {
        $formaleduc = CommunityInvolvement::find($id);
        return response()->json($formaleduc);
    }


        public function deleteCommunity($id)
    {
        $idd=request('id3');
        $deletedRows = CommunityInvolvement::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully  Deleted!');
        
    }

    public function storeNarrative(Request $request)
    {

             CommunityNarrative::updateOrCreate(['id' => $request->id4],
            [
                 'what1' => $request->what1,   
                 'where1' => $request->where1,
                 'when1' => $request->when1,
                 'overview' => $request->overview,
                 'id' => $request->id4,
            ]); 

       $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Community Involvement has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
        

         return redirect ()->back() ->with('success', 'Successfully Added!');



    }

           public function editnarrative($id) {
        $formaleduc = CommunityNarrative::find($id);
        return response()->json($formaleduc);
    }


     public function updateNarrative(Request $request)
    {

      
         
       
             CommunityNarrative::updateOrCreate(['id' => $request->id5],
            [
                 'what1' => $request->what2,
                 
                 'where1' => $request->where2,
                 'when1' => $request->when2,
                 'overview' => $request->overview2,
                
                'id' => $request->id5,
                    
                 
            ]); 
        
 $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Community Involvement has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }
   
         return redirect ()->back() ->with ('success',' Successfully Updated!');
    }


     public function plans()
    {
    
        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('plans','users.id','=','plans.user_id')
        ->select('plans.id as formid','users.id as userid','plans.coreValues','priority1','priority2','priority3','sgop','timePlan','accreditationPlan','plantoComplete','essay')
        ->where('plans.user_id','=',$user)
        
        ->get(); 

   
       

        return view ('portfolio/plans/view',compact('comm'))->with($this->codes());

       
    }

     public function plansform()
    {

        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('plans','users.id','=','plans.user_id')
       

        ->select('plans.id as formid','users.id as userid','coreValues','priority1','priority2','priority3','sgop','timePlan','accreditationPlan','plantoComplete','essay')
        ->where('plans.user_id','=',$user)
        
        ->get();  

         $courses = DB::table('courses')
        ->paginate(15);




       
        return view ('portfolio/plans/plans-form',compact('comm','courses'))->with($this->codes());


       
    }

         public function editplansform()
    {

    
        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('plans','users.id','=','plans.user_id')
       

        ->select('plans.id as formid','users.id as userid','coreValues','priority1','priority2','priority3','sgop','timePlan','accreditationPlan','plantoComplete','essay')
        ->where('plans.user_id','=',$user)
        
        ->get();  

         $courses = DB::table('courses')
        ->paginate(15);






       
        return view ('portfolio/plans/edit-plans-form',compact('comm','courses'))->with($this->codes());

       
    }


        public function storePlans(Request $request)
    {

         
       

          

       
             Plan::updateOrCreate(['user_id' => $request->user_id],
            
            [
                 'coreValues' => $request->coreValues,
                 
                 'priority1' => $request->priority1,
                 'priority2' => $request->priority2,
                 'priority3' => $request->priority3,
                 'sgop' => $request->sgop,
                 'timePlan' => $request->timePlan,
                 'accreditationPlan' => $request->accreditationPlan,
                 'plantoComplete' => $request->plantoComplete,
                 'essay' => $request->essay, 
                 'user_id' => $request->user_id,
            ]); 

       
        

       return redirect('plans')->with('success', 'Successfully Updated!');



    }

       public function documents()
    {

    
        $user = Auth::user()->id;

        $comm = DB::table('users')
        ->join('documents','users.id','=','documents.user_id')
        ->select('documents.id as formid','users.id as userid','documents.title','file')
        ->where('documents.user_id','=',$user)
        
        ->get();  


        return view ('portfolio/additional/view',compact('comm'))->with($this->codes());


       
    }


    public function storeDocuments(Request $request)
    {

         $request->validate([
            'file' =>['mimes:pdf,'],
            ]);

          if (request()->has('file')) {

            $user=request('user_id');
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
          

             Document::updateOrCreate(['id' => $request->id2],
            [
                
                'user_id' => $request->user_id,
                'title' => $request->title,      
                 'file' => $filename,

            ]); 
           
        }

        else{
             Document::updateOrCreate(['id' => $request->id2],
            [
                 'user_id' => $request->user_id,
                'title' => $request->title,      
                  
                


            ]); 
        }

           $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Additional Documents has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }


         return redirect ()->back() ->with('success', 'Successfully Added!');


    }

      public function updateDocuments(Request $request)
    {

         $request->validate([
            'file2' =>['mimes:pdf,'],
            ]);

          if (request()->has('file2')) {

            $user=request('user_id2');
            $file = $request->file('file2');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);
          

             Document::updateOrCreate(['id' => $request->id2],
            [
                
                'user_id' => $request->user_id2,
                'title' => $request->title2,      
                 'file' => $filename,

            ]); 
           
        }

        else{
             Document::updateOrCreate(['id' => $request->id2],
            [
                 'user_id' => $request->user_id2,
                'title' => $request->title2,      
                  
                


            ]); 
        }
        $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'Additional Documents has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }

         return redirect ()->back() ->with('success', 'Successfully Updated!');


    }

    public function editdocuments($id) {
        $formaleduc = Document::find($id);
        return response()->json($formaleduc);
    }

      public function deleteDocuments($id)
    {
        $idd=request('id3');
        $deletedRows = Document::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully Deleted!');
        
    }


    public function workexperience()
    {

      
        $user = Auth::user()->id;

         $comm = DB::table('users')
        ->join('work_experiences','users.id','=','work_experiences.user_id')
        ->select('work_experiences.id as formid','users.id as userid','work_experiences.position','companyName','duration')
        ->where('work_experiences.user_id','=',$user)
        
        ->get(); 



        

       
        return view ('portfolio/work/index',compact('comm'))->with($this->codes());

       
    }

     public function workexperienceform()
    {


  
          $user = Auth::user()->id;

         $comm = DB::table('users')
        ->join('work_experiences','users.id','=','work_experiences.user_id')
        ->select('work_experiences.id as formid','users.id as userid','work_experiences.position','companyName','duration')
        ->where('work_experiences.user_id','=',$user)
        
        ->get(); 


 

        return view ('portfolio/work/work-form',compact('comm'))->with($this->codes());

       
    }
     public function storeWorkExperience(Request $request)
    {

         
            $duration1 = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['startYear']));
        $duration2 = \Carbon\Carbon::now()->diffInMonths(\Carbon\Carbon::parse($request['endYear']));

         $duration = $duration1-$duration2;
           if($duration2>=$duration1){
             return redirect ()->back() ->with ('error',' Start Year should be earlier than End Year');
         }
          

           if (request()->has('file')) {

            $user=request('user_id');
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/transcript/',$filename);

       
              WorkExperience::updateOrCreate(['id' => $request->id2],
            [
                 'position' => $request->position,
                 
                 'endYear' => $request->endYear,
                 'startYear' => $request->startYear,
                 'companyName' => $request->companyName,
                 'supervisorName' => $request->supervisorName,
                 'duration' => $duration,
                 'user_id' => $request->user_id,
                 'reason' => $request->reason,
                 'terms' => $request->terms,
                 'companyAddress' => $request->companyAddress,
                 'supervisorDesignation' => $request->supervisorDesignation,
                 'functions' => $request->functions,
                 'ref1' => $request->ref1,
                 'ref2' => $request->ref2,
                 'ref3' => $request->ref3,
                 'position1' => $request->position1,
                 'position2' => $request->position2,
                 'position3' => $request->position3,
                 'contact1' => $request->contact1,
                 'contact2' => $request->contact2,
                 'contact3' => $request->contact3,
                 'email1' => $request->email1,
                 'email2' => $request->email2,
                 'email3' => $request->email3,
                 'file' => $filename,




            ]); 
          }
          else
          {

             WorkExperience::updateOrCreate(['id' => $request->id2],
            [
                 'position' => $request->position,
                 
                 'endYear' => $request->endYear,
                 'startYear' => $request->startYear,
                 'companyName' => $request->companyName,
                 'supervisorName' => $request->supervisorName,
                 'duration' => $duration,
                 'user_id' => $request->user_id,
                 'reason' => $request->reason,
                 'terms' => $request->terms,
                 'companyAddress' => $request->companyAddress,
                 'supervisorDesignation' => $request->supervisorDesignation,
                 'functions' => $request->functions,
                 'ref1' => $request->ref1,
                 'ref2' => $request->ref2,
                 'ref3' => $request->ref3,
                 'position1' => $request->position1,
                 'position2' => $request->position2,
                 'position3' => $request->position3,
                 'contact1' => $request->contact1,
                 'contact2' => $request->contact2,
                 'contact3' => $request->contact3,
                 'email1' => $request->email1,
                 'email2' => $request->email2,
                 'email3' => $request->email3,
            ]); 


          }

           $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();

      $checkoffice = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('office','stage','app_status','applications.id as appid','applications.user_id as appuserid','applications.updated_at','applications.created_at','courseCode','datesubmitted')
        ->latest()
        ->where('applications.user_id','=',Auth::user()->id)
        ->limit(1)
        ->get(); 
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'WorkExperience has been Updated!',
                'notify' => $request->officenotif,             
            ]); 
           $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$request->officenotif)
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$request->officenotif;
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }

       
        
            return redirect('workexperience')->with('success', 'Successfully Updated!');
         // return redirect ()->back() ->with('success', 'Successfully Added!');


    }


       public function deleteWorkExperience($id)
    {
        $idd=request('id3');
        $deletedRows = WorkExperience::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully Formal Education Deleted!');
        
    }

          public function editworkexperience($id) {
        $formaleduc = WorkExperience::find($id);
        return response()->json($formaleduc);
    }

     public function editworkexperienceform($id23)
    {

    


        $user = Auth::user()->id;

         $comm = DB::table('users')
        ->join('work_experiences','users.id','=','work_experiences.user_id')
        ->select('work_experiences.id as formid','users.id as userid','work_experiences.position','companyName','duration','terms','startYear','endYear','companyName','companyAddress','supervisorName','supervisorDesignation','reason','functions','file','ref1','position1','contact1','email1','ref2','position2','contact2','email2','ref3','position3','contact3','email3')
        ->where('work_experiences.id','=',$id23)
        
        ->get(); 

       
        return view ('portfolio/work/work-form-edit',compact('comm'))->with($this->codes());


       
    }


         public function storeApplication(Request $request)
    {

        

        $id = Auth::User()->id;
        $check = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('applications.user_id')
        ->where('applications.user_id','=',$id)
        // ->where('applications.status','!=','completed')
        ->get();

          $plans = DB::table('users')
        ->join('plans','users.id','=','plans.user_id')
        ->select('priority1')
        ->where('plans.user_id','=',$id)
        
        ->get();  

        $check2=$check->count();
        if($check2>=1)
        {
        return redirect ()->back() ->with ('error','You have a current Application on Progress!');

        }
        else{

        $application = new Applications();

       

        $application->user_id=request('user_id');
        $date=Carbon::now()->toDateTimeString();
        $application->office = "eteeap";
        $application->stage= "Submitted";
        $application->app_status = "Submitted";
        $application->courseCode = request('course');
        $application->datesubmitted = $date;

         // $application->resubmitto = "eteeap";
      
    $application->save();
    }


      $checker = DB::table('applications')
        ->where('user_id','=',Auth::user()->id)
        ->get();
    
        $checkers=$checker->count();
        if($checkers>=1){

         Notification::updateorCreate(['user_id' => Auth::user()->id],
            [
                'notif' => 'New Application Submitted!',
                'notify' => 'eteeap',             
            ]); 
         $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=','eteeap')
        ->limit(1)
        ->get(); 
           $emailto = substr($emails->pluck('email'), 2,-2);

           $receiver2 =(Auth::user()->profiles->lastName .','. Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName);
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver ='eteeap';
                $objDemo->receiver2 =$receiver2;

                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to($emailto)->send(new StaffReceiveEmail($objDemo));
     }




        

         // return redirect ()->back() ->with('success', 'Successfully Application Submitted!');
            return redirect('userapplication')->with('success', 'Successfully Application Submitted!');


    }


          public function userapplication()
    {


        $user = Auth::user()->id;

          $deletedRows = Notification::where('user_id',$user)->delete();



        $comm = DB::table('users')
        ->join('formal_education','users.id','=','formal_education.user_id')
        ->select('formal_education.id as formid','users.id as userid','formal_education.schoolName','formal_education.schoolAddress'
            ,'formal_education.transcript','formal_education.degree','formal_education.yearGraduated','formal_education.schoolLvl')
        ->where('formal_education.user_id','=',$user)
        
        ->get();  

 
        $application = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('office','stage','app_status','applications.id as appid','applications.user_id as appuserid','applications.updated_at','applications.created_at','courseCode','datesubmitted')
          
        ->where('applications.user_id','=',$user)
        ->latest()
        
        ->where('history','!=','yes')
        ->limit(1)
        ->get(); 
        $checkapplication = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('office')
        ->where('applications.user_id','=',$user)
        ->get();  
        $applicationhistory = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('office','stage','app_status','applications.id as appid','applications.user_id as appuserid','applications.updated_at','applications.created_at','courseCode','datesubmitted','history')
        
       
        ->where('applications.user_id','=',$user)
        ->get(); 
                $remarks = DB::table('applications')
        ->join('remarks','applications.id','=','remarks.app_id')
        ->join('users','applications.user_id','=','users.id')
        ->select('remarks.id','remarks.office','remarks.file','remarks.remarks','applications.app_status','applications.stage','remarks.created_at')
        ->where('applications.user_id','=',$user)
        
         ->get(); 

       
        $app2=DB::table('applications')

        ->where('user_id', $user)
        ->where('history','!=','yes')
        ->limit(1)

        ->latest()->get();


        $app = substr($app2->pluck('id'), 1,-1);
        $office = substr($app2->pluck('office'), 2,-2);
        $course = substr($app2->pluck('courseCode'), 2,-2);
        $datesubmitted = substr($app2->pluck('datesubmitted'), 2,-2);
        $status = substr($app2->pluck('app_status'), 2,-2);
        $stage = substr($app2->pluck('stage'), 2,-2);
                $progressbar=DB::table('stages')

        ->where('stage', $stage)
        
        ->get();

        $progressID = substr($progressbar->pluck('id'), 1,-1);
        
       
        return view ('/portfolio/application/remarks',compact('application','applicationhistory','remarks','checkapplication','progressID'))->with($this->codes());
        // return view ('portfolio/view',compact('notifications','countnotif','count','not'));

       
    }

        public function remark($id) {
       
          $rem = Remark::find($id);
      
       
        return response()->json($rem);
    }

   

   
}
