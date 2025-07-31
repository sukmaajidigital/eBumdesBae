<?php

use Illuminate\Support\Facades\Route;

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
});
