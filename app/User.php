<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\CanResetPassword;
use eloq;
use App\Profile;
use App\Certificates;
use App\Communities;
use App\Organizations;
use App\Pictures;
use App\Upload;
use App\FormalEducation;
use App\Applications;
use App\CertificationExam;
use App\Licensure;
use App\Award;
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


















use App\Notifications\ResetPassword as ResetPasswordNotification;



class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','name', 'hint'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role');

    }
    public function profiles()
{
    return $this->hasOne(Profile::class, 'user_id');
    // return $this->belongsToMany('App\Profile');

}
      
        public function application(){
             return $this->belongsToMany(Applications::class);
        }
        public function formaleducations(){
             return $this->belongsToMany(FormalEducation::class);
        }
        public function nonformaleducations(){
             return $this->belongsToMany(NonFormalEducation::class);
        }
        public function certificationexams(){
             return $this->belongsToMany(CertificationExam::class);
        }
        public function licensures(){
             return $this->belongsToMany(Licensure::class);
        }
         public function awards(){
             return $this->belongsToMany(Award::class);
        }
        public function creativeworks(){
             return $this->belongsToMany(CreativeWork::class);
        }
        public function hobbies(){
             return $this->belongsToMany(Hobby::class);
        }
        public function special_skills(){
             return $this->belongsToMany(Hobby::class);
        }
        public function work_activity(){
             return $this->belongsToMany(WorkActivity::class);
        }
        public function volunteer(){
             return $this->belongsToMany(Volunteer::class);
        }
        public function travels(){
             return $this->belongsToMany(Travel::class);
        }
        public function organization_membership(){
             return $this->belongsToMany(OrganizationMembership::class);
        }
        public function engagements(){
             return $this->belongsToMany(Engagement::class);
        }
        public function communityinvolvements(){
             return $this->belongsToMany(CommunityInvolvement::class);
        }
         public function plans(){
             return $this->belongsToMany(Plan::class);
        }
        public function documents(){
             return $this->belongsToMany(Document::class);
        }
        public function work_experiences(){
             return $this->belongsToMany(WorkExperience::class);
        }
         
         
       
   
   

   
    public function hasAnyRoles($roles){
            return null !== $this->roles()->whereIn('name',$roles)->first();

    }
    public function hasAnyRole($role){
            return null !== $this->roles()->where('name',$role)->first();

    }

}
