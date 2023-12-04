<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatriksArea extends Model
{
    use HasFactory;

    protected $table = 'matriks_areas';
    protected $fillable = ['id_kriteria', 'nilai', 'nilai_matriks_m'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }
}
