<h2>Cek Stok Kendaraan</h2>
<form id="cekForm">
    @csrf
    <label>Plat Nomor:</label><br>
    <input type="text" name="plat_nomor" required><br><br>

    <label>Jumlah Stok:</label><br>
    <input type="number" name="jumlah_stok" required><br><br>

    <label>Kategori:</label><br>
    <select name="category_id" required>
        @foreach(\App\Models\Category::all() as $cat)
            <option value="{{ $cat->id }}">{{ $cat->nama_category }}</option>
        @endforeach
    </select><br><br>

    <label>Tanggal Input Kendaraan:</label><br>
    <input type="date" name="tanggal_input" required><br><br>

    <button type="submit">Cek</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('cekForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    axios.post('{{ route("cek.stok") }}', {
        plat_nomor: formData.get('plat_nomor'),
        jumlah_stok: formData.get('jumlah_stok'),
        category_id: formData.get('category_id'),
        tanggal_input: formData.get('tanggal_input')
    })
    .then(response => {
        Swal.fire('Hasil Pengecekan', response.data.status, 'info');
    })
    .catch(error => {
        Swal.fire('Error', 'Gagal mengecek data.', 'error');
    });
});
</script>
