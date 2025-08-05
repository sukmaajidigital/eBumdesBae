<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            [
                'name' => 'Makanan & Minuman',
                'description' => 'Produk olahan pangan dan minuman segar khas Desa Bae.'
            ],
            [
                'name' => 'Kerajinan Tangan',
                'description' => 'Hasil karya seni dan kerajinan tangan dari para pengrajin lokal.'
            ],
            [
                'name' => 'Produk Pertanian',
                'description' => 'Hasil bumi segar langsung dari petani di lingkungan Desa Bae.'
            ],
            [
                'name' => 'Jasa & Wisata',
                'description' => 'Paket layanan dan wisata untuk menikmati keindahan dan keunikan Desa Bae.'
            ],
        ];

        // Masukkan data ke dalam tabel
        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
