<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlternatifRequest;
use App\Http\Requests\UpdateAlternatifRequest;

class AlternatifController extends Controller
{
    public function tambahAlternatif(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'kode_alternatif' => 'required',
            'nama_alternatif' => 'required',
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        // Buat instance model Alternatif
        $alternatif = new Alternatif([
            'kode_alternatif' => $request->input('kode_alternatif'),
            'nama_alternatif' => $request->input('nama_alternatif'),
            // Isi dengan atribut lainnya sesuai kebutuhan
        ]);

        // Simpan data Alternatif ke database
        $alternatif->save();

        // Redirect dengan pesan sukses (Anda bisa menyesuaikan ini sesuai kebutuhan)
        return redirect()->back()->with('success', 'Alternatif berhasil ditambahkan!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreAlternatifRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternatif $alternatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlternatifRequest $request, Alternatif $alternatif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternatif $alternatif)
    {
        //
    }
}
