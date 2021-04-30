<?php

namespace App;
use App\User;
use eloq;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{

	 protected $fillable =['id','user_id','application_letter','application_form','resume','cert_of_emp','letter_of_recommendation','passport','psa','transcript','nbi','others'];

 	public function users(){
       return $this->belongsTo(User::class);
   }
}
