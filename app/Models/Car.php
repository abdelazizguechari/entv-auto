<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

   public function mission(): BelongsTo
   {
       return $this->belongsTo(Mission::class);
   }
}