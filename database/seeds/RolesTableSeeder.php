<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Role::truncate();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'eteeap']);
        Role::create(['name' => 'dean']);
        Role::create(['name' => 'user']);
        


    }
}
