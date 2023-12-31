<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $table = 'alternatifs';
    protected $fillable = [
        'id',
        'kode_alternatif',
        'nama_alternatif',
    ];

    public function matriks_keputusan()
    {
        return $this->hasOne(MatriksKeputusan::class, 'id_alternatif');
    }

    public function max_min()
    {
        return $this->hasOne(MaxMin::class, 'id_alternatif');
    }

    public function normalisasi_matriks()
    {
        return $this->hasOne(NormalisasiMatrik::class, 'id_alternatif');
    }

    public function matriks_tertimbang()
    {
        return $this->hasOne(MatriksTertimbang::class, 'id_alternatif');
    }

    public function matriks_jarak()
    {
        return $this->hasOne(MatriksJarak::class, 'id_alternatif');
    }

    public function matriks_perangkingan()
    {
        return $this->hasOne(MatriksPerangkingan::class, 'id_alternatif');
    }
}
