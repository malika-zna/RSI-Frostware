<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buat Pesanan - Frostware</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        .card-shadow {
            box-shadow: 0 8px 24px rgba(2, 6, 23, 0.08);
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
    </style>
</head>

<body class="bg-gray-50 min-h-screen text-gray-900">
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
                    Pelanggan
                </h2>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FFF" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
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

    <main class="max-w-4xl mx-auto mt-20 mb-12 px-4">
        <div class="bg-white rounded-xl p-8 card-shadow">
            <h2 class="text-2xl font-bold mb-4 text-blue-900">Buat Pesanan Baru</h2>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 text-red-800 rounded">
                    <strong>Terdapat kesalahan:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('pesanan.store') }}" class="space-y-6">
                @csrf

                <!-- show current user info (read-only) -->
                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" value="{{ session('nama') ?? '' }}" readonly
                            class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm bg-gray-50 p-2" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" value="{{ session('email') ?? '' }}" readonly
                            class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm bg-gray-50 p-2" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" value="{{ session('nomorTelepon') ?? '' }}" readonly
                            class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm bg-gray-50 p-2" />
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="jumlahBalok" class="block text-sm font-medium text-gray-700">Jumlah Pesanan
                            (balok)</label>
                        <input id="jumlahBalok" name="jumlahBalok" type="number" min="1"
                            value="{{ old('jumlahBalok', 1) }}" required
                            class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm p-2" />
                    </div>

                    <div>
                        <label for="tanggalKirim" class="block text-sm font-medium text-gray-700">Tanggal
                            Pengiriman</label>
                        <input id="tanggalKirim" name="tanggalKirim" type="date" value="{{ old('tanggalKirim') }}"
                            required class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm p-2" />
                    </div>
                </div>

                <div>
                    <label for="alamatKirim" class="block text-sm font-medium text-gray-700">Alamat Pengiriman</label>
                    <textarea id="alamatKirim" name="alamatKirim" rows="4" required
                        class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm p-2">{{ old('alamatKirim') }}</textarea>
                </div>

                <div class="flex gap-3 items-center">
                    <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 bg-blue-900 text-white rounded-lg font-semibold hover:bg-blue-800">Buat
                        Pesanan</button>
                    <a href="{{ route('beranda-pelanggan') }}" class="text-gray-600">Batal</a>
                </div>
            </form>
        </div>
    </main>

    <footer class="text-center text-sm text-gray-500 mb-6">© 2025 Frostware</footer>

    <script>
        (function () {
            const tanggalEl = document.getElementById('tanggalKirim');
            if (!tanggalEl) return;
            const today = new Date().toISOString().split('T')[0];
            tanggalEl.setAttribute('min', today);
            if (!tanggalEl.value) tanggalEl.value = today;
        })();
    </script>
</body>

</html>