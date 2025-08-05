<x-admin-layouts>
    <x-slot name="header">
        Form Tambah Produk
    </x-slot>

    <div class="mt-4 ">
        <form action="">
            <div class="sm:mt-8 md:mt-12 grid md:grid-cols-2 gap-4">
                {{-- Informasi produk --}}
                <div class="p-4 sm:p-6 border border-gray-200 rounded-md">
                    <h3 class="text-2xl font-medium text-gray-900 mb-4">Informasi Produk</h3>

                    <div class="space-y-4">
                        <div>
                            <label for="" class="text-gray-900 font-semibold">Nama Produk</label>
                            <input type="text"
                                class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                                placeholder="Masukkan nama produk">
                        </div>
                        <div>
                            <label for="" class="text-gray-900 font-semibold">Kategori</label>
                            <select type="text"
                                class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                                placeholder="Masukkan nama produk">
                                <option value="">Pilih Kategori</option>
                                <option value="">Pilih Kategori</option>
                                <option value="">Pilih Kategori</option>
                            </select>
                        </div>
                        <div>
                            <label for="" class="text-gray-900 font-semibold">Harga (Rp)</label>
                            <input type="number"
                                class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                                placeholder="Masukkan nama produk">
                        </div>
                        <div>
                            <label for="" class="text-gray-900 font-semibold">Deskripsi Produk</label>
                            <textarea type="text" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                                placeholder="Masukkan deskripsi produk"></textarea>
                        </div>
                    </div>
                </div>
                {{-- Upload gambar --}}
                <div class="p-4 sm:p-6 border border-gray-200 rounded-md">
                    <h3 class="text-2xl font-medium text-gray-900 mb-4">Gambar Produk</h3>
                    <div x-data="{ imagePreview: null }" class="w-full max-w-sm mx-auto">
                        {{-- Input file yang disembunyikan --}}
                        <input type="file" name="image" id="image" class="hidden" x-ref="fileInput"
                            @change="
                                let file = $event.target.files[0];
                                if (file) {
                                    let reader = new FileReader();
                                    reader.onload = e => {
                                        imagePreview = e.target.result;
                                    };
                                    reader.readAsDataURL(file);
                                }
                            "
                            accept="image/*" {{-- Hanya menerima file gambar --}}>

                        {{-- Area Pratinjau Gambar --}}
                        <label for="image" class="block mb-4 cursor-pointer">
                            <div
                                class="w-full p-2 border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 hover:border-gray-800">
                                {{-- Tampilan saat gambar sudah dipilih --}}
                                <div x-show="imagePreview" class="relative w-full" style="padding-bottom: 100%;">
                                    {{-- Aspect Ratio 1:1 --}}
                                    <img :src="imagePreview" alt="Pratinjau Gambar"
                                        class="absolute top-0 left-0 object-cover w-full h-full rounded-md">
                                </div>

                                {{-- Tampilan Placeholder saat belum ada gambar --}}
                                <div x-show="!imagePreview"
                                    class="flex flex-col items-center justify-center w-full text-center text-gray-500"
                                    style="height: 200px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="w-12 h-12 mb-2 text-gray-400">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <polyline points="17 8 12 3 7 8" />
                                        <line x1="12" x2="12" y1="3" y2="15" />
                                    </svg>
                                    <p class="font-medium">Klik untuk mengunggah</p>
                                    <p class="text-xs">PNG, JPG, atau GIF</p>
                                </div>
                            </div>
                        </label>

                        {{-- Tombol Aksi --}}
                        <div class="flex justify-center">
                            <button type="button" @click="$refs.fileInput.click()"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border border-transparent rounded-md hover:bg-gray-900 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2 -ml-1">
                                    <path
                                        d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48" />
                                </svg>
                                Pilih Gambar
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="flex justify-end pt-6 space-x-3 border-gray-200">
                <button type="button" @click="open = false"
                    class="px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100 cursor-pointer">
                    Batal
                </button>
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 font-medium text-white bg-gray-800 border border-transparent rounded-md hover:bg-gray-900 cursor-pointer">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</x-admin-layouts>
