<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Parkinsans:wght@300..800&display=swap"
        rel="stylesheet">
    <title>tes login</title>
    <style>
        * {
            font-family: Parkinsans;
            /* font-family: Figtree; */
        }

         a {
            text-decoration: none;
        }

        h1,
        p {
            margin: 0px;
        }

        h1 {
            font-family: Figtree;
            /* font-family: Parkinsans; */
        }

        body {
            height: 100vh;
            padding: 0px;
            margin: 0px;
        }

        .container {
            width: 100%;
            height: 100%;
            position: relative;
            background: #00A0FF;
            overflow: hidden;
        }

        .circle-1 {
            width: 581px;
            height: 581px;
            left: 850px;
            top: 492px;
            position: absolute;
            background: linear-gradient(274deg, #1C398E 0%, #155DFC 100%);
            border-radius: 9999px;
        }

        .circle-2 {
            width: 170px;
            height: 170px;
            left: 542px;
            top: 612px;
            position: absolute;
            background: linear-gradient(274deg, #00BFFF 0%, #155DFC 100%);
            border-radius: 9999px;
        }

        .circle-3 {
            width: 340px;
            height: 340px;
            left: -129px;
            top: 686px;
            position: absolute;
            background: linear-gradient(274deg, #1C398E 0%, #155DFC 100%);
            border-radius: 9999px;
        }

        .circle-4 {
            width: 94px;
            height: 97px;
            left: 849px;
            top: 176px;
            position: absolute;
            background: linear-gradient(274deg, #1C398E 0%, #155DFC 100%);
            border-radius: 9999px;
        }

        .circle-5 {
            width: 249px;
            height: 249px;
            left: 1031px;
            top: -27px;
            position: absolute;
            background: linear-gradient(274deg, #00BFFF 0%, #155DFC 100%);
            border-radius: 9999px;
        }

        .circle-6 {
            width: 890px;
            height: 890px;
            left: -129px;
            top: -278px;
            position: absolute;
            background: linear-gradient(274deg, #1C398E 0%, #155DFC 100%);
            border-radius: 9999px;
        }

        .form-box {
            padding: 40px 30px;
            left: 713px;
            top: 243px;
            position: absolute;
            background: white;
            border-radius: 15px;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            gap: 20px;
            display: inline-flex;
        }

        .form-field {
            width: 100%;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 10px;
            display: flex;
        }

        .form-label {
            color: black;
            font-size: 14px;
            font-weight: 500;
            line-height: 14px;
            word-wrap: break-word;
        }

        .form-input {
            align-self: stretch;
            padding: 4px 12px;
            border-radius: 8px;
            height: 36px;
            border: none;
            background: #F5F5F5;
        }

        .btn-login {
            margin-top: 20px;
            padding: 10px 178px;
            background: #1C398E;
            border-radius: 8px;
            justify-content: center;
            align-items: center;
            gap: 10px;
            display: inline-flex;
        }

        .btn-text {
            color: white;
            font-size: 16px;
            font-weight: 600;
            line-height: 20px;
            word-wrap: break-word;
        }

        .register-section {
            width: 100%;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            gap: 5px;
        }

        .register-text {
            width: fit-content;
            text-align: center;
            color: black;
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;
            word-wrap: break-word;
        }

        .register-link {
            width: fit-content;
            color: #1C398E;
            font-size: 16px;
            font-weight: 600;
            line-height: 24px;
            word-wrap: break-word;
        }

        .register-link:hover {
            text-decoration: underline;
            cursor: pointer;
        }

        .btn-login:hover {
            background-color: #00A0FF;
            cursor: pointer;
        }

        .content-section {
            width: 500px;
            left: 108px;
            top: 142px;
            position: absolute;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 10px;
            display: inline-flex;
        }

        .content-title {
            color: white;
            font-size: 64px;
            font-weight: 800;
            word-wrap: break-word;
        }

        .content-subtitle {
            width: 80%;
            color: white;
            font-size: 20px;
            font-weight: 700;
            word-wrap: break-word;
        }

        .content-text {
            color: white;
            font-size: 14px;
            font-weight: 400;
            word-wrap: break-word;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="circle-1"></div>
        <div class="circle-2"></div>
        <div class="circle-3"></div>
        <div class="circle-4"></div>
        <div class="circle-5"></div>
        <div class="circle-6"></div>
        <div class="content-section">
            <h1 class="content-title">Halo User!</h1>
            <h1 class="content-subtitle">Silakan isikan email dan password Anda untuk masuk ke dalam sistem</h1>
            <p class="content-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
        <div class="form-box">
            <!-- <div class="form-inner"> -->
            <div class="form-field">
                <div class="form-label">Email</div>
                <input class="form-input" type="text" placeholder="Masukkan alamat email">
            </div>
            <div class="form-field">
                <div class="form-label">Password</div>
                <input class="form-input" type="text" placeholder="Masukkan password">
            </div>
            <!-- Tambahan Fadila -->
            <div class="btn-login">
                <a class="btn-text" href="{{ route('produksi') }}">Login</a>
            </div>
            <!-- Sampai sini -->
            <div class="register-section">
                <div class="register-text">Belum punya akun?</div>
                <a class="register-link" href="{{ route('register') }}">Daftar</a>
            </div>
        </div>
    </div>
</body>

</html>