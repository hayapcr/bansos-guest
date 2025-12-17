<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifikasiLapangan extends Model
{
    protected $table = 'verifikasi_lapangan';
    protected $primaryKey = 'verifikasi_id';
    protected $fillable = ['pendaftar_id','petugas','tanggal','catatan','skor'];

    public function pendaftar()
    {
        return $this->belongsTo(PendaftarBantuan::class, 'pendaftar_id');
    }

    public function scopeFilterSkor($query, $skor)
{
    if ($skor) {
        return $query->where('skor', '>=', $skor);
    }
    return $query;
}

public function scopeSearchPendaftar($query, $keyword)
{
    if ($keyword) {
        return $query->whereHas('pendaftar.warga', function ($w) use ($keyword) {
            $w->where('nama', 'LIKE', '%' . $keyword . '%');
        });
    }
    return $query;
}
public function media()
{
    return $this->hasMany(Media::class, 'ref_id')
        ->where('ref_table', 'verifikasi_lapangan');
}
}
