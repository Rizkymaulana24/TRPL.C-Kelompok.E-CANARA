<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    protected $fillable = [
        'namakegiatan',
        'deskripsi',
        'tanggalpelaksanaan',
        'status',
        'deleted'
    ];
}
