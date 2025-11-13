<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Parkinsans:wght@300..800&display=swap"
        rel="stylesheet">
    <link rel="icon" type="svg" href="/fw.svg">
    <!-- <link rel="shortcut icon" href="/Frostware.svg" type="svg"> -->
    <title>Kelola Pesanan</title>
    <style>
        * {
            font-family: Figtree;
            color: black;
        }

        h1,
        h2,
        p {
            margin: 0px;
        }

        h1,
        .head-title,
        h2 {
            font-family: Parkinsans;
        }

        button {
            background: none;
            border: none;
        }

        body {
            padding: 0px;
            margin: 0px;
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

        .container {
            margin: 120px 40px;
            /* border: 1px solid black; */
            display: flex;
            flex-direction: row;
        }

        .order-list {
            margin-right: 30px;
            border: 1px solid #AAA;
            border-radius: 15px;
            width: fit-content;
            height: fit-content;
            padding: 20px;
            display: inline-flex;
            flex-direction: column;
            gap: 25px;

            .order-list-title {
                font-size: 16px;
                font-weight: 600;
            }

            .order-list-content {
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 10px;
            }

            .table-header {
                display: flex;
                flex-direction: row;
                border-bottom: 0.7px rgba(0, 0, 0, 0.10) solid;
                justify-content: flex-start;
                align-items: center;
                gap: 20px;
                display: inline-flex;
            }

            .table-body {
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 8px;
            }

            .header-col {
                font-size: 14px;
                padding-bottom: 8px;
            }

            .col-id {
                width: 75px;
            }

            .col-customer {
                width: 140px;
            }

            .col-qty {
                width: 47px;
            }

            .col-order-date {
                width: 95px;
            }

            .col-ship-date {
                width: 86px;
            }

            .col-status {
                width: 120px;
            }

            .col-action {
                width: 126px;
            }

            .table-row {
                padding-bottom: 8px;
                border-bottom: 1px #EEEEEE solid;
                justify-content: flex-start;
                align-items: center;
                gap: 20px;
                display: inline-flex;
            }

            .cell-text {
                font-size: 14px;
            }

            .customer-info {
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                display: flex;


                .customer-name {
                    width: 140px;
                    color: #0A0A0A;
                    font-size: 14px;
                }

                .customer-phone {
                    color: #666;
                    font-size: 14px;
                    line-height: 20px;
                }
            }

            .status-badge {
                padding: 4px 10px;
                border-radius: 8px;
                justify-content: center;
                align-items: center;
                gap: 10px;
                display: inline-flex;
            }

            .status-badge[data-status="Belum Diverifikasi"] {
                background: #ECEEF2;

                .status-text {
                    color: #030213;
                }
            }

            .status-badge[data-status="Diterima"] {
                background: #00B940;

                .status-text {
                    color: white;
                }
            }

            .status-badge[data-status="Ditolak"] {
                background: #D4183D;

                .status-text {
                    color: white;
                }
            }

            .status-text {
                font-size: 12px;
            }

            .action-button {
                border: none;
                background: none;
                width: fit-content;
                display: flex;
                padding: 8px 12px;
                background-color: black;
                border-radius: 8px;
                justify-content: center;
                align-items: center;

                .action-button-text {
                    color: white;
                    font-size: 12px;
                }
            }

            .action-button:hover {
                cursor: pointer;
                background-color: #1C398E;
            }
        }

        .summary-container {
            position: fixed;
            right: 40px;
            min-width: 240px;
            max-width: 260px;
            height: fit-content;
            padding: 20px;
            background: #1C398E;
            border-radius: 15px;
            display: inline-flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 10px;


            .summary-title {
                color: white;
                font-size: 16px;
                font-weight: 600;
            }

            .summary-description {
                color: white;
                font-size: 12px;
            }

            .summary-list {
                width: 100%;
                padding-right: 20px;
                box-sizing: border-box;
                margin-top: 5px;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                gap: 8px;

                .summary-item {
                    width: 100%;
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    padding: 5px 10px;
                    border-bottom: 1px #EEEEEE solid;
                }

                .summary-date {
                    color: white;
                    font-size: 16px;
                    font-weight: 600;
                    margin-right: auto;
                }

                .summary-qty {
                    justify-content: flex-start;
                    align-items: center;
                    gap: 8px;
                    display: flex;

                    .number {
                        color: white;
                        font-size: 20px;
                        font-weight: 700;
                    }

                    .unit {
                        color: white;
                        font-size: 16px;
                    }
                }
            }

            .nodata {
                font-size: 12px;
                color: rgba(255, 255, 255, 0.6);
            }

        }
    </style>
</head>

<body>
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
                    Resepsionis
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
    <div class="container">
        <div class="order-list">
            <div class="order-list-header">
                <div class="order-list-title">Daftar Pesanan Masuk</div>
            </div>
            <div class="order-list-content">
                <div class="table-header-container">
                    <div class="table-header">
                        <div class="col-id">
                            <div class="header-col">ID Pesanan</div>
                        </div>
                        <div class="col-customer">
                            <div class="header-col">Pelanggan</div>
                        </div>
                        <div class="col-qty">
                            <div class="header-col">Jumlah</div>
                        </div>
                        <div class="col-order-date">
                            <div class="header-col">Tanggal Pesan</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="header-col">Tanggal Kirim</div>
                        </div>
                        <div class="col-status">
                            <div class="header-col">Status</div>
                        </div>
                        <div class="col-action">
                            <div class="header-col">Aksi</div>
                        </div>
                    </div>
                </div>
                <div class="table-body">
                    @forelse($pesanan as $p)
                        <div data-status="{{ $p->status }}" data-id="{{ $p->idPesanan }}" class="table-row">
                            <div class="col-id">
                                <div class="cell-text">ORD{{ $p->idPesanan }}</div>
                            </div>
                            <div class="col-customer">
                                <div class="customer-info">
                                    <div class="customer-name cell-text">
                                        {{ $p->pelanggan->nama ?? '-' }}
                                    </div>
                                    <div class="customer-phone cell-text">
                                        {{ $p->pelanggan->nomorTelepon ?? '-' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-qty">
                                <div class="cell-text">{{ $p->jumlahBalok }}</div>
                            </div>
                            <div class="col-order-date">
                                <div class="cell-text">
                                    {{ $p->tanggalPesan->format('d/m/Y') }}
                                </div>
                            </div>
                            <div class="col-ship-date">
                                <div class="cell-text">{{ $p->tanggalKirim->format('d/m/Y') }}</div>
                            </div>
                            <div class="col-status">
                                <div data-status="{{ $p->status }}" class="status-badge">
                                    <div class="status-text">{{ $p->status }}</div>
                                </div>
                            </div>
                            <div class="col-action">
                                <button data-id="{{ $p->idPesanan }}" class="action-button">
                                    <div class="action-button-text">
                                        {{ trim(strtolower($p->status)) === 'belum diverifikasi' ? 'Verifikasi Pesanan' : 'Lihat Verifikasi' }}
                                    </div>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="table-row">
                            <div class="cell-text">Belum ada pesanan.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="summary-container">
            <div class="summary-title">
                Ringkasan Tanggal Pengiriman
            </div>
            <div class="summary-description">Tanggal pengiriman dan jumlah pesanan yang diterima</div>
            <div class="summary-list">
                @forelse($summary as $s)
                    <div class="summary-item">
                        <div class="summary-date">{{ $s->tanggal }}</div>
                        <div class="summary-qty">
                            <div class="number">{{ $s->total_balok }}</div>
                            <div class="unit">balok</div>
                        </div>
                    </div>
                @empty
                    <div class="nodata">
                        Tidak ada data.
                    </div>
                @endforelse
            </div>
        </div>
    </div>


    @include('KelolaPesanan-mal.popupverifpesanan-mal')
    @include('KelolaPesanan-mal.popupinputketerangan-mal')

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

            async function updateSummary() {
                // try {
                const res = await fetch('/ringkasan', { credentials: 'same-origin' });
                if (!res.ok) return;
                const j = await res.json();
                if (!j.success) return;
                const listEl = document.querySelector('.summary-list');
                if (!listEl) return;
                if (j.data.length === 0) {
                    return;
                }
                listEl.innerHTML = j.data.map(item => `
                        <div class="summary-item">
                            <div class="summary-date">${item.tanggal}</div>
                            <div class="summary-qty">
                                <div class="number">${item.total_balok}</div>
                                <div class="unit">balok</div>
                            </div>
                        </div>
                    `).join('');
                // } catch (err) {
                //     console.error('Gagal update summary', err);
                // }
            }

            const popUpVerif = document.getElementById('modal-root');
            const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const popUpKeterangan = document.getElementById('modal-keterangan-root');

            function tampilkanPopUpVerif() {
                if (!popUpVerif) return;
                // tampilkan
                popUpVerif.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                popUpVerif.querySelector('.modal')?.setAttribute('aria-hidden', 'false');
            }
            function tutupPopUpVerif() {
                if (!popUpVerif) return;
                popUpVerif.style.display = 'none';
                document.body.style.overflow = '';
                popUpVerif.querySelector('.modal')?.setAttribute('aria-hidden', 'true');
            }
            function tampilkanPopUpKeterangan() {
                if (!popUpKeterangan) return;
                popUpKeterangan.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                popUpKeterangan.querySelector('.modal')?.setAttribute('aria-hidden', 'false');
            }
            function tutupPopUpKeterangan() {
                if (!popUpKeterangan) return;
                popUpKeterangan.style.display = 'none';
                document.body.style.overflow = '';
                popUpKeterangan.querySelector('.modal')?.setAttribute('aria-hidden', 'true');
            }
            
            popUpVerif.addEventListener('click', function (e) {
                if (e.target.hasAttribute('data-close') || e.target.closest('.icon-close')) {
                    tutupPopUpVerif();
                    const errCon = document.getElementById('bagian-error');
                    errCon.style.display = 'none';
                    return;
                }
                // jika tombol tolak diklik di dalam popup verif -> buka modal keterangan
                if (e.target.closest('.btn-tolak')) {
                    // tutupPopUpVerif();
                    tampilkanPopUpKeterangan();
                    return;
                }
            });
            popUpKeterangan.addEventListener('click', function (e) {
                if (e.target.hasAttribute('data-close') || e.target.closest('.btn-cancel')) {
                    tutupPopUpKeterangan();
                }
            });

            const keteranganForm = document.querySelector('#modal-keterangan-root form.content');
            if (keteranganForm) {
                keteranganForm.addEventListener('submit', async function (ev) {
                    ev.preventDefault();
                    // if (!currentPesananId) {
                    //     alert('Tidak ada pesanan dipilih.');
                    //     return;
                    // }

                    const teksEl = document.getElementById('in-keterangan');
                    // const keterangan = teksEl;
                    const keterangan = teksEl ? teksEl.value.trim() : '';
                    // if (!keterangan) {
                    //     // simple client validation
                    //     alert('Mohon isi keterangan penolakan.');
                    //     return;
                    // }

                    const submitBtn = keteranganForm.querySelector('.btn-save');
                    // const origText = submitBtn ? submitBtn.textContent : null;
                    // if (submitBtn) { submitBtn.disabled = true; submitBtn.textContent = 'Menyimpan...'; }

                    try {
                        const resp = await fetch(`/pesanan/${currentPesananId}/tolak`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            credentials: 'same-origin',
                            body: JSON.stringify({ keterangan })
                        });

                        let jr = {};
                        try { jr = await resp.json(); } catch (e) { /* ignore */ }

                        if (resp.ok && jr.success) {
                            // tutup modal keterangan
                            const kRoot = document.getElementById('modal-keterangan-root');
                            if (kRoot) {
                                kRoot.style.display = 'none';
                                document.body.style.overflow = '';
                                kRoot.querySelector('.modal')?.setAttribute('aria-hidden', 'true');
                            }

                            // update popup verif jika terbuka
                            const pvStatus = document.getElementById('pv-status');
                            if (pvStatus) {
                                pvStatus.querySelector('.text').textContent = 'Ditolak';
                                pvStatus.setAttribute('status', 'Ditolak');
                            }

                            const actionsEl = document.getElementById('actions');
                            if (actionsEl) {
                                actionsEl.setAttribute('status', 'Ditolak');
                            }

                            const pvError = document.getElementById('pv-error');
                            if (pvError) { pvError.style.display = 'none'; pvError.textContent = ''; }

                            const kolomKet = document.getElementById('keterangan');
                            if (kolomKet) {
                                kolomKet.setAttribute('status', 'Ditolak');
                            }

                            const pvKet = document.getElementById('pv-keterangan');
                            if (pvKet) {
                                pvKet.textContent = keterangan;
                            }

                            // update table row status & keterangan
                            const row = document.querySelector(`.table-row[data-id="${currentPesananId}"]`);
                            if (row) {
                                const badge = row.querySelector('.status-badge');
                                if (badge) {
                                    const st = badge.querySelector('.status-text');
                                    if (st) st.textContent = 'Ditolak';
                                    badge.setAttribute('data-status', 'Ditolak');
                                }
                                row.setAttribute('data-status', 'Ditolak');

                                // ubah tombol aksi menjadi "Lihat Verifikasi"
                                const actionBtnText = row.querySelector('.action-button .action-button-text');
                                if (actionBtnText) actionBtnText.textContent = 'Lihat Verifikasi';
                            }

                            // kosongkan textarea setelah sukses
                            if (teksEl) teksEl.value = '';

                        } else {
                            const msg = jr.message || 'Gagal menyimpan keterangan.';
                            alert(msg);
                        }
                    } catch (err) {
                        console.error('tolak fetch error', err);
                        alert('Terjadi kesalahan jaringan saat mengirim keterangan.');
                    }
                    // finally {
                    //     if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = origText; }
                    // }
                });
            }

            let currentPesananId = null;
            document.querySelectorAll('.action-button').forEach(btn => {
                btn.addEventListener('click', async function (e) {
                    const id = btn.dataset.id || btn.closest('.table-row')?.dataset.id;
                    const row = btn.closest('.table-row');
                    if (!id) return;
                    currentPesananId = id;
                    try {
                        const res = await fetch(`/pesanan/${id}`);
                        const json = await res.json();
                        if (!json.success) { alert(json.message || 'Pesanan tidak ditemukan'); return; }
                        const p = json.data;

                        // isi modal
                        document.getElementById('pv-id').textContent = 'ORD' + p.idPesanan;
                        document.getElementById('pv-nama').textContent = p.pelanggan?.nama ?? '-';
                        document.getElementById('pv-email').textContent = p.pelanggan?.email ?? '-';
                        document.getElementById('pv-telp').textContent = p.pelanggan?.nomorTelepon ?? '-';
                        document.getElementById('pv-alamat').textContent = p.alamatKirim ?? '-';
                        document.getElementById('pv-jumlah').textContent = p.jumlahBalok ?? 0;
                        document.getElementById('pv-keterangan').textContent = p.keteranganPenolakan ?? '-';
                        document.getElementById('pv-status').querySelector('.text').textContent = (p.status ?? '-');
                        document.getElementById('pv-status').setAttribute('status', p.status);
                        document.getElementById('actions').setAttribute('status', p.status);
                        document.getElementById('keterangan').setAttribute('status', p.status);

                        const pvTanggalPesanEl = document.getElementById('pv-tanggalPesan');
                        if (pvTanggalPesanEl) {
                            pvTanggalPesanEl.textContent = p.tanggalPesan;
                        }
                        const pvTanggalKirimEl = document.getElementById('pv-tanggalKirim');
                        if (pvTanggalKirimEl) {
                            pvTanggalKirimEl.textContent = p.tanggalKirim;
                        }

                        // tampilkan modal
                        tampilkanPopUpVerif();

                        // terima handler
                        const btnTerima = document.getElementById('pv-terima');
                        if (btnTerima) {
                            btnTerima.replaceWith(btnTerima.cloneNode(true));
                            const newBtnTerima = document.getElementById('pv-terima');

                            newBtnTerima.addEventListener('click', async function () {
                                const errCon = document.getElementById('bagian-error');
                                const errEl = document.getElementById('pv-error');
                                if (errCon) { errCon.style.display = 'none'; errEl.textContent = ''; }

                                try {
                                    const resp = await fetch(`/pesanan/${id}/terima`, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': csrf
                                        },
                                        credentials: 'same-origin',
                                        body: JSON.stringify({})
                                    });

                                    // parse JSON safely
                                    let jr = {};
                                    try { jr = await resp.json(); } catch (e) { /* ignore */ }

                                    if (resp.ok && jr.success) {
                                        // sukses: update badge status di popup
                                        const pvStatusEl = document.getElementById('pv-status');
                                        if (pvStatusEl) {
                                            pvStatusEl.querySelector('.text').textContent = 'Diterima';
                                            pvStatusEl.setAttribute('status', 'Diterima');
                                        }

                                        // update status elemen actions
                                        const actionsEl = document.getElementById('actions');
                                        if (actionsEl) {
                                            actionsEl.setAttribute('status', 'Diterima');
                                        }

                                        // update status badge in table row
                                        if (row) {
                                            const badge = row.querySelector('.status-badge');
                                            if (badge) {
                                                badge.querySelector('.status-text').textContent = 'Diterima';
                                                badge.setAttribute('data-status', 'Diterima');
                                            }
                                            row.setAttribute('data-status', 'Diterima');

                                            // update button text to "Lihat Verifikasi"
                                            const actionBtn = row.querySelector('.action-button .action-button-text');
                                            if (actionBtn) {
                                                actionBtn.textContent = 'Lihat Verifikasi';
                                            }
                                        }
                                        // await updateSummary();

                                        if (typeof updateSummary === 'function') {
                                            try { await updateSummary(); } catch (e) { console.error('updateSummary failed', e); }
                                        }

                                    } else {
                                        // tampilkan pesan dari server (422 atau error lain)
                                        const message = jr.message || 'Gagal menerima pesanan.';
                                        if (errCon) {
                                            errEl.textContent = message;
                                            errCon.style.display = 'flex';
                                        } else {
                                            alert(message);
                                        }
                                    }
                                } catch (err) {
                                    console.error(err);
                                    const msg = 'Terjadi kesalahan jaringan.';
                                    const errEl2 = document.getElementById('pv-error');
                                    if (errEl2) {
                                        errEl2.textContent = msg;
                                        errEl2.style.display = 'block';
                                    } else {
                                        alert(msg);
                                    }
                                }
                            });
                        }
                    } catch (err) {
                        console.error(err);
                        alert('Terjadi kesalahan saat mengambil data pesanan.');
                    }
                });
            });

            updateSummary();
        })();
    </script>

</body>

</html>