<?php

namespace App\Http\Controllers\Admin;
use App\Role;
use App\Stage;

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
use App\Mail\SendMailable;
use Mail;
use App\Mail\DemoEmail;
use App\Mail\ReceivedEmail;
use App\Mail\FailedEmail;

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

class ApplicationsStaffController extends Controller
{
  public function index()
    {

       $id = Auth::User()->id;
        $not = DB::table('notifications')
        ->select('user_id')
        ->where('notify','=',Auth::user()->id)
        ->get();
        if(Auth::user()->hasAnyRole('user')){
             $id=Auth::user()->roles()->pluck('name')->toArray();   
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

      
   
        if(Auth::user()->hasAnyRole('eteeap')){


        $id=Auth::user()->roles()->pluck('name')->toArray();
        $application = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->join('profiles','users.id','=','profiles.user_id')
        
        ->select('applications.id as appid','users.id as userid','applications.office','applications.app_status','profiles.firstName','profiles.lastName','profiles.middleName','applications.created_at','applications.stage','datesubmitted')
        ->where('applications.history','=','')
        // ->where('applications.office','=',$id)
        ->orderBy('created_at','desc')
        ->get();

            }

      elseif(Auth::user()->hasAnyRole('admin')){



        $id=Auth::user()->roles()->pluck('name')->toArray();
        $application = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->join('profiles','users.id','=','profiles.user_id')
        
        ->select('applications.id as appid','users.id as userid','applications.office','applications.app_status','profiles.firstName','profiles.lastName','profiles.middleName','applications.created_at','applications.stage','applications.user_id as appuserid','datesubmitted')
         ->where('applications.history','=','')
          ->orderBy('created_at','desc')

        ->get();
    }
      elseif(Auth::user()->hasAnyRole('user')){
     return view ('/');
    }
    else{
      $id=Auth::user()->roles()->pluck('name')->toArray();
        $application = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->join('profiles','users.id','=','profiles.user_id')
        
        ->select('applications.id as appid','users.id as userid','applications.office','applications.app_status','profiles.firstName','profiles.lastName','profiles.middleName','applications.created_at','applications.stage','datesubmitted')  
        ->where('applications.history','=','')
        ->where('applications.office','=',$id)
        ->orderBy('created_at','desc')
        ->get();
    }

        
       
    return view ('applicant/view',compact('application','countnotif','not','notifications'));

    }

    public function show(Request $request, $user)
    {
        // $deletedRows = Notification::where('notify',Auth::user()->id)->delete();
        
       $id = Auth::User()->id;
        $not = DB::table('notifications')
        ->select('user_id')
        ->where('notify','=',Auth::user()->id)
        ->get();

        if(Auth::user()->hasAnyRole('user')){
             $id2=Auth::user()->roles()->pluck('name')->toArray();
        $notifications = DB::table('notifications')
        ->where('user_id','=',$id)
        ->where('notify','=',$id2)
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

        
         // $user=request('userid');
         $profile2=User::findOrFail($user);
        
         $profile = User::findOrFail($user)->profiles;

         $users = User::whereHas('roles', function($q){$q->whereIn('name', ['admin','eteeap']);})->get();
       
         //$app=$request->get('appid');

      $app2=DB::table('applications')

        ->where('user_id', $user)
        
        ->latest()->get();
        $app = substr($app2->pluck('id'), 1,-1);
        $office = substr($app2->pluck('office'), 1,-1);
        // $resubmitto = substr($app2->pluck('resubmitto'), 1,-1);
        $status = substr($app2->pluck('app_status'), 1,-1);
        $stage = substr($app2->pluck('stage'), 1,-1);
        $lastupdate = substr($app2->pluck('updated_at'), 2,-2);
       
        $updater = substr($app2->pluck('updater'), 1,-1);


        $app3=DB::table('remarks')
        ->where('application_id','=', $app)
        ->paginate(10);

       
            // $app3=Remark::where('application_id','=', $app)->paginate(100);

        


        return view ('/applicant/show',compact('profile','users','profile2','app','office','status','lastupdate','statuspercent','app3','updater','app2','stage','countnotif','notifications','not'));
  
    }

  
   
  

     public function store(Request $request)
    {
    		
    	  


    return redirect ()->back() ->with ('success',' Successfully Application Updated!');


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
            
      
            'remarks'=>['required','string','max:1000'],
           
            'attachment' => ['mimes:pdf,docx,doc'],
           
            ]); 
      
        $date=Carbon::now();
        
            $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
      $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();
        $remarks = new Remark();

       if (request()->has('attachment')) {

            $user=request('office');
            $file = $request->file('attachment');
            $extension = $file->getClientOriginalExtension();
            $filename = $user.time().'.'. $extension;
            $file->move('uploads/file/',$filename);
            $remarks->file = $filename;
        
        }

         $remarks->app_id = request('appidremarks1');
         $remarks->remarks = request('remarks');
         

          $remarks->office = request('office');
          $remarks->save();

            $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
   
   

        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));


    return redirect ()->back() ->with ('success',' Successfully Application Updated!');


    }


  
   public function viewApplication(Request $request, $user2)
    {



         $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$user2)
          ->where('notify','=',$rolenotif)
          ->delete();

          $app2=DB::table('applications')

        ->where('user_id', $user2)
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




        if($status == 'Submitted'){

              $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$user2)
          ->where('notify','=',$rolenotif)
          ->delete();
             
        
           $applicationupdate = DB::table('applications')->where('user_id', '=',  $user2)->update(array('history' => 'yes'));

        $application2 = new Applications();
        $application2->user_id=$user2;
        $application2->office = $office;
        $application2->stage='Initial Assessment';
        $application2->app_status = 'Received';
        $application2->datesubmitted = $datesubmitted;
        
        $application2->courseCode = $course;

        $application2->save(); 
        $notifications = new Notification();
        $notifications->user_id= $user2;
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
        ->select('hobbies.id as formid','users.id as userid','hobbies.hobbyTitle','hobbies.ratingofSkill','file')
        ->where('hobbies.user_id','=',$user2)
        
        ->paginate(5);
$specialskills = DB::table('users')
        ->join('special_skills','users.id','=','special_skills.user_id')
        ->select('special_skills.id as formid','users.id as userid','special_skills.skillName','file')
        ->where('special_skills.user_id','=',$user2)
        
        ->paginate(5); 
$workactivity = DB::table('users')
        ->join('work_activities','users.id','=','work_activities.user_id')
        ->select('work_activities.id as formid','users.id as userid','work_activities.activity','work_activities.description','file')
        ->where('work_activities.user_id','=',$user2)
        
        ->paginate(5); 
$volunteer = DB::table('users')
        ->join('volunteers','users.id','=','volunteers.user_id')
        ->select('volunteers.id as formid','users.id as userid','volunteers.title','file')
        ->where('volunteers.user_id','=',$user2)
        
        ->paginate(5);  
$travel = DB::table('users')
        ->join('travels','users.id','=','travels.user_id')
        ->select('travels.id as formid','users.id as userid','travels.location','purpose','learningExperience','file')
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
        ->where('history','!=','yes')

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

      

        $applicationhistory = DB::table('applications')
       
        ->select('office','stage','app_status','applications.id as appid','applications.user_id as appuserid','applications.updated_at','applications.created_at','courseCode','history')
        

        ->orderBy('history','desc')
        ->orderBy('applications.created_at','asc')


        ->where('applications.user_id','=',$user2)

        
        ->paginate(30);  

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
    $users = User::whereHas('roles', function($q){$q->whereIn('name', ['admin','eteeap']);})->get();
        $locationstart = substr($application->pluck('courseCode'), 2,-2);
        $locationselect = DB::table('courses')
        ->select('officeCode')
        ->where('courseName', $locationstart)
        ->get();
        $location = substr($locationselect->pluck('officeCode'), 2,-2);


     $roles  = Role::get()->whereIn('name', ['user','admin','eteeap']);

     // if($checkapplication != 'dean'){
     //    return redirect ()->back() ->with('error', 'Application not assigned to you!');

     // }
         

       
        return view ('portfolio/application/portfolio',compact('check','notifications','countnotif','not','comm','plans','formaleduc','nformaleduc','certificationexam','licensure','workexperience','awards','creativeworks','hobbies','specialskills','workactivity','volunteer','travel','organization','engagement','communityinvolvement','documents','profile','application','applicationhistory','users','office','remarks','checkapplication','roles','authrole','app2','useremail','progressID','location','locationstart'));

       
    }  


    public function viewworkexperience($id) {
        $formaleduc = WorkExperience::find($id);
        return response()->json($formaleduc);
    }

     public function viewnarrative($id) {
        $formaleduc = CommunityInvolvement::find($id);
        return response()->json($formaleduc);
    }
         public function viewnarrativeeng($id) {
        $formaleduc = Engagement::find($id);
        return response()->json($formaleduc);
    }
         
           public function addremarkx($id) {
        $formaleduc = Applications::find($id);
        return response()->json($formaleduc);
    }
    public function remark($id) {
       
          $rem = Remark::find($id);
      
       
        return response()->json($rem);
    }
     public function editoffice($id) {
        $formaleduc = Role::find($id);
        return response()->json($formaleduc);
    }


     public function updateApplication(Request $request)
    { 

        $stagename=request('stage');
       


        $stageid=DB::table('stages')
           ->select('id')
        ->where('stage','=',$stagename)
        ->get();
        $stagelevel = substr($stageid->pluck('id'), 1,-1);
        $updatestage = DB::table('stages')
                   ->select('stage')
                ->where('id','=',$stagelevel)
                ->get();
        $office= request('office');
       $plans2 = DB::table('users')
        ->join('plans','users.id','=','plans.user_id')
        ->select('priority1','priority2','priority3')
        ->where('plans.user_id','=',$request->appuserid)
        
        ->get();  
        $priority1 = substr($plans2->pluck('priority1'), 2,-2);

        $priority2 = substr($plans2->pluck('priority2'), 2,-2);
        $priority3 = substr($plans2->pluck('priority3'), 2,-2);



        $courseCode = request('courseCode');

        $checkprograd = DB::table('applications')
        ->where('stage','=','Process Prior Graduation')
        ->where('app_status','=','On Going')
        ->get();
        $countprograd=$checkprograd->count();

          $coursePriority1 = DB::table('applications')
        ->where('courseCode','=',$priority1)
        ->where('app_status','=','Failed')
        ->get();
        $count1st=$coursePriority1->count();

        $coursePriority2 = DB::table('applications')
        ->where('courseCode','=',$priority2)
        ->where('app_status','=','Failed')

        ->get();
        $count2nd=$coursePriority2->count();

         $coursePriority3 = DB::table('applications')
        ->where('courseCode','=',$priority3)
        ->where('app_status','=','Failed')

        ->get();
        $count3rd=$coursePriority3->count();




           $stageid=DB::table('stages')
           ->select('id')
        ->where('stage','=',$stagename)
        ->get();
        $stagelevel = substr($stageid->pluck('id'), 1,-1);

        if(request('status')=='Passed'){
       switch ($request->input('updateButton')) {


        case 'plus':
        if($stagename == 'Second Assessment'){

         
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

       
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);

        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = request('office');
        $application->stage= request('stage');
        $application->app_status = 'Passed';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;
        $application->save(); 

       
   $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));

        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage= $updatestagelevel;
        $application->app_status = 'On Going';
        $application->datesubmitted = request('datesubmitted');
        
        $application->courseCode = $courseCode;

        $application->save(); 

       


         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
        //  $notifications = new Notification();
        // $notifications->user_id= request('appuserid');
        // $notifications->notify=$office;
        // $notifications->notif='Application has been Updated!';
        // $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');

         }


         elseif($stagename == 'Third Assessment'){

         
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

       
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);
       
   $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));

        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage= request('stage');
        $application->app_status = 'On Going';
        $application->datesubmitted = request('datesubmitted');
        
        $application->courseCode = $courseCode;

        $application->save(); 

       


         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
        //  $notifications = new Notification();
        // $notifications->user_id= request('appuserid');
        // $notifications->notify=$office;
        // $notifications->notif='Application has been Updated!';
        // $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');







         }


         elseif($stagename == 'Completion of Enhancement Program'){

             $history = DB::table('applications')
           ->select('office')
        ->where('stage','=','Second Assessment')
        ->where('app_status','=','Passed')
        ->where('history','=','yes')
        

       
        ->limit(1)
        ->get();
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

        $office= substr($history->pluck('office'), 2,-2);
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);


     

          $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));


        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage= request('stage');
        $application->app_status = 'On Going';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;


        $application->save(); 


         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
         $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify='eteeap';
        $notifications->notif='Application has been Updated!';
        $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');



         }

         elseif($stagename == 'Final Assessment'){

             $history = DB::table('applications')
           ->select('office')
        ->where('stage','=','Second Assessment')
        ->where('app_status','=','Passed')
        ->where('history','=','yes')
        

       
        ->limit(1)
        ->get();
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

        $office= substr($history->pluck('office'), 2,-2);
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);


     

          $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));


        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage= request('stage');
        $application->app_status = 'On Going';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;


        $application->save(); 


         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
         $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify='eteeap';
        $notifications->notif='Application has been Updated!';
        $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');



         }

          elseif($stagename == 'Process Prior Graduation'){

             $history = DB::table('applications')
           ->select('office')
        ->where('stage','=','Second Assessment')
        ->where('app_status','=','Passed')
        ->where('history','=','yes')
        

       
        ->limit(1)
        ->get();
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

        $office= substr($history->pluck('office'), 2,-2);
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);

        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = $office;
        $application->stage= request('stage');
        $application->app_status = 'On Going';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;
     

          $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));


        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage= request('stage');
        $application->app_status = 'On Going';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;


        $application->save(); 


         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
         $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify='eteeap';
        $notifications->notif='Application has been Updated!';
        $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');



         }

        elseif($stagename == 'Graduation Rites'){

             $history = DB::table('applications')
           ->select('office')
        ->where('stage','=','Second Assessment')
        ->where('app_status','=','Passed')
        ->where('history','=','yes')
        

       
        ->limit(1)
        ->get();
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

        $office= substr($history->pluck('office'), 2,-2);
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);

       


          $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));

          
        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage=$updatestagelevel;
        $application->app_status = 'Passed';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;
        $application->save(); 
     




         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
         $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify='eteeap';
        $notifications->notif='Application has been Updated!';
        $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');



         }

       
        $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();
        
        
       

         break;
                
                 case 'minus':

                if($stagelevel>1){
                 

                 $updatestage = DB::table('stages')
                   ->select('stage')
                ->where('id','=',$stagelevel-1)
                ->get();

                break;
                }
                else{
                   $updatestage = DB::table('stages')
                   ->select('stage')
                ->where('id','=',$stagelevel)
                ->get();
     
                }
        }   
    }
    elseif(request('status')=='On Going'){
       switch ($request->input('updateButton')) {


        case 'plus':
                 if($stagename == 'Admission'){

             $history = DB::table('applications')
           ->select('office')
        ->where('stage','=','Second Assessment')
        ->where('app_status','=','Passed')
        ->where('history','=','yes')
        

       
        ->limit(1)
        ->get();
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

        $office= substr($history->pluck('office'), 2,-2);
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);


           $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage= request('stage');
        $application->app_status = 'Passed';
        $application->datesubmitted = request('datesubmitted');
        
        $application->courseCode = $courseCode;

        $application->save(); 

          $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));


        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage= $updatestagelevel;
        $application->app_status = 'On Going';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;


        $application->save(); 


         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
        //  $notifications = new Notification();
        // $notifications->user_id= request('appuserid');
        // $notifications->notify=$office;
        // $notifications->notif='Application has been Updated!';
        // $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');



         }

         elseif($stagename == 'Third Assessment'){

             $history = DB::table('applications')
           ->select('office')
        ->where('stage','=','Second Assessment')
        ->where('app_status','=','Passed')
        ->where('history','=','yes')
        

       
        ->limit(1)
        ->get();
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

        $office= substr($history->pluck('office'), 2,-2);
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);


           $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage= request('stage');
        $application->app_status = 'Passed';
        $application->datesubmitted = request('datesubmitted');
        
        $application->courseCode = $courseCode;

          $application->save(); 

          $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));


        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage= $updatestagelevel;
        $application->app_status = 'On Going';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;


        $application->save(); 


         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
        //  $notifications = new Notification();
        // $notifications->user_id= request('appuserid');
        // $notifications->notify=$office;
        // $notifications->notif='Application has been Updated!';
        // $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');



         }

         elseif($stagename == 'Enrollment'){

             $history = DB::table('applications')
           ->select('office')
        ->where('stage','=','Second Assessment')
        ->where('app_status','=','Passed')
        ->where('history','=','yes')
        

       
        ->limit(1)
        ->get();
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

        $office= substr($history->pluck('office'), 2,-2);
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);


           $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage= request('stage');
        $application->app_status = 'Passed';
        $application->datesubmitted = request('datesubmitted');
        
        $application->courseCode = $courseCode;

        $application->save(); 

          $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));


        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = $office;
        $application->stage= $updatestagelevel;
        $application->app_status = 'On Going';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;


        $application->save(); 


         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
         $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify=$office;
        $notifications->notif='Application has been Updated!';
        $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();


        $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$office)
        ->limit(1)
        ->get(); 
        $emailto = substr($emails->pluck('email'), 2,-2);

        $receiver = $office;
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        
        Mail::to($emailto)->send(new DemoEmail($objDemo));

        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

    
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');



         }

          elseif($stagename == 'Completion of Enhancement Program'){

             $history = DB::table('applications')
           ->select('office')
        ->where('stage','=','Second Assessment')
        ->where('app_status','=','Passed')
        ->where('history','=','yes')
        

       
        ->limit(1)
        ->get();
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

        $office= substr($history->pluck('office'), 2,-2);
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);

        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage=request('stage');
        $application->app_status = 'Passed';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;
        $application->save(); 
     

          $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));


        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = $office;
        $application->stage= $updatestagelevel;
        $application->app_status = 'On Going';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;


        $application->save(); 


         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
         $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify=$office;
        $notifications->notif='Application has been Updated!';
        $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();

                $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$office)
        ->limit(1)
        ->get(); 
        $emailto = substr($emails->pluck('email'), 2,-2);

        $receiver = $office;
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        
        Mail::to($emailto)->send(new DemoEmail($objDemo));



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');



         }

         elseif($stagename == 'Final Assessment'){

             $history = DB::table('applications')
           ->select('office')
        ->where('stage','=','Second Assessment')
        ->where('app_status','=','Passed')
        ->where('history','=','yes')
        

       
        ->limit(1)
        ->get();
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

        $office= substr($history->pluck('office'), 2,-2);
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);

        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage=request('stage');
        $application->app_status = 'Passed';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;
        $application->save(); 
     

          $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));


        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage= $updatestagelevel;
        $application->app_status = 'On Going';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;


        $application->save(); 


         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
         $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify='eteeap';
        $notifications->notif='Application has been Updated!';
        $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');



         }

         elseif($stagename == 'Process Prior Graduation' AND $countprograd <= 1){

             $history = DB::table('applications')
           ->select('office')
        ->where('stage','=','Second Assessment')
        ->where('app_status','=','Passed')
        ->where('history','=','yes')
        

       
        ->limit(1)
        ->get();
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

        $office= substr($history->pluck('office'), 2,-2);
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);


          $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));


        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = $office;
        $application->stage=request('stage');
        $application->app_status = 'On Going';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;
        $application->save(); 
     




         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
         $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify=$office;
        $notifications->notif='Application has been Updated!';
        $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();

                $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$office)
        ->limit(1)
        ->get(); 
        $emailto = substr($emails->pluck('email'), 2,-2);

        $receiver = $office;
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        
        Mail::to($emailto)->send(new DemoEmail($objDemo));



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');



         }

         elseif($stagename == 'Process Prior Graduation' AND $countprograd >=2){

             $history = DB::table('applications')
           ->select('office')
        ->where('stage','=','Second Assessment')
        ->where('app_status','=','Passed')
        ->where('history','=','yes')
        

       
        ->limit(1)
        ->get();
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

        $office= substr($history->pluck('office'), 2,-2);
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);

          $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage=request('stage');
        $application->app_status = 'Passed';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;
        $application->save(); 


          $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));

          
        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage=$updatestagelevel;
        $application->app_status = 'Passed';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;
        $application->save(); 
     




         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
         $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify='eteeap';
        $notifications->notif='Application has been Updated!';
        $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');



         }

         elseif($stagename == 'Graduation Rites'){

             $history = DB::table('applications')
           ->select('office')
        ->where('stage','=','Second Assessment')
        ->where('app_status','=','Passed')
        ->where('history','=','yes')
        

       
        ->limit(1)
        ->get();
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();

        $office= substr($history->pluck('office'), 2,-2);
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);

       


          $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));

          
        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage=$updatestagelevel;
        $application->app_status = 'Passed';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;
        $application->save(); 
     




         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
         $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify='eteeap';
        $notifications->notif='Application has been Updated!';
        $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');



         }


         


          $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel+1)
        ->get();


       
       
        
        
   

         break;
        

         case 'minus':
    if($stagelevel>1){
                 

                 $updatestage = DB::table('stages')
                   ->select('stage')
                ->where('id','=',$stagelevel-1)
                ->get();

                break;
                }
                else{
                   $updatestage = DB::table('stages')
                   ->select('stage')
                ->where('id','=',$stagelevel)
                ->get();
     
                }
        }   
    }
      else{


         
            if($count1st>=0){

            
            $courseCode=$priority2;


                 if($count2nd>=1){
                $courseCode=$priority3; 

                if($count3rd>=1){

                $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
                // Notification::find($id)->delete();
               
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify='eteeap';
        $notifications->notif='Application has been Updated!';
        $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();


                $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
                $objDemo = new \stdClass();
                $objDemo->sender = 'UB ETEEAP';
                $objDemo->receiver =$receiver;
                $objDemo->link=$this->domain =config('app.url');

               
                Mail::to(request('useremail'))->send(new FailedEmail($objDemo));


        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = request('office');
        $application->stage='Failed';
        $application->app_status = 'Failed';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;
        $application->save(); 
          
        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage='Failed';
        $application->app_status = 'Failed';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;
        $application->save(); 

         $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));

                return redirect ()->back() ->with ('success',' Successfully Application Updated!');
                         
                              
                    

                        

                     }
                 }

            }



        else{
            $courseCode=$priority1;
        }
         
         
 switch ($request->input('updateButton')) {


        case 'plus':
       
        $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel)
        ->get();
        
        
       

         break;


         case 'minus':
    if($stagelevel>1){
                 

                 $updatestage = DB::table('stages')
                   ->select('stage')
                ->where('id','=',$stagelevel-1)
                ->get();

                break;
                }
                else{
                   $updatestage = DB::table('stages')
                   ->select('stage')
                ->where('id','=',$stagelevel)
                ->get();
     
                }
        }   
    }



     if($stagename == 'Second Assessment'){

             $history = DB::table('applications')
           ->select('office')
        ->where('stage','=','Second Assessment')
        ->where('app_status','=','Passed')
        ->where('history','=','yes')
        

       
        ->limit(1)
        ->get();
       

         $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel-1)
        ->get();

        $office= substr($history->pluck('office'), 2,-2);
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);

          $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = request('office');
        $application->stage=request('stage');
        $application->app_status = request('status');
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;
        $application->save(); 


          $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));

          
        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage=$updatestagelevel;
        $application->app_status = 'On Going';
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;
        $application->save(); 
     




         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
         $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify='eteeap';
        $notifications->notif='Application has been Updated!';
        $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');



         }



        $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel-1)
        ->get();

        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);

        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = $office;
        $application->stage= request('stage');
        $application->app_status = request('status');
        $application->datesubmitted = request('datesubmitted');
        $application->courseCode = $courseCode;


        $application->save(); 


         $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));


         
        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage= $updatestagelevel;
        $application->app_status = request('status');
        $application->datesubmitted = request('datesubmitted');
        
        $application->courseCode = $courseCode;

        $application->save(); 


         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        
         $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify='eteeap';
        $notifications->notif='Application has been Updated!';
        $notifications->save();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
         $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect('applicants') ->with ('success',' Successfully Application Updated!');
    }

    public function rollbackApplication(Request $request)
    { 
  
         //    ]); 
        $stagename=request('stage');


           $stageid=DB::table('stages')
           ->select('id')
        ->where('stage','=',$stagename)
        ->get();

        $stagelevel = substr($stageid->pluck('id'), 1,-1);

        $updatestage = DB::table('stages')
           ->select('stage')
        ->where('id','=',$stagelevel-1)
        ->get();
        $updatestagelevel = substr($updatestage->pluck('stage'), 2,-2);

         $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));



        $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = request('office');
        $application->stage= $updatestagelevel;
        $application->app_status = request('status');
        $application->datesubmitted = request('datesubmitted');
        
        $application->courseCode = $courseCode;

        $application->save(); 


        $deletedRows = Notification::where('user_id',$request->get('appuserid'))->delete();
        // Notification::find($id)->delete();
       
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify=Auth::user()->id;
        $notifications->notif='Your Application has been Updated!';
        $notifications->save();



        $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

   
         return redirect ()->back() ->with ('success',' Successfully Application Submitted!');
    }

         public function forwardApplication(Request $request)
    { 
        // $date=Carbon::now();
        // $application=DB::table('applications')
        // ->where('id', $request->get('appid'))
        // ->update(['stage' => $request->get('stage'),
        //              'app_status' => $request->get('status'),
                
        //          'updated_at'       => $date,
                

        //      ]); 


      
        if(request('stage2')=='Initial Assessment'){

              $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = 'eteeap';
        $application->stage= 'Initial Assessment';
        $application->app_status = 'Passed';
        $application->datesubmitted = request('datesubmitted');
        
        $application->courseCode = request('courseCode2');

        $application->save(); 

            $stage= 'Second Assessment';

                
        }
        else{
        $stage= request('stage2');

        }
        $applicationupdate = DB::table('applications')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));
          $application = new Applications();
        $application->user_id=request('appuserid');
        $application->office = request('office2');
        $application->stage= $stage;
        $application->app_status = 'On Going';
        $application->courseCode = request('courseCode2');

        $application->datesubmitted = request('datesubmitted');
        
        $application->save();    

         $usernotif =request('appuserid');
            $rolenotif=Auth::user()->roles()->pluck('name')->toArray();
          $deletedRows = Notification::where('user_id',$usernotif)
          ->where('notify','=',$rolenotif)
          ->delete();
        $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify='user';
        $notifications->notif='Your Application has been Forwarded!';
        $notifications->save();

         $notifications = new Notification();
        $notifications->user_id= request('appuserid');
        $notifications->notify=request('office2');
        $notifications->notif='Application has been Forwarded!';
        $notifications->save();

        $officereq=request('office2');
        $emails= DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->join('roles','roles.id','=','role_user.role_id')
        ->select('email')
        ->where('roles.name','=',$officereq)
        ->limit(1)
        ->get(); 
        $emailto = substr($emails->pluck('email'), 2,-2);
        if($emailto != null){

        $receiver = $officereq;
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        
        Mail::to($emailto)->send(new DemoEmail($objDemo));
      }
      


                $receiver = request('emailfname').' '.request('emailmname').' '.request('emaillname');
        $objDemo = new \stdClass();
        $objDemo->sender = 'UB ETEEAP';
        $objDemo->receiver =$receiver;
        $objDemo->link=$this->domain =config('app.url');

        // Mail::to('reevechels@gmail.com')->send(new DemoEmail($objDemo));
        Mail::to(request('useremail'))->send(new DemoEmail($objDemo));

     return redirect('applicants') ->with ('success',' Successfully Application Forwarded!');
        
    }



     public function viewOffice()
    {

        $id = Auth::User()->id;
        $not = DB::table('notifications')
        ->select('user_id')
        ->where('notify','=',Auth::user()->id)
        ->get();

        if(Auth::user()->hasAnyRole('user')){
             $id=Auth::user()->roles()->pluck('name')->toArray();
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

    $users = User::whereHas('roles', function($q){$q->whereNotIn('name', ['user','admin','eteeap']);})->get();
   
    $roles  = Role::get()->whereNotIn('name', ['user','admin','eteeap']);
     
    


     // if($checkapplication != 'dean'){
     //    return redirect ()->back() ->with('error', 'Application not assigned to you!');

     // }
         
         $rolechoices = DB::table('courses')
        
        ->get();

       
        return view ('offices',compact('check','notifications','countnotif','not','comm','users','roles','rolechoices'));

       
    }  


     public function addOffice(Request $request)
    { 
    
    $check = DB::table('roles')
       
        ->select('name')
        ->where('name','=',request('office'))
        // ->orwhere('courseName','=',request('courseName1'))
        // ->where('applications.status','!=','completed')
        
        ->get()->count();
        if($check>=1)
        {
        return redirect ()->back() ->with ('error','Office Exist!');

        }
       
        
        Role::Create(
            [
                'name' => $request->office,
                
            ]);        
   
         return redirect ()->back() ->with ('success',' Successfully Office Added!');
    }

      public function updateOffice(Request $request)
    { 
    
    $check = DB::table('roles')
       
        ->select('name')
        ->where('name','=',request('office'))
        // ->orwhere('courseName','=',request('courseName1'))
        // ->where('applications.status','!=','completed')
        
        ->get()->count();
        if($check>=1)
        {
        return redirect ()->back() ->with ('error','Office Exist!');

        }
       
        
        Role::updateOrCreate(['id' => $request->id2],
            [
                'name' => $request->office2,
                
            ]); 
        $updaterole = DB::table('courses')->where('officeCode', '=',  $request->courseCodex)->update(array('officeCode' => $request->office2));
        $updateapp = DB::table('applications')->where('office', '=',  $request->courseCodex)->update(array('office' => $request->office2));
   
         return redirect ()->back() ->with ('success',' Successfully Office Updated!');
    }

    public function deleteOffice($id)
    {
         // $updaterole = DB::table('roles')->where('user_id', '=',  $request->appuserid)->update(array('history' => 'yes'));

         $id=Auth::user()->roles()->pluck('name')->toArray();
        

          $check = User::whereHas('roles', function($q){
                $q->where('name', request('office3'));
                })->get()->count();
         if($check>=1)
        {
        return redirect ()->back() ->with ('error','Office is in Use!');

        }
        // $user->roles()->sync($request->roles);

        $idd=request('id3');
        $deletedRows = Role::where('id', $idd)->delete();
      




         return redirect ()->back() ->with('success', 'Successfully Formal Education Deleted!');
        
    }

    public function mail(){
           $id = Auth::User()->id;
        $not = DB::table('notifications')
        ->select('user_id')
        ->where('notify','=',Auth::user()->id)
        ->get();

        if(Auth::user()->hasAnyRole('user')){
             $id=Auth::user()->roles()->pluck('name')->toArray();

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
        ->paginate(1);
        $countnotif=$notifications->count();
    }


         return view ('mails/demo_plain',compact('countnotif','not','notifications'));


    }


}
