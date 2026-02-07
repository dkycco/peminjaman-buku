<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $count = [
            'anggota' => User::count(),
            'buku' => Buku::count(),
            'pinjam' => 0,
            'kembali' => 0
        ];
        return view('dashboard', compact('count'));
    }
}
