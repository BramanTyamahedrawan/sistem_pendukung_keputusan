<?php

namespace App\Http\Controllers;

use App\Models\MatriksPerangkingan;
use App\Http\Requests\StoreMatriksPerangkinganRequest;
use App\Http\Requests\UpdateMatriksPerangkinganRequest;
use App\Models\Alternatif;

class MatriksPerangkinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatifs = Alternatif::all();
        $matriksPerangkingans = MatriksPerangkingan::all();

        return view("main.matriks_perankingan", compact('matriksPerangkingans', 'alternatifs'));
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
    public function store(StoreMatriksPerangkinganRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MatriksPerangkingan $matriksPerangkingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MatriksPerangkingan $matriksPerangkingan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatriksPerangkinganRequest $request, MatriksPerangkingan $matriksPerangkingan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MatriksPerangkingan $matriksPerangkingan)
    {
        //
    }
}
