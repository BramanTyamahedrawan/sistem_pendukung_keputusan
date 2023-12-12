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

    <div class="modal fade" id="editKriteriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="editKriteriaFormContainer"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-heading">
        <div class="page-title mb-2">
            <div class="row mb-5 ">
                <h3>Sistem Pendukung Keputusan Pemilihan Karyawan Terbaik Dengan
                    Menggunakan Metode MABAC </h3>
                <p class="text-subtitle text-muted col-8 col-md-12 mt-3">Dalam Analisa dan Penerapan Metode ini penulis akan
                    menjelaskan bagaimana kasus ini dapat diselesaikan dengan
                    menggunakan metode MABAC dari langkah awal hingga akhir proses perangkingan. Berdasarkan penelitian yang
                    sudah dilakukan oleh penulis dapat diketahui bahwa terdapat permasalahan dalam pemilihan karyawan
                    terbaik di
                    1001 Mart karena mereka tidak memiliki sistem dalam melakukan pemilihan. Untuk mengatasi permasalahan
                    tersebut maka penulis membangun sebuah aplikasi sistem pendukung keputusan pemilihan karyawan terbaik
                    dengan
                    menggunakan metode MABAC</p>
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
                                                <div class="d-flex justify-content-center gap-3">
                                                    <a href="#" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#editAlternatifModal"
                                                        data-alternatif-id="{{ $alternatif->id }}">
                                                        Edit
                                                    </a>
                                                    {{-- button delete --}}
                                                    <a href="{{ route('delete.alternatif', ['id' => $alternatif->id]) }}"
                                                        class="btn btn-danger delete-alternatif-btn"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $alternatif->id }}').submit();">
                                                        Delete
                                                    </a>
                                                    <form id="delete-form-{{ $alternatif->id }}"
                                                        action="{{ route('delete.alternatif', ['id' => $alternatif->id]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    {{-- batas button delete --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada data</td>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kriterias as $kriteria)
                                        <tr>
                                            <td>{{ $kriteria->kode_kriteria }}</td>
                                            <td>{{ $kriteria->nama_kriteria }}</td>
                                            <td>{{ $kriteria->bobot_kriteria }}</td>
                                            <td>{{ $kriteria->jenis_kriteria == 0 ? 'Benefit' : 'Cost' }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-3">
                                                    <a href="#" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#editKriteriaModal"
                                                        data-kriteria-id="{{ $kriteria->id }}">
                                                        Edit
                                                    </a>
                                                    {{-- button delete --}}
                                                    <a href="{{ route('delete.kriteria', ['id' => $kriteria->id]) }}"
                                                        class="btn btn-danger delete-kriteria-btn"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $kriteria->id }}').submit();">
                                                        Delete
                                                    </a>
                                                    <form id="delete-form-{{ $kriteria->id }}"
                                                        action="{{ route('delete.kriteria', ['id' => $kriteria->id]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    {{-- batas button delete --}}
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


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
    <script>
        $(document).ready(function() {

            $('#editKriteriaModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // tombol yang memicu modal
                var kriteriaId = button.data('kriteria-id'); // ambil informasi dari atribut data-* HTML

                // Lakukan permintaan Ajax untuk mendapatkan data alternatif
                $.ajax({
                    url: '/get-kriteria/' + kriteriaId,
                    method: 'GET',
                    dataType: 'html',
                    success: function(data) {

                        // Sertakan data ke dalam formulir
                        $('#editKriteriaFormContainer').html(data);

                        // Submit form editAlternatifForm
                        $('#editKriteriaForm').submit(function(e) {
                            e.preventDefault();

                            var formData = $(this).serialize();

                            // Submit the form via Ajax
                            $.ajax({
                                url: '/edit-kriteria', // Adjust with the correct URL
                                method: 'POST',
                                data: formData,
                                success: function(data) {
                                    // Close the modal
                                    $('#editKriteriaModal').modal('hide');
                                },
                                error: function(error) {
                                    console.error('Error:', error);
                                }
                            });

                            Swal.fire({
                                icon: 'success',
                                title: 'Kriteria berhasil diedit!',
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
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Handle click on delete-alternatif-btn
            $('.delete-alternatif-btn').click(function(e) {
                e.preventDefault();

                // Store the reference to the current button for later use
                var $button = $(this);

                // AJAX request to delete the alternatif
                $.ajax({
                    url: '/delete-alternatif/' + $button.data('alternatif-id'),
                    type: 'DELETE',
                    success: function(data) {
                        // Gantilah alert bawaan browser dengan SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Alternatif berhasil dihapus!',
                            showConfirmButton: false,
                            timer: 1000
                        }).then((result) => {
                            // Redirect or perform any other action after SweetAlert is closed
                            location.reload();
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
