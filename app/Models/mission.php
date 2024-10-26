<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'lieu_mission',
        'mission_type',
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

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_mission');
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(Carsm::class, 'car_id', 'immatriculation');
    }

    public function driver()
    {
        return $this->hasOneThrough(Driver::class, Carsm::class, 'immatriculation', 'voiture_id', 'car_id', 'immatriculation');
    }

    public function scopeStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    public function scopeType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    public function getMissionStartAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function setMissionStartAttribute($value)
    {
        $this->attributes['mission_start'] = \Carbon\Carbon::parse($value);
    }

    public function getMissionEndAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function setMissionEndAttribute($value)
    {
        $this->attributes['mission_end'] = \Carbon\Carbon::parse($value);
    }

    public function isOngoing(): bool
    {
        return $this->status === 'ongoing';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }
}