<footer class="bg-green-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <Leaf class="h-8 w-8 text-green-400" />
                    <span class="text-2xl font-bold">EcoEnzyme</span>
                </div>
                <p class="text-green-200 mb-4">
                    Solusi ramah lingkungan untuk rumah sehat dan bersih dengan produk alami Eco Enzyme.
                </p>
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
                <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                <ul class="space-y-2 text-green-200">
                    <li><a href="#home" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="#about" class="hover:text-white transition-colors">Tentang</a></li>
                    <li><a href="#benefits" class="hover:text-white transition-colors">Manfaat</a></li>
                    <li><a href="#products" class="hover:text-white transition-colors">Produk</a></li>
                    <li><a href="#contact" class="hover:text-white transition-colors">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-4">Hubungi Kami</h3>
                <div class="space-y-2 text-green-200">
                    <p>WhatsApp: +62 812-3456-7890</p>
                    <p>Email: info@ecoenzyme.id</p>
                    <p>Alamat: Jl. Ramah Lingkungan No. 123, Jakarta</p>
                </div>
                <div class="mt-4">
                    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer"
                        class="inline-block bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-500 transition-colors">
                        Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-green-700 mt-8 pt-8 text-center text-green-200">
            <p>&copy; {{ date('Y') }} EcoEnzyme. Semua hak cipta dilindungi.</p>
        </div>
    </div>
</footer>
