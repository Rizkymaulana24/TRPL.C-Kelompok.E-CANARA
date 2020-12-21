<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Penyelenggara as Authenticatable;

class Penyelenggara extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password', 'birthDate', 'gender', 'phone', 'address', 'role','logo_penyelenggara','logo_penyelenggara','nomor_wa','scan_strukturkepengurusan','nama_penanggungjawab','jabatan_penanggungjawab','scan_identitaspenanggungjawab','jenis_identitaspenanggungjawab','persetujuan_syarat_ketentuan',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
