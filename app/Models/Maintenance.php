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
        'cost',
        'status'
    ];

    public function car()
    {
        return $this->belongsTo(Carsm::class, 'immatriculation', 'immatriculation');
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
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

        static::updated(function ($maintenance) {
            // Check if the status has changed to 'completed'
            if ($maintenance->isDirty('status') && $maintenance->status === 'completed') {
                // Archive the data using the MaintenanceArchive model
                \App\Models\MaintenanceArchive::create([
                    'maintenance_id' => $maintenance->id,
                    'maintenance_type' => $maintenance->maintenance_type,
                    'start_date' => $maintenance->start_date,
                    'end_date' => $maintenance->end_date,
                    'description' => $maintenance->description,
                    'categorie_panne' => $maintenance->categorie_panne,
                    'cost' => $maintenance->cost,
                    'created_at' => $maintenance->created_at,
                    'updated_at' => $maintenance->updated_at,
                ]);

                // Optionally, you can delete the original record or mark it as archived
                // $maintenance->delete();
            }
        });
    }

    public function stocks()
    {
        return $this->belongsToMany(Stock::class, 'maintenance_stock')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }




}
