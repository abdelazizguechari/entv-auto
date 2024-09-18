<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CarsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Insert multiple records
        foreach (range(1, 50) as $index) {
            DB::table('cars')->insert([
                'immatriculation' => $faker->unique()->bothify('??###'), // Unique registration number
                'marque' => $faker->word(),
                'modele' => $faker->word(),
                'etat' => $faker->word(),
                'kilometrage' => $faker->numberBetween(0, 200000),
                'datem' => $faker->word(),
                'next_assurance_date' => $faker->date(),
                'next_control_date' => $faker->date(),
                'assurance_type' => $faker->randomElement(['Responsabilité Civile', 'Tous Risques', 'Assurance Collision','Protection des Personnes']),
                'couleur' => $faker->safeColorName(),
                'type_carburant' => $faker->randomElement(['Petrol', 'Diesel', 'Electric']),
                'transmission' => $faker->randomElement(['Manual', 'Automatic']),
                'puissance' => $faker->numberBetween(50, 500),
                'nombre_portes' => $faker->numberBetween(2, 5),
                'nombre_places' => $faker->numberBetween(2, 7),
                'description' => $faker->sentence(),
                'prix' => $faker->randomFloat(2, 1000, 50000),
                'date_achat' => $faker->date(),
                'proprietaire' => $faker->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
