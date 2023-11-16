<form id="editKriteriaForm" action="{{ route('edit.kriteria') }}" method="POST">
    @csrf
    <input type="hidden" name="id_kriteria" id="id_kriteria" value="{{ $kriteria->id }}">
    <div class="mb-3">
        <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria"
            value="{{ $kriteria->nama_kriteria }}" required>
    </div>
    <div class="mb-3">
        <label for="bobot_kriteria" class="form-label">Bobot</label>
        <input type="number" class="form-control" id="bobot_kriteria" name="bobot_kriteria" step="any"
            value="{{ $kriteria->bobot_kriteria }}" required>
    </div>
    <div class="mb-3">
        <label for="jenis_kriteria" class="form-label">Jenis</label>
        <select class="form-select" id="jenis_kriteria" name="jenis_kriteria" required>
            <option value="pilih">Pilih Jenis</option>
            <option value="0" @if ($kriteria->jenis_kriteria == 0) selected @endif>Benefit</option>
            <option value="1" @if ($kriteria->jenis_kriteria == 1) selected @endif>Cost</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary float-end">Simpan</button>
</form>

<script>
    $(document).ready(function() {
        $('#editKriteriaForm').submit(function() {
            // Lakukan refresh halaman setelah formulir dikirim
            location.reload(true);
        });
    });
</script>
