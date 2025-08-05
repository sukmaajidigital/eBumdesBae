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
            'base_name'   => 'BUMDES Tunjung Seto Desa Bae Kudus',
            'description' => 'Pusat produk unggulan dan layanan masyarakat dari BUMDes Tunjung Seto, berlokasi di Desa Bae, Kudus. Berkomitmen untuk memajukan perekonomian lokal.',
            'email'       => 'info.bumdesbae@example.com',
            'phone'       => '6281234567890',
            'address'     => 'Jl. Raya Kudus - Colo KM 5, Desa Bae, Kecamatan Bae, Kabupaten Kudus, Jawa Tengah',
        ]);
    }
}
