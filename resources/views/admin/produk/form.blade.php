<x-admin-layouts>
    <x-slot name="header">
        Form Tambah Produk
    </x-slot>

    <div class="mt-4 sm:mt-8 md:mt-12 grid md:grid-cols-2 gap-4">
        {{-- Informasi produk --}}
        <div class="p-4 sm:p-6 border border-gray-200 rounded-md">
            <h3 class="text-2xl font-medium text-gray-900 mb-4">Informasi Produk</h3>

            <form action="" class="space-y-4">
                <div>
                    <label for="" class="text-gray-900 font-semibold">Nama Produk</label>
                    <input type="text" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                        placeholder="Masukkan nama produk">
                </div>
                <div>
                    <label for="" class="text-gray-900 font-semibold">Kategori</label>
                    <select type="text" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                        placeholder="Masukkan nama produk">
                        <option value="">Pilih Kategori</option>
                        <option value="">Pilih Kategori</option>
                        <option value="">Pilih Kategori</option>
                    </select>
                </div>
                <div>
                    <label for="" class="text-gray-900 font-semibold">Harga (Rp)</label>
                    <input type="number" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                        placeholder="Masukkan nama produk">
                </div>
                <div>
                    <label for="" class="text-gray-900 font-semibold">Deskripsi Produk</label>
                    <textarea type="text" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                        placeholder="Masukkan deskripsi produk"></textarea>
                </div>
            </form>
        </div>

        {{-- Upload gambar --}}
        <div class="p-4 sm:p-6 border border-gray-200 rounded-md">
            <h3 class="text-2xl font-medium text-gray-900 mb-4">Gambar Produk</h3>

            <p class="text-gray-900 font-semibold">Upload Gambar</p>
            <div class="border border-dashed p-4 sm:p-6 rounded-md flex flex-col item-center justify-center">
                <input type="file">
            </div>
        </div>
    </div>
</x-admin-layouts>
