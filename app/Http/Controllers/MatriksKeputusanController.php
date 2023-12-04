<?php

namespace App\Http\Controllers;

use App\Models\MatriksKeputusan;
use Illuminate\Http\Request;
use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;
use App\Models\NormalisasiMatrik;
use App\Models\Alternatif;
use App\Models\MatriksTertimbang;
use App\Models\MatriksArea;
use App\Models\MatriksJarak;
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

        // Step 2: Calculate and store normalized values in NormalisasiMatrik table
        foreach ($kriterias as $kriteria) {
            $maxValue = $kriteria->jenis_kriteria ?
                DB::table('matriks_keputusans')->where('id_kriteria', $kriteria->id)->min('nilai') :
                DB::table('matriks_keputusans')->where('id_kriteria', $kriteria->id)->max('nilai');

            $minValue = $kriteria->jenis_kriteria ?
                DB::table('matriks_keputusans')->where('id_kriteria', $kriteria->id)->max('nilai') :
                DB::table('matriks_keputusans')->where('id_kriteria', $kriteria->id)->min('nilai');

            // Update semua entri untuk kriteria ini dengan nilai maksimum dan minimum
            MatriksKeputusan::where('id_kriteria', $kriteria->id)->update(['max' => $maxValue, 'min' => $minValue]);
        }

        foreach ($matrixValues as $alternatifId => $kriteriaValues) {
            foreach ($kriteriaValues as $kriteriaId => $value) {
                // Retrieve max and min values from MatriksKeputusan table
                $maxValue = MatriksKeputusan::where('id_kriteria', $kriteriaId)->value('max');
                $minValue = MatriksKeputusan::where('id_kriteria', $kriteriaId)->value('min');

                $normalizedValue = $kriteria->jenis_kriteria ?
                    (($value - $maxValue) / ($minValue - $maxValue)) : (($value - $minValue) / ($maxValue - $minValue));

                // Store normalized value in NormalisasiMatrik table
                NormalisasiMatrik::updateOrCreate(
                    ['id_alternatif' => $alternatifId, 'id_kriteria' => $kriteriaId],
                    ['nilai' => $normalizedValue]
                );
            }
        }

        // Step 3: Calculate and store weighted values in MatriksTertimbang table
        foreach ($matrixValues as $alternatifId => $kriteriaValues) {
            foreach ($kriteriaValues as $kriteriaId => $value) {
                $bobotKriteria = Kriteria::find($kriteriaId)->bobot_kriteria;
                $normalizedValue = NormalisasiMatrik::where('id_alternatif', $alternatifId)
                    ->where('id_kriteria', $kriteriaId)
                    ->value('nilai');

                // Store or update weighted values in MatriksTertimbang table
                MatriksTertimbang::updateOrCreate(
                    ['id_alternatif' => $alternatifId, 'id_kriteria' => $kriteriaId],
                    ['nilai' => ($bobotKriteria * $normalizedValue) + $bobotKriteria]
                );
            }
        }

        // Step 4: Calculate and store area values in MatriksArea table
        foreach ($kriterias as $kriteria) {
            $matriksArea = 1; // Initialize matriks area for the current kriteria

            foreach ($matrixValues as $alternatifId => $kriteriaValues) {
                // Get weighted value from MatriksTertimbang
                $weightedValue = MatriksTertimbang::where('id_alternatif', $alternatifId)
                    ->where('id_kriteria', $kriteria->id)
                    ->value('nilai');

                // Multiply each weighted value
                $matriksArea *= $weightedValue;
            }

            // Calculate matriks area perkiraan batas using the power of m
            $matriksArea = pow($matriksArea, 1 / count($matrixValues));

            // Calculate and store 1 / jumlah alternatif value in MatriksArea table
            $nilaiMatriksM = 1 / count($matrixValues);

            // Store values in MatriksArea table
            MatriksArea::updateOrCreate(
                ['id_kriteria' => $kriteria->id],
                ['nilai' => $matriksArea, 'nilai_matriks_m' => $nilaiMatriksM]
            );
        }

        // Step 5: Calculate and store distance values in MatriksJarak table
        foreach ($matrixValues as $alternatifId => $kriteriaValues) {
            foreach ($kriteriaValues as $kriteriaId => $value) {
                // Get weighted value from MatriksTertimbang
                $weightedValueTertimbang = MatriksTertimbang::where('id_alternatif', $alternatifId)
                    ->where('id_kriteria', $kriteriaId)
                    ->value('nilai');

                // Get value from MatriksArea
                $valueMatriksArea = MatriksArea::where('id_kriteria', $kriteriaId)->value('nilai');

                // Calculate the distance
                $jarak = $weightedValueTertimbang - $valueMatriksArea;

                // Store or update distance values in MatriksJarak table
                MatriksJarak::updateOrCreate(
                    ['id_alternatif' => $alternatifId, 'id_kriteria' => $kriteriaId],
                    ['nilai' => $jarak]
                );
            }
        }

        return redirect()->back()->with('success', 'Nilai matriks berhasil disimpan');
    }

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
