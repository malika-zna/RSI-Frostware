<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Akun;

class RegistrasiController extends Controller
{
    public function registrasiAkun(Request $request)
    {
        // Validasi email
        $validasiEmail = $this->validasiEmail($request->email);
        if ($validasiEmail) {
            // return view('regist-mal', ['status' => 'gagal', 'statusMessage' => $validasiEmail]);
            return redirect()->back()
                ->withInput()
                ->with('status', 'gagal')
                ->with('statusMessage', $validasiEmail);
        }

        // Cari akun yang sudah terdaftar
        $akunAda = Akun::cariAkun($request->email, $request->nomorTelepon);
        if ($akunAda) {
            // return view('regist-mal', ['status' => 'gagal', 'statusMessage' => 'Email/nomor telepon sudah terdaftar']);
            return redirect()->back()
                ->withInput()
                ->with('status', 'gagal')
                ->with('statusMessage', 'Email/nomor telepon sudah terdaftar');
        }

        // Validasi password
        $validasiPassword = $this->validasiPassword($request->password, $request->konfirmasiPassword);
        if ($validasiPassword) {
            // return view('regist-mal', ['status' => 'gagal', 'statusMessage' => $validasiPassword]);
            return redirect()->back()
                ->withInput()
                ->with('status', 'gagal')
                ->with('statusMessage', $validasiPassword);
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
        return redirect()->back()->with('status', 'sukses')->with('statusMessage', 'Registrasi berhasil');
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
            return 'Password harus sama dengan Konfirmasi Password';
        }
    }
}
