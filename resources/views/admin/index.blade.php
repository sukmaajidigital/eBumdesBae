<x-admin-layouts>
    <x-slot name="header">
        Overview
    </x-slot>
    <p class="text-gray-700 mt-1">Lihat ringkasan statistik dan aktivitas penting lainnya.</p>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in! This is your admin dashboard.") }}
                </div>
            </div>
        </div>
    </div>
</x-admin-layouts>
