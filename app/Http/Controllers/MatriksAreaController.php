<?php

namespace App\Http\Controllers;

use App\Models\MatriksArea;
use App\Http\Requests\StoreMatriksAreaRequest;
use App\Http\Requests\UpdateMatriksAreaRequest;
use App\Models\Alternatif;
use App\Models\Kriteria;

class MatriksAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        $matriksAreas = MatriksArea::all();
        $matriksM = MatriksArea::first()->nilai_matriks_m;

        return view('main.matriks_area', compact('alternatifs', 'kriterias', 'matriksAreas', 'matriksM'));
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
    public function store(StoreMatriksAreaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MatriksArea $matriksArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MatriksArea $matriksArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatriksAreaRequest $request, MatriksArea $matriksArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MatriksArea $matriksArea)
    {
        //
    }
}
