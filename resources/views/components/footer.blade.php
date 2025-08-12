@php
    $settings = \App\Models\Setting::first();
@endphp
<footer class="bg-green-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <img src="{{ asset('logo/logo-white-fill.png') }}" alt="Logo" class="h-10 w-10">
                    {{-- Menggunakan nama BUMDES dari database --}}
                    <span class="text-2xl font-bold">{{ $settings->base_name ?? 'EcoEnzyme' }}</span>
                </div>
                {{-- Menggunakan potongan deskripsi dari database --}}
                <p class="text-green-200 mb-4">
                    {{ $settings->description }}
                </p>
                {{-- Catatan: Link sosial media ini masih statis. Anda bisa menambahkannya di tabel settings jika perlu. --}}
                <div class="flex space-x-4">
                    <a href="#" class="bg-green-700 p-2 rounded-full hover:bg-green-600 transition-colors">
                        <x-lucide-instagram class="h-5 w-5" />
                    </a>
                    <a href="#" class="bg-green-700 p-2 rounded-full hover:bg-green-600 transition-colors">
                        <x-lucide-facebook class="h-5 w-5" />
                    </a>
                    <a href="#" class="bg-green-700 p-2 rounded-full hover:bg-green-600 transition-colors">
                        <x-lucide-twitter class="h-5 w-5" />
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-2">Developed by</h3>
                <h4 class="text-base font-medium text-green-300 mb-4">Tim KKN UMK Desa Bae 2025</h4>

                {{-- Daftar developer dengan jarak vertikal --}}
                <div class="space-y-3">

                    {{-- Developer 1 --}}
                    <a href="http://github.com/sukmaajidigital" target="_blank" rel="noopener noreferrer" class="inline-flex items-center space-x-2 text-green-200 hover:text-white transition-colors">
                        <x-lucide-github class="h-5 w-5" />
                        <span>Muhammad Aji Sukma</span>
                    </a>

                    {{-- Developer 2 --}}
                    <a href="https://github.com/BitwiseJs" target="_blank" rel="noopener noreferrer" class="inline-flex items-center space-x-2 text-green-200 hover:text-white transition-colors">
                        <x-lucide-github class="h-5 w-5" />
                        <span>Moh Fauzan Asrori</span>
                    </a>

                </div>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">Hubungi Kami</h3>
                {{-- Menggunakan data kontak dari database --}}
                <div class="space-y-2 text-green-200">
                    <p>WhatsApp: {{ $settings->phone ?? 'N/A' }}</p>
                    <p>Email: {{ $settings->email ?? 'N/A' }}</p>
                    <p>Alamat: {{ $settings->address ?? 'N/A' }}</p>
                </div>
                @if ($settings->phone)
                    @php
                        // Membersihkan nomor telepon untuk link wa.me
                        $wa_number = preg_replace('/[^0-9]/', '', $settings->phone);
                        // Jika nomor diawali 0, ganti dengan 62
                        if (substr($wa_number, 0, 1) === '0') {
                            $wa_number = '62' . substr($wa_number, 1);
                        }
                    @endphp
                    <div class="mt-4">
                        <a href="https://wa.me/{{ $wa_number }}" target="_blank" rel="noopener noreferrer" class="inline-block bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-500 transition-colors">
                            Chat WhatsApp
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <div class="border-t border-green-700 mt-8 pt-8 text-center text-green-200">
            {{-- Menggunakan tahun dan nama BUMDES dinamis --}}
            <p>&copy; {{ date('Y') }} {{ $settings->base_name ?? 'BUMDES' }}</p>
        </div>
    </div>
</footer>
