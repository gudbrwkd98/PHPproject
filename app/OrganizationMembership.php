<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationMembership extends Model
{
      protected $fillable =['id','type','organization','startYear','endYear','duration','position','user_id'];
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
