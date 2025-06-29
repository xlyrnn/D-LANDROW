<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_proyek',
        'jumlah_tower',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
    ];
    public function perizinans()
    {
        return $this->hasMany(RowPerizinan::class);
    }

    public function sosialisasis()
    {
        return $this->hasMany(RowSosialisasi::class);
    }
    
    public function rowInventarisasis()
    {
        return $this->hasMany(RowInventarisasi::class);
    }
    
    public function musyawarahSubs()
    {
        return $this->hasMany(RowMusyawarahSub::class);
    }

    public function pembayarans()
    {
        return $this->hasMany(RowPembayaran::class);
    }
}