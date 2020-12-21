<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Narasumber as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Narasumber extends Model
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password', 'birthDate', 'gender', 'phone', 'address', 'role','foto',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
