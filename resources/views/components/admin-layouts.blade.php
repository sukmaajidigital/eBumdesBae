<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - {{ \App\Models\Setting::first()->base_name }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js for interactivity -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</head>

<body class="font-sans antialiased">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen">
        <x-sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <x-admin-header />

            <!-- Main content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto">
                <div class="container px-6 py-4 mx-auto">
                    <!-- Page Title -->
                    @if (isset($header))
                        <h3 class="text-2xl font-semibold text-gray-900">{{ $header }}</h3>
                    @endif

                    <!-- Main Content Slot -->
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>

</html>
