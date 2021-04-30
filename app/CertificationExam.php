<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificationExam extends Model
{
   protected $fillable =['id','certificateTitle','nameofAgency','addressofAgency','rating','startYear','file','user_id','expiryDate'];
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
