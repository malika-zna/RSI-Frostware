<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pemeliharaan - Frostware</title>
    <style>
        /* CSS layout*/
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #FFFFFF;
            width: 1280px;
            height: 832px;
            position: relative;
        }

        /* Header */
        header {
            position: absolute;
            width: 1280px;
            height: 90px;
            left: 0;
            top: 0;
            background: #1C398E;
            border-bottom: 1px solid #000000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 40px;
            color: #FFFFFF;
        }
        header h1 {
            font-weight: 700;
            font-size: 32px;
            line-height: 39px;
            margin: 0;
        }
        header .profile {
            text-align: right;
            font-size: 16px;
            font-weight: 600;
        }
        header .profile small {
            display: block;
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
            font-weight: 400;
            margin-top: 3px;
        }

        /* body konten*/
        .container {
            position: absolute;
            top: 111px; /* 90px + 21px margin */
            left: 40px;
            width: 1200px;
            height: 700px;
            display: flex;
            justify-content: space-between;
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
            color: #FFFFFF;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
        }

        /* Bagian kiri dan kanan */
        .left, .right {
            width: 540px;
            position: relative;
        }

        /* Title Button Positioning */
        .left .btn-main {
            position: absolute;
            left: 217px;
            top: 12px;
        }
        .right .btn-main {
            position: absolute;
            left: 170px;
            top: 12px;
        }

        /* Garis pembatas vertikal */
        .container::after {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 600px;
            width: 1px;
            height: 700px;
            background: rgba(0, 0, 0, 0.1);
        }

        /* Card umum */
        .card {
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 20px;
            gap: 29px;
            width: 540px;
            background: #FFFFFF;
            border: 1px solid #AAAAAA;
            border-radius: 15px;
            margin-top: 100px;
            min-height: 260px;
        }

        /* Badge */
        .badge {
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
        }

        /* Secondary badge for "Lihat Laporan Kerusakan" */
        .badge-small {
            padding: 5px 10px;
            height: 27.33px;
            font-size: 12px;
            margin-bottom: 10px;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
            font-family: 'Arimo', sans-serif;
        }
        thead tr {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }
        th {
            text-align: left;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            color: #0A0A0A;
            padding-bottom: 12px;
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

    </style>
</head>
<body>

<header>
    <h1>Frostware</h1>
    <div class="profile">
        Penanggung Jawab Pemeliharaan
        <small>Minggu, 28/09/2025</small>
    </div>
</header>

<div class="container">

    <section class="left">
        <button class="btn-main">Daftar Aset</button>

        <div class="card">
            <div class="badge">Aktifkan Mode Edit</div>

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
                    <tr>
                        <td>CHN001</td>
                        <td>Mesin Pembuat es</td>
                        <td>03/04/2006</td>
                        <td>15/10/2025</td>
                        <td><span class="badge-status status-baik">Baik</span></td>
                    </tr>
                    <tr>
                        <td>CHN002</td>
                        <td>Tangki Brine</td>
                        <td>03/04/2006</td>
                        <td>10/10/2025</td>
                        <td><span class="badge-status status-sedang">Sedang<br> Diperbaiki</span></td>
                    </tr>
                    <tr>
                        <td>CHN003</td>
                        <td>Cetakan Es</td>
                        <td>03/04/2006</td>
                        <td>10/10/2025</td>
                        <td><span class="badge-status status-rusak">Rusak</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="right">
        <button class="btn-main">Log Aktivitas</button>

        <div class="card" style="min-height: 342px;">
            <div class="badge">Aktifkan Mode Edit</div>
            <div class="badge badge-small">Lihat Laporan Kerusakan</div>

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

</body>
</html>