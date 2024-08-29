<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'immatriculation',
        'marque',
        'modele',
        'etat',
        'kilometrage',
        'couleur',
        'type_carburant',
        'nombre_places',
        'description',
        'prix',
        'date_achat',
    ];

    public function driver()
    {
        return $this->hasOne(Driver::class);
    }

    public function missions()
    {
        return $this->belongsToMany(Mission::class, 'car_mission');
    }
}