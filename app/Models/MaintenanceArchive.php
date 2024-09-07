<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceArchive extends Model
{
    use HasFactory;

    protected $table = 'maintenance_archive';

    protected $fillable = [
        'maintenance_id',
        'maintenance_type',
        'start_date',
        'end_date',
        'description',
        'categorie_panne',
        'cost',
        'created_at',
        'updated_at',
    ];

    // Define relationships or additional methods as needed
}
