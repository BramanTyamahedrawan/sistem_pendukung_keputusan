<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAlternatifRequest;
use App\Http\Requests\UpdateAlternatifRequest;
use Illuminate\Support\Facades\Redis;

class AlternatifController extends Controller
{
    public function tambahAlternatif(Request $request)
    {
        $request->validate([
            'nama_alternatif' => 'required', [
                'nama_alternatif.required' => 'Nama alternatif harus diisi!',
            ]
        ]);

        $latestKodeAlternatif = DB::table('alternatifs')->max('kode_alternatif');
        $kodeAlternatifNumber = (int)substr($latestKodeAlternatif, 1);
        $nextKodeAlternatif = 'A' . ($kodeAlternatifNumber + 1);

        $alternatif = new Alternatif([
            'kode_alternatif' => $nextKodeAlternatif,
            'nama_alternatif' => $request->input('nama_alternatif'),
        ]);

        $alternatif->save();

        return redirect()->back()->with('success', 'Alternatif berhasil ditambahkan!');
    }

    public function getAlternatif($id)
    {
        $alternatif = Alternatif::find($id);

        return view('main.studi_kasus_table.alternatif_edit', compact('alternatif'));
    }

    public function editAlternatif(Request $request)
    {
        $request->validate([
            'nama_alternatif' => 'required',
        ]);

        $alternatif = Alternatif::find($request->input('id_alternatif'));
        $alternatif->nama_alternatif = $request->input('nama_alternatif');
        $alternatif->save();

        return redirect()->back()->with('success', 'Alternatif berhasil diubah!');
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
    public function store(StoreAlternatifRequest $request, Alternatif $alternatif)
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
    public function updateAlternatif(UpdateAlternatifRequest $request, Alternatif $alternatif)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternatif $alternatif)
    {
        //
    }
}
