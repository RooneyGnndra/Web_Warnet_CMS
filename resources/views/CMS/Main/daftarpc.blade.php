@extends('layouts.app')

@section('content')
<main class="flex-grow w-full max-w-container-max mx-auto px-gutter py-md md:py-xl">
    <header class="mb-lg flex flex-col md:flex-row justify-between items-start md:items-end gap-sm border-b border-outline-variant pb-sm">
        <div>
            <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-xs">Fasilitas &amp; Daftar PC</h1>
            <p class="font-body-md text-body-md text-on-surface-variant">Jelajahi spesifikasi dan ketersediaan PC di lounge kami.</p>
        </div>
        
        <div class="flex gap-xs overflow-x-auto pb-2 w-full md:w-auto hide-scrollbar">
            <a href="{{ route('page') }}" class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md transition-all {{ !request('tier') ? 'bg-primary text-on-primary neon-glow-active' : 'border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary' }}">
                All Tiers
            </a>
            <a href="{{ route('page', ['tier' => 'bronze']) }}" class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md transition-all {{ request('tier') == 'bronze' ? 'bg-primary text-on-primary neon-glow-active' : 'border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary' }}">
                Bronze
            </a>
            <a href="{{ route('page', ['tier' => 'silver']) }}" class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md transition-all {{ request('tier') == 'silver' ? 'bg-primary text-on-primary neon-glow-active' : 'border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary' }}">
                Silver
            </a>
            <a href="{{ route('page', ['tier' => 'gold']) }}" class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md transition-all {{ request('tier') == 'gold' ? 'bg-primary text-on-primary neon-glow-active' : 'border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary' }}">
                Gold
            </a>
            <a href="{{ route('page', ['tier' => 'vip']) }}" class="whitespace-nowrap px-sm py-xs rounded-full font-label-md text-label-md transition-all {{ request('tier') == 'vip' ? 'bg-secondary text-on-secondary shadow-[0_0_12px_rgba(220,184,255,0.4)] font-bold' : 'border border-outline-variant text-secondary hover:border-secondary hover:text-secondary' }}">
                VIP
            </a>
        </div>
    </header>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-md">
        @forelse($computers as $pc)
            @php
                $pcArray = (array) $pc;
                $statusPC = $pcArray['status'] ?? 'Offline';
                $tierPC = strtoupper($pcArray['tier'] ?? 'BRONZE');
            @endphp

            <article class="bg-surface-container-high rounded-xl overflow-hidden relative group transition-transform hover:-translate-y-1 
                {{ $tierPC == 'VIP' ? 'border-t border-secondary hover:shadow-[0_10px_20px_rgba(220,184,255,0.1)]' : '' }}
                {{ $tierPC == 'GOLD' ? 'border-t border-primary hover:shadow-[0_10px_20px_rgba(0,242,255,0.05)]' : '' }}
                {{ $tierPC == 'SILVER' ? 'border-t border-outline' : '' }}
                {{ $tierPC == 'BRONZE' ? 'border-t border-error' : '' }}
                {{ $statusPC == 'Maintenance' ? 'opacity-75' : '' }}">
                
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-primary/5 pointer-events-none"></div>
                
                <div class="p-sm">
                    <div class="flex justify-between items-start gap-xs mb-sm">
                        <h2 class="font-headline-md text-headline-md text-on-surface h-14 line-clamp-2" title="{{ $pcArray['nama_komputer'] ?? $pcArray['id_komputer'] }}">
                            {{ $pcArray['nama_komputer'] ?? $pcArray['id_komputer'] }}
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

                    <div class="mb-sm">
                        @if($statusPC == 'Online')
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-primary/20 text-primary font-label-md text-label-md border border-primary/30 neon-glow">
                                <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span> Available
                            </span>
                        @elseif($statusPC == 'Reserved')
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-md text-label-md border border-outline-variant">
                                <span class="material-symbols-outlined" style="font-size: 14px;">person</span> In Use
                            </span>
                        @elseif($statusPC == 'Maintenance')
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-error-container text-on-error-container font-label-md text-label-md border border-error/30">
                                <span class="material-symbols-outlined" style="font-size: 14px;">build</span> Maintenance
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full bg-surface-variant text-on-surface-variant font-label-md text-label-md border border-outline-variant">
                                <span class="w-2 h-2 rounded-full bg-on-surface-variant"></span> Offline
                            </span>
                        @endif
                    </div>

                    <div class="space-y-xs mb-md border-t border-outline-variant pt-xs">
                        <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                            <span class="material-symbols-outlined text-outline">memory</span>
                            <span>{{ $pcArray['cpu'] ?? 'Spesifikasi CPU Belum Diatur' }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                            <span class="material-symbols-outlined text-outline">developer_board</span>
                            <span>{{ $pcArray['gpu'] ?? 'Spesifikasi GPU Belum Diatur' }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                            <span class="material-symbols-outlined text-outline">storage</span>
                            <span>{{ $pcArray['ram'] ?? 'Spesifikasi RAM Belum Diatur' }}</span>
                        </div>
                    </div>

                    <button type="button"
                        onclick="openUserDetailModal(this)"
                        data-nama="{{ $pcArray['nama_komputer'] ?? $pcArray['id_komputer'] }}"
                        data-tier="{{ $tierPC }}"
                        data-cpu="{{ $pcArray['cpu'] ?? '-' }}"
                        data-gpu="{{ $pcArray['gpu'] ?? '-' }}"
                        data-ram="{{ $pcArray['ram'] ?? '-' }}"
                        data-detail-cpu="{{ $pcArray['detail_cpu'] ?? 'No detail available' }}"
                        data-detail-gpu="{{ $pcArray['detail_gpu'] ?? 'No detail available' }}"
                        data-detail-ram="{{ $pcArray['detail_ram'] ?? 'No detail available' }}"
                        data-deskripsi="{{ $pcArray['deskripsi'] ?? 'Belum ada deskripsi untuk unit komputer ini.' }}"
                        data-gambar="{{ !empty($pcArray['gambar_pc']) ? asset('storage/' . $pcArray['gambar_pc']) : '' }}"
                        class="w-full py-xs border rounded font-label-md text-label-md transition-colors
                        {{ $tierPC == 'VIP' ? 'border-secondary text-secondary hover:bg-secondary/10' : '' }}
                        {{ $tierPC == 'GOLD' ? 'border-primary text-primary hover:bg-primary/10' : '' }}
                        {{ $tierPC == 'SILVER' ? 'border-outline text-on-surface-variant hover:bg-surface-variant hover:text-on-surface' : '' }}
                        {{ $tierPC == 'BRONZE' ? 'border-outline text-on-surface-variant hover:bg-surface-variant hover:text-on-surface' : '' }}">
                        Lihat Detail
                    </button>
                </div>
            </article>
        @empty
            <div class="col-span-full flex flex-col items-center justify-center py-xl text-center">
                <span class="material-symbols-outlined text-[48px] text-on-surface-variant/30 mb-sm">computer</span>
                <p class="text-on-surface-variant font-body-md">Tidak ada unit komputer yang terdaftar untuk kategori ini.</p>
            </div>
        @endforelse
    </div>

    <div id="userDetailModal" class="hidden fixed inset-0 bg-black/75 backdrop-blur-sm z-50 items-center justify-center p-sm animate-fade-in">
        <div class="bg-[#181b25] border border-outline-variant/50 rounded-xl w-full max-w-2xl overflow-hidden shadow-2xl flex flex-col relative">
            
            <div class="p-md border-b border-outline-variant/20 flex justify-between items-center bg-gradient-to-r from-primary/10 to-transparent">
                <div class="flex items-center gap-sm">
                    <h3 id="m_nama" class="font-headline-lg text-headline-lg text-white font-bold">Nama PC</h3>
                    <span id="m_tier" class="text-[10px] uppercase px-2 py-0.5 rounded-full font-bold">TIER</span>
                </div>
                <button onclick="closeUserDetailModal()" class="text-on-surface-variant hover:text-white transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12">
                
                <div class="md:col-span-5 h-56 md:h-full bg-surface-container-low border-b md:border-b-0 md:border-r border-outline-variant/20 relative min-h-[220px]">
                    <img id="m_gambar" src="" class="w-full h-full object-cover hidden" alt="PC Setup">
                    <div id="m_gambar_placeholder" class="absolute inset-0 flex flex-col items-center justify-center text-outline gap-xs bg-surface-container/50">
                        <span class="material-symbols-outlined text-[48px]">image</span>
                        <span class="text-xs font-mono opacity-50">No Setup Image</span>
                    </div>
                </div>

                <div class="md:col-span-7 p-md space-y-md text-left">
                    <div>
                        <h4 class="text-primary font-label-md tracking-wider uppercase text-[11px] mb-xs font-bold opacity-80">Deskripsi Fasilitas</h4>
                        
                        <p id="m_deskripsi" class="text-on-surface-variant font-body-sm leading-relaxed max-h-24 overflow-y-auto pr-xs custom-scrollbar"
                        style="
                            scrollbar-width: thin; 
                            scrollbar-color: rgba(0, 242, 255, 0.3) rgba(24, 27, 37, 0.5);
                        ">
                            Deskripsi...
                        </p>
                    </div>

                    <div class="border-t border-outline-variant/20 pt-md space-y-sm">
                        <h4 class="text-secondary font-label-md tracking-wider uppercase text-[11px] font-bold opacity-80">Spesifikasi Komponen</h4>
                        
                        <div class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-primary bg-primary/10 p-xs rounded-lg shrink-0">memory</span>
                            <div>
                                <h5 id="m_cpu" class="text-white font-title-md font-bold leading-none mb-1">CPU</h5>
                                <p id="m_detail_cpu" class="text-on-surface-variant text-xs font-mono">Detail CPU</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-primary bg-primary/10 p-xs rounded-lg shrink-0">developer_board</span>
                            <div>
                                <h5 id="m_gpu" class="text-white font-title-md font-bold leading-none mb-1">GPU</h5>
                                <p id="m_detail_gpu" class="text-on-surface-variant text-xs font-mono">Detail GPU</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-sm">
                            <span class="material-symbols-outlined text-primary bg-primary/10 p-xs rounded-lg shrink-0">storage</span>
                            <div>
                                <h5 id="m_ram" class="text-white font-title-md font-bold leading-none mb-1">RAM</h5>
                                <p id="m_detail_ram" class="text-on-surface-variant text-xs font-mono">Detail RAM</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="p-sm bg-surface-container-highest/50 border-t border-outline-variant/20 flex justify-end">
                <button onclick="closeUserDetailModal()" class="px-md py-xs bg-surface-container border border-outline rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-variant transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</main>

<script>
    function openUserDetailModal(btn) {
        // 1. Ekstrak data-attributes dari button
        const nama = btn.getAttribute('data-nama');
        const tier = btn.getAttribute('data-tier');
        const cpu = btn.getAttribute('data-cpu');
        const gpu = btn.getAttribute('data-gpu');
        const ram = btn.getAttribute('data-ram');
        const dCpu = btn.getAttribute('data-detail-cpu');
        const dGpu = btn.getAttribute('data-detail-gpu');
        const dRam = btn.getAttribute('data-detail-ram');
        const deskripsi = btn.getAttribute('data-deskripsi');
        const gambar = btn.getAttribute('data-gambar');

        // 2. Suntik data ke elemen modal DOM
        document.getElementById('m_nama').innerText = nama;
        document.getElementById('m_deskripsi').innerText = deskripsi;
        document.getElementById('m_cpu').innerText = cpu;
        document.getElementById('m_detail_cpu').innerText = dCpu;
        document.getElementById('m_gpu').innerText = gpu;
        document.getElementById('m_detail_gpu').innerText = dGpu;
        document.getElementById('m_ram').innerText = ram;
        document.getElementById('m_detail_ram').innerText = dRam;

        // 3. Konfigurasi Badge Tier Warna Dinamis
        const tierBadge = document.getElementById('m_tier');
        tierBadge.innerText = tier;
        tierBadge.className = "text-[10px] uppercase px-2 py-0.5 rounded-full font-bold border " + 
            (tier === 'VIP' ? 'bg-secondary/20 text-secondary border-secondary/30' : 'bg-primary/20 text-primary border-primary/30');

        // 4. Kondisional Gambar Setup PC
        const imgNode = document.getElementById('m_gambar');
        const placeholderNode = document.getElementById('m_gambar_placeholder');
        if(gambar && gambar !== '') {
            imgNode.src = gambar;
            imgNode.classList.remove('hidden');
            placeholderNode.classList.add('hidden');
        } else {
            imgNode.classList.add('hidden');
            placeholderNode.classList.remove('hidden');
        }

        // 5. Tampilkan Modal ke Layar
        const modal = document.getElementById('userDetailModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeUserDetailModal() {
        const modal = document.getElementById('userDetailModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
@endsection