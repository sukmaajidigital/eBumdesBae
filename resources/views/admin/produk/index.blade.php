<x-admin-layouts>
    <x-slot name="header">
        Produk
    </x-slot>

    <div class="mx-auto max-w-7xl p-4 sm:p-6 rounded-md border border-gray-200 mt-4 sm:mt-8 md:mt-12">
        <div class="overflow-hidden bg-white sm:rounded-lg">
            {{-- Tombol untuk menambah produk baru --}}
            <div class="mb-6 flex justify-between items-center">
                <h3 class="text-2xl font-medium">Daftar Produk</h3>
                <a href="{{ route('admin.produk.form') }}"
                    class="px-4 py-2 bg-gray-800 text-gray-100 hover:bg-gray-900 rounded-md cursor-pointer">Tambah
                    Produk</a>
            </div>

            {{-- Container untuk tabel agar responsif --}}
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white divide-y divide-gray-200">
                    <thead class="">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Produk
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Kategori
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Harga
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Aksi</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        {{-- Contoh data 1 --}}
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-2 text-sm font-medium text-gray-900">
                                    <img src="" alt="tes" class="w-12 h-12 rounded-md bg-gray-200">
                                    Eco Enzyme Pembersih Lantai 1L
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Pembersih Lantai</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Rp 85.000</div>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="#"
                                        class="text-gray-800 hover:text-gray-900 hover:bg-gray-100 flex items-center justify-center p-2 border border-gray-200 rounded-sm"
                                        title="Show">
                                        <x-lucide-eye class="w-5 h-5" />
                                    </a><a href="#"
                                        class="text-gray-800 hover:text-gray-900 hover:bg-gray-100 flex items-center justify-center p-2 border border-gray-200 rounded-sm"
                                        title="Edit">
                                        <x-lucide-pencil class="w-5 h-5" />
                                    </a>
                                    <button
                                        class="text-gray-800 hover:text-gray-900 hover:bg-gray-100 cursor-pointer flex items-center justify-center p-2 border border-gray-200 rounded-sm"
                                        title="Hapus">
                                        <x-lucide-trash-2 class="w-5 h-5" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layouts>
