<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Profile;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        
        $adminRole = Role::where ('name','admin')->first();
        $staffRole = Role::where ('name','eteeap')->first();
        $deanRole = Role::where ('name','dean')->first();
        $userRole = Role::where ('name','user')->first();

        $adminProfile = Profile::where ('firstName','admin')->first();
        $staffProfile = Profile::where ('firstName','staff')->first();
        $deanProfile = Profile::where ('firstName','dean')->first();
        $userProfile = Profile::where ('firstName','user')->first();




         
        $admin = User::create([
        	
        	'email' => 'admin@admin.com',
          'status' => 'active',
        	'password' => bcrypt('admin')

        ]);

        $staff = User::create([
        	
        	'email' => 'staff@staff.com',
          'status' => 'active',
        	'password' => bcrypt('staff')

        ]);

        $dean = User::create([
          
          'email' => 'dean@dean.com',
          'status' => 'active',
          'password' => bcrypt('dean')

        ]);

       $user = User::create([
        	
        	'email' => 'user@user.com',
          'status' => 'active',
        	'password' => bcrypt('user')

        ]);

      $admin->roles()->attach($adminRole);
      $staff->roles()->attach($staffRole);
      $dean->roles()->attach($deanRole);
      $user->roles()->attach($userRole);
      $admin->profiles()->attach($adminProfile);
      $staff->profiles()->attach($staffProfile);
      $dean->profiles()->attach($deanProfile);
      $user->profiles()->attach($userProfile);
    }
}
