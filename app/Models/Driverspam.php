<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driverspam extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'singler_conducteur';
    
    // Define fillable fields
    protected $fillable = [
        'driver_id',
        'raison',
        'date_singler',
        'status',
        'expire_at',
        'singler_par',
        'justification',
        'questioned_by_director',
        'date_questioning',
        'director_remarks',
        'director_id',
    ];


    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}
 