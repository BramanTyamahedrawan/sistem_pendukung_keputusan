<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudiKasus extends Model
{
    use HasFactory;

    protected $table = 'studi_kasuses';

    protected $fillable = [
        'kode_kriteria',
        'nama_kriteria',
        'bobot_kriteria',
        'jenis_kriteria',
        'kode_alternatif',
        'nama_alternatif',
        'nilai_c1',
        'nilai_c2',
        'nilai_c3',
        'nilai_c4',
        'nilai_c5',
        'max',
        'min',
    ];
}
