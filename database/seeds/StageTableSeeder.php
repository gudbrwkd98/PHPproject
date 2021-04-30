<?php

use Illuminate\Database\Seeder;
use App\Stage;
use App\User;
class StageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Stage::truncate();
        Stage::create(['stage' => 'Initial Assessment']);
        Stage::create(['stage' => 'Second Assessment']);
        Stage::create(['stage' => 'Admission']);
        Stage::create(['stage' => 'Third Assessment']);

        Stage::create(['stage' => 'Enrollment']);
        Stage::create(['stage' => 'Completion of Enhancement Program']);
        Stage::create(['stage' => 'Final Assessment']);
        Stage::create(['stage' => 'Process Prior Graduation']);
        Stage::create(['stage' => 'Graduation Rites']);
        Stage::create(['stage' => 'Completed']);

        


    }
}
