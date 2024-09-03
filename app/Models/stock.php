<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'sotck';

  
    protected $fillable = [
        'name',
        'category',
        'quantity',
        'price',
        'description'
    ];


     // Define the attributes that should be hidden for arrays
     protected $hidden = [
        'prix_total' // This can be excluded if you want to access it publicly
    ];

    // Define any additional attributes that are not part of the database
    protected $appends = [
        'prix_total' // Include this if you want to access prix_total in model responses
    ];
    
    // Optionally, define an accessor if you want to compute it dynamically
    public function getPrixTotalAttribute()
    {
        return $this->quantity * $this->price;
    }
    


}
