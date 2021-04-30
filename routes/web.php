<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('login', function () {
    return view('login');
});




Auth::routes(['verify' => true]);
// Route::resources([
   
//     'profiles'=>'ProfileController',


 

//     ]);





// Route::get('/', 'HomeController@index')->name('home');

// Route::redirect('/', 'profiles')->middleware(['auth','auth.user','verified']);



//view profile
// Route::get('/profile/show', function () {
//     return view('profile/show');
// })->name('profile/show')->middleware(['auth','auth.admin','verified']);

// Route::get('/profile/edit', function () {
//     return view('profile/edit');
// })->name('profile/edit')->middleware(['auth','auth.useractive','verified']);

// Route::get('/profile', function () { 
//     return view('profile/view');
// })->name('profiles')->middleware(['auth','auth.user','verified']);
//Route::get('/','HomeController@ChangePassword')->name('changePassword');

Route::namespace('Admin')->prefix('/')->middleware(['auth','auth.user','verified'])->name('user.')->group(function(){
    Route::resource('/','ProfileController');
      Route::get('profile/{id}','ProfileController@show2')->name('profile');
      // Route::get('profile/{id}','ProfileController@show2')->name('profile');
});

Route::namespace('Admin')->prefix('/')->middleware(['auth','auth.user','verified'])->name('user.')->group(function(){
    Route::resource('edit','ProfileUserController');
         Route::post('edit/adduser','ProfileUserController@adduser')->name('edit.adduser');
});


Route::namespace('Admin')->prefix('/')->middleware([])->name('user.')->group(function(){
    Route::resource('create','CreateController');
    //Route::post('edit/adduser','ProfileUserController@adduser')->name('edit.adduser');
});







Route::namespace('Admin')->prefix('/')->middleware(['auth','auth.useractive','verified'])->name('user.')->group(function(){
    Route::resource('editprofile','MakeProfile');


});



Route::namespace('Admin')->prefix('/')->middleware(['auth','auth.useractive','verified'])->name('user.')->group(function(){
    Route::resource('changepass','changepwController');

});












Route::namespace('Admin')->prefix('/')->middleware(['auth','auth.admin','verified'])->name('admin.')->group(function(){
    Route::resource('users','UserController');
     Route::delete('users/deleted/{id}','UserController@deleted')->name('deleteUser');

        Route::get('users/deleteuser{id}','UserController@deleteuser')->name('users.deleteuser');

       Route::get('office','ApplicationsStaffController@viewOffice')->name('office');
        Route::post('addoffice/create{id}','ApplicationsStaffController@addOffice')->name('addOffice');
       Route::get('office/editoffice{id}','ApplicationsStaffController@editOffice')->name('editOffice');
       Route::post('office/updateoffice{id}','ApplicationsStaffController@updateOffice')->name('updateOffice');
       Route::delete('office/deleteoffice{id}','ApplicationsStaffController@deleteOffice')->name('deleteOffice');





});

Route::namespace('Admin')->prefix('/')->middleware(['auth','auth.admin','verified'])->name('staff.')->group(function(){
    Route::resource('user','StaffController');

});


Route::namespace('Admin')->prefix('/')->middleware(['auth','auth.userup','verified'])->name('user.')->group(function(){
    // Route::resource('applicant','SubmittedApplicationsController');
    Route::post('applicant/storeApplication{id}','ApplicationController@storeApplication')->name('storeApplication');
     Route::get('applicant/edit/{id}','SubmittedApplicationsController@edit')->name('applicant.edit');
    Route::get('applicant/delete/{id}','SubmittedApplicationsController@delete')->name('applicant.delete');
});

Route::namespace('Admin')->prefix('/')->middleware(['auth','auth.userup','verified'])->name('user.')->group(function(){
    Route::resource('apply','ApplicationsUserController');
    //formal-education
    Route::get('education','ApplicationController@education')->name('education');
    Route::get('addeducation','ApplicationController@addeducation')->name('addeducation');
    Route::post('education/storeFormalEducation{id}','ApplicationController@storeFormalEducation')->name('storeFormalEducation');
    Route::post('education/updateFormalEducation{id}','ApplicationController@updateFormalEducation')->name('updateFormalEducation');
    Route::delete('education/deleteFormalEducation{id}','ApplicationController@deleteFormalEducation')->name('deleteFormalEducation');
    Route::get('education/editformaleducation/{id}','ApplicationController@editFormalEducation')->name('education.edit');
    //non-formal-education
    Route::get('non-formal-education','ApplicationController@nformaleducation')->name('non-formal-education');
    Route::post('non-formal-education/storenonFormalEducation{id}','ApplicationController@storenonFormalEducation')->name('storenonFormalEducation');
    Route::get('non-formal-education/editnonformaleducation/{id}','ApplicationController@editnonFormalEducation')->name('editnonFormalEducation');
    Route::post('non-formal-education/updatenonFormalEducation{id}','ApplicationController@updatenonFormalEducation')->name('updatenonFormalEducation');
    Route::delete('non-formal-education/deletenonFormalEducation{id}','ApplicationController@deletenonFormalEducation')->name('deletenonFormalEducation');
    //certification
    Route::get('certificationexam','ApplicationController@certificationexam')->name('certificationexam');
    Route::post('certificationexam/storeCertificationExam{id}','ApplicationController@storeCertificationExam')->name('storeCertificationExam');
     Route::get('certificationexam/editcertificationexam/{id}','ApplicationController@editCertificationExam')->name('editCertificationExam');
    Route::delete('certificationexam/deleteCertificationExam{id}','ApplicationController@deleteCertificationExam')->name('deleteCertificationExam');
    Route::post('certificationexam/updateCertificationExam{id}','ApplicationController@updateCertificationExam')->name('updateCertificationExam');
    //LICENSURE
    Route::get('licensure','ApplicationController@licensure')->name('licensure');
    Route::post('licensure/storeLicensureExam{id}','ApplicationController@storeLicensureExam')->name('storeLicensureExam');
    Route::get('licensure/editlicensureexam{id}','ApplicationController@editLicensureExam')->name('editLicensureExam');
    Route::post('licensure/updateLicensureExam{id}','ApplicationController@updateLicensureExam')->name('updateLicensureExam');
    Route::delete('licensure/deleteLicensureExam{id}','ApplicationController@deleteLicensureExam')->name('deleteLicensureExam');
    //WORKEXPERIENCE
    Route::get('workexperience','ApplicationController@workexperience')->name('workexperience');
    Route::get('workexperienceform','ApplicationController@workexperienceform')->name('workexperienceform');
    Route::post('workexperience/storeWorkExperience{id}','ApplicationController@storeWorkExperience')->name('storeWorkExperience');
    Route::get('workexperience/editworkexperience{id}','ApplicationController@editWorkExperience')->name('editWorkExperience');
    Route::post('workexperience/updateWorkExperience{id}','ApplicationController@updateWorkExperience')->name('updateWorkExperience');
    Route::delete('workexperience/deleteWorkExperience{id}','ApplicationController@deleteWorkExperience')->name('deleteWorkExperience');
     Route::get('editworkexperienceform{id}','ApplicationController@editworkexperienceform')->name('editworkexperienceform');
    //AWARDS
    Route::get('awards','ApplicationController@awards')->name('awards');
    Route::post('awards/storeAwards{id}','ApplicationController@storeAwards')->name('storeAwards');
    Route::get('awards/editawards{id}','ApplicationController@editAwards')->name('editAwards');
    Route::post('awards/updateAwards{id}','ApplicationController@updateAwards')->name('updateAwards');
    Route::delete('awards/deleteAwards{id}','ApplicationController@deleteAwards')->name('deleteAwards');
    //CREATIVEWORK
    Route::get('creative-works','ApplicationController@creativeworks')->name('creative-works');
    Route::post('creative-works/storeCreativeWorks{id}','ApplicationController@storeCreativeWorks')->name('storeCreativeWorks');
    Route::get('creative-works/editcreativeworks{id}','ApplicationController@editCreativeWorks')->name('editCreativeWorks');
    Route::post('creative-works/updateCreativeWorks{id}','ApplicationController@updateCreativeWorks')->name('updateCreativeWorks');
    Route::delete('creative-works/deleteCreativeWorks{id}','ApplicationController@deleteCreativeWorks')->name('deleteCreativeWorks');
    //HOBBY
    Route::get('hobbies','ApplicationController@hobbies')->name('hobbies');
    Route::post('hobbies/storeHobbies{id}','ApplicationController@storeHobbies')->name('storeHobbies');
    Route::get('hobbies/edithobbies{id}','ApplicationController@editHobbies')->name('editHobbies');
    Route::post('hobbies/updateHobbies{id}','ApplicationController@updateHobbies')->name('updateHobbies');
    Route::delete('hobbies/deleteHobbies{id}','ApplicationController@deleteHobbies')->name('deleteHobbies');
    //SPECIALSKILLS
    Route::get('specialskills','ApplicationController@specialskills')->name('specialskills');
    Route::post('specialskills/storeSpecialSkills{id}','ApplicationController@storeSpecialSkills')->name('storeSpecialSkills');
    Route::get('specialskills/editspecialskills{id}','ApplicationController@editSpecialSkills')->name('editSpecialSkills');
    Route::post('specialskills/updateSpecialSkills{id}','ApplicationController@updateSpecialSkills')->name('updateSpecialSkills');
    Route::delete('specialskills/deleteSpecialSkills{id}','ApplicationController@deleteSpecialSkills')->name('deleteSpecialSkills');
    //WORK ACTIVITY
    Route::get('workactivity','ApplicationController@workactivity')->name('workactivity');
    Route::post('workactivity/storeWorkActivity{id}','ApplicationController@storeWorkActivity')->name('storeWorkActivity');
    Route::get('workactivity/editworkactivity{id}','ApplicationController@editWorkActivity')->name('editWorkActivity');
    Route::post('workactivity/updateWorkActivity{id}','ApplicationController@updateWorkActivity')->name('updateWorkActivity');
    Route::delete('workactivity/deleteWorkActivity{id}','ApplicationController@deleteWorkActivity')->name('deleteWorkActivity');
    //VOLUNTEER
    Route::get('volunteer','ApplicationController@volunteer')->name('volunteer');
    Route::post('volunteer/storeVolunteer{id}','ApplicationController@storeVolunteer')->name('storeVolunteer');
    Route::get('volunteer/editvolunteer{id}','ApplicationController@editVolunteer')->name('editVolunteer');
    Route::post('volunteer/updateVolunteer{id}','ApplicationController@updateVolunteer')->name('updateVolunteer');
    Route::delete('volunteer/deleteVolunteer{id}','ApplicationController@deleteVolunteer')->name('deleteVolunteer');
    //TRAVELS
    Route::get('travels','ApplicationController@travels')->name('travels');
    Route::post('travels/storeTravels{id}','ApplicationController@storeTravels')->name('storeTravels');
    Route::get('travels/edittravels{id}','ApplicationController@editTravels')->name('editTravels');
    Route::post('travels/updateTravels{id}','ApplicationController@updateTravels')->name('updateTravels');
    Route::delete('travels/deleteTravels{id}','ApplicationController@deleteTravels')->name('deleteTravels');
    //ORGANIZATION
    Route::get('organization','ApplicationController@organization')->name('organization');
    Route::post('organization/storeOrganization{id}','ApplicationController@storeOrganization')->name('storeOrganization');
    Route::get('organization/editorganization{id}','ApplicationController@editOrganization')->name('editOrganization');
    Route::post('organization/updateOrganization{id}','ApplicationController@updateOrganization')->name('updateOrganization');
    Route::delete('organization/deleteOrganization{id}','ApplicationController@deleteOrganization')->name('deleteOrganization');
    //ENGAGEMENT
    Route::get('engagement','ApplicationController@engagement')->name('engagement');
    Route::post('engagement/storeEngagement{id}','ApplicationController@storeEngagement')->name('storeEngagement');
    Route::get('engagement/editengagement{id}','ApplicationController@editEngagement')->name('editEngagement');
    Route::post('engagement/updateEngagement{id}','ApplicationController@updateEngagement')->name('updateEngagement');
    Route::delete('engagement/deleteEngagement{id}','ApplicationController@deleteEngagement')->name('deleteEngagement');
    //COMMUNITY INVOLVEMENT
    Route::get('community','ApplicationController@community')->name('community');
    Route::post('community/storeCommunity{id}','ApplicationController@storeCommunity')->name('storeCommunity');
    Route::get('community/editcommunity{id}','ApplicationController@editCommunity')->name('editCommunity');
    Route::post('community/updateCommunity{id}','ApplicationController@updateCommunity')->name('updateCommunity');
    Route::delete('community/deleteCommunity{id}','ApplicationController@deleteCommunity')->name('deleteCommunity');
    Route::post('community/storeNarrative{id}','ApplicationController@storeNarrative')->name('storeNarrative');
    Route::get('community/editnarrative{id}','ApplicationController@editnarrative')->name('editNarrative');
    Route::post('community/updateNarrative{id}','ApplicationController@updateNarrative')->name('updateNarrative');
    //ETEEAP-PLANS
    Route::get('plans','ApplicationController@plans')->name('plans');
    Route::get('plans-form','ApplicationController@plansform')->name('plans-form');
    Route::get('edit-plans-form','ApplicationController@editplansform')->name('edit-plans-form');
    Route::post('plans/storePlans{id}','ApplicationController@storePlans')->name('storePlans');
    //ADDITIONAL DOCUMENT
    Route::get('documents','ApplicationController@documents')->name('documents');
    Route::post('documents/storeDocuments{id}','ApplicationController@storeDocuments')->name('storeDocuments');
    Route::get('documents/editdocuments{id}','ApplicationController@editDocuments')->name('editDocuments');
    Route::post('documents/updateDocuments{id}','ApplicationController@updateDocuments')->name('updateDocuments');
    Route::delete('documents/deleteDocuments{id}','ApplicationController@deleteDocuments')->name('deleteDocuments');
    //APPLICATION
    Route::get('userapplication','ApplicationController@userapplication')->name('userapplication');
      Route::get('userapplication/remark{id}','ApplicationController@remark')->name('Remark');



});


Route::namespace('Admin')->prefix('/')->middleware(['auth','auth.staff','verified'])->name('staff.')->group(function(){
    Route::resource('applicants','ApplicationsStaffController');
    Route::delete('applicants/delete/{id}','ApplicationsStaffController@delete')->name('applicants.delete');
    Route::post('applicants/addremarks','ApplicationsStaffController@addremarks')->name('applicants.addremarks');

//ADMIN SIDE

//APPLICATION
   Route::get('applications/view{id}','ApplicationsStaffController@viewApplication')->name('viewApplication');
  Route::get('community/viewnarrative{id}','ApplicationsStaffController@viewnarrative')->name('viewNarrative');
   Route::get('workexperience/viewworkexperience{id}','ApplicationsStaffController@viewWorkExperience')->name('viewWorkExperience');
    Route::post('applications/updateApplication{id}','ApplicationsStaffController@updateApplication')->name('updateApplication');
    Route::post('applications/rollbackApplication{id}','ApplicationsStaffController@rollbackApplication')->name('rollbackApplication');
     Route::get('engagement/viewnarrativeeng{id}','ApplicationsStaffController@viewnarrativeeng')->name('viewNarrativeeng');   
  Route::get('applications/remark{id}','ApplicationsStaffController@remark')->name('Remark');
  Route::get('applications/addremarkx{id}','ApplicationsStaffController@addremarkx')->name('addRemarkx');
  Route::post('applications/addremarks{id}','ApplicationsStaffController@addremarks')->name('addRemarks');
    Route::post('applications/forwardApplication{id}','ApplicationsStaffController@forwardApplication')->name('forwardApplication');
    Route::get('mail','ApplicationsStaffController@mail')->name('Mailer');

    //OFFICE

  

    
});

Route::namespace('Admin')->prefix('/')->middleware(['auth','auth.staff','verified'])->name('staff.')->group(function(){
    Route::resource('applicants2','ApplicationsStaffController2');
    Route::delete('applicants2/delete/{id}','ApplicationsStaffController2@delete')->name('applicants2.delete');
    Route::post('applicants2/addremarks','ApplicationsStaffController2@addremarks')->name('applicants2.addremarks');
});












        










Route::namespace('Admin')->prefix('/')->middleware(['auth','auth.userup','verified'])->name('user.')->group(function(){
    // Route::resource('port','ApplicationController');


});



Route::namespace('Admin')->prefix('/')->middleware(['auth','auth.admin','verified'])->name('admin.')->group(function(){
    Route::resource('course','AddCourseController');
    Route::get('course/edit/{id}','AddCourseController@edit')->name('course.edit');
    Route::post('course/create','AddCourseController@create')->name('course.create');
    Route::delete('course/delete/{id}','AddCourseController@delete')->name('course.delete');
});

Route::namespace('Admin')->prefix('/')->middleware(['auth','auth.staff','verified'])->name('admin.')->group(function(){
    Route::resource('reports','GenerateController');
    Route::get('reports/edit/{id}','GenerateController@edit')->name('reports.edit');
    Route::post('reports/create','GenerateController@create')->name('reports.create');
     Route::post('reports/show','GenerateController@show')->name('reports.show');
    Route::delete('reports/delete/{id}','GenerateController@delete')->name('reports.delete');
    Route::get('appForm/Application_Form/{id}','PDFController@appFormPDF')->name('appForm.exportpdf');
    Route::get('/appForm/ETEEAP_Additional_Requirement/{id}', 'PDFController@addReqtPDF')->name('additionalForm.exportpdf');

        //route for generating the Narrative_Report into a PDF
        Route::get('/appForm/Narrative_Report/{id}', 'PDFController@narrRepPDF')->name('narrative.exportpdf');

        //route for generating the Curriculum_Vitae into a PDF
        Route::get('/appForm/Curriculum_Vitae/{id}', 'PDFController@cvPDF')->name('curriculumV.exportpdf');

});

// Route::get('password/email', 'Auth\ResetPasswordController@getEmail');
// Route::post('password/email', 'Auth\ResetPasswordController@postEmail');

// // Password reset routes...
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@getReset');
// Route::post('password/reset', 'Auth\ResetPasswordController@postReset');





//new gui
/* ---------------------------------------------------------------------------------------------------------------------------------------- */
    //profile
        //personal info
            // //viewing profile GUI
            // Route::get('personal-info', function () {
            //     return view('profile2/personal-info/view');
            // })->name('personal-info');
            // //editing profile GUI
            // Route::get('personal-info/edit', function () {
            //     return view('profile2/personal-info/edit');
            // })->name('personal-info/edit');
            // //creating profile GUI
            // Route::get('create', function () {
            //     return view('profile2/personal-info/create');
            // })->name('create');

        //plans
            // Route::get('plans', function () {
            //     return view('profile2/plans/view');
            // })->name('plans');
            // Route::get('plans-form', function () {
            //     return view('profile2/plans/plans-form');
            // })->name('plans-form');

        //education
            //formal education
                // Route::get('formal-education', function () {
                //     return view('profile2/education/formal/view');
                // })->name('formal-education');
                
                // Route::get('formal-education/create', function () {
                //     return view('profile2/education/formal/create');
                // })->name('formal-education/create');

            //nonformal education
                // Route::get('nonformal-education', function () {
                //     return view('profile2/education/nonformal/view');
                // })->name('nonformal-education');

                // Route::get('nonformal-education/edit', function () {
                //     return view('profile2/education/nonformal/edit');
                // })->name('nonformal-education/edit');

                // Route::get('nonformal-education/create', function () {
                //     return view('profile2/education/nonformal/create');
                // })->name('nonformal-education/create');

            //certification
                // Route::get('certification', function () {
                //     return view('profile2/education/certification/view');
                // })->name('certification');

            //national exams
                // Route::get('national-exams', function () {
                //     return view('profile2/education/national/view');
                // })->name('national-exams');
        
        //work experience
            // Route::get('work', function () {
            //     return view('profile2/work/index');
            // })->name('create-work');
            // Route::get('work-form', function () {
            //     return view('profile2/work/work-form');
            // })->name('work-form');
            // Route::get('work/view', function () {
            //     return view('profile2/work/view');
            // })->name('work/view');
        
        // //awards
        //     Route::get('awards', function () {
        //         return view('profile2/awards/view');
        //     })->name('awards');
        //     Route::get('awards/create', function () {
        //         return view('profile2/awards/create');
        //     })->name('awards/create');

        // //creative works
        //     Route::get('creative-works', function () {
        //         return view('profile2/creative-works/view');
        //     })->name('creative-works');

        //lifelong
            //hobbies
                // Route::get('hobbies', function () {
                //     return view('profile2/lifelong/hobbies/view');
                // })->name('hobbies');
            //special skills
                // Route::get('special-skills', function () {
                //     return view('profile2/lifelong/special-skills/view');
                // })->name('special-skills');
            //travels
                // Route::get('travels', function () {
                //     return view('profile2/lifelong/travels/view');
                // })->name('travels');
             //volunteer
            //     Route::get('volunteer', function () {
            //         return view('profile2/lifelong/volunteer/view');
            //     })->name('volunteer');
            //work-activity
                // Route::get('work-activity', function () {
                //     return view('profile2/lifelong/work-activity/view');
                // })->name('work-activity');

        //organization membership
            // Route::get('organization', function () {
            //     return view('profile2/organization/view');
            // })->name('organization');

        //engagements
            // Route::get('engagements', function () {
            //     return view('profile2/engagements/view');
            // })->name('engagements');

        //community
            // Route::get('community', function () {
            //     return view('profile2/community/view');
            // })->name('community');


    //application form
        // Route::get('remarks', function () {
        //     return view('application/remarks');
        // })->name('remarks');

    //additional documents
        // Route::get('additional-documents', function () {
        //     return view('additional/view');
        // })->name('additional-documents');
        // Route::get('additional-documents/create', function () {
        //     return view('additional/create');
        // })->name('additional-documents/create');

    // //knockout questions
    //     Route::get('pre-assessment', function () {
    //         return view('knockout');
    //     })->name('pre-assessment');

    //     Route::get('portfolio', function () {
    //         return view('portfolio');
    //     })->name('portfolio');
/* ---------------------------------------------------------------------------------------------------------------------------------------- */


//route for viewing the application form index
Route::get('/appForm', 'PDFController@index');

//route for generating the Application_Form into a PDF
Route::get('/appForm/Application_Form', 'PDFController@appFormPDF');

//route for generating the ETEEAP_Additional_Requirement into a PDF
Route::get('/appForm/ETEEAP_Additional_Requirement', 'PDFController@addReqtPDF');

//route for generating the Narrative_Report into a PDF
Route::get('/appForm/Narrative_Report', 'PDFController@narrRepPDF');

//route for generating the Curriculum_Vitae into a PDF
Route::get('/appForm/Curriculum_Vitae', 'PDFController@cvPDF');

//route for generating the List_of_Applicants into a PDF
Route::get('/appForm/List_of_Applicants', 'PDFController@applicantsPDF');
/* ---------------------------------------------------------------------------------------------------------------------------------------- */
