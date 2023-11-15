<form id="editAlternatifForm" action="{{ route('edit.alternatif') }}" method="POST">
    @csrf
    <input type="hidden" name="alternatif_id" id="alternatif_id" value="{{ $alternatif->id }}">
    <div class="mb-3">
        <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
        <input type="text" class="form-control" id="nama_alternatif" name="nama_alternatif"
            value="{{ $alternatif->nama_alternatif }}" required>
    </div>
    <button type="submit" class="btn btn-primary float-end">Edit</button>
</form>

<script>
    $(document).ready(function() {
        $('#editAlternatifForm').submit(function() {
            // Lakukan refresh halaman setelah formulir dikirim
            location.reload(true);
        });
    });
</script>
