@extends('layouts.main-layout')

@section('content')
<div class="books-grid">
    @forelse ($data as $item)
        <div class="glass-card">
            
            <div class="content">
                <h3>{{ $item->buku->judul }}</h3>
                <div class="book-detail">
                    <div class="row">
                        <div class="col">Penulis</div>
                        <div class="col">Penerbit</div>
                        <div class="col">Tahun</div>
                        <div class="col">Tanggal Pinjam</div>
                        <div class="col">Qty</div>
                    </div>
                    <div class="row">
                        <div class="col">: {{ $item->buku->penulis }}</div>
                        <div class="col">: {{ $item->buku->penerbit }}</div>
                        <div class="col">: {{ $item->buku->tahun }}</div>
                        <div class="col">: {{ $item->created_at->translatedFormat('d M Y') }}</div>
                        <div class="col">: {{ $item->qty }}</div>
                    </div>
                </div>
            </div>

            <button
                type="button"
                class="btn btn-primary btn-modal"
                data-transaksi="{{ $item->id }}"
                data-judul="{{ $item->buku->judul }}"
                data-penulis="{{ $item->buku->penulis }}"
                data-penerbit="{{ $item->buku->penerbit }}"
                data-tahun="{{ $item->buku->tahun }}"
                data-tanggal="{{ $item->created_at->translatedFormat('d M Y') }}"
                data-qty="{{ $item->qty }}"
            >
                Kembalikan Buku
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
            <h3>Kembalikan Buku</h3>
        </div>

        <form action="{{ route('simpan-pengembalian') }}" method="POST">
            @csrf
            <input type="hidden" name="transaksi_id" id="data-transaksi">

            <div class="book-detail">
                <div class="row">
                    <div class="col">Judul</div>
                    <div class="col">Penulis</div>
                    <div class="col">Penerbit</div>
                    <div class="col">Tahun</div>
                    <div class="col">Tanggal Pinjam</div>
                    <div class="col">Qty Dipinjam</div>
                </div>
                <div class="row">
                    <div class="col">: <span id="data-judul"></span></div>
                    <div class="col">: <span id="data-penulis"></span></div>
                    <div class="col">: <span id="data-penerbit"></span></div>
                    <div class="col">: <span id="data-tahun"></span></div>
                    <div class="col">: <span id="data-tanggal"></span></div>
                    <div class="col">: <span id="data-qty"></span></div>
                </div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Kembalikan</button>
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
            document.getElementById('data-transaksi').value = btn.dataset.transaksi;
            document.getElementById('data-judul').textContent = btn.dataset.judul;
            document.getElementById('data-penulis').textContent = btn.dataset.penulis;
            document.getElementById('data-penerbit').textContent = btn.dataset.penerbit;
            document.getElementById('data-tahun').textContent = btn.dataset.tahun;
            document.getElementById('data-tanggal').textContent = btn.dataset.tanggal;
            document.getElementById('data-qty').textContent = btn.dataset.qty;

            modal.style.display = 'block';
        });
    });

    closeBtn.onclick = () => modal.style.display = 'none';

    window.onclick = e => {
        if (e.target === modal) modal.style.display = 'none';
    };
</script>

@endpush