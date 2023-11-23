<?php

namespace App\Http\Controllers;

use App\Models\NormalisasiMatrik;
use App\Http\Requests\StoreNormalisasiMatrikRequest;
use App\Http\Requests\UpdateNormalisasiMatrikRequest;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\MatriksKeputusan;

class NormalisasiMatrikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $alternatifs = NormalisasiMatrik::with('alternatif')->get()->groupBy('id_alternatif');
        // $kriterias = NormalisasiMatrik::with('kriteria')->get()->groupBy('id_kriteria');

        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        $normalizedValues = NormalisasiMatrik::all();

        return view('main.normalisasi_matriks', compact('alternatifs', 'kriterias', 'normalizedValues'));
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
    public function store(StoreNormalisasiMatrikRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NormalisasiMatrik $normalisasiMatrik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NormalisasiMatrik $normalisasiMatrik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNormalisasiMatrikRequest $request, NormalisasiMatrik $normalisasiMatrik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NormalisasiMatrik $normalisasiMatrik)
    {
        //
    }
}
