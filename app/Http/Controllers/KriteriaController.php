<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKriteriaRequest;
use App\Http\Requests\UpdateKriteriaRequest;

class KriteriaController extends Controller
{

    public function tambahKriteria(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'kode_kriteria' => 'required',
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required',
            'jenis_kriteria' => 'required',
        ]);

        // Buat instance model Kriteria
        $kriteria = new Kriteria([
            'kode_kriteria' => $request->input('kode_kriteria'),
            'nama_kriteria' => $request->input('nama_kriteria'),
            'bobot_kriteria' => $request->input('bobot_kriteria'),
            'jenis_kriteria' => $request->input('jenis_kriteria'),
        ]);

        // Simpan data Kriteria ke database
        $kriteria->save();

        // Redirect dengan pesan sukses (Anda bisa menyesuaikan ini sesuai kebutuhan)
        return redirect()->back()->with('success', 'Kriteria berhasil ditambahkan!');
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
    public function store(StoreKriteriaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKriteriaRequest $request, Kriteria $kriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria)
    {
        //
    }
}
