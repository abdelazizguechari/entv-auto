<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // Correct table name
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
}
