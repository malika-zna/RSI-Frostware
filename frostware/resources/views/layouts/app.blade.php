<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Frostware - Sistem Manajemen Pengiriman')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN (untuk interaktivitas modal) -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    @yield('styles')
</head>
<body class="bg-gray-100">
    <div id="app">
        <!-- Header/Navbar -->
        <nav class="bg-indigo-900 shadow-md text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo/Brand -->
                    <div>
                        <a href="/" class="text-2xl font-bold">Frostware</a>
                    </div>

                    <!-- Menu Kanan (Manajer/Driver) -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                            <span class="text-sm font-medium">Manajer</span>
                            <span class="text-xs text-indigo-300">Minggu, 28/09/2025</span>
                            <!-- Ikon panah dropdown -->
                            <svg class="w-4 h-4 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open"
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10 text-gray-800"
                             style="display: none;">
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Profil</a>
                            <!-- Ganti '#' dengan route logout -->
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Konten Halaman -->
        <main class="py-10">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    @yield('scripts')
</body>
</html>
