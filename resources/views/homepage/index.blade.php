@php
    // $benefits = [
    //     [
    //         'icon' => 'shield', // Nama ikon sebagai string
    //         'title' => 'Ramah Lingkungan',
    //         'description' => 'Tidak mengandung bahan kimia berbahaya yang dapat mencemari air dan tanah',
    //     ],
    //     [
    //         'icon' => 'sparkles',
    //         'title' => 'Pembersih Alami',
    //         'description' => 'Efektif membersihkan noda, lemak, dan bakteri tanpa meninggalkan residu',
    //     ],
    //     [
    //         'icon' => 'sprout',
    //         'title' => 'Pupuk Organik',
    //         'description' => 'Dapat digunakan sebagai pupuk cair untuk menyuburkan tanaman',
    //     ],
    //     [
    //         'icon' => 'heart',
    //         'title' => 'Aman untuk Keluarga',
    //         'description' => 'Tidak berbahaya jika tersentuh kulit atau terhirup, aman untuk anak-anak',
    //     ],
    // ];
@endphp
<x-layouts>
    {{-- hero section --}}
    <section id="home" class="bg-gradient-to-br from-green-50 to-white py-24">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight mb-6">
                        Marketplace Produk<br>
                        <span class="text-green-600">BUMDES Berkualitas</span>
                    </h1>
                    <p class="text-lg text-gray-600 max-w-lg mb-8">
                        {{ $settings->description }}
                    </p>
                    <button class="bg-green-600 text-white px-8 py-4 rounded-xl hover:bg-green-700 transition-all flex items-center gap-2 text-lg font-semibold shadow-lg">
                        Pesan Sekarang
                        <x-lucide-arrow-right class="h-5 w-5" />
                    </button>
                </div>
                <div class="flex justify-center">
                    <img src="https://images.unsplash.com/photo-1518495973542-4542c06a5843?auto=format&fit=crop&w=600&q=80" alt="Eco Enzyme - Solusi Ramah Lingkungan" class="rounded-xl shadow-2xl object-cover max-w-full h-[30rem]" />
                </div>
            </div>
        </div>
    </section>

    {{-- about section --}}
    {{-- <section id="about" class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Tentang BUMDES Mart</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    BUMDES Mart adalah platform marketplace yang menghubungkan produk-produk unggulan dari Badan Usaha
                    Milik Desa (BUMDES) dengan konsumen di seluruh Indonesia. Kami menyediakan berbagai produk
                    berkualitas dari desa untuk mendukung ekonomi lokal.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $aboutItems = [
                        [
                            'icon' => 'recycle',
                            'title' => 'Dari Limbah',
                            'desc' => 'Mengubah limbah dapur menjadi produk berguna, mengurangi sampah organik',
                        ],
                        [
                            'icon' => 'leaf',
                            'title' => '100% Alami',
                            'desc' => 'Tanpa bahan kimia berbahaya, aman untuk keluarga dan lingkungan',
                        ],
                        [
                            'icon' => 'droplets',
                            'title' => 'Multifungsi',
                            'desc' => 'Dapat digunakan sebagai pembersih, pupuk, dan pengolah limbah cair',
                        ],
                    ];
                @endphp
                @foreach ($aboutItems as $item)
                    <div class="bg-green-50 rounded-xl p-6 text-center shadow-sm hover:shadow-lg transition-all">
                        <div class="bg-green-100 rounded-full p-5 w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                            <x-dynamic-component component="lucide-{{ $item['icon'] }}" class="h-8 w-8 text-green-600" />
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ $item['title'] }}</h3>
                        <p class="text-gray-600">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    {{-- benefits --}}
    {{-- <section id="benefits" class="py-24 bg-green-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Manfaat Eco Enzyme</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Dengan satu produk, Anda mendapatkan berbagai manfaat untuk rumah dan lingkungan
                </p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($benefits as $benefit)
                    <div class="bg-white rounded-xl p-6 text-center shadow-md hover:shadow-xl transition-all">
                        <div class="bg-green-100 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                            <x-dynamic-component component="lucide-{{ $benefit['icon'] }}" class="h-8 w-8 text-green-600" />
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $benefit['title'] }}</h3>
                        <p class="text-gray-600">{{ $benefit['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    {{-- products --}}
    <section id="products" class="py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Produk Kami</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Segala Produk Dari BUMDES</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($products as $product)
                    <a href="{{ route('produk.show', $product) }}" class="group block bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all">

                        <div class="overflow-hidden">
                            <img src="{{ $produk->image ? asset('storage/' . $produk->image) : 'https://placehold.co/100x100/EFEFEF/AAAAAA&text=No+Image' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300 ease-in-out" />
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-gray-900 truncate">{{ $product->name }}</h3>
                            <p class="text-gray-600 mb-4 h-20 line-clamp-3">{{ $product->description }}</p>

                            <div class="flex justify-end items-center mb-4">
                                <span class="text-2xl font-bold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>

                            <div class="w-full bg-green-600 text-white py-3 rounded-lg group-hover:bg-green-700 transition-colors flex items-center justify-center gap-2 font-semibold">
                                <x-lucide-eye class="h-5 w-5" />
                                <span>Lihat Detail</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- contact --}}
    {{-- <section id="contact" class="py-24 bg-green-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Ada pertanyaan tentang Eco Enzyme? Kami siap membantu
                    Anda</p>
            </div>
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-semibold mb-6">Informasi Kontak</h3>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="bg-green-100 rounded-full p-3">
                                <x-lucide-phone class="h-6 w-6 text-green-600" />
                            </div>
                            <div>
                                <p class="font-semibold">WhatsApp</p>
                                <p class="text-gray-600">+62 812-3456-7890</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="bg-green-100 rounded-full p-3">
                                <x-lucide-mail class="h-6 w-6 text-green-600" />
                            </div>
                            <div>
                                <p class="font-semibold">Email</p>
                                <p class="text-gray-600">info@ecoenzyme.id</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="bg-green-100 rounded-full p-3">
                                <x-lucide-map-pin class="h-6 w-6 text-green-600" />
                            </div>
                            <div>
                                <p class="font-semibold">Alamat</p>
                                <p class="text-gray-600">Jl. Ramah Lingkungan No. 123, Jakarta</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <form method="#" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Masukkan nama lengkap" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Masukkan email" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                            <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition-all font-semibold">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
</x-layouts>
