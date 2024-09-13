<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;
// use Spatie\Activitylog\Traits\LogsActivity;
// use Spatie\Activitylog\LogOptions;

class User extends Authenticatable
{
    use HasApiTokens,HasRoles, HasFactory, Notifiable;
    // LogsActivity;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $fillable = ['name', 'text'];

    public static function getPermissionGroup(){
        return DB::table('permissions')
            ->select('group_name')
            ->groupBy('group_name')
            ->get();
    }
    
    public static function getPermissionname($group_name) {
        return DB::table('permissions')
            ->select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
    }
    
    public static function rolehasepermission($role ,$permission_name) {

        $haspermission = true ;
        foreach ($permission_name as $parm) {
            if (!$role->hasPermissionTo($parm->name)) {
                $haspermission = false ;
            }
            return $haspermission ;
        }

    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'conversation_participants');
    }
    // public function getActivitylogOptions(): LogOptions
    // {
    //     return LogOptions::defaults()
    //     ->logOnly(['name', 'text']);
    //     // Chain fluent methods for configuration options
    // }
    
}
