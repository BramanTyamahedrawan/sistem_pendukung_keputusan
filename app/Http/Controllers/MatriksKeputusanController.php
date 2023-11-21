<?php

namespace App\Http\Controllers;

use App\Models\MatriksKeputusan;
use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Http\Requests\StoreMatriksKeputusanRequest;
use App\Http\Requests\UpdateMatriksKeputusanRequest;
use Illuminate\Support\Facades\Redis;

class MatriksKeputusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriksKeputusans = MatriksKeputusan::all();
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();

        return view("main.matriks_keputusan", compact('matriksKeputusans', 'alternatifs', 'kriterias'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $matrixValues = $request->input('nilai_matriks');

        foreach ($matrixValues as $alternatifId => $kriteriaValues) {
            foreach ($kriteriaValues as $kriteriaId => $value) {
                MatriksKeputusan::updateOrCreate(
                    ['id_alternatif' => $alternatifId, 'id_kriteria' => $kriteriaId],
                    ['nilai' => $value]
                );
            }
        }

        return redirect()->back()->with('success', 'Nilai matriks berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(MatriksKeputusan $matriksKeputusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MatriksKeputusan $matriksKeputusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatriksKeputusanRequest $request, MatriksKeputusan $matriksKeputusan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MatriksKeputusan $matriksKeputusan)
    {
        //
    }
}
