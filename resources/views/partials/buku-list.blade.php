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
        <span>Tidak ada data buku.</span>
    </div>
@endforelse
