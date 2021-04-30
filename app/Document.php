<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
   protected $fillable =['id','title','file','user_id'];
   // protected $guarded =[];

  
   


   	public function users(){
       return $this->belongsTo(User::class);
   }
}
