<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faqmodel extends Model
{
    use HasFactory;

    protected $fillable = [

        'question',
        'reponse'
        
    ];
}
