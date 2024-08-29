<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DriversTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('drivers')->insert([
            ['first_name' => 'John', 'last_name' => 'Doe', 'license_number' => 'A1234567', 'license_expiry' => Carbon::now()->addYears(2), 'status' => 'on_mission', 'phone' => '1234567890', 'email' => 'john.doe@example.com', 'car_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['first_name' => 'Jane', 'last_name' => 'Smith', 'license_number' => 'B7654321', 'license_expiry' => Carbon::now()->addYears(2), 'status' => 'pending', 'phone' => '0987654321', 'email' => 'jane.smith@example.com', 'car_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['first_name' => 'Michael', 'last_name' => 'Johnson', 'license_number' => 'C2345678', 'license_expiry' => Carbon::now()->addYears(2), 'status' => 'on_leave', 'phone' => '2345678901', 'email' => 'michael.johnson@example.com', 'car_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['first_name' => 'Emily', 'last_name' => 'Davis', 'license_number' => 'D3456789', 'license_expiry' => Carbon::now()->addYears(2), 'status' => 'on_mission', 'phone' => '3456789012', 'email' => 'emily.davis@example.com', 'car_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['first_name' => 'James', 'last_name' => 'Wilson', 'license_number' => 'E4567890', 'license_expiry' => Carbon::now()->addYears(2), 'status' => 'pending', 'phone' => '4567890123', 'email' => 'james.wilson@example.com', 'car_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['first_name' => 'Olivia', 'last_name' => 'Taylor', 'license_number' => 'F5678901', 'license_expiry' => Carbon::now()->addYears(2), 'status' => 'on_leave', 'phone' => '5678901234', 'email' => 'olivia.taylor@example.com', 'car_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['first_name' => 'Liam', 'last_name' => 'Anderson', 'license_number' => 'G6789012', 'license_expiry' => Carbon::now()->addYears(2), 'status' => 'on_mission', 'phone' => '6789012345', 'email' => 'liam.anderson@example.com', 'car_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['first_name' => 'Sophia', 'last_name' => 'Thomas', 'license_number' => 'H7890123', 'license_expiry' => Carbon::now()->addYears(2), 'status' => 'pending', 'phone' => '7890123456', 'email' => 'sophia.thomas@example.com', 'car_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['first_name' => 'Daniel', 'last_name' => 'Moore', 'license_number' => 'I8901234', 'license_expiry' => Carbon::now()->addYears(2), 'status' => 'on_leave', 'phone' => '8901234567', 'email' => 'daniel.moore@example.com', 'car_id' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['first_name' => 'Ava', 'last_name' => 'Jackson', 'license_number' => 'J9012345', 'license_expiry' => Carbon::now()->addYears(2), 'status' => 'on_mission', 'phone' => '9012345678', 'email' => 'ava.jackson@example.com', 'car_id' => 10, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}