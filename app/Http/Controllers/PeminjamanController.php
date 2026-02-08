<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index() {
        $data = Buku::where('stok', '>', 0)->get();
        return view('transaksi.peminjaman', compact('data'));
    }

    public function search(Request $request) {
        $keyword = $request->keyword;

        $data = Buku::where('stok', '>', 0)
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('judul', 'like', "%{$keyword}%")
                    ->orWhere('penulis', 'like', "%{$keyword}%")
                    ->orWhere('penerbit', 'like', "%{$keyword}%")
                    ->orWhere('tahun', 'like', "%{$keyword}%");
                });
            })->get();

        return view('partials.buku-list', compact('data'))->render();
    }

    public function store(Request $request) {
        $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'qty' => 'required|integer|min:1',
        ], [
            'buku_id.required' => 'Buku wajib dipilih',
            'buku_id.exists' => 'Buku tidak ditemukan',
            'qty.required' => 'Jumlah pinjam wajib diisi',
            'qty.min' => 'Jumlah pinjam minimal 1',
        ]);

        try {
                DB::transaction(function () use ($request) {
                    $buku = Buku::lockForUpdate()->findOrFail($request->buku_id);

                    if ($request->qty > $buku->stok) {
                        throw new \Exception('Stok buku tidak mencukupi');
                    }
                    
                    Transaksi::create([
                        'user_id' => auth()->id(),
                        'buku_id' => $buku->id,
                        'tanggal_pinjam' => now(),
                        'status' => 'pinjam',
                        'qty' => $request->qty,
                    ]);

                    $buku->decrement('stok', $request->qty);
                });

                return back()->with('success', 'Buku berhasil dipinjam');

            } catch (\Throwable $th) {
                return back()->with('error', $th->getMessage());
        }
    }
}
