<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

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
use App\Mail\SendMailable;
use Mail;
use App\Mail\DemoEmail;
use App\Mail\ReceivedEmail;
use App\Mail\FailedEmail;


use DB;
use Illuminate\Notifications\Notification;
use App\Upload;
use Validator;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\http\Traits;
use Illuminate\Notifications\Messages\MailMessage;
use illuminate\contract\Mailer;

class FailedEmail extends Mailable
{
    use Queueable, SerializesModels;
     
    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $demo;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      


     return $this->view('portfolio/mails/failedemail')
      ->subject("Application Failed!")
      

                    
  
      ;
    }
}