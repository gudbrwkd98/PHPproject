<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Profile;
use App\User;
use App\Plan;
use Illuminate\Support\Facades\Auth;
use JavaScript;

class PDFController extends Controller
{
	function index(){

		//gets the userID and saves to var $id
  		$id = Auth::User()->id;
        
        //gets all notifications where notify = $id
        $not = DB::table('notifications')
	        ->select('user_id')
	        ->where('notify','=',Auth::user()->id)
	        ->get();

	    //if user is an applicant
        if(Auth::user()->hasAnyRole('user')){
	        $notifications = DB::table('notifications')
	        ->where('user_id','=',$id)
	        ->where('notif','=','Your Application has been Updated!')
	        ->paginate(1);
	        $countnotif=$notifications->count();
	    	}

	    //if user is an admin
        elseif(Auth::user()->hasAnyRole('admin')){
        	$id=Auth::user()->roles()->pluck('name')->toArray();
        	$notifications = DB::table('notifications')
		        ->where('notify','=',$id)
		        ->where('notif','!=','Your Application has been Updated!')
        		->paginate(5);
        	$countnotif=$notifications->count();
    		}

    	//if user is an eteeap staff	
      	elseif(Auth::user()->hasAnyRole('eteeap')){
	        $id=Auth::user()->roles()->pluck('name')->toArray();
	        $notifications = DB::table('notifications')
		        ->where('notify','=',$id)
		        ->where('notif','!=','Your Application has been Updated!')
		        ->paginate(5);
	        $countnotif=$notifications->count();
			}
  		
  		//if user is ???
  		else{
         	$id=Auth::user()->roles()->pluck('name')->toArray();
         	$notifications = DB::table('notifications')
		        ->where('notify','=',$id)
		        ->where('notif','!=','Your Application has been Updated!')
		        ->paginate(5);
        	$countnotif=$notifications->count();
    		}

    	/* --------------------  ----  -------------------- */
    	/* --------------------  SQLs  -------------------- */
    	/* --------------------  ----  -------------------- */
	    	//grabs all courses from the database
	        $courses = DB::table('courses')->paginate(15);
	 
			//checks if the user has submitted an application
	        $check = DB::table('users')
		        ->join('applications','users.id','=','applications.user_id')
		        ->select('applications.user_id')
		        ->where('applications.user_id','=',$id)
		        ->get();
	        
	        //gets userID and saves to var $user
	        $user=Auth::user()->id;
	        
	        //SQL that joins plans table with user table where plans.user_id = user_id
		 	$plans = DB::table('users')
		        ->join('plans','users.id','=','plans.user_id')
		        ->select('plans.id as formid','users.id as userid','plans.coreValues','priority1','priority2','priority3','sgop','timePlan','accreditationPlan','plantoComplete','essay')
		        ->where('plans.user_id','=',$user)    
		        ->get();  

	        //SQL that joins formal_education table with user table where formal_education.user_id = user_id
		 	$formaleduc = DB::table('users')
		        ->join('formal_education','users.id','=','formal_education.user_id')
		        ->select('formal_education.id as formid','users.id as userid','formal_education.schoolName','formal_education.schoolAddress'
		            ,'formal_education.transcript','formal_education.degree','formal_education.schoolLvl')
		        ->where('formal_education.user_id','=',$user)
		        ->get();  

	        //SQL that joins non_formal_education table with user table where non_formal_education.user_id = user_id
			$nformaleduc = DB::table('users')
		        ->join('non_formal_education','users.id','=','non_formal_education.user_id')
		        ->select('non_formal_education.id as formid','users.id as userid','non_formal_education.trainingProgram','non_formal_education.certificateTitle'
		            ,'non_formal_education.certifyingAgency','non_formal_education.duration','non_formal_education.file')
		        ->where('non_formal_education.user_id','=',$user)
		        ->get();  

	        //SQL that joins certification_exams table with user table where certification_exams.user_id = user_id
			$certificationexam = DB::table('users')
		        ->join('certification_exams','users.id','=','certification_exams.user_id')
		        ->select('certification_exams.id as formid','users.id as userid','certification_exams.certificateTitle','certification_exams.nameofAgency','certification_exams.addressofAgency','certification_exams.startYear','certification_exams.file')
		        ->where('certification_exams.user_id','=',$user)
		        ->get();  

	        //SQL that joins certification_exams table with user table where certification_exams.user_id = user_id
			$licensure = DB::table('users')
		        ->join('licensures','users.id','=','licensures.user_id')
		        ->select('licensures.id as formid','users.id as userid','licensures.licenseTitle','licensures.file')
		        ->where('licensures.user_id','=',$user)
		        ->get(); 

	        //SQL that joins certification_exams table with user table where certification_exams.user_id = user_id
			$workexperience = DB::table('users')
		        ->join('work_experiences','users.id','=','work_experiences.user_id')
		        ->select('work_experiences.id as formid','users.id as userid','work_experiences.position','companyName','duration')
		        ->where('work_experiences.user_id','=',$user)
		        ->get();         

	        //SQL that joins certification_exams table with user table where certification_exams.user_id = user_id
			$awards = DB::table('users')
		        ->join('awards','users.id','=','awards.user_id')
		        ->select('awards.id as formid','users.id as userid','awards.awardTitle','awards.file','awards.organizationName','awards.organizationAddress','awards.dateReceived','awards.type')
		        ->where('awards.user_id','=',$user)
		        ->get();  

	        //SQL that joins certification_exams table with user table where certification_exams.user_id = user_id
			$creativeworks = DB::table('users')
		        ->join('creative_works','users.id','=','creative_works.user_id')
		        ->select('creative_works.id as formid','users.id as userid','creative_works.workTitle','creative_works.workDescription','creative_works.dateAccomplished','creative_works.agencyName','creative_works.dateAccomplished','creative_works.agencyAddress')
		        ->where('creative_works.user_id','=',$user)
		        ->get();  

			//SQL that joins hobbies table with user table where hobbies.user_id = user_id
			$hobbies = DB::table('users')
		        ->join('hobbies','users.id','=','hobbies.user_id')
		        ->select('hobbies.id as formid','users.id as userid','hobbies.hobbyTitle','hobbies.ratingofSkill')
		        ->where('hobbies.user_id','=',$user)
		        ->get();

			//SQL that joins special_skills table with user table where special_skills.user_id = user_id
			$specialskills = DB::table('users')
		        ->join('special_skills','users.id','=','special_skills.user_id')
		        ->select('special_skills.id as formid','users.id as userid','special_skills.skillName')
		        ->where('special_skills.user_id','=',$user)
		        ->get(); 

			//SQL that joins work_activities table with user table where work_activities.user_id = user_id
			$workactivity = DB::table('users')
		        ->join('work_activities','users.id','=','work_activities.user_id')
		        ->select('work_activities.id as formid','users.id as userid','work_activities.activity','work_activities.description')
		        ->where('work_activities.user_id','=',$user)
		        ->get(); 

			//SQL that joins volunteers table with user table where volunteers.user_id = user_id
			$volunteer = DB::table('users')
		        ->join('volunteers','users.id','=','volunteers.user_id')
		        ->select('volunteers.id as formid','users.id as userid','volunteers.title')
		        ->where('volunteers.user_id','=',$user)
		        ->get();  

			//SQL that joins travels table with user table where travels.user_id = user_id
			$travel = DB::table('users')
		        ->join('travels','users.id','=','travels.user_id')
		        ->select('travels.id as formid','users.id as userid','travels.location','purpose','learningExperience')
		        ->where('travels.user_id','=',$user)
		        ->get();

			//SQL that joins organization_memberships table with user table where organization_memberships.user_id = user_id
			$organization = DB::table('users')
		        ->join('organization_memberships','users.id','=','organization_memberships.user_id')
		        ->select('organization_memberships.id as formid','users.id as userid','organization_memberships.type','startYear','endYear','duration','organization','position')
		        ->where('organization_memberships.user_id','=',$user)
		        ->get();     

			//SQL that joins engagements table with user table where engagements.user_id = user_id
			$engagement = DB::table('users')
		        ->join('engagements','users.id','=','engagements.user_id')
		        ->select('engagements.id as formid','users.id as userid','engagements.title','startYear','endYear','duration','venue','involvement','organizer')
		        ->where('engagements.user_id','=',$user)
		        ->get();   

			//SQL that joins community_involvements table with user table where community_involvements.user_id = user_id
			$communityinvolvement = DB::table('users')
		        ->join('community_involvements','users.id','=','community_involvements.user_id')
		        ->select('community_involvements.id as formid','users.id as userid','community_involvements.title','startYear','endYear','duration','venue','organizer')
		        ->where('community_involvements.user_id','=',$user)
		        ->get(); 

			//SQL that joins additional_documents table with user table where additional_documents.user_id = user_id
			$documents = DB::table('users')
	        ->join('documents','users.id','=','documents.user_id')
	        ->select('documents.id as formid','users.id as userid','documents.title','file')
	        ->where('documents.user_id','=',$user)
	        ->get();  


	        


	    Javascript::put([ 
	    	'firstName' => Auth::user()->profiles->firstName, 
	    	'middleName' => Auth::user()->profiles->middleName, 
	    	'lastName' => Auth::user()->profiles->lastName
	    ]);

        return view ('sample',compact('check','courses','notifications','countnotif','not','plans','formaleduc','nformaleduc','certificationexam','licensure','workexperience','awards','creativeworks','hobbies','specialskills','workactivity','volunteer','travel','organization','engagement','communityinvolvement','documents'));
    	}

    //this is the controller for the button that makes the html into a PDF for: Application_Form
	function appFormPDF(){
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->appFormPDF_convert_to_html());
		return $pdf->stream();
		}

	//this is the html content of the PDF generated for: Application_Form
	function appFormPDF_convert_to_html(){
		/* --------------------  ----  -------------------- */
		/* --------------------  SQLS  -------------------- */
		/* --------------------  ----  -------------------- */
	        //gets the user's id number
	        $user = Auth::user()->id;

	        //gets the user's profile based on userID
	        $profile = User::find($user)->profiles;

	        //SQL for joining Users table with Plans table where Plans.UserID = UserID 
		    $plans = DB::table('users')
		        ->join('plans','users.id','=','plans.user_id')
		        ->select('plans.id as formid','users.id as userid','plans.coreValues','priority1','priority2','priority3','sgop','timePlan','accreditationPlan','plantoComplete','essay')
		        ->where('plans.user_id','=',$user)
		        ->get(); 

	        //SQL for joining Users table with formal_education table where formal_education.UserID = UserID 
	        $formaleduc = DB::table('users')
		        ->join('formal_education','users.id','=','formal_education.user_id')
		        ->select('formal_education.id as formid','users.id as userid','formal_education.schoolLvl','formal_education.schoolName','formal_education.schoolAddress','formal_education.yearGraduated','formal_education.degree','formal_education.transcript')
		        ->where('formal_education.user_id','=',$user)
		        ->where('formal_education.schoolLvl','=','Tertiary Level')
		        ->get();  

	        //SQL for joining Users table with non_formal_education table where non_formal_education.UserID = UserID 
	        $nformaleduc = DB::table('users')
		        ->join('non_formal_education','users.id','=','non_formal_education.user_id')
		        ->select('non_formal_education.id as formid','users.id as userid','non_formal_education.trainingProgram','non_formal_education.certificateTitle'
		        	,'non_formal_education.certifyingAgency','non_formal_education.duration','non_formal_education.file','non_formal_education.startYear','non_formal_education.endYear')
		        ->where('non_formal_education.user_id','=',$user)
		        ->get();  

	        //SQL for joining Users table with certification_exams table where certification_exams.UserID = UserID 
	        $certificationexam = DB::table('users')
		        ->join('certification_exams','users.id','=','certification_exams.user_id')
		        ->select('certification_exams.id as formid','users.id as userid','certification_exams.certificateTitle','certification_exams.nameofAgency','certification_exams.addressofAgency','certification_exams.startYear','certification_exams.rating','certification_exams.file')
		        ->where('certification_exams.user_id','=',$user)
		        ->get();  

	        //SQL for joining Users table with licensures table where licensures.UserID = UserID 
			$licensure = DB::table('users')
		        ->join('licensures','users.id','=','licensures.user_id')
		        ->select('licensures.id as formid','users.id as userid','licensures.licenseTitle','licensures.file')
		        ->where('licensures.user_id','=',$user)
		        ->get(); 

	        //SQL for joining Users table with work_experiences table where work_experiences.UserID = UserID 
			$workexperience = DB::table('users')
		        ->join('work_experiences','users.id','=','work_experiences.user_id')
		        ->select('work_experiences.id as formid','users.id as userid','work_experiences.position','companyName', 'companyAddress', 'startYear','endYear','duration','supervisorName','supervisorDesignation','terms','functions','ref1','ref2','ref3','position1','position2','position3','contact1','contact2','contact3','email1','email2','email3','reason')
		        ->where('work_experiences.user_id','=',$user)    
		        ->get();         

	        //awards
		        //SQL for joining Users table with awards table where awards.UserID = UserID and awards.type = "Academic"
				$Aawards = DB::table('users')
			        ->join('awards','users.id','=','awards.user_id')
			        ->select('awards.id as formid','users.id as userid','awards.awardTitle','awards.file','awards.organizationName','awards.organizationAddress','awards.dateReceived','awards.type')
			        ->where('awards.user_id','=',$user)    
			        ->where('awards.type','=','Academic')
			        ->get();
		        
		        //SQL for joining Users table with awards table where awards.UserID = UserID and awards.type = "Community"
				$Coawards = DB::table('users')
			        ->join('awards','users.id','=','awards.user_id')
			        ->select('awards.id as formid','users.id as userid','awards.awardTitle','awards.file','awards.organizationName','awards.organizationAddress','awards.dateReceived','awards.type')
			        ->where('awards.user_id','=',$user)    
			        ->where('awards.type','=','Community')
			        ->get();
		        
		        //SQL for joining Users table with awards table where awards.UserID = UserID and awards.type = "Civic"
				$Ciawards = DB::table('users')
			        ->join('awards','users.id','=','awards.user_id')
			        ->select('awards.id as formid','users.id as userid','awards.awardTitle','awards.file','awards.organizationName','awards.organizationAddress','awards.dateReceived','awards.type')
			        ->where('awards.user_id','=',$user)    
			        ->where('awards.type','=','Civic')
			        ->get();
		        
		        //SQL for joining Users table with awards table where awards.UserID = UserID and awards.type = "Work"
				$Wawards = DB::table('users')
			        ->join('awards','users.id','=','awards.user_id')
			        ->select('awards.id as formid','users.id as userid','awards.awardTitle','awards.file','awards.organizationName','awards.organizationAddress','awards.dateReceived','awards.type')
			        ->where('awards.user_id','=',$user)    
			        ->where('awards.type','=','Work')
			        ->get();

	        //SQL for joining Users table with creative_works table where creative_works.UserID = UserID 
			$creativeworks = DB::table('users')
		        ->join('creative_works','users.id','=','creative_works.user_id')
		        ->select('creative_works.id as formid','users.id as userid','creative_works.workTitle','creative_works.workDescription','creative_works.dateAccomplished','creative_works.agencyName','creative_works.dateAccomplished','creative_works.agencyAddress')
		        ->where('creative_works.user_id','=',$user)    
		        ->get();  

	        //SQL for joining Users table with hobbies table where hobbies.UserID = UserID 
			$hobbies = DB::table('users')
		        ->join('hobbies','users.id','=','hobbies.user_id')
		        ->select('hobbies.id as formid','users.id as userid','hobbies.hobbyTitle','hobbies.ratingofSkill')
		        ->where('hobbies.user_id','=',$user)    
		        ->get();

	        //SQL for joining Users table with special_skills table where special_skills.UserID = UserID 
			$specialskills = DB::table('users')
		        ->join('special_skills','users.id','=','special_skills.user_id')
		        ->select('special_skills.id as formid','users.id as userid','special_skills.skillName')
		        ->where('special_skills.user_id','=',$user)    
		        ->get(); 

	        //SQL for joining Users table with work_activities table where work_activities.UserID = UserID 
			$workactivity = DB::table('users')
		        ->join('work_activities','users.id','=','work_activities.user_id')
		        ->select('work_activities.id as formid','users.id as userid','work_activities.activity','work_activities.description')
		        ->where('work_activities.user_id','=',$user)    
		        ->get(); 

	        //SQL for joining Users table with volunteers table where volunteers.UserID = UserID 
			$volunteer = DB::table('users')
		        ->join('volunteers','users.id','=','volunteers.user_id')
		        ->select('volunteers.id as formid','users.id as userid','volunteers.title')
		        ->where('volunteers.user_id','=',$user)    
		        ->get();  

	        //SQL for joining Users table with travels table where travels.UserID = UserID 
			$travels = DB::table('users')
		        ->join('travels','users.id','=','travels.user_id')
		        ->select('travels.id as formid','users.id as userid','travels.location','purpose','learningExperience')
		        ->where('travels.user_id','=',$user)    
		        ->get();

		$output = '
			<div style="padding: 0rem 2rem;">
				<!-- --------------------  header section  -------------------- -->
					<h4 align="center">
						Republic of the Philippines
						<br>Office of the President
						<br>COMMISSION ON HIGHER EDUCATION
						<br>Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP)
					</h4>

					<table width="100%" style="border-style:solid; border-collapse: collapse; border: 0px;">
						<!-- --------------------  --------------------  -------------------- -->
						<tr>
							<th align="center" style="text-indent: 7rem;" width="60%" >
								<h4>ETEEAP APPLICATON FORM</h4>
							</th>
							<td rowspan="2" style="" width="15%">
								';

								if (empty(Auth::user()->profiles->photo)) {
									$output .='
										<div style="border:1px solid; width:6rem; height:6rem; " align="center">
											<br>
											1x1 <br>ID Picture
										</div>
											';
									}

								else{
									$output .='
									<img src="../public/uploads/profilepicture/'.Auth::user()->profiles->photo.'" style="border:1px solid; width:6rem; height:6rem; " >
									';
								}

								$output .='

							</td>
						</tr>
						<!-- --------------------  --------------------  -------------------- -->
						<tr>
							<th align="center" style="text-indent: 7rem;" width="60%">
								<h4>INSTRUCTION:</h4>
							</th>
						</tr>
					</table>

				<!-- --------------------  instructions  -------------------- -->
					<p style="text-align: justify">
						Please type or clearly print your answers to all questions. Provide complete and detailed information required by the questionnaire. All the declarations that you make are under oath. Discovery of any else claim in this application form will disqualify you from participating in the program.
					</p>

				<ol type="I">

					<!-- --------------------  personal information list  -------------------- -->
						<li style=" font-weight: bold; ">PERSONAL INFORMATION</li>
						<ol>
							<!-- --------------------  fullname  -------------------- -->
								<li>
									Name (Last Name, First Name, Middle Name)
									<div class="row" style="border-bottom: 2px solid;">
										'.Auth::user()->profiles->lastName.', '.Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName.'
									</div>
								</li>
							
							<!-- --------------------  address  -------------------- -->
								<li>
									<table width="100%">
										<tr>
											<td width="5%">
												Address:
											</td>
											<td style="border-bottom: 2px solid;">
												'.Auth::user()->profiles->address.'
											</td>
										</tr>
									</table>
								</li>
							
							<!-- --------------------  phone  -------------------- -->
								<li>
									<table width="100%">
										<tr>
											<td width="23%">
												Telephone No(s).  
											</td>
											<td style="border-bottom: 2px solid;">
												'.Auth::user()->profiles->phone.'
											</td>
										</tr>
									</table>	
								</li>
							
							<!-- --------------------  bday  -------------------- -->
								<li>
									<table width="100%">
										<tr>
											<td width="17%"> 
												Birth Date:  
											</td>
											<td style="border-bottom: 2px solid;">
												'.date("F j, Y", strtotime(Auth::user()->profiles->bday)).'
											</td>
										</tr>
									</table>	
								</li>
							
							<!-- --------------------  birthplace  -------------------- -->
								<li>
									<table width="100%">
										<tr>
											<td width="17%"> 
												Birth Place: 
											</td>
											<td style="border-bottom: 2px solid;">
												'.Auth::user()->profiles->birth_place.'
											</td>
										</tr>
									</table> 	
								</li>
							
							<!-- --------------------  civil_status  -------------------- -->
								<li>
									<table width="100%">
										<tr>
											<td width="17%"> 
												Civil Status: 
											</td>
											<td style="border-bottom: 2px solid;">
												'.Auth::user()->profiles->civil_status.'
											</td>
										</tr>
									</table> 	
								</li>
							
							<!-- --------------------  sex_and_nationality  -------------------- -->
								<li>
									<table width="100%">
										<tr>
											<td width="5%">
												Sex: 
											</td>
											<td width="40%" style="border-bottom: 2px solid;">
												'.Auth::user()->profiles->gender.'
											</td>
											<td width="10%"> 
												Nationality:
											</td>
											<td width="40%" style="border-bottom: 2px solid;">
												'.Auth::user()->profiles->citizenship.'
											</td>
										</tr>
									</table>
								</li>
							
							<!-- --------------------  language  -------------------- -->
								<li>
									<table width="100%">
										<tr>
											<td width="43%"> 
												Languages and Dialects Spoken :  	
											</td>
											<td style="border-bottom: 2px solid;">
												'.Auth::user()->profiles->language.'
											</td>
										</tr>
									</table>
								</li>

							<!-- --------------------  degress  -------------------- -->
								<li>
									<table width="100%">
										<tr>
											<td colspan="2">
												Degree Program or field being applied for:
											</td>
										</tr>
										<table width="100%" style="margin-left:50px;">
											';
											foreach($plans as $plan){
												$output .='
												<tr>
													<td width="25%">First Priority:</td>
													<td style="border-bottom: 2px solid;">'.$plan->priority1.'</td>
												</tr>
												<tr>
													<td width="25%">Second Priority:</td>
													<td style="border-bottom: 2px solid;">'.$plan->priority2.'</td>
												</tr>
												<tr>
													<td width="25%">Third Priority:</td>
													<td style="border-bottom: 2px solid;">'.$plan->priority3.'</td>
												</tr>
										</table>
									</table>
								</li>

							<!-- --------------------  SGOP  -------------------- -->
								<li style="margin-top:11pts;">
									Statement of your goals, objectives or purposes for applying for the degree.<br>
									<span style="text-align: justify; border-bottom: 2px solid; ">
										'.$plan->sgop.'
									</span>
								</li>

							<!-- --------------------  timePlan  -------------------- -->
								<li style="margin-top:11pts;">
									Indicate how much time you plan to devote for personal learning activities so that you can finish the requirements in the prescribed program. Be specific.<br>
									<span style="text-align: justify; border-bottom: 2px solid; ">
										'.$plan->timePlan.'
									</span>
								</li>

							<!-- --------------------  accreditationPlan  -------------------- -->
								<li style="margin-top:11pts;">
									For overseas applicants, describe how you plan to obtain accreditation/ equivalency (e.g. when you plan to come to the Philippines)<br>
									<span style="text-align: justify; border-bottom: 2px solid; ">
										'.$plan->accreditationPlan.'
									</span>
								</li>

							<!-- --------------------  plantoComplete  -------------------- -->
								<li style="margin-top:11pts;">
									How soon do you need to complete accreditation / equivalency?
									<table style="margin-left:50px;">
										<!-- --------------------  --------------------  -------------------- -->
										<tr>
											<td style="border-bottom: 2px solid;">
												';
													if (strcmp($plan->plantoComplete,"less than one (1) year") == 0) {
														$output .='<span style="margin-left:40px;">X</span>';
													}
													else{
														$output .='
												<span style="color:white;">
													loremipsum
												</span>
														'; 
													}
												$output .='
											</td>
											<td>less than one (1) year</td>
											<td style="border-bottom: 2px solid;">
												';
													if (strcmp($plan->plantoComplete,"1 year") == 0) {
														$output .='<span style="margin-left:40px;">X</span>';
													}
													else{
														$output .='
												<span style="color:white;">
													loremipsum
												</span>
														'; 
													}
												$output .='
											</td>
											<td>1 year</td>
										</tr>
										<!-- --------------------  --------------------  -------------------- -->
										<tr>
											<td style="border-bottom: 2px solid;">
												';
													if (strcmp($plan->plantoComplete,"2 years") == 0) {
														$output .='<span style="margin-left:40px;">X</span>';
													}
													else{
														$output .='
												<span style="color:white;">
													loremipsum
												</span>
														'; 
													}
												$output .='
											</td>
											<td>2 years</td>
											<td style="border-bottom: 2px solid;">
												';
													if (strcmp($plan->plantoComplete,"3 years") == 0) {
														$output .='<span style="margin-left:40px;">X</span>';
													}
													else{
														$output .='
												<span style="color:white;">
													loremipsum
												</span>
														'; 
													}
												$output .='
											</td>
											<td>3 years</td>
										</tr>
										<!-- --------------------  --------------------  -------------------- -->
										<tr>
											<td style="border-bottom: 2px solid;">
												';
													if (strcmp($plan->plantoComplete,"4 years") == 0) {
														$output .='<span style="margin-left:40px;">X</span>';
													}
													else{
														$output .='
												<span style="color:white;">
													loremipsum
												</span>
														'; 
													}
												$output .='
											</td>
											<td>4 years</td>
											<td style="border-bottom: 2px solid;">
												';
													if (strcmp($plan->plantoComplete,"more than 5 years") == 0) {
														$output .='<span style="margin-left:40px;">X</span>';
													}
													else{
														$output .='
												<span style="color:white;">
													loremipsum
												</span>
														'; 
													}
												$output .='
											</td>
											<td>more than 5 years</td>
										</tr>
									</table>
								</li>
						</ol>

												';}	
											$output.='
					
					<!-- --------------------  education list  -------------------- -->
						<li style=" font-weight: bold; margin-top:11pts;">EDUCATION</li>
						<p>This section will require you to provide information on your past formal, non-formal and informal learning experiences.</p>
						<ol>
							<!-- --------------------  formal_education  -------------------- -->
								<li style="font-weight:bold; margin-top:10px;">
									Formal Education
									<table width="100%" style="border-collapse: collapse; border: 0px; padding-top:15px;">
										<thead>
											<tr>
												<th width="33%" style="border: 1px solid; padding: 10px 0;" align="center">
													Name of School/ Address
												</th>
												
												<th width="33%" style="border: 1px solid; padding: 10px 0;" align="center">
													Course/Degree Program
												</th>
												
												<th width="33%" style="border: 1px solid; padding: 10px 0;" align="center">
													Year Graduated
												</th>
											</tr>
										</thead>
										<tbody>
										';
										//if there is no formal education entry at all print 3 rows of empty cells
										if (count($formaleduc)<1) {
											for($i=0; $i<3;$i++){
												$output .='
												<tr>
													<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
													<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="center"></td>
													<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
												</tr>										
												';

											}
										}

										//if there is only one formal education entry.. print the entry with 2 empty cells
										elseif(count($formaleduc) == 1) {
											foreach($formaleduc as $formaled){
												$output .='
												<tr>
													<td style="border: 1px solid; font-weight: 0; " align="left">
														<span style="margin-left:15px;">'.$formaled->schoolName.'</span>
														<br><span style="margin-left:15px;">'.$formaled->schoolAddress.'</span>
													</td>
													<td style="border: 1px solid; font-weight: 0; " align="center">
														'.$formaled->degree.'
													</td>
													<td style="border: 1px solid; font-weight: 0; " align="center">
														<span style="margin-left:10px;">'.$formaled->yearGraduated.'</span>
													</td>
												</tr>										
												';
											}
											for($i=0; $i<2;$i++){
												$output .='
												<tr>
													<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
													<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="center"></td>
													<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
												</tr>										
												';

											}
										}

										//else print all in list
										else{
											foreach($formaleduc as $formaled){
												$output .='
												<tr>
													<td style="border: 1px solid; font-weight: 0; " align="left">
														<span style="margin-left:15px;">'.$formaled->schoolName.'</span>
														<br><span style="margin-left:15px;">'.$formaled->schoolAddress.'</span>
													</td>
													<td style="border: 1px solid; font-weight: 0; " align="center">
														'.$formaled->degree.'
													</td>
													<td style="border: 1px solid; font-weight: 0; " align="left">
														<span style="margin-left:10px;">'.date("M j, Y", strtotime($formaled->yearGraduated)).'</span>
													</td>
												</tr>										
												';
											}
										}

											$output .= '
										</tbody>
									</table>
									
									<span style="font-weight:0; font-size:10pts;">
									Note: All entries should be supported by authenticated xerox copy of appropriate certificates/ documents obtained from the institutions through the program.
									</span>

								</li>
							
							<!-- --------------------  non_formal_education  -------------------- -->
								<li style="font-weight:bold; margin-top:10px;">
									Non-Formal Education
									<p style="font-weight:0; font-size:11pts;">
										Non-formal education refers to structured and shorten-term training programs conducted for a particular purpose such as skills development, values orientation, and the like.
									</p>
									<table width="100%" style="border-collapse: collapse; border: 0px;">
										<thead>
											<tr>
												<th style="border: 1px solid;" align="center">
													Title of Training Program
												</th>
												<th style="border: 1px solid;" align="center">
													Title of Certificate Obtained
												</th>
												<th style="border: 1px solid;" align="center">
													Inclusive Dates of Attendance
												</th>
											</tr>
										</thead>
										<tbody>
										';
										//if there is no nonformal education entry at all print 3 rows of empty cells
										if (count($nformaleduc)<1) {
											$output .='
											<tr>
												<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
												<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="center"></td>
												<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
											</tr>										
											';
											}
										
										//if there is only one nonformal education entry.. print the entry with 2 empty cells
										elseif(count($nformaleduc) == 1) {
											foreach($nformaleduc as $nformaled){
												$output .='
												<tr>
													<td style="border: 1px solid; font-weight: 0; " align="center">
														'.$nformaled->trainingProgram.'
													</td>
													<td style="border: 1px solid; font-weight: 0; " align="center">
														'.$nformaled->certificateTitle.'
													</td>
													<td style="border: 1px solid; font-weight: 0; " align="left">
														<span style="margin-left:10px;">From: '.date("M j, Y", strtotime($nformaled->startYear)).'</span>
														<br><span style="margin-left:10px;">To: '.date("M j, Y", strtotime($nformaled->endYear)).'</span>
													</td>
												</tr>										
												';
											}
											for($i=0; $i<2;$i++){
												$output .='
												<tr>
													<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
													<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="center"></td>
													<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
												</tr>										
												';

											}
										}
										//else print all in list
										else{
											foreach($nformaleduc as $nformaled){
												$output .='
												<tr>
													<td style="border: 1px solid; font-weight: 0; " align="center">
														'.$nformaled->trainingProgram.'
													</td>
													<td style="border: 1px solid; font-weight: 0; " align="center">
														'.$nformaled->certificateTitle.'
													</td>
													<td style="border: 1px solid; font-weight: 0; " align="left">
														<span style="margin-left:10px;">From: '.date("M j, Y", strtotime($nformaled->startYear)).'</span>
														<br><span style="margin-left:10px;">To: '.date("M j, Y", strtotime($nformaled->endYear)).'</span>
													</td>
												</tr>										
												';
											}
										}


											$output .= '
										</tbody>
									</table>

									<span style="font-weight:0; font-size:10pts;">
									Note: All entries should be supported by authenticated xerox copy of appropriate certificates/ documents obtained from the institutions through the program.
									</span>
								</li>
							
							<!-- --------------------  certification_exams  -------------------- -->
								<li style="font-weight:bold; margin-top:10px;">
									Other Certification Examinations
									<p style="font-weight:0; font-size:11pts;">
										Please give detailed information on certification examinations taken for vocational and other skills
									</p>
									<table width="100%" style="border-collapse: collapse; border: 0px;">
										<thead>
											<tr>
												<th width="30%" style="border: 1px solid;" align="center">
													Title of Certification Examination
												</th>
												<th width="30%" style="border: 1px solid;" align="center">
													Name/Address of Certifying Agency
												</th>
												<th width="20%" style="border: 1px solid;" align="center">
													Date Certified
												</th>
												<th width="20%" style="border: 1px solid;" align="center">
													Rating
												</th>
											</tr>
										</thead>
										<tbody>
										';
										//if there is no formal education entry at all print 3 rows of empty cells
										if (count($certificationexam)<1) {
											$output .='
											<tr>
												<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
												<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="center"></td>
												<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
												<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
											</tr>										
											';
										}
										
										//if there is only one formal education entry.. print the entry with 2 empty cells
										elseif(count($certificationexam) === 1) {
											foreach ($certificationexam as $cert) {
												$output .='
												<tr>
													<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
														'.$cert->certificateTitle.'
													</td>
													<td width="25%" style=" font-weight: 0; border: 1px solid; padding-left:10px; padding-bottom:5px;" align="left">
														'.$cert->nameofAgency.'<br>'.$cert->addressofAgency.'
													</td>
													<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
														'.date("M j, Y", strtotime($cert->startYear)).'
													</td>
													<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
														'.$cert->rating.'
													</td>
												</tr>
												';
											}
											for($i=0; $i<2;$i++){
												$output .='
												<tr>
													<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
													<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="center"></td>
													<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
													<td style="padding: 10pts; border: 1px solid; font-weight: 0; " align="left"></td>
												</tr>										
												';

											}
										}
										//else print all in list
										else{
											foreach ($certificationexam as $cert) {
												$output .='
												<tr>
													<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
														'.$cert->certificateTitle.'
													</td>
													<td width="25%" style=" font-weight: 0; border: 1px solid; padding-left:10px; padding-bottom:5px;" align="left">
														'.$cert->nameofAgency.'<br>'.$cert->addressofAgency.'
													</td>
													<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
														'.date("M j, Y", strtotime($cert->startYear)).'
													</td>
													<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
														'.$cert->rating.'
													</td>
												</tr>
												';
											}
										}

											$output .= '
										</tbody>
									</table>

									<span style="font-weight:0; font-size:10pts;">
									Note: All entries should be supported by authenticated xerox copy of appropriate certificates/ documents obtained from the institutions through the program.
									</span>
								</li>
						</ol>
					
					<!-- --------------------  work exp list  -------------------- -->
						<li style=" font-weight: bold; margin-top:11pts;">PAID WORK AND OTHER EXPERIENCES</li>
						';

							foreach($workexperience as $workexp){
								$output .='									
								<ol style="font-weight:0px;">
									<!-- --------------------  post_designation  -------------------- -->
										<li style="margin-top:8pts;">
											Post/ Designation
											<br>
											<div style="border-bottom:2px solid;" width="100%">
												'.$workexp->position.'
											</div>
										</li>
									
									<!-- --------------------  inclusive_dates_of_emp  -------------------- -->
										<li style="margin-top:8pts;">
											Inclusive Dates of Employment 
											<table width="100%">
												<tr>
													<td width="10%">From:</td>
													<td width="40%" style="border-bottom:2px solid;">
														'.date("F j, Y", strtotime($workexp->startYear)).'
													</td>
													<td width="5%">To:</td>
													<td width="45%" style="border-bottom:2px solid;">
														'.date("F j, Y", strtotime($workexp->endYear)).'
													</td>
												</tr>
											</table>
										</li>
									
									<!-- --------------------  name_address  -------------------- -->
										<li style="margin-top:8pts;">
											Name and Address of Company
											<div style="border-bottom:2px solid;" width="100%">
												'.$workexp->companyName.'
											</div>
											<div style="border-bottom:2px solid;" width="100%">
												'.$workexp->companyAddress.'
											</div>
										</li>
									
									<!-- --------------------  term_status_of_employment  -------------------- -->
										<li style="margin-top:8pts;">
											Terms / Status of Employment
											<div style="border-bottom:2px solid;" width="100%">
												'.$workexp->terms.'
											</div>
										</li>
									
									<!-- --------------------  Supervisor  -------------------- -->
										<li style="margin-top:8pts;">
											Name and Designation of Immediate Supervisor
											<div style="border-bottom:2px solid;" width="100%">
												'.$workexp->supervisorName.'
											</div>
											<div style="border-bottom:2px solid;" width="100%">
												'.$workexp->supervisorDesignation.'
											</div>
										</li>
									
									<!-- --------------------  reasons  -------------------- -->
										<li style="margin-top:8pts;">
											Reason(s) for moving on to the next job.
											<div style="border-bottom:2px solid;" width="100%">
												'.$workexp->reason.'
											</div>
										</li>
									
									<!-- --------------------  functions  -------------------- -->
										<li style="margin-top:8pts;">
											Describe actual functions and responsibilities in position occupied:
											<span style="text-align: justify; border-bottom: 2px solid; ">
												'.$workexp->functions.'
											</span>
										</li>
									
									<!-- --------------------  references  -------------------- -->
										<li style="margin-top:8pts;">
											In case of self-employment, name three (3) reference persons:
											<table width="100%" style="border-collapse: collapse; border: 0px; padding-top:15px;">

												<tr>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														Name
													</td>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														Position
													</td>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														Contact
													</td>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														Email
													</td>
												</tr>
											
												<tr>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														'.$workexp->ref1.'
													</td>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														'.$workexp->position1.'
													</td>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														'.$workexp->contact1.'
													</td>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														'.$workexp->email1.'
													</td>
												</tr>
											
												<tr>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														'.$workexp->ref2.'
													</td>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														'.$workexp->position2.'
													</td>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														'.$workexp->contact2.'
													</td>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														'.$workexp->email2.'
													</td>
												</tr>
											
												<tr>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														'.$workexp->ref3.'
													</td>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														'.$workexp->position3.'
													</td>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														'.$workexp->contact3.'
													</td>
													<td style="text-align: justify; border-bottom: 2px solid;" >
														'.$workexp->email3.'
													</td>
												</tr>
											</table>
											Note: Use another sheet if necessary, following the above format.
										</li>
								</ol>
								';
							}

							$output .= '
					
					<!-- --------------------  awards  -------------------- -->
						<li style=" font-weight: bold; margin-top:11pts;">HONORS, AWARDS AND CITATIONS RECEIVED</li>
						
						<p style="font-weight:0px; margin: 11pts;">
							In this section, please describe all the awards you have received from schools, community and civic organizations, as well as citations for work excellence, outstanding accomplishments, community service, etc.
						</p>
						
						<ol>
							<li style="font-weight:bold;">
								Academic Award
								<table width="100%" style="border-collapse: collapse; border: 0px; padding-top:15px;">
									<thead>
										<!-- --------------------  --------------------  -------------------- -->
										<tr>
											<th width="33%" style="border: 1px solid;" align="center">
												Award Conferred
											</th>
											
											<th width="33%" style="border: 1px solid;" align="center">
												Name and Address of Conferring Organization
											</th>
											
											<th width="33%" style="border: 1px solid;" align="center">
												Date Awarded
											</th>
										</tr>
									</thead>
									<tbody>
									';
									if (count($Aawards)<1) {
										for($i=0; $i<3; $i++){
											$output .= '
											<tr>
												<td style=" padding:10pts; font-weight: 0; border: 1px solid;" align="center"></td>
												<td style=" padding:10pts; font-weight: 0; border: 1px solid;" align="left"></td>
												<td style=" padding:10pts; font-weight: 0; border: 1px solid;" align="center"></td>
											</tr>
											';
										}
									}
									elseif (count($Aawards) < 3) {
										$limit = 3 - count($Aawards);

										foreach ($Aawards as $Aaward) {
											$output .='
											<tr>
												<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
													'.$Aaward->awardTitle.'
												</td>
												<td width="25%" style=" font-weight: 0; border: 1px solid; padding-left:10px; padding-bottom:5px;" align="left">
													'.$Aaward->organizationName.'<br>'.$Aaward->organizationAddress.'
												</td>
												<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
													'.date("M j, Y", strtotime($Aaward->dateReceived)).'
												</td>
											</tr>
											';
											}

										for($i=0; $i < $limit; $i++){
											$output .= '
											<tr>
												<td width="25%" style=" padding:10pts; font-weight: 0; border: 1px solid;" align="center"></td>
												<td width="25%" style=" padding:10pts; font-weight: 0; border: 1px solid;" align="left"></td>
												<td width="25%" style=" padding:10pts; font-weight: 0; border: 1px solid;" align="center"></td>
											</tr>
											';
											}
									}
										$output .= '
									</tbody>
								</table>
								<br>
							</li>
							<br>
							<li style="font-weight:bold;">
								Community and Civic Organization Award / Citation
								<table width="100%" style="border-collapse: collapse; border: 0px; padding-top:15px;">
									<thead>
										<!-- --------------------  --------------------  -------------------- -->
										<tr>
											<th width="33%" style="border: 1px solid;" align="center">
												Award Conferred
											</th>
											
											<th width="33%" style="border: 1px solid;" align="center">
												Name and Address of Conferring Organization
											</th>
											
											<th width="33%" style="border: 1px solid;" align="center">
												Date Awarded
											</th>
										</tr>
									</thead>
									<tbody>
									';
									$test = count($Coawards) + count($Ciawards);
									
									if (count($Coawards)<1 && count($Ciawards)<1) {
										for($i=0; $i<3; $i++){
											$output .= '
											<tr>
												<td width="25%" style=" padding:10pts; font-weight: 0; border: 1px solid;" align="center"></td>
												<td width="25%" style=" padding:10pts; font-weight: 0; border: 1px solid;" align="left"></td>
												<td width="25%" style=" padding:10pts; font-weight: 0; border: 1px solid;" align="center"></td>
											</tr>
											';
										}
									}
									
									elseif($test < 3){
										foreach ($Coawards as $Coaward) {
											$output .='
											<tr>
												<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
													'.$Coaward->awardTitle.'
												</td>
												<td width="25%" style=" font-weight: 0; border: 1px solid; padding-left:10px; padding-bottom:5px;" align="left">
													'.$Coaward->organizationName.'<br>'.$Coaward->organizationAddress.'
												</td>
												<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
													'.date("M j, Y", strtotime($Coaward->dateReceived)).'
												</td>
											</tr>
											';
											}
										
										foreach ($Ciawards as $Ciaward) {
											$output .='
											<tr>
												<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
													'.$Ciaward->awardTitle.'
												</td>
												<td width="25%" style=" font-weight: 0; border: 1px solid; padding-left:10px; padding-bottom:5px;" align="left">
													'.$Ciaward->organizationName.'<br>'.$Ciaward->organizationAddress.'
												</td>
												<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
													'.date("M j, Y", strtotime($Ciaward->dateReceived)).'
												</td>
											</tr>
											';
											}

										$limit = 3 - $test;
										
										for($i=0; $i < $limit; $i++){
											$output .= '
											<tr>
												<td width="25%" style=" padding:10pts; font-weight: 0; border: 1px solid;" align="center"></td>
												<td width="25%" style=" padding:10pts; font-weight: 0; border: 1px solid;" align="left"></td>
												<td width="25%" style=" padding:10pts; font-weight: 0; border: 1px solid;" align="center"></td>
											</tr>
											';
											}
									}

									else{
										foreach ($Coawards as $Coaward) {
											$output .='
											<tr>
												<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
													'.$Coaward->awardTitle.'
												</td>
												<td width="25%" style=" font-weight: 0; border: 1px solid; padding-left:10px; padding-bottom:5px;" align="left">
													'.$Coaward->organizationName.'<br>'.$Coaward->organizationAddress.'
												</td>
												<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
													'.date("M j, Y", strtotime($Coaward->dateReceived)).'
												</td>
											</tr>
											';
										}
										foreach ($Ciawards as $Ciaward) {
											$output .='
											<tr>
												<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
													'.$Ciaward->awardTitle.'
												</td>
												<td width="25%" style=" font-weight: 0; border: 1px solid; padding-left:10px; padding-bottom:5px;" align="left">
													'.$Ciaward->organizationName.'<br>'.$Ciaward->organizationAddress.'
												</td>
												<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
													'.date("M j, Y", strtotime($Ciaward->dateReceived)).'
												</td>
											</tr>
											';
										}
									}
										$output .= '
									</tbody>
								</table>
								<br>
							</li>
							<li style="font-weight:bold;">
								Work Related Award / Citation
								<table width="100%" style="border-collapse: collapse; border: 0px; padding-top:15px;">
									<thead>
										<!-- --------------------  --------------------  -------------------- -->
										<tr>
											<th width="33%" style="border: 1px solid;" align="center">
												Award Conferred
											</th>
											
											<th width="33%" style="border: 1px solid;" align="center">
												Name and Address of Conferring Organization
											</th>
											
											<th width="33%" style="border: 1px solid;" align="center">
												Date Awarded
											</th>
										</tr>
									</thead>
									<tbody>
									';
									if (count($Wawards)<1) {
										for($i=0; $i<3; $i++){
											$output .= '
											<tr>
												<td style=" padding:10pts; font-weight: 0; border: 1px solid;" align="center"></td>
												<td style=" padding:10pts; font-weight: 0; border: 1px solid;" align="left"></td>
												<td style=" padding:10pts; font-weight: 0; border: 1px solid;" align="center"></td>
											</tr>
											';
										}
									}
									else{
										foreach ($Wawards as $Waward) {
											$output .='
											<tr>
												<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
													'.$Waward->awardTitle.'
												</td>
												<td width="25%" style=" font-weight: 0; border: 1px solid; padding-left:10px; padding-bottom:5px;" align="left">
													'.$Waward->organizationName.'<br>'.$Waward->organizationAddress.'
												</td>
												<td width="25%" style=" font-weight: 0; border: 1px solid;" align="center">
													'.date("M j, Y", strtotime($Waward->dateReceived)).'
												</td>
											</tr>
											';
										}
									}
										$output .= '
									</tbody>
								</table>
							</li>
						</ol>
					
					<!-- --------------------  creative_works  -------------------- -->
						<li style=" font-weight: bold; margin-top:11pts;">CREATIVE WORKS AND SPECIAL ACCOMPLISHMENTS</li>
						
						<p style="margin-top:11pts; font-weight:0;">
							In this section, enumerate the various creative works you have accomplished and other special accomplishments. Examples of these are interventions, published and unpublished literary fiction and non-fiction, writings, musical work, products of visual performing arts, exceptional accomplishments in sports, social, cultural and leisure activities, etc. which can lead one to conclude the level of expertise you have obtained on certain fields of interest. Include also participation in competitions and prizes obtained.
						</p>';
						
						//if creativeworks has no entry then print blank 
						if (count($creativeworks)<1) {
							$output .='
							<ol>
								<!-- --------------------  --------------------  -------------------- -->
								<li style=" font-weight:0;">
									Descriptions:
									<div style="border-bottom:2px solid;">
									</div>
								</li>
								<!-- --------------------  --------------------  -------------------- -->
								<li style="margin-top:10pts; font-weight:0;">
									Date Accomplished:
									<span style="border-bottom:2px solid;">
									</span>
								</li>
								<!-- --------------------  --------------------  -------------------- -->
								<li style="margin-top:10pts; font-weight:0;">
									Name and Address of Publishing Agency (if writen, published work), or an Association / Institution which can attest to the quality of the work.  
									<span style="border-bottom:2px solid;">
									</span>

								</li>
								<span style="font-weight:0;">Note: Use Another sheet if necessary, following the same format.</span>
							</ol>';
							}
						
						//else print cells with proper entry
						else{
							foreach ($creativeworks as $creativework) {
								$output .='
								<ol>
									<!-- --------------------  --------------------  -------------------- -->
									<li style=" font-weight:0;">
										Descriptions:
										<span style="border-bottom:2px solid;">
											'.$creativework->workDescription.'
										</span>
									</li>
									<!-- --------------------  --------------------  -------------------- -->
									<li style="margin-top:10pts; font-weight:0;">
										Date Accomplished:
										<span style="border-bottom:2px solid;">
											'.$creativework->dateAccomplished.'
										</span>
									</li>
									<!-- --------------------  --------------------  -------------------- -->
									<li style="margin-top:10pts; font-weight:0;">
										Name and Address of Publishing Agency (if writen, published work), or an Association / Institution which can attest to the quality of the work.  <br>
										<div style="border-bottom:2px solid;">
											'.$creativework->agencyName.'
										</div>
										<div style="border-bottom:2px solid;">
											'.$creativework->agencyAddress.'
										</div>

									</li>
								</ol>';
							}
							}
						$output.='
					<!-- --------------------  lifelong  -------------------- -->
						<li style=" font-weight: bold; margin-top:11pts;">LIFELONG LEARNING EXPERIENCES</li>
						<p style="margin-top:11pts; font-weight:0;">
						In this section, please indicate the various life experiences from which you must have derived some learning experience. Please include here unpaid volunteer work.
						</p>
						<ol>
							
							<!-- --------------------  hobbies  -------------------- -->
								<li style=" font-weight:0; margin-top:10pts;">
									Hobbies / Leisure Activities
									<p style="font-weight:0;">
										Leisure activities which involve rating of skills for competition and other purposes (e.g. “belt concept in Tae-kwon-do”) may also indicate your level for ease in evaluation.
									</p>
									<table width="100%" style="border-collapse: collapse; border: 0px; ">
										<tr>
											<td style="text-align: justify; border-bottom: 2px solid;" >Leisure Activity</td>
											<td style="text-align: justify; border-bottom: 2px solid;" >Rating of Skills</td>
										</tr>
									';

									foreach ($hobbies as $hobby) {
										$output .='
										<tr>
											<td style="text-align: justify; border-bottom: 2px solid;" >
												'.$hobby->hobbyTitle.'
											</td>
											<td style="text-align: justify; border-bottom: 2px solid;" >
												'.$hobby->ratingofSkill.'
											</td>
										</tr>
										';
									}

									$output .='
									</table>

								</li>
							
							<!-- --------------------  special_skills  -------------------- -->
								<li style=" font-weight:0; margin-top:10pts;">
									Special Skills
									<p style="font-weight:0;">
										Note down those special skills which you think must be related to the field of study you want to pursue.
									</p>
									<span style="font-weight:0; border-bottom: 2px solid;" align="justify">
									';
									if (count($specialskills)<1) {
										$output .='
										<div style="font-weight:0; border-bottom: 2px solid;"></div>
										';
									}
									elseif(count($specialskills) == 1){
										foreach ($specialskills as $special) {
											$output .=''.$special->skillName.'';
											}
									}
									else{
										foreach ($specialskills as $special) {
											$output .=''.$special->skillName.', ';
											}
										}

									$output .='
									</span>
								</li>
							
							<!-- --------------------  work_activity  -------------------- -->
								<li style=" font-weight:0; margin-top:10pts;">
									Work-Related Activities
									<p style="font-weight:0;">
										Some work-related activities are occasions for you to learn something new. For example, being assigned to projects beyond your usual job description where you learned new skills and knowledge. Please do not include formal training programs you already cited. However, you may include here experiences which can be classified as on-the-job training or apprenticeship.
									</p>

									<table width="100%" style="border-collapse: collapse; border: 2px; ">
										<tr>
											<td width="30%" style="text-align: justify; border-bottom: 2px solid; border-right: 2px solid;" >Activity</td>
											<td width="" style="text-align: justify; border-bottom: 2px solid; padding-left: 5px;" >Description</td>
										</tr>
									';

									foreach ($hobbies as $hobby) {
										$output .='
										<tr>
											<td style="text-align: justify; border-bottom: 2px solid; border-right: 2px solid;" >
												'.$hobby->hobbyTitle.'
											</td>
											<td style="text-align: justify; border-bottom: 2px solid; padding-left: 5px;" >
												'.$hobby->ratingofSkill.'
											</td>
										</tr>
										';
									}

									$output .='
									</table>
								</li>
							
							<!-- --------------------  volunteer  -------------------- -->
								<li style=" font-weight:0; margin-top:10pts;">
									Volunteer Activities
									<p style="font-weight:0;">
										List only volunteer activities that demonstrate learning opportunities, and are related to the course you are applying for credit. (e.g. counselling programs, sports coaching, project organizing or coordination, organizational leadership, and the like).
									</p>
									<span style="font-weight:0; border-bottom: 2px solid;" align="justify">
									';
									if (count($volunteer)<1) {
										$output .='
										<div style="font-weight:0; border-bottom: 2px solid; padding-bottom:10pts;"></div>
										';
									}
									elseif(count($volunteer) == 1){
										foreach ($volunteer as $vol) {
											$output .=''.$vol->title.'';
											}
									}
									else{
										foreach ($volunteer as $vol) {
											$output .=''.$vol->title.', ';
											}
										}

									$output .='
									</span>
								</li>
							
							<!-- --------------------  travels  -------------------- -->
								<li style=" font-weight:0; margin-top:15pts;">
									Travels : Cite places visited and purpose of travel
									<p style="font-weight:0;">
										Include a write-up of the nature of travel undertaken, whether for leisure, employment, business or other purposes. State in clear terms what new learning experience was obtained from these travels and how it helped you become a better person.
									</p>
									<table width="100%" style="border-collapse: collapse; border: 0px; ">
										<tr>
											<td style="text-align: justify; border-bottom: 2px solid;" >Location</td>
											<td style="text-align: justify; border-bottom: 2px solid;" >Purpose</td>
											<td style="text-align: justify; border-bottom: 2px solid;" >Experience</td>
										</tr>
									';
									if (count($travels)>1) {
										foreach ($travels as $travel) {
											$output .='
											<tr>
												<td style="text-align: justify; border-bottom: 2px solid;" >
													'.$travel->location.'
												</td>
												<td style="text-align: justify; border-bottom: 2px solid;" >
													'.$travel->purpose.'
												</td>
												<td style="text-align: justify; border-bottom: 2px solid;" >
													'.$travel->learningExperience.'
												</td>	
											</tr>
											';
											}
										}

									else{
										$output .='
										<tr>
											<td style="text-align: justify; border-bottom: 2px solid; padding:8pts;" ></td>
											<td style="text-align: justify; border-bottom: 2px solid; padding:8pts;" ></td>
											<td style="text-align: justify; border-bottom: 2px solid; padding:8pts;" ></td>	
										</tr>
										';
										}

									$output .='
									</table>
								</li>
						</ol>
					
					<!-- --------------------  essay  -------------------- -->
						<li style=" font-weight: bold; margin-top:11pts;">
							To sum up please write an essay on how your attaining a degree contributes to your personal development, your community, your workplace, society, and country?
							<br>
							';
							foreach ($plans as $plan) {
								$output .='
								<span style="font-weight:0; border-bottom: 2px solid;">'.$plan->essay.'</span>
								';
							}
							$output .='
						</li>
				</ol>

				<p style="text-indent:50px;">
					I declare under oath that, the foregoing claims and information I have disclosed are true and correct. Done in <span style="border-bottom: 2px solid;">___'.date("F").'___</span>  , on this <span style="border-bottom: 2px solid;">___'.date("d").'___</span> day of <span style="border-bottom: 2px solid;">___'.date("Y").'___</span> .
					</p>

					<br> <br>
					<span style="font-weight:bold;">Signed:</span>
					<br> <br>

					<span style="margin-left:50px;">
					</span>
					'.Auth::user()->profiles->lastName.', '.Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName.'
					<br>
					<span style="font-weight:bold; margin-left:50px; border-top: 2px solid;">Printed Name and Signature of Applicant</span>

					<br> <br>
					Community Tax Certificate <span style="border-bottom: 2px solid;">____________________________</span> 
					<br>
										
					Issued on <span style="border-bottom: 2px solid;">____________________________</span> at <span style="border-bottom: 2px solid;"> ____________________________</span> 

			</div>';
		return $output;
		}

    //this is the controller for the button that makes the html into a PDF for: ETEEAP_Additional_Requirements
	function addReqtPDF(){
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->addReqt_convert_to_html());
		return $pdf->stream();
		}

	//this is the html content of the PDF generated for: ETEEAP_Additional_Requirements
	function addReqt_convert_to_html(){
		/* --------------------  ----  -------------------- */
		/* --------------------  SQLS  -------------------- */
		/* --------------------  ----  -------------------- */
	        //gets the user's id number
	        $user = Auth::user()->id;

	        //SQL for joining Users table with Plans table where Plans.UserID = UserID 
		    $plans = DB::table('users')
		        ->join('plans','users.id','=','plans.user_id')
		        ->select('plans.id as formid','users.id as userid','plans.coreValues','priority1','priority2','priority3','sgop','timePlan','accreditationPlan','plantoComplete','essay')
		        ->where('plans.user_id','=',$user)
		        ->get(); 

		$output ='
			<!-- --------------------  header  -------------------- -->
				<div style="padding: 0rem 2rem;">
					<div align="center">
						<img src="../public/img/UB-banner.png" style="margin: 0; padding: 0;" width="40%" height="40%">
						<br>
						<span style="font-size: 10pts; font-weight: bold;margin: 0; padding: 0;">
							EXPANDED TERTIARY EDUCATION EQUIVALENCY AND ACCREDITATION PROGRAM
						</span>
						<br>
						<span style="font-size: 11pts; margin: 0; padding: 0;">
							General Luna Road, Baguio City Philippines 2600
						</span>
					</div>
				</div>
			
				<table width="100%" style="border-collapse: collapse; border: 0px;">
					<tr>
						<td width="33%" style="border-top: 3px solid; padding: 0; font-size: 7pts;" align="left">
							Telefax No.: (074) 442-4915 loc. 217
						</td>
						<td width="33%" style="border-top: 3px solid; padding: 0; font-size: 7pts;" align="center">
							Website: www.ubaguio.edu
						</td>
						<td width="33%" style="border-top: 3px solid; padding: 0; font-size: 7pts;" align="right">
							E-mail Address: linkages@e.ubaguio.edu
						</td>
					</tr>
				</table>

			<!-- --------------------  body  -------------------- -->
				<div style="padding: 0rem 2rem;">
					<p style="text-indent: 50px;">In 300 words – explain how you were able to apply the Core Values of the University of Baguio to your current work.</p>
					<div align="center">
						<img src="../public/img/core-values.png" style="margin: 0; padding: 0;" width="50%" height="50%">
					</div>
					';
					foreach ($plans as $plan) {
						$output .='<span style="border-bottom: 2px solid;">'.$plan->coreValues.'</span>';
					}

					$output.='
				</div>
		';
		return $output;
		}

    //this is the controller for the button that makes the html into a PDF for: Narrative_Report
	function narrRepPDF(){
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->narrRep_convert_to_html());
		return $pdf->stream();
		}

	//this is the html content of the PDF generated for: Narrtive_Report
	function narrRep_convert_to_html(){

		/* --------------------  ----  -------------------- */
		/* --------------------  SQLS  -------------------- */
		/* --------------------  ----  -------------------- */
	        //gets the user's id number
	        $user = Auth::user()->id;

	        //SQL for joining Users table with community_involvements table where community_involvements.UserID = UserID 
			$communityinvolvement = DB::table('users')
		        ->join('community_involvements','users.id','=','community_involvements.user_id')
		        ->select('community_involvements.id as formid','users.id as userid','what1','where1','when1','overview')
		        ->where('community_involvements.user_id','=',$user)
		        ->get();

		$output ='
		<html>
			<head>
		        <style>
		            /** Define the margins of your page **/
		            @page {
		                margin: 100px 25px;
		            }

		            header {
		                position: fixed;
		                top: -60px;
		                left: 0px;
		                right: 0px;
		                height: 150px;

		                /** Extra personal styles **/
		                color: black;
		                text-align: center;
		                line-height: 12pts;
		            }

		            footer {
		                position: fixed; 
		                bottom: -60px; 
		                left: 0px; 
		                right: 0px;
		                height: 40px; 

		                /** Extra personal styles **/
		                background-color: #525252;
		                color: white;
		                line-height: 30px;
		            }
					
					.body{
						padding: 10rem 6rem 0rem 6rem;
			        }

			        .headerbox-big{
			        	font-size: 20pts; 
			        	background-color: #8C8C8C; 
			        	border: 0.5px solid red; 
			        	color: white; 
			        	font-weight: bold;
			        }

			        .headerbox-sm{
			        	font-size: 12pts; 
			        	background-color: #8C8C8C; 
			        	border: 0.5px solid red; 
			        	color: white; 
			        	font-weight: bold;
			        }
					
					#footer .page:after {
					  content: counter(page, decimal);
					}
		        </style>
			</head>
			<body>
		        <!-- --------------------  start_of_header  -------------------- -->
			        <header>
						<img src="../public/img/UB-banner.png" style="margin: 0; padding: 0;" width="200px;">
						<br>
						<span style="font-size: 10pts; font-weight: bold;margin: 0; padding: 0;">
							LINKAGES OFFICE
						</span>
						<br>
						<span style="font-size: 11pts; margin: 0; padding: 0;">
							General Luna Road, Baguio City Philippines 2600
						</span>
				
						<table width="100%" style="border-collapse: collapse; border: 0px;">
							<tr>
								<td width="33%" style="border-top: 3px solid; padding: 0; font-size: 7pts;" align="left">
									Telefax No.: (074) 442-4915 loc. 217
								</td>
								<td width="33%" style="border-top: 3px solid; padding: 0; font-size: 7pts;" align="center">
									Website: www.ubaguio.edu
								</td>
								<td width="33%" style="border-top: 3px solid; padding: 0; font-size: 7pts;" align="right">
									E-mail Address: linkages@e.ubaguio.edu
								</td>
							</tr>
						</table>
						<p style="font-size: 9pts; padding: 0 5rem;" align="right">
							E003 - ETEEAP
						</p>
						<p style="font-weight: bold; font-size: 9pts; padding: 0 5rem;" align="center">
							EXPANDED TERTIARY EDUCATION EQUIVALENCY AND ACCREDITATION PROGRAM
							<br>NARRATIVE REPORT
						</p>

			        </header>
			        <!-- --------------------  end_of_header  -------------------- -->
				<main>
						<!-- --------------------  body  -------------------- -->
							';
									
								foreach ($communityinvolvement as $comm) {
									$output .='
	        				<div class="body" style="page-break-after: always;" >
								<table width="100%" style="border-collapse: collapse; border: 0px;">
									<tr>
										<td width="10%" style="font-weight: bold;border-width: 1px 0px 1px 1px; border-style: solid; padding: 10px;" align="left">
											WHAT:
										</td>
										<td width="90%" style="border-width: 1px 1px 1px 0px; border-style: solid; padding: 10px;" align="left">
											'.$comm->what1.'
										</td>
									</tr>
									<tr>
										<td width="10%" style="font-weight: bold;border-width: 1px 0px 1px 1px; border-style: solid; padding: 10px;" align="left">
											WHEN:
										</td>
										<td width="90%" style="border-width: 1px 1px 1px 0px; border-style: solid; padding: 10px;" align="left">
											'.date("F j, Y", strtotime($comm->when1)).'
										</td>
									</tr>
									<tr>
										<td width="10%" style="font-weight: bold;border-width: 1px 0px 1px 1px; border-style: solid; padding: 10px;" align="left">
											WHERE:
										</td>
										<td width="90%" style="border-width: 1px 1px 1px 0px; border-style: solid; padding: 10px;" align="left">
											'.$comm->where1.'
										</td>
									</tr>
									<tr>
										<td colspan="2" width="10%" style="border: 1px solid; padding: 10px 10px 150px 10px;" align="left">
											<span style="font-weight: bold;">OVERVIEW: </span>What have you learned from this training?  How useful is this training to your previous or current job?
											<br><br>
											<p style="text-indent: 50px;">'.$comm->overview.'</p>
										</td>
									</tr>
								</table>
								<p style="font-size: 11pts;"><span style="font-weight:bold;">NOTE:</span> Please attach the specific certificate.</p>
							</div>
									';
								}

								$output .='

				</main>
			</body>
		</html>';
		return $output;
		}
    
    //this is the controller for the button that makes the html into a PDF for: Curriculum_Vitae
	function cvPDF(){
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->cv_convert_to_html());
		return $pdf->stream();
		}

	//this is the html content of the PDF generated for: Curriculum_Vitae
	function cv_convert_to_html(){

		/* --------------------  ----  -------------------- */
		/* --------------------  SQLS  -------------------- */
		/* --------------------  ----  -------------------- */
	        //gets the user's id number
	        $user = Auth::user()->id;

	        //gets the user's profile based on userID
	        $profile = User::find($user)->profiles;
 
	        //SQL for joining Users table with awards table where awards.UserID = UserID 
			$awards = DB::table('users')
		        ->join('awards','users.id','=','awards.user_id')
		        ->select('awards.id as formid','users.id as userid','awards.awardTitle','awards.organizationName','awards.organizationAddress','awards.dateReceived')
		        ->where('awards.user_id','=',$user)
		        ->get();  

			/* --------------------  formal_education_SQLs  -------------------- */
		        //SQL for joining Users table with formal_education table where formal_education.UserID = UserID and schoollvl = "Elementary Level"
		        $elementarylvl = DB::table('users')
			        ->join('formal_education','users.id','=','formal_education.user_id')
			        ->select('formal_education.id as formid','users.id as userid','formal_education.schoolLvl','formal_education.schoolName','formal_education.schoolAddress')
			        ->where('formal_education.user_id','=',$user)
			        ->where('formal_education.schoolLvl','=','Elementary Level')
			        ->get(); 
				
		        //SQL for joining Users table with formal_education table where formal_education.UserID = UserID and schoollvl = "Secondary Level"
		        $secondarylvl = DB::table('users')
			        ->join('formal_education','users.id','=','formal_education.user_id')
			        ->select('formal_education.id as formid','users.id as userid','formal_education.schoolLvl','formal_education.schoolName','formal_education.schoolAddress')
			        ->where('formal_education.user_id','=',$user)
			        ->where('formal_education.schoolLvl','=','Secondary Level')
			        ->get(); 

		        //SQL for joining Users table with formal_education table where formal_education.UserID = UserID and schoollvl = "Tertiary Level"
		        $tertiarylvl = DB::table('users')
			        ->join('formal_education','users.id','=','formal_education.user_id')
			        ->select('formal_education.id as formid','users.id as userid','formal_education.schoolLvl','formal_education.schoolName','formal_education.schoolAddress','formal_education.degree')
			        ->where('formal_education.user_id','=',$user)
			        ->where('formal_education.schoolLvl','=','Tertiary Level')
			        ->get(); 
				
		        //SQL for joining Users table with formal_education table where formal_education.UserID = UserID and schoollvl = "Graduate Level"
		        $graduatelvl = DB::table('users')
			        ->join('formal_education','users.id','=','formal_education.user_id')
			        ->select('formal_education.id as formid','users.id as userid','formal_education.schoolLvl','formal_education.schoolName','formal_education.schoolAddress','formal_education.degree')
			        ->where('formal_education.user_id','=',$user)
			        ->where('formal_education.schoolLvl','=','Graduate Level')
			        ->get(); 

	        //SQL for joining Users table with licensures table where licensures.UserID = UserID 
			$licensure = DB::table('users')
		        ->join('licensures','users.id','=','licensures.user_id')
		        ->select('licensures.id as formid','users.id as userid','licensures.licenseTitle','licensures.file')
		        ->where('licensures.user_id','=',$user)
		        ->get(); 

	        //SQL for joining Users table with work_experiences table where work_experiences.UserID = UserID 
			$workexperience = DB::table('users')
		        ->join('work_experiences','users.id','=','work_experiences.user_id')
		        ->select('work_experiences.id as formid','users.id as userid','work_experiences.position','companyName','functions')
		        ->where('work_experiences.user_id','=',$user)
		        ->get();  
			
	        //SQL for joining Users table with organization_memberships table where organization_memberships.UserID = UserID where organization_memberships.type = Professional
			$profOrg = DB::table('users')
		        ->join('organization_memberships','users.id','=','organization_memberships.user_id')
		        ->select('organization_memberships.id as formid','users.id as userid','organization_memberships.type','duration','organization','position')
		        ->where('organization_memberships.user_id','=',$user)
		        ->where('organization_memberships.type','=','Professional')
		        ->get();    
			
	        //SQL for joining Users table with organization_memberships table where organization_memberships.UserID = UserID where organization_memberships.type = Non-Professional
			$nonprofOrg = DB::table('users')
		        ->join('organization_memberships','users.id','=','organization_memberships.user_id')
		        ->select('organization_memberships.id as formid','users.id as userid','organization_memberships.type','duration','organization','position')
		        ->where('organization_memberships.user_id','=',$user)
		        ->where('organization_memberships.type','=','Non-Professional')
		        ->get();  

	        //SQL for joining Users table with engagements table where engagements.UserID = UserID where involvement != speaker
			$profDevt = DB::table('users')
		        ->join('engagements','users.id','=','engagements.user_id')
		        ->select('engagements.id as formid','users.id as userid','involvement','engagements.title','startYear','endYear','venue','organizer')
		        ->where('engagements.user_id','=',$user)
		        ->where('involvement','!=','Speaker')
		        ->get();    

	        //SQL for joining Users table with engagements table where engagements.UserID = UserID where involvement = speaker
			$speaker = DB::table('users')
		        ->join('engagements','users.id','=','engagements.user_id')
		        ->select('engagements.id as formid','users.id as userid','engagements.title','startYear','endYear','duration','venue','involvement','organizer')
		        ->where('engagements.user_id','=',$user)
		        ->where('involvement','=','Speaker')
		        ->get();   
			
	        //SQL for joining Users table with community_involvements table where community_involvements.UserID = UserID 
			$communityinvolvement = DB::table('users')
		        ->join('community_involvements','users.id','=','community_involvements.user_id')
		        ->select('community_involvements.id as formid','users.id as userid','community_involvements.title','startYear','endYear','duration','venue','organizer')
		        ->where('community_involvements.user_id','=',$user)
		        ->get();   

		$output ='
		<html>
		    <head>
		        <style>
		            /** Define the margins of your page **/
		            @page {
		                margin: 100px 25px;
		            }

		            header {
		                position: fixed;
		                top: -60px;
		                left: 0px;
		                right: 0px;
		                height: 150px;

		                /** Extra personal styles **/
		                color: black;
		                text-align: center;
		                line-height: 12pts;
		            }

		            footer {
		                position: fixed; 
		                bottom: -60px; 
		                left: 0px; 
		                right: 0px;
		                height: 40px; 

		                /** Extra personal styles **/
		                background-color: #525252;
		                color: white;
		                line-height: 30px;
		            }
					
					.body{
			            padding-top: 50px;
			        }

			        .headerbox-big{
			        	font-size: 20pts; 
			        	background-color: #8C8C8C; 
			        	border: 0.5px solid red; 
			        	color: white; 
			        	font-weight: bold;
			        }

			        .headerbox-sm{
			        	font-size: 12pts; 
			        	background-color: #8C8C8C; 
			        	border: 0.5px solid red; 
			        	color: white; 
			        	font-weight: bold;
			        }
					
					#footer .page:after {
					  content: counter(page, decimal);
					}
		        </style>
		    </head>
		    <body>
		        <!-- --------------------  start_of_header  -------------------- -->
			        <header>
						<img src="../public/img/UB-banner.png" style="margin: 0; padding: 0;" width="200px;">
						<br>
						<span style="font-size: 10pts; font-weight: bold;margin: 0; padding: 0;">
							LINKAGES OFFICE
						</span>
						<br>
						<span style="font-size: 11pts; margin: 0; padding: 0;">
							General Luna Road, Baguio City Philippines 2600
						</span>
				
						<table width="100%" style="border-collapse: collapse; border: 0px;">
							<tr>
								<td width="33%" style="border-top: 3px solid; padding: 0; font-size: 7pts;" align="left">
									Telefax No.: (074) 442-4915 loc. 217
								</td>
								<td width="33%" style="border-top: 3px solid; padding: 0; font-size: 7pts;" align="center">
									Website: www.ubaguio.edu
								</td>
								<td width="33%" style="border-top: 3px solid; padding: 0; font-size: 7pts;" align="right">
									E-mail Address: linkages@e.ubaguio.edu
								</td>
							</tr>
						</table>
			        </header>
			        <!-- --------------------  end_of_header  -------------------- -->

		        <!-- --------------------  start_of_footer  -------------------- -->
			        <footer>
			     		<table width="100%" style="border-collapse: collapse; border: 0px;">
			        		<tr>
			        			<td width="85%" style="border: 1px solid; padding: 0 0 20px 15px;">
			        				Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP)
			        			</td>
			        			<td width="15%" style="border: 1px solid; padding: 0 0 20px 5px;">
								    <div id="footer">
									    <div class="page">Page </div>
									</div>
							    </td>
			        		</tr>
			        	</table>
			        </footer>
			        <!-- --------------------  end_of_footer  -------------------- -->

		        <!-- Wrap the content of your PDF inside a main tag -->
		        <main>
		        	<!-- --------------------  start_of_body_1  -------------------- -->
			        	<div class="body" style="page-break-after: always;" >
		                		<div class="headerbox-big" width="100%" align="center">
		                			CURRICULUM VITAE
		                		</div>

		                		<table width="100%" style="border-collapse: collapse; border: 0px; padding-bottom: 15px;">
		                			<tr>
		                				<td colspan="4" style="border-bottom: 2px solid; font-size: 20pts; padding-top:10px;" align="center">
		                					'.Auth::user()->profiles->lastName.', '.Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName.'
		                				</td>
		                			</tr>
		                			<tr>
		                				<td colspan="4" style="border-top: 2px solid; padding-bottom: 20px;" align="center">
		                					FULL NAME
		                				</td>
		                			</tr>
		                			<tr>
		                				<td rowspan="6" width="15%">
										';

										if (empty(Auth::user()->profiles->photo)) {
											$output .='
												<div style="border:1px solid; width:6rem; height:6rem; " align="center">
													<br>
													1x1 <br>ID Picture
												</div>
													';
											}

										else{
											$output .='
											<img src="../public/uploads/profilepicture/'.Auth::user()->profiles->photo.'" style="border:1px solid; width:6rem; height:6rem; " >
											';
										}

										$output .='

		                				</td>
		                				<td width="29%" style="font-weight: bold; padding: 5px 0;" align="left">CITY ADDRESS</td>
		                				<td width="1%" style="font-weight: bold; padding: 5px 0;" align="right">:</td>
		                				<td width="55%"	style="padding-left: 10px;">'.Auth::user()->profiles->address.'</td>
		                			</tr>
		                			<tr>
		                				<td width="29%" style="font-weight: bold; padding: 5px 0;" >PROVINCIAL ADDRESS</td>
		                				<td width="1%" style="font-weight: bold; padding: 5px 0;" align="right">:</td>
		                				<td width="55%"	style="padding-left: 10px;"></td>
		                			</tr>
		                			<tr>
		                				<td width="29%" style="font-weight: bold; padding: 5px 0;" >HOME PHONE NUMBER</td>
		                				<td width="1%" style="font-weight: bold; padding: 5px 0;" align="right">:</td>
		                				<td width="55%"	style="padding-left: 10px;"></td>
		                			</tr>
		                			<tr>
		                				<td width="29%" style="font-weight: bold; padding: 5px 0;" >MOBILE PHONE NUMBER</td>
		                				<td width="1%" style="font-weight: bold; padding: 5px 0;" align="right">:</td>
		                				<td width="55%"	style="padding-left: 10px;">'.Auth::user()->profiles->phone.'</td>
		                			</tr>
		                			<tr>
		                				<td width="29%" style="font-weight: bold; padding: 5px 0;" >EMAIL ADDRESS</td>
		                				<td width="1%" style="font-weight: bold; padding: 5px 0;" align="right">:</td>
		                				<td width="55%"	style="padding-left: 10px;">'.Auth::user()->email.'</td>
		                			</tr>
		                			<tr>
		                				<td width="29%" style="font-weight: bold; padding: 5px 0;" >NICKNAME</td>
		                				<td width="1%" style="font-weight: bold; padding: 5px 0;" align="right">:</td>
		                				<td width="55%"	style="padding-left: 10px;"></td>
		                			</tr>
		                		</table>

		                	<!-- --------------------  personal_information  -------------------- -->
		                		<div class="headerbox-sm" width="100%" align="center">
		                			PERSONAL INFORMATION
		                		</div>

		                		<table width="100%" style="border-collapse: collapse; border: 0px; padding: 25px;">
		                			<!-- --------------------  graduate_level  -------------------- -->
			                			<tr>
			                				<td colspan="4" style="font-weight: bold; padding: 5px 0;">Graduate Level</td>
			                			</tr>';
			                			//if user doesnt have a graduate level data then print blank cells
			                			if (count($graduatelvl)<1) {
			                				$output .='
					                			<tr>
					                				<td rowspan="2" width="10%"></td>
					                				<td width="10%" style="font-weight: bold; padding: 5px 0;">School</td>
					                				<td width="1%" style="font-weight: bold; padding: 5px 0;">:</td>
					                				<td width="75%" style="">
					                				</td>
					                			</tr>
					                			<tr>
					                				<td width="10%" style="font-weight: bold;">Degree</td>
					                				<td width="1%" style="font-weight: bold;">:</td>
					                				<td width="75%" style="">
					                				</td>
					                			</tr>
				                				';
			                				}
			                				
			                			else{
				                			//code for getting all details under graduate level
				                			foreach ($graduatelvl as $grad) {
				                				$output .='
						                			<tr>
						                				<td rowspan="2" width="10%"></td>
						                				<td width="10%" style="font-weight: bold; padding: 5px 0;">School</td>
						                				<td width="1%" style="font-weight: bold; padding: 5px 0;">:</td>
						                				<td width="75%" style="">
						                					'.$grad->schoolName.' ('.$grad->schoolAddress.')
						                				</td>
						                			</tr>
						                			<tr>
						                				<td width="10%" style="font-weight: bold;">Degree</td>
						                				<td width="1%" style="font-weight: bold;">:</td>
						                				<td width="75%" style="">
						                					'.$grad->degree.'
						                				</td>
						                			</tr>
						                				';
				                				}	
			                				}

			                			$output .='

		                			<!-- --------------------  tertiary_level  -------------------- -->
			                			<tr>
			                				<td colspan="4" style="font-weight: bold; padding: 5px 0;">Tertiary Level</td>
			                			</tr>';
			                			//if user doesnt have a tertiary level data then print blank cells
			                			if (count($tertiarylvl)<1) {
			                				$output .='
					                			<tr>
					                				<td rowspan="2" width="10%"></td>
					                				<td width="10%" style="font-weight: bold; padding: 5px 0;">School</td>
					                				<td width="1%" style="font-weight: bold; padding: 5px 0;">:</td>
					                				<td width="75%" style="">
					                				</td>
					                			</tr>
					                			<tr>
					                				<td width="10%" style="font-weight: bold;">Degree</td>
					                				<td width="1%" style="font-weight: bold;">:</td>
					                				<td width="75%" style="">
					                				</td>
					                			</tr>
				                				';
			                				}
			                				
			                			else{
				                			//code for getting all details under tertiary level
				                			foreach ($tertiarylvl as $tert) {
				                				$output .='
						                			<tr>
						                				<td rowspan="2" width="10%"></td>
						                				<td width="10%" style="font-weight: bold; padding: 5px 0;">School</td>
						                				<td width="1%" style="font-weight: bold; padding: 5px 0;">:</td>
						                				<td width="75%" style="">
						                					'.$tert->schoolName.' ('.$tert->schoolAddress.')
						                				</td>
						                			</tr>
						                			<tr>
						                				<td width="10%" style="font-weight: bold;">Degree</td>
						                				<td width="1%" style="font-weight: bold;">:</td>
						                				<td width="75%" style="">
						                					'.$tert->degree.'
						                				</td>
						                			</tr>
						                				';
				                				}	
			                				}

			                			$output .='
		                			
		                			<!-- --------------------  secondary_level  -------------------- -->
		                				<tr>
			                				<td colspan="2" width="10%" style="font-weight: bold; padding: 5px 0;">Secondary Level</td>
			                				<td width="1%" style="font-weight: bold;">:</td>
			                				<td width="75%" style="">
						                ';	
				                			//code for getting all details under elementary level
				                			foreach ($secondarylvl as $sec) {
				                				$output .=''.$sec->schoolName.' ('.$sec->schoolAddress.')';
				                				}	
			                			$output .='
			                				</td>
		                				</tr>
		                			
		                			<!-- --------------------  elementary_level  -------------------- -->
		                				<tr>
			                				<td colspan="2" width="10%" style="font-weight: bold; padding: 5px 0;">Elementary Level</td>
			                				<td width="1%" style="font-weight: bold;">:</td>
			                				<td width="75%" style="">
						                ';	
				                			//code for getting all details under elementary level
				                			foreach ($elementarylvl as $elem) {
				                				$output .=''.$elem->schoolName.' ('.$elem->schoolAddress.')';
				                				}	
			                			$output .='</td>
		                				</tr>
		                		</table>

			            	<!-- --------------------  awards_and_recognition  -------------------- -->
		                		<div class="headerbox-sm" width="100%" align="center">
		                			AWARDS AND RECOGNITION
		                		</div>

		                		<table width="100%" style="border-collapse: collapse; border: 1px solid; padding: 25px;">
		                			<tr>
		                				<td width="33%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					AWARDS/CITATION RECEIVED
		                				</td>
		                				<td width="33%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					AWARD GIVING BODY
		                				</td>
		                				<td width="33%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					DATE
		                				</td>
		                			</tr>';
		                			//if there are no awards 4 rows of blank cells will be printed
		                			if (count($awards) < 1) {
		                				for ($i=0; $i<4; $i++){
			                				$output .='
			                				<tr>
			                					<td align="left" style="border: 1px solid black; padding: 10px;"></td>
			                					<td align="left" style="border: 1px solid black; padding: 10px;"></td>
			                					<td align="left" style="border: 1px solid black; padding: 10px;"></td>
			                				</tr>
			                				';
		                				}
		                			}

		                			elseif (count($awards) == 1 && count($awards) <= 4 ) {
			                			foreach ($awards as $award) {
			                				$output .='
			                				<tr>
			                					<td align="left" style="border: 1px solid black; padding: 5px;">
			                						'.$award->awardTitle.'
			                					</td>
			                					<td align="left" style="border: 1px solid black; padding: 5px;">
			                						'.$award->organizationName.'<br>'.$award->organizationAddress.'
			                					</td>
			                					<td align="left" style="border: 1px solid black; padding: 5px;">
			                						'.date("F j, Y", strtotime($award->dateReceived)).'
			                					</td>
			                				</tr>
			                				';
		                				}
		                				for ($i=0; $i < 4; $i++){
			                				$output .='
			                				<tr>
			                					<td align="left" style="border: 1px solid black; padding: 10px;"></td>
			                					<td align="left" style="border: 1px solid black; padding: 10px;"></td>
			                					<td align="left" style="border: 1px solid black; padding: 10px;"></td>
			                				</tr>
			                				';
		                				}
		                			}
		                			else {
			                			foreach ($awards as $award) {
			                				$output .='
			                				<tr>
			                					<td align="left" style="border: 1px solid black; padding: 5px;">
			                						'.$award->awardTitle.'
			                					</td>
			                					<td align="left" style="border: 1px solid black; padding: 5px;">
			                						'.$award->organizationName.'<br>'.$award->organizationAddress.'
			                					</td>
			                					<td align="left" style="border: 1px solid black; padding: 5px;">
			                						'.date("F j, Y", strtotime($award->dateReceived)).'
			                					</td>
			                				</tr>
			                				';
		                				}
		                			}
		                			$output.='
		                		</table>
			            </div>
			        	<!-- --------------------  end_of_body  -------------------- -->

		        	<!-- --------------------  start_of_body_2  -------------------- -->
			        	<div class="body" style="page-break-after: always;" >
		        		<!-- --------------------  national_exams  -------------------- -->
	                		<div class="headerbox-sm" width="100%" align="center">
	                			NATIONAL EXAMINATIONS/LICENSURE EXAMS TAKEN AND PASSED
	                		</div>
	                		<ul>';

	                		if (count($licensure) == 0){
	                			$output .='
	                			<li>
	                				<span style="color: white;">
	                					lorem ipsum
	                				</span>
	                			</li>
	                			<li>
	                				<span style="color: white;">
	                					lorem ipsum
	                				</span>
	                			</li>
	                			';
	                		}
	                		else{
	                			foreach ($licensure as $lic) {
		                			$output .='
			                			<li>
		                					'.ucwords($lic->licenseTitle).'
			                			</li>
		                			';
	                			}

	                		}

	                		$output.='
	                		</ul>

		        		<!-- --------------------  work_exp  -------------------- -->
	                		<div class="headerbox-sm" width="100%" align="center">
	                			PROFESSIONAL WORK EXPERIENCE W/ JOB DESCRIPTION
	                		</div>
		        			<!-- --------------------  code_for_table  -------------------- -->
	                			<table width="100%" style="border-collapse: collapse; border: 1px solid; padding: 25px;">
		                			<tr>
		                				<td width="33%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					COMPANY
		                				</td>
		                				<td width="33%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					POSITION
		                				</td>
		                				<td width="33%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					JOB DESCRIPTION
		                				</td>
		                			</tr>
		                			';
		                			//if applicant has no workexp print blank cells
		                			if (count($workexperience) < 1){
			                			for($i=0; $i<3; $i++){
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                			</tr>
			                				';
			                			}

		                			}
		                			elseif (count($workexperience) == 1 && count($workexperience) <= 4 ) {
			                			foreach ($workexperience as $workexp) {
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 11pts; ">
					                					'.$workexp->companyName.'
					                				</td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts; ">
					                					'.$workexp->position.'
					                				</td>
					                				<td align="left" style="border: 1px solid black; padding: 11pts; ">
					                					'.$workexp->functions.'
					                				</td>
					                			</tr>
			                				';
		                				}
		                				for ($i=0; $i < 2; $i++){
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                			</tr>
			                				';
		                				}
		                			}
		                			else{
			                			foreach($workexperience as $workexp){
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 11pts; ">
					                					'.$workexp->companyName.'
					                				</td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts; ">
					                					'.$workexp->position.'
					                				</td>
					                				<td align="left" style="border: 1px solid black; padding: 11pts; ">
					                					'.$workexp->functions.'
					                				</td>
					                			</tr>
			                				';
			                			}

		                			}
		                			$output .= '
		                		</table>
		                		
		        		<!-- --------------------  membership_professional  -------------------- -->
	                		<div class="headerbox-sm" width="100%" align="center">
	                			MEMBERSHIP IN PROFESSIONAL ORGANIZATIONS
	                		</div>
		        			<!-- --------------------  code_for_table  -------------------- -->
	                			<table width="100%" style="border-collapse: collapse; border: 1px solid; padding: 25px;">
		                			<tr>
		                				<td width="33%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					ORGANIZATION
		                				</td>
		                				<td width="33%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					POSITION
		                				</td>
		                				<td width="33%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					DURATION
		                				</td>
		                			</tr>
		                			';
		                			if(count($profOrg) < 1){
			                			for($i=0; $i<3; $i++){
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                			</tr>
			                				';
			                			}
		                			}
		                			elseif (count($profOrg) == 1 && count($profOrg) <= 2 ) {
		                				foreach ($profOrg as $proOrg) {
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 10px;">
					                					'.$proOrg->organization.'
					                				</td>
					                				<td align="center" style="border: 1px solid black; padding: 10px;">
					                					'.$proOrg->position.'
					                				</td>
					                				<td align="center" style="border: 1px solid black; padding: 10px;">
					                					'.$proOrg->duration.' ';
					                					if($proOrg->duration == 1){
					                						$output.='Month';
					                					}
					                					else{
					                						$output.='Months';
					                					}
					                					$output.='
					                				</td>
					                			</tr>
			                				';
		                				}
		                				for ($i=0; $i < 2; $i++){
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                			</tr>
			                				';
		                				}
		                			}
		                			else{
		                				foreach ($profOrg as $proOrg) {
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 10px;">
					                					'.$proOrg->organization.'
					                				</td>
					                				<td align="center" style="border: 1px solid black; padding: 10px;">
					                					'.$proOrg->position.'
					                				</td>
					                				<td align="center" style="border: 1px solid black; padding: 10px;">
					                					'.$proOrg->duration.' ';
					                					if($proOrg->duration == 1){
					                						$output.='Month';
					                					}
					                					else{
					                						$output.='Months';
					                					}
					                					$output.='
					                				</td>
					                			</tr>
			                				';
		                				}
		                			}
		                			$output .= '
		                		</table>
		                		
		        		<!-- --------------------  membership_other  -------------------- -->
	                		<div class="headerbox-sm" width="100%" align="center">
	                			MEMBERSHIP IN OTHER ORGANIZATIONS
	                		</div>
		        			<!-- --------------------  code_for_table  -------------------- -->
	                			<table width="100%" style="border-collapse: collapse; border: 1px solid; padding: 25px;">
		                			<tr>
		                				<td width="33%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					ORGANIZATION
		                				</td>
		                				<td width="33%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					POSITION
		                				</td>
		                				<td width="33%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					DURATION
		                				</td>
	                				</tr>
		                			';
		                			if(count($nonprofOrg) < 1){
			                			for($i=0; $i<3; $i++){
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                			</tr>
			                				';
			                			}
		                			}
		                			elseif (count($nonprofOrg) == 1 && count($nonprofOrg) <= 4 ) {
		                				foreach ($nonprofOrg as $nonproOrg) {
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 10px;">
					                					'.$nonproOrg->organization.'
					                				</td>
					                				<td align="center" style="border: 1px solid black; padding: 10px;">
					                					'.$nonproOrg->position.'
					                				</td>
					                				<td align="center" style="border: 1px solid black; padding: 10px;">
					                					'.$nonproOrg->duration.' ';
					                					if($nonproOrg->duration == 1){
					                						$output.='Month';
					                					}
					                					else{
					                						$output.='Months';
					                					}
					                					$output.='
					                				</td>
					                			</tr>
			                				';
		                				}
		                				for ($i=0; $i < 2; $i++){
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                			</tr>
			                				';
		                				}
		                			}
		                			else{
		                				foreach ($nonprofOrg as $nonproOrg) {
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 10px;">
					                					'.$nonproOrg->organization.'
					                				</td>
					                				<td align="center" style="border: 1px solid black; padding: 10px;">
					                					'.$nonproOrg->position.'
					                				</td>
					                				<td align="center" style="border: 1px solid black; padding: 10px;">
					                					'.$nonproOrg->duration.' ';
					                					if($nonproOrg->duration == 1){
					                						$output.='Month';
					                					}
					                					else{
					                						$output.='Months';
					                					}
					                					$output.='
					                				</td>
					                			</tr>
			                				';
		                				}
		                			}
		                			$output .= '
		                		</table>
		                		
			            </div>
			        	<!-- --------------------  end_of_body  -------------------- -->

		        	<!-- --------------------  start_of_body_3  -------------------- -->
			        	<div class="body" style="page-break-after: always;" >
		        		<!-- --------------------  pro_engagements  -------------------- -->
	                		<div class="headerbox-sm" width="100%" align="center">
	                			PROFESSIONAL DEVELOPMENT ENGAGEMENTS
	                		</div>
		        			<!-- --------------------  code_for_table  -------------------- -->
	                			<table width="100%" style="border-collapse: collapse; border: 1px solid; padding: 25px;">
		                			<tr>
		                				<th width="25%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					TITLE OF SEMINAR/<br>CONFERNECE/<br>WORKSHOP
										</th>
		                				<th width="25%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					INCLUSIVE DATES OF ATTENDANCE
											<br>(MM/DD/YY)
		                				</th>
		                				<th width="25%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					VENUE
		                				</th>
		                				<th width="25%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					ORGANIZER
		                				</th>
		                			</tr>';
		                			if(count($profDevt)<1){
			                			for($i=0; $i<4; $i++){
			                				$output .='
					                			<tr>
					                				<td style="border: 1px solid black; padding: 10pts;"></td>
					                				<td style="border: 1px solid black; padding: 10pts;"></td>
					                				<td style="border: 1px solid black; padding: 10pts;"></td>
					                				<td style="border: 1px solid black; padding: 10pts;"></td>
					                			</tr>
			                				';
			                				}
		                				}
		                			elseif (count($profDevt) == 1 && count($profDevt) <= 2 ) {
			                			foreach ($profDevt as $profDev) {
			                				$output .='
					                			<tr>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$profDev->title.'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
														'.date("m/d/y", strtotime($profDev->startYear)).' - 
														'.date("m/d/y", strtotime($profDev->endYear)).'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$profDev->venue.'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$profDev->organizer.'
					                				</td>
					                			</tr>
			                				';
			                			}
		                				for ($i=0; $i < 2; $i++){
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                			</tr>
			                				';
		                				}
		                			}
		                			else{
			                			foreach ($profDevt as $profDev) {
			                				$output .='
					                			<tr>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$profDev->title.'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
														'.date("m/d/y", strtotime($profDev->startYear)).' - 
														'.date("m/d/y", strtotime($profDev->endYear)).'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$profDev->venue.'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$profDev->organizer.'
					                				</td>
					                			</tr>
			                				';
			                			}
		                			}
		                			
		                			$output .='
		                		</table>
		                		
		        		<!-- --------------------  speaking_engagements  -------------------- -->
	                		<div class="headerbox-sm" width="100%" align="center">
	                			SPEAKING ENGAGEMENT
	                		</div>
		        			<!-- --------------------  code_for_table  -------------------- -->
	                			<table width="100%" style="border-collapse: collapse; border: 1px solid; padding: 25px;">
		                			<tr>
		                				<th width="25%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					TITLE OF SEMINAR/<br>CONFERNECE/<br>WORKSHOP
										</th>
		                				<th width="25%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					INCLUSIVE DATES OF ATTENDANCE
											<br>(MM/DD/YY)
		                				</th>
		                				<th width="25%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					VENUE
		                				</th>
		                				<th width="25%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					ORGANIZER
		                				</th>
		                			</tr>';
		                			if(count($speaker)<1){
			                			for($i=0; $i<3; $i++){
			                				$output .='
					                			<tr>
					                				<td style="border: 1px solid black; padding: 10pts;"></td>
					                				<td style="border: 1px solid black; padding: 10pts;"></td>
					                				<td style="border: 1px solid black; padding: 10pts;"></td>
					                				<td style="border: 1px solid black; padding: 10pts;"></td>
					                			</tr>
			                				';
			                				}
		                				}
		                			
		                			elseif (count($speaker) == 1 && count($speaker) <= 2 ) {
			                			foreach ($speaker as $speak) {
			                				$output .='
					                			<tr>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$speak->title.'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
														'.date("m/d/y", strtotime($speak->startYear)).' - 
														'.date("m/d/y", strtotime($speak->endYear)).'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$speak->venue.'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$speak->organizer.'
					                				</td>
					                			</tr>
			                				';
			                			}
		                				for ($i=0; $i < 2; $i++){
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                			</tr>
			                				';
		                				}
		                			}
		                			else{
			                			foreach ($speaker as $speak) {
			                				$output .='
					                			<tr>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$speak->title.'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
														'.date("m/d/y", strtotime($speak->startYear)).' - 
														'.date("m/d/y", strtotime($speak->endYear)).'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$speak->venue.'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$speak->organizer.'
					                				</td>
					                			</tr>
			                				';
			                			}
		                			}
		                			
		                			$output .='
		                		</table>
		                		
		        		<!-- --------------------  community_involvement  -------------------- -->
	                		<div class="headerbox-sm" width="100%" align="center">
	                			COMMUNITY INVOLVEMENT
	                		</div>
		        			<!-- --------------------  code_for_table  -------------------- -->
	                			<table width="100%" style="border-collapse: collapse; border: 1px solid; padding: 25px;">
		                			<tr>
		                				<th width="25%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					TITLE OF SEMINAR/<br>CONFERNECE/<br>WORKSHOP
										</th>
		                				<th width="25%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					INCLUSIVE DATES OF ATTENDANCE
											<br>(MM/DD/YY)
		                				</th>
		                				<th width="25%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					VENUE
		                				</th>
		                				<th width="25%" align="center" style="font-weight: bold; color: red; border: 1px solid black;">
		                					ORGANIZER
		                				</th>
		                			</tr>';
		                			if(count($communityinvolvement)<1){
			                			for($i=0; $i<4; $i++){
			                				$output .='
					                			<tr>
					                				<td style="border: 1px solid black; padding: 10pts;"></td>
					                				<td style="border: 1px solid black; padding: 10pts;"></td>
					                				<td style="border: 1px solid black; padding: 10pts;"></td>
					                				<td style="border: 1px solid black; padding: 10pts;"></td>
					                			</tr>
			                				';
			                				}
		                				}
		                			
		                			elseif (count($communityinvolvement) == 1 && count($communityinvolvement) <= 2 ) {
			                			foreach ($communityinvolvement as $comm) {
			                				$output .='
					                			<tr>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$comm->title.'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
														'.date("m/d/y", strtotime($comm->startYear)).' - 
														'.date("m/d/y", strtotime($comm->endYear)).'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$comm->venue.'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$comm->organizer.'
					                				</td>
					                			</tr>
			                				';
			                			}
		                				for ($i=0; $i < 2; $i++){
			                				$output .='
					                			<tr>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                				<td align="center" style="border: 1px solid black; padding: 11pts;"></td>
					                			</tr>
			                				';
		                				}
		                			}
		                			else{
			                			foreach ($communityinvolvement as $comm) {
			                				$output .='
					                			<tr>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$comm->title.'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
														'.date("m/d/y", strtotime($comm->startYear)).' - 
														'.date("m/d/y", strtotime($comm->endYear)).'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$comm->venue.'
					                				</td>
					                				<td style="border: 1px solid black; padding: 10pts;">
					                					'.$comm->organizer.'
					                				</td>
					                			</tr>
			                				';
			                			}
		                			}
		                			
		                			$output .='
		                		</table>
		                		
			            </div>
			        	<!-- --------------------  end_of_body  -------------------- -->

		        	<!-- --------------------  start_of_body  -------------------- -->
			        	<div class="body" style="page-break-after: never;" >
		        			<!-- --------------------  code_for_table  -------------------- -->
	                			<table width="100%" style="border-collapse: collapse; padding: 50px;">
		                			<tr>
		                				<td colspan="2" align="right" style="border-top: 2px solid black; padding-bottom: 100px; ">
		                					I hereby certify that the above information is
											<BR>true and correct to the best of my knowledge and belief.
		                				</td>
	                				</tr>
		                			<tr>
		                				<td width="30%">
		                				</td>
		                				<td width="70%" align="center" style="border-bottom: 2px solid black; ">
		                					'.Auth::user()->profiles->lastName.', '.Auth::user()->profiles->firstName.' '.Auth::user()->profiles->middleName.'
		                				</td>
	                				</tr>
		                			<tr>
		                				<td width="30%">
		                				</td>
		                				<td width="70%" align="center" style="border-top: 2px solid black; font-weight: bold;">
		                					Signature Over Printed Name		
		                				</td>
	                				</tr>
		                		</table>

			            </div>
			        	<!-- --------------------  end_of_body  -------------------- -->
		        </main>
		    </body>
		</html>
		';
		return $output;
		}
    
    
}
