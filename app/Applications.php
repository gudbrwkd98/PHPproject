<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Course;
class Applications extends Model
{
    protected $guarded =[];
    	
    public function users(){
    return $this->belongsTo(User::class);
	}
	 public function remarks(){
             return $this->belongsToMany(Remark::class);
        }

            public function courses(){
             return $this->belongsToMany(Course::class);
        }
   
}
