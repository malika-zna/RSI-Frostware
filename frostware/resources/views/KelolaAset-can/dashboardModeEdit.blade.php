<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Parkinsans:wght@300..800&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <title>Dashboard Pemeliharaan - Frostware</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Inter, sans-serif;
        }
        body {
            width: 100vw;
            height: 100vh;
            overflow-x: hidden;
            background: #FFFFFF;
        }

        button {
            background: none;
            border: none;}

        /* bg header */
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
        }
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
        }

        .user {
            color: white;
            font-size: 16px;
            font-weight: 500;
        }

        svg {
            width: 10px;
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
        }

        .date p {
            color: rgba(255, 255, 255, 0.60);
            font-size: 12px;
            font-weight: 400;
        }

        .user-panel {
            width: 280px;
            height: fit-content;
            padding: 20px 25px 15px 25px;
            background: #000;
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
        }

        .user-role {
            color: #fff;
            font-size: 16px;
            font-family: Parkinsans;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .user-email {
            color: rgba(255, 255, 255, 0.60);
            font-size: 12px;
            font-weight: 400;
        }

        .user-name {
            color: #fff;
            font-size: 14px;
            font-weight: 400;
        }

        .user-divider {
            align-self: stretch;
            height: 5px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.60);
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        form {
            margin-left: auto;
        }

        .user-actions {
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
            font-weight: 400;
        }

        /* body konten*/
        .container {
            position: absolute;
            top: 111px;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        /* Bagian kiri dan kanan */
        .left, .right {
            width: 48%;
            position: relative;
        }

        /* Button Style */
        .btn-main {
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            gap: 4px;
            width: 211px;
            height: 58px;
            background: #1C398E;
            border: 1px solid #1C398E;
            border-radius: 15px;
            color: #ffffffff;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
        }
        
         /* batas kiri kanan konten */
        .left, .right {
            width: 48%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Card */
        .card {
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 20px;
            gap: 7px;
            width: 100%;
            width: 540px;
            background: #FFFFFF;
            border: 1px solid #AAAAAA;
            border-radius: 15px;
            margin-top: 50px;
            min-height: 260px;
        }
        
        .edit-header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
        }
        
        .action-buttons button {
            width: 25px;
            height: 25px;
            border: none;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
        }
        
        .action-buttons button.delete {
            background-color: transparent;
            color: black;
            font-size: 16px;
            line-height: 1;
            font-size: 20px;
        }

        /* Badge */
        .badge {
            width: 211px;
            height: 58px;
            box-sizing: border-box;
            background: #1C398E;
            border: 1px solid #1C398E;
            border-radius: 15px;
            color: #FFFFFF;
            font-family: 'Inter', sans-serif;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .btn-small {
            box-sizing: border-box;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 4px 12px;
            gap: 4px;
            background: #ECEEF2;
            border-radius: 8px;
            font-family: 'Arimo', sans-serif;
            font-weight: 400;
            font-size: 12px;
            line-height: 16px;
            color: #030213;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .btn-small:hover {
            background: rgba(22, 45, 112, 0.3);
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Arimo', sans-serif;
        }
        thead tr {
            border-bottom: 1px solid #E0E0E0;
        }
        tbody td {
            padding-top: 14px;
            padding-bottom: 14px;
            border-bottom: 1px solid #E0E0E0;
        }
        th {
            text-align: left;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            color: #0A0A0A;
            padding: 12px 10px;
        }
        td {
            padding: 12px 10px;
            vertical-align: middle;
            font-family: 'Arimo', sans-serif;
            font-weight: 400;
            font-size: 14px;
            color: #0A0A0A;
        }

        /* Row style */
        tbody tr {
            background: #FFFFFF;
            border-bottom: 1px solid #EEEEEE;
        }

        /* Badge Status kecil */
        .badge-status {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 3px 10px;
            gap: 10px;
            border-radius: 8px;
            font-family: 'Arimo', sans-serif;
            font-weight: 400;
            font-size: 12px;
            line-height: 16px;
            color: #FFFFFF;
            width: max-content;
        }
        .status-baik {
            background: #00C950;
        }
        .status-sedang {
            background: #E06600;
            white-space: normal;
            line-height: 14px;
            text-align: center;
        }
        .status-rusak {
            background: #D4183D;
        }

        .status-wrapper {
            position: relative;
            display: inline-block;
        }

        .status-badge {
            cursor: pointer;
        }
        
        .status-dropdown {
            display: none;
            position: absolute;
            top: 32px;
            left: 0;
            background: white;
            border: 1px solid #DDD;
            border-radius: 10px;
            padding: 6px 0;
            width: 150px;
            z-index: 50;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
        }
        
        .status-dropdown div {
            background: #ECEEF2;
            padding: 6px 10px;
            margin: 6px 10px;
            border-radius: 8px;
            font-size: 12px;
            font-family: 'Arimo', sans-serif;
            color: #030213;
            cursor: pointer;
            text-align: center;
            transition: 0.2s;
        }

        .status-dropdown div:hover {
            background: rgba(22, 45, 112, 0.3);
        }

        /* POPUP OVERLAY */
.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0,0,0,0.4);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 500;
}

/* BOX POPUP */
.popup-box {
    width: 420px;
    background: #fff;
    padding: 25px;
    border-radius: 15px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    font-family: 'Inter', sans-serif;
}

.popup-box h2 {
    font-size: 18px;
    font-weight: 600; 
}


/* TEXTAREA */
.popup-box textarea {
    width: 100%;
    height: 64px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    resize: none;
    font-family: 'Inter', sans-serif;
}

/* BUTTON WRAPPER */
.popup-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

/* BUTTON BATAL */
.btn-batal {
    padding: 8px 14px;
    border-radius: 8px;
    background: #ccc;
    border: none;
    cursor: pointer;
}

/* BUTTON SIMPAN */
.btn-simpan {
    padding: 8px 14px;
    border-radius: 8px;
    background: #1C398E;
    color: #fff;
    border: none;
    cursor: pointer;
}

    </style>
</head>
<body>

<!-- html -->
<header>
        <div class="head-title">
            Frostware
        </div>
        <div class="head-info">
            <button class="user-info" onclick="togglePanel()">
                <h2 class="user">
                    Penanggung Jawab Pemeliharaan
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

<!-- tambahan user profil -->
<div class="user-panel" id="userPanel">
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

<div class="container">

    <section class="left">
        <div class="badge">Daftar Aset</div>

        <div style="width:100%; height:1px; background:#000; opacity:.1; margin:20px 0;"></div>

        <div class="card">
        <div class="edit-header">
            <button class="btn-small" onclick="window.location.href='{{ route('kelolaaset') }}'">Matikan Mode Edit</button>
            <div class="action-buttons">
                <button class="add" title="Tambah">
                    <span class="material-symbols-outlined">add</span>
                </button>
                <button class="delete" title="Hapus">
                    <span class="material-symbols-outlined">delete</span>
                </button>
            </div>
        </div>

            <table>
                <thead>
                    <tr>
                        <th style="width:48px;">ID Aset</th>
                        <th style="width:73px;">Nama Aset</th>
                        <th style="width:81px;">Tanggal Beli</th>
                        <th style="width:107px;">Update Terakhir</th>
                        <th style="width:44px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($daftarAset as $a)
                    <tr>
                    <td>{{ $a->idAset }}</td>
                        <td>{{ $a->namaAset }}</td>
                        <td>{{ \Carbon\Carbon::parse($a->tanggalBeli)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($a->updated_at)->format('d/m/Y') }}</td>

                        @php
                        $class = match(strtolower($a->status)) {
                            'baik' => 'status-baik',
                            'sedang diperbaiki' => 'status-sedang',
                            'rusak' => 'status-rusak',
                            default => '',
                        };
                        @endphp

                        <td>
                            <div class="status-wrapper">
                                <span class="badge-status {{ $class }} status-badge"
                                data-id="{{ $a->idAset }}"
                                data-current="{{ strtolower($a->status) }}">
                                {{ ucfirst($a->status) }}
                            </span>
                            <!-- Dropdown -->
                            <div class="status-dropdown">
                            </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align:center;">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <div style="width:1px; background:#000; opacity:.1; align-self: stretch;"></div>
    
    <section class="right">
        <div class="badge">Log Aktivitas</div>

        <div style="width:100%; height:1px; background:#000; opacity:.1; margin:20px 0;"></div>

        <div class="card" style="min-height: 342px;">
            <button class="btn-small">Lihat Laporan Kerusakan</button>


            <table>
                <thead>
                    <tr>
                        <th style="width:48px;">ID Aset</th>
                        <th style="width:83px;">Nama Aset</th>
                        <th style="width:81px;">Riwayat Update</th>
                        <th style="width:126px;">Catatan</th>
                        <th style="width:55px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CHN001</td>
                        <td>Mesin Pembuat es</td>
                        <td>03/04/2010</td>
                        <td>Meletus Saat Digunakan</td>
                        <td><span class="badge-status status-rusak">Rusak</span></td>
                    </tr>
                    <tr>
                        <td>CHN001</td>
                        <td>Mesin Pembuat es</td>
                        <td>10/04/2010</td>
                        <td>Pembersihan Mesin</td>
                        <td><span class="badge-status status-sedang">Sedang<br>Diperbaiki</span></td>
                    </tr>
                    <tr>
                        <td>CHN001</td>
                        <td>Mesin Pembuat es</td>
                        <td>10/04/2010</td>
                        <td>Mesin Dapat Digunakan Kembali</td>
                        <td><span class="badge-status status-baik">Baik</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

</div>

                            <!-- POPUP CATATAN -->
                            <div id="popupCatatan" class="popup-overlay">
    <div class="popup-box">
        <h2>Tambahkan catatan perubahan status</h2>

        <textarea id="inputCatatan"
        placeholder="Contoh: Mesin meletus saat digunakan..."></textarea>

        <div class="popup-actions">
            <button class="btn-batal" onclick="tutupPopup()">Batal</button>
            <button class="btn-simpan" onclick="simpanCatatan()">Simpan</button>
        </div>
    </div>
</div>


<!-- js -->
<script>
// header user
function togglePanel() {
    const panel = document.getElementById('userPanel');
    panel.style.display = panel.style.display === 'flex' ? 'none' : 'flex';
    }

// hari dan tanggal
function updateDate() {
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

            updateDate();
                                // STATUS DROPDOWN LOGIC
                                document.addEventListener("DOMContentLoaded", () => {
                                const statusBadges = document.querySelectorAll(".status-badge");

                                statusBadges.forEach(badge => {
                                    badge.addEventListener("click", function () {
                                        const wrapper = this.parentElement;
                                        const dropdown = wrapper.querySelector(".status-dropdown");

                                        // Tutup dropdown lain
                                        document.querySelectorAll(".status-dropdown").forEach(d => {
                                            if (d !== dropdown) d.style.display = "none";
                                        });

                                        const current = this.dataset.current; 
                                        let options = [];

                                        // LOGIKA BARU SESUAI PERMINTAAN KAMU
                                        if (current === "baik") {
                                            options = ["Sedang Diperbaiki", "Rusak"];
                                        } 
                                        else if (current === "sedang diperbaiki") {
                                            options = ["Baik", "Rusak"];
                                        }
                                        else if (current === "rusak") {
                                            options = ["Baik", "Sedang Diperbaiki"];
                                        }

                                        dropdown.innerHTML = "";
                                        options.forEach(opt => {
                                            dropdown.innerHTML += `<div data-new="${opt}">${opt}</div>`;
                                        });

                                        dropdown.style.display = "block";

// EVENT klik pilihan → buka popup, jangan update status dulu
dropdown.querySelectorAll("div").forEach(optEl => {
    optEl.addEventListener("click", () => {
        const newStatus = optEl.dataset.new;

        // simpan status & badge sementara
        window.statusBaru = newStatus;
        window.badgeAktif = badge;

        // tampilkan popup
        document.getElementById("popupCatatan").style.display = "flex";

        // tutup dropdown
        dropdown.style.display = "none";
    });
});                                    });
                                });

                                // Klik di luar dropdown → tutup
                                document.addEventListener("click", function(e) {
                                    if (!e.target.classList.contains("status-badge")) {
                                        document.querySelectorAll(".status-dropdown").forEach(d => d.style.display = "none");
                                    }
                                });
                                });
                                function tutupPopup() {
    document.getElementById("popupCatatan").style.display = "none";
    document.getElementById("inputCatatan").value = "";
}

function simpanCatatan() {
    const catatan = document.getElementById("inputCatatan").value.trim();
    if (catatan === "") {
        alert("Catatan tidak boleh kosong");
        return;
    }

    const badge = window.badgeAktif;
    const newStatus = window.statusBaru;

    // Update teks badge
    badge.textContent = newStatus;

    // Update warna
    badge.classList.remove("status-baik","status-sedang","status-rusak");
    let low = newStatus.toLowerCase();

    if (low === "baik") badge.classList.add("status-baik");
    if (low === "rusak") badge.classList.add("status-rusak");
    if (low === "sedang diperbaiki") badge.classList.add("status-sedang");

    badge.dataset.current = low;

    tutupPopup();
}

</script>

</body>
</html>