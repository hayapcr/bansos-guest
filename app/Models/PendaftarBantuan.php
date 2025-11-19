<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftarBantuan extends Model
{
    protected $table = 'pendaftar_bantuan';
    protected $primaryKey = 'pendaftar_id';
    protected $fillable = ['program_id', 'warga_id', 'status_seleksi'];

    public function program()
    {
        return $this->belongsTo(ProgramBantuan::class, 'program_id');
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function verifikasi()
    {
        return $this->hasMany(VerifikasiLapangan::class, 'pendaftar_id');
    }
}
