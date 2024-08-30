<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mission;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MissionsTableSeeder extends Seeder
{
    // File: database/seeders/MissionsTableSeeder.php
    public function run()
    {
        $faker = Faker::create();

        // Retrieve all car immatriculations and driver IDs from the respective tables
        $carImmatriculations = DB::table('cars')->pluck('immatriculation')->toArray();
        $driverIds = DB::table('driver')->pluck('id')->toArray();

        // Ensure there are enough car immatriculations and driver IDs to assign to missions
        if (count($carImmatriculations) < 10 || count($driverIds) < 10) {
            throw new \Exception('Not enough cars or drivers to assign to missions.');
        }

        // Insert multiple mission records
        foreach (range(1, 10) as $index) {
            Mission::create([
                'type' => $faker->randomElement(['transportation', 'mission', 'evenements']),
                'name' => $faker->word,
                'description' => $faker->sentence,
                'mission_start' => $faker->dateTime,
                'mission_end' => $faker->dateTime,
                'crew_leader' => $faker->name,
                'crew_name' => $faker->word,
                'status' => $faker->randomElement(['ongoing', 'scheduled', 'completed']),
                'fuel_tokens' => $faker->numberBetween(0, 100),
                'fuel_tokens_used' => $faker->numberBetween(0, 100),
                'distance' => $faker->numberBetween(0, 1000),
                'car_id' => $faker->randomElement($carImmatriculations), // Use immatriculation
                'driver_id' => $faker->randomElement($driverIds),
            ]);
        }
    }
}
