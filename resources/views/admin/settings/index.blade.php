<x-admin-layouts>
    <x-slot name="header">
        Settings
    </x-slot>

    <div class="mt-4 sm:mt-8 md:mt-12 gap-4 border border-gray-200 rounded-md p-4 sm:p-6">
        <h3 class="text-2xl font-medium text-gray-900 mb-4">Pengaturan Toko</h3>

        <form action="" class="space-y-4">
            <div>
                <label for="" class="text-gray-900 font-semibold">Nama Toko</label>
                <input type="text" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                    placeholder="Masukkan nama toko">
            </div>
            <div>
                <label for="" class="text-gray-900 font-semibold">Deskripsi Toko</label>
                <input type="text" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                    placeholder="Masukkan deskripsi toko">
            </div>
            <div class="flex flex-col md:flex-row justify-between md:gap-6">
                <div class="flex-1/2">
                    <label for="" class="text-gray-900 font-semibold">Email</label>
                    <input type="email" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                        placeholder="Masukkan email toko">
                </div>
                <div class="flex-1/2">
                    <label for="" class="text-gray-900 font-semibold">Nomor Telepon</label>
                    <input type="text" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                        placeholder="Masukkan nomor telepon toko">
                </div>
            </div>
            <div>
                <label for="" class="text-gray-900 font-semibold">Alamat</label>
                <input type="text" class="w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                    placeholder="Masukkan alamat toko">
            </div>

            <button type="submit"
                class="inline-flex justify-center px-4 py-2 font-medium text-white bg-gray-800 border border-transparent rounded-md hover:bg-gray-900 cursor-pointer">
                Simpan Pengaturan Toko
            </button>
        </form>
    </div>
    </div>
</x-admin-layouts>
