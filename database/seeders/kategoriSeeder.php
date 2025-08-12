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
                'name' => 'Produk Pertanian',
                'description' => 'Produk untuk pertanian.'
            ],
        ];

        // Masukkan data ke dalam tabel
        foreach ($kategoris as $kategori) {
            Kategori::create($kategori);
        }
    }
}
