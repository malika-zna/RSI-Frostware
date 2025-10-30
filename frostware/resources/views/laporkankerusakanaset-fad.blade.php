<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor Kerusakan Aset - Frostware</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Parkinsans:wght@300..800&display=swap"
        rel="stylesheet">

    <style>
        /* Mengambil semua CSS dari file Daftar Produksi Anda, hanya menambahkan gaya FORMULIR */

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
        }

        .navbar-right .tanggal {
            padding-right: 8px;
            color: rgba(255, 255, 255, 0.60);
            font-size: 12px;
            font-weight: 400;
        }


        /* back link styles */
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
            width: 14px;
            height: 14px;
            fill: white;
            opacity: 0.95;
            /* Rotate SVG 180 deg to make it a back arrow */
            transform: rotate(90deg);
        }

        .back-link div {
            font-weight: 500;
            font-size: 16px;
            line-height: 1;
            font-family: Parkinsans;
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

        /* === Gaya Form Laporan Kerusakan === */
        .form-card {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #cfcfcf;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 16px;
            color: #333;
        }

        .form-control,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 0;
            /* Menggunakan gaya tanpa radius */
            box-sizing: border-box;
            font-size: 15px;
        }

        textarea {
            resize: vertical;
        }

        .btn-submit {
            background-color: #1C398E;
            /* Warna biru navbar */
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 0;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            box-shadow: 0 4px 0 rgba(0, 0, 0, 0.06);
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #153E90;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="navbar-left">
            <a class="back-link" href="#" title="Kembali">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FFF" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path
                        d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                </svg>
                <div>Frostware</div>
            </a>
        </div>
        <div class="navbar-right">
            <div>Penanggung Jawab Produksi</div>
            <div class="tanggal">Minggu, 28/09/2025</div>
        </div>
    </div>

    <div class="main">
        <h2>LAPOR KERUSAKAN ASET</h2>

        <div class="form-card">
            <form action="/submit-laporan-kerusakan" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nama_aset">Nama Aset</label>
                    <input type="text" id="nama_aset" name="nama_aset" class="form-control"
                        placeholder="Contoh: Laptop Kantor" required>
                </div>

                <div class="form-group">
                    <label for="lokasi_aset">Lokasi Aset</label>
                    <input type="text" id="lokasi_aset" name="lokasi_aset" class="form-control"
                        placeholder="Contoh: Ruang Server Lantai 3" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi_kerusakan">Deskripsi Kerusakan</label>
                    <textarea id="deskripsi_kerusakan" name="deskripsi_kerusakan" class="form-control" rows="5"
                        placeholder="Jelaskan secara rinci kerusakan yang terjadi..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="gambar_bukti">Bukti Gambar (Opsional)</label>
                    <input type="file" id="gambar_bukti" name="gambar_bukti" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn-submit">
                    KIRIM LAPORAN
                </button>
            </form>
        </div>
    </div>
</body>

</html>