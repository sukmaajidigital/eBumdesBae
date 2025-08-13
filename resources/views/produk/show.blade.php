<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<x-layouts>
    <div x-data="{
        // Inisialisasi data satu per satu, BUKAN sebagai objek JSON.
        // Gunakan addslashes untuk keamanan string dari karakter kutip.
        productName: '{{ addslashes($product->name) }}',
        productPrice: {{ $product->price }}, // Harga sebagai angka, tanpa kutip
        phoneNumber: '{{ $settings->phone }}',
        quantity: 1,
    
        /**
         * Getter untuk total harga, kini menggunakan 'productPrice'.
         */
        get totalPrice() {
            // parseFloat tidak wajib jika productPrice sudah berupa angka, tapi ini praktik yang aman.
            const price = parseFloat(this.productPrice) || 0;
            return price * this.quantity;
        },
    
        /**
         * Fungsi helper untuk format mata uang (tidak ada perubahan).
         */
        formatPrice(price) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(price);
        },
    
        /**
         * Fungsi WhatsApp, kini menggunakan properti yang sudah dipecah.
         */
        handleWhatsAppOrder() {
            const cleanPhoneNumber = this.phoneNumber.replace(/[^0-9]/g, '');
            const message = `Halo, saya tertarik untuk memesan produk:\n\n*${this.productName}*\nJumlah: *${this.quantity}*\nTotal Harga: *${this.formatPrice(this.totalPrice)}*\n\nMohon informasinya. Terima kasih.`;
            const whatsappUrl = `https://api.whatsapp.com/send?phone=${cleanPhoneNumber}&text=${encodeURIComponent(message)}`;
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
                            {{-- Menggunakan productPrice karena tidak ada lagi objek 'product' di Alpine --}}
                            <span class="text-3xl font-bold text-emerald-700" x-text="formatPrice(productPrice)">
                            </span>
                        </div>

                        <div class="flex items-center gap-4 mb-5">
                            <label class="text-sm font-medium text-gray-700">Jumlah:</label>
                            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                <button @click="quantity = Math.max(1, quantity - 1)" :disabled="quantity <= 1"
                                    class="px-3 py-2 text-gray-600 hover:bg-gray-100 disabled:opacity-40 transition-all">
                                    <x-lucide-minus class="h-4 w-4" />
                                </button>

                                <span class="px-5 py-2 font-medium" x-text="quantity"></span>

                                <button @click="quantity++"
                                    class="px-3 py-2 text-gray-600 hover:bg-gray-100 transition-all">
                                    <x-lucide-plus class="h-4 w-4" />
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mb-5">
                            <span class="font-medium text-gray-700">Total:</span>
                            <span class="text-2xl font-bold text-emerald-700" x-text="formatPrice(totalPrice)">
                            </span>
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
