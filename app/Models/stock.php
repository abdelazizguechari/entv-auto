<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stock'; 

    protected $fillable = [
        'category',
        'quantity',
        'price',
    ];

    protected $hidden = [
        'prix_total'
    ];

    protected $appends = [
        'prix_total' 
    ];
    
    public function getPrixTotalAttribute()
    {
        return $this->quantity * $this->price;
    }

    public function maintenances()
    {
        return $this->belongsToMany(Maintenance::class, 'maintenance_stocks')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
