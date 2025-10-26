<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Produksi</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Parkinsans:wght@300..800&display=swap"
    rel="stylesheet">
  <style>
    * {
      font-family: 'Figtree', sans-serif;
      box-sizing: border-box;
    }

    :root {
      --header-h: 72px;
      /* approximate header height used for layout */
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
      /* page background should be white so bottom area stays white */
      background: #fff;
      color: #000;
      /* support device notches */
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
      /* pin the navbar to the top so it always fills the top edge */
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      margin-top: 0;
      padding: 20px 40px;
      padding-right: 20px;
      z-index: 1000;
      /* ensure the text inside stays centered vertically */
    }

    .navbar-left h1 {
      margin: 0;
      font-size: 26px;
      /* made larger per request */
      font-weight: 600;
      font-family: Parkinsans;
    }

    .navbar-right {
      /* use flex so the two lines align to the right and remain centered vertically */
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 2px;
      font-size: 13px;
      line-height: 1.2;

      .tanggal {
        padding-right: 8px;

        color: rgba(255, 255, 255, 0.60);
        font-size: 12px;
        font-weight: 400;

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
      /* height: 14px; */
      fill: white;
      opacity: 0.95;
    }

    .back-link div {
      font-weight: 500;
      font-size: 16px;
      line-height: 1;
      font-family: Parkinsans;
    }

    /* Main Section */
    .main {
      /* white sheet that sits directly under the blue navbar */
      background: #fff;
      margin: 0;
      padding: 18px 100px;
      /* push content below the fixed navbar (approx header height) */
      margin-top: var(--header-h);
      /* fill remaining viewport so bottom stays white */
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
      /* align to right */
      gap: 12px;
      margin-bottom: 30px;
    }

    .btn-small {
      background-color: #000;
      color: #fff;
      border: none;
      padding: 8px 12px;
      border-radius: 0;
      font-size: 13px;
      cursor: pointer;
      box-shadow: 0 2px 0 rgba(0, 0, 0, 0.08);
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
      /* updated to requested green */
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
  </style>
</head>

<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-left">
      <h1>Frostware</h1>
    </div>
    <div class="navbar-right">
      <a class="back-link" href="/login" title="Kembali ke login">
        <div>Penanggung Jawab Produksi</div>
        <!-- down arrow icon (small) -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="#FFF" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
          <path
            d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
        </svg>
      </a>
      <div class="tanggal">Minggu, 28/09/2025</div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main">
    <h2>DAFTAR PRODUKSI</h2>

    <div class="action-buttons">
      <button class="btn-small" type="button">Lihat Aset</button>
      <button class="btn-small" type="button">Urutkan Berdasarkan Waktu Pengiriman</button>
    </div>

    <!-- Card 1 -->
    <div class="card">
      <div class="card-content">
        <h3>Nama Pelanggan</h3>
        <p><strong>120 balok es</strong></p>
        <p><span>Tanggal Pengiriman</span> : 10-10-2025</p>
        <p><span>ID Pesanan</span> : ORD001</p>
      </div>
      <div class="status">
        <p>Belum Diproduksi</p>
        <button class="done-btn" type="button">Selesai Diproduksi</button>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="card">
      <div class="card-content">
        <h3>Nama Pelanggan</h3>
        <p><strong>220 balok es</strong></p>
        <p><span>Tanggal Pengiriman</span> : 09-10-2025</p>
        <p><span>ID Pesanan</span> : ORD002</p>
      </div>
      <div class="status">
        <p>Belum Diproduksi</p>
        <button class="done-btn" type="button">Selesai Diproduksi</button>
      </div>
    </div>
  </div>
</body>

</html>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.done-btn').forEach(function (btn) {
      btn.addEventListener('click', function () {
        btn.classList.add('pressed');
        setTimeout(function () { btn.classList.remove('pressed'); }, 180);
      });
    });
  });
</script>