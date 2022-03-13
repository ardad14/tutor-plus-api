<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(30)->create();
        Announcement::factory()->count(30)->create();
        Skill::factory()->count(30)->create();
    }
}
