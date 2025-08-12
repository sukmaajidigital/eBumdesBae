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
        $pertanian = Kategori::where('name', 'Produk Pertanian')->first();

        $produks = [
            [
                'name' => 'Eco Enzim',
                'category_id' => $pertanian->id,
                'price' => 25000,
                'description' => 'Eco Enzim 1 liter adalah produk ramah lingkungan yang terbuat dari fermentasi bahan organik, seperti buah-buahan, sayuran, dan gula. Produk ini memiliki berbagai manfaat, termasuk: pupuk organik,pembersih alami,penganti pupuk kimia.',
                'image' => 'mainproduk/eco.jpg'
            ],
            [
                'name' => 'Pupuk Urin Kelinci',
                'category_id' => $pertanian->id,
                'price' => 25000,
                'description' => 'Pupuk organik urine kelinci adalah solusi alami yang kaya nutrisi untuk meningkatkan kesuburan tanah dan pertumbuhan tanaman. Terbuat dari urine kelinci yang diformulasikan secara khusus, produk ini memiliki sejumlah manfaat sebagai berikut: kaya nutrisi,meningkatkan struktur tanah dan ramah lingkungan',
                'image' => 'mainproduk/urinkelinci.jpg'
            ],
            [
                'name' => 'Media Tanam Tunjung Seto Farm',
                'category_id' => $pertanian->id,
                'price' => 15000,
                'description' => 'Media Tanam Tunjung Seto Farm adalah campuran berkualitas tinggi yang dirancang khusus untuk mendukung pertumbuhan tanaman secara optimal. Kombinasi bahan-bahan alami ini terdiri dari: tanah merah, skam lapuk,skam bakar,kompos.Produk ini sangat cocok untuk berbagai jenis tanaman, baik sayuran, buah-buahan, maupun tanaman hias.',
                'image' => 'mainproduk/mediatanam.jpg'
            ],
            [
                'name' => 'Pupuk Kandang Kambing',
                'category_id' => $pertanian->id,
                'price' => 15000,
                'description' => 'Pupuk Kandang Kambing Organik Murni dan Halus adalah solusi alami yang ideal untuk meningkatkan kesuburan tanah dan pertumbuhan tanaman. Diproduksi dengan proses yang ramah lingkungan, produk ini menawarkan berbagai keunggulan, antara lain: kandungan nutrisi tinggi, ramah lingkungan, tekstur halus. Pupuk ini sangat cocok untuk semua jenis tanaman, baik di kebun rumah maupun lahan pertanian.',
                'image' => 'mainproduk/pupukkandangkambing.jpg'
            ],
        ];

        // Masukkan data ke dalam tabel
        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}
