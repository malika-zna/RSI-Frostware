<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Parkinsans:wght@300..800&display=swap"
        rel="stylesheet">
    <link rel="icon" type="svg" href="/fw.svg">
    <title>Login</title>

</head>
<body>

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
            <h3>Daftar Pesanan Anda</h3>
            <a href="{{ route('pesanan.create') }}" class="btn-primary">+ Buat Pesanan</a>

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
