<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\Experience;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        UserProfile::truncate();
        Education::truncate();
        Experience::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        \App\Models\User::factory(1)->create(['is_admin' => 1,'email'=>'admin@admin.com']);
        $this->call(UserSeeder::class);
    }
}
