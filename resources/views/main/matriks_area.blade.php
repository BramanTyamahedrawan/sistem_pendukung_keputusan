@extends('layouts.app')

@section('title', 'Matriks Area Perkiraan Batas')

@section('content')

    <div class="page-heading">
        <div class="page-title mb-2">
            <div class="row mb-5 ">
                <h3>Studi Kasus Pemilihan Pengajar Dengan Kinerja Terbaik Pada Sekolah Dasar (SD)</h3>
            </div>
        </div>

        <div class="row">
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Matriks Area Perkiraan Batas</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Nilai Matriks M</th>
                                                <th class="text-center">{{ $matriksM }}</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                @foreach ($kriterias as $kriteria)
                                                    <th class="text-center">{{ $kriteria->kode_kriteria }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Matriks G</td>
                                                @foreach ($matriksAreas as $matriksArea)
                                                    <td class="text-center">{{ $matriksArea->nilai }}</td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
