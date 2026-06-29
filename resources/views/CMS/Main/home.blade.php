@extends('layouts.app')

@section('content')
<main class="flex-grow">
    <section class="px-gutter py-xl max-w-container-max mx-auto flex flex-col md:flex-row items-center gap-xl relative">
        <div class="w-full md:w-1/2 flex flex-col gap-md z-10">
            <h1 class="font-display-lg text-display-lg text-primary glow-text leading-tight">NetCity - Portal Informasi Layanan Warnet</h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant">Informasi spesifikasi PC, katalog game, and promo warnet secara digital.</p>
            <div class="flex gap-sm mt-xs">
                <button class="bg-primary text-on-primary px-md py-xs rounded font-label-md text-label-md hover:bg-primary-container transition-colors glow-box uppercase">Lihat Daftar PC</button>
                <button class="border border-primary text-primary px-md py-xs rounded font-label-md text-label-md hover:bg-primary/10 transition-colors uppercase">Lihat Promo</button>
            </div>
        </div>
        <div class="w-full md:w-1/2 relative h-64 md:h-96 rounded-xl overflow-hidden glow-box border border-primary/30">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80')] bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');">
                <div class="absolute inset-0 bg-gradient-to-r from-background via-background/50 to-transparent"></div>
            </div>
        </div>
    </section>

    <section class="px-gutter py-md max-w-container-max mx-auto">
        <div class="bg-surface-container rounded-xl p-md flex flex-col md:flex-row justify-between items-center border border-outline-variant gap-md">
            <div class="flex items-center gap-sm">
                <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">computer</span>
                <span class="font-headline-md text-headline-md">PC Availability</span>
            </div>
            <div class="flex gap-md">
                <div class="flex items-center gap-xs">
                    <div class="w-3 h-3 rounded-full bg-primary glow-box"></div>
                    <span class="text-on-surface-variant font-body-sm">24 Available</span>
                </div>
                <div class="flex items-center gap-xs">
                    <div class="w-3 h-3 rounded-full bg-secondary"></div>
                    <span class="text-on-surface-variant font-body-sm">8 In Use</span>
                </div>
                <div class="flex items-center gap-xs">
                    <div class="w-3 h-3 rounded-full bg-error"></div>
                    <span class="text-on-surface-variant font-body-sm">2 Maintenance</span>
                </div>
            </div>
        </div>
    </section>

    <section class="px-gutter py-xl max-w-container-max mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-sm">
            <a href="{{ route('page') }}" class="md:col-span-2 md:row-span-2 block h-full">
                <div class="bg-surface-container-high rounded-xl p-md border-t border-primary/50 bg-gradient-to-b from-transparent to-surface-container-lowest flex flex-col justify-between group hover:border-primary transition-colors cursor-pointer relative overflow-hidden h-full min-h-[260px] md:min-h-[320px]">
        
                    <div class="z-10">
                        <span class="material-symbols-outlined text-primary mb-xs" style="font-variation-settings: 'FILL' 1;">desktop_windows</span>
                        <h3 class="font-headline-lg text-headline-lg mb-xs">Daftar PC</h3>
                        <p class="text-on-surface-variant font-body-sm">Eksplorasi spesifikasi rig gaming high-end kami. Dari tier standard hingga VIP.</p>
                    </div>
        
                    <div class="flex justify-end items-end mt-lg z-10">
                        <span class="material-symbols-outlined text-display-lg text-primary opacity-20 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300">
                            arrow_forward
                        </span>
                    </div>
        
                </div>
            </a>
            
            <a href="{{ route('katalog') }}" class="md:col-span-2 bg-surface-container rounded-xl p-md border border-outline-variant hover:border-primary/50 transition-colors flex items-center gap-md group">
                <div class="bg-surface p-sm rounded-lg border border-primary/20 glow-box transition-colors group-hover:border-primary">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">sports_esports</span>
                </div>
                <div>
                    <h3 class="font-headline-md text-headline-md text-on-surface transition-colors group-hover:text-primary">Katalog Game</h3>
                    <p class="text-on-surface-variant font-body-sm">Ribuan game ter-update.</p>
                </div>
            </a>
            
            <a href="{{ route('promo') }}" class="md:col-span-2 bg-surface-container rounded-xl p-md border border-outline-variant hover:border-secondary/50 transition-colors flex items-center gap-md group">
                <div class="bg-surface p-sm rounded-lg border border-secondary/20 glow-box transition-colors group-hover:border-secondary">
                    <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">local_offer</span>
                </div>
                <div>
                    <h3 class="font-headline-md text-headline-md text-on-surface transition-colors group-hover:text-secondary">Promo</h3>
                    <p class="text-on-surface-variant font-body-sm">Lihat diskon dan penawaran menarik.</p>
                </div>
            </a>
        </div>
    </section>

    <section class="px-gutter py-xl max-w-container-max mx-auto flex flex-col gap-md">
        
        <div class="flex justify-between items-end border-b border-outline-variant/30 pb-xs">
            <div class="flex items-center gap-xs">
                <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">workspace_premium</span>
                <h2 class="font-headline-lg text-headline-lg text-primary glow-text">PC Paling Sering Digunakan</h2>
            </div>
            
            <a href="{{ route('page') }}" class="group flex items-center gap-xs text-primary font-label-md hover:text-primary-container transition-colors">
                <span>Lihat Selengkapnya</span>
                <span class="material-symbols-outlined text-body-md group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-md">
            @forelse($pcPopuler as $pc)
                @php
                    $pcArray = (array) $pc;
                    $tierPC = strtoupper($pcArray['tier'] ?? 'BRONZE');
                    // Karena di query home belum ada status, kita default-kan 'Online' atau sesuaikan kebutuhan
                    $statusPC = $pcArray['status'] ?? 'Online'; 
                @endphp

                <article class="bg-surface-container-high rounded-xl overflow-hidden relative group transition-transform hover:-translate-y-1 flex flex-col justify-between
                    {{ $tierPC == 'VIP' ? 'border-t border-secondary hover:shadow-[0_10px_20px_rgba(220,184,255,0.1)]' : '' }}
                    {{ $tierPC == 'GOLD' ? 'border-t border-primary hover:shadow-[0_10px_20px_rgba(0,242,255,0.05)]' : '' }}
                    {{ $tierPC == 'SILVER' ? 'border-t border-outline' : '' }}
                    {{ $tierPC == 'BRONZE' ? 'border-t border-error' : '' }}">
                    
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-primary/5 pointer-events-none"></div>
                    
                    <div class="p-sm flex flex-col h-full justify-between flex-grow">
                        <div>
                            <div class="flex justify-between items-start gap-xs mb-sm">
                                <h2 class="font-headline-md text-headline-md text-on-surface h-14 line-clamp-2" title="{{ $pcArray['nama_komputer'] }}">
                                    {{ $pcArray['nama_komputer'] }}
                                </h2>
                                
                                <span class="flex-shrink-0 inline-flex items-center gap-1 px-2 py-1 rounded font-label-md text-label-md border
                                    {{ $tierPC == 'VIP' ? 'bg-secondary/10 text-secondary border-secondary/30' : '' }}
                                    {{ $tierPC == 'GOLD' ? 'bg-primary/10 text-primary border-primary/30' : '' }}
                                    {{ $tierPC == 'SILVER' ? 'bg-surface-variant text-on-surface border-outline-variant' : '' }}
                                    {{ $tierPC == 'BRONZE' ? 'bg-surface-variant text-on-surface border-outline-variant' : '' }}">
                                    @if($tierPC == 'VIP')
                                        <span class="material-symbols-outlined" style="font-size: 14px;">diamond</span>
                                    @endif
                                    {{ $pcArray['tier'] }}
                                </span>
                            </div>

                            <div class="flex justify-between items-center mb-sm">
                                <div class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-primary/20 text-primary font-label-md text-label-md border border-primary/30 neon-glow">
                                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span> Terpopuler
                                </div>
                                <span class="text-primary font-label-md bg-primary/10 border border-primary/20 px-2 py-0.5 rounded font-bold">
                                    {{ $pcArray['total_main'] }} Sesi
                                </span>
                            </div>
                        </div>

                        <div class="space-y-xs border-t border-outline-variant pt-xs mt-auto">
                            <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                                <span class="material-symbols-outlined text-outline">memory</span>
                                <span class="line-clamp-1">{{ $pcArray['cpu'] }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                                <span class="material-symbols-outlined text-outline">developer_board</span>
                                <span class="line-clamp-1">{{ $pcArray['gpu'] }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                                <span class="material-symbols-outlined text-outline">storage</span>
                                <span>{{ $pcArray['ram'] }}</span>
                            </div>
                        </div>
                        
                        </div>
                </article>
            @empty
                <p class="text-on-surface-variant font-body-md italic col-span-3">Belum ada data riwayat bermain.</p>
            @endforelse
        </div>
    </section>

    <section class="px-gutter py-xl max-w-container-max mx-auto flex flex-col gap-md">
        
        <div class="flex justify-between items-end border-b border-outline-variant/30 pb-xs">
            <div class="flex items-center gap-xs">
                <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">local_fire_department</span>
                <h2 class="font-headline-lg text-headline-lg text-secondary glow-text">Game Terpopuler</h2>
            </div>
            
            <a href="{{ route('katalog') }}" class="group flex items-center gap-xs text-secondary font-label-md hover:text-secondary/80 transition-colors">
                <span>Lihat Katalog Lengkap</span>
                <span class="material-symbols-outlined text-body-md group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
            @forelse($gamePopuler as $game)
                @php
                    // Mengubah objek baris Oracle menjadi array huruf kecil agar aman di-render
                    $gameArray = (array) $game;
                @endphp

                <div class="glass-panel rounded-lg overflow-hidden flex flex-col glow-hover transition-all duration-300 border-t border-transparent hover:border-secondary">
                    {{-- Gambar Cover Game (Langsung Berwarna, Mix-blend Dihapus) --}}
                    <div class="h-40 w-full relative bg-surface-container-high">
                        @if(!empty($gameArray['image']))
                            <img alt="{{ $gameArray['judul_game'] }} Cover" class="w-full h-full object-cover opacity-90" src="{{ asset('storage/' . $gameArray['image']) }}"/>
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-on-surface-variant text-sm font-label-md bg-surface-container-highest">
                                <span class="material-symbols-outlined text-[32px] mb-xs text-outline">sports_esports</span>
                                No Cover Image
                            </div>
                        @endif
                        <div class="absolute top-xs right-xs bg-surface-container-highest/90 backdrop-blur px-xs py-1 rounded text-secondary font-label-md text-[10px] border border-secondary/30 flex items-center gap-1">
                            <span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' 1;">local_fire_department</span> Populer
                        </div>
                    </div>
                    
                    {{-- Detail Konten Game --}}
                    <div class="p-sm flex flex-col flex-grow bg-gradient-to-b from-transparent to-surface-container-low/50">
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-1 truncate" title="{{ $gameArray['judul_game'] }}">
                            {{ $gameArray['judul_game'] }}
                        </h3>
                        
                        <p class="font-body-sm text-body-sm text-on-surface-variant mb-md">
                            {{ $gameArray['developer'] ?? 'Unknown Developer' }}
                        </p>
                        
                        {{-- Badge Genre --}}
                        <div class="flex flex-wrap gap-1 mb-md">
                            <span class="bg-surface-variant text-on-surface px-2 py-1 rounded text-[10px] font-label-md uppercase tracking-wider">
                                {{ $gameArray['genre'] }}
                            </span>
                        </div>
                        
                        {{-- Statistik Sesi Dimainkan (Menggantikan RAM & Tier) --}}
                        <div class="mt-auto border-t border-outline-variant/30 pt-sm flex justify-between items-center">
                            <span class="font-body-sm text-body-sm text-on-surface-variant">Total Dimainkan:</span>
                            <span class="text-secondary font-label-md font-bold bg-secondary/10 border border-secondary/20 px-2 py-0.5 rounded">
                                {{ $gameArray['total_dimainkan'] }} Sesi
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-xl text-center text-on-surface-variant border border-dashed border-outline-variant rounded-lg">
                    <span class="material-symbols-outlined text-[48px] mb-sm text-outline">sports_esports</span>
                    <p class="font-headline-md">Belum ada data riwayat game terpopuler.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="px-gutter py-xl max-w-container-max mx-auto flex flex-col gap-md">
        
        <div class="flex justify-between items-end border-b border-outline-variant/30 pb-xs">
            <div class="flex items-center gap-xs">
                <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">local_offer</span>
                <h2 class="font-headline-lg text-headline-lg text-primary glow-text">Promo & Event Terbatas</h2>
            </div>
            
            <a href="{{ route('promo') }}" class="group flex items-center gap-xs text-primary font-label-md hover:text-primary-container transition-colors">
                <span>Lihat Semua Promo</span>
                <span class="material-symbols-outlined text-body-md group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-lg">
            @php $count = 0; @endphp
            @foreach($promos as $promo)
                @if(($promo->tipe_promo === 'VOUCHER' || $promo->tipe_promo === 'EVENT') && $count < 3)
                    @php $count++; @endphp
                    
                    <div class="glass-panel rounded-xl overflow-hidden flex flex-col h-full border border-outline-variant/30 transition-transform hover:-translate-y-1">
                        {{-- Gambar Cover Promo (Ukuran disamakan h-48) --}}
                        <div class="relative h-48 w-full bg-surface-container-high">
                            @if(!empty($promo->banner_img))
                                <img class="w-full h-full object-cover" alt="{{ $promo->judul_promo }} Banner" src="{{ asset('storage/' . $promo->banner_img) }}"/>
                            @else
                                <div class="w-full h-full flex items-center justify-center text-on-surface-variant font-label-md">NetCity Promo</div>
                            @endif
                            
                            {{-- Badge Tipe Promo --}}
                            <div class="absolute top-sm right-sm px-xs py-[2px] rounded text-[10px] font-bold uppercase tracking-widest
                                {{ $promo->tipe_promo === 'EVENT' ? 'bg-primary-container text-black' : 'bg-secondary-container text-on-secondary-container' }}">
                                {{ $promo->tipe_promo === 'EVENT' ? 'EVENT' : 'CODE: ' . $promo->kode_promo }}
                            </div>
                        </div>
                        
                        {{-- Detail Konten --}}
                        <div class="p-md flex flex-col flex-1 bg-gradient-to-b from-transparent to-surface-container-low/30">
                            <div class="mb-sm flex-grow">
                                <h3 class="font-headline-md text-headline-md text-primary mb-xs truncate" title="{{ $promo->judul_promo }}">{{ $promo->judul_promo }}</h3>
                                <p class="text-on-surface-variant text-body-sm line-clamp-2 mb-md">{{ $promo->deskripsi }}</p>
                            </div>
                            
                            <div class="mt-auto space-y-md">
                                {{-- Countdown Timer --}}
                                <div class="flex items-center justify-between text-[13px] text-on-surface-variant/80 border-t border-outline-variant/30 pt-sm">
                                    <div class="flex items-center gap-xs public-countdown text-error" 
                                         data-expire="{{ $promo->tipe_promo === 'EVENT' ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', explode('.', $promo->tanggal_berakhir)[0])->format('Y-m-d') . 'T' . $promo->jam_selesai . ':00' : \Carbon\Carbon::parse($promo->tanggal_berakhir)->format('Y-m-d') . 'T23:59:59' }}">
                                        <span class="material-symbols-outlined text-[16px]">timer</span>
                                        <span class="countdown-display">Calculating...</span>
                                    </div>
                                </div>
                                
                                {{-- Logika Proteksi Login & Aksi Button --}}
                                @if($promo->tipe_promo === 'EVENT')
                                    <span class="w-full py-2 bg-surface-variant/20 border border-outline-variant/30 text-on-surface-variant font-label-md text-label-md rounded flex justify-center items-center gap-xs cursor-default uppercase tracking-wider">
                                        <span class="material-symbols-outlined text-[18px]">bolt</span>
                                        <span>Automatic Event</span>
                                    </span>
                                @else
                                    @if(Auth::check())
                                        @php
                                            $user = Auth::user();
                                            $isAdmin = ($user->role === 'admin');
                                            $isClaimed = false;
                                            
                                            if(!$isAdmin) {
                                                $isClaimed = DB::table('user_promo')
                                                    ->where('user_id', $user->id)
                                                    ->where('promo_id', $promo->id)
                                                    ->exists();
                                            }
                                        @endphp

                                        <form action="{{ route('promo.claim', $promo->id) }}" method="POST" class="w-full">
                                            @csrf
                                            @if($isClaimed)
                                                <button type="button" disabled class="w-full py-2 bg-emerald-500/10 border border-emerald-500/40 text-emerald-400 font-label-md text-label-md rounded flex justify-center items-center gap-xs cursor-default">
                                                    <span class="material-symbols-outlined text-[18px]">check_circle</span>
                                                    <span>Telah Diklaim</span>
                                                </button>
                                            @else
                                                <button type="submit" class="w-full py-2 bg-transparent border border-primary text-primary hover:bg-primary hover:text-black font-label-md text-label-md rounded transition-all duration-300 flex justify-center items-center gap-xs">
                                                    <span class="material-symbols-outlined text-[18px]">workspace_premium</span>
                                                    <span>{{ $isAdmin ? '[TEST] Claim Voucher' : 'Claim Voucher' }}</span>
                                                </button>
                                            @endif
                                        </form>
                                    @else
                                        {{-- JIKA BELUM LOGIN: Diarahkan ke halaman login --}}
                                        <a href="{{ route('login') }}" class="w-full py-2 bg-error/10 border border-error/40 text-error hover:bg-error hover:text-white font-label-md text-label-md rounded transition-all duration-300 flex justify-center items-center gap-xs text-center">
                                            <span class="material-symbols-outlined text-[18px]">login</span>
                                            <span>Login untuk Klaim</span>
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            
            @if($count === 0)
                <div class="col-span-full py-lg text-center text-on-surface-variant border border-dashed border-outline-variant rounded-xl">
                    <p class="font-body-md">Tidak ada promo atau event aktif saat ini.</p>
                </div>
            @endif
        </div>
    </section>

</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const countdownElements = document.querySelectorAll('.public-countdown');
        
        function runPublicTimers() {
            const rightNow = new Date().getTime();
            
            countdownElements.forEach(elem => {
                const expireStr = elem.getAttribute('data-expire');
                const targetTime = new Date(expireStr).getTime();
                const displayNode = elem.querySelector('.countdown-display');

                if (isNaN(targetTime)) {
                    displayNode.innerHTML = "Format Waktu Error";
                    return; 
                }

                const difference = targetTime - rightNow;

                if (difference <= 0) {
                    displayNode.innerHTML = "Expired / Event Ended";
                    const card = elem.closest('.glass-panel');
                    const btnClaim = card ? card.querySelector('button[type="submit"]') : null;
                    if(btnClaim) {
                        btnClaim.disabled = true;
                        btnClaim.className = "w-full py-2 bg-surface-variant text-on-surface-variant/40 border border-outline-variant rounded cursor-not-allowed text-center";
                        btnClaim.innerHTML = "Voucher Expired";
                    }
                } else {
                    const d = Math.floor(difference / (1000 * 60 * 60 * 24));
                    const h = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const m = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                    const s = Math.floor((difference % (1000 * 60)) / 1000);

                    if (d > 0) {
                        displayNode.innerHTML = `Sisa ${d} Hari ${h} Jam`;
                    } else if (h > 0) {
                        displayNode.innerHTML = `Sisa ${h} Jam ${m} Menit`;
                    } else {
                        displayNode.innerHTML = `Sisa ${m}m ${s}s`;
                    }
                }
            });
        }
        
        if(countdownElements.length > 0) {
            runPublicTimers();
            setInterval(runPublicTimers, 1000);
        }
    });
</script>
@endsection