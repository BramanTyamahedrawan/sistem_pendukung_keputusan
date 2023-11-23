<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriterias';
    protected $fillable = [
        'kode_kriteria',
        'nama_kriteria',
        'bobot_kriteria',
        'jenis_kriteria',
    ];

    public function matriks_keputusan()
    {
        return $this->hasOne(MatriksKeputusan::class, 'id_kriteria');
    }

    public function max_min()
    {
        return $this->hasOne(MaxMin::class, 'id_kriteria');
    }
}
