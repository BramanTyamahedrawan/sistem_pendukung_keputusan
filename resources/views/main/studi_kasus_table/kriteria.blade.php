<form id="tambahKriteriaForm" action="{{ route('tambah.kriteria') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="kode_kriteria" class="form-label">Kode Kriteria</label>
        <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" required>
    </div>
    <div class="mb-3">
        <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" required>
    </div>
    <div class="mb-3">
        <label for="bobot_kriteria" class="form-label">Bobot</label>
        <input type="number" class="form-control" id="bobot_kriteria" name="bobot_kriteria" step="any" required>
    </div>
    <div class="mb-3">
        <label for="jenis_kriteria" class="form-label">Jenis</label>
        <select class="form-select" id="jenis_kriteria" name="jenis_kriteria" required>
            <option value="pilih">Pilih Jenis</option>
            <option value="0">Benefit</option>
            <option value="1">Cost</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary float-end">Tambahkan</button>
</form>

<script>
    $(document).ready(function() {
        $('#tambahKriteriaForm').submit(function() {
            // Lakukan refresh halaman setelah formulir dikirim
            location.reload(true);
        });
    });
</script>
