<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
    use HasFactory;

    protected $table = 'penerima_bantuan';
    protected $primaryKey = 'penerima_id';
    protected $fillable = ['program_id','warga_id','keterangan'];

    public function program()
    {
        return $this->belongsTo(ProgramBantuan::class, 'program_id', 'program_id');
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
    }

    public function riwayat()
    {
        return $this->hasMany(RiwayatPenyaluranBantuan::class, 'penerima_id', 'penerima_id');
    }

    // Scope: cari berdasarkan nama warga (relasi)
    public function scopeSearchWarga($query, $keyword)
    {
        if ($keyword) {
            return $query->whereHas('warga', function ($q) use ($keyword) {
                $q->where('nama', 'LIKE', '%' . $keyword . '%');
            });
        }
        return $query;
    }

    // Scope: filter by program
    public function scopeFilterProgram($query, $programId)
    {
        if ($programId) {
            return $query->where('program_id', $programId);
        }
        return $query;
    }
}
