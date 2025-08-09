<x-admin-layouts>
    <x-slot name="header">
        {{-- Judul dinamis berdasarkan mode (tambah/edit) --}}
        {{ isset($produk) ? 'Edit Produk' : 'Form Tambah Produk' }}
    </x-slot>

    <div class="mt-4">
        {{-- Form action dan method dinamis --}}
        <form action="{{ isset($produk) ? route('admin.produk.update', $produk) : route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Method spoofing untuk form edit --}}
            @if (isset($produk))
                @method('PUT')
            @endif

            <div class="sm:mt-8 md:mt-12 grid md:grid-cols-2 gap-4">
                {{-- Informasi produk --}}
                <div class="p-4 sm:p-6 border border-gray-200 rounded-md">
                    <h3 class="text-2xl font-medium text-gray-900 mb-4">Informasi Produk</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="text-gray-900 font-semibold">Nama Produk</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $produk->name ?? '') }}" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm" placeholder="Masukkan nama produk" required>
                            @error('name')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="category_id" class="text-gray-900 font-semibold">Kategori</label>
                            <select id="category_id" name="category_id" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('category_id', $produk->category_id ?? '') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="price" class="text-gray-900 font-semibold">Harga (Rp)</label>
                            <input type="number" id="price" name="price" value="{{ old('price', $produk->price ?? '') }}" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm" placeholder="Contoh: 50000" required>
                            @error('price')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="description" class="text-gray-900 font-semibold">Deskripsi Produk</label>
                            <textarea id="description" name="description" rows="5" class="description-textarea w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm" placeholder="Masukkan deskripsi produk" required>{{ old('description', $produk->description ?? '') }}</textarea>
                            @error('description')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- Upload gambar --}}
                <div class="p-4 sm:p-6 border border-gray-200 rounded-md">
                    <h3 class="text-2xl font-medium text-gray-900 mb-4">Gambar Produk</h3>
                    <div x-data="{ imagePreview: '{{ isset($produk) && $produk->image ? asset('storage/' . $produk->image) : null }}' }" class="w-full max-w-sm mx-auto">
                        <input type="file" name="image" id="image" class="hidden" x-ref="fileInput" @change="
                                let file = $event.target.files[0];
                                if (file) {
                                    let reader = new FileReader();
                                    reader.onload = e => { imagePreview = e.target.result; };
                                    reader.readAsDataURL(file);
                                }
                            " accept="image/*">
                        @error('image')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror

                        <label for="image" class="block mb-4 cursor-pointer">
                            <div class="w-full p-2 border-2 border-dashed rounded-lg border-gray-300 hover:border-gray-800">
                                <div x-show="imagePreview" class="relative w-full" style="padding-bottom: 100%;">
                                    <img :src="imagePreview" alt="Pratinjau Gambar" class="absolute top-0 left-0 object-cover w-full h-full rounded-md">
                                </div>
                                <div x-show="!imagePreview" class="flex flex-col items-center justify-center w-full text-center text-gray-500" style="height: 200px;">
                                    <x-lucide-upload-cloud class="w-12 h-12 mb-2 text-gray-400" />
                                    <p class="font-medium">Klik untuk mengunggah</p>
                                    <p class="text-xs">PNG, JPG, atau GIF (Maks 2MB)</p>
                                </div>
                            </div>
                        </label>
                        <div class="flex justify-center">
                            <button type="button" @click="$refs.fileInput.click()" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border border-transparent rounded-md hover:bg-gray-900 cursor-pointer">
                                <x-lucide-file-image class="w-5 h-5 mr-2 -ml-1" />
                                Pilih Gambar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end pt-6 mt-4 gap-3">
                <a href="{{ route('admin.produk.index') }}" class="px-4 py-2 font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100 cursor-pointer">
                    Batal
                </a>
                <button type="submit" class="inline-flex justify-center px-4 py-2 font-medium text-white bg-gray-800 border border-transparent rounded-md hover:bg-gray-900 cursor-pointer">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</x-admin-layouts>
