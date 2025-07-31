<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Judul halaman bisa dinamis --}}
    <title>{{ $title ?? 'Laravel App' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- Memuat Aset Vite (Tailwind CSS & JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">

    {{-- Wrapper utama dengan flexbox untuk mendorong footer ke bawah --}}
    <div class="flex flex-col min-h-screen">

        {{-- Memanggil komponen Header --}}
        <x-header />

        {{-- Konten Utama Halaman --}}
        <main class="flex-grow">
            {{ $slot }}
        </main>

        {{-- Memanggil komponen Footer --}}
        <x-footer />

    </div>

</body>
</html>
