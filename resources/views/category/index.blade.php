<h2>Daftar Kategori</h2>
<a href="{{ route('category.create') }}">Tambah Kategori</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nama Kategori</th>
        <th>Aksi</th>
    </tr>
    @foreach($categories as $cat)
    <tr>
        <td>{{ $cat->id }}</td>
        <td>{{ $cat->nama_category }}</td>
        <td>
            <a href="{{ route('category.edit', $cat->id) }}">Edit</a> |
            <form action="{{ route('category.destroy', $cat->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
