<h2>Daftar Kendaraan</h2>
<a href="{{ route('kendaraan.create') }}">Tambah Kendaraan</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th><th>Plat Nomor</th><th>Kategori</th><th>Stok</th><th>Tanggal</th><th>Aksi</th>
    </tr>
    @foreach($kendaraans as $k)
    <tr>
        <td>{{ $k->id }}</td>
        <td>{{ $k->plat_nomor }}</td>
        <td>{{ $k->category->nama_category }}</td>
        <td>{{ $k->jumlah_stok }}</td>
        <td>{{ $k->tanggal_input }}</td>
        <td>
            <a href="{{ route('kendaraan.edit', $k->id) }}">Edit</a> |
            <form action="{{ route('kendaraan.destroy', $k->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
