<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomepageController extends Controller
{
    /**
     * Menampilkan halaman utama (landing page).
     */
    public function index(): View
    {
        // 1. Ambil data pengaturan umum dari tabel settings
        $settings = Setting::first();

        // 2. Ambil 3 produk terbaru yang aktif untuk ditampilkan di section "Produk Kami"
        $products = Produk::where('is_active', true)
            ->latest() // Urutkan dari yang paling baru
            ->take(3)  // Ambil hanya 3 produk
            ->get();


        // 3. Kirim data settings dan products ke view
        return view('homepage.index', compact('settings', 'products'));
    }

    /**
     * Menampilkan halaman "Tentang Kami".
     */
    public function about(): View
    {
        // 1. Ambil data pengaturan umum dari tabel settings
        $settings = Setting::first();

        // 2. Kirim data settings ke view
        return view('homepage.about', compact('settings'));
    }
}
