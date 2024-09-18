<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mission;

class MissionSeeder extends Seeder
{
    public function run()
    {
        // Create 100 missions with random dates
        Mission::factory()->count(100)->create();
    }
}
