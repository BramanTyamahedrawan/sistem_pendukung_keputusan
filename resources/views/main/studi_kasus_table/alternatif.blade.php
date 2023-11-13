<form id="tambahAlternatifForm" action="{{ route('tambah.alternatif') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="kode_alternatif" class="form-label">Kode Alternatif</label>
        <input type="text" class="form-control" id="kode_alternatif" name="kode_alternatif" required>
    </div>
    <div class="mb-3">
        <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
        <input type="text" class="form-control" id="nama_alternatif" name="nama_alternatif" required>
    </div>
    <button type="submit" class="btn btn-primary">Tambahkan</button>
</form>

<script>
    $(document).ready(function() {
        $('#tambahAlternatifForm').submit(function() {
            // Lakukan refresh halaman setelah formulir dikirim
            location.reload(true);
        });
    });
</script>
