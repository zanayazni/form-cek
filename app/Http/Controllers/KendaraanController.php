<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Category;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index() {
        return view('cek-stok');
    }

    public function cekStok(Request $request) {
        $request->validate([
            'plat_nomor' => 'required',
            'jumlah_stok' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'tanggal_input' => 'required|date',
        ]);

        $kendaraan = Kendaraan::where('plat_nomor', $request->plat_nomor)
            ->where('category_id', $request->category_id)
            ->where('tanggal_input', $request->tanggal_input)
            ->first();

        if ($kendaraan) {
            $status = $kendaraan->jumlah_stok == $request->jumlah_stok ? 'Sesuai' : 'Tidak Sesuai';
            return response()->json(['status' => $status]);
        }

        return response()->json(['status' => 'Kendaraan tidak ditemukan']);
    }

    // === CRUD ===

    public function list() {
        $kendaraans = Kendaraan::with('category')->get();
        return view('kendaraan.index', compact('kendaraans'));
    }

    public function create() {
        $categories = Category::all();
        return view('kendaraan.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'plat_nomor' => 'required|unique:kendaraans',
            'category_id' => 'required',
            'jumlah_stok' => 'required|integer',
        ]);

        Kendaraan::create([
            'plat_nomor' => $request->plat_nomor,
            'category_id' => $request->category_id,
            'jumlah_stok' => $request->jumlah_stok,
            'tanggal_input' => $request->tanggal_input,
        ]);

        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil ditambahkan.');
    }

    public function edit($id) {
        $kendaraan = Kendaraan::findOrFail($id);
        $categories = Category::all();
        return view('kendaraan.edit', compact('kendaraan', 'categories'));
    }

    public function update(Request $request, $id) {
        $kendaraan = Kendaraan::findOrFail($id);

        $request->validate([
            'plat_nomor' => 'required|unique:kendaraans,plat_nomor,' . $id,
            'category_id' => 'required',
            'jumlah_stok' => 'required|integer',
            'tanggal_input' => 'required|date'
        ]);

        $kendaraan->update([
            'plat_nomor' => $request->plat_nomor,
            'category_id' => $request->category_id,
            'jumlah_stok' => $request->jumlah_stok,
            'tanggal_input' => $request->tanggal_input,
        ]);

        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil diubah.');
    }

    public function destroy($id) {
        Kendaraan::findOrFail($id)->delete();
        return redirect()->route('kendaraan.index')->with('success', 'Data kendaraan berhasil dihapus.');
    }
}


