<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buat Pesanan - Frostware</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        /* small overrides to make cards look closer to project style */
        .card-shadow { box-shadow: 0 8px 24px rgba(2,6,23,0.08); }
    </style>
</head>
<body class="bg-gray-50 min-h-screen text-gray-900">
    <header class="bg-blue-900 text-white p-4 px-8 flex justify-between items-center">
        <h1 class="text-2xl font-semibold">Frostware</h1>
        <div class="flex items-center gap-6">
            <div class="text-sm">{{ Auth::user()->nama ?? 'Pelanggan' }}</div>
            <div class="text-sm opacity-80">{{ \Carbon\Carbon::now()->translatedFormat('l, d/m/Y') }}</div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto mt-12 mb-12 px-4">
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
                        <input type="text" value="{{ Auth::user()->nama ?? '' }}" readonly class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm bg-gray-50 p-2" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" value="{{ Auth::user()->email ?? '' }}" readonly class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm bg-gray-50 p-2" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" value="{{ Auth::user()->nomorTelepon ?? '' }}" readonly class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm bg-gray-50 p-2" />
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="jumlahBalok" class="block text-sm font-medium text-gray-700">Jumlah Pesanan (balok)</label>
                        <input id="jumlahBalok" name="jumlahBalok" type="number" min="1" value="{{ old('jumlahBalok', 1) }}" required class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm p-2" />
                    </div>

                    <div>
                        <label for="tanggalKirim" class="block text-sm font-medium text-gray-700">Tanggal Pengiriman</label>
                        <input id="tanggalKirim" name="tanggalKirim" type="date" value="{{ old('tanggalKirim') }}" required class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm p-2" />
                    </div>
                </div>

                <div>
                    <label for="alamatKirim" class="block text-sm font-medium text-gray-700">Alamat Pengiriman</label>
                    <textarea id="alamatKirim" name="alamatKirim" rows="4" required class="mt-1 block w-full rounded-lg border-gray-200 shadow-sm p-2">{{ old('alamatKirim') }}</textarea>
                </div>

                <div class="flex gap-3 items-center">
                    <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-blue-900 text-white rounded-lg font-semibold hover:bg-blue-800">Buat Pesanan</button>
                    <a href="{{ route('beranda-pelanggan') }}" class="text-gray-600">Batal</a>
                </div>
            </form>
        </div>
    </main>

    <footer class="text-center text-sm text-gray-500 mb-6">© 2025 Frostware</footer>

    <script>
        // set minimum tanggal pengiriman ke hari ini
        (function(){
            const tanggalEl = document.getElementById('tanggalKirim');
            if (!tanggalEl) return;
            const today = new Date().toISOString().split('T')[0];
            tanggalEl.setAttribute('min', today);
            if (!tanggalEl.value) tanggalEl.value = today;
        })();
    </script>
</body>
</html>
