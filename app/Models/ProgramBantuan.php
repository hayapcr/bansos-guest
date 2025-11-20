<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProgramBantuan extends Model
{
    protected $table = 'program_bantuan';
    protected $primaryKey = 'program_id';
    protected $fillable = ['kode', 'nama_program', 'tahun', 'deskripsi', 'anggaran'];

    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }

        return $query;
    }

    public function scopeSearch(Builder $query, $request, array $searchableColumns): Builder
{
    foreach ($searchableColumns as $column) {
        if ($request->filled('search')) {
            $query->where($column, 'like', '%' . $request->input('search') . '%');
        }
    }
    return $query;
}
}
