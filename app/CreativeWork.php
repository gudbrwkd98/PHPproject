<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreativeWork extends Model
{
     protected $fillable =['id','workTitle','user_id','workDescription','dateAccomplished','agencyName','agencyAddress'];
   // protected $guarded =[];

   


   	public function users(){
       return $this->belongsTo(User::class);
   }
}
