<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
       protected $fillable =['id','user_id','position','endYear','startYear','companyName','supervisorName','reason','file','terms','companyAddress'
   								,'supervisorDesignation','functions','ref1','ref2','ref3','position1','position2','position3','contact1','contact2','contact3'
   								,'email1','email2','email3','duration'];
    // protected $guarded =[];
	
      public function getAgeAttribute()
    {
        
        return Carbon::parse($this->attributes['startYear'])->startYear;
        return Carbon::parse($this->attributes['endYear'])->endYear;

    }

    	public function users(){
       return $this->belongsTo(User::class);
   }
}
