<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConducteurConger extends Model
{
    use HasFactory;

   
    protected $table = 'conducteur_conger';

  
    protected $fillable = [
        'driver_id',
        'type_conger', 
        'start_date',
        'end_date',
        'reason',
        'certificat_maladie', 
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }


    public function getCertificatMaladieUrlAttribute()
    {
        if ($this->certificat_maladie) {
            return asset('storage/' . $this->certificat_maladie);
        }
        return null;
    }

    // Example of a method to determine if the leave is maladie
    public function isCongerMaladie()
    {
        return $this->type_conger === 'conger_maladie';
    }
}
