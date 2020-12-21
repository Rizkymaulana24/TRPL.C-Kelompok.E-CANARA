<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    protected $fillable = [
        'namakegiatan',
        'tanggalpelaksanaan',
        'waktu_pelaksanaan',
        'alamatkegiatan',
        'jenis',
        'kategori',
        'tingkat',
        'deskripsi',
        'scan_proposalkegiatan',
        'nama_penanggungjawab',
        'jabatan_penanggungjawab',
        'nomor_hp',
        'nomor_wa',
        'user_id',
        'status_user',
        'status',
        'deleted'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function activeWithUserFindByUserId($id)
    {
        return self::where('status_user', true)->where('user_id', $id)->get();
    }
    public static function withUserPlantMachineFindByUserId($id)
    {
        return self::with(['user', 'plant', 'machine'])->where('user_id', $id)->get();
    }
}
