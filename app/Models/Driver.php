<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

   protected $table = 'drivers';

    protected $fillable = [
        'nom',
        'prenom',
        'assurance_num',
        'permis_conduire',
        'telephone',
        'matricule',
        'num_cas_urgance',
        'nom_cas_urgance',
        'email',
        'status',
        'adresse',
        'date_naissance',
        'photo',
        'voiture_id',
    
    ];

    public function voiture()
    {
        return $this->belongsTo(Carsm::class, 'voiture_id', 'immatriculation');
    }


    
}