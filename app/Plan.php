<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
   protected $fillable =['id','coreValues','priority1','priority2','priority3','sgop','timePlan','accreditationPlan','plantoComplete','essay','user_id'];
   // protected $guarded =[];

  
   


   	public function users(){
       return $this->belongsTo(User::class);
   }
}
