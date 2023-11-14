<form id="tambahAlternatifForm" action="{{ route('tambah.alternatif') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="kode_alternatif" class="form-label">Kode Alternatif</label>
        <input type="text" class="form-control @error('kode_alternatif') is-invalid @enderror" id="kode_alternatif"
            name="kode_alternatif" value="{{ old('kode_alternatif') }}">
    </div>
    @error('kode_alternatif')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <div class="mb-3">
        <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
        <input type="text" class="form-control" id="nama_alternatif" name="nama_alternatif" required>
    </div>
    <button type="submit" class="btn btn-primary float-end">Tambahkan</button>
</form>

<script>
    $(document).ready(function() {
        $('#tambahAlternatifForm').submit(function() {
            // Lakukan refresh halaman setelah formulir dikirim
            location.reload(true);
        });
    });
</script>
