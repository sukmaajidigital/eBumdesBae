<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class produkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Ambil ID dari setiap kategori
        $makanan = Kategori::where('name', 'Makanan & Minuman')->first();
        $kerajinan = Kategori::where('name', 'Kerajinan Tangan')->first();
        $pertanian = Kategori::where('name', 'Produk Pertanian')->first();

        $produks = [
            [
                'name' => 'Kopi Robusta Asli Lereng Muria',
                'category_id' => $pertanian->id,
                'price' => 55000,
                'description' => 'Biji kopi robusta pilihan yang dipetik dari perkebunan di lereng Gunung Muria, menghasilkan aroma yang kuat dan cita rasa yang khas.',
                'image' => 'https://placehold.co/600x400/EFEFEF/AAAAAA&text=Kopi+Robusta'
            ],
            [
                'name' => 'Keripik Pisang Aneka Rasa',
                'category_id' => $makanan->id,
                'price' => 15000,
                'description' => 'Keripik renyah dari pisang kepok pilihan, tersedia dalam rasa original, coklat, dan balado. Cocok untuk camilan setiap saat.',
                'image' => 'https://placehold.co/600x400/EFEFEF/AAAAAA&text=Keripik+Pisang'
            ],
            [
                'name' => 'Tas Anyaman Enceng Gondok',
                'category_id' => $kerajinan->id,
                'price' => 125000,
                'description' => 'Tas wanita elegan hasil anyaman tangan dari serat enceng gondok yang dikeringkan. Unik, ramah lingkungan, dan stylish.',
                'image' => 'https://placehold.co/600x400/EFEFEF/AAAAAA&text=Tas+Anyaman'
            ],
            [
                'name' => 'Madu Murni Randu',
                'category_id' => $pertanian->id,
                'price' => 80000,
                'description' => 'Madu murni yang dihasilkan dari nektar bunga randu oleh lebah ternak lokal. Berkhasiat untuk menjaga stamina dan kesehatan.',
                'image' => 'https://placehold.co/600x400/EFEFEF/AAAAAA&text=Madu+Murni'
            ],
            [
                'name' => 'Sandal Batik Kayu',
                'category_id' => $kerajinan->id,
                'price' => 75000,
                'description' => 'Sandal kayu yang nyaman dengan ukiran dan lapisan kain batik tulis khas Kudus. Memberikan sentuhan etnik pada penampilan Anda.',
                'image' => 'https://placehold.co/600x400/EFEFEF/AAAAAA&text=Sandal+Batik'
            ],
        ];

        // Masukkan data ke dalam tabel
        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}
