@extends('layouts.main-layout')

@section('content')
    <div class="glass-card">
        <form action="{{ $url ?? route('simpan-buku') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="settings-section">
                <h3 class="settings-section-title">Informasi Buku</h3>
                <div class="form-grid">
                    <div class="form-group-settings">
                        <label for="judul">Judul Buku</label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul', $data->judul ?? '') }}" required>
                        @error('judul')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group-settings">
                        <label for="penulis">Penulis Buku</label>
                        <input type="text" id="penulis" name="penulis" value="{{ old('nama', $data->penulis ?? '') }}" required>
                        @error('penulis')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group-settings">
                        <label for="penerbit">Penerbit Buku</label>
                        <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit', $data->penerbit ?? '') }}" required>
                        @error('penerbit')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group-settings">
                        <label for="tahun">Tahun Terbit</label>
                        <input type="year" id="tahun" name="tahun" value="{{ old('tahun', $data->tahun ?? '') }}" required>
                        @error('tahun')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group-settings">
                        <label for="stok">Stok Buku</label>
                        <input type="number" id="stok" name="stok" value="{{ old('stok', $data->stok ?? '') }}" required>
                        @error('stok')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group-settings">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection