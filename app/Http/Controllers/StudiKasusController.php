<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class StudiKasusController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();

        return view('main.studi_kasus', compact('alternatifs'));
    }

    public function showAlternatif($id)
    {
        $alternatif = Alternatif::find($id);

        return view('main.studi_kasus_table.alternatif', compact('alternatif'));
    }
}
