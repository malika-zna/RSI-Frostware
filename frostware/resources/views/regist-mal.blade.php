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

        .form-box {
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

        .form-label {
            color: black;
            font-size: 14px;
            font-weight: 400;
            line-height: 14px;
            word-wrap: break-word;
        }

        .form-input {
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

        .content-title {
            width: 413px;
            left: 108px;
            top: 189px;
            position: absolute;
            color: white;
            font-size: 48px;
            font-weight: 800;
            word-wrap: break-word;
        }

        .content-subtitle {
            width: 413px;
            left: 108px;
            top: 252px;
            position: absolute;
            color: white;
            font-size: 20px;
            font-weight: 700;
            word-wrap: break-word;
        }

        .content-text {
            width: 502px;
            left: 108px;
            top: 315px;
            position: absolute;
            color: white;
            font-size: 14px;
            font-weight: 400;
            word-wrap: break-word;
        }

        .statusregist {
            display: flex;
            align-self: stretch;
            padding-left: 5px;
            gap: 5px;

            p {
                font-family: Figtree;
                font-size: 12px;
                /* color: gray; */
            }

            svg {
                width: 16px;
            }
        }

        .statusregist[data-status="gagal"] {
            p {
                color: #D4183D;
            }

            svg {
                fill: #D4183D;
            }
        }

        .statusregist[data-status="sukses"] {
            svg {
                fill: #00C950;
            }
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


        <h1 class="content-title">Halo Customer!</h1>
        <h1 class="content-subtitle">Silakan lengkapi data Anda dan klik daftar untuk membuat akun baru!</h1>
        <p class="content-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur.</p>

        <form class="form-box" action="{{ route('register.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <div class="form-label">Nama Lengkap</div>
                <input required name="nama" value="{{ old('nama') }}" class="form-input" type="text"
                    placeholder="Masukkan nama lengkap">
            </div>
            <div class="form-group">
                <div class="form-label">Email</div>
                <input required name="email" value="{{ old('email') }}" class="form-input" type="email"
                    placeholder="abc@gmail.com">
            </div>
            <div class="form-group">
                <div class="form-label">Nomor Telepon</div>
                <input required name="nomorTelepon" value="{{ old('nomorTelepon') }}" class="form-input" type="tel" pattern="08[0-9]{9,13}"
                    placeholder="087654321000">
            </div>
            <div class="form-group">
                <div class="form-label">Password</div>
                <input required name="password" class="form-input" type="password" placeholder="Masukkan password">
            </div>
            <div class="form-group">
                <div class="form-label">Konfirmasi Password</div>
                <input required name="konfirmasiPassword" class="form-input" type="password"
                    placeholder="Ulangi password">
            </div>
            <!-- <div class="statusregist" data-status="sukses">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <p>Registrasi berhasil!</p>
            </div>
            <div class="statusregist" data-status="gagal">
                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                </svg>
                <p>Email/nomor telepon sudah terdaftar</p>
            </div>
            <div class="statusregist" data-status="gagal">
                <p>Format email salah!</p>
            </div>
            <div class="statusregist" data-status="gagal">
                <p>Password Harus sama dengan Konfirmasi Password</p>
            </div> -->
            @if(isset($statusMessage))
                <div class="statusregist" data-status="{{ $status }}">
                    @if ($status == "gagal")
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    @endif
                    <p>{{ $statusMessage }}</p>
                </div>
            @endif
            <button class="btn-register" type="submit">
                <div class="btn-text-register">Daftar</div>
            </button>
            <div class="login-section">
                <div class="login-text">Sudah punya akun?</div>
                <a class="login-link" href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>
</body>

</html>