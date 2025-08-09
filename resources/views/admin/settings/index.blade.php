<x-admin-layouts>
    <x-slot name="header">
        Settings
    </x-slot>
    <p class="text-gray-700 mt-1">Konfigurasi informasi toko, akun pengguna, dan preferensi sistem lainnya.</p>

    <div class="mt-4 sm:mt-8 md:mt-12 gap-4 border border-gray-200 rounded-md p-4 sm:p-6">
        <h3 class="text-xl font-medium text-gray-900 mb-4">Pengaturan Toko</h3>

        {{-- Menampilkan pesan sukses jika ada --}}
        @if (session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 border border-green-200 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form di-binding ke controller --}}
        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4">
            @csrf <div>
                <label for="base_name" class="text-gray-900 font-semibold">Nama Toko</label>
                <input type="text" id="base_name" name="base_name" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm" placeholder="Masukkan nama toko" value="{{ old('base_name', $settings->base_name) }}">
                @error('base_name')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="description" class="text-gray-900 font-semibold">Deskripsi Toko</label>
                <textarea id="description" name="description" rows="4" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm" placeholder="Masukkan deskripsi toko">{{ old('description', $settings->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col md:flex-row justify-between md:gap-6">
                <div class="flex-1">
                    <label for="email" class="text-gray-900 font-semibold">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm" placeholder="Masukkan email toko" value="{{ old('email', $settings->email) }}">
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex-1">
                    <label for="phone" class="text-gray-900 font-semibold">Nomor Telepon (WhatsApp)</label>
                    <input type="text" id="phone" name="phone" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm" placeholder="e.g. 628123456789" value="{{ old('phone', $settings->phone) }}">
                    @error('phone')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="address" class="text-gray-900 font-semibold">Alamat</label>
                <input type="text" id="address" name="address" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm" placeholder="Masukkan alamat toko" value="{{ old('address', $settings->address) }}">
                @error('address')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="inline-flex justify-center px-4 py-2 font-medium text-white bg-gray-800 border border-transparent rounded-md hover:bg-gray-900 cursor-pointer">
                Simpan Pengaturan Toko
            </button>
        </form>
    </div>
</x-admin-layouts>
