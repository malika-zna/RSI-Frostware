<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Akun;

class RegistrasiController extends Controller
{
    public function registrasiAkun(Request $request)
    {
        $validasiEmail = $this->validasiEmail($request->email);
        if ($validasiEmail) {
                return redirect()->back()
                ->withInput()
                ->with('status', 'gagal')
                ->with('statusMessage', $validasiEmail);
        }

        $akunAda = Akun::cariAkun($request->email, $request->nomorTelepon);
        if ($akunAda) {
            return redirect()->back()
                ->withInput()
                ->with('status', 'gagal')
                ->with('statusMessage', 'Email/nomor telepon sudah terdaftar');
        }

        $validasiPassword = $this->validasiPassword($request->password, $request->konfirmasiPassword);
        if ($validasiPassword) {
            return redirect()->back()
                ->withInput()
                ->with('status', 'gagal')
                ->with('statusMessage', $validasiPassword);
        }

        $passwordHash = bcrypt($request->password);

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