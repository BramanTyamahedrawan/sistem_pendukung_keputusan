<?php

namespace App\Http\Controllers;

use App\Models\MatriksKeputusan;
use Illuminate\Http\Request;
use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;
use App\Models\NormalisasiMatrik;
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
        $normalizedValues = NormalisasiMatrik::all();

        $maxValues = [];
        $minValues = [];
        foreach ($kriterias as $kriteria) {
            $matriksKriteria = $matriksKeputusans->where('id_kriteria', $kriteria->id);

            $maxValues[$kriteria->id] = MatriksKeputusan::where('id_kriteria', $kriteria->id)->max('nilai');
            $minValues[$kriteria->id] = MatriksKeputusan::where('id_kriteria', $kriteria->id)->min('nilai');
        }

        return view("main.matriks_keputusan", compact('matriksKeputusans', 'alternatifs', 'kriterias', 'maxValues', 'minValues', 'normalizedValues'));
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
        $kriterias = Kriteria::all();
        $alternatifId = $request->input('alternatif_id');

        // Step 1: Store matrix values in MatriksKeputusan table
        foreach ($matrixValues as $alternatifId => $kriteriaValues) {
            foreach ($kriteriaValues as $kriteriaId => $value) {
                MatriksKeputusan::updateOrCreate(
                    ['id_alternatif' => $alternatifId, 'id_kriteria' => $kriteriaId],
                    ['nilai' => $value]
                );
            }
        }

        foreach ($kriterias as $kriteria) {
            $maxValue = DB::table('matriks_keputusans')
                ->where('id_kriteria', $kriteria->id)
                ->max('nilai');

            $minValue = DB::table('matriks_keputusans')
                ->where('id_kriteria', $kriteria->id)
                ->min('nilai');

            // Update semua entri untuk kriteria ini dengan nilai maksimum dan minimum
            MatriksKeputusan::where('id_kriteria', $kriteria->id)->update(['max' => $maxValue, 'min' => $minValue]);
        }

        foreach ($matrixValues as $alternatifId => $kriteriaValues) {
            foreach ($kriteriaValues as $kriteriaId => $value) {
                // Retrieve max and min values from MatriksKeputusan table
                $maxValue = MatriksKeputusan::where('id_kriteria', $kriteriaId)->value('max');
                $minValue = MatriksKeputusan::where('id_kriteria', $kriteriaId)->value('min');

                $normalizedValue = (($value - $minValue) / ($maxValue - $minValue));

                // Store normalized value in NormalisasiMatrik table
                NormalisasiMatrik::updateOrCreate(
                    ['id_alternatif' => $alternatifId, 'id_kriteria' => $kriteriaId],
                    ['nilai' => $normalizedValue]
                );
            }
        }

        return redirect()->back()->with('success', 'Nilai matriks berhasil disimpan');
    }


    // public function store(Request $request)
    // {
    //     $matrixValues = $request->input('nilai_matriks');

    //     foreach ($matrixValues as $alternatifId => $kriteriaValues) {
    //         foreach ($kriteriaValues as $kriteriaId => $value) {
    //             MatriksKeputusan::updateOrCreate(
    //                 ['id_alternatif' => $alternatifId, 'id_kriteria' => $kriteriaId],
    //                 ['nilai' => $value]
    //             );
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Nilai matriks berhasil disimpan');
    // }


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
