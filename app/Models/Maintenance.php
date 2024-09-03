<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $table = 'maintenance';

  
    protected $fillable = [
        'immatriculation',
        'driver_id',
        'stock_id',
        'maintenance_type',
        'start_date',
        'end_date',
        'description',
        'categorie_panne',
        'cost'
    ];

    

    public function car()
    {
        return $this->belongsTo(Carsm::class, 'immatriculation', 'immatriculation');
    }

    public function stock()
    {
         return $this->belongsTo(stock::class, 'stock_id');
     }

     public function driver()
    {
         return $this->belongsTo(Driver::class, 'driver_id');
     }






    protected static function boot()
    {
        parent::boot();

        static::created(function ($maintenance) {
            // Find the car by immatriculation
            $car = Carsm::where('immatriculation', $maintenance->immatriculation)->first();
            
            if ($car) {
                // Update the status to 'inactive'
                $car->status = 'inactive';
                $car->save();
            }
        });
    }

  
    
     
}
