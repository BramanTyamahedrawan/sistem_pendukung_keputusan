<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalisasiMatrik extends Model
{
    use HasFactory;

    protected $table = 'normalisasi_matriks';
    protected $fillable = ['id_alternatif', 'id_kriteria', 'nilai'];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternatif');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }
}
