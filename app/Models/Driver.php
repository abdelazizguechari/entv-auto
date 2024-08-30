<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'driver';

    protected $fillable = [
        'nom',
        'prenom',
        'assurance_num',
        'permis_conduire',
        'telephone',
        'num_cas_urgance',
        'nom_cas_urgance',
        'email',
        'status',
        'adresse',
        'date_naissance',
        'photo',
        'voiture_id',
    ];

    public function car(): HasOne
    {
        return $this->hasOne(Car::class, 'immatriculation', 'voiture_id');
    }

    public function missions(): BelongsTo
    {
        return $this->belongsTo(Mission::class, 'mission_driver', 'driver_id', 'mission_id');
    }
}