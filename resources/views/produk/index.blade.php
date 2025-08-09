
@php
  // Helper untuk format harga, bisa juga diletakkan di AppServiceProvider
    if (!function_exists('formatPrice')) {
        function formatPrice($price) {
            return 'Rp ' . number_format($price, 0, ',', '.');
        }
    }
@endphp

<x-layouts>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-emerald-100">

        <!-- Header Sticky dengan Filter -->
        <div class="bg-white/80 backdrop-blur-sm border-b border-gray-200 shadow-sm">
            <div class="container mx-auto px-4 py-6">
                <div class="flex flex-col md:flex-row gap-4 items-start md:items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-1">Semua Produk BUMDES</h1>
                        <p class="text-gray-600">Temukan produk berkualitas dari BUMDES di seluruh Indonesia</p>
                    </div>
                </div>

                <!-- Form Filter -->
                <form action="{{ url()->current() }}" method="GET" class="flex flex-col md:flex-row gap-4 mt-6">
                    <div class="relative flex-1">
                        <x-lucide-search class="absolute left-3.5 top-1/2 transform -translate-y-1/2 text-gray-400 h-5 w-5" />
                        <input
                            name="search"
                            type="text"
                            placeholder="Cari produk..."
                            value="{{ request('search') }}"
                            class="w-full pl-12 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
                        />
                    </div>
                    <div class="relative w-full md:w-52">
                         <select name="category" onchange="this.form.submit()" class="w-full appearance-none bg-white border border-gray-300 rounded-lg py-2.5 px-4 pr-10 focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition">
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" @selected(request('category', 'all') == $cat)>
                                    {{ $cat === 'all' ? 'Semua Kategori' : $cat }}
                                </option>
                            @endforeach
                        </select>
                        <x-lucide-chevron-down class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 h-5 w-5 pointer-events-none" />
                    </div>
                    {{-- Tombol submit bisa disembunyikan jika select sudah auto-submit --}}
                    <button type="submit" class="hidden">Cari</button>
                </form>
            </div>
        </div>

        <!-- Konten Produk -->
        <main class="container mx-auto px-4 py-8">
            <div class="mb-6 flex items-center justify-between">
                <p class="text-gray-600">
                    Menampilkan <strong>{{ $filteredProducts->count() }}</strong> dari <strong>{{ count($products) }}</strong> produk
                </p>
                <div class="flex items-center gap-2 bg-emerald-100 text-emerald-800 text-xs font-semibold px-3 py-1 rounded-full">
                    <x-lucide-filter class="h-4 w-4" />
                    <span>{{ request('category', 'all') === 'all' ? 'Semua' : request('category') }}</span>
                </div>
            </div>

            <!-- Grid Produk -->
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($filteredProducts as $product)
                    <div class="group overflow-hidden rounded-xl bg-white/50 backdrop-blur-sm shadow-lg hover:shadow-2xl transition-all duration-300 border border-white/20 transform">
                        <div class="relative overflow-hidden">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                            <div class="absolute top-2 right-2 bg-emerald-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                                {{ $product['category'] }}
                            </div>
                        </div>
                        <div class="p-4 flex flex-col flex-grow">
                            <h3 class="font-semibold text-lg text-gray-800 mb-2" title="{{ $product['name'] }}">
                                {{ $product['name'] }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-3">{{ $product['description'] }}</p>
                            <div class="flex justify-between items-center mt-auto pt-2">
                                <span class="text-xs text-gray-500">{{ $product['size'] }}</span>
                                <span class="font-bold text-emerald-700 text-lg">{{ formatPrice($product['price']) }}</span>
                            </div>
                            <button class="w-full mt-4 flex items-center justify-center bg-emerald-600 text-white text-sm font-semibold py-2 px-4 rounded-lg hover:bg-emerald-700 transition-colors">
                                <x-lucide-shopping-cart class="h-4 w-4 mr-2" />
                                Beli Sekarang
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 bg-white/50 backdrop-blur-sm rounded-xl">
                        <x-lucide-search-x class="h-16 w-16 mx-auto text-gray-400 mb-4" />
                        <h3 class="text-xl font-semibold text-gray-700">Produk Tidak Ditemukan</h3>
                        <p class="text-gray-500 mt-2">Coba sesuaikan kata kunci pencarian atau filter kategori Anda.</p>
                    </div>
                @endforelse
            </div>
        </main>
    </div>
</x-layouts>
