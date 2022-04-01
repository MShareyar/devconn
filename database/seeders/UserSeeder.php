<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // UserProfile::truncate();

        User::factory(200)->create()->each(function($user){
            UserProfile::factory(1)->create(['user_id'=>$user->id]);

            Education::factory(rand(1,3))->create(['user_id'=>$user->id]);
            Experience::factory(rand(2,4))->create(['user_id'=>$user->id]);
        });
    }
}
