<h2>Edit Kendaraan</h2>
<form method="POST" action="{{ route('kendaraan.update', $kendaraan->id) }}">
    @csrf
    @method('PUT')
    <label>Plat Nomor:</label><br>
    <input type="text" name="plat_nomor" value="{{ $kendaraan->plat_nomor }}" required><br>

    <label>Kategori:</label><br>
    <select name="category_id" required>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ $kendaraan->category_id == $cat->id ? 'selected' : '' }}>
                {{ $cat->nama_category }}
            </option>
        @endforeach
    </select><br>

    <label>Tanggal Input:</label><br>
    <input type="date" name="tanggal_input" value="{{ $kendaraan->tanggal_input }}" required><br><br>

    <label>Jumlah Stok:</label><br>
    <input type="number" name="jumlah_stok" value="{{ $kendaraan->jumlah_stok }}" required><br><br>

    <button type="submit">Update</button>
</form>
