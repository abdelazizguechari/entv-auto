<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'nom', 'nb_employes', 'responsable', 'localisation', 'email', 'telephone',
    ];
}
