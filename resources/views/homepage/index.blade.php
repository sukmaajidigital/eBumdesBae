<x-layouts>

    {{-- hero section --}}
    <section id="home" class="bg-gradient-to-br from-green-50 to-white py-20">
        <div class="container max-h-screen mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                        Solusi Ramah Lingkungan untuk
                        <span class="text-green-600"> Rumah Sehat</span>
                    </h1>
                    <p class="text-xl text-gray-600 mb-8">
                        Eco Enzyme adalah cairan ajaib hasil fermentasi limbah dapur yang dapat menggantikan berbagai
                        produk pembersih kimia berbahaya.
                    </p>
                    <button
                        class="bg-green-600 text-white px-8 py-4 rounded-lg hover:bg-green-700 transition-colors flex items-center gap-2 text-lg font-semibold">
                        Pesan Sekarang
                        <x-lucide-arrow-right class="h-5 w-5" />
                    </button>
                </div>
                <div class="flex justify-center">
                    <img src="https://images.unsplash.com/photo-1518495973542-4542c06a5843?auto=format&fit=crop&w=600&q=80"
                        alt="Eco Enzyme - Solusi Ramah Lingkungan" class="rounded-lg shadow-2xl max-w-full h-[30rem]" />
                </div>
            </div>
        </div>
    </section>

    {{-- about section --}}
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Apa itu Eco Enzyme?
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Eco Enzyme adalah cairan hasil fermentasi limbah organik dapur seperti kulit buah dan sayuran dengan
                    gula merah dan air. Proses fermentasi selama 3 bulan menghasilkan cairan yang kaya akan enzim
                    bermanfaat.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-green-100 rounded-full p-6 w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                        <x-lucide-recycle class="h-8 w-8 text-green-600" />
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Dari Limbah</h3>
                    <p class="text-gray-600">
                        Mengubah limbah dapur menjadi produk berguna, mengurangi sampah organik
                    </p>
                </div>

                <div class="text-center">
                    <div class="bg-green-100 rounded-full p-6 w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                        <x-lucide-leaf class="h-8 w-8 text-green-600" />
                    </div>
                    <h3 class="text-xl font-semibold mb-2">100% Alami</h3>
                    <p class="text-gray-600">
                        Tanpa bahan kimia berbahaya, aman untuk keluarga dan lingkungan
                    </p>
                </div>

                <div class="text-center">
                    <div class="bg-green-100 rounded-full p-6 w-20 h-20 mx-auto mb-4 flex items-center justify-center">
                        <x-lucide-droplets class="h-8 w-8 text-green-600" />
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Multifungsi</h3>
                    <p class="text-gray-600">
                        Dapat digunakan sebagai pembersih, pupuk, dan pengolah limbah cair
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- benefit section --}}
    <section id="benefits" class="py-20 bg-green-50 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                    Manfaat Eco Enzyme
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Dengan satu produk, Anda mendapatkan berbagai manfaat untuk rumah dan lingkungan
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($benefits as $benefit)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg p-6 text-center shadow-md hover:shadow-xl transition-shadow duration-300">
                        <div
                            class="bg-green-100 dark:bg-green-900/50 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">

                            <x-dynamic-component component="lucide-{{ $benefit['icon'] }}"
                                class="h-8 w-8 text-green-600 dark:text-green-400" />

                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">{{ $benefit['title'] }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ $benefit['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- produk section --}}
    <section id="products" class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                    Produk Kami
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Pilih produk Eco Enzyme sesuai kebutuhan Anda
                </p>
            </div>

            {{-- Menggunakan perulangan @foreach untuk menampilkan data produk --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($products as $product)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                            class="w-full h-48 object-cover" />
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">{{ $product['name'] }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-3">{{ $product['description'] }}</p>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-500 dark:text-gray-400">{{ $product['size'] }}</span>
                                <span
                                    class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $product['price'] }}</span>
                            </div>
                            <button
                                class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition-colors flex items-center justify-center gap-2">
                                {{-- Menggunakan komponen ikon Lucide untuk Blade --}}
                                <x-lucide-shopping-cart class="h-5 w-5" />
                                Pesan Sekarang
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- kontak section --}}
    <section id="contact" class="py-20 bg-green-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Hubungi Kami
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Ada pertanyaan tentang Eco Enzyme? Kami siap membantu Anda
                </p>
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
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap
                            </label>
                            <input type="text"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="Masukkan nama lengkap" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>
                            <input type="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="Masukkan email" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Pesan
                            </label>
                            <textarea rows={4}
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition-colors font-semibold">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-layouts>
