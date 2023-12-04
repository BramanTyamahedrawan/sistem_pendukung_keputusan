<?php

namespace App\Http\Controllers;

use App\Models\MatriksJarak;
use App\Http\Requests\StoreMatriksJarakRequest;
use App\Http\Requests\UpdateMatriksJarakRequest;
use App\Models\Alternatif;
use App\Models\Kriteria;

class MatriksJarakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        $matriksJaraks = MatriksJarak::all();

        return view('main.matriks_jarak', compact('alternatifs', 'kriterias', 'matriksJaraks'));
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
    public function store(StoreMatriksJarakRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MatriksJarak $matriksJarak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MatriksJarak $matriksJarak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatriksJarakRequest $request, MatriksJarak $matriksJarak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MatriksJarak $matriksJarak)
    {
        //
    }
}
