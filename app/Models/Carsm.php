<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carsm extends Model
{
    use HasFactory; 

    protected $table = 'cars'; 

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
}
