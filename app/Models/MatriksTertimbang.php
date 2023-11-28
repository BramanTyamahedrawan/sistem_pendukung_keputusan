<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatriksTertimbang extends Model
{
    use HasFactory;

    protected $table = 'matriks_tertimbangs';
    protected $fillable = [
        'id_alternatif',
        'id_kriteria',
        'jenis_kriteria',
        'nilai',
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternatif', 'id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id');
    }
}
