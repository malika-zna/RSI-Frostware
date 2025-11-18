<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Frostware - Sistem Manajemen Pengiriman')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="//unpkg.com/alpinejs" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"> -->
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Parkinsans:wght@300..800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        header {
            background-color: #1C398E;
            box-shadow: -5px 5px 8px rgba(0, 0, 0, 0.25);
            width: 100vw;
            box-sizing: border-box;
            top: 0px;
            left: 0px;
            position: fixed;
            padding: 20px 40px;
            display: flex;
            flex-direction: row;
            z-index: 1;

            .head-title {
                font-family: Parkinsans;
                color: white;
                font-size: 26px;
                font-weight: 600;
                margin-right: auto;
            }

            .head-info {
                display: inline-flex;
                flex-direction: column;
                align-items: flex-end;
                gap: 5px;
            }

            .user-info {
                border: none;
                background: none;
                display: inline-flex;
                flex-direction: row;
                gap: 5px;

                .user {
                    font-family: Parkinsans;
                    color: white;
                    font-size: 16px;
                    font-weight: 500;
                }

                svg {
                    width: 10px;
                }
            }

            .user-info:hover {
                cursor: pointer;
                background-color: rgba(255, 255, 255, 0.06);
            }


            .date {
                padding-right: 8px;
                display: inline-flex;
                flex-direction: row;
                gap: 5px;

                p {
                    color: rgba(255, 255, 255, 0.60);
                    font-size: 12px;
                    font-weight: 400;
                }
            }

        }

        .user-panel {
            width: 280px;
            height: fit-content;
            padding: 20px 25px 15px 25px;
            background: #000;
            /* display: inline-flex; */
            display: none;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 5px;
            box-sizing: border-box;
            position: fixed;
            right: 20px;
            top: 50px;
            z-index: 100;

            .user-role {
                color: #fff;
                font-size: 16px;
                font-family: Parkinsans;
                /* font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; */
                font-weight: 600;
                margin-bottom: 5px;
                /* line-height: 16px; */
                /* word-wrap: break-word; */
            }

            .user-email {
                color: rgba(255, 255, 255, 0.60);
                font-size: 12px;
                /* font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; */
                font-weight: 400;
                /* line-height: 16px; */
                /* word-wrap: break-word; */
            }

            .user-name {
                color: #fff;
                font-size: 14px;
                /* font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; */
                font-weight: 400;
                /* line-height: 16px; */
                /* word-wrap: break-word; */
            }

            .user-divider {
                align-self: stretch;
                height: 5px;
                /* position: relative; */
                border-bottom: 1px solid rgba(255, 255, 255, 0.60);
                box-sizing: border-box;
                margin-top: 5px;
                margin-bottom: 5px;
            }

            form {
                margin-left: auto;
            }

            .user-actions {
                /* overflow: hidden; */
                display: inline-flex;
                justify-content: flex-end;
                align-items: center;
                gap: 10px;
                margin-left: auto;
                padding: 5px 10px;
                border-radius: 3px;
            }

            button.user-actions:hover {
                cursor: pointer;
                background-color: rgba(255, 255, 255, 0.2);
            }

            .logout-text {
                color: #fff;
                font-size: 14px;
                /* font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; */
                font-weight: 400;
                /* line-height: 16px; */
                /* word-wrap: break-word; */
            }
        }

        main {
            margin-top: 80px;
        }
    </style>
    @yield('styles')
</head>

<body class="bg-gray-100">
    <div id="app">
        <div class="user-panel">
            <div class="user-role">{{ session('role', 'Role') }}</div>
            <div class="user-name">{{ session('nama', 'nama pengguna') }}</div>
            <div class="user-email">{{ session('email', 'email') }}</div>
            <div class="user-divider"></div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="user-actions" type="submit" logout>
                    <div class="logout-text">Logout</div>
                </button>
            </form>
        </div>
        <header>
            <div class="head-title">
                Frostware
            </div>
            <div class="head-info">
                <button class="user-info">
                    <h2 class="user">
                        @if(session('idRole') == 1)
                            Pelanggan
                        @elseif(session('idRole') == 2)
                            Resepsionis
                        @elseif(session('idRole') == 3)
                            Manajer
                        @elseif(session('idRole') == 4)
                            Driver
                        @elseif(session('idRole') == 5)
                            PJ Produksi
                        @elseif(session('idRole') == 6)
                            PJ Keuangan
                        @elseif(session('idRole') == 7)
                            PJ Pemeliharaan
                        @else
                            Role
                        @endif

                    </h2>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#FFF" class="bi bi-caret-down-fill"
                        viewBox="0 0 16 16">
                        <path
                            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                    </svg>
                </button>
                <div class="date">
                    <p class="hari">Minggu, </p>
                    <p class="tanggal">25/10/2025</p>
                </div>
            </div>
        </header>

        <!-- <nav class="bg-indigo-900 shadow-md text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div>
                        <a href="
                            @if(session('idRole') == 3)
                                {{ route('manajer.dashboard') }}
                            @elseif(session('idRole') == 4)
                                {{ route('driver.dashboard') }}
                            @else
                                /
                            @endif
                        " class="text-2xl font-bold">Frostware</a>
                    </div>

                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">

                            <span class="text-sm font-medium">
                                {{ session('nama', 'User') }}

                                <span class="text-xs font-normal text-indigo-200 capitalize">
                                    (
                                    @if(session('idRole') == 1)
                                        Pelanggan
                                    @elseif(session('idRole') == 2)
                                        Resepsionis
                                    @elseif(session('idRole') == 3)
                                        Manajer
                                    @elseif(session('idRole') == 4)
                                        Driver
                                    @elseif(session('idRole') == 5)
                                        PJ Produksi
                                    @elseif(session('idRole') == 6)
                                        PJ Keuangan
                                    @elseif(session('idRole') == 7)
                                        PJ Pemeliharaan
                                    @else
                                        Role
                                    @endif
                                    )
                                </span>
                                </span>

                            <span class="text-xs text-indigo-300">Minggu, 28/09/2025</span>
                            <svg class="w-4 h-4 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

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

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav> -->

        <main class="py-10">
            @yield('content')
        </main>
    </div>

    @yield('scripts')
    <script>
        (function () {
            // hari dan tanggal
            function updateTanggal() {
                const now = new Date();
                const hariId = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                const hari = hariId[now.getDay()];
                const dd = String(now.getDate()).padStart(2, '0');
                const mm = String(now.getMonth() + 1).padStart(2, '0');
                const yyyy = now.getFullYear();
                const hariEl = document.querySelector('.date .hari');
                const tanggalEl = document.querySelector('.date .tanggal');
                if (hariEl) hariEl.textContent = hari + ', ';
                if (tanggalEl) tanggalEl.textContent = `${dd}/${mm}/${yyyy}`;
            }
            updateTanggal();

            function showUserPanel() {
                if (!userPanelEl) return;
                userPanelEl.style.display = 'inline-flex';
                userPanelEl.setAttribute('data-open', 'true');
            }
            function hideUserPanel() {
                if (!userPanelEl) return;
                userPanelEl.style.display = 'none';
                userPanelEl.setAttribute('data-open', 'false');
            }

            const userInfoBtn = document.querySelector('.user-info');
            const userPanelEl = document.querySelector('.user-panel');
            userInfoBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                if (!userPanelEl) return;
                const isOpen = userPanelEl.getAttribute('data-open') === 'true';
                isOpen ? hideUserPanel() : showUserPanel();
            });
            userPanelEl.addEventListener('click', function (e) {
                e.stopPropagation();
            });
            document.addEventListener('click', function () {
                hideUserPanel();
            });
        })();
    </script>
</body>

</html>