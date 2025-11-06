<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;

class LoginController extends Controller
{
    public function periksaLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $akun = Akun::cariAkun($email, '');

        if (!$akun) { // dijalankan kalau null
            // return view('login-mal', ['status' => 'gagal', 'statusMessage' => 'Email tidak terdaftar']);
            return redirect()->back()
                ->withInput()
                ->with('status', 'gagal')
                ->with('statusMessage', 'Email tidak terdaftar');
        }

        if ($akun instanceof Akun) {
            $passvalid = Akun::cekPassword($akun, $password);

            if (!$passvalid) {
                // return view('login-mal', ['status' => 'gagal', 'statusMessage' => 'Email atau password salah']);
                return redirect()->back()
                ->withInput()
                ->with('status', 'gagal')
                ->with('statusMessage', 'Email atau password salah');
            }

            $this->simpanSesi($akun);

            return $this->tampilkanBeranda();
        }
    }

    public function simpanSesi(Akun $akun)
    {
        session()->regenerate();

        session([
            'akun_id' => $akun->idAkun,
            'nama' => $akun->nama,
            'email' => $akun->email,
            'idRole' => $akun->idRole,
            // role didapatkan dengan eager load
            'role' => mb_convert_case($akun->role?->role, MB_CASE_TITLE, 'UTF-8')
        ]);
    }

    public function tampilkanBeranda()
    {
        // pastikan ada session akun -> session id disimpan di cookie browser
        $akunId = session('akun_id');
        if (!$akunId) {
            return redirect()->route('login');
        }

        // ambil akun + eager load role
        $akun = Akun::with('role')->find($akunId);
        if (!$akun) {
            // kalau session habis/akun tidak ada
            session()->flush();
            return redirect()->route('login');
        }

        // redirect berdasarkan role (sesuaikan nama role)
        $roleName = $akun->role->role;
        if ($roleName === 'pelanggan') {
            return redirect()->route('beranda-pelanggan');
        }
        if ($roleName === 'resepsionis') {
            return redirect()->route('kelolapesanan');
        }
        if ($roleName === 'manajer') {
            return redirect()->route('manajer.dashboard');
        }
        if ($roleName === 'driver') {
            return redirect()->route('driver.dashboard');
        }
        if ($roleName === 'pj produksi') {
            return redirect()->route('produksi');
        }
        // if ($roleName === 'pj keuangan') {
        //     return redirect()->route('staff.dashboard');
        // }
        if ($roleName === 'pj pemeliharaan') {
            return redirect()->route('kelolaaset');
        }
        // return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        // hapus semua data session user dan regenerasi token CSRF
        // $request->session()->flush(); bingung?????
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
