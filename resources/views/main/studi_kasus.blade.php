@extends('layouts.app')

@section('title', 'Studi Kasus')

@section('content')

    <div class="modal fade" id="tambahAlternatifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Menampilkan konten dari alternatif.blade.php -->
                    @include('main.studi_kasus_table.alternatif')
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahKriteriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Menampilkan konten dari alternatif.blade.php -->
                    @include('main.studi_kasus_table.kriteria')
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editAlternatifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="editAlternatifFormContainer"></div>
                </div>
            </div>
        </div>
    </div>

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

                        <div class="table-responsive">
                            <table class="table table-hover" id="basic-table">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Alternatif</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($alternatifs as $alternatif)
                                        <tr>
                                            <td>{{ $alternatif->kode_alternatif }}</td>
                                            <td>{{ $alternatif->nama_alternatif }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info" data-toggle="modal"
                                                    data-target="#editAlternatifModal"
                                                    data-alternatif-id="{{ $alternatif->id }}">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-primary float-end border-0 text-white viewBtn" type="button"
                            data-toggle="modal" data-target="#tambahAlternatifModal">Tambah </button>
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

                        <div class="table-responsive">
                            <table class="table table-hover" id="basic-table">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Kriteria</th>
                                        <th>Bobot</th>
                                        <th>Jenis</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kriterias as $kriteria)
                                        <tr>
                                            <td>{{ $kriteria->kode_kriteria }}</td>
                                            <td>{{ $kriteria->nama_kriteria }}</td>
                                            <td>{{ $kriteria->bobot_kriteria }}</td>
                                            <td>{{ $kriteria->jenis_kriteria == 0 ? 'Benefit' : 'Cost' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-primary float-end border-0 text-white viewBtn" type="button"
                            data-toggle="modal" data-target="#tambahKriteriaModal">Tambah </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/static/js/components/dark.js"></script>
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/compiled/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="assets/static/js/pages/sweetalert2.js"></script>
    <script src="assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script src="assets/static/js/pages/sweetalert2.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Handle submit form tambahAlternatifForm
            $('#tambahAlternatifForm').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: '/tambah-alternatif', // Gantilah dengan endpoint yang sesuai
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        // Gantilah alert bawaan browser dengan SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Alternatif berhasil ditambahkan!',
                            showConfirmButton: false,
                            timer: 1000
                        }).then((result) => {
                            location.reload();
                        });

                        // Tutup modal
                        $('#tambahAlternatifModal').modal('hide');
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Handle submit form tambahKriteriaForm
            $('#tambahKriteriaForm').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: '/tambah-kriteria', // Gantilah dengan endpoint yang sesuai
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        // Gantilah alert bawaan browser dengan SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Kriteria berhasil ditambahkan!',
                            showConfirmButton: false,
                            timer: 1000
                        }).then((result) => {
                            location.reload();
                        });

                        // Tutup modal
                        $('#tambahKriteriaModal').modal('hide');
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $('#editAlternatifModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // tombol yang memicu modal
                var alternatifId = button.data('alternatif-id'); // ambil informasi dari atribut data-* HTML

                // Lakukan permintaan Ajax untuk mendapatkan data alternatif
                $.ajax({
                    url: '/get-alternatif/' + alternatifId,
                    method: 'GET',
                    dataType: 'html',
                    success: function(data) {

                        // Sertakan data ke dalam formulir
                        $('#editAlternatifFormContainer').html(data);

                        // Submit form editAlternatifForm
                        $('#editAlternatifForm').submit(function(e) {
                            e.preventDefault();

                            var formData = $(this).serialize();

                            // Submit the form via Ajax
                            $.ajax({
                                url: '/edit-alternatif', // Adjust with the correct URL
                                method: 'POST',
                                data: formData,
                                success: function(data) {
                                    // Close the modal
                                    $('#editAlternatifModal').modal('hide');
                                },
                                error: function(error) {
                                    console.error('Error:', error);
                                }
                            });

                            Swal.fire({
                                icon: 'success',
                                title: 'Alternatif berhasil diedit!',
                                showConfirmButton: false,
                                timer: 2000
                            }).then((result) => {
                                location.reload();
                            });
                        });
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
@endsection
