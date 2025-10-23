<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Produksi</title>
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.3);
        }

        .popup-box {
            background-color: #153E90;
            color: white;
            width: 280px;
            padding: 25px 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .popup-box p {
            font-size: 16px;
            margin-bottom: 25px;
        }

        .popup-buttons {
            display: flex;
            justify-content: space-around;
        }

        .popup-buttons button {
            background: transparent;
            border: none;
            color: white;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            padding: 8px 20px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .popup-buttons button:hover {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body>
    <div class="popup-box">
        <p>Konfirmasi Produksi Selesai?</p>
        <div class="popup-buttons">
            <button onclick="window.location.href='daftar-produksi.html'">Batal</button>
            <button onclick="selesai()">Selesai</button>
        </div>
    </div>

    <script>
        function selesai() {
            alert("Produksi telah dikonfirmasi selesai!");
            window.location.href = "daftar-produksi.html";
        }
    </script>
</body>

</html>