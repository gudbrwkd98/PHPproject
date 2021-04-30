<?php

namespace App\Http\Controllers\Admin;
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
use App\Role;
use App\Profile;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('index');
        $users = User::All();
        //$roles = $user->roles()->pluck('name');

           $id2 = Auth::User()->id;
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
        ->where('user_id','=',$id)
        ->where('notif','!=','Your Application has been Updated!')
        ->paginate(1);
        $countnotif=$notifications->count();
    }


        $user = User::find($id2);

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
          $check = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('applications.user_id')
        ->where('applications.user_id','=',$id)
        // ->where('applications.status','!=','completed')
        ->get();

         $check2=$check->count();


         $roles  = Role::get()->whereNotIn('name', ['user','admin']);

       
       return view('user.index',compact('users','countnotif','not','notifications','plans','formaleduc','nformaleduc','certificationexam','licensure','workexperience','awards','creativeworks','hobbies','specialskills','workactivity','volunteer','travel','organization','engagement','communityinvolvement','documents','check','roles'));

      

        
    }

      public function store(Request $request)
    {
        //Check that current user isn't editing themselves
            $request->validate([
            'id'=>['required','string','max:10'],
            'name'=>['required','string','max:10'],
            'email'=>['required','string','email','max:10'],
           
            ]); 
        $users = new User();

        $users->id=request('id');
        $users->firstname = request('name');
        $users->email = request('email');

      
    $users->save();
    //return redirect('success','You Have successfully Created a Profile!');
    return redirect ('user.index') ->with ('success','You Have successfully Created a Profile!');
    }

 
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id2)

    {
    }
    public function edit($id2)

    {

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
        ->where('user_id','=',$id)
        ->where('notif','!=','Your Application has been Updated!')
        ->paginate(1);
        $countnotif=$notifications->count();
    }


        //Check that current user isn't editing themselves
        if( Auth::user()->id == $id2){
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself.');
        }
        $user = User::find($id2);
        $roles = Role::all();

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
          $check = DB::table('users')
        ->join('applications','users.id','=','applications.user_id')
        ->select('applications.user_id')
        ->where('applications.user_id','=',$id)
        // ->where('applications.status','!=','completed')
        ->get();

       






       return view('user.edit',compact('user','countnotif','not','roles','notifications','plans','formaleduc','nformaleduc','certificationexam','licensure','workexperience','awards','creativeworks','hobbies','specialskills','workactivity','volunteer','travel','organization','engagement','communityinvolvement','documents','check'));

        // return view('user.edit')->with([ 'user' => User::find($id) , 'roles' => Role::all(),'countnotif','not' ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Check that current user isn't editing themselves
        if( Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself.');
        }
        $roleid = request('roles');
        if($roleid != '4')
        {
         $rolecount = User::whereHas('roles', function($q){$q->whereIn('roles.id', [request('roles')]);})->get()->count();
         if($rolecount>=1)
         {
         $roleuser = User::whereHas('roles', function($q){$q->whereIn('roles.id', [request('roles')]);})->get();
           $user = User::find($id);
           // $holder = $roleuser()->pluck('email');
          
           return redirect()->route('admin.users.index')->with('error', substr($roleuser->pluck('email'),2,-2).' already have this role'); 
         }
        }
        $user = User::find($id);
        $user->roles()->sync($request->roles);
  


        return redirect()->route('admin.users.index')->with('success', $user->email.' has been updated.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Check that current user isn't editing themselves
        if( Auth::user()->id == $id){
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to delete yourself.');
        }

        $user = User::find($id);
        if ($user){
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'User has been deleted.');
        }

        return redirect()->route('users.index')->with('warning', 'This user cannot be deleted.');
    }


     public function deleted($id)
    {
       
         $idd=request('id3');
        $deletedRows = User::where('id', $idd)->delete();

         return redirect ()->back() ->with('success', 'Successfully User Deleted!');
    }

          public function deleteuser($id)
          {
        $formaleduc = User::find($id);
        return response()->json($formaleduc);
    }
}
