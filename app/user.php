<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// Framework
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama_lengkap','email','password','username','nomor_hp','alamat','kecamatan','kota','provinsi','kodepos',
        //narasumber
        'logo_penyelenggara','nomor_wa','scan_strukturkepengurusan','nama_penanggungjawab','jabatan_penanggungjawab','scan_identitaspenanggungjawab','jenis_identitaspenanggungjawab','scan_buktitransfer','persetujuan_syarat_ketentuan',
        //penyelenggara 
        'foto','jabatan','tarif_perjam','scan_cv','scan_sertifikat','jenis_identitas','scan_identitas','scan_buktitransfer','role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function auth()
    {
        return self::findOrFail(Auth::user()->id);
    }
}
