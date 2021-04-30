<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityNarrative extends Model
{
    protected $fillable =['what1','where1','when1','id','overview'];
   // protected $guarded =[];

      

   


   	public function communityinvolvements(){
       return $this->belongsTo(CommunityInvolvement::class);
}
}
