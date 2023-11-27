@extends('layouts.app')

@section('title', 'Matriks Keputusan')

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
                            <h4 class="card-title">Matriks Keputusan</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <form action="{{ route('matriks_keputusan.store') }}" method="POST">
                                    @csrf
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Kode</th>
                                                    @foreach ($kriterias as $kriteria)
                                                        <th>{{ $kriteria->nama_kriteria }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($alternatifs as $alternatif)
                                                    <tr>
                                                        <td>{{ $alternatif->nama_alternatif }}</td>
                                                        @foreach ($kriterias as $kriteria)
                                                            <td>
                                                                @php
                                                                    $nilai = $matriksKeputusans
                                                                        ->where('id_alternatif', $alternatif->id)
                                                                        ->where('id_kriteria', $kriteria->id)
                                                                        ->first();

                                                                    $formattedValue = $nilai ? number_format($nilai->nilai, $nilai->nilai != (int) $nilai->nilai ? 4 : 0, '.', '') : '';
                                                                    $trimmedValue = rtrim(rtrim($formattedValue, '0'), '.');
                                                                @endphp
                                                                <input type="number" step="any"
                                                                    name="nilai_matriks[{{ $alternatif->id }}][{{ $kriteria->id }}]"
                                                                    value="{{ $trimmedValue }}" />
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="{{ count($kriterias) + 1 }}" class="text-center">Data
                                                            Kosong</td>
                                                    </tr>
                                                @endforelse
                                                <tr>
                                                    <td>MAX</td>
                                                    @foreach ($kriterias as $kriteria)
                                                        <td>
                                                            @php
                                                                $formattedValue = number_format($maxValues[$kriteria->id], 4, '.', '');
                                                                $trimmedValue = rtrim(rtrim($formattedValue, '0'), '.');
                                                            @endphp
                                                            {{ $trimmedValue }}
                                                        </td>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    <td>MIN</td>
                                                    @foreach ($kriterias as $kriteria)
                                                        <td>
                                                            @php
                                                                $formattedValue = number_format($minValues[$kriteria->id], 4, '.', '');
                                                                $trimmedValue = rtrim(rtrim($formattedValue, '0'), '.');
                                                            @endphp
                                                            {{ $trimmedValue }}
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Simpan Nilai Matriks</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
