<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class produkController extends Controller
{
    /**
     * Menampilkan daftar semua produk.
     */
    public function index()
    {
        // Ambil produk dengan relasi kategori untuk menghindari N+1 problem
        $produks = Produk::with('kategori')->latest()->paginate(10);
        return view('admin.produk.index', compact('produks'));
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        $kategoris = Kategori::all(); // Ambil semua kategori untuk dropdown
        return view('admin.produk.form', compact('kategoris'));
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:kategoris,id',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Opsional, maks 2MB
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Simpan gambar ke storage/app/public/produks
            $validated['image'] = $request->file('image')->store('produks', 'public');
        }

        Produk::create($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit produk.
     */
    public function edit(Produk $produk)
    {
        $kategoris = Kategori::all();
        return view('admin.produk.form', compact('produk', 'kategoris'));
    }

    /**
     * Memperbarui data produk yang ada.
     */
    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:kategoris,id',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($produk->image) {
                Storage::disk('public')->delete($produk->image);
            }
            // Simpan gambar baru
            $validated['image'] = $request->file('image')->store('produks', 'public');
        }

        $produk->update($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Produk $produk)
    {
        // Hapus gambar dari storage sebelum menghapus data dari DB
        if ($produk->image) {
            Storage::disk('public')->delete($produk->image);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
