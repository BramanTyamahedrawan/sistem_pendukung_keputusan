@extends('layouts.app')

@section('title', 'Jurnal')

@section('content')

    <div class="page-heading">
        <div class="page-title mb-2">
            <div class="row mb-5 ">
                <h3>Sistem Pendukung Keputusan Pemilihan Karyawan Terbaik Dengan
                    Menggunakan Metode MABAC </h3>
            </div>
        </div>

        <div class="row">
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Jurnal </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <iframe src="{{ asset('storage/79-Article Text-369-1-10-20231001.pdf') }}" width="100%"
                                    height="600px"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
