<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;
use App\Models\Carsm;
use Faker\Factory as Faker;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        
        $carIds = Carsm::pluck('immatriculation')->toArray();

 
        for ($i = 0; $i < 50; $i++) {
            Driver::create([
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'assurance_num' => $faker->unique()->bothify('ASS##??'),
                'permis_conduire' => $faker->unique()->bothify('PC##??'),
                'telephone' => $faker->phoneNumber,
                'num_cas_urgance' => $faker->phoneNumber,
                'nom_cas_urgance' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'status' => $faker->randomElement(['active', 'inactive']),
                'adresse' => $faker->address,
                'date_naissance' => $faker->date,
                'photo' => null, 
                'voiture_id' => $faker->randomElement($carIds), 
            ]);
        }
    }
}
