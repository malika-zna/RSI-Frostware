
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Parkinsans:wght@300..800&display=swap"
        rel="stylesheet">
    <link rel="icon" type="svg" href="/fw.svg">

    <style>
        * {
            font-family: Parkinsans;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: #1C398E;
            color: white;
            height: 100vh;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        h1, h3 {
            font-family: Figtree;
            margin: 0;
        }

        /* Background circles */
        .circle-bg {
            position: absolute;
            border-radius: 9999px;
            background: linear-gradient(274deg, #8AFFF5 0%, #155DFC 100%);
            z-index: -1;
        }

        .circle-1 { width: 400px; height: 400px; top: -100px; left: -100px; }
        .circle-2 { width: 300px; height: 300px; bottom: -120px; right: 80px; }
        .circle-3 { width: 180px; height: 180px; top: 250px; left: 60px; }

        /* Layout utama */
        .dashboard-container {
            position: relative;
            width: 100%;
            height: 100%;
            padding: 40px 80px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dashboard-header h1 {
            font-size: 36px;
            font-weight: 800;
        }

        .dashboard-header div span {
            font-size: 16px;
            font-weight: 500;
        }

        /* Card */
        .card {
            background: white;
            color: black;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .card h3 {
            font-weight: 700;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .btn-primary {
            background: #1C398E;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 14px;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background: #00A0FF;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: center;
            padding: 12px;
            font-size: 14px;
        }

        th {
            background: #F5F5F5;
            color: #1C398E;
            font-weight: 700;
        }

        tr:nth-child(even) {
            background: #FAFAFA;
        }

        .text-center {
            text-align: center;
        }

        /* Status badge */
        .status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .status-belum {
            background: #FFE9A7;
            color: #C28700;
        }

        .status-diterima {
            background: #B7F4C0;
            color: #057D2D;
        }

        .status-ditolak {
            background: #F9C2C2;
            color: #B60000;
        }

        /* Alert */
        .alert-success {
            background: #B7F4C0;
            color: #057D2D;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 14px;
            width: fit-content;
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 20px;
            }

            table {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <!-- Background -->
    <div class="circle-bg circle-1"></div>
    <div class="circle-bg circle-2"></div>
    <div class="circle-bg circle-3"></div>

    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Dashboard Pelanggan</h1>
            <div>
                <span>{{ Auth::user()->nama ?? 'Pelanggan' }}</span> |
                <span>{{ now()->translatedFormat('l, d/m/Y') }}</span>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="dashboard-content">
            <div class="card">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3>Daftar Pesanan Anda</h3>
                    <a href="{{ route('pesanan.create') }}" class="btn-primary">+ Buat Pesanan</a>
                </div>

                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Tanggal Pesan</th>
                            <th>Tanggal Kirim</th>
                            <th>Jumlah Balok</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pesanans as $p)
                            <tr>
                                <td>#{{ $p->idPesanan }}</td>
                                <td>{{ $p->tanggalPesan->format('d/m/Y') }}</td>
                                <td>{{ $p->tanggalKirim ? $p->tanggalKirim->format('d/m/Y') : '-' }}</td>
                                <td>{{ $p->jumlahBalok }}</td>
                                <td>
                                    <span class="status-badge 
                                        {{ $p->status == 'Belum Diverifikasi' ? 'status-belum' :
                                           ($p->status == 'Diterima' ? 'status-diterima' : 'status-ditolak') }}">
                                        {{ $p->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center">Belum ada pesanan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
