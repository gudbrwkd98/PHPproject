<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $fillable =['id','hobbyTitle','user_id','ratingofSkill','file'];
   // protected $guarded =[];

   


   	public function users(){
       return $this->belongsTo(User::class);
   }
}
