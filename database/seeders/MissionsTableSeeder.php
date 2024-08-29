<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MissionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('missions')->insert([
            ['type' => 'transportation', 'name' => 'Morning Shift Transport', 'description' => 'Transporting employees from home to work in the morning.', 'mission_start' => now()->startOfDay(), 'mission_end' => now()->startOfDay()->addHours(2), 'crew_leader' => 'John Doe', 'crew_name' => 'Team Alpha', 'status' => 'scheduled', 'fuel_tokens' => 10, 'fuel_tokens_used' => 2, 'distance' => 50, 'car_id' => 1, 'driver_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'mission', 'name' => 'Office Relocation', 'description' => 'Moving office equipment to the new location.', 'mission_start' => now()->startOfDay()->addDays(1), 'mission_end' => now()->startOfDay()->addDays(1)->addHours(4), 'crew_leader' => 'Jane Smith', 'crew_name' => 'Team Beta', 'status' => 'ongoing', 'fuel_tokens' => 15, 'fuel_tokens_used' => 5, 'distance' => 100, 'car_id' => 2, 'driver_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'evenements', 'name' => 'Corporate Event Shuttle', 'description' => 'Transporting guests to and from the corporate event.', 'mission_start' => now()->startOfDay()->addHours(6), 'mission_end' => now()->startOfDay()->addHours(12), 'crew_leader' => 'Alice Johnson', 'crew_name' => 'Team Gamma', 'status' => 'completed', 'fuel_tokens' => 20, 'fuel_tokens_used' => 10, 'distance' => 75, 'car_id' => 3, 'driver_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'transportation', 'name' => 'Evening Shift Transport', 'description' => 'Transporting employees from work to home in the evening.', 'mission_start' => now()->startOfDay()->addHours(16), 'mission_end' => now()->startOfDay()->addHours(18), 'crew_leader' => 'Mark Brown', 'crew_name' => 'Team Delta', 'status' => 'completed', 'fuel_tokens' => 8, 'fuel_tokens_used' => 1, 'distance' => 45, 'car_id' => 4, 'driver_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'mission', 'name' => 'Warehouse Move', 'description' => 'Shifting inventory between warehouses.', 'mission_start' => now()->startOfDay()->addDays(2), 'mission_end' => now()->startOfDay()->addDays(2)->addHours(5), 'crew_leader' => 'Emma Davis', 'crew_name' => 'Team Epsilon', 'status' => 'scheduled', 'fuel_tokens' => 12, 'fuel_tokens_used' => 3, 'distance' => 80, 'car_id' => 5, 'driver_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'evenements', 'name' => 'Company Picnic Shuttle', 'description' => 'Transporting employees to the company picnic.', 'mission_start' => now()->startOfDay()->addDays(3), 'mission_end' => now()->startOfDay()->addDays(3)->addHours(6), 'crew_leader' => 'Olivia Wilson', 'crew_name' => 'Team Zeta', 'status' => 'ongoing', 'fuel_tokens' => 18, 'fuel_tokens_used' => 6, 'distance' => 60, 'car_id' => 6, 'driver_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'transportation', 'name' => 'Airport Pickup', 'description' => 'Picking up a VIP guest from the airport.', 'mission_start' => now()->startOfDay()->addHours(9), 'mission_end' => now()->startOfDay()->addHours(10), 'crew_leader' => 'Lucas Martinez', 'crew_name' => 'Team Eta', 'status' => 'completed', 'fuel_tokens' => 9, 'fuel_tokens_used' => 2, 'distance' => 30, 'car_id' => 7, 'driver_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'mission', 'name' => 'Emergency Delivery', 'description' => 'Delivering urgent supplies to a remote location.', 'mission_start' => now()->startOfDay()->addDays(4), 'mission_end' => now()->startOfDay()->addDays(4)->addHours(8), 'crew_leader' => 'Sophia Anderson', 'crew_name' => 'Team Theta', 'status' => 'scheduled', 'fuel_tokens' => 25, 'fuel_tokens_used' => 8, 'distance' => 120, 'car_id' => 8, 'driver_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'evenements', 'name' => 'Conference Shuttle', 'description' => 'Transporting attendees to a conference venue.', 'mission_start' => now()->startOfDay()->addHours(7), 'mission_end' => now()->startOfDay()->addHours(14), 'crew_leader' => 'Isabella White', 'crew_name' => 'Team Iota', 'status' => 'ongoing', 'fuel_tokens' => 22, 'fuel_tokens_used' => 7, 'distance' => 90, 'car_id' => 9, 'driver_id' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['type' => 'transportation', 'name' => 'Client Pickup', 'description' => 'Picking up a client for a meeting.', 'mission_start' => now()->startOfDay()->addHours(11), 'mission_end' => now()->startOfDay()->addHours(12), 'crew_leader' => 'Mia Thomas', 'crew_name' => 'Team Kappa', 'status' => 'completed', 'fuel_tokens' => 7, 'fuel_tokens_used' => 1, 'distance' => 25, 'car_id' => 10, 'driver_id' => 10, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
