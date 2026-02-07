@extends('layouts.main-layout')

@section('content')
<!-- Stats Cards -->
<section class="stats-grid">
    <div class="glass-card glass-card-3d stat-card" {{ auth()->user()->role === 'anggota' ? 'hidden' : '' }}>
        <div class="stat-card-inner">
            <div class="stat-info">
                <h3>Total Anggota</h3>
                <div class="stat-value">{{ $count['anggota'] }}</div>
            </div>
            <div class="stat-icon cyan">
                <svg viewBox="0 0 24 24" fill="none" stroke="var(--emerald-light)">
                    <path d="M18 7.16C17.94 7.15 17.87 7.15 17.81 7.16C16.43 7.11 15.33 5.98 15.33 4.58C15.33 3.15 16.48 2 17.91 2C19.34 2 20.49 3.16 20.49 4.58C20.48 5.98 19.38 7.11 18 7.16Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16.9699 14.44C18.3399 14.67 19.8499 14.43 20.9099 13.72C22.3199 12.78 22.3199 11.24 20.9099 10.3C19.8399 9.59004 18.3099 9.35003 16.9399 9.59003" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.96998 7.16C6.02998 7.15 6.09998 7.15 6.15998 7.16C7.53998 7.11 8.63998 5.98 8.63998 4.58C8.63998 3.15 7.48998 2 6.05998 2C4.62998 2 3.47998 3.16 3.47998 4.58C3.48998 5.98 4.58998 7.11 5.96998 7.16Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.99994 14.44C5.62994 14.67 4.11994 14.43 3.05994 13.72C1.64994 12.78 1.64994 11.24 3.05994 10.3C4.12994 9.59004 5.65994 9.35003 7.02994 9.59003" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 14.63C11.94 14.62 11.87 14.62 11.81 14.63C10.43 14.58 9.32996 13.45 9.32996 12.05C9.32996 10.62 10.48 9.46997 11.91 9.46997C13.34 9.46997 14.49 10.63 14.49 12.05C14.48 13.45 13.38 14.59 12 14.63Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.08997 17.78C7.67997 18.72 7.67997 20.26 9.08997 21.2C10.69 22.27 13.31 22.27 14.91 21.2C16.32 20.26 16.32 18.72 14.91 17.78C13.32 16.72 10.69 16.72 9.08997 17.78Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="glass-card glass-card-3d stat-card" {{ auth()->user()->role === 'anggota' ? 'hidden' : '' }}>
        <div class="stat-card-inner">
            <div class="stat-info">
                <h3>Total Buku</h3>
                <div class="stat-value">{{ $count['buku'] }}</div>
            </div>
            <div class="stat-icon magenta">
                <svg viewBox="0 0 24 24" fill="none" stroke="var(--gold)">
                    <path d="M19.8978 16H7.89778C6.96781 16 6.50282 16 6.12132 16.1022C5.08604 16.3796 4.2774 17.1883 4 18.2235" stroke-width="1.5"/>
                    <path d="M8 7H16" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M8 10.5H13" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M19.5 19H8" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M10 22C7.17157 22 5.75736 22 4.87868 21.1213C4 20.2426 4 18.8284 4 16V8C4 5.17157 4 3.75736 4.87868 2.87868C5.75736 2 7.17157 2 10 2H14C16.8284 2 18.2426 2 19.1213 2.87868C20 3.75736 20 5.17157 20 8M14 22C16.8284 22 18.2426 22 19.1213 21.1213C20 20.2426 20 18.8284 20 16V12" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="glass-card glass-card-3d stat-card">
        <div class="stat-card-inner">
            <div class="stat-info">
                <h3>Total Peminjaman</h3>
                <div class="stat-value">{{ $count['pinjam'] }}</div>
            </div>
            <div class="stat-icon purple">
                <svg viewBox="0 0 24 24" fill="none" stroke="var(--coral)" stroke-width="2">
                    <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="glass-card glass-card-3d stat-card">
        <div class="stat-card-inner">
            <div class="stat-info">
                <h3>Total Pengembalian</h3>
                <div class="stat-value">{{ $count['kembali'] }}</div>
            </div>
            <div class="stat-icon success">
                <svg fill="var(--success)" viewBox="0 0 511.999 511.999">
                    <g>
                        <g>
                            <g>
                                <path d="M210.188,91.3c0-10.221-8.286-18.507-18.507-18.507h-60.633c-10.221,0-18.507,8.286-18.507,18.507     s8.286,18.507,18.507,18.507h60.633C201.902,109.807,210.188,101.521,210.188,91.3z"/>
                                <path d="M93.923,298.809L12.359,345.9c-16.493,9.522-16.463,33.364,0,42.869l81.565,47.091     c16.492,9.522,37.125-2.423,37.125-21.434v-94.183C131.049,301.2,110.388,289.302,93.923,298.809z"/>
                                <path d="M353.754,72.795h-79.701c-10.518,0-18.987,8.773-18.486,19.401c0.469,9.954,9.044,17.612,19.009,17.612h80.9     c66.292,0,120.149,54.253,119.505,120.689c-0.638,65.792-55.232,118.331-121.028,118.331h-185.89     c-6.814,0-12.338,5.524-12.338,12.339v12.338c0,6.814,5.524,12.338,12.338,12.338h187.414     c86.612,0,157.019-70.713,156.52-157.438C511.5,142.034,440.125,72.795,353.754,72.795z"/>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
    </div>
</section>
@endsection