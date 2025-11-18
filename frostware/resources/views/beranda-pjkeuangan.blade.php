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
    <title>PJ Keuangan Frostware</title>
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
                    /* font-weight: 400; */
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
                line-height: 16px;
                /* word-wrap: break-word; */
            }

            .user-email {
                color: rgba(255, 255, 255, 0.60);
                font-size: 12px;
                /* font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; */
                /* font-weight: 400; */
                line-height: 16px;
                /* word-wrap: break-word; */
            }

            .user-name {
                color: #fff;
                font-size: 14px;
                /* font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; */
                /* font-weight: 400; */
                line-height: 16px;
                /* word-wrap: break-word; */
            }

            .user-divider {
                align-self: stretch;
                height: 5px;
                position: relative;
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
                /* font-weight: 400; */
                line-height: 16px;
                /* word-wrap: break-word; */
            }
        }

        .navigation-tabs {
            width: 100%;
            padding: 4px 3px;
            left: 67px;
            background: #F0F0f0;
            border-radius: 20px;
            display: flex;
            margin-bottom: 40px;
        }

        .nav-tab {
            flex: 1;
            /* height: 29px; */
            padding: 10px 0px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
        }

        .nav-tab-active {
            background: #fff;

            .nav-tab-text {
                font-weight: 700;
                color: #1C398E;
            }

            .icon {
                fill: #1C398E;
                /* font-weight: 700; */
            }
        }

        .nav-tab-text {
            font-size: 16px;
            /* font-family: Figtree; */
            font-weight: 600;
            /* line-height: 20px; */
        }

        .nav-tab:hover {
            background: #1C398E;

            .nav-tab-text {
                font-weight: 700;
                color: #fff;
            }

            .icon {
                fill: #fff;
                /* font-weight: 700; */
            }
        }



        .container {
            margin: 120px 50px 120px 40px;
            display: flex;
            flex-direction: column;
        }

        .summary-badges {
            display: flex;
            gap: 8px;
        }

        .page-title {
            margin-left: 5px;
            font-size: 20px;
            font-weight: 600;
            margin-right: auto;
        }

        .badge {
            height: fit-content;
            padding: 4px 12px;
            border-radius: 8px;
            font-size: 12px;
        }

        .badge-total {
            /* background: #EEEEEE; */
            border: 1px solid #1C398E;
            color: #030213;
        }

        .badge-pending {
            background: #E06600;
            color: white;
        }

        .complaint-table-wrapper {
            margin-top: 20px;
            padding: 20px;
            background: white;
            border-radius: 15px;
            outline: 1px #AAAAAA solid;
        }

        .table-header {
            /* height: 40px; */
            padding-left: 1px;
            padding-right: 1px;
            padding-bottom: 15px;
            border-bottom: 0.67px rgba(0, 0, 0, 0.10) solid;
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .table-header-cell {
            color: #0A0A0A;
            font-size: 16px;
        }

        .table-body {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-top: 10px;
        }

        .table-row {
            padding-bottom: 8px;
            border-bottom: 1px #EEEEEE solid;
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .table-cell {
            color: #0A0A0A;
            font-size: 14px;
        }

        .customer-info {
            width: 160px;
            display: flex;
            flex-direction: column;
        }

        .customer-name {
            color: #0A0A0A;
            font-size: 14px;
        }

        .customer-phone {
            color: #6A7282;
            font-size: 14px;
        }

        .status-badge {
            padding: 3px 10px;
            border-radius: 8px;
            color: white;
            font-size: 12px;
            display: inline-block;
        }

        .status-pending {
            background: #E06600;
        }

        .status-completed {
            background: #00B940;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 37px;
            height: 32px;
            background: white;
            border-radius: 8px;
            outline: 0.67px rgba(0, 0, 0, 0.10) solid;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .action-btn-selesai {
            width: 36px;
            height: 32px;
            background: #00B940;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;

            .icon {
                fill: white;
            }
        }

        .action-btn:hover,
        .action-btn-selesai:hover {
            background-color: #1C398E;

            .icon {
                fill: white;
            }
        }

        .icon {
            width: 16px;
            height: 16px;
        }

        .containerkomplain,
        .containerjatuhtempo,
        .containerpp {
            display: none;
            flex-direction: column;
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
                    Penanggung Jawab Keuangan
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
        <div class="navigation-tabs">
            <div class="nav-tab tkomplain nav-tab-active">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-chat-left" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                    </svg>
                </div>
                <span class="nav-tab-text">Kelola Komplain</span>
            </div>
            <div class="nav-tab tjt">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-credit-card" viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                    </svg>
                </div>
                <span class="nav-tab-text">Kelola Pembayaran Jatuh Tempo</span>
            </div>
            <div class="nav-tab tpp">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5" />
                    </svg>
                </div>
                <span class="nav-tab-text">Kelola Pemasukan & Pengeluaran</span>
            </div>
        </div>

        <div class="containerkomplain" style="display: flex;">
            <div class="summary-badges">
                <div class="page-title">Kelola Komplain Pelanggan</div>
                <div class="badge badge-total">Total: 2 komplain</div>
                <div class="badge badge-pending">Belum Ditangani: 1</div>
            </div>

            <div class="complaint-table-wrapper">
                <div class="table-header">
                    <div class="table-header-cell" style="width: 90px;">ID Komplain</div>
                    <div class="table-header-cell" style="width: 105px;">ID Pengiriman</div>
                    <div class="table-header-cell" style="width: 160px;">Pelanggan</div>
                    <div class="table-header-cell" style="width: 125px;">Jumlah Pesanan</div>
                    <div class="table-header-cell" style="width: 105px;">Tanggal Kirim</div>
                    <div class="table-header-cell" style="width: 100px;">Driver</div>
                    <div class="table-header-cell" style="width: 120px;">Status</div>
                    <div class="table-header-cell" style="width: 90px;">Aksi</div>
                </div>

                <div class="table-body">
                    <div class="table-row" data-status="belum">
                        <div class="table-cell" style="width: 90px;">COMP001</div>
                        <div class="table-cell" style="width: 105px;">DEL003</div>
                        <div class="customer-info">
                            <div class="customer-name">Bunga Magnolia</div>
                            <div class="customer-phone">089765432112</div>
                        </div>
                        <div class="table-cell" style="width: 125px;">120</div>
                        <div class="table-cell" style="width: 105px;">22/10/2025</div>
                        <div class="table-cell" style="width: 100px;">Slamet</div>
                        <div style="width: 120px;">
                            <span class="status-badge status-pending">Belum Ditangani</span>
                        </div>
                        <div class="action-buttons">
                            <div class="action-btn">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-info-circle"
                                        viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                    </svg>
                                </div>
                            </div>
                            <div class="action-btn-selesai">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-check2-circle"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                        <path
                                            d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-row" data-status="selesai">
                        <div class="table-cell" style="width: 90px;">COMP002</div>
                        <div class="table-cell" style="width: 105px;">DEL013</div>
                        <div class="customer-info">
                            <div class="customer-name">Ahmad Putra</div>
                            <div class="customer-phone">089765432122</div>
                        </div>
                        <div class="table-cell" style="width: 125px;">300</div>
                        <div class="table-cell" style="width: 105px;">20/10/2025</div>
                        <div class="table-cell" style="width: 100px;">Ismail</div>
                        <div style="width: 120px;">
                            <span class="status-badge status-completed">Selesai</span>
                        </div>
                        <div class="action-buttons">
                            <div class="action-btn">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-info-circle"
                                        viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                        <path
                                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="containerjatuhtempo">
            <div class="summary-badges">
                <div class="page-title">Kelola Pembayaran Jatuh Tempo</div>
            </div>

            <div class="complaint-table-wrapper">
                <p>Fitur kelola pembayaran jatuh tempo . . .</p>
            </div>
        </div>

        <div class="containerpp">
            <div class="summary-badges">
                <div class="page-title">Kelola Pemasukan & Pengeluaran</div>
            </div>

            <div class="complaint-table-wrapper">
                <p>Fitur kelola pemasukan & pengeluaran . . .</p>
            </div>
        </div>
    </div>
    <script>
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

        const komplain = document.querySelector('.tkomplain');
        const jtempo = document.querySelector('.tjt');
        const pp = document.querySelector('.tpp');
        komplain.addEventListener('click', function (e) {
            jtempo.classList.remove("nav-tab-active");
            pp.classList.remove("nav-tab-active");
            komplain.classList.add("nav-tab-active");

            const contjt = document.querySelector('.containerjatuhtempo');
            const contpp = document.querySelector('.containerpp');
            contjt.style.display = 'none';
            contpp.style.display = 'none';

            const kontainer = document.querySelector('.containerkomplain');
            kontainer.style.display = 'flex';
        })

        jtempo.addEventListener('click', function (e) {
            komplain.classList.remove("nav-tab-active");
            pp.classList.remove("nav-tab-active");
            jtempo.classList.add("nav-tab-active");

            const contkp = document.querySelector('.containerkomplain');
            const contpp = document.querySelector('.containerpp');
            contkp.style.display = 'none';
            contpp.style.display = 'none';

            const kontainer = document.querySelector('.containerjatuhtempo');
            kontainer.style.display = 'flex';
        })

        pp.addEventListener('click', function (e) {
            komplain.classList.remove("nav-tab-active");
            jtempo.classList.remove("nav-tab-active");
            pp.classList.add("nav-tab-active");

            const contkp = document.querySelector('.containerkomplain');
            const contjt = document.querySelector('.containerjatuhtempo');
            contkp.style.display = 'none';
            contjt.style.display = 'none';

            const kontainer = document.querySelector('.containerpp');
            kontainer.style.display = 'flex';
        })
    </script>
</body>

</html>