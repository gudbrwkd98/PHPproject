<?php

namespace App;
use App\User;
use Carbon\Carbon;
use eloq;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable =['id','firstName','middleName','lastName','bday','birthPlace','phone','address','zipcode','photo',];

    public function getAgeAttribute()
    {
        
        return Carbon::parse($this->attributes['bday'])->age;
    }

	public function users(){
       return $this->belongsTo(User::class);

    }
}
