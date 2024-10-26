<?php

namespace Database\Factories;

use App\Models\Mission;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MissionFactory extends Factory
{
    protected $model = Mission::class;

    public function definition()
    {
        return [
            'type' => 'transportation', // Set type to 'transportation'
            'name' => $this->faker->word,
            'mission_type' => $this->faker->word,
            'lieu_mission' => $this->faker->city,
            'description' => $this->faker->text,
            'mission_start' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'mission_end' => $this->faker->dateTimeBetween('now', '+1 month'),
            'crew_leader' => $this->faker->name,
            'crew_name' => $this->faker->name,
            'status' => $this->faker->randomElement(['ongoing', 'scheduled', 'completed']),
            'fuel_tokens' => $this->faker->numberBetween(0, 100),
            'fuel_tokens_used' => $this->faker->numberBetween(0, 50),
            'distance' => $this->faker->numberBetween(0, 1000),
    
        ];
    }
}
