<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class settingController extends Controller
{
    /**
     * Display the settings page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Kita gunakan firstOrCreate untuk memastikan selalu ada data setting.
        // Jika tabel kosong, data baru akan dibuat dengan nilai default.
        // Jika sudah ada, data pertama akan diambil.
        $settings = Setting::firstOrCreate([], [
            'base_name' => 'Nama Toko Default',
            'description' => 'Deskripsi Toko Default.',
            'email' => 'admin@example.com',
            'phone' => '081234567890',
            'address' => 'Alamat Toko Default.',
        ]);

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update the settings in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'base_name' => 'required|string|max:255',
            'description' => 'required|string',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        // Cari data setting (seharusnya hanya ada satu) dan update
        $settings = Setting::first();
        if ($settings) {
            $settings->update($validated);
        }

        // Redirect kembali ke halaman settings dengan pesan sukses
        return redirect()->route('admin.settings')->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
