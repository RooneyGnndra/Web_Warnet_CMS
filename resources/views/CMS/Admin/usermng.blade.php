@extends('layouts.admin')

@section('content')
<!-- Header Konten Utama -->
<header class="sticky top-0 z-40 bg-surface/80 backdrop-blur-xl border-b border-primary/20 px-gutter py-sm flex justify-between items-center">
    <div>
        <h2 class="font-headline-lg text-headline-lg text-on-surface">Manajemen Member</h2>
        <p class="font-body-sm text-body-sm text-on-surface-variant">Monitor and manage registered gaming lounge members</p>
    </div>
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
                        <th class="px-md py-sm font-label-md text-label-md uppercase tracking-wider text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/20">
                    @forelse($users as $user)
                        <tr class="user-row hover:bg-primary/5 transition-colors group">
                            <td class="px-md py-sm font-body-sm text-primary">NC-M-{{ sprintf('%03d', $user->id) }}</td>
                            
                            <td class="px-md py-sm">
                                <div class="flex items-center gap-xs">
                                    <div class="w-8 h-8 rounded-lg overflow-hidden border border-outline-variant">
                                        <img class="w-full h-full object-cover" alt="Avatar" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAV0blCqMufllbQ9YvhC3CMHrjJ3igJ6BlFlrqidRCR_NgFdg_UIOivbfRycp21b6Mh_tQ-M5BiPNV_oRvpqOc8wWWjPfmL2kV2NCMfLNp-E5C4smj6R4Au5mFTe5w1Yu6TxrdOLvnJGjBrFVzp_OpICnfi4XIetR82Hr-2qqOsiA_XXVRt9gPPHtIh2ji0VaDoa0KJDwZJWS8biAxSLw1YS1qaCWJNy7z4XfJhMPIAaJ920bQR4oGflbYGoZ8nrLi2PHbPc7l89_I"/>
                                    </div>
                                    <span class="user-name-text font-headline-md text-body-md text-on-surface">{{ $user->username }}</span>
                                </div>
                            </td>
                            
                            <td class="user-email-text px-md py-sm font-body-sm text-on-surface-variant">
                                {{ $user->email ?? 'Tidak Ada Email' }}
                            </td>
                            
                            <td class="px-md py-sm font-body-sm">
                                @php
                                    $timeColor = 'text-on-surface-variant';
                                    if(isset($user->sisa_waktu)) {
                                        if($user->sisa_waktu <= 0) $timeColor = 'text-error';
                                        elseif($user->sisa_waktu <= 60) $timeColor = 'text-secondary-fixed-dim';
                                        else $timeColor = 'text-primary';
                                    }
                                @endphp
                                <div class="flex items-center gap-xs {{ $timeColor }}">
                                    <span class="material-symbols-outlined text-sm">schedule</span>
                                    <span>
                                        @if(isset($user->sisa_waktu))
                                            {{ sprintf('%02d:%02d hrs', floor($user->sisa_waktu / 60), $user->sisa_waktu % 60) }}
                                        @else
                                            00:00 hrs
                                        @endif
                                    </span>
                                </div>
                            </td>
                            
                            <td class="px-md py-sm">
                                @switch(strtoupper($user->tier_langganan ?? 'BRONZE'))
                                    @case('VIP')
                                        <span class="px-xs py-0.5 rounded-full bg-secondary-container/20 text-secondary border border-secondary/30 text-[10px] font-bold uppercase tracking-widest">VIP</span>
                                        @break
                                    @case('GOLD')
                                        <span class="px-xs py-0.5 rounded-full bg-[#FFD700]/10 text-[#FFD700] border border-[#FFD700]/30 text-[10px] font-bold uppercase tracking-widest">Gold</span>
                                        @break
                                    @case('SILVER')
                                        <span class="px-xs py-0.5 rounded-full bg-outline-variant/20 text-on-surface-variant border border-outline-variant/30 text-[10px] font-bold uppercase tracking-widest">Silver</span>
                                        @break
                                    @default
                                        <span class="px-xs py-0.5 rounded-full bg-orange-500/10 text-orange-400 border border-orange-500/20 text-[10px] font-bold uppercase tracking-widest">Bronze</span>
                                @endswitch
                            </td>
                            
                            <td class="px-md py-sm font-body-sm text-on-surface-variant">
                                {{ isset($user->created_at) ? date('d M Y', strtotime($user->created_at)) : '-' }}
                            </td>
                            
                            <td class="px-md py-sm text-right">
                                <div class="flex justify-end gap-xs">
                                    <button class="btn-add-session p-xs rounded-lg bg-surface-variant/30 text-on-surface-variant hover:text-primary hover:bg-primary/10 transition-all"
                                            data-id="{{ $user->id }}"
                                            data-username="{{ $user->username }}">
                                        <span class="material-symbols-outlined text-md">computer</span>
                                    </button>

                                    <button class="btn-add-game p-xs rounded-lg bg-surface-variant/30 text-on-surface-variant hover:text-secondary hover:bg-secondary/10 transition-all"
                                            data-id="{{ $user->id }}"
                                            data-username="{{ $user->username }}"
                                            data-url="{{ route('admin.users.addGameHistory', $user->id) }}"> <span class="material-symbols-outlined text-md">sports_esports</span>
                                    </button>

                                    <button class="btn-edit-user p-xs rounded-lg bg-surface-variant/30 text-on-surface-variant hover:text-primary hover:bg-primary/10 transition-all" 
                                            data-id="{{ $user->id }}"
                                            data-username="{{ $user->username }}"
                                            data-email="{{ $user->email }}"
                                            data-sisa="{{ $user->sisa_waktu }}"
                                            data-tier="{{ $user->tier_langganan }}">
                                        <span class="material-symbols-outlined text-md">edit</span>
                                    </button>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus member ini?')">
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

<div id="modalEditUser" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-background/80 backdrop-blur-sm close-edit-user-modal"></div>
    <div class="glass-card neon-border relative w-full max-w-lg p-lg rounded-xl bg-surface-container-high z-10 space-y-md border border-outline-variant">
        <div class="flex items-center justify-between border-b border-outline-variant/30 pb-xs">
            <h3 class="font-headline-md text-headline-md text-on-surface">Edit Data Member</h3>
            <button type="button" class="text-on-surface-variant hover:text-error close-edit-user-modal">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <form id="formEditUser" method="POST" class="space-y-sm">
            @csrf
            @method('PUT')
            
            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Username</label>
                <input type="text" name="username" id="edit_username" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
            </div>

            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Email (Opsional)</label>
                <input type="email" name="email" id="edit_email" class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
            </div>

            <div class="grid grid-cols-2 gap-sm">
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Sisa Waktu (Menit)</label>
                    <input type="number" name="sisa_waktu" id="edit_sisa_waktu" required min="0" class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Tier Member</label>
                    <select name="tier_langganan" id="edit_tier" class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none">
                        <option value="BRONZE">BRONZE</option>
                        <option value="SILVER">SILVER</option>
                        <option value="GOLD">GOLD</option>
                        <option value="VIP">VIP</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end gap-sm pt-sm border-t border-outline-variant/30 mt-md">
                <button type="button" class="close-edit-user-modal bg-surface-variant text-on-surface px-md py-sm rounded-lg font-label-md transition-all">Batal</button>
                <button type="submit" class="bg-primary text-on-primary px-md py-sm rounded-lg font-label-md shadow-[0_0_10px_rgba(0,242,255,0.3)] hover:brightness-110 transition-all">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<div id="modalAddSession" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-background/80 backdrop-blur-sm close-session-modal"></div>
    <div class="glass-card neon-border relative w-full max-w-md p-lg rounded-xl bg-surface-container-high z-10 space-y-md border border-outline-variant">
        <div class="flex items-center justify-between border-b border-outline-variant/30 pb-xs">
            <h3 class="font-headline-md text-headline-md text-on-surface flex items-center gap-xs">
                <span class="material-symbols-outlined text-primary">monitor_heart</span>
                Input Sesi: <span id="session_modal_username" class="text-primary font-bold"></span>
            </h3>
            <button type="button" class="text-on-surface-variant hover:text-error close-session-modal">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <form id="formAddSession" method="POST" class="space-y-sm">
            @csrf
            
            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Pilih PC / Komputer Lounge</label>
                <select name="id_komputer" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none">
                    @for($i = 1; $i <= 14; $i++)
                        @php $pcId = 'NC-' . str_pad($i, 2, '0', STR_PAD_LEFT); @endphp
                        <option value="{{ $pcId }}">Lounge PC - {{ $pcId }}</option>
                    @endfor
                </select>
            </div>

            <div class="grid grid-cols-2 gap-sm">
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Durasi Bermain (Jam)</label>
                    <input type="number" 
                        name="durasi" 
                        step="0.1" 
                        min="0.5" 
                        placeholder="Contoh: 1.5 atau 2" 
                        required 
                        class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>

                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Total Biaya Billing (Rp)</label>
                    <input type="number" 
                        name="total_biaya" 
                        min="0" 
                        placeholder="Contoh: 75000" 
                        required 
                        class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>
            </div>

            <div class="flex justify-end gap-sm pt-sm border-t border-outline-variant/30 mt-md">
                <button type="button" class="close-session-modal bg-surface-variant text-on-surface px-md py-sm rounded-lg font-label-md transition-all">Batal</button>
                <button type="submit" class="bg-primary text-on-primary px-md py-sm rounded-lg font-label-md shadow-[0_0_10px_rgba(0,242,255,0.3)] hover:brightness-110 transition-all">Aktifkan Billing</button>
            </div>
        </form>
    </div>
</div>

<div id="modalAddGame" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-background/80 backdrop-blur-sm close-game-modal"></div>
    <div class="glass-card neon-border relative w-full max-w-md p-lg rounded-xl bg-surface-container-high z-10 space-y-md border border-outline-variant">
        <div class="flex items-center justify-between border-b border-outline-variant/30 pb-xs">
            <h3 class="font-headline-md text-headline-md text-on-surface flex items-center gap-xs">
                <span class="material-symbols-outlined text-secondary">sports_esports</span>
                Set Game Terakhir: <span id="game_modal_username" class="text-secondary font-bold"></span>
            </h3>
            <button type="button" class="text-on-surface-variant hover:text-error close-game-modal">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <form id="formAddGame" method="POST" class="space-y-sm">
            @csrf
            
            <div class="flex flex-col gap-xs">
                <label class="text-label-md text-on-surface-variant">Pilih Game Utama</label>
                <select name="game_id" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none">
                    <option value="" disabled selected>-- Pilih Game dari Database --</option>
                    @isset($games)
                        @foreach($games as $game)
                            @php 
                                $gArray = (array) $game; 
                                
                                // PERBAIKAN UTAMA: Ganti ID_GAME menjadi ID sesuai kolom asli tabel GAMES kamu
                                $gameId = $gArray['ID'] ?? $gArray['id'] ?? '';
                                
                                $gameName = $gArray['JUDUL_GAME'] ?? $gArray['judul_game'] ?? 'Unknown Game';
                            @endphp
                            
                            <option value="{{ $gameId }}">{{ $gameName }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>

            <div class="grid grid-cols-2 gap-sm">
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Total Waktu Main (Jam)</label>
                    <input type="number" name="total_jam" step="0.1" min="0.5" placeholder="Contoh: 12.5" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none"/>
                </div>
                <div class="flex flex-col gap-xs">
                    <label class="text-label-md text-on-surface-variant">Keterangan Waktu</label>
                    <select name="keterangan_waktu" required class="bg-surface-container-low border border-outline-variant text-on-surface rounded-lg px-md py-sm font-body-sm focus:border-primary focus:outline-none">
                        <option value="Baru Saja">Baru Saja</option>
                        <option value="Kemarin">Kemarin</option>
                        <option value="2 Hari Lalu">2 Hari Lalu</option>
                        <option value="Minggu Ini">Minggu Ini</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end gap-sm pt-sm border-t border-outline-variant/30 mt-md">
                <button type="button" class="close-game-modal bg-surface-variant text-on-surface px-md py-sm rounded-lg font-label-md transition-all">Batal</button>
                <button type="submit" class="bg-secondary text-black px-md py-sm rounded-lg font-label-md shadow-[0_0_10px_rgba(220,184,255,0.3)] hover:brightness-110 transition-all font-bold">Simpan ke History</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalEditUser = document.getElementById('modalEditUser');
        const formEditUser = document.getElementById('formEditUser');
        const btnEdits = document.querySelectorAll('.btn-edit-user');
        const modalAddSession = document.getElementById('modalAddSession');
        const formAddSession = document.getElementById('formAddSession');
        const btnSessions = document.querySelectorAll('.btn-add-session');
        const modalAddGame = document.getElementById('modalAddGame');
        const formAddGame = document.getElementById('formAddGame');
        const btnGames = document.querySelectorAll('.btn-add-game');

        // Buka modal & Auto-fill Data Lama (User)
        btnEdits.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const username = this.getAttribute('data-username');
                const email = this.getAttribute('data-email');
                const sisa = this.getAttribute('data-sisa');
                const tier = this.getAttribute('data-tier');

                formEditUser.setAttribute('action', `/admin/users/update/${id}`);
                
                document.getElementById('edit_username').value = username;
                document.getElementById('edit_email').value = email || '';
                document.getElementById('edit_sisa_waktu').value = sisa || 0;
                document.getElementById('edit_tier').value = tier || 'BRONZE';

                modalEditUser.classList.remove('hidden');
            });
        });

        // Tutup Modal Edit
        document.querySelectorAll('.close-edit-user-modal').forEach(btn => {
            btn.addEventListener('click', () => modalEditUser.classList.add('hidden'));
        });

        // Buka Modal Sesi PC Baru
        btnSessions.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const username = this.getAttribute('data-username');

                // Set action form dinamis mengarah ke rute simpan sesi yang kita buat di web.php
                formAddSession.setAttribute('action', `/admin/users/${id}/add-session`);
                document.getElementById('session_modal_username').innerText = username;

                modalAddSession.classList.remove('hidden');
            });
        });

        // Tutup Modal Sesi
        document.querySelectorAll('.close-session-modal').forEach(btn => {
            btn.addEventListener('click', () => modalAddSession.classList.add('hidden'));
        });

        // Buka Modal Input Game Terakhir
        btnGames.forEach(button => {
            button.addEventListener('click', function() {
                const username = this.getAttribute('data-username');
                
                // AMBIL URL RUTE TERDAFTAR SECARA AKURAT DARI ATRIBUT TOMBOL
                const actionUrl = this.getAttribute('data-url');

                // Set action form menggunakan URL absolut asli bawaan Laravel
                formAddGame.setAttribute('action', actionUrl);
                
                document.getElementById('game_modal_username').innerText = username;
                modalAddGame.classList.remove('hidden');
            });
        });

        // Tutup Modal Game
        document.querySelectorAll('.close-game-modal').forEach(btn => {
            btn.addEventListener('click', () => modalAddGame.classList.add('hidden'));
        });
        
    });
</script>
@endsection