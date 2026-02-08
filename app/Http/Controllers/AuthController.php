<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        } else {
            return back()
                ->withErrors(['email' => 'Email atau Password salah'])
                ->onlyInput('email');
        }
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function regist() {
        return view('auth.registrasi');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'konfirmasi_password' => 'required|same:password',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password baru wajib diisi',
            'konfirmasi_password.required' => 'Konfirmasi password wajib diisi',
            'konfirmasi_password.same' => 'Konfirmasi password tidak cocok',
        ]);
        try {
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $user->assignRole(['anggota']);

            return redirect('/login')
                ->with('success', 'Akun berhasil dibuat, silahkan masuk terlebih dahulu');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withInput()
                ->with('error', $th->getMessage());
        }
    }
}