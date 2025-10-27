<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;
// use Illuminate\Support\Facades\Hash;
use App\Models\Akun;

class RegistrasiController extends Controller
{
    public function registrasiAkun(Request $request)
    {
        // Validasi input tidak boleh kosong -> tidak perlu karena sudah pakai required
        // if (empty($request->nama) || empty($request->email) || empty($request->nomorTelepon) || 
        //     empty($request->password) || empty($request->konfirmasiPassword)) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Semua kolom input harus diisi'
        //     ]);
        // }

        // Validasi email
        $validasiEmail = $this->validasiEmail($request->email);
        if ($validasiEmail) {
            return view('regist-mal', ['status' => 'gagal', 'statusMessage' => $validasiEmail]);
        }

        // Cari akun yang sudah terdaftar
        $akunAda = Akun::cariAkun($request->email, $request->nomorTelepon);
        if ($akunAda) {
            return view('regist-mal', ['status' => 'gagal', 'statusMessage' => 'Email/nomor telepon sudah terdaftar']);
        }

        // Validasi password
        $validasiPassword = $this->validasiPassword($request->password, $request->konfirmasiPassword);
        if ($validasiPassword) {
            return view('regist-mal', ['status' => 'gagal', 'statusMessage' => $validasiPassword]);
        }

        // Hash password
        $passwordHash = bcrypt($request->password);

        // Simpan akun baru
        Akun::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomorTelepon' => $request->nomorTelepon,
            'password' => $passwordHash,
            'idRole' => 1,
        ]);
        return view('regist-mal', ['status' => 'sukses', 'statusMessage' => 'Registrasi berhasil']);
    }

    public function validasiEmail(string $email)
    {
        $validator = Validator::make(['email' => $email], ['email' => 'required|email:rfc']);
        if ($validator->fails()) {
            return 'Format email salah, gunakan email yang valid';
        }
    }

    public function validasiPassword(string $password, string $konfirmasiPassword)
    {
        if ($password !== $konfirmasiPassword) {
            return 'Password Harus sama dengan Konfirmasi Password';
        }
    }
}
