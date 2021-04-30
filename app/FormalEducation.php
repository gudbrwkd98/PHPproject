<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormalEducation extends Model
{
     protected $fillable =['id','schoolName','schoolAddress','yearGraduated','degree','transcript','user_id','schoolLvl'];
   // protected $guarded =[];

  


   	public function users(){
       return $this->belongsTo(User::class);
   }
}
