<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionArchive extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'mission_archive';

    // The attributes that are mass assignable.
    protected $fillable = [
        'mission_id',
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

    // The attributes that should be cast to native types.
    protected $casts = [
        'mission_start' => 'datetime',
        'mission_end' => 'datetime',
    ];

    // If you want to use soft deletes, uncomment the following line:
    // use SoftDeletes;

    // The attributes that should be cast to native types.
    // protected $dates = ['deleted_at'];
}
