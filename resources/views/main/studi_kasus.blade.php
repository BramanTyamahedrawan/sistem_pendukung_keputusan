@extends('layouts.app')

@section('title', 'Studi Kasus')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-2">
            <div class="row mb-5 ">
                <h3>Studi Kasus Pemilihan Pengajar Dengan Kinerja Terbaik Pada
                    Sekolah Dasar (SD) </h3>
                <p class="text-subtitle text-muted col-8 col-md-12 mt-3">Studi kasus yang diterapkan dalam penelitian ini
                    adalah
                    Pemilihan
                    Pengajar Dengan Kinerja Terbaik Pada
                    Sekolah Dasar (SD). Yang dimana proses penentuan serta penilaian pengajar terbaik tidak sesuai
                    dengan kriteria-kriteria kinerja setiap guru, melainkan hanya dari pendapat-pendapat pengajar
                    lainnya yg tidak relevan. Dalam
                    penentuan pengajar terbaik memang tidak mudah menentukannya. Maka dari itu untuk mengatasi kasus
                    tersebut,
                    sebuah sistem pendukung keputusan sangat diperlukan tujuannya untuk memilih pengajar yang memiliki
                    kinerja
                    terbaik dengan maksud agar pengajar dapat menjalankan tugasnya dengan sebaik-baiknya sehingga dapat
                    diambil
                    keputusan yang optimal dan relevan. </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h5 class="card-title">
                                Table Alternatif
                            </h5>
                        </div>

                        <div class="card-body">
                            <table class="table table-striped" id="basic-table">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Alternatif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h5 class="card-title">
                                Table Kriteria
                            </h5>
                        </div>

                        <div class="card-body">
                            <table class="table table-striped" id="basic-table">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Kriteria</th>
                                        <th>Bobot</th>
                                        <th>Jenis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/compiled/js/app.js"></script>
@endsection
