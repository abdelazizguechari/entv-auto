<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DriverSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Retrieve all immatriculation values from the cars table
        $carImmatriculations = DB::table('cars')->pluck('immatriculation')->toArray();

        // Ensure there are enough immatriculation values to assign to drivers
        if (count($carImmatriculations) < 10) {
            throw new \Exception('Not enough cars to assign to drivers.');
        }

        // Insert multiple driver records
        foreach (range(1, 10) as $index) {
            Driver::create([
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'assurance_num' => $faker->unique()->numerify('#########'),
                'permis_conduire' => $faker->unique()->bothify('???######'),
                'telephone' => $faker->phoneNumber,
                'num_cas_urgance' => $faker->phoneNumber,
                'nom_cas_urgance' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'status' => $faker->randomElement(['active', 'inactive']),
                'adresse' => $faker->address,
                'date_naissance' => $faker->date(),
                'photo' => $faker->imageUrl(),
                'voiture_id' => $carImmatriculations[$index - 1], // Assign an existing immatriculation
            ]);
        }
    }
}