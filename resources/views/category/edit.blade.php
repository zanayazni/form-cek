<h2>Edit Kategori</h2>
<form action="{{ route('category.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama Kategori:</label><br>
    <input type="text" name="nama_category" value="{{ $category->nama_category }}" required><br><br>
    <button type="submit">Update</button>
</form>
