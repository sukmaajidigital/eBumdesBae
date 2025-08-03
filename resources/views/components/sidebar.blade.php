@php
    $activeClasses = 'bg-gray-200 text-gray-700 bg-gray-800 text-white';
    $inactiveClasses = 'text-gray-600 hover:bg-gray-200';
@endphp

<!-- Sidebar -->
<sidebar
    class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-white shadow-lg dark:bg-gray-800 lg:translate-x-0 lg:static lg:inset-0"
    :class="{ 'translate-x-0 ease-out': sidebarOpen, '-translate-x-full ease-in': !sidebarOpen }">
    <!-- Sidebar Header -->
    <div class="flex items-center justify-start h-16 px-6 bg-gray-50 dark:bg-gray-700">
        <a href="/" class="text-lg font-bold text-gray-800 dark:text-white">
            AdminPanel
        </a>
    </div>

    <!-- Sidebar Links -->
    <nav class="mt-4 space-y-2 px-3">
        <div>
            <a href="{{ route('admin.index') }}"
                class="px-3 py-2 flex items-center rounded-sm {{ request()->routeIs('admin.index') ? $activeClasses : $inactiveClasses }}">
                <x-lucide-layout-dashboard class="h-5 w-5" />
                <span class="mx-3">Overview</span>
            </a>
        </div>
        <div>
            <a href="{{ route('admin.kategori') }}"
                class="px-3 py-2 flex items-center rounded-sm {{ request()->routeIs('admin.kategori') ? $activeClasses : $inactiveClasses }}">
                <x-lucide-tag class="h-5 w-5" />
                <span class="mx-3">Kategori Produk</span>
            </a>
        </div>
        <div>

            <a href="{{ route('admin.produk') }}"
                class="px-3 py-2 flex items-center rounded-sm {{ request()->routeIs('admin.produk') || request()->routeIs('admin.produk.form') ? $activeClasses : $inactiveClasses }}">
                <x-lucide-package class="h-5 w-5" />
                <span class="mx-3">Produk</span>
            </a>
        </div>
        <div>

            <a href="{{ route('admin.settings') }}"
                class="px-3 py-2 flex items-center rounded-sm {{ request()->routeIs('admin.settings') ? $activeClasses : $inactiveClasses }}">
                <x-lucide-settings class="h-5 w-5" />
                <span class="mx-3">Settings</span>
            </a>
        </div>
    </nav>
</sidebar>
