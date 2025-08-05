<x-admin-layouts>

    <x-slot name="header">
        Kategori
    </x-slot>

    <div class="mx-auto max-w-7xl p-4 sm:p-6 rounded-md border border-gray-200 mt-4 sm:mt-8 md:mt-12">
        <div class="overflow-hidden bg-white sm:rounded-lg">

            {{-- Tombol untuk menambah kategori baru --}}
            <div class="mb-6 flex justify-between items-center">
                <h3 class="text-2xl font-medium">Daftar Kategori</h3>
                <div x-data="{ open: false }">
                    {{-- Tombol Pemicu Modal --}}
                    <button @click="open = true"
                        class="px-4 py-2 bg-gray-800 text-gray-100 hover:bg-gray-900 rounded-md cursor-pointer">Tambah
                        Kategori</button>

                    {{-- Konten Modal --}}
                    <div x-show="open" style="display: none;" x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center"
                        aria-labelledby="modal-title" role="dialog" aria-modal="true">

                        {{-- Latar Belakang Overlay --}}
                        <div @click="open = false" class="fixed inset-0 bg-gray-800/60 transition-opacity">
                        </div>

                        {{-- Panel Modal --}}
                        <div x-show="open" x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="relative w-full max-w-lg p-6 overflow-hidden transition-all transform bg-white rounded-lg shadow-xl dark:bg-gray-800">
                            {{-- Form untuk menambah kategori --}}
                            <form action="{{-- route('admin.categories.store') --}}" method="POST">
                                @csrf

                                {{-- Header Modal --}}
                                <h3 class="text-xl font-semibold leading-6 text-gray-900 dark:text-gray-100"
                                    id="modal-title">
                                    Tambah Kategori Baru
                                </h3>

                                {{-- Body Modal --}}
                                <div class="mt-4 space-y-4">
                                    <div>
                                        <label for="name"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                            Kategori</label>
                                        <input type="text" name="name" id="name"
                                            placeholder="Masukkan nama kategori"
                                            class="block w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"
                                            required>
                                    </div>
                                    <div>
                                        <label for="description"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                                        <input type="text" name="description" id="description"
                                            placeholder="Masukkan deskripsi kategori"
                                            class="block w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm">
                                    </div>
                                </div>

                                {{-- Footer Modal --}}
                                <div
                                    class="flex justify-end pt-6 mt-6 space-x-3 border-t border-gray-200 dark:border-gray-700">
                                    <button type="button" @click="open = false"
                                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100 cursor-pointer">
                                        Batal
                                    </button>
                                    <button type="submit"
                                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border border-transparent rounded-md hover:bg-gray-900 cursor-pointer">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Container untuk tabel agar responsif --}}
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white divide-y divide-gray-200">
                    <thead class="">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Nama Kategori
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Deskripsi
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
                                <div class="text-sm font-medium text-gray-900">Elektronik</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Berbagai macam barang
                                    elektronik.</div>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="#"
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
