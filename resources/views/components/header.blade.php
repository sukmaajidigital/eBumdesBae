@php
    // Definisikan item menu sebagai variabel PHP
    $menuItems = [
        ['name' => 'Home', 'href' => '#home'],
        ['name' => 'Tentang', 'href' => '#about'],
        ['name' => 'Manfaat', 'href' => '#benefits'],
        ['name' => 'Produk', 'href' => 'produk'],
        ['name' => 'Kontak', 'href' => '#contact'],
    ];
@endphp

{{-- Inisialisasi komponen Alpine.js untuk state management --}}
<header x-data="{ isMenuOpen: false }" class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('homepage') }}" class="flex items-center space-x-2">
                <x-lucide-leaf class="h-8 w-8 text-green-600" />
                <span class="text-2xl font-bold text-gray-800 ">EcoEnzyme</span>
            </a>

            {{-- Menu Desktop --}}
            <nav class="hidden md:flex space-x-8">
                @foreach ($menuItems as $item)
                    <a href="{{ $item['href'] }}"
                        class="text-gray-600 hover:text-green-600 transition-colors font-medium">
                        {{ $item['name'] }}
                    </a>
                @endforeach
            </nav>

            {{-- Tombol Menu Mobile --}}
            <button class="md:hidden" @click="isMenuOpen = !isMenuOpen">
                {{-- Ikon berubah berdasarkan state 'isMenuOpen' --}}
                <x-lucide-menu x-show="!isMenuOpen" class="h-6 w-6 text-gray-600" />
                <x-lucide-x x-show="isMenuOpen" x-cloak class="h-6 w-6 text-gray-600" />
            </button>
        </div>

        {{-- Menu Mobile (Muncul berdasarkan state 'isMenuOpen') --}}
        <nav class="md:hidden mt-4 pb-4" x-show="isMenuOpen" x-cloak @click.away="isMenuOpen = false"
            {{-- Menu akan tertutup jika klik di luar area --}} x-transition>
            @foreach ($menuItems as $item)
                <a href="{{ $item['href'] }}"
                    class="block py-2 text-gray-600 hover:text-green-600 transition-colors"
                    @click="isMenuOpen = false" {{-- Menu akan tertutup setelah item diklik --}}>
                    {{ $item['name'] }}
                </a>
            @endforeach
        </nav>
    </div>
</header>
