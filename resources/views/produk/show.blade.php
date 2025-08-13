<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<x-layouts>
    <div x-data="{
        // Inisialisasi data dari controller
        product: @json($product),
        settings: @json($settings),
        quantity: 1,
    
        get totalPrice() {
            const price = parseFloat(this.product.price) || 0;
            return price * this.quantity;
        },
    
        formatPrice(price) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(price);
        },
    
        handleWhatsAppOrder() {
            // Ambil nomor WA dari data settings yang dinamis
            const phoneNumber = this.settings.phone.replace(/[^0-9]/g, '');
            const message = `Halo, saya tertarik untuk memesan produk:\n\n*${this.product.name}*\nJumlah: *${this.quantity}*\nTotal Harga: *${this.formatPrice(this.totalPrice)}*\n\nMohon informasinya. Terima kasih.`;
            const whatsappUrl = `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
        }
    }" class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-emerald-100">

        <main class="container mx-auto px-4 py-10">
            <div class="grid lg:grid-cols-2 gap-10 mb-12">
                <div class="space-y-5">
                    <div class="aspect-square rounded-2xl overflow-hidden bg-gray-100 shadow-lg border border-gray-200">
                        {{-- Menampilkan satu gambar dari kolom 'image' --}}
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product['name'] }}"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" />
                    </div>
                </div>

                <div class="space-y-8">
                    <div>
                        <span
                            class="inline-block bg-emerald-100 text-emerald-800 text-xs font-semibold px-3 py-1 rounded-full mb-3">
                            {{ $product->kategori->name }}
                        </span>
                        <h1 class="text-4xl font-bold text-gray-900 mb-3 leading-tight">{{ $product->name }}</h1>
                        {{-- Menggunakan 'description' sebagai deskripsi lengkap --}}
                        <p class="text-gray-600 text-base leading-relaxed">{{ $product->description }}</p>
                    </div>

                    {{-- Info BUMDES dari tabel Settings --}}
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center">
                            <x-lucide-users class="h-4 w-4 mr-2 text-emerald-600" />
                            <span>{{ $settings->base_name ?? 'BUMDES Lokal' }}</span>
                        </div>
                        <div class="flex items-center">
                            <x-lucide-map-pin class="h-4 w-4 mr-2 text-emerald-600" />
                            <span>{{ $settings->address ?? 'Lokasi tidak tersedia' }}</span>
                        </div>
                    </div>

                    <div class="bg-white/80 backdrop-blur-md rounded-xl p-6 border border-gray-200 shadow-lg">
                        <div class="flex items-baseline gap-2 mb-5">
                            <span class="text-3xl font-bold text-emerald-700"
                                x-text="formatPrice(product.price)"></span>
                            {{-- Info '/ size' dihapus karena kolom 'size' tidak ada --}}
                        </div>

                        <div class="flex items-center gap-4 mb-5">
                            <label class="text-sm font-medium text-gray-700">Jumlah:</label>
                            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                <button @click="quantity = Math.max(1, quantity - 1)" :disabled="quantity <= 1"
                                    class="px-3 py-2 text-gray-600 hover:bg-gray-100 disabled:opacity-40">
                                    <x-lucide-minus class="h-4 w-4" />
                                </button>
                                <span class="px-5 py-2 font-medium" x-text="quantity"></span>
                                {{-- Kondisi disabled pada tombol plus dihapus karena tidak ada info stok --}}
                                <button @click="quantity++" class="px-3 py-2 text-gray-600 hover:bg-gray-100">
                                    <x-lucide-plus class="h-4 w-4" />
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mb-5">
                            <span class="font-medium text-gray-700">Total:</span>
                            <span class="text-2xl font-bold text-emerald-700" x-text="formatPrice(totalPrice)"></span>
                        </div>

                        <button @click="handleWhatsAppOrder"
                            class="w-full bg-emerald-600 text-white font-semibold py-3 rounded-lg hover:bg-emerald-700 transition-all flex items-center justify-center text-base shadow-md">
                            <x-lucide-shopping-cart class="h-5 w-5 mr-2" />
                            Pesan via WhatsApp
                        </button>
                    </div>
                </div>
            </div>

            @if ($recommendedProducts->isNotEmpty())
                <div class="mt-16">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Anda Mungkin Juga Suka</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($recommendedProducts as $recoProduct)
                            <a href="{{ route('produk.show', $recoProduct) }}"
                                class="group block overflow-hidden rounded-xl bg-white/50 backdrop-blur-sm shadow-lg hover:shadow-2xl transition-all duration-300">
                                <img src="{{ $recoProduct->image ? asset('storage/' . $recoProduct->image) : 'https://placehold.co/100x100/EFEFEF/AAAAAA&text=No+Image' }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                                <div class="p-4">
                                    <h3 class="font-semibold text-lg text-gray-800">{{ $recoProduct->name }}</h3>
                                    <p class="text-emerald-700 font-bold mt-2">Rp
                                        {{ number_format($recoProduct->price, 0, ',', '.') }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </main>
    </div>
</x-layouts>
