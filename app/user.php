<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password', 'birthDate', 'gender', 'phone', 'address', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
