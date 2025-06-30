<h2>Tambah Kategori</h2>
<form action="{{ route('category.store') }}" method="POST">
    @csrf
    <label>Nama Kategori:</label><br>
    <input type="text" name="nama_category" required><br><br>
    <button type="submit">Simpan</button>
</form>
