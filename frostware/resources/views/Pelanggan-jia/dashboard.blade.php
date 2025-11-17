<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan | Frostware</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        /* pakai webfont via import - aman untuk Blade */
        @import url('https://fonts.googleapis.com/css2?family=Figtree:wght@400;600&family=Parkinsans:wght@600&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background-color: #F9FAFB; /* match buat-pesanan bg */
            margin: 0;
            padding: 0;
            color: #111827; /* match buat-pesanan text color */
        }

        /* header styling disetarakan dengan KelolaPesanan-mal */
        header {
            background-color: #1C398E;
            box-shadow: -5px 5px 8px rgba(0, 0, 0, 0.25);
            width: 100vw;
            box-sizing: border-box;
            top: 0px;
            left: 0px;
            position: fixed;
            padding: 12px 40px;
            display: flex;
            flex-direction: row;
            z-index: 1;

            .head-title {
                font-family: Parkinsans;
                color: white;
                font-size: 26px;
                font-weight: 600;
                margin-right: auto;
                margin-top: 10px;
            }

            .head-info {
                display: inline-flex;
                flex-direction: column;
                align-items: flex-end;
                /* gap: 5px; */
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
                margin-top: -20px;

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

            button {
                background: none;
                border: none;
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
            display: flex;
            gap: 24px;
            padding: 120px 40px;
            /* beri jarak karena header fixed */
            align-items: flex-start;
        }

        .left {
            flex: 0 0 56%;
        }

        /* lebih lebar untuk detail tagihan */
        .right {
            flex: 0 0 40%;
        }

        /* ringkasan & daftar */
        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 6px 18px rgba(2, 6, 23, 0.06);
            margin-bottom: 18px;
        }

        .card h2 {
            color: #1C398E;
            font-family: 'Parkinsans', sans-serif;
            margin: 0 0 10px 0;
        }

        .info-row {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
        }

        .info-col {
            min-width: 200px;
        }

        .info-label {
            font-size: 13px;
            color: #666;
            margin-bottom: 6px;
        }

        .info-value {
            font-weight: 600;
            color: #0A0A0A;
            font-size: 15px;
        }

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
            background-color: #F5F7FF;
            color: black;
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            margin-top: 18px;
        }

        .contact-box {
            background: #1C398E;
            color: #fff;
            padding: 18px;
            border-radius: 12px;
            text-align: center;
        }

        .contact-box p {
            margin: 0 0 8px 0;
            font-weight: 700;
        }

        .contact-box a {
            color: #E7EEFF;
            text-decoration: none;
            font-weight: 600;
        }

        .action-row {
            display: flex;
            gap: 12px;
            margin: 12px 0 18px 0;
        }

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

        .table tbody tr:nth-child(even) {
            background: #FAFCFF;
        }

        /* gunakan data-status seperti di KelolaPesanan untuk konsistensi */
        .status-badge {
            display: inline-flex;
            padding: 6px 10px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 13px;
        }

        .status-badge[data-status="Belum Diverifikasi"] {
            background: #ECEEF2;
            color: #030213;
        }

        .status-badge[data-status="Diterima"] {
            background: #00B940;
            color: #fff;
        }

        .status-badge[data-status="Ditolak"] {
            background: #D4183D;
            color: #fff;
        }

        /* responsive */
        @media (max-width: 960px) {
            main {
                padding: 20px;
                flex-direction: column;
            }

            .left,
            .right {
                flex: 1 1 100%;
            }
        }
    </style>
</head>

<body>
    <div class="user-panel" style="display:none;">
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
        <div class="head-title">Frostware</div>
        <div class="head-info">
            <button class="user-info">
                <h2 class="user">{{ session('role', 'Pelanggan') }}</h2>
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FFF" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path
                        d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                </svg>
            </button>
            <div class="date">
                <p class="hari">{{ \Carbon\Carbon::now()->translatedFormat('l') }}, </p>
                <p class="tanggal">{{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
            </div>
        </div>
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
                        <div class="info-value">
                            {{ $P->nama ?? (optional($listPesanan->first()?->pelanggan)->nama ?? 'Pelanggan') }}
                        </div>
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
                    <div class="info-value">
                        {{ $P->alamat ?? (optional($listPesanan->first()?->pelanggan)->alamat ?? '-') }}
                    </div>
                </div>

                <div style="margin-top:14px;">
                    <div class="info-label">Total Tagihan</div>
                    @php
                        $total = $P->totalTagihan ?? ($listPesanan->sum('totalTagihan') ?? 0);
                    @endphp
                    <div class="info-value">Rp {{ number_format($total, 0, ',', '.') }}</div>
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
                <a href="{{ route('pesanan.create') }}" class="btn-primary">Pesanan +</a>
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
    <script>
        (function () {
            const userInfoBtn = document.querySelector('.user-info');
            const userPanelEl = document.querySelector('.user-panel');
            function showUserPanel() { if (!userPanelEl) return; userPanelEl.style.display = 'inline-flex'; userPanelEl.setAttribute('data-open', 'true'); }
            function hideUserPanel() { if (!userPanelEl) return; userPanelEl.style.display = 'none'; userPanelEl.setAttribute('data-open', 'false'); }
            userInfoBtn?.addEventListener('click', function (e) { e.stopPropagation(); if (!userPanelEl) return; const isOpen = userPanelEl.getAttribute('data-open') === 'true'; isOpen ? hideUserPanel() : showUserPanel(); });
            userPanelEl?.addEventListener('click', function (e) { e.stopPropagation(); });
            document.addEventListener('click', function () { hideUserPanel(); });
        })();

    </script>
    <script>
        (function () {
            const now = new Date();
            const hariId = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const hari = hariId[now.getDay()];
            const dd = String(now.getDate()).padStart(2, '0');
            const mm = String(now.getMonth() + 1).padStart(2, '0');
            const yyyy = now.getFullYear();
            document.querySelector('.hari').textContent = hari + ', ';
            document.querySelector('.tanggal').textContent = `${dd}/${mm}/${yyyy}`;
        })();
    </script>
</body>

</html>