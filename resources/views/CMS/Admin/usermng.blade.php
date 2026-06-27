@extends('layouts.admin')

@section('content')
<!-- Header Konten Utama -->
<header class="sticky top-0 z-40 bg-surface/80 backdrop-blur-xl border-b border-primary/20 px-gutter py-sm flex justify-between items-center">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface">Manajemen Member</h2>
        <p class="font-body-sm text-body-sm text-on-surface-variant">Monitor and manage registered gaming lounge members</p>
    </div>
    <button id="btnTambahMember" class="bg-primary-container text-on-primary-container px-sm py-xs rounded-xl font-headline-md text-body-md flex items-center gap-xs shadow-[0_0_15px_rgba(0,242,255,0.2)] hover:shadow-[0_0_20px_rgba(0,242,255,0.4)] transition-all active:scale-95">
        <span class="material-symbols-outlined">add</span>
        Tambah Member
    </button>
</header>

<div class="p-gutter max-w-container-max mx-auto space-y-lg">
    <!-- Stat Cards (Menampilkan Ringkasan Jumlah Agregat Data) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
        <div class="glass-card p-md rounded-xl flex items-center gap-md">
            <div class="w-12 h-12 rounded-xl bg-primary/10 border border-primary/20 flex items-center justify-center shadow-[0_0_10px_rgba(0,242,255,0.1)]">
                <span class="material-symbols-outlined text-primary text-3xl">groups</span>
            </div>
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Total Members</p>
                <h3 class="font-headline-lg text-headline-lg text-primary">{{ number_format($totalMembers ?? 0) }}</h3>
            </div>
        </div>
        <div class="glass-card p-md rounded-xl flex items-center gap-md">
            <div class="w-12 h-12 rounded-xl bg-secondary/10 border border-secondary/20 flex items-center justify-center shadow-[0_0_10px_rgba(220,184,255,0.1)]">
                <span class="material-symbols-outlined text-secondary text-3xl">sensors</span>
            </div>
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Active Today</p>
                <h3 class="font-headline-lg text-headline-lg text-secondary">{{ $activeToday ?? 0 }}</h3>
            </div>
        </div>
        <div class="glass-card p-md rounded-xl flex items-center gap-md">
            <div class="w-12 h-12 rounded-xl bg-tertiary-fixed-dim/10 border border-tertiary-fixed-dim/20 flex items-center justify-center shadow-[0_0_10px_rgba(255,178,184,0.1)]">
                <span class="material-symbols-outlined text-tertiary-fixed-dim text-3xl">person_add</span>
            </div>
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">New This Month</p>
                <h3 class="font-headline-lg text-headline-lg text-tertiary-fixed-dim">{{ $newThisMonth ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="glass-card rounded-xl overflow-hidden">
        <!-- Filter Bar -->
        <div class="p-md border-b border-outline-variant/30 flex flex-col md:flex-row gap-md items-center justify-between">
            <!-- Kolom Pencarian -->
            <div class="relative w-full md:w-96 group">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-on-surface-variant group-focus-within:text-primary transition-colors">search</span>
                <input id="userSearchInput" class="w-full bg-surface-container-lowest border border-outline-variant text-on-surface text-body-sm px-xl py-xs rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-all" placeholder="Search by username or email..." type="text"/>
            </div>
            <!-- Filter Tier Kategori -->
            <div class="flex items-center gap-sm w-full md:w-auto overflow-x-auto pb-xs md:pb-0">
                <span class="text-label-md text-on-surface-variant whitespace-nowrap">Tier:</span>
                <button class="px-sm py-xs rounded-lg bg-primary/10 text-primary border border-primary/30 text-body-sm font-semibold whitespace-nowrap">All Members</button>
                <button class="px-sm py-xs rounded-lg bg-surface-container text-on-surface-variant border border-outline-variant text-body-sm hover:border-primary/50 transition-all whitespace-nowrap">VIP</button>
                <button class="px-sm py-xs rounded-lg bg-surface-container text-on-surface-variant border border-outline-variant text-body-sm hover:border-primary/50 transition-all whitespace-nowrap">Gold</button>
                <button class="px-sm py-xs rounded-lg bg-surface-container text-on-surface-variant border border-outline-variant text-body-sm hover:border-primary/50 transition-all whitespace-nowrap">Silver</button>
            </div>
        </div>

        <!-- Table Content -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-high/50 text-on-surface-variant border-b border-outline-variant/30">
                        <th class="px-md py-sm font-label-md text-label-md uppercase tracking-wider">ID User</th>
                        <th class="px-md py-sm font-label-md text-label-md uppercase tracking-wider">Username</th>
                        <th class="px-md py-sm font-label-md text-label-md uppercase tracking-wider">Email</th>
                        <th class="px-md py-sm font-label-md text-label-md uppercase tracking-wider">Sisa Waktu</th>
                        <th class="px-md py-sm font-label-md text-label-md uppercase tracking-wider">Tier</th>
                        <th class="px-md py-sm font-label-md text-label-md uppercase tracking-wider">Tanggal Bergabung</th>
                        <th class="px-md py-sm font-label-md text-label-md uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/20">
                    @forelse($users as $user)
                        <tr class="user-row hover:bg-primary/5 transition-colors group">
                            <!-- ID Member NetCity -->
                            <td class="px-md py-sm font-body-sm text-primary">{{ $user->id_member }}</td>
                            <!-- Profil Gambar & Username -->
                            <td class="px-md py-sm">
                                <div class="flex items-center gap-xs">
                                    <div class="w-8 h-8 rounded-lg overflow-hidden border border-outline-variant">
                                        <img class="w-full h-full object-cover" alt="Avatar" src="{{ !empty($user->avatar_url) ? asset('storage/' . $user->avatar_url) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuAV0blCqMufllbQ9YvhC3CMHrjJ3igJ6BlFlrqidRCR_NgFdg_UIOivbfRycp21b6Mh_tQ-M5BiPNV_oRvpqOc8wWWjPfmL2kV2NCMfLNp-E5C4smj6R4Au5mFTe5w1Yu6TxrdOLvnJGjBrFVzp_OpICnfi4XIetR82Hr-2qqOsiA_XXVRt9gPPHtIh2ji0VaDoa0KJDwZJWS8biAxSLw1YS1qaCWJNy7z4XfJhMPIAaJ920bQR4oGflbYGoZ8nrLi2PHbPc7l89_I' }}"/>
                                    </div>
                                    <span class="user-name-text font-headline-md text-body-md text-on-surface">{{ $user->username }}</span>
                                </div>
                            </td>
                            <!-- Kondisi Jika Email Bersifat Opsional -->
                            <td class="user-email-text px-md py-sm font-body-sm text-on-surface-variant">
                                {{ $user->email ?? 'Tidak Ada Email' }}
                            </td>
                            <!-- Sisa Waktu Billing Paket -->
                            <td class="px-md py-sm font-body-sm">
                                @php
                                    $timeColor = 'text-on-surface-variant';
                                    if(isset($user->sisa_menit)) {
                                        if($user->sisa_menit <= 0) $timeColor = 'text-error';
                                        elseif($user->sisa_menit <= 60) $timeColor = 'text-secondary-fixed-dim';
                                        else $timeColor = 'text-primary';
                                    }
                                @endphp
                                <div class="flex items-center gap-xs {{ $timeColor }}">
                                    <span class="material-symbols-outlined text-sm">schedule</span>
                                    <span>
                                        @if(isset($user->sisa_menit))
                                            {{ sprintf('%02d:%02d hrs', floor($user->sisa_menit / 60), $user->sisa_menit % 60) }}
                                        @else
                                            00:00 hrs
                                        @endif
                                    </span>
                                </div>
                            </td>
                            <!-- Badge Tier Level Player -->
                            <td class="px-md py-sm">
                                @switch(strtoupper($user->tier ?? 'SILVER'))
                                    @case('VIP')
                                        <span class="px-xs py-0.5 rounded-full bg-secondary-container/20 text-secondary border border-secondary/30 text-[10px] font-bold uppercase tracking-widest">VIP</span>
                                        @break
                                    @case('GOLD')
                                        <span class="px-xs py-0.5 rounded-full bg-primary/10 text-primary border border-primary/30 text-[10px] font-bold uppercase tracking-widest">Gold</span>
                                        @break
                                    @default
                                        <span class="px-xs py-0.5 rounded-full bg-outline-variant/20 text-on-surface-variant border border-outline-variant/30 text-[10px] font-bold uppercase tracking-widest">Silver</span>
                                @endswitch
                            </td>
                            <!-- Tanggal Pembuatan Akun -->
                            <td class="px-md py-sm font-body-sm text-on-surface-variant">
                                {{ isset($user->created_at) ? date('d M Y', strtotime($user->created_at)) : '-' }}
                            </td>
                            <!-- Tombol Aksi Kontrol Kasir/Admin -->
                            <td class="px-md py-sm text-right">
                                <div class="flex justify-end gap-xs">
                                    <button class="btn-edit-user p-xs rounded-lg bg-surface-variant/30 text-on-surface-variant hover:text-primary hover:bg-primary/10 transition-all" data-id="{{ $user->id }}">
                                        <span class="material-symbols-outlined text-md">edit</span>
                                    </button>
                                    <form action="#" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus member ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-xs rounded-lg bg-surface-variant/30 text-on-surface-variant hover:text-error hover:bg-error-container/10 transition-all">
                                            <span class="material-symbols-outlined text-md">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-md py-xl text-center text-on-surface-variant">
                                Belum ada member gaming lounge terdaftar di database.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Real Menggunakan Rantai Navigasi Tailwind Laravel -->
        @if(method_exists($users, 'links'))
            <div class="p-md bg-surface-container-low border-t border-outline-variant/30">
                {{ $users->links() }}
            </div>
        @else
            <!-- Placeholder Pagination Footer Statis Bawaan Asli -->
            <div class="p-md bg-surface-container-low border-t border-outline-variant/30 flex items-center justify-between">
                <p class="text-body-sm text-on-surface-variant">Showing 1 to 4 of 1,284 members</p>
                <div class="flex gap-xs">
                    <button class="w-10 h-10 rounded-lg flex items-center justify-center bg-surface-variant/30 text-on-surface-variant hover:bg-primary hover:text-black transition-all">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button class="w-10 h-10 rounded-lg flex items-center justify-center bg-primary text-black font-bold">1</button>
                    <button class="w-10 h-10 rounded-lg flex items-center justify-center bg-surface-variant/30 text-on-surface-variant hover:bg-primary hover:text-black transition-all">2</button>
                    <button class="w-10 h-10 rounded-lg flex items-center justify-center bg-surface-variant/30 text-on-surface-variant hover:bg-primary hover:text-black transition-all">3</button>
                    <button class="w-10 h-10 rounded-lg flex items-center justify-center bg-surface-variant/30 text-on-surface-variant hover:bg-primary hover:text-black transition-all">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- TRIGGER TOMBOL TAMBAH & EDIT MODAL ---
        document.getElementById('btnTambahMember').addEventListener('click', function() {
            console.log('Open Add Member Modal Triggered');
            // Tambahkan pemanggilan modal pendaftaran member baru di sini nanti
        });

        // --- SISTEM LIVE SEARCH SISI KLIEN ---
        const searchInput = document.getElementById('userSearchInput');
        if(searchInput) {
            searchInput.addEventListener('input', (e) => {
                const query = e.target.value.toLowerCase();
                const rows = document.querySelectorAll('.user-row');
                
                rows.forEach(row => {
                    const username = row.querySelector('.user-name-text').innerText.toLowerCase();
                    const email = row.querySelector('.user-email-text').innerText.toLowerCase();
                    
                    if(username.includes(query) || email.includes(query)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
    });
</script>
@endsection