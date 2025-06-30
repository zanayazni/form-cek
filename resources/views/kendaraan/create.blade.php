<h2>Tambah Kendaraan</h2>
<form method="POST" action="{{ route('kendaraan.store') }}">
    @csrf
    <label>Plat Nomor:</label><br>
    <input type="text" name="plat_nomor" required><br>

    <label>Kategori:</label><br>
    <select name="category_id" required>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->nama_category }}</option>
        @endforeach
    </select><br>

    <label>Tanggal Input:</label><br>
    <input type="date" name="tanggal_input" value="{{ date('d-m-Y') }}" required><br><br>

    <label>Jumlah Stok:</label><br>
    <input type="number" name="jumlah_stok" required><br><br>

    <button type="submit">Simpan</button>
</form>
