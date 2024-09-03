<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey = 'immatriculation';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'immatriculation',
        'marque',
        'modele',
        'etat',
        'kilometrage',
        'datem',
        'couleur',
        'type_carburant',
        'transmission',
        'puissance',
        'nombre_portes',
        'nombre_places',
        'prix',
        'date_achat',
        'proprietaire',
        'description',
    ];

    public function mission(): HasOne
    {
        return $this->hasOne(Mission::class, 'car_id', 'immatriculation');
    }

    public function driver()
    {
        return $this->hasOne(Driver::class, 'voiture_id', 'immatriculation');
    }
}