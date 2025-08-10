<?php

use App\Http\Controllers\admin\kategoriController;
use App\Http\Controllers\admin\produkController;
use App\Http\Controllers\admin\settingController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


Route::prefix('admin')->group(function () {
    // OVERVIEW
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    // KATEGORI
    Route::prefix('kategori')->group(function () {
        Route::get('/', [kategoriController::class, 'index'])->name('admin.kategori.index');
        Route::post('/', [kategoriController::class, 'store'])->name('admin.kategori.store');
        Route::put('/{kategori}', [kategoriController::class, 'update'])->name('admin.kategori.update');
        Route::delete('/{kategori}', [kategoriController::class, 'destroy'])->name('admin.kategori.destroy');
    });
    // PRODUK
    Route::prefix('produk')->group(function () {
        Route::get('/', [produkController::class, 'index'])->name('admin.produk.index');
        Route::get('/form', [produkController::class, 'create'])->name('admin.produk.form');
        Route::post('/store', [produkController::class, 'store'])->name('admin.produk.store');
        Route::get('/{produk}/edit', [produkController::class, 'edit'])->name('admin.produk.edit');
        Route::put('/{produk}/update', [produkController::class, 'update'])->name('admin.produk.update');
        Route::delete('/{produk}/destroy', [produkController::class, 'destroy'])->name('admin.produk.destroy');
    });
    // SETTING
    Route::prefix('settings')->group(function () {
        Route::get('/', [settingController::class, 'index'])->name('admin.settings');

        Route::post('/update', [settingController::class, 'update'])->name('admin.settings.update');
    });
});

Route::get('/', function () {
    $products = [
        [
            'name' => 'Eco Enzyme Original',
            'size' => '500ml',
            'price' => 'Rp 25.000',
            'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80',
            'description' => 'Konsentrasi standar untuk pembersihan rumah tangga sehari-hari'
        ],
        [
            'name' => 'Eco Enzyme Concentrate',
            'size' => '1L',
            'price' => 'Rp 45.000',
            'image' => 'https://images.unsplash.com/photo-1465146344425-f00d5f5c8f07?auto=format&fit=crop&w=400&q=80',
            'description' => 'Konsentrasi tinggi untuk pembersihan heavy duty dan pupuk tanaman'
        ],
        [
            'name' => 'Eco Enzyme Starter Kit',
            'size' => '250ml x 3',
            'price' => 'Rp 60.000',
            'image' => 'https://images.unsplash.com/photo-1498936178812-4b2e558d2937?auto=format&fit=crop&w=400&q=80',
            'description' => 'Paket lengkap untuk mencoba berbagai kegunaan Eco Enzyme'
        ]
    ];

    $benefits = [
        [
            'icon' => 'shield', // Nama ikon sebagai string
            'title' => 'Ramah Lingkungan',
            'description' => 'Tidak mengandung bahan kimia berbahaya yang dapat mencemari air dan tanah'
        ],
        [
            'icon' => 'sparkles',
            'title' => 'Pembersih Alami',
            'description' => 'Efektif membersihkan noda, lemak, dan bakteri tanpa meninggalkan residu'
        ],
        [
            'icon' => 'sprout',
            'title' => 'Pupuk Organik',
            'description' => 'Dapat digunakan sebagai pupuk cair untuk menyuburkan tanaman'
        ],
        [
            'icon' => 'heart',
            'title' => 'Aman untuk Keluarga',
            'description' => 'Tidak berbahaya jika tersentuh kulit atau terhirup, aman untuk anak-anak'
        ]
    ];

    return view('homepage.index', compact('products', 'benefits'));
})->name('homepage');

Route::get('/produk', function (Request $request) {
    // Data produk BUMDES
    $allProducts = [
        ['id' => 1, 'name' => 'Eco Enzyme BUMDES Organic', 'size' => '1L', 'price' => 45000, 'image' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?auto=format&fit=crop&w=400&q=80', 'description' => 'Pembersih organik hasil fermentasi limbah buah dan sayuran', 'category' => 'Pembersih', 'stock' => 25, 'rating' => 4.8],
        ['id' => 2, 'name' => 'Pupuk Kandang Kambing Organik', 'size' => '5kg', 'price' => 35000, 'image' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=400&q=80', 'description' => 'Pupuk organik murni dari kotoran kambing untuk tanaman subur', 'category' => 'Pupuk', 'stock' => 40, 'rating' => 4.7],
        ['id' => 3, 'name' => 'Media Tanam Organik Premium', 'size' => '10kg', 'price' => 55000, 'image' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=400&q=80', 'description' => 'Campuran tanah, kompos, dan pupuk organik untuk media tanam', 'category' => 'Media Tanam', 'stock' => 30, 'rating' => 4.9],
        ['id' => 4, 'name' => 'Pupuk Kompos BUMDES', 'size' => '8kg', 'price' => 40000, 'image' => 'https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?auto=format&fit=crop&w=400&q=80', 'description' => 'Kompos organik dari sampah organik desa, kaya nutrisi', 'category' => 'Pupuk', 'stock' => 35, 'rating' => 4.6],
        ['id' => 5, 'name' => 'Pupuk Cair Organik', 'size' => '2L', 'price' => 65000, 'image' => 'https://images.unsplash.com/photo-1465146344425-f00d5f5c8f07?auto=format&fit=crop&w=400&q=80', 'description' => 'Pupuk cair organik untuk pertumbuhan tanaman maksimal', 'category' => 'Pupuk', 'stock' => 20, 'rating' => 4.8],
        ['id' => 6, 'name' => 'Pestisida Organik Nabati', 'size' => '500ml', 'price' => 30000, 'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80', 'description' => 'Pestisida alami dari ekstrak tumbuhan untuk melindungi tanaman', 'category' => 'Pestisida', 'stock' => 50, 'rating' => 4.5],
        ['id' => 7, 'name' => 'Pupuk NPK Organik Plus', 'size' => '3kg', 'price' => 48000, 'image' => 'https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?auto=format&fit=crop&w=400&q=80', 'description' => 'Pupuk lengkap dengan kandungan NPK tinggi untuk semua jenis tanaman', 'category' => 'Pupuk', 'stock' => 28, 'rating' => 4.7],
        ['id' => 8, 'name' => 'Bibit Sayuran Organik', 'size' => 'Paket 10 bibit', 'price' => 25000, 'image' => 'https://images.unsplash.com/photo-1465146344425-f00d5f5c8f07?auto=format&fit=crop&w=400&q=80', 'description' => 'Paket bibit sayuran organik siap tanam untuk kebun rumah akuu bukan siapa siapa dan apa yang bisa dibaca oleh orang biasa Paket bibit sayuran organik siap tanam untuk kebun rumah akuu bukan siapa siapa dan apa yang bisa dibaca oleh orang biasa Paket bibit sayuran organik siap tanam untuk kebun rumah akuu bukan siapa siapa dan apa yang bisa dibaca oleh orang biasa Paket bibit sayuran organik siap tanam untuk kebun rumah akuu bukan siapa siapa dan apa yang bisa dibaca oleh orang biasa', 'category' => 'Bibit', 'stock' => 60, 'rating' => 4.9]
    ];
    $categories = ['all', 'Pupuk', 'Pembersih', 'Media Tanam', 'Pestisida', 'Bibit'];

    $filteredProducts = collect($allProducts);

    // Filter berdasarkan pencarian
    if ($request->filled('search')) {
        $search = strtolower($request->search);
        $filteredProducts = $filteredProducts->filter(function ($product) use ($search) {
            return Str::contains(strtolower($product['name']), $search) || 
                   Str::contains(strtolower($product['description']), $search);
        });
    }

    // Filter berdasarkan kategori
    if ($request->filled('category') && $request->category !== 'all') {
        $filteredProducts = $filteredProducts->where('category', $request->category);
    }

    return view('produk.index', [
        'products' => $allProducts,
        'filteredProducts' => $filteredProducts,
        'categories' => $categories,
    ]);
});

Route::get('/produk/tes', function () {

    return view('produk.show');
})->name('produk.show');