<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-Katalog UMKM</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
        }
    </style>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-gray-50 dark:bg-black text-gray-900 flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-6xl max-w-[335px] text-sm mb-6">
        @if (Route::has('login'))
            <nav class="flex items-center justify-between gap-4">
                <a href="#" class="font-bold text-lg text-gray-800 dark:text-white">UMKM BAE</a>
                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-2 dark:text-gray-200 border-gray-800 hover:bg-gray-800 hover:text-white border text-gray-800 dark:border-gray-400 dark:hover:bg-gray-200 dark:hover:text-black rounded-lg text-sm leading-normal transition-colors duration-300">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-block px-5 py-2 dark:text-gray-200 text-gray-800 border border-transparent hover:text-blue-600 dark:hover:text-blue-400 rounded-lg text-sm leading-normal transition-colors duration-300">
                            Masuk
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-block px-5 py-2 text-white bg-blue-600 hover:bg-blue-700 border border-transparent dark:bg-blue-500 dark:hover:bg-blue-600 rounded-lg text-sm leading-normal transition-colors duration-300">
                                Daftar
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        @endif
    </header>
    <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-6xl lg:flex-row lg:gap-12">
            <!-- Kolom Teks / Informasi -->
            <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-10 bg-white dark:bg-gray-900 dark:text-gray-200 shadow-xl dark:shadow-2xl rounded-b-lg lg:rounded-l-lg lg:rounded-b-none flex flex-col justify-center">
                <h1 class="text-3xl lg:text-4xl font-bold mb-4 text-gray-900 dark:text-white">Project Started</h1>
                <h1 class="text-3xl lg:text-4xl font-bold mb-4 text-gray-900 dark:text-white">E-Katalog UMKM Desa Bae</h1>
                <p class="mb-6 text-gray-600 dark:text-gray-400 text-base">Temukan produk-produk terbaik dari UMKM di sekitar Anda. Dukung pertumbuhan ekonomi lokal dengan setiap pembelian.</p>
                <h2 class="font-semibold mb-3 text-lg text-gray-800 dark:text-gray-300">Kategori Populer:</h2>
                <ul class="flex flex-col mb-6 space-y-3">
                    <li class="flex items-center gap-3">
                        <span class="flex items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900/50 w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0c-.454-.303-.977-.454-1.5-.454V5.454c.523 0 1.046-.151 1.5-.454a2.704 2.704 0 013 0 2.704 2.704 0 003 0 2.704 2.704 0 013 0 2.704 2.704 0 003 0c.454.303.977.454 1.5.454v10.092zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </span>
                        <span>Kuliner & Makanan Ringan</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="flex items-center justify-center rounded-full bg-green-100 dark:bg-green-900/50 w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </span>
                        <span>Fashion & Aksesoris</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="flex items-center justify-center rounded-full bg-purple-100 dark:bg-purple-900/50 w-8 h-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.05 10.1c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                        </span>
                        <span>Kerajinan Tangan & Seni</span>
                    </li>
                </ul>
                <div class="mt-auto pt-6">
                    <a href="#" class="inline-block w-full text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:text-white hover:bg-blue-700 px-8 py-3 bg-blue-600 rounded-lg text-white text-base leading-normal font-semibold transition-colors duration-300">
                        Lihat Semua Produk
                    </a>
                </div>
            </div>

            <!-- Kolom Galeri Produk -->
            <div class="bg-gray-100 dark:bg-gray-800/50 relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-r-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[550px] shrink-0 overflow-hidden p-6 lg:p-8">
                <div class="grid grid-cols-2 gap-4 h-full w-full">
                    <!-- Product Card 1 -->
                    <div class="relative group overflow-hidden rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
                        <img src="https://placehold.co/300x400/3498db/ffffff?text=Kopi+Lokal" alt="Produk Kopi" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div>
                                <h3 class="text-white font-bold text-lg">Kopi Gayo Premium</h3>
                                <p class="text-gray-200 text-sm">Rp 75.000</p>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 2 -->
                    <div class="relative group overflow-hidden rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
                        <img src="https://placehold.co/300x400/e74c3c/ffffff?text=Batik+Unik" alt="Produk Batik" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div>
                                <h3 class="text-white font-bold text-lg">Batik Tulis Madura</h3>
                                <p class="text-gray-200 text-sm">Rp 350.000</p>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 3 -->
                    <div class="relative group overflow-hidden rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
                        <img src="https://placehold.co/300x400/2ecc71/ffffff?text=Camilan+Enak" alt="Produk Camilan" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div>
                                <h3 class="text-white font-bold text-lg">Keripik Tempe Sagu</h3>
                                <p class="text-gray-200 text-sm">Rp 25.000</p>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card 4 -->
                    <div class="relative group overflow-hidden rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105">
                        <img src="https://placehold.co/300x400/9b59b6/ffffff?text=Kerajinan" alt="Produk Kerajinan" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-end p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div>
                                <h3 class="text-white font-bold text-lg">Tas Anyaman Rotan</h3>
                                <p class="text-gray-200 text-sm">Rp 150.000</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-0 rounded-t-lg lg:rounded-r-lg shadow-[inset_0px_0px_0px_1px_rgba(0,0,0,0.05)] dark:shadow-[inset_0px_0px_0px_1px_rgba(255,255,255,0.1)]"></div>
            </div>
        </main>
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
