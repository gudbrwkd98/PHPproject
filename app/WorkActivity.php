<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkActivity extends Model
{
   protected $fillable =['id','activity','user_id','description','file'];
   // protected $guarded =[];

   


   	public function users(){
       return $this->belongsTo(User::class);
   }
}
