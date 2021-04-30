<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
  protected $fillable =['id','purpose','learningExperience','user_id','location','file'];
   // protected $guarded =[];

   


   	public function users(){
       return $this->belongsTo(User::class);
   }
}
