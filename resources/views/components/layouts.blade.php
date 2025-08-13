<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ \App\Models\Setting::first()->base_name }}</title>
    <meta name="title" content="{{ \App\Models\Setting::first()->base_name }}">
    <meta property="og:title" content="{{ \App\Models\Setting::first()->base_name }}">

    <meta name="robots" content="all">
    <meta property="og:locale" content="id">
    <meta property="og:locale:alternate" content="en">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/logo-bumdes-cut.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('logo/logo-bumdes-cut.png') }}">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#00B74A">
    <meta name="theme-color" content="#00B74A">
    <link rel="shortcut icon" type="image/png" href="{{ asset('logo/logo-bumdes-cut.png') }}" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- Memuat Aset Vite (Tailwind CSS & JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <div class="flex flex-col min-h-screen">
        <x-header />
        <main class="flex-grow">
            {{ $slot }}
        </main>
        <x-footer />
    </div>
</body>

</html>
