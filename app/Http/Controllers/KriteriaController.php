<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreKriteriaRequest;
use App\Http\Requests\UpdateKriteriaRequest;

class KriteriaController extends Controller
{
    public function tambahKriteria(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required',
            'jenis_kriteria' => 'required',
        ], [
            'nama_kriteria.required' => 'Nama kriteria harus diisi!',
            'bobot_kriteria.required' => 'Bobot kriteria harus diisi!',
            'jenis_kriteria.required' => 'Jenis kriteria harus diisi!',
        ]);

        $latestKodeKriteria = DB::table('kriterias')->max('kode_kriteria');
        $kodeKriteriaNumber = (int)substr($latestKodeKriteria, 1);
        $nextKodeKriteria = 'C' . ($kodeKriteriaNumber + 1);

        $kriteria = new Kriteria([
            'kode_kriteria' => $nextKodeKriteria,
            'nama_kriteria' => $request->input('nama_kriteria'),
            'bobot_kriteria' => $request->input('bobot_kriteria'),
            'jenis_kriteria' => $request->input('jenis_kriteria'),
        ]);

        $kriteria->save();

        return redirect()->back()->with('success', 'Kriteria berhasil ditambahkan!');
    }

    public function getKriteria($id)
    {
        $kriteria = Kriteria::find($id);

        return view('main.studi_kasus_table.kriteria_edit', compact('kriteria'));
    }

    public function editKriteria(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required',
            'jenis_kriteria' => 'required',
        ]);

        $kriteria = Kriteria::find($request->input('id_kriteria'));
        $kriteria->nama_kriteria = $request->input('nama_kriteria');
        $kriteria->bobot_kriteria = $request->input('bobot_kriteria');
        $kriteria->jenis_kriteria = $request->input('jenis_kriteria');
        $kriteria->save();

        return redirect()->back()->with('success', 'Kriteria berhasil diubah!');
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
