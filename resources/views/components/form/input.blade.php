@props([
    'label' => null,   // Label bersifat opsional
    'name',             // Atribut 'name' wajib ada
    'id' => null,        // 'id' juga opsional, akan dibuat otomatis jika kosong
    'type' => 'text',    // Tipe input default adalah 'text'
    'value' => '',       // Nilai default input
])

{{-- Membuat ID default dari nama jika tidak diset, penting untuk label --}}
@php
    $id = $id ?? $name;
@endphp

<div class="w-full">
    {{-- Tampilkan label hanya jika properti 'label' diisi --}}
    @if ($label)
        <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $type }}"
        id="{{ $id }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}" {{-- Otomatis mengisi old value jika ada validation error --}}

        {{--
          Ini bagian penting:
          - Menggabungkan class default Tailwind dengan class tambahan yang mungkin Anda kirim.
          - Menerima semua atribut HTML lainnya (seperti placeholder, required, disabled, dll).
        --}}
        {{ $attributes->merge([
            'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'
        ]) }}
    >

    {{-- Menampilkan pesan error validasi di bawah input --}}
    @error($name)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
