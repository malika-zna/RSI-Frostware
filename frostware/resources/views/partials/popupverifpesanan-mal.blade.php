<div id="modal-root" class="modal-overlay" style="display:none;">
    <div class="modal-backdrop" data-close></div>
    <div class="modal" role="dialog" aria-modal="true" aria-hidden="true">
        <div class="popupverif" data-status="belum verif">
            <div class="popup-header">
                <div class="order-title">
                    <div class="judul">Verifikasi Pesanan #</div>
                    <div class="id-ord" id="pv-id">ORD<span></span></div>
                </div>
                <button class="icon-close" data-close>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000" class="bi bi-x" viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </button>
            </div>

            <div class="popup-content">
                <div class="data">
                    <div class="row">

                        <div class="field kiri">
                            <div class="label">Nama Pelanggan</div>
                            <div class="value" id="pv-nama">-</div>
                        </div>

                        <div class="field kanan">
                            <div class="label">Tanggal Pesanan</div>
                            <div class="value" id="pv-tanggalPesan">-</div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="field kiri">
                            <div class="label">Email</div>
                            <div class="value" id="pv-email">-</div>
                        </div>

                        <div class="field kanan">
                            <div class="label">Jumlah Pesanan</div>
                            <div class="quantity">
                                <div class="qty" id="pv-jumlah">-</div>
                                <div class="unit">balok</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="field kiri">
                            <div class="label">Nomor Telepon</div>
                            <div class="value" id="pv-telp">-</div>
                        </div>

                        <div class="field kanan">
                            <div class="label">Tanggal Pengiriman</div>
                            <div class="value" id="pv-tanggalKirim">-</div>
                        </div>
                    </div>

                    <div class="alamat">
                        <div class="label">Alamat Pengiriman</div>
                        <div class="value" id="pv-alamat">-</div>
                    </div>
                </div>
                <div id="pv-error" style="color:#D4183D; display:none; margin-top:6px;"></div>
                <div class="status">
                    <div class="status-group">
                        <div class="label">Status</div>
                        <div class="status-badge" id="pv-status" status="">
                            <div class="text">-</div>
                        </div>
                    </div>
                    <div class="actions" id="actions" status="">
                        <button class="btn btn-tolak" id="pv-tolak">
                            <div class="text">Tolak</div>
                        </button>
                        <button class="btn btn-terima" id="pv-terima">
                            <div class="text">Terima</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .modal-overlay {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        .modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45)
        }

        .modal {
            position: relative;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .popupverif {
            z-index: 1000;
            padding: 30px 35px;
            background: #fff;
            box-shadow: 0px 4px 6px -4px rgba(0, 0, 0, 0.10);
            border-radius: 10px;
            outline: 0.7px rgba(0, 0, 0, 0.10) solid;
            display: inline-flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 17px;

            * {
                font-family: Figtree;
            }

            button {
                background: none;
                border: none;
                padding: none;
            }

            button:hover {
                cursor: pointer;
                background-color: rgba(0, 0, 0, 0.10);
            }

            .popup-header {
                align-self: stretch;
                display: flex;
                flex-direction: row;
                align-items: flex-start;
            }

            .order-title {
                flex: 1;
                display: flex;
                align-items: flex-start;
                gap: 4px;

                .judul,
                .id-ord {
                    color: #0A0A0A;
                    font-weight: 700;
                    font-size: 18px;
                }
            }

            .icon-close {
                width: 20px;
                height: 20px;
                position: relative;
                border-radius: 5px;

                svg {
                    width: 20px;
                    height: 20px;
                    position: absolute;
                    top: 0;
                    left: 0;
                }
            }

            .popup-content {
                width: 464px;
                padding: 0 1px;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .data {
                display: flex;
                flex-direction: column;
            }

            .row {
                display: flex;
                flex-direction: row;
            }

            .field {
                width: 225px;
                padding-bottom: 10px;

                .label {
                    color: #777;
                    font-size: 14px;
                }

                .value {
                    font-size: 16px;
                    margin-top: 4px;
                }
            }


            .quantity {
                display: inline-flex;
                align-items: flex-start;
                gap: 4px;
                margin-top: 4px;
                font-size: 16px;

                .qty {
                    font-weight: 600;
                }
            }

            .alamat {
                align-self: stretch;
                display: inline-flex;
                flex-direction: column;
                gap: 2px;

                .label {
                    color: #777;
                    font-size: 14px;
                }

                .value {
                    font-size: 16px;
                    margin-top: 4px;
                }
            }

            .status {
                align-self: stretch;
                display: inline-flex;
                justify-content: space-between;
                align-items: flex-end;
            }

            .status-group {
                flex: 1;
                display: inline-flex;
                flex-direction: column;
                gap: 11px;

                .label {
                    color: #777;
                    font-size: 14px;
                }
            }

            .status-badge {
                width: fit-content;
                padding: 3px 10px;
                border-radius: 8px;
                display: inline-flex;
                align-items: center;
                justify-content: center;

                .text {
                    font-size: 12px;

                }
            }

            .status-badge[status='Diterima'] {
                background-color: #00B940;
                .text {
                    color: white;
                }
            }

            .status-badge[status='Ditolak'] {
                background-color: #D4183D;
                .text {
                    color: white;
                }
            }

            .actions {
                display: none;
            }

            .actions[status='Belum Diverifikasi'] {
                display: flex;
                gap: 16px;
                justify-content: flex-end;
                align-items: flex-end;
            }

            .btn {
                padding: 8px 13px;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;

                .text {
                    color: #fff;
                    font-weight: 600;
                    font-size: 12px;

                }
            }

            .btn:hover {
                background-color: black;
            }

            .btn-tolak {
                background-color: #D4183D;
            }

            .btn-terima {
                background-color: #00B940;
            }
        }
    </style>
</div>