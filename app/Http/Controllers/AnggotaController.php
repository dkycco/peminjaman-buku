<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index() {
        $data = User::get();
        return view('anggota.anggota', compact('data'));
    }

    public function create() {
        return view('anggota.form-anggota');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,anggota',
            'password' => 'required',
            'konfirmasi_password' => 'required|same:password',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'role.required' => 'Role wajib dipilih',
            'role.in' => 'Role tidak valid',
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

            $user->assignRole($request->role);

            return redirect('/anggota')
                ->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withInput()
                ->with('error', $th->getMessage());
        }
    }

    public function show(string $id) {
        //
    }

    public function edit(User $id) {
        return view('anggota.form-anggota', [
            'data' => $id,
            'url' => route('update-anggota', $id->id)
        ]);
    }

    public function update(Request $request, User $id) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|in:admin,anggota',
            'password' => 'required',
            'konfirmasi_password' => 'required|same:password',
        ], [
            'nama.required' => 'Nama wajib diisi',
            
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',

            'role.required' => 'Role wajib dipilih',
            'role.in' => 'Role tidak valid',

            'password.required' => 'Password baru wajib diisi',

            'konfirmasi_password.required' => 'Konfirmasi password wajib diisi',
            'konfirmasi_password.same' => 'Konfirmasi password tidak cocok',
        ]);

        try {
            $id->nama = $request->nama;
            $id->email = $request->email;
            $id->password = $request->password;
            $id->assignRole($request->role);
            $id->save();

            return redirect('/anggota')
                ->with('success', 'Data berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', $th->getMessage());
        }
    }

    public function destroy(string $id) {
        //
    }
}
