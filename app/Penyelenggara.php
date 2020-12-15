<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Penyelenggara extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password', 'birthDate', 'gender', 'phone', 'address', 'role','foto',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
