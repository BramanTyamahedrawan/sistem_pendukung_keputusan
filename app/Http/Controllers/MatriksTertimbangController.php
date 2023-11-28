<?php

namespace App\Http\Controllers;

use App\Models\MatriksTertimbang;
use App\Http\Requests\StoreMatriksTertimbangRequest;
use App\Http\Requests\UpdateMatriksTertimbangRequest;
use App\Models\Alternatif;
use App\Models\Kriteria;

class MatriksTertimbangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();
        $weightedValues = MatriksTertimbang::all();

        return view('main.matriks_tertimbang', compact('alternatifs', 'kriterias', 'weightedValues'));
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
    public function store(StoreMatriksTertimbangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MatriksTertimbang $matriksTertimbang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MatriksTertimbang $matriksTertimbang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatriksTertimbangRequest $request, MatriksTertimbang $matriksTertimbang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MatriksTertimbang $matriksTertimbang)
    {
        //
    }
}
