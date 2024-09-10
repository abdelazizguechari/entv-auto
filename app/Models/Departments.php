<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    protected $table = 'departments';

    // Define fillable fields to allow mass assignment
    protected $fillable = [
        'nom',
        'nb_employes',
        'responsable',
        'localisation',
        'email',
        'telephone',
        'enterprise_id'
    ];

    // Define the relationship to the 'Enterprise' model
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
}

