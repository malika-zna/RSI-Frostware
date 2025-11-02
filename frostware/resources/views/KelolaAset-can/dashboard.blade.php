<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Parkinsans:wght@300..800&display=swap"
        rel="stylesheet">
    <title>Dashboard Pemeliharaan - Frostware</title>
    <style>
        /* CSS layout*/
        /* body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #FFFFFF;
            width: 1280px;
            height: 832px;
            position: relative;
        } */
        
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

        /* Header */
        /* header {
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
        } */

        header { /* bg header */
            background-color: #1C398E;
            box-shadow: -5px 5px 8px rgba(0, 0, 0, 0.25);
            width: 100vw;
            height: 90px;
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
                font-family: Parkinsans;
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
                color: #000;
                font-size: 14px;
                /* font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; */
                font-weight: 400;
                /* line-height: 16px; */
                /* word-wrap: break-word; */
            }
        }

        /* body konten*/
        .container {
            position: absolute;
            top: 111px; /* 90px + 21px margin */
            left: 40px;
            /* width: 1200px; */
            width: 100%; /* ubah width */
            max-width: 1280px; /* batas width maks */ 
            /* height: 700px; */
            display: flex;
            justify-content: space-between;
        }

        /* Bagian kiri dan kanan */
        .left, .right {
            /* width: 540px; */
            width: 48%; /* ubah width */
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
            color: #FFFFFF;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
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
        /* .container::after {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 600px;
            width: 1px;
            height: 700px;
            background: rgba(0, 0, 0, 0.1);
        } */

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

<!-- html -->
<header>
    <h1 class="head-title">Frostware</h1>
    <div class="head-info">
        <div class="user-info" onclick="togglePanel()">
            <span class="user">Penanggung Jawab Pemeliharaan</span>
        </div>
        <div class="date">
            <p>Minggu, 28/09/2025</p>
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

<!-- tambahan js -->
<script>
function togglePanel() {
    const panel = document.getElementById('userPanel');
    panel.style.display = panel.style.display === 'flex' ? 'none' : 'flex';
    }
</script>

</body>
</html>