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
}
