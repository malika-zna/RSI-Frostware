<div id="modal-keterangan-root" class="modal-overlay" style="display:none;">
    <div class="modal-backdrop" data-close></div>
    <div class="popupketerangan modal" role="dialog" aria-label="Keterangan Penolakan Pesanan">
        <div class="header">
            <div class="title">Keterangan Penolakan Pesanan</div>
        </div>
        <form class="content">
            <div class="field-group">
                @csrf
                <div class="label">Mohon masukkan alasan penolakan pesanan (maksimal 250 karakter)</div>
                <textarea required id="in-keterangan" class="textarea" contenteditable="true"
                    aria-label="Alasan penolakan" maxlength=250
                    placeholder="Contoh: Jumlah pesanan yang diterima sudah melebihi batas, Alamat pengiriman tidak valid, dll."></textarea>
            </div>

            <div class="actions">
                <button type="button" class="btn btn-cancel">Batal</button>
                <button type="submit" class="btn btn-save">Simpan</button>
            </div>
        </form>
    </div>
    <style>
        .modal-overlay {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10000;
        }

        .modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .45);
        }

        .popupketerangan.modal {
            position: relative;
            z-index: 10001;
            padding: 30px;
            background: #fff;
            box-shadow: 0 4px 6px -4px rgba(0, 0, 0, 0.10);
            border-radius: 10px;
            outline: 0.67px rgba(0, 0, 0, 0.10) solid;
            display: inline-flex;
            flex-direction: column;
            gap: 16px;
            align-items: flex-start;
            width: 500px;

            * {
                font-family: Figtree;
            }

            button {
                background: none;
                border: none;
            }

            button:hover {
                cursor: pointer;
            }

            .header .title {
                font-weight: 700;
                font-size: 18px;
            }

            .content {
                width: 100%;
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            .field-group {
                display: flex;
                flex-direction: column;
                gap: 25px;
            }

            .label {
                font-size: 14px;
                font-weight: 400;
            }

            .textarea {
                height: 74px;
                padding: 0px;
                padding: 8px 12px;
                background: #F3F3F3;
                border-radius: 8px;
                font-size: 14px;
                resize: none;
            }

            .actions {
                display: inline-flex;
                justify-content: flex-end;
                align-items: center;
                gap: 8px;
            }

            .btn {
                padding: 8px 16px;
                border-radius: 8px;
                font-weight: 600;
                font-size: 14px;
            }

            .btn:hover {
                background-color: #1C398E;
                color: white;
            }

            .btn-cancel {
                background: #CCCCCC;
                color: #000;
            }

            .btn-save {
                background: #000;
                color: #fff;
            }
        }
    </style>
</div>