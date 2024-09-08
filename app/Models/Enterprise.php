<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $fillable = ['nom', 'siege_social', 'email', 'telephone'];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
