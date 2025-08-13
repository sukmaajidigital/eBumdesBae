{{-- Inisialisasi komponen Alpine.js untuk state management --}}
@php
    $setting = \App\Models\Setting::first();
@endphp
<header x-data="{ isMenuOpen: false }" class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('homepage') }}" class="flex items-center space-x-2">
                <img src="{{ asset('logo/logo-bumdes-cut.png') }}" alt="Logo" class="h-10 w-10">
                <span class="text-2xl font-bold text-gray-800">{{ $setting->base_name }}</span>
            </a>

            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('homepage') }}" class="text-gray-600 hover:text-green-600 transition-colors font-medium">Home</a>
                <a href="{{ route('about') }}" class="text-gray-600 hover:text-green-600 transition-colors font-medium">Tentang</a>
                {{-- <a href="{{ route('homepage') }}#benefits" class="text-gray-600 hover:text-green-600 transition-colors font-medium">Manfaat</a> --}}
                <a href="{{ route('produk.index') }}" class="text-gray-600 hover:text-green-600 transition-colors font-medium">Produk</a>
                <a href="#contact" class="text-gray-600 hover:text-green-600 transition-colors font-medium">Kontak</a>
            </nav>

            {{-- Tombol Menu Mobile --}}
            <button class="md:hidden" @click="isMenuOpen = !isMenuOpen">
                {{-- Ikon berubah berdasarkan state 'isMenuOpen' --}}
                <x-lucide-menu x-show="!isMenuOpen" class="h-6 w-6 text-gray-600" />
                <x-lucide-x x-show="isMenuOpen" x-cloak class="h-6 w-6 text-gray-600" />
            </button>
        </div>

        <nav class="md:hidden mt-4 pb-4" x-show="isMenuOpen" x-cloak @click.away="isMenuOpen = false" x-transition>
            <a href="{{ route('homepage') }}#home" class="block py-2 text-gray-600 hover:text-green-600 transition-colors" @click="isMenuOpen = false">Home</a>
            <a href="{{ route('about') }}" class="block py-2 text-gray-600 hover:text-green-600 transition-colors" @click="isMenuOpen = false">Tentang</a>
            {{-- <a href="{{ route('homepage') }}#benefits" class="block py-2 text-gray-600 hover:text-green-600 transition-colors" @click="isMenuOpen = false">Manfaat</a> --}}
            <a href="{{ route('produk.index') }}" class="block py-2 text-gray-600 hover:text-green-600 transition-colors" @click="isMenuOpen = false">Produk</a>
            <a href="#contact" class="block py-2 text-gray-600 hover:text-green-600 transition-colors" @click="isMenuOpen = false">Kontak</a>
        </nav>
    </div>
</header>
