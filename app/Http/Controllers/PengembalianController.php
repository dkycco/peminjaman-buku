<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    public function index() {
        $data = Transaksi::where('status', 'pinjam')->get();
        return view('transaksi.pengembalian', compact('data'));
    }

    public function store(Request $request) {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksi,id'
        ]);

        try {
            DB::transaction(function () use ($request) {

                $transaksi = Transaksi::lockForUpdate()->findOrFail($request->transaksi_id);

                if ($transaksi->status === 'kembali') {
                    throw new \Exception('Buku sudah dikembalikan');
                }

                $transaksi->update([
                    'status' => 'kembali',
                    'tanggal_kembali' => now(),
                ]);

                $transaksi->buku->increment('stok', $transaksi->qty);
            });

            return back()->with('success', 'Buku berhasil dikembalikan');

        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}