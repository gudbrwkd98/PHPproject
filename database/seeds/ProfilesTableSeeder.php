<?php

use Illuminate\Database\Seeder;
use App\Profile;
class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::truncate();

        Profile::create(['user_id'=>1,'firstName' => 'Admin','middleName' => 'M','lastName' => 'Admin','phone' => '1','address' => 'test','photo' =>'','civil_status'=>'Single','citizenship'=>'Filipino','gender'=>'Male','birth_place'=>'Baguio','language'=>'language']);
        Profile::create(['user_id'=>2,'firstName' => 'Staff','middleName' => 'M','lastName' => 'Admin','phone' => '1','address' => 'test','photo' =>'','civil_status'=>'Single','citizenship'=>'Filipino','gender'=>'Male','birth_place'=>'Baguio','language'=>'language']);
        Profile::create(['user_id'=>3,'firstName' => 'Dean','middleName' => 'M','lastName' => 'Admin','phone' => '1','address' => 'test','photo' =>'','civil_status'=>'Single','citizenship'=>'Filipino','gender'=>'Male','birth_place'=>'Baguio','language'=>'language']);
        Profile::create(['user_id'=>4,'firstName' => 'User','middleName' => 'M','lastName' => 'Admin','phone' => '1','address' => 'test','photo' =>'','civil_status'=>'Single','citizenship'=>'Filipino','gender'=>'Male','birth_place'=>'Baguio','language'=>'language']);
        


    }
}
