@extends('layouts.auth-layout')

@section('content')    
<div class="login-page">
    <button class="theme-toggle-float" id="theme-toggle" title="Toggle Light/Dark Mode">
        <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/>
            <path d="M4.93 4.93l1.41 1.41"/><path d="M17.66 17.66l1.41 1.41"/>
            <path d="M2 12h2"/><path d="M20 12h2"/>
            <path d="M6.34 17.66l-1.41 1.41"/><path d="M19.07 4.93l-1.41 1.41"/>
        </svg>
        <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: none;">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
        </svg>
    </button>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <img class="login-logo" src="{{ asset('images/favicon.png') }}" alt="">
                <h1 class="login-title">Selamat Datang Kembali</h1>
                <p class="login-subtitle">Silahkan masuk terlebih dahulu.</p>
            </div>

            <form action="{{ route('login-aksi') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="Masukan email kamu" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Masukan password kamu" required>
                </div>

                <div class="form-row">
                    <label class="checkbox-label">
                        <input type="checkbox" checked>
                        Ingat Aku
                    </label>
                    <a href="#" class="forgot-link">Lupa Password?</a>
                </div>

                <button type="submit" class="btn btn-primary">
                    Masuk
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </button>
            </form>

            <p class="login-footer">
                Tidak punya akun? <a href="register.html">Buat akun</a>
            </p>
        </div>
    </div>

    <footer class="site-footer">
        <p>Copyright © 2026 Peminjaman Buku. Designed by <a href="#" target="_blank" rel="nofollow">RPL XII</a></p>
    </footer>
</div>
@endsection