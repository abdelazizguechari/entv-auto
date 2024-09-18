<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MissionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('missions')->insert([
            [
                'type' => 'transportation',
                'name' => 'Mission 1',
                'mission_start' => Carbon::now()->subDays(10)->toDateTimeString(),
                'mission_end' => Carbon::now()->subDays(9)->toDateTimeString(),
                'status' => 'completed',
                'fuel_tokens' => 50,
                'fuel_tokens_used' => 20,
                'distance' => 100,
                'car_id' => 'in147',
                'driver_id' => 1,
            ],
            [
                'type' => 'transportation',
                'name' => 'Mission 2',
                'mission_start' => Carbon::now()->subDays(5)->toDateTimeString(),
                'mission_end' => Carbon::now()->subDays(4)->toDateTimeString(),
                'status' => 'ongoing',
                'fuel_tokens' => 60,
                'fuel_tokens_used' => 30,
                'distance' => 150,
                'car_id' => 'jw161',
                'driver_id' => 4 ,
            ],
            [
                'type' => 'mission',
                'name' => 'Mission 3',
                'mission_start' => Carbon::now()->subDays(1)->toDateTimeString(),
                'mission_end' => Carbon::now()->toDateTimeString(),
                'status' => 'scheduled',
                'fuel_tokens' => 70,
                'fuel_tokens_used' => 0,
                'distance' => 200,
                'car_id' => 'si482',
                'driver_id' => 3,
            ],
        ]);
    }
}
