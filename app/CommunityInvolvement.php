<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CommunityNarrative;



class CommunityInvolvement extends Model
{
     protected $fillable =['id','title','involvement','startYear','endYear','venue','organizer','user_id','duration','what1','where1','when1','overview'];
   // protected $guarded =[];

      public function getAgeAttribute()
    {
        
        return Carbon::parse($this->attributes['startYear'])->startYear;
        return Carbon::parse($this->attributes['endYear'])->endYear;

    }

   


   	public function users(){
       return $this->belongsTo(User::class);
}

public function communitynarratives(){
             return $this->belongsToMany(CommunityNarrative::class);
        }


}