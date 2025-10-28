<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Parkinsans:wght@300..800&display=swap"
        rel="stylesheet">

    <title>kelola pesanan</title>
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
                background: #00C950;

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
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Belum Diverifikasi" class="status-badge">
                                <div class="status-text">Belum Diverifikasi</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="belum" class="action-button">
                                <div class="action-button-text">Verifikasi Pesanan</div>
                            </button>
                        </div>
                    </div>
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso lailala dhkahdjks kahda shdabsd</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Diterima" class="status-badge">
                                <div class="status-text">Diterima</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="sudah" class="action-button">
                                <div class="action-button-text">Lihat Verifikasi</div>
                            </button>
                        </div>
                    </div>
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso lailala dhkahdjks kahda shdabsd</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Diterima" class="status-badge">
                                <div class="status-text">Diterima</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="sudah" class="action-button">
                                <div class="action-button-text">Lihat Verifikasi</div>
                            </button>
                        </div>
                    </div>
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso lailala dhkahdjks kahda shdabsd</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Diterima" class="status-badge">
                                <div class="status-text">Diterima</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="sudah" class="action-button">
                                <div class="action-button-text">Lihat Verifikasi</div>
                            </button>
                        </div>
                    </div>
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso lailala dhkahdjks kahda shdabsd</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Diterima" class="status-badge">
                                <div class="status-text">Diterima</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="sudah" class="action-button">
                                <div class="action-button-text">Lihat Verifikasi</div>
                            </button>
                        </div>
                    </div>
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso lailala dhkahdjks kahda shdabsd</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Diterima" class="status-badge">
                                <div class="status-text">Diterima</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="sudah" class="action-button">
                                <div class="action-button-text">Lihat Verifikasi</div>
                            </button>
                        </div>
                    </div>
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso lailala dhkahdjks kahda shdabsd</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Diterima" class="status-badge">
                                <div class="status-text">Diterima</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="sudah" class="action-button">
                                <div class="action-button-text">Lihat Verifikasi</div>
                            </button>
                        </div>
                    </div>
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso lailala dhkahdjks kahda shdabsd</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Diterima" class="status-badge">
                                <div class="status-text">Diterima</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="sudah" class="action-button">
                                <div class="action-button-text">Lihat Verifikasi</div>
                            </button>
                        </div>
                    </div>
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso lailala dhkahdjks kahda shdabsd</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Diterima" class="status-badge">
                                <div class="status-text">Diterima</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="sudah" class="action-button">
                                <div class="action-button-text">Lihat Verifikasi</div>
                            </button>
                        </div>
                    </div>
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso lailala dhkahdjks kahda shdabsd</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Diterima" class="status-badge">
                                <div class="status-text">Diterima</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="sudah" class="action-button">
                                <div class="action-button-text">Lihat Verifikasi</div>
                            </button>
                        </div>
                    </div>
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso lailala dhkahdjks kahda shdabsd</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Diterima" class="status-badge">
                                <div class="status-text">Diterima</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="sudah" class="action-button">
                                <div class="action-button-text">Lihat Verifikasi</div>
                            </button>
                        </div>
                    </div>
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso lailala dhkahdjks kahda shdabsd</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Diterima" class="status-badge">
                                <div class="status-text">Diterima</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="sudah" class="action-button">
                                <div class="action-button-text">Lihat Verifikasi</div>
                            </button>
                        </div>
                    </div>
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso lailala dhkahdjks kahda shdabsd</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Diterima" class="status-badge">
                                <div class="status-text">Diterima</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="sudah" class="action-button">
                                <div class="action-button-text">Lihat Verifikasi</div>
                            </button>
                        </div>
                    </div>
                    <div data-status="belum verif" class="table-row">
                        <div class="col-id">
                            <div class="cell-text">ORD001</div>
                        </div>
                        <div class="col-customer">
                            <div class="customer-info">
                                <div class="customer-name cell-text">Budi Santoso lailala dhkahdjks kahda shdabsd</div>
                                <div class="customer-phone cell-text">089765432100</div>
                            </div>
                        </div>
                        <div class="col-qty">
                            <div class="cell-text">120</div>
                        </div>
                        <div class="col-order-date">
                            <div class="cell-text">15/09/2025</div>
                        </div>
                        <div class="col-ship-date">
                            <div class="cell-text">25/10/2025</div>
                        </div>
                        <div class="col-status">
                            <div data-status="Diterima" class="status-badge">
                                <div class="status-text">Diterima</div>
                            </div>
                        </div>
                        <div class="col-action">
                            <button data-sudah-verif="sudah" class="action-button">
                                <div class="action-button-text">Lihat Verifikasi</div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="summary-container">
            <div class="summary-title">
                Ringkasan Tanggal Pengiriman
            </div>
            <div class="summary-description">Tanggal pengiriman dan jumlah pesanan yang diterima</div>
            <div class="summary-list">
                <div class="summary-item">
                    <div class="summary-date">25/10/2025</div>
                    <div class="summary-qty">
                        <div class="number">810</div>
                        <div class="unit">balok</div>
                    </div>
                </div>
                <div class="summary-item">
                    <div class="summary-date">25/10/2025</div>
                    <div class="summary-qty">
                        <div class="number">810</div>
                        <div class="unit">balok</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('partials.popupverifpesanan-mal')
    @include('partials.popupinputketerangan-mal')

    <script>
        (function () {
            const modalRoot = document.getElementById('modal-root');
            const keteranganRoot = document.getElementById('modal-keterangan-root');
            const userInfoBtn = document.querySelector('.user-info');
            const userPanelEl = document.querySelector('.user-panel');

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

            // toggle when user-info button clicked
            userInfoBtn?.addEventListener('click', function (e) {
                e.stopPropagation();
                if (!userPanelEl) return;
                const isOpen = userPanelEl.getAttribute('data-open') === 'true';
                isOpen ? hideUserPanel() : showUserPanel();
            });

            // prevent clicks inside panel from bubbling (so document click doesn't close immediately)
            userPanelEl?.addEventListener('click', function (e) {
                e.stopPropagation();
            });

            // click outside closes the panel (and modals)
            document.addEventListener('click', function () {
                hideUserPanel();
            });

            function closeModal() {
                if (!modalRoot) return;
                modalRoot.style.display = 'none';
                document.body.style.overflow = '';
                modalRoot.querySelector('.modal')?.setAttribute('aria-hidden', 'true');
            }

            function openKeterangan() {
                if (!keteranganRoot) return;
                keteranganRoot.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                keteranganRoot.querySelector('.modal')?.setAttribute('aria-hidden', 'false');
            }

            function closeKeterangan() {
                if (!keteranganRoot) return;
                keteranganRoot.style.display = 'none';
                document.body.style.overflow = '';
                keteranganRoot.querySelector('.modal')?.setAttribute('aria-hidden', 'true');
            }

            function openModalWithData() {
                if (!modalRoot) return;
                // tampilkan
                modalRoot.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                modalRoot.querySelector('.modal')?.setAttribute('aria-hidden', 'false');
            }

            // attach click ke semua tombol Verifikasi / Lihat Verifikasi
            document.querySelectorAll('.action-button').forEach(btn => {
                btn.addEventListener('click', function () {
                    const row = btn.closest('.table-row');
                    if (!row) return;
                    // const id = row.querySelector('.col-id .cell-text')?.textContent?.trim() || '';
                    // const customerName = row.querySelector('.col-customer .customer-name')?.textContent?.trim() || '';
                    // const orderDate = row.querySelector('.col-order-date .cell-text')?.textContent?.trim() || '';
                    // const qty = row.querySelector('.col-qty .cell-text')?.textContent?.trim() || '';
                    // const phone = row.querySelector('.col-customer .customer-phone')?.textContent?.trim() || '';
                    // // jika butuh alamat/email, ambil dari dataset atau fetch via API
                    openModalWithData();
                });
            });

            // close handlers (backdrop & close button)
            modalRoot?.addEventListener('click', function (e) {
                if (e.target.hasAttribute('data-close') || e.target.closest('.icon-close')) {
                    closeModal();
                    return;
                }
                // jika tombol tolak diklik di dalam popup verif -> buka modal keterangan
                if (e.target.closest('.btn-tolak')) {
                    // closeModal();
                    openKeterangan();
                    return;
                }
            });

            // close handlers for keterangan modal (backdrop & cancel button)
            keteranganRoot?.addEventListener('click', function (e) {
                if (e.target.hasAttribute('data-close') || e.target.closest('.btn-cancel') || e.target.closest('.btn-save')) {
                    closeKeterangan();
                }
            });


            // optional: escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeModal();
                    closeKeterangan();
                }
            });
        })();
    </script>

</body>

</html>