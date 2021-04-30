<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NonFormalEducation extends Model
{
    //
     protected $fillable =['id','trainingProgram','certificateTitle','certifyingAgency','endYear','startYear','file','user_id','duration',''];

      public function getAgeAttribute()
    {
        
        return Carbon::parse($this->attributes['startYear'])->startYear;
        return Carbon::parse($this->attributes['endYear'])->endYear;

    }

    	public function users(){
       return $this->belongsTo(User::class);
   }
}
