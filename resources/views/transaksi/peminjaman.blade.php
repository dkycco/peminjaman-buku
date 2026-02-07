@extends('layouts.main-layout')

@section('content')
<div class="books-grid">
    @forelse ($data as $item)
        <div class="glass-card">
            
            <div class="content">
                <h3>{{ $item->judul }}</h3>
                <div class="book-detail">
                    <div class="row">
                        <div class="col">Penulis</div>
                        <div class="col">Penerbit</div>
                        <div class="col">Tahun</div>
                        <div class="col">Stok</div>
                    </div>
                    <div class="row">
                        <div class="col">: {{ $item->penulis }}</div>
                        <div class="col">: {{ $item->penerbit }}</div>
                        <div class="col">: {{ $item->tahun }}</div>
                        <div class="col">: {{ $item->stok }}</div>
                    </div>
                </div>
            </div>

            <button
                type="button"
                class="btn btn-primary btn-modal"
                data-id="{{ $item->id }}"
                data-judul="{{ $item->judul }}"
                data-penulis="{{ $item->penulis }}"
                data-penerbit="{{ $item->penerbit }}"
                data-tahun="{{ $item->tahun }}"
                data-stok="{{ $item->stok }}"
            >
                Pinjam Buku
            </button>
        </div>
    @empty
        <div class="glass-card">
            <span>Tidak ada data disini.</span>
        </div>
    @endforelse
</div>

<div class="modal" id="modal">
    <div class="modal-content glass-card">
        <div class="modal-header">
            <h3>Pinjam Buku</h3>
        </div>

        <div class="book-detail">
            <div class="row">
                <div class="col">Judul</div>
                <div class="col">Penulis</div>
                <div class="col">Penerbit</div>
                <div class="col">Tahun</div>
                <div class="col">Stok</div>
            </div>
            <div class="row">
                <div class="col">: <span id="data-judul"></span></div>
                <div class="col">: <span id="data-penulis"></span></div>
                <div class="col">: <span id="data-penerbit"></span></div>
                <div class="col">: <span id="data-tahun"></span></div>
                <div class="col">: <span id="data-stok"></span></div>
            </div>
        </div>

        <form action="{{ route('simpan-peminjaman') }}" method="POST">
            @csrf
            <input type="hidden" name="buku_id" id="data-id">

            <div class="form-group-settings">
                <label for="qty">Jumlah yang akan dipinjam</label>
                <input type="number" id="qty" name="qty" min="1" required>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Pinjam</button>
                <button type="button" class="btn btn-secondary" id="modal-close">Close</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
<script>
    const modal = document.getElementById('modal');
    const closeBtn = document.getElementById('modal-close');

    document.querySelectorAll('.btn-modal').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('data-id').value = btn.dataset.id;
            document.getElementById('data-judul').textContent = btn.dataset.judul;
            document.getElementById('data-penulis').textContent = btn.dataset.penulis;
            document.getElementById('data-penerbit').textContent = btn.dataset.penerbit;
            document.getElementById('data-tahun').textContent = btn.dataset.tahun;
            document.getElementById('data-stok').textContent = btn.dataset.stok;

            const qty = document.getElementById('qty');
            qty.max = btn.dataset.stok;
            qty.value = 1;

            modal.style.display = 'block';
        });
    });

    closeBtn.onclick = () => modal.style.display = 'none';

    window.onclick = e => {
        if (e.target === modal) modal.style.display = 'none';
    };
</script>
@endpush
