<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'description',
        'mission_start',
        'mission_end',
        'crew_leader',
        'crew_name',
        'status',
        'fuel_tokens',
        'fuel_tokens_used',
        'distance',
        'car_id',
        'driver_id',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    
    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_mission');
    }
}