<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProdukController extends Controller
{
    /**
     * Menampilkan halaman daftar produk dengan filter.
     */
    public function index(Request $request): View
    {
        $categories = Kategori::pluck('name')->all();
        array_unshift($categories, 'all');

        $totalProducts = Produk::where('is_active', true)->count();

        $query = Produk::with('kategori')->where('is_active', true);

        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            // Cari berdasarkan nama produk atau deskripsi
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }

        if ($request->filled('category') && $request->input('category') !== 'all') {
            $categoryName = $request->input('category');
            $query->whereHas('kategori', function ($q) use ($categoryName) {
                $q->where('name', $categoryName);
            });
        }

        $filteredProducts = $query->latest()->get();
        return view('produk.index', [
            'categories' => $categories,
            'totalProducts' => $totalProducts,
            'filteredProducts' => $filteredProducts,
        ]);
    }

    /**
     * Menampilkan halaman detail satu produk.
     * Menggunakan Route Model Binding untuk mengambil data produk secara otomatis.
     */
    public function show(Produk $produk): View
    {
        if (!$produk->is_active) {
            abort(404);
        }
        $settings = Setting::first();
        $recommendedProducts = Produk::where('is_active', true)
            ->where('category_id', $produk->category_id)
            ->where('id', '!=', $produk->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('produk.show', [
            'product' => $produk,
            'settings' => $settings,
            'recommendedProducts' => $recommendedProducts,
        ]);
    }
}
