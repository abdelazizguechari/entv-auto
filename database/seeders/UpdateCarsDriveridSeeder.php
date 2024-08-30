<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateCarsDriverIdSeeder extends Seeder
{
    public function run()
    {

        $drivers = DB::table('driver')->get();

        foreach ($drivers as $driver) {
            DB::table('cars')
                ->where('immatriculation', $driver->voiture_id)
                ->update(['driver_id' => $driver->id]);
        }
    }
}