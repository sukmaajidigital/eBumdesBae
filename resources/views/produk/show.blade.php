@php
    // Data dummy untuk satu produk. Dalam aplikasi nyata, ini akan menjadi objek $product dari Controller.
    $product = [
        'id' => 1,
        'name' => 'Eco Enzyme BUMDES Organic',
        'size' => '1L',
        'price' => 45000,
        'images' => [
            'https://images.unsplash.com/photo-1518495973542-4542c06a5843?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?auto=format&fit=crop&w=800&q=80',
        ],
        'description' => 'Pembersih organik hasil fermentasi limbah buah dan sayuran yang ramah lingkungan.',
        'fullDescription' =>
            'Eco Enzyme BUMDES Organic adalah pembersih multiguna yang dibuat melalui proses fermentasi alami limbah buah dan sayuran. Produk ini tidak mengandung bahan kimia berbahaya dan aman untuk lingkungan. Dapat digunakan untuk membersihkan lantai, peralatan dapur, dan sebagai pestisida alami untuk tanaman.',
        'category' => 'Pembersih',
        'stock' => 25,
        'rating' => 4.8,
        'reviews' => 124,
        'bumdes' => 'BUMDES Sari Makmur',
        'location' => 'Desa Sukamaju, Bogor',
        'benefits' => [
            'Ramah lingkungan dan biodegradable',
            'Tidak mengandung bahan kimia berbahaya',
            'Multifungsi untuk berbagai keperluan',
            'Mendukung ekonomi desa',
        ],
        'ingredients' => 'Limbah buah dan sayuran terfermentasi, air, gula aren.',
        'usage' => 'Campurkan 1:10 dengan air untuk pembersih lantai, atau 1:5 untuk pestisida alami pada tanaman.',
    ];

    // Data dummy untuk produk rekomendasi
    $recommendedProducts = [];
@endphp

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<x-layouts>
    <div x-data="{
        product: @js($product),
        selectedImageIndex: 0,
        quantity: 1,
        activeTab: 'description',
    
        get totalPrice() {
            return this.product.price * this.quantity;
        },
    
        formatPrice(price) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(price);
        },
    
        handleWhatsAppOrder() {
            const phoneNumber = '6288980798945';
            const message = `Halo, saya tertarik untuk memesan produk:\n\n*${this.product.name}*\nJumlah: *${this.quantity}*\nTotal Harga: *${this.formatPrice(this.totalPrice)}*\n\nMohon informasinya. Terima kasih.`;
            const whatsappUrl = `https://api.whatsapp.com/send?phone=${phoneNumber}&text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
        }
    }" class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-emerald-100">

        <main class="container mx-auto px-4 py-10">
            <div class="grid lg:grid-cols-2 gap-10 mb-12">
                <!-- Galeri Gambar -->
                <div class="space-y-5">
                    <div class="aspect-square rounded-2xl overflow-hidden bg-gray-100 shadow-lg border border-gray-200">
                        <img :src="product.images[selectedImageIndex]" :alt="product.name"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" />
                    </div>
                    <div class="flex gap-3 overflow-x-auto pb-2">
                        <template x-for="(image, index) in product.images" :key="index">
                            <button @click="selectedImageIndex = index"
                                :class="selectedImageIndex === index ? 'ring-2 ring-emerald-500 border-emerald-500' :
                                    'border-transparent'"
                                class="flex-shrink-0 w-20 h-20 rounded-xl overflow-hidden border transition-all hover:opacity-80">
                                <img :src="image" :alt="`${product.name} ${index + 1}`"
                                    class="w-full h-full object-cover" />
                            </button>
                        </template>
                    </div>
                </div>

                <!-- Info Produk -->
                <div class="space-y-8">
                    <div>
                        <span
                            class="inline-block bg-emerald-100 text-emerald-800 text-xs font-semibold px-3 py-1 rounded-full mb-3"
                            x-text="product.category"></span>
                        <h1 class="text-4xl font-bold text-gray-900 mb-3 leading-tight" x-text="product.name"></h1>
                        <p class="text-gray-600 text-base leading-relaxed" x-text="product.fullDescription"></p>
                    </div>

                    <div class="flex items-center gap-5 text-sm">
                        <div class="flex items-center">
                            <x-lucide-star class="h-5 w-5 fill-yellow-400 text-yellow-400" />
                            <span class="ml-1 font-semibold text-gray-800" x-text="product.rating"></span>
                            <span class="ml-2 text-gray-500" x-text="`(${product.reviews} ulasan)`"></span>
                        </div>
                        <div class="h-5 w-px bg-gray-300"></div>
                        <span
                            class="inline-block bg-green-50 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">
                            Stok: <span x-text="product.stock"></span>
                        </span>
                    </div>

                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center">
                            <x-lucide-users class="h-4 w-4 mr-2 text-emerald-600" />
                            <span x-text="product.bumdes"></span>
                        </div>
                        <div class="flex items-center">
                            <x-lucide-map-pin class="h-4 w-4 mr-2 text-emerald-600" />
                            <span x-text="product.location"></span>
                        </div>
                    </div>

                    <!-- Kotak Pemesanan -->
                    <div class="bg-white/80 backdrop-blur-md rounded-xl p-6 border border-gray-200 shadow-lg">
                        <div class="flex items-baseline gap-2 mb-5">
                            <span class="text-3xl font-bold text-emerald-700"
                                x-text="formatPrice(product.price)"></span>
                            <span class="text-gray-500">/ <span x-text="product.size"></span></span>
                        </div>

                        <div class="flex items-center gap-4 mb-5">
                            <label class="text-sm font-medium text-gray-700">Jumlah:</label>
                            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                <button @click="quantity = Math.max(1, quantity - 1)" :disabled="quantity <= 1"
                                    class="px-3 py-2 text-gray-600 hover:bg-gray-100 disabled:opacity-40">
                                    <x-lucide-minus class="h-4 w-4" />
                                </button>
                                <span class="px-5 py-2 font-medium" x-text="quantity"></span>
                                <button @click="quantity = Math.min(product.stock, quantity + 1)"
                                    :disabled="quantity >= product.stock"
                                    class="px-3 py-2 text-gray-600 hover:bg-gray-100 disabled:opacity-40">
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

                        <div class="flex items-center justify-center gap-6 text-xs text-gray-500 mt-5">
                            <div class="flex items-center"><x-lucide-truck class="h-4 w-4 mr-1" /> Gratis Ongkir</div>
                            <div class="flex items-center"><x-lucide-shield class="h-4 w-4 mr-1" /> Produk Original
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs Detail -->
            <div>
                <div class="border-b border-gray-200">
                    <nav class="flex space-x-8" aria-label="Tabs">
                        <template
                            x-for="tab in [
                            { id: 'description', label: 'Deskripsi' },
                            { id: 'benefits', label: 'Manfaat' },
                            { id: 'usage', label: 'Cara Pakai' }
                        ]">
                            <button @click="activeTab = tab.id"
                                :class="activeTab === tab.id ?
                                    'border-emerald-600 text-emerald-600' :
                                    'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="relative py-4 px-1 border-b-2 font-medium text-sm transition-all">
                                <span x-text="tab.label"></span>
                            </button>
                        </template>
                    </nav>
                </div>

                <div class="mt-6 space-y-6">
                    <div x-show="activeTab === 'description'" x-cloak
                        class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                        <h3 class="text-lg font-semibold mb-3">Deskripsi Produk</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed" x-text="product.fullDescription"></p>
                        <h4 class="font-medium mb-2">Komposisi:</h4>
                        <p class="text-gray-600" x-text="product.ingredients"></p>
                    </div>
                    <div x-show="activeTab === 'benefits'" x-cloak
                        class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                        <h3 class="text-lg font-semibold mb-3">Manfaat Produk</h3>
                        <ul class="space-y-2">
                            <template x-for="(benefit, index) in product.benefits" :key="index">
                                <li class="flex items-start">
                                    <span class="text-emerald-600 mr-2 mt-1">✓</span>
                                    <span class="text-gray-600" x-text="benefit"></span>
                                </li>
                            </template>
                        </ul>
                    </div>
                    <div x-show="activeTab === 'usage'" x-cloak
                        class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                        <h3 class="text-lg font-semibold mb-3">Cara Penggunaan</h3>
                        <p class="text-gray-600 leading-relaxed" x-text="product.usage"></p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-layouts>
