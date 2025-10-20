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
    <title>Register</title>
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
            background: #1C398E;
            height: 100vh;
            width: 100vw;
            overflow: hidden;
            padding: 0px;
            margin: 0px;
        }

        .register-container {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }

        .background {
            z-index: -10000;
        }

        .circle-reg-1 {
            width: 581px;
            height: 581px;
            left: -77px;
            top: 501px;
            position: absolute;
            background: linear-gradient(274deg, #8AFFF5 0%, #155DFC 100%);
            border-radius: 9999px;
        }

        .circle-reg-2 {
            width: 145px;
            height: 145px;
            left: 487px;
            top: 489px;
            position: absolute;
            background: linear-gradient(274deg, #8AFFF5 0%, #155DFC 100%);
            border-radius: 9999px;
        }

        .circle-reg-3 {
            width: 218px;
            height: 218px;
            left: 1035px;
            top: 651px;
            position: absolute;
            background: linear-gradient(274deg, #8AFFF5 0%, #155DFC 100%);
            border-radius: 9999px;
        }

        .circle-reg-4 {
            width: 94px;
            height: 97px;
            left: 315px;
            top: 15px;
            position: absolute;
            background: linear-gradient(274deg, #8AFFF5 0%, #155DFC 100%);
            border-radius: 9999px;
        }

        .circle-reg-5 {
            width: 249px;
            height: 249px;
            left: 0px;
            top: -160px;
            position: absolute;
            background: linear-gradient(274deg, #8AFFF5 0%, #155DFC 100%);
            border-radius: 9999px;
        }

        .circle-reg-6 {
            width: 490px;
            height: 490px;
            left: 860px;
            top: -118px;
            position: absolute;
            background: linear-gradient(274deg, #8AFFF5 0%, #155DFC 100%);
            border-radius: 9999px;
        }

        .form-box-register {
            padding: 40px 30px;
            left: 713px;
            top: calc(50vh - 300px);
            position: absolute;
            background: white;
            border-radius: 15px;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            gap: 15px;
            display: inline-flex;
        }

        .form-group {
            width: 399px;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 10px;
            display: flex;
        }

        .form-label-register {
            color: black;
            font-size: 14px;
            font-weight: 400;
            line-height: 14px;
            word-wrap: break-word;
        }

        .form-input-register {
            align-self: stretch;
            height: 36px;
            padding: 4px 12px;
            background: #F5F5F5;
            border-radius: 8px;
            justify-content: flex-start;
            align-items: center;
            border: none;
        }

        .btn-register {
            margin-top: 20px;
            padding: 10px 175px;
            background: #1C398E;
            border-radius: 8px;
            justify-content: center;
            align-items: center;
            gap: 10px;
            display: inline-flex;
            cursor: pointer;
            border: none;
        }

        .btn-register:hover {
            background: #00A0FF;
        }

        .btn-text-register {
            color: white;
            font-size: 16px;
            font-weight: 600;
            line-height: 20px;
            word-wrap: break-word;
        }

        .login-section {
            width: 399px;
            height: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .login-text {
            text-align: center;
            color: black;
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;
            word-wrap: break-word;
        }

        .login-link {
            color: #1C398E;
            font-size: 16px;
            font-weight: 600;
            line-height: 24px;
            word-wrap: break-word;
            cursor: pointer;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .content-title-register {
            width: 413px;
            left: 108px;
            top: 189px;
            position: absolute;
            color: white;
            font-size: 48px;
            font-weight: 800;
            word-wrap: break-word;
        }

        .content-subtitle-register {
            width: 413px;
            left: 108px;
            top: 252px;
            position: absolute;
            color: white;
            font-size: 20px;
            font-weight: 700;
            word-wrap: break-word;
        }

        .content-text-register {
            width: 502px;
            left: 108px;
            top: 315px;
            position: absolute;
            color: white;
            font-size: 14px;
            font-weight: 400;
            word-wrap: break-word;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="background">
            <div class="circle-reg-1"></div>
            <div class="circle-reg-2"></div>
            <div class="circle-reg-3"></div>
            <div class="circle-reg-4"></div>
            <div class="circle-reg-5"></div>
            <div class="circle-reg-6"></div>
        </div>


        <h1 class="content-title-register">Halo Customer!</h1>
        <h1 class="content-subtitle-register">Silakan lengkapi data Anda dan klik daftar untuk membuat akun baru!</h1>
        <p class="content-text-register">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur.</p>

        <div class="form-box-register">
            <div class="form-group">
                <div class="form-label-register">Nama Lengkap</div>
                    <input class="form-input-register" type="text" placeholder="Masukkan nama lengkap">
            </div>
            <div class="form-group">
                <div class="form-label-register">Email</div>
                    <input class="form-input-register" type="email" placeholder="Masukkan alamat email">
            </div>
            <div class="form-group">
                <div class="form-label-register">Nomor Telepon</div>
                    <input class="form-input-register" type="tel" placeholder="Masukkan nomor telepon">
            </div>
            <div class="form-group">
                <div class="form-label-register">Password</div>
                    <input class="form-input-register" type="password" placeholder="Masukkan password">
            </div>
            <div class="form-group">
                <div class="form-label-register">Konfirmasi Password</div>
                    <input class="form-input-register" type="password" placeholder="Ulangi password">
            </div>
            <button class="btn-register">
                <div class="btn-text-register">Daftar</div>
            </button>
            <div class="login-section">
                <div class="login-text">Sudah punya akun?</div>
                <a class="login-link" href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </div>
</body>

</html>