<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; // Import Carbon for date handling
use App\Notifications\ExpiryNotification; // Import the notification class
use Illuminate\Support\Facades\Notification; // Import for sending notifications

class Carsm extends Model
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
        'assurance_type',
        'next_assurance_date',
        'next_control_date',
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

    protected static function booted()
    {
        static::updated(function ($car) {
            $car->checkForExpiry();
        });
    }


    public function checkForExpiry()
    {
        $now = Carbon::now();

        if ($this->next_assurance_date && Carbon::parse($this->next_assurance_date)->diffInDays($now) <= 15) {
            $this->sendExpiryNotification('assurance', $this->next_assurance_date);
        }

        if ($this->next_control_date && Carbon::parse($this->next_control_date)->diffInDays($now) <= 15) {
            $this->sendExpiryNotification('control technique', $this->next_control_date);
        }
    }


    public function sendExpiryNotification($type, $expiryDate)
    {
        $user = User::first();

        Notification::send($user, new ExpiryNotification($type, $expiryDate, $this->marque . ' ' . $this->modele));
    }
}
