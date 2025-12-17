<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    public function scopeSearch($query, $request)
{
    if ($request->filled('search')) {
        $query->whereHas('program', function($q) use ($request) {
            $q->where('nama_program', 'LIKE', '%' . $request->search . '%');
        });
    }
    return $query;
}
public function media()
{
    return $this->hasMany(Media::class, 'ref_id')
        ->where('ref_table', 'pendaftar_bantuan')
        ->orderBy('sort_order');
}

}
