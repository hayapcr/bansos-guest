<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPenyaluranBantuan extends Model
{
    use HasFactory;

    protected $table = 'riwayat';
    protected $primaryKey = 'penyaluran_id';

    protected $fillable = [
        'program_id',
        'penerima_id',
        'tahap_ke',
        'tanggal',
        'nilai',
        'bukti_penyaluran',
    ];

    /**
     * ==========================
     *         RELASI
     * ==========================
     */

    public function program()
    {
        return $this->belongsTo(ProgramBantuan::class, 'program_id', 'program_id');
    }

    public function penerima()
    {
        return $this->belongsTo(PenerimaBantuan::class, 'penerima_id', 'penerima_id');
    }

    /**
     * ==========================
     *         SCOPE
     * ==========================
     */

    // Search berdasarkan nama warga
    public function scopeSearchWarga($query, $keyword)
    {
        if ($keyword) {
            return $query->whereHas('penerima', function ($q) use ($keyword) {
                $q->whereHas('warga', function ($w) use ($keyword) {
                    $w->where('nama', 'LIKE', '%' . $keyword . '%');
                });
            });
        }
        return $query;
    }

    // Filter berdasarkan program
    public function scopeFilterProgram($query, $programId)
    {
        if ($programId) {
            return $query->where('program_id', $programId);
        }
        return $query;
    }

    // Filter berdasarkan tahap
    public function scopeFilterTahap($query, $tahap)
    {
        if ($tahap) {
            return $query->where('tahap_ke', $tahap);
        }
        return $query;
    }
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id')
                    ->where('ref_table', 'riwayat')
                    ->orderBy('sort_order', 'asc');
    }

    public function scopeFilter($query, $request)
{
    if ($request->filled('program_id')) {
        $query->where('program_id', $request->program_id);
    }

    return $query;
}

public function scopeSearch($query, $request)
{
    if ($request->filled('search')) {
        $keyword = $request->search;

        $query->whereHas('penerima.warga', function ($q) use ($keyword) {
            $q->where('nama', 'LIKE', "%$keyword%");
        });
    }

    return $query;
}
}
