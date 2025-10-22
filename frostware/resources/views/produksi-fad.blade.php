<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Produksi</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Figtree', sans-serif;
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      background: #fff;
      color: #000;
    }

    /* Header */
    .navbar {
      background-color: #1C398E;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 30px;
    }

    .navbar-left h1 {
      margin: 0;
      font-size: 20px;
      font-weight: 700;
    }

    .navbar-right {
      text-align: right;
      font-size: 13px;
      line-height: 1.4;
    }

    /* Main Section */
    .main {
      padding: 30px 100px;
    }

    .main h2 {
      text-align: center;
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 25px;
    }

    /* Buttons */
    .action-buttons {
      text-align: center;
      margin-bottom: 30px;
    }

    .action-buttons button {
      background-color: black;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 8px;
      margin: 0 6px;
      font-size: 13px;
      cursor: pointer;
      transition: 0.3s;
    }

    .action-buttons button:hover {
      background-color: #00A0FF;
    }

    /* Cards */
    .card {
      border: 1px solid #cfcfcf;
      border-radius: 6px;
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

    .status .done {
      background-color: #00C853;
      color: white;
      padding: 6px 14px;
      border-radius: 4px;
      font-weight: 600;
      display: inline-block;
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
      <div>Penanggung Jawab Produksi</div>
      <div>Minggu, 28/09/2025</div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main">
    <h2>DAFTAR PRODUKSI</h2>

    <div class="action-buttons">
      <button>Lihat Aset</button>
      <button>Urutkan Berdasarkan Waktu Pengiriman</button>
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
        <div class="done">Selesai Diproduksi</div>
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
        <div class="done">Selesai Diproduksi</div>
      </div>
    </div>
  </div>
</body>
</html>