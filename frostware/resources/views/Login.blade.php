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
    <link rel="icon" type="svg" href="/fw.svg">
    <title>Login</title>
    <style>
        * {
            font-family: Parkinsans;
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
        }

        button {
            background: none;
            border: none;
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

        .statuslogin {
            display: flex;
            align-self: stretch;
            padding-left: 5px;
            gap: 5px;

            p {
                font-family: Figtree;
                font-size: 12px;
            }

            svg {
                width: 16px;
            }
        }

        .statuslogin[data-status="gagal"] {
            p {
                color: #D4183D;
            }

            svg {
                fill: #D4183D;
            }
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
            <p class="content-text">Selamat datang di Frostware, sistem manajemen yang dibangun untuk otomatisasi
                seluruh proses bisnis PT Himalaya Karunia Abadi. Masuk sekarang untuk mengakses layanan es balok yang
                terintegrasi, andal, dan mendorong kemajuan perusahaan melalui efisiensi operasional terbaik.</p>
        </div>
        <form class="form-box" action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-field">
                <div class="form-label">Email</div>
                <input required name="email" value="{{ old('email') }}" class="form-input" type="email"
                    placeholder="Masukkan alamat email">
            </div>
            <div class="form-field">
                <div class="form-label">Password</div>
                <input required name="password" class="form-input" type="password" placeholder="Masukkan password">
            </div>
            @if(session('statusMessage'))
                <div class="statuslogin" data-status="{{ session('status', 'gagal') }}">
                    @if (session('status') === 'gagal')
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                        </svg>
                    @endif
                    <p>{{ session('statusMessage') }}</p>
                </div>
            @endif
            <button class="btn-login" type="submit">
                <div class="btn-text">Login</div>
            </button>
            <div class="register-section">
                <div class="register-text">Belum punya akun?</div>
                <a class="register-link" href="{{ route('register') }}">Daftar</a>
            </div>
        </form>
    </div>
</body>

</html>