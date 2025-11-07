<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan | Frostware</title>

    <style>
        /* pakai webfont via import - aman untuk Blade */
        @import url('https://fonts.googleapis.com/css2?family=Figtree:wght@400;600&family=Parkinsans:wght@600&display=swap');

        * { box-sizing: border-box; }
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #E7EEFF;
            margin: 0;
            padding: 0;
            color: #0A0A0A;
        }

        header {
            background-color: #1C398E;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 0 0 8px 8px;
        }

        header h1 { font-family: 'Parkinsans', sans-serif; font-size: 26px; margin: 0; }
        header .right { font-size: 14px; opacity: 0.95; }

        main {
            display: flex;
            gap: 24px;
            padding: 36px;
            align-items: flex-start;
        }

        .left { flex: 0 0 56%; }   /* lebih lebar untuk detail tagihan */
        .right { flex: 0 0 40%; }  /* ringkasan & daftar */
        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 6px 18px rgba(2,6,23,0.06);
            margin-bottom: 18px;
        }

        .card h2 { color: #1C398E; font-family: 'Parkinsans', sans-serif; margin: 0 0 10px 0; }

        .info-row { display: flex; gap: 18px; flex-wrap: wrap; }
        .info-col { min-width: 200px; }
        .info-label { font-size: 13px; color: #666; margin-bottom: 6px; }
        .info-value { font-weight: 600; color: #0A0A0A; font-size: 15px; }

        .btn-primary {
            display: inline-block;
            background-color: #1C398E;
            color: white;
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            margin-top: 18px;
        }

        .btn-outline {
            display: inline-block;
            background: #F5F7FF;
            color: #1C398E;
            padding: 10px 14px;
            border-radius: 10px;
            text-decoration: none;
            border: 1px solid rgba(28,57,142,0.08);
            font-weight: 700;
        }

        .contact-box {
            background: #1C398E;
            color: #fff;
            padding: 18px;
            border-radius: 12px;
            text-align: center;
        }
        .contact-box p { margin: 0 0 8px 0; font-weight: 700; }
        .contact-box a { color: #E7EEFF; text-decoration: none; font-weight: 600; }

        .action-row { display:flex; gap:12px; margin: 12px 0 18px 0; }

        /* tabel daftar pesanan */
        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        .table thead th {
            background: #F5F7FF;
            color: #1C398E;
            text-align: left;
            padding: 10px 12px;
            font-weight: 700;
            font-size: 13px;
        }
        .table tbody td {
            padding: 12px;
            border-bottom: 1px solid #F0F3FF;
        }
        .table tbody tr:nth-child(even) { background: #FAFCFF; }

        .status-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 13px;
        }
        .status-Belum\ Diverifikasi { background:#ECEEF2; color:#030213; }
        .status-Diterima { background:#00B940; color:#fff; }
        .status-Ditolak { background:#D4183D; color:#fff; }

        /* responsive */
        @media (max-width: 960px) {
            main { padding: 20px; flex-direction: column; }
            .left, .right { flex: 1 1 100%; }
        }
    </style>
</head>
<body>
    <header>
        <h1>Frostware</h1>
        <div class="right">{{ \Carbon\Carbon::now()->translatedFormat('l, d/m/Y') }}</div>
    </header>

    <main>
        {{-- fallback list variable: $pesanan atau $pesanans --}}
        @php
            $listPesanan = $pesanan ?? ($pesanans ?? collect());
            // If single $pelanggan object not available, create minimal fallback
            $P = $pelanggan ?? null;
        @endphp

        <!-- KIRI: Detail Tagihan -->
        <section class="left">
            <div class="card">
                <h2>Detail Tagihan {{ isset($listPesanan[0]) ? '#ORD' . ($listPesanan[0]->idPesanan) : '' }}</h2>

                <div class="info-row" style="margin-top:12px;">
                    <div class="info-col">
                        <div class="info-label">Nama Pelanggan</div>
                        <div class="info-value">{{ $P->nama ?? (optional($listPesanan->first()?->pelanggan)->nama ?? 'Pelanggan') }}</div>
                    </div>

                    <div class="info-col">
                        <div class="info-label">Tanggal Pesan</div>
                        <div class="info-value">
                            @if($listPesanan->isNotEmpty() && $listPesanan->first()->tanggalPesan)
                                {{ \Carbon\Carbon::parse($listPesanan->first()->tanggalPesan)->format('d/m/Y') }}
                            @else
                                -
                            @endif
                        </div>
                    </div>

                    <div class="info-col">
                        <div class="info-label">Jumlah Pesanan</div>
                        <div class="info-value">{{ $P->jumlahPesanan ?? ($listPesanan->sum('jumlahBalok') ?: 0) }}</div>
                    </div>

                    <div class="info-col">
                        <div class="info-label">Tanggal Kirim</div>
                        <div class="info-value">
                            @if($listPesanan->isNotEmpty() && $listPesanan->first()->tanggalKirim)
                                {{ \Carbon\Carbon::parse($listPesanan->first()->tanggalKirim)->format('d/m/Y') }}
                            @else
                                -
                            @endif
                        </div>
                    </div>
                </div>

                <div style="margin-top:18px;">
                    <div class="info-label">Alamat Pengiriman</div>
                    <div class="info-value">{{ $P->alamat ?? (optional($listPesanan->first()?->pelanggan)->alamat ?? '-') }}</div>
                </div>

                <div style="margin-top:14px;">
                    <div class="info-label">Total Tagihan</div>
                    @php
                        $total = $P->totalTagihan ?? ($listPesanan->sum('totalTagihan') ?? 0);
                    @endphp
                    <div class="info-value">Rp {{ number_format($total,0,',','.') }}</div>
                </div>

                <a href="#" class="btn-primary" role="button">Jadwalkan Pembayaran</a>
            </div>
        </section>

        <!-- KANAN: Kontrol & Daftar -->
        <section class="right">
            <div class="contact-box card" style="padding:18px;">
                <p>Pesanan belum sampai?</p>
                <a href="#">Hubungi PJ Keuangan</a>
            </div>

            <div class="action-row">
                <a href="#" class="btn-primary">Pesanan +</a>
                <a href="#" class="btn-outline">Komplain +</a>
            </div>

            <div class="card">
                <h2>Daftar Pesanan</h2>

                <table class="table" aria-describedby="daftar-pesanan">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Jumlah</th>
                            <th>Tanggal Pesan</th>
                            <th>Tanggal Kirim</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($listPesanan as $p)
                            <tr>
                                <td>ORD{{ $p->idPesanan }}</td>
                                <td>{{ $p->jumlahBalok ?? ($p->jumlahPesanan ?? 0) }}</td>
                                <td>
                                    @if(!empty($p->tanggalPesan))
                                        {{ \Carbon\Carbon::parse($p->tanggalPesan)->format('d/m/Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($p->tanggalKirim))
                                        {{ \Carbon\Carbon::parse($p->tanggalKirim)->format('d/m/Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $st = $p->status ?? '-';
                                        // class must match possible values (escape spaces if any)
                                        $classStatus = 'status-' . str_replace(' ', '\\ ', $st);
                                    @endphp

                                    <span class="status-badge" data-status="{{ $st }}">
                                        <span class="status-text">{{ $st }}</span>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center; color:#777; padding:18px;">
                                    Belum ada pesanan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </section>
    </main>
</body>
</html>
