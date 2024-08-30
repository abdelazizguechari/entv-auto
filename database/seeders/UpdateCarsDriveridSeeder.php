<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateCarsDriverIdSeeder extends Seeder
{
    public function run()
    {
        // Retrieve all drivers with their assigned cars
        $drivers = DB::table('driver')->get();

        // Update the cars table with the driver_id
        foreach ($drivers as $driver) {
            DB::table('cars')
                ->where('immatriculation', $driver->voiture_id)
                ->update(['driver_id' => $driver->id]);
        }
    }
}
