@extends('layouts.main-layout')

@section('content')
    <div class="glass-card table-card">
        <div class="card-header">
            <div>
                <h2 class="card-title">Tabel Buku</h2>
                <p class="card-subtitle">Semua buku yang terdaftar.</p>
            </div>
            <div class="card-actions">
                <a href="{{ route('buat-buku') }}" class="card-btn">Tambah buku</a>
            </div>
        </div>
        <div class="table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->penerbit }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->stok }}</td>
                            <td class="table-action">
                                <a href="{{ route('edit-buku', $item->id) }}" class="card-btn card-btn-edit"
                                    style="padding: 6px 12px;">
                                    <svg class="data-icon" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4 2C2.34315 2 1 3.34315 1 5V9V10V19C1 20.6569 2.34315 22 4 22H7C7.55228 22 8 21.5523 8 21C8 20.4477 7.55228 20 7 20H4C3.44772 20 3 19.5523 3 19V10V9C3 8.44772 3.44772 8 4 8H11.7808H13.5H20.1C20.5971 8 21 8.40294 21 8.9V9C21 9.55228 21.4477 10 22 10C22.5523 10 23 9.55228 23 9V8.9C23 7.29837 21.7016 6 20.1 6H13.5H11.7808L11.3489 4.27239C11.015 2.93689 9.81505 2 8.43845 2H4ZM4 6C3.64936 6 3.31278 6.06015 3 6.17071V5C3 4.44772 3.44772 4 4 4H8.43845C8.89732 4 9.2973 4.3123 9.40859 4.75746L9.71922 6H4ZM22.1213 11.7071C20.9497 10.5355 19.0503 10.5355 17.8787 11.7071L16.1989 13.3869L11.2929 18.2929C11.1647 18.4211 11.0738 18.5816 11.0299 18.7575L10.0299 22.7575C9.94466 23.0982 10.0445 23.4587 10.2929 23.7071C10.5413 23.9555 10.9018 24.0553 11.2425 23.9701L15.2425 22.9701C15.4184 22.9262 15.5789 22.8353 15.7071 22.7071L20.5556 17.8586L22.2929 16.1213C23.4645 14.9497 23.4645 13.0503 22.2929 11.8787L22.1213 11.7071ZM19.2929 13.1213C19.6834 12.7308 20.3166 12.7308 20.7071 13.1213L20.8787 13.2929C21.2692 13.6834 21.2692 14.3166 20.8787 14.7071L19.8622 15.7236L18.3068 14.1074L19.2929 13.1213ZM16.8923 15.5219L18.4477 17.1381L14.4888 21.097L12.3744 21.6256L12.903 19.5112L16.8923 15.5219Z" />
                                    </svg>
                                </a>
                                <form action="{{ route('hapus-buku', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="card-btn card-btn-destroy" style="padding: 6px 12px;">
                                        <svg class="data-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                            <path d="M20.5001 6H3.5" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M9.5 11L10 16" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M14.5 11L14 16" stroke-width="1.5" stroke-linecap="round" />
                                            <path
                                                d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                stroke-width="1.5" />
                                            <path
                                                d="M18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5M18.8334 8.5L18.6334 11.5"
                                                stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align:center;">
                                <span>Tidak ada data di sini.</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
