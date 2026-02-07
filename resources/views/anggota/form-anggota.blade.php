@extends('layouts.main-layout')

@section('content')
    <div class="glass-card">
        <form action="{{ $url ?? route('simpan-anggota') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="settings-section">
                <h3 class="settings-section-title">Informasi Data Diri</h3>
                <div class="form-grid">
                    <div class="form-group-settings">
                        <label for="nama_lengkap">Nama lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama" value="{{ old('nama', $data->nama ?? '') }}" required>
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group-settings">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('nama', $data->email ?? '') }}" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group-settings">
                        <label for="password">Password</label>
                        <input type="text" id="password" name="password" placeholder="{{ old('id') ? '' : 'Masukan password baru' }}" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group-settings">
                        <label for="konfirmasi_password">Konfirmasi Password</label>
                        <input type="text" id="konfirmasi_password" name="konfirmasi_password" placeholder="{{ old('id') ? '' : 'Konfirmasi password baru' }}" required>
                        @error('konfirmasi_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="settings-section">
                <h3 class="settings-section-title">Preferensi</h3>
                <div class="settings-row">
                    <label class="checkbox-label">
                        <input type="radio" name="role" value="admin" {{ old('role', $data->role ?? '') === 'admin' ? 'checked' : '' }}>
                        Admin
                    </label>
                    <label class="checkbox-label">
                        <input type="radio" name="role" value="anggota" {{ old('role', $data->role ?? '') === 'anggota' ? 'checked' : '' }}>
                        Anggota
                    </label>
                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary settings-nav-link" style="width: auto;">Simpan</button>
            </div>
        </form>
    </div>
@endsection