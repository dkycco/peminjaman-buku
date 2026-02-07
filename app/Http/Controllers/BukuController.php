<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index() {
        $data = Buku::get();
        return view('buku.buku', compact('data'));
    }

    public function create() {
        return view('buku.form-buku');
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'stok' => 'required|integer|min:0',
        ], [
            'judul.required' => 'Judul buku wajib diisi',
            'penulis.required' => 'Penulis buku wajib diisi',
            'penerbit.required' => 'Penerbit buku wajib diisi',
            'tahun.required' => 'Tahun terbit wajib diisi',
            'tahun.digits' => 'Tahun terbit harus 4 digit',
            'tahun.min' => 'Tahun terbit tidak valid',
            'tahun.max' => 'Tahun terbit tidak boleh melebihi tahun sekarang',
            'stok.required' => 'Stok buku wajib diisi',
            'stok.integer' => 'Stok harus berupa angka',
            'stok.min' => 'Stok tidak boleh kurang dari 0'
        ]);

        try {
            Buku::create([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahun' => $request->tahun,
                'stok' => $request->stok,
            ]);

            return redirect('/buku')
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

    public function edit(Buku $id) {
        return view('buku.form-buku', [
            'data' => $id,
            'url' => route('update-buku', $id->id)
        ]);
    }

    public function update(Request $request, Buku $id) {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'stok' => 'required|integer',
        ], [
            'judul.required' => 'Judul buku wajib diisi',
            'penulis.required' => 'Penulis buku wajib diisi',
            'penerbit.required' => 'Penerbit buku wajib diisi',
            'tahun.required' => 'Tahun terbit wajib diisi',
            'tahun.digits' => 'Tahun terbit harus 4 digit',
            'tahun.min' => 'Tahun terbit tidak valid',
            'tahun.max' => 'Tahun terbit tidak boleh melebihi tahun sekarang',
            'stok.required' => 'Stok buku wajib diisi',
            'stok.integer' => 'Stok harus berupa angka'
        ]);

        try { 
            $id->judul = $request->judul;
            $id->penulis = $request->penulis;
            $id->penerbit = $request->penerbit;
            $id->tahun = $request->tahun;
            $id->stok = $request->stok;
            $id->save();
            
            return redirect('/buku')
                ->with('success', 'Data berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withInput()
                ->with('error', $th->getMessage());
        }
    }

    public function destroy(Buku $id) {
        try {
            $id->delete();

            return redirect('/buku')
                ->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', $th->getMessage());
        }
    }
}
