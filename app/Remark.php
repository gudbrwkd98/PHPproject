<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
   public function appremark(){
       return $this->belongsTo(Applications::class);
	}
}
