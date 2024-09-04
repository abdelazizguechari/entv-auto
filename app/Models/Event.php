<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'event_start', 'event_end'];

    public function missions()
    {
        return $this->belongsToMany(Mission::class, 'event_mission');
    }
}