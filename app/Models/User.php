<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory,Notifiable,SoftDeletes;

    // Add the 'name' field to the fillable property
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
        'role_id',
    ];

    // Define the relationship with the Role model
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
