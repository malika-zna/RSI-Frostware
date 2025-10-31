<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Produksi</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link
    href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Parkinsans:wght@300..800&family=Inter:wght@400;600;700&display=swap"
    rel="stylesheet">

  <style>
    * {
      font-family: 'Figtree', sans-serif;
      box-sizing: border-box;
    }

    :root {
      --header-h: 72px;
    }

    html {
      background: #fff;
      height: 100%;
    }

    html,
    body {
      height: 100%;
    }

    body {
      margin: 0;
      padding: 0;
      background: #fff;
      color: #000;
      padding-top: env(safe-area-inset-top);
    }

    /* Header */
    .navbar {
      background-color: #1C398E;
      box-shadow: -5px 5px 8px rgba(0, 0, 0, 0.25);
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      margin-top: 0;
      padding: 20px 40px;
      padding-right: 20px;
      z-index: 1000;
    }

    .navbar-left h1 {
      margin: 0;
      font-size: 26px;
      font-weight: 600;
      font-family: Parkinsans;
    }

    .navbar-right {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 2px;
      font-size: 13px;
      line-height: 1.2;
      position: relative;

      .tanggal {
        padding-right: 8px;
        color: rgba(255, 255, 255, 0.60);
        font-size: 12px;
        font-weight: 400;
        font-family: 'Inter', sans-serif;
        opacity: 0.60;
      }
    }

    /* small arrow/link styles */
    .back-link {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      color: inherit;
      text-decoration: none;
      padding: 6px 8px;
      border-radius: 0;
    }

    .back-link:hover {
      background: rgba(255, 255, 255, 0.06);
    }

    .back-link svg {
      width: 10px;
      fill: white;
      opacity: 0.95;
    }

    .back-link div {
      font-weight: 500;
      font-size: 16px;
      line-height: 1;
      font-family: Parkinsans;
    }

    /* CSS BARU UNTUK USER PANEL (TAMPILAN TERANG) */
    .user-panel {
      display: none;
      position: absolute;
      top: 100%;
      right: 0;
      margin-top: 1px;
      width: 250px;
      background-color: #fff;
      /* LATAR BELAKANG TERANG */
      color: #000;
      /* Teks default HITAM */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      padding: 12px 16px;
      border-radius: 4px;
      z-index: 1010;
      font-family: 'Inter', sans-serif;
      text-align: left;
      line-height: 1.4;
    }

    .user-panel .user-role {
      font-weight: 700;
      font-size: 16px;
      margin-bottom: 2px;
    }

    .user-panel .user-name {
      font-weight: 400;
      font-size: 14px;
      color: #333;
    }

    .user-panel .user-email {
      font-weight: 400;
      font-size: 12px;
      color: #666;
      margin-bottom: 8px;
    }

    .user-panel .user-divider {
      height: 1px;
      background-color: #555;
      /* GARIS LEBIH HITAM/KONTRAST */
      margin: 8px 0;
    }

    .user-panel .user-actions {
      width: 100%;
      background: none;
      border: none;
      text-align: right;
      padding: 8px 0 0 0;
      cursor: pointer;
      font-size: 14px;
      font-weight: 600;
      color: #D32F2F;
    }

    .user-panel .user-actions:hover {
      opacity: 0.9;
      background-color: #f7f7f7;
    }

    /* Main Section */
    .main {
      background: #fff;
      margin: 0;
      padding: 18px 100px;
      margin-top: var(--header-h);
      min-height: calc(100vh - var(--header-h));
    }

    .main h2 {
      text-align: center;
      font-size: 36px;
      font-weight: 700;
      margin-bottom: 25px;
    }

    /* responsive: make heading a bit smaller on narrow screens */
    @media (max-width: 480px) {
      .main {
        padding: 20px 18px;
        margin-top: 64px;
      }

      .main h2 {
        font-size: 22px;
      }

      .navbar {
        padding: 12px 18px;
      }
    }

    /* Buttons */
    .action-buttons {
      display: flex;
      justify-content: flex-end;
      gap: 12px;
      margin-bottom: 30px;
    }

    .btn-small {
      background-color: #000;
      color: #fff;
      border: none;
      padding: 8px 16px;
      border-radius: 6px;
      font-family: 'Inter', sans-serif;
      font-weight: 600;
      font-size: 14px;
      cursor: pointer;
      box-shadow: 0 2px 0 rgba(0, 0, 0, 0.08);
      text-decoration: none;
      display: inline-block;
    }

    .btn-small:hover {
      opacity: 0.9;
    }

    .btn-pill {
      background-color: #00AEEF;
      color: #fff;
      border: none;
      padding: 8px 18px;
      border-radius: 0;
      font-size: 13px;
      cursor: pointer;
      box-shadow: 0 4px 0 rgba(0, 0, 0, 0.06);
    }

    .btn-pill:hover {
      filter: brightness(0.95);
    }

    /* Cards */
    .card {
      border: 1px solid #cfcfcf;
      border-radius: 0;
      padding: 20px 30px;
      margin-bottom: 20px;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }

    .card-content {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .card h3 {
      font-size: 18px;
      font-weight: 700;
      margin: 0;
    }

    .card p {
      margin: 0;
      font-size: 15px;
      color: #333;
    }

    .card span {
      font-weight: 600;
    }

    .status {
      text-align: right;
    }

    .status p {
      color: #b3b3b3;
      font-weight: 600;
      font-size: 15px;
      margin-bottom: 20px;
    }

    /* button-style for finished state with press effect */
    .done-btn {
      background-color: #00C950;
      color: white;
      padding: 8px 18px;
      border-radius: 0;
      border: none;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 6px 0 rgba(0, 0, 0, 0.06);
      transition: transform 120ms ease, box-shadow 120ms ease, opacity 120ms ease;
    }

    .done-btn:active,
    .done-btn.pressed {
      transform: translateY(3px) scale(0.995);
      box-shadow: 0 2px 0 rgba(0, 0, 0, 0.04);
      opacity: 0.98;
    }

    /* =========================
       KOTAK PESAN KOSONG (EMPTY STATE)
       ========================= */
    .empty-state-message {
      background: #D9D9D9;
      font-size: 22px;
      font-weight: 700;
      text-align: center;
      padding: 48px 0;
      margin: 32px 0;
      border-radius: 8px;
      font-family: 'Inter', sans-serif;
      line-height: 1.4;
      color: transparent;
    }

    .empty-state-message span {
      color: #222;
      display: block;
      opacity: 0.73;
    }

    /* =========================
       CSS MODAL POPUP PRODUKSI
       ========================= */
    #popup-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.18);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .popup-box {
      background: #153E90;
      color: #fff;
      width: 380px;
      padding: 32px 28px 28px 28px;
      border-radius: 0;
      text-align: center;
      box-shadow: 0 4px 18px rgba(0, 0, 0, 0.18);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .popup-box p {
      font-size: 22px;
      font-weight: 500;
      margin-bottom: 38px;
      margin-top: 0;
    }

    .popup-buttons {
      display: flex;
      justify-content: space-between;
      width: 100%;
      gap: 32px;
    }

    .popup-buttons button {
      background: #153E90;
      border: none;
      color: #fff;
      font-weight: 700;
      font-size: 22px;
      cursor: pointer;
      min-width: 100px;
      height: 40px;
      border-radius: 0;
    }
  </style>
</head>

<body>
  <div class="navbar">
    <div class="navbar-left">
      <h1>Frostware</h1>
    </div>
    <div class="navbar-right" id="navbar-user-area">
      <a class="back-link" href="#" id="toggle-user-panel" title="Lihat Profil">
        <div>Penanggung Jawab Produksi</div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="#FFF" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
          <path
            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
        </svg>
      </a>
      <div class="tanggal" id="tanggal-hari-ini"></div>

      <div class="user-panel" id="user-panel">
        <div class="user-role">{{ session('role', 'Role') }}</div>
        <div class="user-name">{{ session('nama', 'nama pengguna') }}</div>
        <div class="user-email">{{ session('email', 'email') }}</div>
        <div class="user-divider"></div>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="user-actions" type="submit">
            <div class="logout-text">Logout</div>
          </button>
        </form>
      </div>
    </div>
  </div>

  <div class="main">
    <h2>DAFTAR PRODUKSI</h2>

    <div class="action-buttons">
      <a href="{{ url('/aset') }}" class="btn-small">Lihat Aset</a>
      <a href="{{ url('/produksi?urutkan=1') }}" class="btn-small">Urutkan Berdasarkan Waktu Pengiriman</a>
    </div>

    @if(isset($daftarProduksi) && count($daftarProduksi) > 0)
    @foreach($daftarProduksi as $pesanan)
    <div class="card">
      <div class="card-content">
        <h3>Nama Pelanggan</h3>
        <p><strong>{{ $pesanan->jumlahBalok ?? 0 }} Balok Es</strong></p>
        <p><span>Tanggal Pengiriman</span> : {{ $pesanan->tanggalKirim }}</p>
        <p><span>ID Pesanan</span> : {{ $pesanan->idPesanan }}</p>
      </div>
      <div class="status">
        <p>{{ $pesanan->status ? 'Belum Diproduksi' : '-' }}</p>
        @if($pesanan->status == 'Diterima')
        <button class="done-btn" type="button">Selesai Diproduksi</button>
        @endif
      </div>
    </div>
    @endforeach
    @else
    <div class="empty-state-message">
      <span>
        @if(request()->has('urutkan'))
        Tidak Ada Pesanan yang Diurutkan
        @else
        Tidak Ada Pesanan untuk Diproduksi
        @endif
      </span>
    </div>
    @endif
  </div>


  <div id="popup-overlay">
    <div class="popup-box">
      <p>Konfirmasi Produksi Selesai?</p>
      <div class="popup-buttons">
        <button id="btn-cancel">Batal</button>
        <button id="btn-confirm">Selesai</button>
      </div>
    </div>
  </div>

  <script>
    // Fungsi untuk mendapatkan nama hari dalam Bahasa Indonesia
    function getNamaHari(dayIndex) {
      const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
      return days[dayIndex];
    }

    // Fungsi untuk memformat dan menampilkan tanggal hari ini
    function updateTanggal() {
      const today = new Date();
      const hari = getNamaHari(today.getDay());
      const tanggal = String(today.getDate()).padStart(2, '0');
      const bulan = String(today.getMonth() + 1).padStart(2, '0');
      const tahun = today.getFullYear();

      const tanggalFormatted = `${hari}, ${tanggal}/${bulan}/${tahun}`;

      const tanggalElement = document.getElementById('tanggal-hari-ini');
      if (tanggalElement) {
        tanggalElement.textContent = tanggalFormatted;
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      updateTanggal();

      // LOGIKA USER PANEL (TOGGLE DROPDOWN)
      const toggleButton = document.getElementById('toggle-user-panel');
      const userPanel = document.getElementById('user-panel');

      toggleButton.addEventListener('click', function(event) {
        event.preventDefault();
        userPanel.style.display = userPanel.style.display === 'block' ? 'none' : 'block';
      });

      // Menutup panel saat mengklik di luar panel
      document.addEventListener('click', function(event) {
        const navbarUserArea = document.getElementById('navbar-user-area');
        if (navbarUserArea && !navbarUserArea.contains(event.target)) {
          userPanel.style.display = 'none';
        }
      });

      // LOGIKA POPUP KONFIRMASI 
      document.querySelectorAll('.done-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
          btn.classList.add('pressed');
          setTimeout(function() {
            btn.classList.remove('pressed');
          }, 180);
          document.getElementById('popup-overlay').style.display = 'flex';
        });
      });
      document.getElementById('btn-cancel').onclick = function() {
        document.getElementById('popup-overlay').style.display = 'none';
      };
      document.getElementById('btn-confirm').onclick = function() {
        document.getElementById('popup-overlay').style.display = 'none';
      };
    });
  </script>
</body>

</html>