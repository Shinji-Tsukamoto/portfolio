<?php

use Illuminate\Database\Seeder; 
use Illuminate\Support\Facades\DB;
use App\Profile;

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        $profile =  new Profile;

        $profile->id = 1;
        $profile->user_id = 1;
        $profile->gender = 'man';
        $profile->introduction = 'よろしく';
        $profile->save();
    }

}
