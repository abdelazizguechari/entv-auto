<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CarsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cars')->insert([
            ['immatriculation' => 'ABC1234', 'marque' => 'Toyota', 'modele' => 'Corolla', 'etat' => 'new', 'kilometrage' => 10000, 'couleur' => 'Blue', 'type_carburant' => 'Petrol', 'nombre_places' => 5, 'description' => 'Reliable sedan', 'prix' => 20000.00, 'date_achat' => Carbon::now()->subYears(1), 'created_at' => now(), 'updated_at' => now()],
            ['immatriculation' => 'DEF5678', 'marque' => 'Honda', 'modele' => 'Civic', 'etat' => 'used', 'kilometrage' => 50000, 'couleur' => 'Red', 'type_carburant' => 'Diesel', 'nombre_places' => 5, 'description' => 'Compact car', 'prix' => 15000.00, 'date_achat' => Carbon::now()->subYears(2), 'created_at' => now(), 'updated_at' => now()],
            ['immatriculation' => 'GHI9012', 'marque' => 'Ford', 'modele' => 'Focus', 'etat' => 'new', 'kilometrage' => 15000, 'couleur' => 'Black', 'type_carburant' => 'Petrol', 'nombre_places' => 5, 'description' => 'Sporty hatchback', 'prix' => 22000.00, 'date_achat' => Carbon::now()->subMonths(6), 'created_at' => now(), 'updated_at' => now()],
            ['immatriculation' => 'JKL3456', 'marque' => 'Chevrolet', 'modele' => 'Malibu', 'etat' => 'used', 'kilometrage' => 30000, 'couleur' => 'White', 'type_carburant' => 'Petrol', 'nombre_places' => 5, 'description' => 'Comfortable sedan', 'prix' => 18000.00, 'date_achat' => Carbon::now()->subYears(1), 'created_at' => now(), 'updated_at' => now()],
            ['immatriculation' => 'MNO7890', 'marque' => 'Nissan', 'modele' => 'Altima', 'etat' => 'new', 'kilometrage' => 8000, 'couleur' => 'Silver', 'type_carburant' => 'Diesel', 'nombre_places' => 5, 'description' => 'Stylish sedan', 'prix' => 21000.00, 'date_achat' => Carbon::now()->subMonths(8), 'created_at' => now(), 'updated_at' => now()],
            ['immatriculation' => 'PQR1234', 'marque' => 'Hyundai', 'modele' => 'Elantra', 'etat' => 'used', 'kilometrage' => 40000, 'couleur' => 'Green', 'type_carburant' => 'Petrol', 'nombre_places' => 5, 'description' => 'Economical car', 'prix' => 14000.00, 'date_achat' => Carbon::now()->subYears(3), 'created_at' => now(), 'updated_at' => now()],
            ['immatriculation' => 'STU5678', 'marque' => 'Mazda', 'modele' => '3', 'etat' => 'new', 'kilometrage' => 12000, 'couleur' => 'Yellow', 'type_carburant' => 'Petrol', 'nombre_places' => 5, 'description' => 'Sporty and reliable', 'prix' => 23000.00, 'date_achat' => Carbon::now()->subMonths(4), 'created_at' => now(), 'updated_at' => now()],
            ['immatriculation' => 'VWX9012', 'marque' => 'Subaru', 'modele' => 'Impreza', 'etat' => 'used', 'kilometrage' => 35000, 'couleur' => 'Orange', 'type_carburant' => 'Diesel', 'nombre_places' => 5, 'description' => 'All-wheel drive', 'prix' => 17000.00, 'date_achat' => Carbon::now()->subYears(2), 'created_at' => now(), 'updated_at' => now()],
            ['immatriculation' => 'YZA3456', 'marque' => 'Kia', 'modele' => 'Optima', 'etat' => 'new', 'kilometrage' => 6000, 'couleur' => 'Purple', 'type_carburant' => 'Petrol', 'nombre_places' => 5, 'description' => 'Luxurious sedan', 'prix' => 25000.00, 'date_achat' => Carbon::now()->subMonths(2), 'created_at' => now(), 'updated_at' => now()],
            ['immatriculation' => 'BCD7890', 'marque' => 'Volkswagen', 'modele' => 'Jetta', 'etat' => 'used', 'kilometrage' => 45000, 'couleur' => 'Brown', 'type_carburant' => 'Diesel', 'nombre_places' => 5, 'description' => 'Reliable compact', 'prix' => 16000.00, 'date_achat' => Carbon::now()->subYears(2), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}