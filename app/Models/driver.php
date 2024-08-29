<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'license_number',
        'license_expiry',
        'status',
        'phone',
        'email',
        'car_id',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function missions()
    {
        return $this->hasMany(Mission::class);
    }
}
