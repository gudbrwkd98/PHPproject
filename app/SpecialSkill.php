<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialSkill extends Model
{
protected $fillable =['id','skillName','user_id','file'];
   // protected $guarded =[];

   


   	public function users(){
       return $this->belongsTo(User::class);
   }
}
