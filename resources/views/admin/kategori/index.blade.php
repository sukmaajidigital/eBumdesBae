<x-admin-layouts>
    <x-slot name="header">
        Kategori
    </x-slot>
    <p class="text-gray-700 mt-1">Atur, tambah, atau hapus kategori untuk mengelompokkan produk Anda.</p>

    <div x-data="{
        openModal: false,
        isEdit: false,
        formAction: '',
        formData: { name: '', description: '' },
        deleteFormAction: '',
        showDeleteModal: false
    }" class="mx-auto max-w-7xl p-4 sm:p-6 rounded-md border border-gray-200 mt-4 sm:mt-8 md:mt-12">
        <div class="overflow-hidden bg-white sm:rounded-lg">

            @if (session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 border border-green-200 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="mb-4 px-4 py-2 bg-red-100 text-red-800 border border-red-200 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mb-6 flex justify-between items-center">
                <h3 class="text-xl font-medium">Daftar Kategori</h3>
                <button @click="
                    openModal = true; 
                    isEdit = false; 
                    formAction = '{{ route('admin.kategori.store') }}';
                    formData = { name: '', description: '' };
                " class="px-4 py-2 bg-gray-800 text-gray-100 hover:bg-gray-900 rounded-md cursor-pointer">
                    Tambah Kategori
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white divide-y divide-gray-200">
                    <thead class="">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama Kategori</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Deskripsi</th>
                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Aksi</span></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($kategoris as $kategori)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $kategori->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ Str::limit($kategori->description, 50) }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end space-x-2">
                                        <button @click="
                                            openModal = true; 
                                            isEdit = true; 
                                            formAction = '{{ route('admin.kategori.update', $kategori) }}';
                                            formData = { name: '{{ $kategori->name }}', description: '{{ $kategori->description ?? '' }}' };
                                        " class="text-gray-800 hover:text-gray-900 hover:bg-gray-100 flex items-center justify-center p-2 border border-gray-200 rounded-sm" title="Edit">
                                            <x-lucide-pencil class="w-5 h-5" />
                                        </button>

                                        <form action="{{ route('admin.kategori.destroy', $kategori) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus kategori ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-800 hover:text-gray-900 hover:bg-gray-100 cursor-pointer flex items-center justify-center p-2 border border-gray-200 rounded-sm" title="Hapus">
                                                <x-lucide-trash-2 class="w-5 h-5" />
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                    Belum ada data kategori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $kategoris->links() }}
            </div>
        </div>

        <div x-show="openModal" style="display: none;" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div @click="openModal = false" class="fixed inset-0 bg-gray-800/60 transition-opacity"></div>
            <div x-show="openModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative w-full max-w-lg p-6 overflow-hidden transition-all transform bg-white rounded-lg shadow-xl">
                <form :action="formAction" method="POST">
                    @csrf
                    <template x-if="isEdit">
                        @method('PUT')
                    </template>

                    <h3 class="text-xl font-semibold leading-6 text-gray-900" x-text="isEdit ? 'Edit Kategori' : 'Tambah Kategori Baru'"></h3>

                    <div class="mt-4 space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                            <input type="text" name="name" id="name" :value="formData.name" placeholder="Masukkan nama kategori" class="block w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm" required>
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" id="description" x-text="formData.description" placeholder="Masukkan deskripsi kategori (opsional)" class="block w-full px-4 py-3 text-gray-700 border border-gray-200 rounded-sm"></textarea>
                            @error('description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end pt-6 mt-6 space-x-3 border-t border-gray-200">
                        <button type="button" @click="openModal = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-100 cursor-pointer">Batal</button>
                        <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border border-transparent rounded-md hover:bg-gray-900 cursor-pointer">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layouts>
