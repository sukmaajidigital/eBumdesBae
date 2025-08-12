<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class settingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'base_name'   => 'BUMDES Tunjung Seto',
            'description' => 'BUMDes Tunjung Seto merupakan motor penggerak ekonomi di Desa Bae, Kudus. Kami hadir untuk memberdayakan masyarakat dengan mengangkat dan memasarkan potensi lokal. Melalui platform digital ini, kami menyajikan produk-produk unggulan hasil karya warga, seperti eco enzyme, media tanam, dan pupuk organik yang berkualitas. Setiap pembelian Anda adalah dukungan nyata bagi kemandirian dan kesejahteraan masyarakat desa.',
            'email'       => 'info.bumdesbae@gmail.com',
            'phone'       => '6281325358266',
            'address'     => 'Jl. Raya Kudus - Colo KM 5, Desa Bae, Kecamatan Bae, Kabupaten Kudus, Jawa Tengah',
        ]);
    }
}
