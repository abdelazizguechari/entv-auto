<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Driver;

class DriverSeeder extends Seeder
{
    public function run()
    {
        Driver::create([
            'nom' => 'John',
            'prenom' => 'Doe',
            'assurance_num' => '123456789',
            'permis_conduire' => 'ABC12345',
            'telephone' => '0123456789',
            'num_cas_urgance' => '0987654321',
            'nom_cas_urgance' => 'Jane Doe',
            'email' => 'johndoe@example.com',
            'status' => 'active',
            'adresse' => '123 Main St',
            'date_naissance' => '1990-01-01',
            'photo' => 'path',
            'voiture_id' => 'XYZ98765',
        ]);

        // Add more entries as needed
    }
}
