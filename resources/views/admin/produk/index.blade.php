<x-admin-layouts>
    <x-slot name="header">
        Produk
    </x-slot>

    <div class="mx-auto max-w-7xl p-4 sm:p-6 rounded-md border border-gray-200 mt-4 sm:mt-8 md:mt-12">
        <div class="overflow-hidden bg-white sm:rounded-lg">

            {{-- Notifikasi --}}
            @if (session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 border border-green-200 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Tombol untuk menambah produk baru --}}
            <div class="mb-6 flex justify-between items-center">
                <h3 class="text-2xl font-medium">Daftar Produk</h3>
                <a href="{{ route('admin.produk.form') }}" class="px-4 py-2 bg-gray-800 text-gray-100 hover:bg-gray-900 rounded-md cursor-pointer">Tambah Produk
                </a>
            </div>

            {{-- Container untuk tabel agar responsif --}}
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white divide-y divide-gray-200">
                    <thead class="">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Produk</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Kategori</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Harga</th>
                            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase text-center">Status</th>
                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Aksi</span></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($produks as $produk)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-3 text-sm font-medium text-gray-900">
                                        <img src="{{ $produk->image ? asset('storage/' . $produk->image) : 'https://placehold.co/100x100/EFEFEF/AAAAAA&text=No+Image' }}" alt="{{ $produk->name }}" class="w-12 h-12 rounded-md object-cover bg-gray-200">
                                        <span>{{ $produk->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $produk->kategori->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Rp {{ number_format($produk->price, 0, ',', '.') }}</div>
                                </td>
                                <td class="text-center">
                                {{-- @if($status === 'aktif') --}}
                                    <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full">
                                        Aktif
                                    </span>
                                {{-- @else
                                    <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-full">
                                        Nonaktif
                                    </span>
                                @endif --}}
                            </td>
                                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="{{ route('admin.produk.edit', $produk) }}" class="text-gray-800 hover:text-gray-900 hover:bg-gray-100 flex items-center justify-center p-2 border border-gray-200 rounded-sm" title="Edit">
                                            <x-lucide-pencil class="w-5 h-5" />
                                        </a>
                                        <form action="{{ route('admin.produk.destroy', $produk) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus produk ini?');">
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
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                    Belum ada data produk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- Pagination --}}
            <div class="mt-4">
                {{ $produks->links() }}
            </div>
        </div>
    </div>
</x-admin-layouts>
