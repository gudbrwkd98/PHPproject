<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licensure extends Model
{
     protected $fillable =['id','licenseTitle','file','user_id','expiryDate'];
   // protected $guarded =[];

   


   	public function users(){
       return $this->belongsTo(User::class);
   }
}
