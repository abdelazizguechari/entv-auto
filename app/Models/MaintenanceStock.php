<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceStock extends Model
{
    use HasFactory;

    protected $fillable = ['maintenance_id', 'stock_id', 'quantity', 'price', 'total_cost'];

    public function maintenance()
    {
        return $this->belongsTo(Maintenance::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
