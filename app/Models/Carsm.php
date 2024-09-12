<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Activitylog\Traits\LogsActivity;
// use Spatie\Activitylog\LogOptions;


class Carsm extends Model
{a
    use HasFactory;
    // LogsActivity;

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
        'assurance_type',
        'next_assurance_date',
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
        'status', 
    ];

    public function driver()
{
    return $this->hasOne(Driver::class, 'voiture_id', 'immatriculation');
}

    // public function getActivitylogOptions(): LogOptions
    // {
    //     return LogOptions::defaults()
    //         ->logOnly(['immatriculation', 'marque', 'modele', 'etat', 'kilometrage'])
    //         ->setDescriptionForEvent(fn(string $eventName) => "Car has been {$eventName}");
    //     // Chain fluent methods for configuration options
    // }
}
